<?php

namespace App\Livewire\Module;

use App\Models\ApplnStatus;
use App\Models\MaklumatPinjaman;
use App\Models\application_pdf;
use App\Traits\MuatNaikDokumenValidation;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Webklex\PDFMerger\Facades\PDFMergerFacade;

class MuatNaikDokumen extends Component
{
    use WithFileUploads;
    use MuatNaikDokumenValidation;

    public $document;
    public $existingData;
    public $appln_id;
    public $show_hantar = false;
    //public $sp;

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
        $perkeso_extension = $this->document_perkeso->getClientOriginalExtension();

        // Create filenames without folder path
        $fileNames = [
            'document_ic_no' => 'ic_' . now()->format('Y-m-d') . '.' . $ic_extension,
            'document_icP_no' => 'icP_' . now()->format('Y-m-d') . '.' . $icP_extension,
            'document_ssm' => 'ssm_' . now()->format('Y-m-d') . '.' . $ssm_extension,
            'document_business_picture' => 'business_' . now()->format('Y-m-d') . '.' . $business_extension,
            'document_bank_statements' => 'bank_' . now()->format('Y-m-d') . '.' . $bank_extension,
            'document_perkeso' => 'perkeso_'. now()->format('Y-m-d'). '.'. $perkeso_extension,
        ];

        // Create full paths for storage
        $documentPaths = array_map(function($fileName) use ($folderName) {
            //return $folderName . '/' . $appln_id . '/' . $fileName;
            return $folderName . '/' . $fileName;
        }, $fileNames);

        // Store files with the new names
        $this->document_ic_no->storeAs('', $documentPaths['document_ic_no'], 'public');
        $this->document_icP_no->storeAs('', $documentPaths['document_icP_no'], 'public');
        $this->document_ssm->storeAs('', $documentPaths['document_ssm'], 'public');
        $this->document_business_picture->storeAs('', $documentPaths['document_business_picture'], 'public');
        $this->document_bank_statements->storeAs('', $documentPaths['document_bank_statements'], 'public');
        $this->document_perkeso->storeAs('', $documentPaths['document_perkeso'], 'public');

        // Create a text file with links to all documents as a simple alternative
        // until the PDF merging functionality is implemented
        $mergedFileName = 'document_links_' . now()->format('Y-m-d') . '.txt';
        //$mergedFilePath = $folderName . '/' . $appln_id . '/' . $mergedFileName;
        $mergedFilePath = $folderName. '/'. $mergedFileName;      

        $documentLinks = "Document Links:\n\n";
        foreach ($documentPaths as $docKey => $docPath) {
            $documentLinks .= ucfirst(str_replace('document_', '', $docKey)) . ': ' . asset('storage/' . $docPath) . "\n";
        }
        
        Storage::disk('public')->put($mergedFilePath, $documentLinks);
        
        // Add the merged document to the fileNames array
        $fileNames['document_merge'] = $mergedFileName;

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

