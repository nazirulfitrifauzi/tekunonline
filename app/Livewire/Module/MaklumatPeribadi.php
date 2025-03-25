<?php

namespace App\Livewire\Module;

use App\Models\ApplnStatus;
use Livewire\Component;
use App\Models\Negeri;
use App\Models\Cawangan;
use Illuminate\Support\Facades\Auth;
use App\Models\Bank;
use App\Models\MaklumatPeribadi as ModelsMaklumatPeribadi;
use App\Traits\MaklumatPeribadiValidation;
use Carbon\Carbon;
use WireUi\Traits\WireUiActions;

class MaklumatPeribadi extends Component
{
    use MaklumatPeribadiValidation, WireUiActions;

    public $negeriSelection = []; // Pastikan ia sentiasa array
    public $cawanganSelection = [];
    public $bank = [];
    public $showIcOld = false;
    public $appln_id;
    public $ic_no;

    protected $queryString = ['appln_id'];

    public function mount()
    {
        $this->ic_no = Auth::user()->ic_no;

        $existingData = null;

        $applnStatus = ApplnStatus::where('id', $this->appln_id)->first();
        if ($applnStatus) {
            $existingData = ModelsMaklumatPeribadi::where('appln_id', $applnStatus->id)->first();
        }        
    
        if ($existingData) {
            foreach ($existingData->toArray() as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        }
    }

    public function updatedIcNo()
    {
        if (strlen($this->ic_no) === 12) {
            // Extract date parts from IC
            $year = substr($this->ic_no, 0, 2);
            $month = substr($this->ic_no, 2, 2);
            $day = substr($this->ic_no, 4, 2);
            
            // Determine century (if year > current 2-digit year, assume 1900s, else 2000s)
            $currentYear = now()->format('y');
            $fullYear = $year > $currentYear ? "19$year" : "20$year";
            
            // Create birthdate
            try {
                $birthdate = Carbon::createFromFormat('d-m-Y', "$day-$month-$fullYear");
                $this->birthdate = $birthdate->format('d-m-Y');
                
                // Calculate age
                $this->age = $birthdate->age;
                
                // Determine gender (odd = male, even = female)
                $genderDigit = intval(substr($this->ic_no, -1));
                $this->gender = $genderDigit % 2 === 1 ? 'LELAKI' : 'PEREMPUAN';

                // Check if born before September 1978
                $cutoffDate = Carbon::createFromDate(1978, 9, 1);
                $this->showIcOld = $birthdate->lt($cutoffDate);
                
            } catch (\Exception $e) {
                // Handle invalid date
                $this->birthdate = null;
                $this->age = null;
                $this->gender = null;
                $this->showIcOld = false;
            }
        } else {
            // Clear values if IC is incomplete
            $this->birthdate = null;
            $this->age = null;
            $this->gender = null;
            $this->showIcOld = false;
        }
    }

    public function updatedRace()
    {
        // Clear ethnic when race changes
        $this->ethnic = '';

        // If race is not one that requires ethnic, ensure ethnic is null
        if (!in_array($this->race, ['BUMIPUTERA SABAH', 'BUMIPUTERA SARAWAK', 'LAIN-LAIN'])) {
            $this->ethnic = null;
        }
    }

    public function updatedGender()
    {
        // Clear marital status when gender changes to prevent invalid combinations
        if ($this->gender === 'LELAKI' && $this->marital === 'IBU TUNGGAL') {
            $this->marital = '';
        } elseif ($this->gender === 'PEREMPUAN' && $this->marital === 'DUDA') {
            $this->marital = '';
        }
    }

    public function updatedProfession()
    {
        if (!in_array($this->profession, ['KAKITANGAN KERAJAAN', 'KAKITANGAN SWASTA'])) {
            // Clear employer fields if profession doesn't require them
            $this->employer_name = null;
            $this->employer_address1 = null;
            $this->employer_address2 = null;
            $this->employer_postcode = null;
            $this->employer_city = null;
            $this->employer_state = null;
            // $this->employer_phone = null;
        }
    }

    public function submit()
    {
        $this->validate();

        // $p = ApplnStatus::where('user_id', Auth::id())
        //     ->whereIn('appln_status', ['S','P'])
        //     ->where(function ($query) {
        //         // This will handle the "ISNULL(appln_status_fas, 0) IN (0, 1)" logic.
        //         $query->whereNull('appln_status_fas')
        //             ->orWhereIn('appln_status_fas', [0, 1]);
        //     })
        //     ->first();

        // if($p == null){
        //     //dd('permohonan baru');
        //     $applnStatus = ApplnStatus::insert(
        //         ['user_id' => Auth::id(),
        //         'appln_status' => 'P',
        //         'cust_icno' => $this->ic_no,
        //         'cust_name' => $this->name,
        //         'branch_code' => $this->tekun_branch,
        //         'state_code' => $this->tekun_state,]
        //     );
        // }

        
        //$applnId = $applnStatus->id;
        $applnId = ApplnStatus::where('user_id', Auth::id())->max('id');

        ApplnStatus::updateOrCreate(
            ['user_id' => Auth::id(),
            'branch_code' => $this->tekun_branch,
            'state_code' => $this->tekun_state,]
            );

        // Dapatkan data sedia ada dalam MaklumatPinjaman
        $existingData = ModelsMaklumatPeribadi::where('appln_id', $applnId)->first();

        // Jika wujud, gunakan nilai sedia ada, jika tidak, buat array kosong
        $existingDataArray = $existingData ? $existingData->toArray() : [];

        // Gabungkan data lama dengan data baru, pastikan nilai baru tidak menimpa dengan `null`
        $updatedData = array_merge($existingDataArray, array_filter($this->getFormData($applnId), fn($value) => !is_null($value)));

        // Simpan data ke dalam MaklumatPinjaman
        ModelsMaklumatPeribadi::updateOrCreate(
            ['appln_id' => $applnId],
            $updatedData
        );

        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'Berjaya!',
            'description' => 'Maklumat berjaya disimpan.',
        ]);

        $this->dispatch('saved');
    }

    protected function getFormData($applnId)
    {
        return array_merge(
            ['appln_id' => $applnId],
            collect($this->all())
                ->except(['negeriSelection', 'cawanganSelection', 'bank', 'showIcOld'])
                ->toArray()
        );
    }

    public function render()
    {
        // $age = $this->updatedIcNo($this->ic_no); // Assuming you have ic_no as a public property

        // Ambil senarai negeri
        $this->negeriSelection = Negeri::select(['kodnegeri', 'namanegeri'])
            ->where('kod', '!=', '1')
            ->orderBy('namanegeri', 'ASC')
            ->get();

        $this->cawanganSelection = Cawangan::where('kodnegeri', $this->tekun_state)
            ->where('batal', '!=', '1')
            ->where('kodcawangan', '!=', '1412')
            ->orderBy('namacawangan', 'ASC')
            ->get();

        $this->bank = Bank::select(['id', 'nama_bank'])
        ->where('res', '0')
        ->orderby('nama_bank', 'ASC')
        ->get();

        return view('livewire.module.maklumat-peribadi');
    }
}

