<?php

namespace App\Livewire\Module;

use Livewire\Component;
use App\Models\Negeri;
use Illuminate\Support\Facades\Auth;
use App\Models\Bank;
use App\Models\JenisAktivitiBaru;
use App\Models\JenisPerniagaan;
use App\Models\MaklumatPeribadi as ModelsMaklumatPeribadi;
use App\Models\MaklumatPerniagaan as ModelsMaklumatPerniagaan;

class MaklumatPerniagaan extends Component
{
    public $sektorSelection = []; // Pastikan ia sentiasa array
    public $aktivitiSelection = [];
    public $negeriSelection = [];
    public $bank = [];

    // untuk gabung dua variable jadi satu
    public $final;

    //input save
    public $business_syariah;
    public $business_sector;
    public $business_name;
    public $license_type;
    public $business_no;
    public $business_activity;
    public $sub_business_activity;
    public $business_duration;
    public $business_address1;
    public $business_address2;
    public $business_postcode;
    public $business_city;
    public $business_state;
    public $business_income;
    public $business_phone;
    public $business_phone_hp;
    public $business_premise;
    public $business_other_premise;
    public $business_ownership;
    public $business_modal;
    public $premise_loc_code;
    public $total_employees;
    public $register_date;
    public $license_expired_date;
    public $shareholder;
    public $membership_status;
    public $membership_assoc;
    public $business_open;
    public $business_closed;
    public $business_time;
    public $cert_recognition_flag;
    public $cert_recognition_myipo_flag;
    public $cert_recognition_gmp_flag;
    public $cert_recognition_mesti_flag;
    public $cert_recognition_haccp_flag;
    public $cert_recognition_halal_flag;
    public $cert_recognition_iso_flag;
    public $business_asset_value;
    public $business_start_resources;
    public $course_name_attend;
    public $agency_name;
    public $course_name_attend2;
    public $course_name_attend3;
    public $previous_business;
    public $partner_name;
    public $partner_ic;
    public $partner_address1;
    public $partner_address2;  
    public $partner_postcode;
    public $partner_city;
    public $partner_state;
    public $partner_phone;
    public $partner_phone_hp;
    public $partner_total_shares;
    public $partner_roles;

    // protected $rules = [
    //     'tekun_state' => 'required',
    //     'tekun_branch' => 'required',
        // 'business_status' => 'required',
        // 'business_method' => 'required',
        // 'bank1' => 'required',
        // 'bank1_acct' => 'required',
        // 'bank1_acc_type' => 'required',
   
    // ];

    // protected $messages = [
    //     'tekun_state.required' => 'Sila Pilih Negeri',
    //     'tekun_branch.required' => 'Sila Pilih Cawangan',
        // 'business_status.required' => 'Sila Pilih Status Perniagaan',
        // 'business_method.required' => 'Sila Pilih Kaedah Perniagaan',
        // 'bank1.required' => 'Sila Pilih Bank',
        // 'bank1_acct.required' => 'Sila Masukkan No Akaun Bank',
        // 'bank1_acc_type.required' => 'Sila Pilih Jenis Akaun Bank',
    // ];

    // public function mount()
    // {
    //     $negeri = Auth::user()->maklumatPeribadi->tekun_state;
    // }

    public function submit()
    {
        // validation
        // $this->validate();

        // save data to database
        ModelsMaklumatPerniagaan::create(
            [
            'user_id' => Auth::id(),
            // ],
            // [
            'business_syariah' => $this->business_syariah,
            'business_name' => $this->business_name,
            'business_sector' => $this->business_sector,
            'license_type' => $this->license_type,
            'business_no' => $this->business_no,
            'business_activity' => $this->business_activity,
            'sub_business_activity' => $this->sub_business_activity,
            'business_duration' => $this->business_duration,
            'business_address1' => $this->business_address1,
            'business_address2' => $this->business_address2,
            'business_postcode' => $this->business_postcode,
            'business_city' => $this->business_city,
            'business_state' => $this->business_state,
            'business_income' => $this->business_income,
            'business_phone' => $this->business_phone,
            'business_phone_hp' => $this->business_phone_hp,
            'business_premise' => $this->business_premise,
            'business_other_premise' => $this->business_other_premise,
            'business_ownership' => $this->business_ownership,
            'business_modal' => $this->business_modal,
            'premise_loc_code' => $this->premise_loc_code,
            'total_employees' => $this->total_employees,
            'register_date' => $this->register_date,
            'license_expired_date' => $this->license_expired_date,
            'shareholder' => $this->shareholder,
            'membership_status' => $this->membership_status,
            'membership_assoc' => $this->membership_assoc,
            'business_open' => $this->business_open,
            'business_closed' => $this->business_closed,
            'business_time' => $this->business_time,
            'cert_recognition_flag' => $this->cert_recognition_flag,
            'cert_recognition_myipo_flag' => $this->cert_recognition_myipo_flag,
            'cert_recognition_gmp_flag' => $this->cert_recognition_gmp_flag,
            'cert_recognition_mesti_flag' => $this->cert_recognition_mesti_flag,
            'cert_recognition_haccp_flag' => $this->cert_recognition_haccp_flag,
            'cert_recognition_halal_flag' => $this->cert_recognition_halal_flag,
            'cert_recognition_iso_flag' => $this->cert_recognition_iso_flag,
            'business_asset_value' => $this->business_asset_value,
            'business_start_resources' => $this->business_start_resources,
            'course_name_attend' => $this->course_name_attend,
            'agency_name' => $this->agency_name,
            'course_name_attend2' => $this->course_name_attend2,
            'course_name_attend3' => $this->course_name_attend3,
            'previous_business' => $this->previous_business,
            'partner_name' => $this->partner_name,
            'partner_ic' => $this->partner_ic,
            'partner_address1' => $this->partner_address1,
            'partner_address2' => $this->partner_address2,
            'partner_postcode' => $this->partner_postcode,
            'partner_city' => $this->partner_city,
            'partner_state' => $this->partner_state,
            'partner_phone' => $this->partner_phone,
            'partner_phone_hp' => $this->partner_phone_hp,
            'partner_total_shares' => $this->partner_total_shares,
            'partner_roles' => $this->partner_roles,
        ]
    );

        return redirect()->route('home');
    }

    // untuk campurkan dua variable jadi satu dan debug
    public function updatedBusinessClosed()
    {
        $this->business_time = $this->business_open . ' hingga ' . $this->business_closed;
    }
    
    public function render()
    {
        // Ambil senarai negeri
        $this->negeriSelection = Negeri::select(['kodnegeri', 'namanegeri'])
        ->where('kod', '!=', '1')
        ->orderBy('namanegeri', 'ASC')
        ->get();
    
        $this->sektorSelection = JenisPerniagaan:: select (['idPerniagaan', 'jenisPerniagaan'])
            ->where(function ($q) {
            $q->where('lain', '1')
            ->orWhere('sektor', 'Peruncitan')
            ->orWhere('sektor', 'Perkhidmatan')
            ->orWhere('sektor', 'Pembuatan')
            ->orWhere('sektor', 'Kontraktor Kecil')
            ->orWhere('sektor', 'Tani');
        })->get();


        $this->aktivitiSelection = JenisAktivitiBaru::where('idsektor', $this->business_sector)
        ->where('status', '=', '1')
        ->orderBy('Aktiviti', 'ASC')
        ->get();

        $this->bank = Bank::select(['id', 'nama_bank'])
        ->where('res', '0')
        ->orderby('nama_bank', 'ASC')
        ->get();

        return view('livewire.module.maklumat-perniagaan');
    }
}