    //merge all file
    public function submitPermohonan()
    {
        $user = Auth::user();
        $folderName = $user->ic_no;
        $appln_id = $user->applnStatus->id;

        $applnStatus = ApplnStatus::where('id', $appln_id)->first();

        if ($applnStatus) {
            $applnStatus->update([
                'appln_status'      => 'S',
                'appln_date_submit' => now()
            ]);

            // a) Construct a unique PDF name for the first PDF (bpc01)
            $pdfName = 'bpc01_' . now()->format('Y-m-d') . '.pdf';

            // b) Full storage path where we will save the bpc01 PDF
            $pdfFullPath = storage_path($folderName . '/' . $pdfName);

            // Create the directory if it doesn't exist
            $directory = dirname($pdfFullPath);
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }

            // c) Get the path to your JPG images in the public folder
            $jpgPath  = public_path('img/1.jpg');
            $jpgPath2 = public_path('img/2.jpg');
            $jpgPath3 = public_path('img/3.jpg');
            $jpgPath4 = public_path('img/4.jpg');

            // d) Generate HTML with page breaks between images (adjust as needed)
            $html = '
                <html>
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                        <style>
                        @page {
                            size: A4 portrait;
                            margin: 20mm;
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
                            <img src="' . $jpgPath . '"/>
                        </div>
                        <p style="position: absolute; top: 320px; left: 550px; height: 17px; width: 600px; background: white; font-size: 15px !important;">
                            PAHANG
                        </p>
                    </body>
                </html>
            ';

            // e) Generate PDF using DomPDF
            $pdf = FacadePdf::loadHTML($html);

            // f) Save the PDF to storage
            $pdf->save($pdfFullPath);

            // 3) Store the PDF path in application_pdf table
            application_pdf::create([
                'appln_id'   => $applnStatus->id,
                'paths'      => $pdfFullPath,
                'created_at' => now(),
                'created_by' => Auth::id(),
                'updated_at' => now(),
                'updated_by' => Auth::id(),
            ]);
            
            // Flash the PDF URL to the session so the view can access it.
            session()->flash('pdf_url', asset('storage/' . $pdfName));
            session()->flash('message', 'Permohonan telah dihantar.');

            // --- MERGE PDF SECTION ---

            // Initialize PDFMerger
            $oMerger = PDFMergerFacade::init();

            // 1) Add the first PDF (bpc01) using all pages
            $oMerger->addPDF('file:///' . $pdfFullPath, 'all');

            // 2) IC Bank PDF
            $bankPdfName = 'ic_' . now()->format('Y-m-d') . '.pdf';
            $bankPdfPath = storage_path('app/public/' . $folderName . '/' . $bankPdfName);

            if (!file_exists($bankPdfPath)) {
                Log::error("ic PDF not found at: " . $bankPdfPath);
                session()->flash('error', 'ic PDF file not found.');
                return redirect()->back();
            }
            $oMerger->addPDF('file:///' . $bankPdfPath, 'all');

            // 3) Add icP PDF
            $businessPdfName = 'icP_' . now()->format('Y-m-d') . '.pdf';
            $businessPdfPath = storage_path('app/public/' . $folderName . '/' . $businessPdfName);

            if (!file_exists($businessPdfPath)) {
                Log::error("icP PDF not found at: " . $businessPdfPath);
                session()->flash('error', 'icP PDF file not found.');
                return redirect()->back();
            }
            $oMerger->addPDF('file:///' . $businessPdfPath, 'all');

            // 4) Add ssm PDF
            $iicPdfName = 'ssm_' . now()->format('Y-m-d') . '.pdf';
            //$iicPdfPath = storage_path('app/public/' . $folderName . '/' . $appln_id . '/' . $iicPdfName);
            $iicPdfPath = storage_path('app/public/' . $folderName . '/' . $iicPdfName);

            if (!file_exists($iicPdfPath)) {
                Log::error("ssm PDF not found at: " . $iicPdfPath);
                session()->flash('error', 'ssm PDF file not found.');
                return redirect()->back();
            }
            $oMerger->addPDF('file:///' . $iicPdfPath, 'all');

            // 5) Add business PDF
            $iic2PdfName = 'business_' . now()->format('Y-m-d') . '.pdf';
            $iic2PdfPath = storage_path('app/public/' . $folderName . '/' . $iic2PdfName);

            if (!file_exists($iic2PdfPath)) {
                Log::error("business PDF not found at: " . $iic2PdfPath);
                session()->flash('error', 'business PDF file not found.');
                return redirect()->back();
            }
            $oMerger->addPDF('file:///' . $iic2PdfPath, 'all');

            // 6) Add ssm PDF
            $ssmPdfName = 'bank_' . now()->format('Y-m-d') . '.pdf';
            $ssmPdfPath = storage_path('app/public/' . $folderName . '/' . $ssmPdfName);

            if (!file_exists($ssmPdfPath)) {
                Log::error("Bank PDF not found at: " . $ssmPdfPath);
                session()->flash('error', 'Bank PDF file not found.');
                return redirect()->back();
            }
            $oMerger->addPDF('file:///' . $ssmPdfPath, 'all');

            // 7) Add ssm PDF
            $perkesoPdfName = 'perkeso_' . now()->format('Y-m-d') . '.pdf';
            $perkesoPdfPath = storage_path('app/public/' . $folderName . '/' . $perkesoPdfName);

            if (!file_exists($perkesoPdfPath)) {
                Log::error("Perkeso PDF not found at: " . $perkesoPdfPath);
                session()->flash('error', 'Perkeso PDF file not found.');
                return redirect()->back();
            }
            $oMerger->addPDF('file:///' . $perkesoPdfPath, 'all');
            

            // 8) Merge everything into a single PDF
            $mergedPdfName = 'appln_' . now()->format('Y-m-d') . '.pdf';
            $mergedPdfFullPath = storage_path($folderName . '/' . $mergedPdfName);

            $oMerger->merge();
            $oMerger->save($mergedPdfFullPath);

            // Execute stored procedure to update application reference number
            $run = DB::update('SET NOCOUNT ON;EXEC dbo.up_upd_appln_ref_no ?', [$appln_id]);
            
        } else {
            session()->flash('error', 'Permohonan tidak wujud.');
        }

        return redirect()->route('dashboard');
    }


    public function viewPDF(){
        $pdf = PDF::loadView('PDFView')->setPaper('A4','portrait');
    }


    public function render()
    {
        return view('livewire.module.muat-naik-dokumen');
    }
}