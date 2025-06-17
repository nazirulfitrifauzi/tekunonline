<?php

namespace App\Livewire\Module;

use App\Models\ApplnStatus;
use App\Models\MaklumatPinjaman as ModelsMaklumatPinjaman;
use App\Models\application_pdf;
use App\Traits\MuatNaikDokumenValidation;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Webklex\PDFMerger\Facades\PDFMergerFacade;
use WireUi\Traits\WireUiActions;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

use App\Livewire\Module\MaklumatPeribadi;
use App\Livewire\Module\MaklumatPerniagaan;
use App\Livewire\Module\MaklumatPerniagaan2;
use App\Livewire\Module\MaklumatPinjaman;



class MuatNaikDokumen extends Component
{
    use WithFileUploads;
    use MuatNaikDokumenValidation,WireUiActions;

    public $document;
    public $existingData;
    public $appln_id;
    public $show_hantar = false;
    public $pdfData;
    public $safety;
    //public $sp;

    protected $queryString = ['appln_id'];

    // Rest of the mount method remains the same
    public function mount()
    {  
        $this->safety = ModelsMaklumatPinjaman::where('appln_id',$this->appln_id)->first();

        // Existing code remains the same
        $existingData = null; // Initialize to avoid undefined variable issues

        $applnStatus = ApplnStatus::where('id', $this->appln_id)->first();
        if ($applnStatus) {
            $this->existingData = ModelsMaklumatPinjaman::where('appln_id', $applnStatus->id)->first();
            
            // Set show_hantar to true if documents have been uploaded (tab5_muat_naik_dokumen is 1)
            if ($applnStatus->tab5_muat_naik_dokumen == 1) {
                $this->show_hantar = true;
            }
        }        
    
        if ($this->existingData) {
            foreach ($this->existingData->toArray() as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
            
            // Initialize document_perkeso_status based on skim_safety value
            $this->document_perkeso_status = ($this->existingData->skim_safety == 0) ? 1 : 0;
        }
    }

    public function deleteBankStatement()
{
    if ($this->existingData && $this->existingData->document_bank_statements) {
        Storage::delete('public/' . auth()->user()->ic_no . '/' . $this->existingData->document_bank_statements);
        $this->existingData->update(['document_bank_statements' => null]);
        
        // Set tab5_muat_naik_dokumen to 0 and show_hantar to false immediately
        ApplnStatus::where('id', $this->appln_id)->update([
            'tab5_muat_naik_dokumen' => 0,
        ]);
        $this->show_hantar = false;
        
        session()->flash('message', 'Penyata bank berjaya dipadam.');
    }
}

public function deleteIcDocument()
{
    if ($this->existingData && $this->existingData->document_ic_no) {
        Storage::delete('public/' . auth()->user()->ic_no . '/' . $this->existingData->document_ic_no);
        $this->existingData->update(['document_ic_no' => null]);
        
        // Set tab5_muat_naik_dokumen to 0 and show_hantar to false immediately
        ApplnStatus::where('id', $this->appln_id)->update([
            'tab5_muat_naik_dokumen' => 0,
        ]);
        $this->show_hantar = false;
        
        session()->flash('message', 'Dokumen IC berjaya dipadam.');
    }
}

public function deleteIcPDocument()
{
    if ($this->existingData && $this->existingData->document_icP_no) {
        Storage::delete('public/' . auth()->user()->ic_no . '/' . $this->existingData->document_icP_no);
        $this->existingData->update(['document_icP_no' => null]);
        
        // Set tab5_muat_naik_dokumen to 0 and show_hantar to false immediately
        ApplnStatus::where('id', $this->appln_id)->update([
            'tab5_muat_naik_dokumen' => 0,
        ]);
        $this->show_hantar = false;
        
        session()->flash('message', 'Dokumen IC Pasangan berjaya dipadam.');
    }
}

public function deleteSsmDocument()
{
    if ($this->existingData && $this->existingData->document_ssm) {
        Storage::delete('public/' . auth()->user()->ic_no . '/' . $this->existingData->document_ssm);
        $this->existingData->update(['document_ssm' => null]);
        
        // Set tab5_muat_naik_dokumen to 0 and show_hantar to false immediately
        ApplnStatus::where('id', $this->appln_id)->update([
            'tab5_muat_naik_dokumen' => 0,
        ]);
        $this->show_hantar = false;
        
        session()->flash('message', 'Dokumen SSM berjaya dipadam.');
    }
}

public function deleteBusinessPictureDocument()
{
    if ($this->existingData && $this->existingData->document_business_picture) {
        Storage::delete('public/' . auth()->user()->ic_no . '/' . $this->existingData->document_business_picture);
        $this->existingData->update(['document_business_picture' => null]);
        
        // Set tab5_muat_naik_dokumen to 0 and show_hantar to false immediately
        ApplnStatus::where('id', $this->appln_id)->update([
            'tab5_muat_naik_dokumen' => 0,
        ]);
        $this->show_hantar = false;
        
        session()->flash('message', 'Dokumen Perniagaan berjaya dipadam.');
    }
}

public function deletePerkesoDocument()
{
    if ($this->existingData && $this->existingData->document_perkeso) {
        Storage::delete('public/' . auth()->user()->ic_no . '/' . $this->existingData->document_perkeso);
        $this->existingData->update(['document_perkeso' => null]);
        
        // For Perkeso document, check if it's required based on skim_safety
        if ($this->existingData->skim_safety == 0) {
            // Set tab5_muat_naik_dokumen to 0 and show_hantar to false immediately
            ApplnStatus::where('id', $this->appln_id)->update([
                'tab5_muat_naik_dokumen' => 0,
            ]);
            $this->show_hantar = false;
        }
        
        session()->flash('message', 'Dokumen Perkeso berjaya dipadam.');
    }
}

    protected $listeners = ['run-validation' => 'validateSelf'];

    public function validateSelf()
    {
        $this->validate();
    }

    #[On('run-validation5')] 
    // public function submit()
    // {
    //     try {
    //             $this->validateSelf();

    //             // Get user's IC number for folder name
    //             $user = Auth::user();
    //             $folderName = $user->ic_no;
    //             $appln_id = $this->appln_id;//$user->applnStatus->id;

    //             // Get file extensions
    //             $ic_extension = $this->document_ic_no->getClientOriginalExtension();
    //             $icP_extension = $this->document_icP_no->getClientOriginalExtension();
    //             $ssm_extension = $this->document_ssm->getClientOriginalExtension();
    //             $business_extension = $this->document_business_picture->getClientOriginalExtension();
    //             $bank_extension = $this->document_bank_statements->getClientOriginalExtension();
    //             if(optional($this->existingData)->skim_safety == 0 && is_object($this->document_perkeso)){
    //                 $perkeso_extension = $this->document_perkeso->getClientOriginalExtension();
    //             }

    //             // Create filenames without folder path
    //             $fileNames = [
    //                 'document_ic_no' => 'ic_' . now()->format('Y-m-d') . '.' . $ic_extension,
    //                 'document_icP_no' => 'icP_' . now()->format('Y-m-d') . '.' . $icP_extension,
    //                 'document_ssm' => 'ssm_' . now()->format('Y-m-d') . '.' . $ssm_extension,
    //                 'document_business_picture' => 'business_' . now()->format('Y-m-d') . '.' . $business_extension,
    //                 'document_bank_statements' => 'bank_' . now()->format('Y-m-d') . '.' . $bank_extension,
    //                 //'document_perkeso' => 'perkeso_'. now()->format('Y-m-d'). '.'. $perkeso_extension,
    //             ];

    //             if (optional($this->existingData)->skim_safety == 0) {
    //                 $fileNames['document_perkeso'] = 'perkeso_' . now()->format('Y-m-d') . '.' . $perkeso_extension;
    //             }

    //             // Create full paths for storage
    //             $documentPaths = array_map(function($fileName) use ($folderName) {
    //                 //return $folderName . '/' . $appln_id . '/' . $fileName;
    //                 return $folderName . '/' . $fileName;
    //             }, $fileNames);

    //             // Store files with the new names
    //             $this->document_ic_no->storeAs('', $documentPaths['document_ic_no'], 'public');
    //             $this->document_icP_no->storeAs('', $documentPaths['document_icP_no'], 'public');
    //             $this->document_ssm->storeAs('', $documentPaths['document_ssm'], 'public');
    //             $this->document_business_picture->storeAs('', $documentPaths['document_business_picture'], 'public');
    //             $this->document_bank_statements->storeAs('', $documentPaths['document_bank_statements'], 'public');
    //             if(optional($this->existingData)->skim_safety == 0 && is_object($this->document_perkeso)){
    //                 $this->document_perkeso->storeAs('', $documentPaths['document_perkeso'], 'public');
    //             }

    //             // Create a text file with links to all documents as a simple alternative
    //             // until the PDF merging functionality is implemented
    //             $mergedFileName = 'appln_' . now()->format('Y-m-d') . '.txt';
    //             //$mergedFilePath = $folderName . '/' . $appln_id . '/' . $mergedFileName;
    //             $mergedFilePath = $folderName. '/'. $mergedFileName;      

    //             $documentLinks = "Document Links:\n\n";
    //             foreach ($documentPaths as $docKey => $docPath) {
    //                 $documentLinks .= ucfirst(str_replace('document_', '', $docKey)) . ': ' . asset('storage/' . $docPath) . "\n";
    //             }
                
    //             Storage::disk('public')->put($mergedFilePath, $documentLinks);
                
    //             // Add the merged document to the fileNames array
    //             $fileNames['document_merge'] = $mergedFileName;

    //             // Dapatkan appln_id yang baru atau sedia ada
    //             $applnId = $appln_id;//Auth::user()->applnStatus->id;

    //             // Dapatkan data sedia ada dalam MaklumatPinjaman
    //             $existingData = ModelsMaklumatPinjaman::where('appln_id', $applnId)->first();

    //             // Jika wujud, gunakan nilai sedia ada, jika tidak, buat array kosong
    //             $existingDataArray = $existingData ? $existingData->toArray() : [];

    //             // Gabungkan data lama dengan data baru
    //             $updatedData = array_merge(
    //                 $existingDataArray,
    //                 $fileNames,  // Using fileNames instead of documentPaths to store only filenames
    //                 ['appln_id' => $applnId]
    //             );

    //             // Simpan data ke dalam database
    //             ModelsMaklumatPinjaman::updateOrCreate(
    //                 ['appln_id' => $applnId],
    //                 $updatedData
    //             );

    //             ApplnStatus::where('id', $this->appln_id)->update([
    //                 'tab5_muat_naik_dokumen' => 1,
    //             ]);

    //             session()->flash('message', 'Documents uploaded successfully. Document links have been created.');
                
    //             //return redirect()->route('home', ['appln_id' => $applnId]);
    //             $this->show_hantar = true;

    //             // $this->dispatch('enableTab', 1);
    //             // $this->dispatch('enableTab', 2);
    //             // $this->dispatch('enableTab', 3);
    //             // $this->dispatch('enableTab', 4);
    //             // $this->dispatch('enableTab', 5);

    //         } catch (\Illuminate\Validation\ValidationException $e) {
    //             $this->dialog()->show([
    //                 'icon' => 'error',
    //                 'title' => 'Sila Lengkapkan Dokumen!',
    //                 'description' => collect($e->validator->errors()->all())
    //                                 ->map(fn($msg, $i) => ($i + 1) . '. ' . $msg)
    //                                 ->implode("<br>"),
    //             ]);

    //             $this->validateSelf();
    //         }
    // }

    public function submit()
    {
        try {
            $this->validateSelf();

            // Get user's IC number for folder name
            $user = Auth::user();
            $folderName = $user->ic_no;
            $appln_id = $this->appln_id;

            // Initialize arrays for filenames and paths
            $fileNames = [];
            $documentPaths = [];

            // Process each document only if it's an object (uploaded file)
            // IC Document
            if (is_object($this->document_ic_no)) {
                $ic_extension = $this->document_ic_no->getClientOriginalExtension();
                $fileNames['document_ic_no'] = 'ic_' . now()->format('Y-m-d') . '.' . $ic_extension;
            } elseif ($this->existingData && $this->existingData->document_ic_no) {
                // Use existing filename if document wasn't changed
                $fileNames['document_ic_no'] = $this->existingData->document_ic_no;
            }

            // IC Pasangan Document
            if (is_object($this->document_icP_no)) {
                $icP_extension = $this->document_icP_no->getClientOriginalExtension();
                $fileNames['document_icP_no'] = 'icP_' . now()->format('Y-m-d') . '.' . $icP_extension;
            } elseif ($this->existingData && $this->existingData->document_icP_no) {
                $fileNames['document_icP_no'] = $this->existingData->document_icP_no;
            }

            // SSM Document
            if (is_object($this->document_ssm)) {
                $ssm_extension = $this->document_ssm->getClientOriginalExtension();
                $fileNames['document_ssm'] = 'ssm_' . now()->format('Y-m-d') . '.' . $ssm_extension;
            } elseif ($this->existingData && $this->existingData->document_ssm) {
                $fileNames['document_ssm'] = $this->existingData->document_ssm;
            }

            // Business Picture Document
            if (is_object($this->document_business_picture)) {
                $business_extension = $this->document_business_picture->getClientOriginalExtension();
                $fileNames['document_business_picture'] = 'business_' . now()->format('Y-m-d') . '.' . $business_extension;
            } elseif ($this->existingData && $this->existingData->document_business_picture) {
                $fileNames['document_business_picture'] = $this->existingData->document_business_picture;
            }

            // Bank Statements Document
            if (is_object($this->document_bank_statements)) {
                $bank_extension = $this->document_bank_statements->getClientOriginalExtension();
                $fileNames['document_bank_statements'] = 'bank_' . now()->format('Y-m-d') . '.' . $bank_extension;
            } elseif ($this->existingData && $this->existingData->document_bank_statements) {
                $fileNames['document_bank_statements'] = $this->existingData->document_bank_statements;
            }

            // Perkeso Document (optional)
            if (optional($this->existingData)->skim_safety == 0) {
                if (is_object($this->document_perkeso)) {
                    $perkeso_extension = $this->document_perkeso->getClientOriginalExtension();
                    $fileNames['document_perkeso'] = 'perkeso_' . now()->format('Y-m-d') . '.' . $perkeso_extension;
                } elseif ($this->existingData && $this->existingData->document_perkeso) {
                    $fileNames['document_perkeso'] = $this->existingData->document_perkeso;
                }
            }

            // Build full paths => subfolder is the IC number
            // e.g. "920905066115/ic_2025-04-14.pdf"
            $documentPaths = array_map(function($fileName) use ($folderName) {
                return $folderName . '/' . $fileName;
            }, $fileNames);

            // Store each file in 'storage/app/public/{IC}/...'
            // Only store files that were actually uploaded (objects)
            if (is_object($this->document_ic_no)) {
                $this->document_ic_no->storeAs('', $documentPaths['document_ic_no'], 'public');
            }
            
            if (is_object($this->document_icP_no)) {
                $this->document_icP_no->storeAs('', $documentPaths['document_icP_no'], 'public');
            }
            
            if (is_object($this->document_ssm)) {
                $this->document_ssm->storeAs('', $documentPaths['document_ssm'], 'public');
            }
            
            if (is_object($this->document_business_picture)) {
                $this->document_business_picture->storeAs('', $documentPaths['document_business_picture'], 'public');
            }
            
            if (is_object($this->document_bank_statements)) {
                $this->document_bank_statements->storeAs('', $documentPaths['document_bank_statements'], 'public');
            }

            if (optional($this->existingData)->skim_safety == 0 && is_object($this->document_perkeso)) {
                $this->document_perkeso->storeAs('', $documentPaths['document_perkeso'], 'public');
            }

            // 2) COPY each file to "public/storage/{IC}/..." as well
            // Only copy files that were actually uploaded (objects)
            foreach ($documentPaths as $docKey => $docPath) {
                // Skip if the file wasn't uploaded
                if (!is_object($this->{$docKey})) {
                    continue;
                }
                
                // The physical path to the file in storage/app/public
                $sourcePath = Storage::disk('public')->path($docPath);

                // The path we want to copy to, i.e. public/storage/{IC}/filename
                $destinationPath = public_path('storage/' . $docPath);

                // Make sure the destination folder exists first
                if (!File::isDirectory(dirname($destinationPath))) {
                    File::makeDirectory(dirname($destinationPath), 0755, true);
                }

                // Copy the file from source to destination
                File::copy($sourcePath, $destinationPath);
            }

            // Create a text file that lists all the document URLs
            $mergedFileName = 'appln_' . now()->format('Y-m-d') . '.txt';
            $mergedFilePath = $folderName . '/' . $mergedFileName;

            $documentLinks = "Document Links:\n\n";
            foreach ($documentPaths as $docKey => $docPath) {
                $label = ucfirst(str_replace('document_', '', $docKey));
                $documentLinks .= $label . ': ' . asset('storage/' . $docPath) . "\n";
            }

            // Store the text file into 'storage/app/public/{IC}/'
            Storage::disk('public')->put($mergedFilePath, $documentLinks);

            // (Optional) Also copy the text file to public/storage/
            $sourceTxt = Storage::disk('public')->path($mergedFilePath);
            $destinationTxt = public_path('storage/'.$mergedFilePath);

            if (!File::isDirectory(dirname($destinationTxt))) {
                File::makeDirectory(dirname($destinationTxt), 0755, true);
            }
            File::copy($sourceTxt, $destinationTxt);

            // Now store info into DB (MaklumatPinjaman, ApplnStatus, etc.)
            $applnId = $appln_id;
            $existingData = ModelsMaklumatPinjaman::where('appln_id', $applnId)->first();
            $existingDataArray = $existingData ? $existingData->toArray() : [];

            $updatedData = array_merge(
                $existingDataArray,
                $fileNames,  // store the filenames in DB, not the full path
                ['appln_id' => $applnId]
            );

            ModelsMaklumatPinjaman::updateOrCreate(
                ['appln_id' => $applnId],
                $updatedData
            );

            // Update ApplnStatus as well
            ApplnStatus::where('id', $this->appln_id)->update([
                'tab5_muat_naik_dokumen' => 1,
            ]);

            session()->flash('message', 'Documents uploaded successfully. Document links have been created.');
            $this->show_hantar = true;

        // Tambahkan baris ini untuk me-refresh halaman
        $this->dispatch('saved');
        $this->reset(['document_ic_no', 'document_icP_no', 'document_ssm', 'document_business_picture', 'document_bank_statements', 'document_perkeso']);
        return $this->redirect(request()->header('Referer'));

        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->dialog()->show([
                'icon' => 'error',
                'title' => 'Sila Lengkapkan Dokumen!',
                'description' => collect($e->validator->errors()->all())
                    ->map(fn($msg, $i) => ($i + 1) . '. ' . $msg)
                    ->implode("<br>"),
            ]);

            $this->validateSelf();
        }
    }
    

    // public function submitPermohonan()
    // {
    //     $applnStatus = ApplnStatus::where('user_id', Auth::id())->first();

    //     if ($applnStatus) {
    //         $applnStatus->update(['appln_status' => 'S','appln_date_submit'=>now()]);
    //         session()->flash('message', 'Permohonan telah dihantar.');
    //     } else {
    //         session()->flash('error', 'Permohonan tidak wujud.');
    //     }

    //     return redirect()->route('dashboard');
    // }

    public function validateTap1()
    {
        $this->dispatch('run-validation1')->to(MaklumatPeribadi::class);

        $this->validateTap2();
    }

    public function validateTap2()
    {
        $this->dispatch('run-validation2')->to(MaklumatPerniagaan::class);

        $this->validateTap3();
    }

    public function validateTap3()
    {
        $this->dispatch('run-validation3')->to(MaklumatPerniagaan2::class);

        $this->validateTap4();
    }

    public function validateTap4()
    {
        $this->dispatch('run-validation4')->to(MaklumatPinjaman::class);

        $this->validateTap5();
    }

    public function validateTap5()
    {
        $this->dispatch('run-validation5')->to(MuatNaikDokumen::class);
    }


    //merge all file
    public function submitPermohonan()
    {
        try {
            $user = Auth::user();
            $folderName = $user->ic_no;
            $appln_id = $this->appln_id;
            
            Log::info('Starting submitPermohonan for user: ' . $user->id . ', appln_id: ' . $appln_id);

            // Execute stored procedure to update application reference number
            $run = DB::statement('SET NOCOUNT ON;EXEC dbo.up_upd_appln_ref_no ?', [$appln_id]);
            $this->pdfData = DB::select('EXEC dbo.up_list_individual_apply ?', array($appln_id));

            $applnStatus = ApplnStatus::where('id', $appln_id)->first();

            if ($applnStatus) {
                $applnStatus->update([
                    'appln_status'      => 'S',
                    'appln_date_submit' => now()
                ]);

                // a) Construct a unique PDF name for the first PDF (bpc01)
                $pdfName = 'bpc01_' . now()->format('Y-m-d') . '.pdf';
                $pdfFullPath = storage_path('app/public/' . $folderName . '/' . $pdfName);
                
                Log::info('BPC01 PDF will be saved to: ' . $pdfFullPath);

                $fileNames['document_bpc01'] = $pdfName;

                // Create the directory if it doesn't exist
                $directory = dirname($pdfFullPath);
                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                    Log::info('Created directory: ' . $directory);
                }

                //start for bpc01 pdf generation

                    // c) Get the path to your JPG images in the public folder
                    $jpgPath  = public_path('img/test1.jpg');
                    $jpgPath2 = public_path('img/2.jpg');
                    $jpgPath3 = public_path('img/test3b.jpg');
                    $jpgPath4 = public_path('img/4.jpg');

                    // Ambil masa berniaga (dari) dari data PDF
                    $businessOpen = $this->pdfData[0]->business_open ?? null;
                    $businessClose = $this->pdfData[0]->business_closed ?? null;
                    
                    // Convert 24-hour format to 12-hour format for display in PDF
                    $businessOpenFormatted = $businessOpen ? date('h:i A', strtotime($businessOpen)) : null;
                    $businessCloseFormatted = $businessClose ? date('h:i A', strtotime($businessClose)) : null;

                    // Default kosong
                    $masaBukak = '';
                    $masaTutup = '';

                    // Kenal pasti masa (pagi / petang / malam)
                    if ($businessOpen) {
                        try {
                            $hour = (int) date('H', strtotime($businessOpen));
                            $ampm = date('A', strtotime($businessOpen)); // 'A' gives AM or PM

                            if ($ampm === 'AM') {
                                $masaBukak = 'pagi';
                            } elseif ($ampm === 'PM' && $hour >= 1 && $hour <= 6) {
                                $masaBukak = 'petang';
                            } else {
                                $masaBukak = 'malam';
                            }
                        } catch (\Exception $e) {
                            // Handle kalau format masa tak valid
                            $masaBukak = '';
                        }
                    }
                    
                    if ($businessClose) {
                        try {
                            $hour = (int) date('g', strtotime($businessClose)); // 'g' gives 1-12
                            $ampm = date('A', strtotime($businessClose)); // 'A' gives AM or PM
                    
                            if ($ampm === 'AM') {
                                $masaTutup = 'pagi';
                            } elseif ($ampm === 'PM' && $hour >= 1 && $hour <= 6) {
                                $masaTutup = 'petang';
                            } else {
                                $masaTutup = 'malam';
                            }
                        } catch (\Exception $e) {
                            // Handle kalau format masa tak valid
                            $masaTutup = '';
                        }
                    }


                    $html = '
                            <html lang="en">
                                <head>
                                <meta charset="UTF-8">
                                <title>Borang Permohonan Pembiayaan TEKUN</title>
                                <style>
                                    body {
                                    margin: 0;
                                    position: relative;
                                    font-family: Arial, sans-serif;
                                    }

                                    .page_break {
                                    page-break-before: always;
                                    }

                                    input[type="checkbox"] {
                                    height: 8px;
                                    width: 8px;
                                    vertical-align: middle;
                                    margin: 0 0.4em 0.4em 0;
                                    border: 1px solid transparent;
                                    -webkit-appearance: none;
                                    -webkit-transition: box-shadow 200ms;
                                    background-color: transparent !important;
                                    color: rgba(0, 0, 0, 0);
                                    }

                                    input[type="checkbox"] {
                                    -webkit-border-radius: 0;
                                    border-radius: 0;
                                    }

                                    input[type="checkbox"]:checked:before {
                                    content: "";
                                    display: block;
                                    width: 2px;
                                    height: 4px;
                                    border: solid black;
                                    border-width: 0 2px 2px 0;
                                    -webkit-transform: rotate(45deg);
                                    transform: rotate(45deg);
                                    margin-left: 4px;
                                    margin-top: 1px;
                                    }
                                </style>
                                </head>

                                <body>
                                <!--------------------------------------------------------------- page 1 ----------------------------------------------------------------------------->
                                <div>
                                    <div>
                                    <img src="'.$jpgPath.'" width="700" height="900" />
                                    </div>

                                    <!------------ diisi oleh pejabat cawangan ------------->
                                    <div>
                                    <!-- Negeri -->
                                    <p
                                        style="position: absolute;top: 109px;left: 186px;height: 17px;width: 250px;background: transparent;font-size: 9px !important;">
                                        '.($this->pdfData[0]->state_code ?  : ' ').'
                                    </p>
                                    <!-- Cawangan -->
                                    <p
                                        style="position: absolute;top: 122px;left: 186px;height: 17px;width: 250px;background: transparent;font-size: 9px !important;">
                                        '.($this->pdfData[0]->branch_code ?  : ' ').'
                                    </p>
                                    <!-- Tarikh diterima -->
                                    <p
                                        style="position: absolute;top: 133px;left: 186px;height: 17px;width: 250px;background: transparent;font-size: 9px !important;">
                                    
                                    </p>
                                    <!-- No. Rujukan -->
                                    <p
                                        style="position: absolute;top: 155px;left: 186px;height: 17px;width: 250px;background: transparent;font-size: 9px !important;">
                                        '.($this->pdfData[0]->appln_ref_no ? : ' ').'
                                    </p>

                                    <!-- checkbox Pembiayaan Pertama -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 130px;
                                    left: 622px; font-size: 11pt;" unchecked>

                                    <!-- checkbox Pembiayaan Ulangan -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 141px;
                                    left: 622px; font-size: 11pt;" unchecked>

                                    <!-- checkbox Pembiayaan Bertindih -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 152px;
                                    left: 622px; font-size: 11pt;" unchecked>

                                    <!-- checkbox Pembiayaan Bersaingan -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 164px;
                                    left: 622px; font-size: 11pt;" unchecked>

                                    <!-- checkbox tawarrauq tekun niaga  -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 197px;
                                    left: 65px; font-size: 11pt;" unchecked>

                                    <!-- checkbox tawarrauq teman tekun  -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 208px;
                                    left: 65px; font-size: 11pt;" unchecked>

                                    <!-- checkbox tawarrauq kontrak-i  -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 219px;
                                    left: 65px; font-size: 11pt;" unchecked>

                                    <!-- checkbox tawarrauq SPUMI  -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 230px;
                                    left: 65px; font-size: 11pt;" unchecked>

                                    <!-- checkbox tawarrauq BPU  -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 242px;
                                    left: 65px; font-size: 11pt;" unchecked>

                                    <!-- checkbox tawarrauq CROP  -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 253px;
                                    left: 65px; font-size: 11pt;" unchecked>

                                    <!-- checkbox tawarrauq LAIN-LAIN  -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 265px;
                                    left: 65px; font-size: 11pt;" unchecked>

                                    <!-- tawarrauq tekun niaga  -->
                                    <p
                                        style="position: absolute;top: 189px;left: 369px;height: 17px;width: 270px;background: transparent;font-size: 9px !important;">
                                        
                                    </p>

                                    <!-- tawarrauq teman tekun  -->
                                    <p
                                        style="position: absolute;top: 201px;left: 369px;height: 17px;width: 270px;background: transparent;font-size: 9px !important;">
                                        
                                    </p>

                                    <!-- tawarrauq kontrak-i  -->
                                    <p
                                        style="position: absolute;top: 212px;left: 369px;height: 17px;width: 270px;background: transparent;font-size: 9px !important;">
                                        
                                    </p>

                                    <!-- tawarrauq SPUMI  -->
                                    <p
                                        style="position: absolute;top: 223px;left: 369px;height: 17px;width: 270px;background: transparent;font-size: 9px !important;">
                                        
                                    </p>

                                    <!-- tawarrauq BPU  -->
                                    <p
                                        style="position: absolute;top: 235px;left: 369px;height: 17px;width: 270px;background: transparent;font-size: 9px !important;">
                                        
                                    </p>

                                    <!-- tawarrauq CROP  -->
                                    <p
                                        style="position: absolute;top: 246px;left: 369px;height: 17px;width: 270px;background: transparent;font-size: 9px !important;">
                                        
                                    </p>

                                    <!-- tawarrauq nyatakan LAIN-LAIN  -->
                                    <p
                                    style="position: absolute;top: 258px;left: 186px;height: 17px;width: 177px;background: transparent;font-size: 9px !important;">
                                    
                                    </p>

                                    <!-- tawarrauq LAIN-LAIN  -->
                                    <p
                                        style="position: absolute;top: 258px;left: 369px;height: 17px;width: 270px;background: transparent;font-size: 9px !important;">
                                        
                                    </p>

                                    <!-- checkbox Qard LAIN-LAIN  -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 298px;
                                    left: 65px; font-size: 11pt;" unchecked>

                                    <!-- Qard nyatakan LAIN-LAIN  -->
                                    <p
                                    style="position: absolute;top: 290px;left: 186px;height: 17px;width: 177px;background: transparent;font-size: 9px !important;">
                                    
                                    </p>

                                    <!-- Qard LAIN-LAIN  -->
                                    <p
                                        style="position: absolute;top: 290px;left: 369px;height: 17px;width: 270px;background: transparent;font-size: 9px !important;">
                                        
                                    </p>

                                    </div>

                                    <!------------ A.Maklumat Asas ------------->
                                    <div>
                                    <!-- checkbox Status perniagaan (Sedang Berniaga) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 341px;
                                    left: 195px; font-size: 11pt;" '.($this->pdfData[0]->business_status == 'SEDANG BERNIAGA' ? 'checked' : '').'>

                                    <!-- checkbox Status perniagaan (Memulakan Perniagaan) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 353px;
                                    left: 195px; font-size: 11pt;" '.($this->pdfData[0]->business_status == 'MEMULAKAN PERNIAGAAN' ? 'checked' : '').'>

                                    <!-- checkbox kaedah perniagaan (online)  -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 365px;
                                    left: 195px; font-size: 11pt;" '.($this->pdfData[0]->business_method == 1 ? 'checked' : '').'>

                                    <!-- checkbox kaedah perniagaan (offline) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 365px;
                                    left: 293px; font-size: 11pt;" '.($this->pdfData[0]->business_method == 0 ? 'checked' : '').'>

                                    <!-- checkbox kaedah perniagaan (offline & online)  -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 365px;
                                    left: 350px; font-size: 11pt;" '.($this->pdfData[0]->business_method == 2 ? 'checked' : '').'>

                                    <!-- checkbox pertanian & perusahaan asas tani  -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 354px;
                                    left: 622px; font-size: 11pt;" '.($this->pdfData[0]->business_sector == 26 ? 'checked' : '').'>

                                    <!-- checkbox peruncitan  -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 365px;
                                    left: 622px; font-size: 11pt;" '.($this->pdfData[0]->business_sector == 9 ? 'checked' : '').'>

                                    <!-- checkbox perkhidmatan  -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 377px;
                                    left: 622px; font-size: 11pt;" '.($this->pdfData[0]->business_sector == 3 ? 'checked' : '').'>

                                    <!-- checkbox perbuatan  -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 386px;
                                    left: 622px; font-size: 11pt;" '.($this->pdfData[0]->business_sector == 4 ? 'checked' : '').'>

                                    <!-- checkbox  kontraktor kecil -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 398px;
                                    left: 622px; font-size: 11pt;" '.($this->pdfData[0]->business_sector == 7 ? 'checked' : '').'>

                                    <!-- Nama bank operasi perniagaan 1 -->
                                    <p
                                    style="position: absolute;top: 379px;left: 230px;height: 17px;width: 206px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->bank1 ? : ' ').'
                                    </p>

                                    <!-- no akaun bank 1 -->
                                    <p
                                    style="position: absolute;top: 392px;left: 230px;height: 17px;width: 206px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->bank1_acct ? : ' ').'
                                    </p>

                                    <!-- Nama bank operasi perniagaan 2 -->
                                    <p
                                    style="position: absolute;top: 403px;left: 230px;height: 17px;width: 206px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->bank2 ? : ' ').'
                                    </p>

                                    <!-- no akaun bank 2 -->
                                    <p
                                    style="position: absolute;top: 414px;left: 230px;height: 17px;width: 206px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->bank2_acct ? : ' ').'
                                    </p>

                                    <!-- Nama Permohon-->
                                    <p
                                    style="position: absolute;top: 446px;left: 186px;height: 17px;width: 451px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->name ? : ' ').'
                                    </p>

                                    <!-- No. KP (Baru)-->
                                    <p
                                    style="position: absolute;top: 469px;left: 186px;height: 17px;width: 250px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->ic_no ? : ' ').'
                                    </p>

                                    <!-- No. KP (Lama)-->
                                    <p
                                    style="position: absolute;top: 469px;left: 435px;height: 17px;width: 250px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->ic_old ? : ' ').'
                                    </p>

                                    <!-- checkbox jantina (Lelaki) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 487px;
                                    left: 168px; font-size: 11pt;" '.($this->pdfData[0]->gender == 'LELAKI' ? 'checked' : '').'>

                                    <!-- checkbox jantina (Perempuan) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 487px;
                                    left: 216px; font-size: 11pt;" '.($this->pdfData[0]->gender == 'PEREMPUAN' ? 'checked' : '').'>

                                    <!-- checkbox Agama (Islam) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 487px;
                                    left: 406px; font-size: 11pt;" '.($this->pdfData[0]->religion == 'ISLAM' ? 'checked' : '').'>

                                    <!-- checkbox Agama (bukan Islam) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 487px;
                                    left: 488px; font-size: 11pt;" '.($this->pdfData[0]->religion == 'BUKAN ISLAM' ? 'checked' : '').'>
                                    
                                    <!-- tarikh lahir -->
                                    <p
                                    style="position: absolute;top: 492px;left: 186px;height: 17px;width: 250px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->birthdate ? : ' ').'
                                    </p>

                                    <!-- bangsa/kaum -->
                                    <p
                                    style="position: absolute;top: 492px;left: 491px;height: 17px;width: 250px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->race ? : ' ').'
                                    </p>

                                    <!-- umur semasa memohon -->
                                    <p
                                    style="position: absolute;top: 515px;left: 159px;height: 17px;width: 250px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->age ? : ' ').'
                                    </p>

                                    <!-- checkbox taraf perkahwinan (bujang) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 526px;
                                    left: 319px; font-size: 11pt;" '.($this->pdfData[0]->marital == 'BUJANG' ? 'checked' : '').'>

                                    <!-- checkbox taraf perkahwinan (berkahwin) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 526px;
                                    left: 363px; font-size: 11pt;" '.($this->pdfData[0]->marital == 'BERKAHWIN' ? 'checked' : '').'>

                                    <!-- checkbox taraf perkahwinan (duda) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 526px;
                                    left: 410px; font-size: 11pt;" '.($this->pdfData[0]->marital == 'DUDA' ? 'checked' : '').'>

                                    <!-- checkbox taraf perkahwinan (ibu tunggal) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 526px;
                                    left: 456px; font-size: 11pt;" '.($this->pdfData[0]->marital == 'IBU TUNGGAL' ? 'checked' : '').'>

                                    <!-- bilangan tanggungan -->
                                    <p
                                    style="position: absolute;top: 514px;left: 567px;height: 17px;width: 250px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->dependent ? : ' ').'
                                    </p>

                                    <!-- checkbox orang kurang upaya (YA) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 543px;
                                    left: 312px; font-size: 11pt;" '.($this->pdfData[0]->oku == 1 ? 'checked' : '').'>

                                    <!-- checkbox orang kurang upaya (TIDAK) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 543px;
                                    left: 377px; font-size: 11pt;" '.($this->pdfData[0]->oku == 0 ? 'checked' : '').'>

                                    <!-- checkbox dibentikan bekerja semasa pendemik (YA) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 553px;
                                    left: 312px; font-size: 11pt;" '.($this->pdfData[0]->stop_worktime_flag == 1 ? 'checked' : '').'>

                                    <!-- checkbox odibentikan bekerja semasa pendemik (TIDAK) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 553px;
                                    left: 377px; font-size: 11pt;" '.($this->pdfData[0]->stop_worktime_flag == 0 ? 'checked' : '').'>

                                    <!-- checkbox asnaf berdaftar di bawah... (YA) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 565px;
                                    left: 312px; font-size: 11pt;" '.($this->pdfData[0]->asnaf_berdaftar_flag == 1 ? 'checked' : '').'>

                                    <!-- checkbox asnaf berdaftar di bawah (TIDAK) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 565px;
                                    left: 377px; font-size: 11pt;" '.($this->pdfData[0]->asnaf_berdaftar_flag == 0 ? 'checked' : '').'>


                                    <!-- checkbox taraf pendidikan (PHD / Sarjana Muda) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 587px;
                                    left: 168px; font-size: 11pt;" '.($this->pdfData[0]->education == 5 ? 'checked' : '').'>

                                    <!-- checkbox taraf pendidikan (Diploma / Stpm) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 587px;
                                    left: 292px; font-size: 11pt;" '.($this->pdfData[0]->education == 3 ? 'checked' : '').'>

                                    <!-- checkbox taraf pendidikan (PMR / Setaraf) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 587px;
                                    left: 377px; font-size: 11pt;" '.($this->pdfData[0]->education == 1 ? 'checked' : '').'>

                                    <!-- checkbox taraf pendidikan (Sarjana Muda) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 599px;
                                    left: 168px; font-size: 11pt;" '.($this->pdfData[0]->education == 4 ? 'checked' : '').'>

                                    <!-- checkbox taraf pendidikan (SPM/Sijil/Setaraf) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 599px;
                                    left: 292px; font-size: 11pt;" '.($this->pdfData[0]->education == 2 ? 'checked' : '').'>

                                    <!-- Alamat kediaman 1 -->
                                    <p
                                    style="position: absolute;top: 603px;left: 186px;height: 17px;width: 451px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->address1 ? : ' ').'
                                    </p>

                                    <!-- Alamat kediaman 2 -->
                                    <p
                                    style="position: absolute;top: 615px;left: 186px;height: 17px;width: 451px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->address2 ? : ' ').'
                                    </p>

                                    <!-- Alamat kediaman 3 -->
                                    <p
                                    style="position: absolute;top: 626px;left: 186px;height: 17px;width: 451px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->address2 === ' '? : ' ').'
                                    </p>

                                    <!-- Poskod -->
                                    <p
                                    style="position: absolute;top: 626px;left: 494px;height: 17px;width: 451px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->postcode ? : ' ').'
                                    </p>

                                    <!-- No telefon (rumah) -->
                                    <p
                                    style="position: absolute;top: 637px;left: 186px;height: 17px;width: 451px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->phone_home ? : ' ').'
                                    </p>

                                    <!-- No telefon (bimbit) -->
                                    <p
                                    style="position: absolute;top: 637px;left: 399px;height: 17px;width: 275px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->phone_hp ? : ' ').'
                                    </p>

                                    <!-- Emel -->
                                    <p
                                    style="position: absolute;top: 660px;left: 186px;height: 17px;width: 275px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->email ? : ' ').'
                                    </p>

                                    <!-- Facebook -->
                                    <p
                                    style="position: absolute;top: 660px;left: 366px;height: 17px;width: 275px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->facebook ? : ' ').'
                                    </p>

                                    <!-- Instagram -->
                                    <p
                                    style="position: absolute;top: 660px;left: 506px;height: 17px;width: 275px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->instagram ? : ' ').'
                                    </p>

                                    <!-- checkbox Status Kediaman (Sendiri) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 679px;
                                    left: 168px; font-size: 11pt;" '.($this->pdfData[0]->status_home == 'SENDIRI' ? 'checked' : '').'>

                                    <!-- checkbox Status Kediaman (Sewa) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 679px;
                                    left: 295px; font-size: 11pt;" '.($this->pdfData[0]->status_home == 'SEWA' ? 'checked' : '').'>

                                    <!-- checkbox Status Kediaman (Keluarga) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 679px;
                                    left: 379px; font-size: 11pt;" '.($this->pdfData[0]->status_home == 'KELUARGA' ? 'checked' : '').'>

                                    <!-- Pekerjaan sekarang -->
                                    <p
                                    style="position: absolute;top: 682px;left: 186px;height: 17px;width: 275px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->profession ? : ' ').'
                                    </p>

                                    <!-- Pendapatan RM/Bulan -->
                                    <p
                                    style="position: absolute;top: 682px;left: 452px;height: 17px;width: 275px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->income ? number_format($this->pdfData[0]->income, 2) : ' ').'
                                    </p>

                                    <!-- Nama Majikan (jika berkerja) -->
                                    <p
                                    style="position: absolute;top: 694px;left: 186px;height: 17px;width: 453px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->employer_name ? : ' ').'
                                    </p>

                                    <!-- Alamat Majikan 1 & 2 -->
                                    <p
                                    style="position: absolute;top: 706px;left: 186px;height: 17px;width: 453px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->employer_address1 ? : ' ').'
                                    </p>

                                    <!-- Alamat Majikan 3 -->
                                    <p
                                    style="position: absolute;top: 717px;left: 186px;height: 17px;width: 274px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->employer_address2 ? : ' ').'
                                    </p>

                                    <!-- No. Telefon Majikan -->
                                    <p
                                    style="position: absolute;top: 717px;left: 537px;height: 17px;width: 274px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->employer_phone ? : ' ').'
                                    </p>
                                    </div>

                                    <!------------ B.Maklumat Pasangaan Pemohon ------------->
                                    <div>
                                    <!-- Nama Suami/Isteri -->
                                    <p
                                    style="position: absolute;top: 759px;left: 186px;height: 17px;width: 453px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->spouse_name ? : ' ').'
                                    </p>

                                    <!-- No Kad Pengenalan -->
                                    <p
                                    style="position: absolute;top: 772px;left: 186px;height: 17px;width: 274px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->spouse_ic_no ? : ' ').'
                                    </p>

                                    <!-- No Passport -->
                                    <p
                                    style="position: absolute;top: 772px;left: 537px;height: 17px;width: 274px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->spouse_passport_no ? : ' ').'
                                    </p>

                                    <!-- Pekerjaan -->
                                    <p
                                    style="position: absolute;top: 784px;left: 186px;height: 17px;width: 274px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->spouse_profession ? : ' ').'
                                    </p>

                                    <!-- Alamat Majikan 1 -->
                                    <p
                                    style="position: absolute;top: 795px;left: 186px;height: 17px;width: 453px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->spouse_employer_address1 ? : ' ').'
                                    </p>

                                    <!-- Alamat Majikan 2 -->
                                    <p
                                    style="position: absolute;top: 806px;left: 186px;height: 17px;width: 453px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->spouse_employer_address2 ? : ' ').'
                                    </p>

                                    <!-- Alamat Majikan 3 -->
                                    <p
                                    style="position: absolute;top: 817px;left: 186px;height: 17px;width: 274px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->spouse_employer_address2 === ' ' ? : ' ').'
                                    </p>

                                    <!-- Poskod -->
                                    <p
                                    style="position: absolute;top: 817px;left: 537px;height: 17px;width: 274px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->spouse_employer_postcode ? : ' ').'
                                    </p>

                                    <!-- No. Telefon Majikan -->
                                    <p
                                    style="position: absolute;top: 828px;left: 186px;height: 17px;width: 274px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->spouse_employer_no ? : ' ').'
                                    </p>

                                    <!-- No. Telefon Bimbit -->
                                    <p
                                    style="position: absolute;top: 828px;left: 537px;height: 17px;width: 274px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->spouse_phone ? : ' ').'
                                    </p>

                                    <!-- Pendapatan RM/Bulan -->
                                    <p
                                    style="position: absolute;top: 839px;left: 201px;height: 17px;width: 274px;background: transparent;font-size: 9px !important;">
                                    '.($this->pdfData[0]->spouse_income ? number_format($this->pdfData[0]->spouse_income, 2) : ' ').'
                                    </p>

                                    </div>
                                    
                                </div>

                                <!--------------------------------------------------------------- page 2 ----------------------------------------------------------------------------->
                                <div class="page_break">
                                    
                                    <!------------ C.Maklumat Perniagaan ------------->
                                    <div>
                                    <div>
                                        <img src="'.$jpgPath2.'" alt="Responsive image" style="margin-top: 0px" width="700"
                                        height="900">
                                    </div>

                                    <!-- Nama Perniagaan / syarikat -->
                                    <p
                                        style="position: absolute;top: 43px;left: 185px;height: 25px;width: 250px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->business_name ? : ' ').'
                                    </p>

                                    <!-- No SSM / LESEN / ORDINAN -->
                                    <p
                                        style="position: absolute;top: 68px;left: 185px;height: 17px;width: 250px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->business_no ? : ' ').'
                                    </p>

                                    <!-- Aktiviti Perniagaan / projek -->
                                    <p
                                        style="position: absolute;top: 95px;left: 185px;height: 25px;width: 250px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->business_activity ? : ' ').'
                                    </p>

                                    <!-- Tempoh Pengalaman Berniaga -->
                                    <p
                                        style="position: absolute;top: 95px;left: 540px;height: 17px;width: 250px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->business_duration_year ? : ' ').'
                                    </p>

                                    <!-- Alamat Perniagaan / permis / projek  1 -->
                                    <p
                                        style="position: absolute;top: 122px;left: 185px;height: 17px;width: 450px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->business_address1 ? : ' ').'
                                    </p>

                                    <!-- Alamat Perniagaan / permis / projek  2 -->
                                    <p
                                        style="position: absolute;top: 134px;left: 185px;height: 17px;width: 450px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->business_address2 ? : ' ').'
                                    </p>

                                    <!-- Alamat Perniagaan / permis / projek  3 -->
                                    <p
                                        style="position: absolute;top: 147px;left: 185px;height: 17px;width: 275px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->business_address2 ? : ' ').'
                                    </p>

                                    <!-- Poskod -->
                                    <p
                                        style="position: absolute;top: 147px;left: 495px;height: 17px;width: 275px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->business_postcode ? : ' ').'
                                    </p>
                                    
                                    <!-- checkbox anggaran pendapatan kasar (< RM 5000) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 169px;
                                    left: 197px; font-size: 11pt;" '.($this->pdfData[0]->business_income == '< RM5,000' ? 'checked' : '').'>

                                    <!-- checkbox anggaran pendapatan kasar (RM 5000 - RM 10000) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 169px;
                                    left: 320px; font-size: 11pt;" '.($this->pdfData[0]->business_income == 'RM5,000 - RM10,000' ? 'checked' : '').'>

                                    <!-- checkbox anggaran pendapatan kasar (> RM 10000 - RM 50000) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 180px;
                                    left: 197px; font-size: 11pt;" '.($this->pdfData[0]->business_income == '> RM10,000 - RM50,000' ? 'checked' : '').'>

                                    <!-- checkbox anggaran pendapatan kasar (> RM 50000) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 181px;
                                    left: 320px; font-size: 11pt;" '.($this->pdfData[0]->business_income == '> RM50,000' ? 'checked' : '').'>


                                    <!-- No TEL (Premis) -->
                                    <p
                                    style="position: absolute;top: 183px;left: 185px;;height: 17px;width: 275px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->business_phone ? : ' ').'
                                    </p>
                                    
                                    <!-- No TEL (Bimbit) -->
                                    <p
                                    style="position: absolute;top: 183px;left: 401px;;height: 17px;width: 275px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->business_phone_hp ? : ' ').'
                                    </p>

                                    <!-- checkbox Status Premis (Sendiri) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 218px;
                                    left: 172px; font-size: 11pt;" '.($this->pdfData[0]->business_premise == 'SENDIRI' ? 'checked' : '').'>

                                    <!-- checkbox Status Premis (Sewa) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 218px;
                                    left: 297px; font-size: 11pt;" '.($this->pdfData[0]->business_premise == 'SEWA' ? 'checked' : '').'>

                                    <!-- checkbox Status Premis (Keluarga) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 218px;
                                    left: 353px; font-size: 11pt;" '.($this->pdfData[0]->business_premise == 'KELUARGA' ? 'checked' : '').'>

                                    <!-- checkbox Status Premis (Lain-lain) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 218px;
                                    left: 475px; font-size: 11pt;" '.($this->pdfData[0]->business_premise == 'LAIN-LAIN (SILA NYATAKAN)' ? 'checked' : '').'>

                                    <!-- Sila Nyatakan -->
                                    <p
                                    style="position: absolute;top: 221px;left: 561px;;height: 17px;width: 275px;background: transparent;font-size: 10px !important;">
                                    '.($this->pdfData[0]->business_other_premise ? : ' ').'
                                    </p>


                                    <!-- checkbox Pemilikan Perniagaan (Individu) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 242px;
                                    left: 217px; font-size: 11pt;" '.($this->pdfData[0]->business_ownership == 2 ? 'checked' : '').'>

                                    <!-- checkbox Pemilikan Perniagaan (Pemilik Tunggal) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 242px;
                                    left: 354px; font-size: 11pt;" '.($this->pdfData[0]->business_ownership == 3 ? 'checked' : '').'>

                                    <!-- checkbox Pemilikan Perniagaan (Perkongsian) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 242px;
                                    left: 476px; font-size: 11pt;" '.($this->pdfData[0]->business_ownership == 4 ? 'checked' : '').'>

                                    <!-- checkbox Sendirian Berhad (Modal Bayar) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 255px;
                                    left: 217px; font-size: 11pt;" '.($this->pdfData[0]->business_ownership == 5 ? 'checked' : '').'>

                                    <!-- RM -->
                                    <p
                                    style="position: absolute;top: 247px;left: 414px;;height: 17px;width: 275px;background: transparent;font-size: 10px !important;">
                                    '.($this->pdfData[0]->business_modal ? number_format($this->pdfData[0]->business_modal, 2) : ' ').'
                                    </p>

                                    <!-- checkbox Adakah Pemohonan Pemegang Saham (YA) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 267px;
                                    left: 477px; font-size: 11pt;" '.($this->pdfData[0]->shareholder == 1 ? 'checked' : '').'>

                                    <!-- checkbox Adakah Pemohonan Pemegang Saham (TIDAK) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 267px;
                                    left: 548px; font-size: 11pt;" '.($this->pdfData[0]->shareholder == 0 ? 'checked' : '').'>

                                    <!-- Tarikh Didaftarkan -->
                                    <p
                                    style="position: absolute;top: 271px;left: 185px;;height: 17px;width: 275px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->register_date ? : ' ').'
                                    </p>

                                    <!-- Tarikh Tamat Lesen -->
                                    <p
                                    style="position: absolute;top: 284px;left: 185px;;height: 17px;width: 275px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->license_expired_date ? : ' ').'
                                    </p>

                                    <!-- checkbox Keahlihan Persatuan (YA) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 305px;
                                    left: 217px; font-size: 11pt;" '.($this->pdfData[0]->membership_status == 'YA'  ? 'checked' : '').'>

                                    <!-- checkbox Keahlihan Persatuan (TIDAK) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 305px;
                                    left: 298px; font-size: 11pt;" '.($this->pdfData[0]->membership_status === 'TIDAK'? 'checked' : '').'>

                                    <!-- checkbox sekiranya ya sila nyatakan (Dewan Perniagaan) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 331px;
                                    left: 83px; font-size: 11pt;" '.($this->pdfData[0]->membership_assoc === 'DEWAN PERNIAGAAN' ? 'checked' : '').'>

                                    <!-- checkbox sekiranya ya sila nyatakan (Persatuan Penjaja / Peniaga) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 344px;
                                    left: 83px; font-size: 11pt;" '.($this->pdfData[0]->membership_assoc === 'PERSATUAN PENJAJA / PENIAGA'? 'checked' : '').'>

                                    <!-- Masa Berniaga (DARI) -->
                                    <p
                                    style="position: absolute;top: 385px;left: 208px;;height: 17px;width: 275px;background: transparent;font-size: 10px !important;">
                                        '.($businessOpenFormatted ? : ' ').'
                                    </p>
                                    <!-- Masa Berniaga (DARI - PAGI) -->
                                    <p style="position: absolute;top: 378px;left: 257px;height: 17px;width: 10px;background: transparent;font-size: 10px !important; border-bottom: '.($masaBukak == 'pagi' ? '1px solid black' : 'none').';">
                                    </p>

                                    <!-- Masa Berniaga (DARI - PETANG) -->
                                    <p style="position: absolute;top: 378px;left: 281px;height: 17px;width: 10px;background: transparent;font-size: 10px !important; border-bottom: '.($masaBukak == 'petang' ? '1px solid black' : 'none').';">
                                    </p>

                                    <!-- Masa Berniaga (DARI - MALAM) -->
                                    <p style="position: absolute;top: 378px;left: 306px;height: 17px;width: 10px;background: transparent;font-size: 10px !important; border-bottom: '.($masaBukak == 'malam' ? '1px solid black' : 'none').';">
                                    </p>
                                    <!-- Masa Berniaga (HINGGA) -->
                                    <p
                                    style="position: absolute;top: 385px;left: 406px;;height: 17px;width: 275px;background: transparent;font-size: 10px !important;">
                                        '.($businessCloseFormatted ? : ' ').'
                                    </p>
                                    <!-- Masa Berniaga (HINGGA - PAGI) -->
                                    <p
                                    style="position: absolute;top: 378px;left: 457px;height: 17px;width: 10px;background: transparent;font-size: 10px !important; border-bottom: '.($masaTutup == 'pagi' ? '1px solid black' : 'none').';">
                                    </p>
                                    <!-- Masa Berniaga (HINGGA - PETANG) -->
                                    <p
                                    style="position: absolute;top: 378px;left: 478px;height: 17px;width: 10px;background: transparent;font-size: 10px !important; border-bottom: '.($masaTutup == 'petang' ? '1px solid black' : 'none').';">
                                    </p>
                                    <!-- Masa Berniaga (HINGGA - MALAM) -->
                                    <p
                                    style="position: absolute;top: 378px;left: 506px;height: 17px;width: 10px;background: transparent;font-size: 10px !important; border-bottom: '.($masaTutup == 'malam' ? '1px solid black' : 'none').';">
                                    </p>
                                    
                                    <!-- checkbox Pengitirafan (YA) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 419px;
                                    left: 327px; font-size: 11pt;" '.($this->pdfData[0]->cert_recognition_flag === '1' ? 'checked' : '').'>

                                    <!-- checkbox Pengitirafan (TIDAK) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 419px;
                                    left: 421px; font-size: 11pt;" '.($this->pdfData[0]->cert_recognition_flag === '0' ? 'checked' : '').'>
                                    
                                    <!-- Nilai Asset Perniagaan Sedia Ada -->
                                    <p
                                    style="position: absolute;top: 434px;left: 326px;;height: 17px;width: 275px;background: transparent;font-size: 10px !important;">
                                    '.($this->pdfData[0]->business_asset_value ? number_format($this->pdfData[0]->business_asset_value, 2) : ' ').'
                                    </p>

                                    <!-- Sumber Modal Memulakan Perniagaan -->
                                    <p
                                    style="position: absolute;top: 460px;left: 310px;;height: 17px;width: 326px;background: transparent;font-size: 10px !important;">
                                     '.($this->pdfData[0]->business_start_resources ? number_format($this->pdfData[0]->business_start_resources, 2) : ' ').'
                                    </p>

                                    <!-- Nama Kursus yang dihadiri anjuran -->
                                    <p
                                    style="position: absolute;top: 495px;left: 310px;;height: 17px;width: 326px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->course_name_attend ? : ' ').'
                                    </p>

                                    <!-- checkbox Nama Agensi Penganjur (INSKEN) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 531px;
                                    left: 329px; font-size: 11pt;" '.($this->pdfData[0]->agency_name === 'INSKEN' ? 'checked' : '').'>

                                    <!-- checkbox Nama Agensi Penganjur (SME CORP) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 531px;
                                    left: 393px; font-size: 11pt;" '.($this->pdfData[0]->agency_name === 'SME CORP' ? 'checked' : '').'>

                                    <!-- checkbox Nama Agensi Penganjur (CEDAR) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 531px;
                                    left: 480px; font-size: 11pt;" '.($this->pdfData[0]->agency_name === 'CEDAR' ? 'checked' : '').'>

                                    <!-- checkbox Nama Agensi Penganjur (Lain-Lain) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 531px;
                                    left: 532px; font-size: 11pt;" '.($this->pdfData[0]->agency_name === 'LAIN-LAIN' ? 'checked' : '').'>

                                    <!-- Kursus kursus lain yang dihadiri 1-->
                                    <p
                                    style="position: absolute;top: 547px;left: 341px;;height: 17px;width: 326px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->course_name_attend2 ? : ' ').'
                                    </p>

                                    <!-- Kursus kursus lain yang dihadiri 2-->
                                    <p
                                    style="position: absolute;top: 560px;left: 341px;;height: 17px;width: 326px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->course_name_attend3 ? : ' ').'
                                    </p>

                                    <!-- Sila nyatakan perniagaan terdahulu -->
                                    <p
                                    style="position: absolute;top: 584px;left: 310px;;height: 25px;width: 326px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->previous_business ? : ' ').'
                                    </p>

                                    </div>

                                    <!------------ C.Maklumat Pembiayaan Peniagaan Sedia Ada ------------->
                                    <div>
                                    <!-- checkbox Ada -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 651px;
                                    left: 90px; font-size: 11pt;" '.($this->pdfData[0]->fin_details_flag == '1' ? 'checked' : '').'>

                                    <!-- checkbox Tiada -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 651px;
                                    left: 206px; font-size: 11pt;" '.($this->pdfData[0]->fin_details_flag == '0' ? 'checked' : '').'>


                                    <!-- checkbox Institusi Pembiayaan (Mara) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 675px;
                                    left: 231px; font-size: 11pt;" '.(
                                        in_array('MARA', [
                                            $this->pdfData[0]->fin1_flag ?? '',
                                            $this->pdfData[0]->fin2_flag ?? '',
                                            $this->pdfData[0]->fin3_flag ?? ''
                                        ]) ? 'checked' : ''
                                    ).'
                                    >

                                    <!-- checkbox Institusi Pembiayaan (Aim) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 675px;
                                    left: 292px; font-size: 11pt;" '.(
                                        in_array('AIM', [
                                            $this->pdfData[0]->fin1_flag ?? '',
                                            $this->pdfData[0]->fin2_flag ?? '',
                                            $this->pdfData[0]->fin3_flag ?? ''
                                        ]) ? 'checked' : ''
                                    ).'
                                    >

                                    <!-- checkbox Institusi Pembiayaan (lain-lain agensi pembiayaan) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 675px;
                                    left: 347px; font-size: 11pt;" '.(
                                        in_array('LAIN-LAIN', [
                                            $this->pdfData[0]->fin1_flag ?? '',
                                            $this->pdfData[0]->fin2_flag ?? '',
                                            $this->pdfData[0]->fin3_flag ?? ''
                                        ]) ? 'checked' : ''
                                    ).'
                                    >

