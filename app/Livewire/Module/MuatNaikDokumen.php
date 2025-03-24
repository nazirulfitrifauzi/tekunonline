<?php

namespace App\Livewire\Module;

use App\Models\ApplnStatus;
use App\Models\MaklumatPinjaman;
use App\Models\application_pdf;
use App\Traits\MuatNaikDokumenValidation;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use PDF;

class MuatNaikDokumen extends Component
{
    use WithFileUploads;
    use MuatNaikDokumenValidation;

    public $document;
    public $existingData;
    public $appln_id;
    public $show_hantar = false;
    public $sp;

    protected $queryString = ['appln_id'];

    // Rest of the mount method remains the same
    public function mount()
    {    
        // Existing code remains the same
        $existingData = null; // Initialize to avoid undefined variable issues

        $applnStatus = ApplnStatus::where('id', $this->appln_id)->first();
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
    //     $fileNames['document_merge'] = $mergedFileName;

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
        //dd($this->appln_id);
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
        $fileNames['document_merge'] = $mergedFileName;

        // Find or create the MaklumatPinjaman record
        $applnId      = $this->appln_id;
        
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
        // If $applnId already exists in your component
        //return redirect()->route('home', ['appln_id' => $applnId]);
        $this->show_hantar = true;


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

    public function submitPermohonan()
    {
        // $p = ApplnStatus::where('user_id', Auth::id())
        // ->where('appln_status','p')
        // ->first();
        //dd($p->appln_status);

        $applnStatus = ApplnStatus::where('id', $this->appln_id)->where('appln_status','p')->first();

        if ($applnStatus) {
            $applnStatus->update([
                'appln_status'    => 'S',
                'appln_date_submit' => now()
            ]);

            // a) Construct a unique PDF name
            $pdfName = 'application_'.uniqid().'.pdf';

            // b) Full storage path where we will save the PDF
            $pdfFullPath = storage_path('/AppPdf/'.$pdfName);

            // c) Get the path to your JPG images in the public folder
            $jpgPath  = public_path('img/1.jpg');
            $jpgPath2 = public_path('img/2.jpg');
            $jpgPath3 = public_path('img/3.jpg');
            $jpgPath4 = public_path('img/4.jpg');

            // d) Generate HTML with page breaks between images
            $html = '
                <html>
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                        <style>
                        @page {
                            size: A4 portrait;
                            margin: 20mm; /* Optional: adjust margins as needed */
                        }
                        body { 
                            font-family: sans-serif; 
                        }
                        img { 
                            width: 100%; 
                            height: auto; 
                        }
                        .page-break { 
                            page-break-after: always; 
                        }
                        </style>
                    </head>
                    <body>
                        <div>
                        <img src="'.$jpgPath.'"/>
                        </div>
                        <p style="position: absolute; top: 320px; left: 550px; height: 17px; width: 600px; background: white; font-size: 15px !important;">
                        PAHANG
                        </p>
                    </body>
                </html>
            ';

            // $html = '
            // <html>
            //     <head>
            //         <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            //         <style>
            //          body { 
            //             font-family: sans-serif; 
            //             margin: 170; 
            //             padding: 20; 
            //         }
            //         /* Ensures each page breaks properly when generating PDF */
            //         .page-break { 
            //             page-break-after: always; 
            //         }
            //         /* Container for each page image (relative positioning for overlays) */
            //         .page-container {
            //             position: relative;
            //             width: 50%;
            //         }
            //         /* Common style for overlay fields */
            //         .field {
            //             position: absolute;
            //             font-size: 12px;
            //             color: #000;
            //             font-weight: normal;
            //         }
            //         /* Example field positions (adjust these) */
            //         .page1-name {
            //             top: 120px; 
            //             left: 200px;
            //         }
            //         </style>
            //     </head>
            //         <body>
            //             <!-- PAGE 1 -->
            //             <div class="page-container">
            //             <img src="'.$jpgPath.'" alt="Tekun Borang" style="width:50%; height:100%;" />
            //             <!-- Overlays for Page 1 -->
            //             <p style="position: absolute; top: 50px;left: 50px; height: 17px;width: 600px;background: white; font-size: 12px !important;">
            //                 '.$applnStatus->state_code.'
            //             </p>
            //             <div class="field page1-name">'.$applnStatus->state_code.'</div>
            //             <div class="field page1-ic">123456-78-9012</div>
            //             </div>

            //             <div class="page-break"></div>

            //             <!-- PAGE 2 -->
            //             <div class="page-container">
            //             <img src="'.$jpgPath2.'" alt="Tekun Borang" style="width:100%; height:auto;" />
            //             <!-- Overlays for Page 2 -->
            //             <div class="field page2-address">No. 123, Jalan Example, 12345 Bandar ABC</div>
            //             <div class="field page2-phone">012-3456789</div>
            //             </div>

            //             <div class="page-break"></div>

            //             <!-- PAGE 3 -->
            //             <div class="page-container">
            //             <img src="'.$jpgPath3.'" alt="Tekun Borang" style="width:100%; height:auto;" />
            //             <!-- Overlays for Page 3 -->
            //             <div class="field" style="top:120px; left:200px;">Page 3 Dummy Field 1</div>
            //             <div class="field" style="top:150px; left:200px;">Page 3 Dummy Field 2</div>
            //             </div>

            //             <div class="page-break"></div>

            //             <!-- PAGE 4 -->
            //             <div class="page-container">
            //             <img src="'.$jpgPath4.'" alt="Tekun Borang" style="width:100%; height:auto;" />
            //             <!-- Overlays for Page 4 -->
            //             <div class="field" style="top:120px; left:200px;">Page 4 Dummy Field 1</div>
            //             <div class="field" style="top:150px; left:200px;">Page 4 Dummy Field 2</div>
            //             </div>

            //         </body>
            // </html>
            // ';

            // e) Generate PDF using DomPDF
            //$pdf = PDF::loadHTML($html);

            // f) Save the PDF to storage
            //$pdf->save($pdfFullPath);

            // 3) Store the PDF path in application_pdf table
            // application_pdf::create([
            //     'appln_id'   => $applnStatus->id,
            //     'paths'      => 'storage/AppPdf/'.$pdfName,
            //     'created_at' => now(),
            //     'created_by' => Auth::id(),
            //     'updated_at' => now(),
            //     'updated_by' => Auth::id(),
            // ]);
            
            // Flash the PDF URL to the session so the view can access it.
            session()->flash('pdf_url', asset('storage/'.$pdfName));
            session()->flash('message', 'Permohonan telah dihantar.');

            //call stored precedure to update appln no
            $this->sp = "dbo.up_upd_appln_ref_no ,'$this->appln_id'";
        } else {
            session()->flash('error', 'Permohonan tidak wujud.');
        }

        return redirect()->route('dashboard');
    }
    

    // public function viewPDF(){
    //     $pdf = PDF::loadView('PDFView')->setPaper('A4','portrait');
    // }

    public function render()
    {
        return view('livewire.module.muat-naik-dokumen');
    }
}