<?php

namespace App\Livewire\Module;

use App\Models\ApplnStatus;
use App\Models\MaklumatPinjaman;
use App\Traits\MuatNaikDokumenValidation;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class MuatNaikDokumen extends Component
{
    use WithFileUploads;
    use MuatNaikDokumenValidation;

    public $document;
    public $existingData;

    // Rest of the mount method remains the same
    public function mount()
    {    
        // Existing code remains the same
        $existingData = null; // Initialize to avoid undefined variable issues

        $applnStatus = ApplnStatus::where('user_id', Auth::id())->first();
        if ($applnStatus) {
            $existingData = MaklumatPinjaman::where('appln_id', $applnStatus->id)->first();
        }        
    
        if ($existingData) {
            foreach ($existingData->toArray() as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        }
    }

    public function submit()
    {
        $this->validate();

        // Get user's IC number for folder name
        $user = Auth::user();
        $folderName = $user->ic_no;
        //$appln_id = $user->applnStatus->id;

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
        // $documentPaths = array_map(function($fileName) use ($folderName, $appln_id) {
        //     return $folderName . '/' . $appln_id . '/' . $fileName;
        // }, $fileNames);

        // Create full paths for storage
        $documentPaths = array_map(function($fileName) use ($folderName) {
            return $folderName .'/' . $fileName;
        }, $fileNames);
        

        // Store files with the new names
        $this->document_ic_no->storeAs('', $documentPaths['document_ic_no'], 'public');
        $this->document_icP_no->storeAs('', $documentPaths['document_icP_no'], 'public');
        $this->document_ssm->storeAs('', $documentPaths['document_ssm'], 'public');
        $this->document_business_picture->storeAs('', $documentPaths['document_business_picture'], 'public');
        $this->document_bank_statements->storeAs('', $documentPaths['document_bank_statements'], 'public');

        // Create a text file with links to all documents as a simple alternative
        // until the PDF merging functionality is implemented
        $mergedFileName = 'document_links_' . now()->format('Y-m-d') . '.txt';
        // $mergedFilePath = $folderName . '/' . $appln_id . '/' . $mergedFileName;
        $mergedFilePath = $folderName . '/' . $mergedFileName;
        
        $documentLinks = "Document Links:\n\n";
        foreach ($documentPaths as $docKey => $docPath) {
            $documentLinks .= ucfirst(str_replace('document_', '', $docKey)) . ': ' . asset('storage/' . $docPath) . "\n";
        }
        
        Storage::disk('public')->put($mergedFilePath, $documentLinks);
        
        // Add the merged document to the fileNames array
        $fileNames['merge_doc'] = $mergedFileName;

        // Dapatkan appln_id yang baru atau sedia ada
        $applnId = Auth::user()->applnStatus->id;

        // Dapatkan data sedia ada dalam MaklumatPinjaman
        $existingData = MaklumatPinjaman::where('appln_id', $applnId)->first();

        // Jika wujud, gunakan nilai sedia ada, jika tidak, buat array kosong
        $existingDataArray = $existingData ? $existingData->toArray() : [];

        // Gabungkan data lama dengan data baru
        $updatedData = array_merge(
            $existingDataArray,
            $fileNames,  // Using fileNames instead of documentPaths to store only filenames
            ['appln_id' => $applnId]
        );

        // Simpan data ke dalam database
        MaklumatPinjaman::updateOrCreate(
            ['appln_id' => $applnId],
            $updatedData
        );

        session()->flash('message', 'Documents uploaded successfully. Document links have been created.');
        
        return redirect()->route('home');
    }

    public function submitPermohonan()
{
    $applnStatus = ApplnStatus::where('user_id', Auth::id())->first();

    if ($applnStatus) {
        $applnStatus->update(['appln_status' => 'S','appln_date_submit'=>now()]);
        session()->flash('message', 'Permohonan telah dihantar.');
    } else {
        session()->flash('error', 'Permohonan tidak wujud.');
    }

    return redirect()->route('dashboard');
}


    public function render()
    {
        return view('livewire.module.muat-naik-dokumen');
    }
}