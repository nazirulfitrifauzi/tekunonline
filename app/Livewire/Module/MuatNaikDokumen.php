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
            $this->existingData = MaklumatPinjaman::where('appln_id', $applnStatus->id)->first();
        }        
    
        if ($this->existingData) {
            foreach ($this->existingData->toArray() as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        }
    }

    // public function submit()
    // {
    //     $this->validate();

    //     // Get user's IC number for folder name
    //     $user = Auth::user();
    //     $folderName = $user->ic_no;
    //     //$appln_id = $user->applnStatus->id;

    //     // Get file extensions
    //     $ic_extension = $this->document_ic_no->getClientOriginalExtension();
    //     $icP_extension = $this->document_icP_no->getClientOriginalExtension();
    //     $ssm_extension = $this->document_ssm->getClientOriginalExtension();
    //     $business_extension = $this->document_business_picture->getClientOriginalExtension();
    //     $bank_extension = $this->document_bank_statements->getClientOriginalExtension();

    //     // Create filenames without folder path
    //     $fileNames = [
    //         'document_ic_no' => 'ic_' . now()->format('Y-m-d') . '.' . $ic_extension,
    //         'document_icP_no' => 'icP_' . now()->format('Y-m-d') . '.' . $icP_extension,
    //         'document_ssm' => 'ssm_' . now()->format('Y-m-d') . '.' . $ssm_extension,
    //         'document_business_picture' => 'business_' . now()->format('Y-m-d') . '.' . $business_extension,
    //         'document_bank_statements' => 'bank_' . now()->format('Y-m-d') . '.' . $bank_extension
    //     ];

    //     // Create full paths for storage
    //     // $documentPaths = array_map(function($fileName) use ($folderName, $appln_id) {
    //     //     return $folderName . '/' . $appln_id . '/' . $fileName;
    //     // }, $fileNames);

    //     // Create full paths for storage
    //     $documentPaths = array_map(function($fileName) use ($folderName) {
    //         return $folderName .'/' . $fileName;
    //     }, $fileNames);
        

    //     // Store files with the new names
    //     $this->document_ic_no->storeAs('', $documentPaths['document_ic_no'], 'public');
    //     $this->document_icP_no->storeAs('', $documentPaths['document_icP_no'], 'public');
    //     $this->document_ssm->storeAs('', $documentPaths['document_ssm'], 'public');
    //     $this->document_business_picture->storeAs('', $documentPaths['document_business_picture'], 'public');
    //     $this->document_bank_statements->storeAs('', $documentPaths['document_bank_statements'], 'public');

    //     // Create a text file with links to all documents as a simple alternative
    //     // until the PDF merging functionality is implemented
    //     $mergedFileName = 'document_links_' . now()->format('Y-m-d') . '.txt';
    //     // $mergedFilePath = $folderName . '/' . $appln_id . '/' . $mergedFileName;
    //     $mergedFilePath = $folderName . '/' . $mergedFileName;
        
    //     $documentLinks = "Document Links:\n\n";
    //     foreach ($documentPaths as $docKey => $docPath) {
    //         $documentLinks .= ucfirst(str_replace('document_', '', $docKey)) . ': ' . asset('storage/' . $docPath) . "\n";
    //     }
        
    //     Storage::disk('public')->put($mergedFilePath, $documentLinks);
        
    //     // Add the merged document to the fileNames array
    //     $fileNames['merge_doc'] = $mergedFileName;

    //     // Dapatkan appln_id yang baru atau sedia ada
    //     $applnId = Auth::user()->applnStatus->id;

    //     // Dapatkan data sedia ada dalam MaklumatPinjaman
    //     $existingData = MaklumatPinjaman::where('appln_id', $applnId)->first();

    //     // Jika wujud, gunakan nilai sedia ada, jika tidak, buat array kosong
    //     $existingDataArray = $existingData ? $existingData->toArray() : [];

    //     // Gabungkan data lama dengan data baru
    //     $updatedData = array_merge(
    //         $existingDataArray,
    //         $fileNames,  // Using fileNames instead of documentPaths to store only filenames
    //         ['appln_id' => $applnId]
    //     );

    //     // Simpan data ke dalam database
    //     MaklumatPinjaman::updateOrCreate(
    //         ['appln_id' => $applnId],
    //         $updatedData
    //     );

    //     // $this->dialog()->show([
    //     //     'icon' => 'success',
    //     //     'title' => 'Berjaya!',
    //     //     'description' => 'Maklumat berjaya disimpan.',
    //     // ]);

    //     // $this->dispatch('saved');
        
    //     return redirect()->route('home');
    // }

    public function submit()
    {
        // Example validation rules (adjust as needed):
        $this->validate([
            'document_ic_no'             => 'required|mimes:pdf|max:10240',
            'document_icP_no'            => 'required|mimes:pdf|max:10240',
            'document_ssm'               => 'required|mimes:pdf|max:10240',
            'document_business_picture'  => 'required|mimes:pdf|max:10240',
            'document_bank_statements'   => 'required|mimes:pdf|max:10240',
        ]);

        // Get user's IC number for folder name
        $user       = Auth::user();
        $folderName = $user->ic_no;

        // Map each file input property to a filename prefix
        $filesMap = [
            'document_ic_no'             => 'ic_',
            'document_icP_no'            => 'icP_',
            'document_ssm'               => 'ssm_',
            'document_business_picture'  => 'business_',
            'document_bank_statements'   => 'bank_',
        ];

        // This will hold the final filenames (for DB) and help build the .txt link file
        $fileNames = [];
        $documentLinks = "Document Links:\n\n";

        // Loop over each file input, store it, and record the new filename
        foreach ($filesMap as $property => $prefix) {
            if (!$this->$property) {
                // Skip if file not provided (you can decide whether skipping is valid or not)
                continue;
            }

            // Get extension and build a new filename
            $extension   = $this->$property->getClientOriginalExtension();
            $newFilename = $prefix . now()->format('Y-m-d') . '.' . $extension;

            // Store the file in storage/app/public/<IC_NUMBER>
            // storeAs(<directory>, <filename>, <disk>)
            $path = $this->$property->storeAs($folderName, $newFilename, 'public');

            // Save just the filename in our array (for the DB)
            $fileNames[$property] = $newFilename;

            // Build a link line for the .txt file
            // e.g. "Ic no: https://yoursite.com/storage/123456-12-5678/ic_2025-03-20.pdf"
            $documentLinks .= ucfirst(str_replace('document_', '', $property)) 
                            . ': ' 
                            . asset('storage/' . $path) 
                            . "\n";
        }

        // Create a text file with all the links
        $mergedFileName = 'document_links_' . now()->format('Y-m-d') . '.pdf';
        $mergedFilePath = $folderName . '/' . $mergedFileName;
        Storage::disk('public')->put($mergedFilePath, $documentLinks);

        // Also store that text filename in $fileNames if you like
        $fileNames['merge_doc'] = $mergedFileName;

        // Find or create the MaklumatPinjaman record
        $applnId      = $user->applnStatus->id ?? null;
        $existingData = MaklumatPinjaman::where('appln_id', $applnId)->first();
        $existingDataArr = $existingData ? $existingData->toArray() : [];

        // Merge new file data with existing data (so we don't overwrite other columns)
        $updatedData = array_merge(
            $existingDataArr,
            $fileNames,
            ['appln_id' => $applnId]
        );

        // Insert or update the DB record
        MaklumatPinjaman::updateOrCreate(['appln_id' => $applnId], $updatedData);

        // Show a success message
        //session()->flash('message', 'Documents uploaded successfully. Document links have been created.');
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