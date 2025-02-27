<?php

namespace App\Livewire\Module;

use App\Models\MaklumatPinjaman;
use App\Traits\MuatNaikDokumenValidation;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class MuatNaikDokumen extends Component
{
    use WithFileUploads;
    use MuatNaikDokumenValidation;

    public $document;
    public $existingData;

    public function mount()
    {
        $this->existingData = MaklumatPinjaman::where('appln_id', Auth::id())->first();
    }

    public function submit()
    {
        $this->validate();

        // Get user's IC number for folder name
        $user = Auth::user();
        $folderName = $user->ic_no;
        $appln_id = $user->applnStatus->id;

        // Get file extensions
        $ic_extension = $this->document_ic_no->getClientOriginalExtension();
        $icP_extension = $this->document_icP_no->getClientOriginalExtension();
        $ssm_extension = $this->document_ssm->getClientOriginalExtension();
        $business_extension = $this->document_business_picture->getClientOriginalExtension();
        $bank_extension = $this->document_bank_statements->getClientOriginalExtension();

        // Create filenames without folder path
        $fileNames = [
            'document_ic_no' => 'ic_' . now()->format('Y-m-d') . '.' . $ic_extension,
            'document_icP_no' => 'icP_' . now()->format('Y-m-d') . '.' . $icP_extension,
            'document_ssm' => 'ssm_' . now()->format('Y-m-d') . '.' . $ssm_extension,
            'document_business_picture' => 'business_' . now()->format('Y-m-d') . '.' . $business_extension,
            'document_bank_statements' => 'bank_' . now()->format('Y-m-d') . '.' . $bank_extension
        ];

        // Create full paths for storage
        $documentPaths = array_map(function($fileName) use ($folderName, $appln_id) {
            return $folderName . '/' . $appln_id . '/' . $fileName;
        }, $fileNames);

        // Store files with the new names
        $this->document_ic_no->storeAs('', $documentPaths['document_ic_no'], 'public');
        $this->document_icP_no->storeAs('', $documentPaths['document_icP_no'], 'public');
        $this->document_ssm->storeAs('', $documentPaths['document_ssm'], 'public');
        $this->document_business_picture->storeAs('', $documentPaths['document_business_picture'], 'public');
        $this->document_bank_statements->storeAs('', $documentPaths['document_bank_statements'], 'public');

        // Dapatkan data sedia ada dalam database
        $existingData = MaklumatPinjaman::where('appln_id', Auth::id())->first();

        // Jika wujud, gunakan nilai sedia ada, jika tidak, buat array kosong
        $existingDataArray = $existingData ? $existingData->toArray() : [];

        // Gabungkan data lama dengan data baru
        $updatedData = array_merge(
            $existingDataArray,
            $fileNames,  // Using fileNames instead of documentPaths to store only filenames
            ['appln_id' => Auth::id()]
        );

        // Simpan data ke dalam database
        MaklumatPinjaman::updateOrCreate(
            ['appln_id' => Auth::id()],
            $updatedData
        );

        session()->flash('message', 'Documents uploaded successfully.');
        
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.module.muat-naik-dokumen');
    }
}
