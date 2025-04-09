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
        //$this->safety = ModelsMaklumatPinjaman::where('appln_id',$this->appln_id)->first();

        // Existing code remains the same
        $existingData = null; // Initialize to avoid undefined variable issues

        $applnStatus = ApplnStatus::where('id', $this->appln_id)->first();
        if ($applnStatus) {
            $this->existingData = ModelsMaklumatPinjaman::where('appln_id', $applnStatus->id)->first();
        }        
    
        if ($this->existingData) {
            foreach ($this->existingData->toArray() as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        }
    }

    protected $listeners = ['run-validation' => 'validateSelf'];

    public function validateSelf()
    {
        $this->validate();
    }

    #[On('run-validation')] 
    public function submit()
    {
        try {
                $this->validateSelf();

                // Get user's IC number for folder name
                $user = Auth::user();
                $folderName = $user->ic_no;
                $appln_id = $this->appln_id;//$user->applnStatus->id;

                // Get file extensions
                $ic_extension = $this->document_ic_no->getClientOriginalExtension();
                $icP_extension = $this->document_icP_no->getClientOriginalExtension();
                $ssm_extension = $this->document_ssm->getClientOriginalExtension();
                $business_extension = $this->document_business_picture->getClientOriginalExtension();
                $bank_extension = $this->document_bank_statements->getClientOriginalExtension();
                if($this->existingData->skim_safety == 0 && is_object($this->document_perkeso)){
                    $perkeso_extension = $this->document_perkeso->getClientOriginalExtension();
                }

                // Create filenames without folder path
                $fileNames = [
                    'document_ic_no' => 'ic_' . now()->format('Y-m-d') . '.' . $ic_extension,
                    'document_icP_no' => 'icP_' . now()->format('Y-m-d') . '.' . $icP_extension,
                    'document_ssm' => 'ssm_' . now()->format('Y-m-d') . '.' . $ssm_extension,
                    'document_business_picture' => 'business_' . now()->format('Y-m-d') . '.' . $business_extension,
                    'document_bank_statements' => 'bank_' . now()->format('Y-m-d') . '.' . $bank_extension,
                    //'document_perkeso' => 'perkeso_'. now()->format('Y-m-d'). '.'. $perkeso_extension,
                ];

                if ($this->existingData->skim_safety == 0) {
                    $fileNames['document_perkeso'] = 'perkeso_' . now()->format('Y-m-d') . '.' . $perkeso_extension;
                }

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
                if($this->existingData->skim_safety == 0 && is_object($this->document_perkeso)){
                    $this->document_perkeso->storeAs('', $documentPaths['document_perkeso'], 'public');
                }

                // Create a text file with links to all documents as a simple alternative
                // until the PDF merging functionality is implemented
                $mergedFileName = 'appln_' . now()->format('Y-m-d') . '.txt';
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
                $applnId = $appln_id;//Auth::user()->applnStatus->id;

                // Dapatkan data sedia ada dalam MaklumatPinjaman
                $existingData = ModelsMaklumatPinjaman::where('appln_id', $applnId)->first();

                // Jika wujud, gunakan nilai sedia ada, jika tidak, buat array kosong
                $existingDataArray = $existingData ? $existingData->toArray() : [];

                // Gabungkan data lama dengan data baru
                $updatedData = array_merge(
                    $existingDataArray,
                    $fileNames,  // Using fileNames instead of documentPaths to store only filenames
                    ['appln_id' => $applnId]
                );

                // Simpan data ke dalam database
                ModelsMaklumatPinjaman::updateOrCreate(
                    ['appln_id' => $applnId],
                    $updatedData
                );

                ApplnStatus::where('id', $this->appln_id)->update([
                    'tab5_muat_naik_dokumen' => 1,
                ]);

                session()->flash('message', 'Documents uploaded successfully. Document links have been created.');
                
                //return redirect()->route('home', ['appln_id' => $applnId]);
                $this->show_hantar = true;

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

    private function validateAll()
    {
        $this->dispatch('run-validation')->to([
            MaklumatPeribadi::class,
            MaklumatPerniagaan::class,
            MaklumatPerniagaan2::class,
            MaklumatPinjaman::class,
            MuatNaikDokumen::class,
        ]);
    }


    //merge all file
    public function submitPermohonan()
    {

        //$this->validateAll();

        $user = Auth::user();
        $folderName = $user->ic_no;
        $appln_id = $this->appln_id;

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
                                '.($this->pdfData[0]->state_code ?  : 'n/a').'
                            </p>
                            <!-- Cawangan -->
                            <p
                                style="position: absolute;top: 122px;left: 186px;height: 17px;width: 250px;background: transparent;font-size: 9px !important;">
                                '.($this->pdfData[0]->branch_code ?  : 'n/a').'
                            </p>
                            <!-- Tarikh diterima -->
                            <p
                                style="position: absolute;top: 133px;left: 186px;height: 17px;width: 250px;background: transparent;font-size: 9px !important;">
                                '.($this->pdfData[0]->appln_date_submit ?  : 'n/a').'
                            </p>
                            <!-- No. Rujukan -->
                            <p
                                style="position: absolute;top: 155px;left: 186px;height: 17px;width: 250px;background: transparent;font-size: 9px !important;">
                                '.($this->pdfData[0]->appln_ref_no ? : 'n/a').'
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
                            left: 65px; font-size: 11pt;" checked>

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
                            '.($this->pdfData[0]->bank1 ? : 'n/a').'
                            </p>

                            <!-- no akaun bank 1 -->
                            <p
                            style="position: absolute;top: 392px;left: 230px;height: 17px;width: 206px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->bank1_acct ? : 'n/a').'
                            </p>

                            <!-- Nama bank operasi perniagaan 2 -->
                            <p
                            style="position: absolute;top: 403px;left: 230px;height: 17px;width: 206px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->bank2 ? : 'n/a').'
                            </p>

                            <!-- no akaun bank 2 -->
                            <p
                            style="position: absolute;top: 414px;left: 230px;height: 17px;width: 206px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->bank2_acct ? : 'n/a').'
                            </p>

                            <!-- Nama Permohon-->
                            <p
                            style="position: absolute;top: 446px;left: 186px;height: 17px;width: 451px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->name ? : 'n/a').'
                            </p>

                            <!-- No. KP (Baru)-->
                            <p
                            style="position: absolute;top: 469px;left: 186px;height: 17px;width: 250px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->ic_no ? : 'n/a').'
                            </p>

                            <!-- No. KP (Lama)-->
                            <p
                            style="position: absolute;top: 469px;left: 435px;height: 17px;width: 250px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->ic_old ? : 'n/a').'
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
                            '.($this->pdfData[0]->birthdate ? : 'n/a').'
                            </p>

                            <!-- bangsa/kaum -->
                            <p
                            style="position: absolute;top: 492px;left: 491px;height: 17px;width: 250px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->race ? : 'n/a').'
                            </p>

                            <!-- umur semasa memohon -->
                            <p
                            style="position: absolute;top: 515px;left: 159px;height: 17px;width: 250px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->age ? : 'n/a').'
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
                            '.($this->pdfData[0]->dependent ? : 'n/a').'
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
                            '.($this->pdfData[0]->address1 ? : 'n/a').'
                            </p>

                            <!-- Alamat kediaman 2 -->
                            <p
                            style="position: absolute;top: 615px;left: 186px;height: 17px;width: 451px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->address2 ? : 'n/a').'
                            </p>

                            <!-- Alamat kediaman 3 -->
                            <p
                            style="position: absolute;top: 626px;left: 186px;height: 17px;width: 451px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->address2 === 'n/a'? : 'n/a').'
                            </p>

                            <!-- Poskod -->
                            <p
                            style="position: absolute;top: 626px;left: 494px;height: 17px;width: 451px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->postcode ? : 'n/a').'
                            </p>

                            <!-- No telefon (rumah) -->
                            <p
                            style="position: absolute;top: 637px;left: 186px;height: 17px;width: 451px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->phone_home ? : 'n/a').'
                            </p>

                            <!-- No telefon (bimbit) -->
                            <p
                            style="position: absolute;top: 637px;left: 399px;height: 17px;width: 275px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->phone_hp ? : 'n/a').'
                            </p>

                            <!-- Emel -->
                            <p
                            style="position: absolute;top: 660px;left: 186px;height: 17px;width: 275px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->email ? : 'n/a').'
                            </p>

                            <!-- Facebook -->
                            <p
                            style="position: absolute;top: 660px;left: 366px;height: 17px;width: 275px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->facebook ? : 'n/a').'
                            </p>

                            <!-- Instagram -->
                            <p
                            style="position: absolute;top: 660px;left: 506px;height: 17px;width: 275px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->instagram ? : 'n/a').'
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
                            '.($this->pdfData[0]->profession ? : 'n/a').'
                            </p>

                            <!-- Pendapatan RM/Bulan -->
                            <p
                            style="position: absolute;top: 682px;left: 452px;height: 17px;width: 275px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->income ? : 'n/a').'
                            </p>

                            <!-- Nama Majikan (jika berkerja) -->
                            <p
                            style="position: absolute;top: 694px;left: 186px;height: 17px;width: 453px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->employer_name ? : 'n/a').'
                            </p>

                            <!-- Alamat Majikan 1 & 2 -->
                            <p
                            style="position: absolute;top: 706px;left: 186px;height: 17px;width: 453px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->employer_address1 ? : 'n/a').'
                            </p>

                            <!-- Alamat Majikan 3 -->
                            <p
                            style="position: absolute;top: 717px;left: 186px;height: 17px;width: 274px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->employer_address2 ? : 'n/a').'
                            </p>

                            <!-- No. Telefon Majikan -->
                            <p
                            style="position: absolute;top: 717px;left: 537px;height: 17px;width: 274px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->employer_phone ? : 'n/a').'
                            </p>
                            </div>

                            <!------------ B.Maklumat Pasangaan Pemohon ------------->
                            <div>
                            <!-- Nama Suami/Isteri -->
                            <p
                            style="position: absolute;top: 759px;left: 186px;height: 17px;width: 453px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->spouse_name ? : 'n/a').'
                            </p>

                            <!-- No Kad Pengenalan -->
                            <p
                            style="position: absolute;top: 772px;left: 186px;height: 17px;width: 274px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->spouse_ic_no ? : 'n/a').'
                            </p>

                            <!-- No Passport -->
                            <p
                            style="position: absolute;top: 772px;left: 537px;height: 17px;width: 274px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->spouse_passport_no ? : 'n/a').'
                            </p>

                            <!-- Pekerjaan -->
                            <p
                            style="position: absolute;top: 784px;left: 186px;height: 17px;width: 274px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->spouse_profession ? : 'n/a').'
                            </p>

                            <!-- Alamat Majikan 1 -->
                            <p
                            style="position: absolute;top: 795px;left: 186px;height: 17px;width: 453px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->spouse_employer_address1 ? : 'n/a').'
                            </p>

                            <!-- Alamat Majikan 2 -->
                            <p
                            style="position: absolute;top: 806px;left: 186px;height: 17px;width: 453px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->spouse_employer_address2 ? : 'n/a').'
                            </p>

                            <!-- Alamat Majikan 3 -->
                            <p
                            style="position: absolute;top: 817px;left: 186px;height: 17px;width: 274px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->spouse_employer_address2 === 'n/a' ? : 'n/a').'
                            </p>

                            <!-- Poskod -->
                            <p
                            style="position: absolute;top: 817px;left: 537px;height: 17px;width: 274px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->spouse_employer_postcode ? : 'n/a').'
                            </p>

                            <!-- No. Telefon Majikan -->
                            <p
                            style="position: absolute;top: 828px;left: 186px;height: 17px;width: 274px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->spouse_employer_no ? : 'n/a').'
                            </p>

                            <!-- No. Telefon Bimbit -->
                            <p
                            style="position: absolute;top: 828px;left: 537px;height: 17px;width: 274px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->spouse_phone ? : 'n/a').'
                            </p>

                            <!-- Pendapatan RM/Bulan -->
                            <p
                            style="position: absolute;top: 839px;left: 201px;height: 17px;width: 274px;background: transparent;font-size: 9px !important;">
                            '.($this->pdfData[0]->spouse_income ? : 'n/a').'
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
                                '.($this->pdfData[0]->business_name ? : 'n/a').'
                            </p>

                            <!-- No SSM / LESEN / ORDINAN -->
                            <p
                                style="position: absolute;top: 68px;left: 185px;height: 17px;width: 250px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->license_type ? : 'n/a').'
                            </p>

                            <!-- Aktiviti Perniagaan / projek -->
                            <p
                                style="position: absolute;top: 95px;left: 185px;height: 25px;width: 250px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->business_activity ? : 'n/a').'
                            </p>

                            <!-- Tempoh Pengalaman Berniaga -->
                            <p
                                style="position: absolute;top: 95px;left: 540px;height: 17px;width: 250px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->business_duration_year ? : 'n/a').'
                            </p>

                            <!-- Alamat Perniagaan / permis / projek  1 -->
                            <p
                                style="position: absolute;top: 122px;left: 185px;height: 17px;width: 450px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->business_address1 ? : 'n/a').'
                            </p>

                            <!-- Alamat Perniagaan / permis / projek  2 -->
                            <p
                                style="position: absolute;top: 134px;left: 185px;height: 17px;width: 450px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->business_address2 ? : 'n/a').'
                            </p>

                            <!-- Alamat Perniagaan / permis / projek  3 -->
                            <p
                                style="position: absolute;top: 147px;left: 185px;height: 17px;width: 275px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->business_address2 ? : 'n/a').'
                            </p>

                            <!-- Poskod -->
                            <p
                                style="position: absolute;top: 147px;left: 495px;height: 17px;width: 275px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->business_postcode ? : 'n/a').'
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
                                '.($this->pdfData[0]->business_phone ? : 'n/a').'
                            </p>
                            
                            <!-- No TEL (Bimbit) -->
                            <p
                            style="position: absolute;top: 183px;left: 401px;;height: 17px;width: 275px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->business_phone_hp ? : 'n/a').'
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
                            '.($this->pdfData[0]->business_other_premise ? : 'n/a').'
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
                                '.($this->pdfData[0]->business_modal ? : 'n/a').'
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
                                '.($this->pdfData[0]->register_date ? : 'n/a').'
                            </p>

                            <!-- Tarikh Tamat Lesen -->
                            <p
                            style="position: absolute;top: 284px;left: 185px;;height: 17px;width: 275px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->license_expired_date ? : 'n/a').'
                            </p>

                            <!-- checkbox Keahlihan Persatuan (YA) -->
                            <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 305px;
                            left: 217px; font-size: 11pt;" '.($this->pdfData[0]->membership_status === 'YA'? : 'n/a').'>

                            <!-- checkbox Keahlihan Persatuan (TIDAK) -->
                            <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 305px;
                            left: 298px; font-size: 11pt;" '.($this->pdfData[0]->membership_status === 'TIDAK'? : 'n/a').'>

                            <!-- checkbox sekiranya ya sila nyatakan (Dewan Perniagaan) -->
                            <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 331px;
                            left: 83px; font-size: 11pt;" '.($this->pdfData[0]->membership_assoc === 'DEWAN PERNIAGAAN' ? : 'n/a').'>

                            <!-- checkbox sekiranya ya sila nyatakan (Persatuan Penjaja / Peniaga) -->
                            <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 344px;
                            left: 83px; font-size: 11pt;" '.($this->pdfData[0]->membership_assoc === 'PERSATUAN PENJAJA / PENIAGA' ? : 'n/a').'>

                            <!-- Masa Berniaga (DARI) -->
                            <p
                            style="position: absolute;top: 385px;left: 208px;;height: 17px;width: 275px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->business_open ? : 'n/a').'
                            </p>
                            <!-- Masa Berniaga (DARI - PAGI) -->
                            <p
                            style="position: absolute;top: 378px;left: 257px;height: 17px;width: 10px;background: transparent;font-size: 10px !important; border-bottom: 1px solid black;">
                            </p>
                            <!-- Masa Berniaga (DARI - PETANG) -->
                            <p
                            style="position: absolute;top: 378px;left: 281px;height: 17px;width: 10px;background: transparent;font-size: 10px !important; border-bottom: 1px solid black;">
                            </p>
                            <!-- Masa Berniaga (DARI - MALAM) -->
                            <p
                            style="position: absolute;top: 378px;left: 306px;height: 17px;width: 10px;background: transparent;font-size: 10px !important; border-bottom: 1px solid black;">
                            </p>
                            <!-- Masa Berniaga (HINGGA) -->
                            <p
                            style="position: absolute;top: 385px;left: 406px;;height: 17px;width: 275px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->business_closed ? : 'n/a').'
                            </p>
                            <!-- Masa Berniaga (HINGGA - PAGI) -->
                            <p
                            style="position: absolute;top: 378px;left: 457px;height: 17px;width: 10px;background: transparent;font-size: 10px !important; border-bottom: 1px solid black;">
                            </p>
                            <!-- Masa Berniaga (HINGGA - PETANG) -->
                            <p
                            style="position: absolute;top: 378px;left: 478px;height: 17px;width: 10px;background: transparent;font-size: 10px !important; border-bottom: 1px solid black;">
                            </p>
                            <!-- Masa Berniaga (HINGGA - MALAM) -->
                            <p
                            style="position: absolute;top: 378px;left: 506px;height: 17px;width: 10px;background: transparent;font-size: 10px !important; border-bottom: 1px solid black;">
                            </p>
                            
                            <!-- checkbox Pengitirafan (YA) -->
                            <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 419px;
                            left: 327px; font-size: 11pt;" '.($this->pdfData[0]->cert_recognition_flag === 1 ? : 'n/a').'>

                            <!-- checkbox Pengitirafan (TIDAK) -->
                            <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 419px;
                            left: 421px; font-size: 11pt;" '.($this->pdfData[0]->cert_recognition_flag === 0 ? : 'n/a').'>
                            
                            <!-- Nilai Asset Perniagaan Sedia Ada -->
                            <p
                            style="position: absolute;top: 434px;left: 326px;;height: 17px;width: 275px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->business_asset_value ? : 'n/a').'
                            </p>

                            <!-- Sumber Modal Memulakan Perniagaan -->
                            <p
                            style="position: absolute;top: 460px;left: 310px;;height: 17px;width: 326px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->business_start_resources ? : 'n/a').'
                            </p>

                            <!-- Nama Kursus yang dihadiri anjuran -->
                            <p
                            style="position: absolute;top: 495px;left: 310px;;height: 17px;width: 326px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->course_name_attend ? : 'n/a').'
                            </p>

                            <!-- checkbox Nama Agensi Penganjur (INSKEN) -->
                            <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 531px;
                            left: 329px; font-size: 11pt;" '.($this->pdfData[0]->agency_name === 'INSKEN' ? : 'n/a').'>

                            <!-- checkbox Nama Agensi Penganjur (SME CORP) -->
                            <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 531px;
                            left: 393px; font-size: 11pt;" '.($this->pdfData[0]->agency_name === 'SME CORP' ? : 'n/a').'>

                            <!-- checkbox Nama Agensi Penganjur (CEDAR) -->
                            <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 531px;
                            left: 480px; font-size: 11pt;" '.($this->pdfData[0]->agency_name === 'CEDAR' ? : 'n/a').'>

                            <!-- checkbox Nama Agensi Penganjur (Lain-Lain) -->
                            <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 531px;
                            left: 532px; font-size: 11pt;" '.($this->pdfData[0]->agency_name === 'LAIN-LAIN' ? : 'n/a').'>

                            <!-- Kursus kursus lain yang dihadiri 1-->
                            <p
                            style="position: absolute;top: 547px;left: 341px;;height: 17px;width: 326px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->course_name_attend2 ? : 'n/a').'
                            </p>

                            <!-- Kursus kursus lain yang dihadiri 2-->
                            <p
                            style="position: absolute;top: 560px;left: 341px;;height: 17px;width: 326px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->course_name_attend3 ? : 'n/a').'
                            </p>

                            <!-- Sila nyatakan perniagaan terdahulu -->
                            <p
                            style="position: absolute;top: 584px;left: 310px;;height: 25px;width: 326px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->previous_business ? : 'n/a').'
                            </p>

                            </div>

                            <!------------ C.Maklumat Pembiayaan Peniagaan Sedia Ada ------------->
                            <div>
                            <!-- checkbox Ada -->
                            <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 651px;
                            left: 90px; font-size: 11pt;" checked>

                            <!-- checkbox Tiada -->
                            <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 651px;
                            left: 206px; font-size: 11pt;" checked>


                            <!-- checkbox Institusi Pembiayaan (Mara) -->
                            <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 675px;
                            left: 231px; font-size: 11pt;" '.($this->pdfData[0]->agency_name === 'MARA' ? : 'n/a').'>

                            <!-- checkbox Institusi Pembiayaan (Aim) -->
                            <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 675px;
                            left: 292px; font-size: 11pt;" '.($this->pdfData[0]->agency_name === 'AIM' ? : 'n/a').'>

                            <!-- checkbox Institusi Pembiayaan (lain-lain agensi pembiayaan) -->
                            <input type="checkbox" readonly="" class="text input" style="position: absolute;top: 675px;
                            left: 347px; font-size: 11pt;" '.($this->pdfData[0]->agency_name === 'LAIN-LAIN' ? : 'n/a').'>

                            <!-- Institusi Pembiayaan (lain-lain agensi pembiayaan) -->
                            <p
                            style="position: absolute;top: 667px;left: 489px;;height: 25px;width: 326px;background: transparent;font-size: 10px !important;">
                                
                            </p>

                            <!-- Jumlah Pembiayaan -->
                            <p
                            style="position: absolute;top: 679px;left: 245px;;height: 25px;width: 326px;background: transparent;font-size: 10px !important;">
                                
                            </p>

                            <!-- Jumlah Pembiayaan -->
                            <p
                            style="position: absolute;top: 679px;left: 525px;;height: 25px;width: 326px;background: transparent;font-size: 10px !important;">
                                
                            </p>
                            </div>

                            <!------------ D.Keterangan Mengenai Pembiayaan yang dipohon ------------->
                            <div>
                            <!-- Jumlah Pembiayaan yang diperlukan -->
                            <p
                            style="position: absolute;top: 724px;left: 521px;;height: 25px;width: 326px;background: transparent;font-size: 10px !important;">
                            '.($this->pdfData[0]->purchase_price ? : 'n/a').'
                            </p>

                            <!-- Tempoh Bayaran -->
                            <p style="position: absolute;top: 747px;left: 183px;;height: 25px;width: 326px;background: transparent;font-size: 10px !important;">
                             '.($this->pdfData[0]->pymt_duration ? : 'n/a').'                               
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
                                '.($this->pdfData[0]->duration_intro_team ? : 'n/a').'
                            </p>

                            <!-- tarik perbincangan kumpulan -->
                            <p
                                style="position: absolute;top: 131px;left: 368px;height: 17px;width: 250px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->discussion_date ? : 'n/a').'
                            </p>

                            <!-- Jumlah Pembiayaan yang Disokong -->
                            <p
                                style="position: absolute;top: 144px;left: 368px;height: 17px;width: 250px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->supported_fin_amount ? : 'n/a').'
                            </p>
                            </div>

                            <!------------ G.Pengesahan & Perakuan (Teman Tekun sahaja) ------------->
                            <div>
                            <!-- Nama -->
                            <p
                                style="position: absolute;top: 213px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->grp_leader_name ? : 'n/a').'
                            </p>

                            <!-- Alamat 1 & 2 -->
                            <p
                                style="position: absolute;top: 227px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->group_leader_addr1 ? : 'n/a').'
                            </p>

                            <!-- Alamat 3 -->
                            <p
                                style="position: absolute;top: 240px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->group_leader_addr2 ? : 'n/a').'
                            </p>

                            <!-- No Telefon -->
                            <p
                                style="position: absolute;top: 253px;left: 218px;height: 17px;width: 250px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->group_leader_addr3 ? : 'n/a').'
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
                                '.($this->pdfData[0]->reference_name ? : 'n/a').'
                            </p>

                            <!-- No Kad Pengenalan -->
                            <p
                                style="position: absolute;top: 382px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->reference_icno ? : 'n/a').'
                            </p>

                            <!--  Alamat 1 & 2  -->
                            <p
                                style="position: absolute;top: 395px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->reference_address1 ? : 'n/a').'
                            </p>

                            <!--  Alamat 3  -->
                            <p
                                style="position: absolute;top: 408px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->reference_address2 ? : 'n/a').'
                            </p>

                            <!--  Hubungan Dengan Pemohon -->
                            <p
                                style="position: absolute;top: 421px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->reference_relation ? : 'n/a').' 
                            </p>

                            <!--  No Telefon -->
                            <p
                                style="position: absolute;top: 433px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->reference_phone ? : 'n/a').' 
                            </p>

                            <!-- Nama (2) -->
                            <p
                                style="position: absolute;top: 455px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->reference2_name ? : 'n/a').' 
                            </p>

                            <!-- No Kad Pengenalan (2) -->
                            <p
                                style="position: absolute;top: 469px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->reference2_icno ? : 'n/a').' 
                            </p>

                            <!--  Alamat 1 & 2 (2) -->
                            <p
                                style="position: absolute;top: 483px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->reference2_address1 ? : 'n/a').' 
                            </p>

                            <!--  Alamat 3 (2) -->
                            <p
                                style="position: absolute;top: 496px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->reference2_address2 ? : 'n/a').' 
                            </p>

                            <!--  Hubungan Dengan Pemohon (2) -->
                            <p
                                style="position: absolute;top: 508px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->reference2_relation ? : 'n/a').' 
                            </p>

                            <!--  No Telefon (2) -->
                            <p
                                style="position: absolute;top: 521px;left: 218px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->reference2_phone ? : 'n/a').' 
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
                                
                                </p>

                                <!-- Kelas -->
                                <p
                                style="position: absolute;top: 781px;left: 401px;height: 17px;width: 420px;background: transparent;font-size: 10px !important;">
                                
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
                                '.($this->pdfData[0]->will_comp_name  ? : 'n/a').'
                            </p>

                            <!-- Nama Perujuk (pegawai tekun) -->
                            <p
                                style="position: absolute;top: 99px;left: 286px;height: 17px;width: 350px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->will_officer_name  ? : 'n/a').'
                            </p>

                            <!-- No Kad Pengenalan Perujuk (pegawai tekun) -->
                            <p
                                style="position: absolute;top: 112px;left: 286px;height: 17px;width: 350px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->will_officer_icno  ? : 'n/a').'
                            </p>

                            <!-- No Telefon Perujuk (pegawai tekun) -->
                            <p
                                style="position: absolute;top: 123px;left: 286px;height: 17px;width: 350px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->will_officer_phone  ? : 'n/a').'
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
                                '.($this->pdfData[0]->name_penamaan  ? : 'n/a').'
                            </p>

                            <!-- No Kad Pengenalan -->
                            <p
                            style="position: absolute;top: 588px;left: 216px;height: 17px;width: 450px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->icno_penamaan  ? : 'n/a').'
                            </p>

                            <!-- No Passport -->
                            <p
                            style="position: absolute;top: 588px;left: 536px;height: 17px;width: 450px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->passportno_penamaan  ? : 'n/a').'
                            </p>

                            <!-- Alamat 1 & 2 -->
                            <p
                            style="position: absolute;top: 602px;left: 216px;height: 17px;width: 322px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->penamaan_addr1  ? : 'n/a').'
                            </p>

                            <!-- Alamat 3 -->
                            <p
                            style="position: absolute;top: 615px;left: 216px;height: 17px;width: 322px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->penamaan_addr2  ? : 'n/a').'
                            </p>

                            <!-- Hubungan dengan pemohon -->
                            <p
                            style="position: absolute;top: 628px;left: 216px;height: 17px;width: 322px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->penamaan_relationship  ? : 'n/a').'
                            </p>

                            <!-- No Telefon -->
                            <p
                            style="position: absolute;top: 643px;left: 216px;height: 17px;width: 322px;background: transparent;font-size: 10px !important;">
                                '.($this->pdfData[0]->penamaan_phone  ? : 'n/a').'
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
                            
                            </div>

                        </div>
                        </body>

                    </html>';

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