                                    <!-- Institusi Pembiayaan (lain-lain agensi pembiayaan) -->
                                    <p
                                    style="position: absolute;top: 667px;left: 489px;;height: 25px;width: 326px;background: transparent;font-size: 10px !important;">
                                    '.(implode(', ', array_filter([
                                        $this->pdfData[0]->fin1_other_name ?? '',
                                        $this->pdfData[0]->fin2_other_name ?? '',
                                        $this->pdfData[0]->fin3_other_name ?? ''
                                    ])) ?: ' ').'                                    
                                    </p>

                                    <!-- Jumlah Pembiayaan -->
                                    <p
                                    style="position: absolute;top: 679px;left: 245px;;height: 25px;width: 326px;background: transparent;font-size: 10px !important;">
                                    '.(
                                        implode(', ', array_filter([
                                            $this->pdfData[0]->fin1_tot !== null ? number_format((float)$this->pdfData[0]->fin1_tot ?? 0, 2) : '',
                                            $this->pdfData[0]->fin2_tot !== null ? number_format((float)$this->pdfData[0]->fin2_tot ?? 0, 2) : '', 
                                            $this->pdfData[0]->fin3_tot !== null ? number_format((float)$this->pdfData[0]->fin3_tot ?? 0, 2) : ''
                                        ])) ?: ' '
                                    ).'
                                    </p>

                                    <!-- Jumlah Pembiayaan -->
                                    <p
                                    style="position: absolute;top: 679px;left: 525px;;height: 25px;width: 326px;background: transparent;font-size: 10px !important;">
                                    '.(
                                        implode(', ', array_filter([
                                            $this->pdfData[0]->fin1_tot !== null ? number_format((float)$this->pdfData[0]->fin1_bal ?? 0, 2) : '',
                                            $this->pdfData[0]->fin2_tot !== null ? number_format((float)$this->pdfData[0]->fin2_bal ?? 0, 2) : '', 
                                            $this->pdfData[0]->fin3_tot !== null ? number_format((float)$this->pdfData[0]->fin3_bal ?? 0, 2) : ''
                                        ])) ?: ' '
                                    ).'
                                    </p>
                                    </div>

                                    <!------------ D.Keterangan Mengenai Pembiayaan yang dipohon ------------->
                                    <div>
                                    <!-- Jumlah Pembiayaan yang diperlukan -->
                                    <p
                                    style="position: absolute;top: 724px;left: 521px;;height: 25px;width: 326px;background: transparent;font-size: 10px !important;">
                                    '.($this->pdfData[0]->purchase_price ? number_format($this->pdfData[0]->purchase_price, 2) : ' ').'
                                    </p>

                                    <!-- Tempoh Bayaran -->
                                    <p style="position: absolute;top: 747px;left: 183px;;height: 25px;width: 326px;background: transparent;font-size: 10px !important;">
                                    '.($this->pdfData[0]->pymt_duration ? : ' ').'                               
                                    </p>

                                    <!-- checkbox Kekerapan Bayaran (Mingguan) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 783px;
                                    left: 215px; font-size: 11pt;" '.($this->pdfData[0]->pymt_frequency == 'MINGGUAN' ? 'checked' : '').'>  

                                    <!-- checkbox  Kekerapan Bayaran (Bulanan) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 783px;
                                    left: 297px; font-size: 11pt;" '.($this->pdfData[0]->pymt_frequency == 'BULANAN' ? 'checked' : '').'>

                                    <!-- checkbox Kekerapan Bayaran (Mengikut Tempoh Kontrak Kerja / Inden) -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 782px;
                                    left: 424px; font-size: 11pt;" '.($this->pdfData[0]->pymt_frequency == 'MENGIKUT TEMPOH KONTRAK KERJA/INDEN' ? 'checked' : '').'>
                                    </div>
                                </div>

                                <!--------------------------------------------------------------- page 3 ----------------------------------------------------------------------------->
                                <div class="page_break">
                                    <!------------ F.Sokongan Kumpulan (Teman Tekun sahaja) ------------->
                                    <div>
                                    <div>
                                        <img src="'.$jpgPath3.'" alt="Responsive image" style="margin-top: 0px" width="700"
                                        height="900">
                                    </div>

                                    <!-- Tempoh Pekenalan pemohon dengan kumpulan -->
                                    <p
                                        style="position: absolute;top: 118px;left: 368px;height: 17px;width: 250px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->duration_intro_team ? : ' ').'
                                    </p>

                                    <!-- tarik perbincangan kumpulan -->
                                    <p
                                        style="position: absolute;top: 131px;left: 368px;height: 17px;width: 250px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->discussion_date ? : ' ').'
                                    </p>

                                    <!-- Jumlah Pembiayaan yang Disokong -->
                                    <p
                                        style="position: absolute;top: 144px;left: 368px;height: 17px;width: 250px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->supported_fin_amount ? : ' ').'
                                    </p>
                                    </div>

                                    <!------------ G.Pengesahan & Perakuan (Teman Tekun sahaja) ------------->
                                    <div>
                                    <!-- Nama -->
                                    <p
                                        style="position: absolute;top: 213px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->grp_leader_name ? : ' ').'
                                    </p>

                                    <!-- Alamat 1 & 2 -->
                                    <p
                                        style="position: absolute;top: 227px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->group_leader_addr1 ? : ' ').'
                                    </p>

                                    <!-- Alamat 3 -->
                                    <p
                                        style="position: absolute;top: 240px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->group_leader_addr2 ? : ' ').'
                                    </p>

                                    <!-- No Telefon -->
                                    <p
                                        style="position: absolute;top: 253px;left: 218px;height: 17px;width: 250px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->group_leader_addr3 ? : ' ').'
                                    </p>

                                    <!-- Tarikh -->
                                    <p
                                        style="position: absolute;top: 285px;left: 81px;height: 25px;width: 250px;background: transparent;font-size: 10px !important;">
                                        
                                    </p>
                                    </div>

                                    <!------------ H.Perujuk ------------->
                                    <div>
                                    <!-- Nama -->
                                    <p
                                        style="position: absolute;top: 368px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->reference_name ? : ' ').'
                                    </p>

                                    <!-- No Kad Pengenalan -->
                                    <p
                                        style="position: absolute;top: 382px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->reference_icno ? : ' ').'
                                    </p>

                                    <!--  Alamat 1 & 2  -->
                                    <p
                                        style="position: absolute;top: 395px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->reference_address1 ? : ' ').'
                                    </p>

                                    <!--  Alamat 3  -->
                                    <p
                                        style="position: absolute;top: 408px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->reference_address2 ? : ' ').'
                                    </p>

                                    <!--  Hubungan Dengan Pemohon -->
                                    <p
                                        style="position: absolute;top: 421px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->reference_relation ? : ' ').' 
                                    </p>

                                    <!--  No Telefon -->
                                    <p
                                        style="position: absolute;top: 433px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->reference_phone ? : ' ').' 
                                    </p>

                                    <!-- Nama (2) -->
                                    <p
                                        style="position: absolute;top: 455px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->reference2_name ? : ' ').' 
                                    </p>

                                    <!-- No Kad Pengenalan (2) -->
                                    <p
                                        style="position: absolute;top: 469px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->reference2_icno ? : ' ').' 
                                    </p>

                                    <!--  Alamat 1 & 2 (2) -->
                                    <p
                                        style="position: absolute;top: 483px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->reference2_address1 ? : ' ').' 
                                    </p>

                                    <!--  Alamat 3 (2) -->
                                    <p
                                        style="position: absolute;top: 496px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->reference2_address2 ? : ' ').' 
                                    </p>

                                    <!--  Hubungan Dengan Pemohon (2) -->
                                    <p
                                        style="position: absolute;top: 508px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->reference2_relation ? : ' ').' 
                                    </p>

                                    <!--  No Telefon (2) -->
                                    <p
                                        style="position: absolute;top: 521px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->reference2_phone ? : ' ').' 
                                    </p>

                                    </div>

                                    <!------------ L.Perlindungan Takaful dan Pekeso ------------->
                                    <div>
                                        <!-- 2) YA -->
                                        <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 630px;
                                        left: 92px; font-size: 11pt;" '.($this->pdfData[0]->takaful_incident == 1 ? 'checked' : '').'>

                                        <!-- 2) TIDAK -->
                                        <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 667px;
                                        left: 92px; font-size: 11pt;" '.($this->pdfData[0]->takaful_incident == 0 ? 'checked' : '').'>

                                        <!-- 3) YA caruman pilihan -->
                                        <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 742px;
                                        left: 95px; font-size: 11pt;" '.($this->pdfData[0]->skim_safety == 1 ? 'checked' : '').'>

                                        <!-- 3) pakej 1  -->
                                        <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 742px;
                                        left: 218px; font-size: 11pt;" '.($this->pdfData[0]->pakej_skim_safety == 1 ? 'checked' : '').'>

                                        <!-- 3) pakej 2  -->
                                        <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 754px;
                                        left: 218px; font-size: 11pt;" '.($this->pdfData[0]->pakej_skim_safety == 2 ? 'checked' : '').' >

                                        <!-- 3) pakej 3  -->
                                        <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 742px;
                                        left: 354px; font-size: 11pt;" '.($this->pdfData[0]->pakej_skim_safety == 3 ? 'checked' : '').'>

                                        <!-- 3) pakej 4  -->
                                        <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 754px;
                                        left: 354px; font-size: 11pt;" '.($this->pdfData[0]->pakej_skim_safety == 4 ? 'checked' : '').'>

                                        <!-- Sektor -->
                                        <p
                                        style="position: absolute;top: 781px;left: 117px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                            '.($this->pdfData[0]->sektor_perkeso ? : ' ').' 

                                        </p>

                                        <!-- Kelas -->
                                        <p
                                        style="position: absolute;top: 781px;left: 401px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                            '.($this->pdfData[0]->kelas_perkeso ? : ' ').' 

                                        </p>

                                        <!-- Tidak -->
                                        <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 815px;
                                        left: 95px; font-size: 11pt;" '.($this->pdfData[0]->skim_safety == 0 ? 'checked' : '').'>
                                    </div>
                                </div>


                                <!--------------------------------------------------------------- page 4 ----------------------------------------------------------------------------->
                                <div class="page_break">
                                    <!------------ J.Pendaftaran wasiat (jika berkenaan) ------------->
                                    <div>
                                    <div>
                                        <img src="'.$jpgPath4.'" alt="Responsive image" style="margin-top: 0px" width="700"
                                        height="900">
                                    </div>

                                    <!-- YA -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 63px;
                                    left: 80px; font-size: 11pt;" '.($this->pdfData[0]->will_registration == 1 ? 'checked' : '').'>

                                    <!-- Jumlah Bayaran pendaftaran wasiat RM -->
                                    <p
                                        style="position: absolute;top: 53px;left: 302px;height: 17px;width: 250px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->will_fi  ? : '0').'
                                    </p>

                                    <!-- Nama Syarikat Wasiat -->
                                    <p
                                        style="position: absolute;top: 88px;left: 286px;height: 17px;width: 350px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->will_comp_name  ? : ' ').'
                                    </p>

                                    <!-- Nama Perujuk (pegawai tekun) -->
                                    <p
                                        style="position: absolute;top: 99px;left: 286px;height: 17px;width: 350px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->will_officer_name  ? : ' ').'
                                    </p>

                                    <!-- No Kad Pengenalan Perujuk (pegawai tekun) -->
                                    <p
                                        style="position: absolute;top: 112px;left: 286px;height: 17px;width: 350px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->will_officer_icno  ? : ' ').'
                                    </p>

                                    <!-- No Telefon Perujuk (pegawai tekun) -->
                                    <p
                                        style="position: absolute;top: 123px;left: 286px;height: 17px;width: 350px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->will_officer_phone  ? : ' ').'
                                    </p>

                                    <!-- Tidak -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 154px;
                                    left: 80px; font-size: 11pt;" '.($this->pdfData[0]->will_registration == 0 ? 'checked' : '').'>

                                    </div>

                                    <!------------ K.Kebenaran Penzahiran Maklumat Kredit individu ------------->
                                    <div>
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 201px;
                                    left: 65px; font-size: 11pt;" checked>
                                    </div>

                                    <!------------ L.Kebenaran Penzahiran maklumat kredit individu ------------->
                                    <div>
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 379px;
                                    left: 66px; font-size: 11pt;" checked>

                                    <!-- Tarikh -->
                                    <p
                                    style="position: absolute;top: 501px;left: 81px;height: 17px;width: 250px;background: transparent;font-size: 10px !important;">
                                        
                                    </p>
                                    </div>

                                    <!------------ M.Perakuan Penamaan ------------->
                                    <div>
                                    <!-- Nama -->
                                    <p
                                    style="position: absolute;top: 574px;left: 216px;height: 17px;width: 450px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->name_penamaan  ? : ' ').'
                                    </p>

                                    <!-- No Kad Pengenalan -->
                                    <p
                                    style="position: absolute;top: 588px;left: 216px;height: 17px;width: 450px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->icno_penamaan  ? : ' ').'
                                    </p>

                                    <!-- No Passport -->
                                    <p
                                    style="position: absolute;top: 588px;left: 536px;height: 17px;width: 450px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->passportno_penamaan  ? : ' ').'
                                    </p>

                                    <!-- Alamat 1 & 2 -->
                                    <p
                                    style="position: absolute;top: 602px;left: 216px;height: 17px;width: 322px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->penamaan_addr1  ? : ' ').'
                                    </p>

                                    <!-- Alamat 3 -->
                                    <p
                                    style="position: absolute;top: 615px;left: 216px;height: 17px;width: 322px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->penamaan_addr2  ? : ' ').'
                                    </p>

                                    <!-- Hubungan dengan pemohon -->
                                    <p
                                    style="position: absolute;top: 628px;left: 216px;height: 17px;width: 322px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->penamaan_relationship  ? : ' ').'
                                    </p>

                                    <!-- No Telefon -->
                                    <p
                                    style="position: absolute;top: 643px;left: 216px;height: 17px;width: 322px;background: transparent;font-size: 10px !important;">
                                        '.($this->pdfData[0]->penamaan_phone  ? : ' ').'
                                    </p>

                                    <!-- checkbox 1 -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 675px;
                                    left: 66px; font-size: 11pt;" checked>

                                    <!-- checkbox 2 -->
                                    <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 702px;
                                    left: 66px; font-size: 11pt;" checked>
                                    
                                    <!-- Tarikh -->
                                    <p
                                    style="position: absolute;top: 730px;left: 81px;height: 17px;width: 250px;background: transparent;font-size: 10px !important;">
                                        
                                    </p>

                                    <!-- Tarikh -->
                                    <p
                                    style="position: absolute;top: 801px;left: 81px;height: 17px;width: 250px;background: transparent;font-size: 10px !important;">
                                        
                                    </p>
                                    
                                    <!-- Notis Cetakan Komputer -->
                                    <p
                                    style="position: absolute;top: 900px;left: 0;right: 0;width: 100%;text-align: center;background: transparent;font-size: 10px !important;font-style: italic;">
                                        Dokumen ini adalah cetakan komputer, tandatangan tidak diperlukan
                                    </p>
                                </div>

                            </div>
                                </body>

                            </html>';

                    // e) Generate PDF using DomPDF
                    $pdf = FacadePdf::loadHTML($html);

                    // f) Save the PDF to storage
                    $pdf->save($pdfFullPath);

                //end for bpc01 pdf generation


                //start view pdf
                    $pdfName2 = 'view_form_' . now()->format('Y-m-d') . '.pdf';
                    $pdfFullPath2 = storage_path('app/public/' . $folderName . '/' . $pdfName2);
                    
                    Log::info('View form PDF will be saved to: ' . $pdfFullPath2);

                    // Ensure the directory exists
                    $directory2 = dirname($pdfFullPath2);
                    if (!file_exists($directory2)) {
                        mkdir($directory2, 0755, true);
                        Log::info('Created directory: ' . $directory2);
                    }

                    $html = view('pdf.view_form', ['data' => $this->pdfData[0]])->render();

                    // c) Generate PDF using DomPDF (or your PDF facade)
                    $pdf2 = FacadePdf::loadHTML($html);

                    // d) Save the PDF to storage
                    $pdf2->save($pdfFullPath2);
                    Log::info('View form PDF generated successfully');
                //end view pdf

                // 3) Store the PDF path in application_pdf table
                application_pdf::create([
                    'appln_id'   => $applnStatus->id,
                    'paths'      => $pdfFullPath,
                    'created_at' => now(),
                    'created_by' => Auth::id(),
                    'updated_at' => now(),
                    'updated_by' => Auth::id(),
                ]);
                
                // // Flash the PDF URL to the session so the view can access it.
                // session()->flash('pdf_url', asset('app/public/' . $pdfName));
                // session()->flash('message', 'Permohonan telah dihantar.');

                // Store and flash the PDF URL
                session()->flash('pdf_url', asset('app/public/' . $folderName . '/' . $pdfName));
                session()->flash('message', 'Permohonan telah dihantar.');

                // --- MERGE PDF SECTION ---
                Log::info('Starting PDF merge process');

                // Initialize PDFMerger
                $oMerger = PDFMergerFacade::init();

                // Define all required files
                $bankPdfName = 'ic_' . now()->format('Y-m-d') . '.pdf';
                $businessPdfName = 'icP_' . now()->format('Y-m-d') . '.pdf';
                $iicPdfName = 'ssm_' . now()->format('Y-m-d') . '.pdf';
                $iic2PdfName = 'business_' . now()->format('Y-m-d') . '.pdf';
                $ssmPdfName = 'bank_' . now()->format('Y-m-d') . '.pdf';
                
                $bankPdfPath = storage_path('app/public/' . $folderName . '/' . $bankPdfName);
                $businessPdfPath = storage_path('app/public/' . $folderName . '/' . $businessPdfName);
                $iicPdfPath = storage_path('app/public/' . $folderName . '/' . $iicPdfName);
                $iic2PdfPath = storage_path('app/public/' . $folderName . '/' . $iic2PdfName);
                $ssmPdfPath = storage_path('app/public/' . $folderName . '/' . $ssmPdfName);

                // Check all required files before starting the merge
                $requiredFiles = [
                    'bpc01' => $pdfFullPath,
                    'ic' => $bankPdfPath,
                    'icP' => $businessPdfPath,
                    'ssm' => $iicPdfPath,
                    'business' => $iic2PdfPath,
                    'bank' => $ssmPdfPath
                ];

                $missingFiles = [];
                foreach ($requiredFiles as $fileType => $filePath) {
                    if (!file_exists($filePath)) {
                        $missingFiles[] = $fileType;
                        Log::error("$fileType PDF not found at: " . $filePath);
                    }
                }

                if (!empty($missingFiles)) {
                    $errorMessage = 'File berikut tidak ditemukan: ' . implode(', ', $missingFiles);
                    Log::error($errorMessage);
                    session()->flash('error', $errorMessage);
                    return redirect()->back();
                }

                // All files exist, proceed with merging
                Log::info('All required files found, proceeding with merge');

                // 1) Add the first PDF (bpc01) using all pages
                Log::info('Adding bpc01 PDF: ' . $pdfFullPath);
                $oMerger->addPDF($pdfFullPath, 'all');

                // 2) IC PDF
                Log::info('Adding IC PDF: ' . $bankPdfPath);
                $oMerger->addPDF($bankPdfPath, 'all');

                // 3) Add icP PDF
                Log::info('Adding icP PDF: ' . $businessPdfPath);
                $oMerger->addPDF($businessPdfPath, 'all');

                // 4) Add ssm PDF
                Log::info('Adding SSM PDF: ' . $iicPdfPath);
                $oMerger->addPDF($iicPdfPath, 'all');

                // 5) Add business PDF
                Log::info('Adding business PDF: ' . $iic2PdfPath);
                $oMerger->addPDF($iic2PdfPath, 'all');

                // 6) Add bank PDF
                Log::info('Adding bank PDF: ' . $ssmPdfPath);
                $oMerger->addPDF($ssmPdfPath, 'all');

                // 7) Add perkeso PDF if needed
                // Merge perkeso only if it was actually uploaded
                if ($this->pdfData[0]->skim_safety == 0) {
                    $perkesoPdfName = 'perkeso_' . now()->format('Y-m-d') . '.pdf';
                    $perkesoPdfPath = storage_path('app/public/' . $folderName . '/' . $perkesoPdfName);
                    Log::info('Adding perkeso PDF: ' . $perkesoPdfPath . ', exists: ' . (file_exists($perkesoPdfPath) ? 'Yes' : 'No'));

                    if (file_exists($perkesoPdfPath)) {
                        $oMerger->addPDF($perkesoPdfPath, 'all');
                    } else {
                        Log::warning('Perkeso PDF not found but continuing anyway as it might be optional');
                    }
                }

                // 8) Merge everything into a single PDF
                $mergedPdfName = 'appln_' . now()->format('Y-m-d') . '.pdf';
                $mergedPdfFullPath = storage_path('app/public/' . $folderName . '/' . $mergedPdfName);
                Log::info('Saving merged PDF to: ' . $mergedPdfFullPath);

                // Pastikan direktori untuk file gabungan ada
                $mergedDir = dirname($mergedPdfFullPath);
                if (!file_exists($mergedDir)) {
                    if (!mkdir($mergedDir, 0755, true)) {
                        Log::error("Failed to create directory: " . $mergedDir);
                        session()->flash('error', 'Gagal membuat direktori untuk file gabungan');
                        return redirect()->back();
                    }
                }

                // Periksa apakah direktori dapat ditulis
                if (!is_writable($mergedDir)) {
                    Log::error("Directory is not writable: " . $mergedDir);
                    session()->flash('error', 'Direktori tidak dapat ditulis: ' . $mergedDir);
                    return redirect()->back();
                }

                $fileNames['document_merge'] = $mergedPdfName;

                try {
                    $oMerger->merge();
                    $oMerger->save($mergedPdfFullPath);
                    Log::info('PDF merge completed successfully');
                } catch (\Exception $e) {
                    Log::error('Error during PDF merge: ' . $e->getMessage());
                    session()->flash('error', 'Gagal menggabungkan PDF: ' . $e->getMessage());
                    return redirect()->back();
                }

                
                $applnId = $appln_id;
    
                $updatedData = array_merge(
                    $fileNames,  // store the filenames in DB, not the full path
                    ['appln_id' => $applnId]
                );
    
                ModelsMaklumatPinjaman::where('appln_id', $applnId)->update($updatedData);

                
                
            } else {
                session()->flash('error', 'Permohonan tidak wujud.');
            }

            // 1) The source is in storage/app/public/{IC_Number}
            // 2) The destination is public/storage/{IC_Number}
            $sourceDir = storage_path("app/public/{$folderName}");
            $destinationDir = public_path("storage/{$folderName}");
            Log::info('Copying files from ' . $sourceDir . ' to ' . $destinationDir);

            // Make sure the destination folder exists
            if (!File::isDirectory($destinationDir)) {
                File::makeDirectory($destinationDir, 0755, true);
                Log::info('Created destination directory: ' . $destinationDir);
            }

            // Copy every file from source folder to destination
            $files = File::allFiles($sourceDir);
            Log::info('Found ' . count($files) . ' files to copy');

            foreach ($files as $file) {
                $destPath = $destinationDir . DIRECTORY_SEPARATOR . $file->getFilename();
                File::copy($file->getRealPath(), $destPath);
                Log::info('Copied: ' . $file->getFilename());
            }
            
            // // Sebelum pengarahan ke dashboard
            // Log::info('Semua operasi selesai, mengarahkan ke dashboard');
            // $this->dispatchBrowserEvent('redirectToDashboard', ['url' => route('dashboard')]);
            
            // Add this line as a backup redirect method
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            Log::error('Error in submitPermohonan: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }


    public function viewPDF(){
        $pdf = PDF::loadView('PDFView')->setPaper('A4','portrait');
    }


    public function render()
    {
        return view('livewire.module.muat-naik-dokumen');
    }
}