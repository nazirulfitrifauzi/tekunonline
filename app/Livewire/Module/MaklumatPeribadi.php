<?php
namespace App\Livewire\Module;

use Livewire\Component;
use App\Models\Negeri;
use App\Models\Cawangan;
use Illuminate\Support\Facades\Auth;
use App\Models\Bank;
use App\Models\MaklumatPeribadi as ModelsMaklumatPeribadi;

class MaklumatPeribadi extends Component
{
    public $negeriSelection = []; // Pastikan ia sentiasa array
    public $cawanganSelection = [];
    public $bank = [];

    //input save
    public $tekun_state;
    public $tekun_branch;
    public $business_status;
    public $business_method;
    public $bank1;
    public $bank1_acct;
    public $bank1_acct_type;
    public $bank1_register_bank_no;
    public $bank2;
    public $bank2_acct;
    public $bank2_acct_type;
    public $bank2_register_bank_no;
    public $name;
    public $ic_no;
    public $ic_old;
    public $gender;
    public $religion;
    public $birthdate;
    public $race;
    public $ethnic;
    public $age;
    public $marital;
    public $dependent;
    public $oku;
    public $stop_worktime_flag;
    public $asnaf_berdaftar_flag;
    public $education;
    public $address1;
    public $address2;
    public $postcode;
    public $city;
    public $state;
    public $phone_home;
    public $phone_hp;
    public $email;
    public $facebook;
    public $instagram;
    public $status_home;
    public $profession;
    public $income;
    public $employer_name;
    public $employer_address1;
    public $employer_address2;
    public $employer_postcode;
    public $employer_city;
    public $employer_state;
    public $employer_phone;
    public $spouse_name;
    public $spouse_nationality;
    public $spouse_ic_no;
    public $spouse_passport_no;
    public $spouse_profession;
    public $spouse_phone;
    public $spouse_employer_address1;
    public $spouse_employer_address2;
    public $spouse_employer_postcode;
    public $spouse_employer_city;
    public $spouse_employer_state;
    public $spouse_employer_no;
    public $spouse_income;

    protected $rules = [
        'tekun_state' => 'required',
        'tekun_branch' => 'required',
        // 'business_status' => 'required',
        // 'business_method' => 'required',
        // 'bank1' => 'required',
        // 'bank1_acct' => 'required',
        // 'bank1_acc_type' => 'required',
   
    ];

    protected $messages = [
        'tekun_state.required' => 'Sila Pilih Negeri',
        'tekun_branch.required' => 'Sila Pilih Cawangan',
        // 'business_status.required' => 'Sila Pilih Status Perniagaan',
        // 'business_method.required' => 'Sila Pilih Kaedah Perniagaan',
        // 'bank1.required' => 'Sila Pilih Bank',
        // 'bank1_acct.required' => 'Sila Masukkan No Akaun Bank',
        // 'bank1_acc_type.required' => 'Sila Pilih Jenis Akaun Bank',
    ];

    // public function mount()
    // {
    //     $negeri = Auth::user()->maklumatPeribadi->tekun_state;
    // }

    public function submit()
    {
        // validation
        $this->validate();

        // save data to database
        ModelsMaklumatPeribadi::create(
            [
            'user_id' => Auth::id(),
            // ],
            // [
            'tekun_state' => $this->tekun_state,
            'tekun_branch' => $this->tekun_branch,
            'business_status' => $this->business_status,
            'business_method' => $this->business_method,
            'bank1' => $this->bank1,
            'bank1_acct' => $this->bank1_acct,
            'bank1_acct_type' => $this->bank1_acct_type,
            'bank1_register_bank_no' => $this->bank1_register_bank_no,
            'bank2' => $this->bank2,
            'bank2_acct' => $this->bank2_acct,
            'bank2_acct_type' => $this->bank2_acct_type,
            'bank2_register_bank_no' => $this->bank2_register_bank_no,
            'name' => $this->name,
            'ic_no' => $this->ic_no,
            'ic_old' => $this->ic_old,
            'gender' => $this->gender,
            'religion' => $this->religion,
            'birthdate' => $this->birthdate,
            'race' => $this->race, 
            'ethnic' => $this->ethnic,//tak tahu jadi ke tak
            'age' => $this->age,
            'marital' => $this->marital,
            'dependent' => $this->dependent,
            'oku' => $this->oku,
            'stop_worktime_flag' => $this->stop_worktime_flag,
            'asnaf_berdaftar_flag' => $this->asnaf_berdaftar_flag,
            'education' => $this->education,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'postcode' => $this->postcode,
            'city' => $this->city,
            'state' => $this->state,
            'phone_home' => $this->phone_home,
            'phone_hp' => $this->phone_hp,
            'email' => $this->email,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'status_home' => $this->status_home,
            'profession' => $this->profession,
            'income' => $this->income,
            'employer_name' => $this->employer_name,
            'employer_address1' => $this->employer_address1,
            'employer_address2' => $this->employer_address2,
            'employer_postcode' => $this->employer_postcode,
            'employer_city' => $this->employer_city,
            'employer_state' => $this->employer_state,
            'employer_phone' => $this->employer_phone,
            'spouse_name' => $this->spouse_name,
            'spouse_nationality'  => $this->spouse_nationality,
            'spouse_ic_no' => $this->spouse_ic_no,
            'spouse_passport_no' => $this->spouse_passport_no,
            'spouse_profession' => $this->spouse_profession,
            'spouse_phone' => $this->spouse_phone,
            'spouse_employer_address1' => $this->spouse_employer_address1,
            'spouse_employer_address2' => $this->spouse_employer_address2,
            'spouse_employer_postcode' => $this->spouse_employer_postcode,
            'spouse_employer_city' => $this->spouse_employer_city,
            'spouse_employer_state' => $this->spouse_employer_state,
            'spouse_employer_no' => $this->spouse_employer_no,
            'spouse_income' => $this->spouse_income,
        ]
    );

        return redirect()->route('home');
    }

    public function render()
    {
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

