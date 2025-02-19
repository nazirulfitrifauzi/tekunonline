<?php

namespace App\Livewire\Module;

use App\Models\MaklumatPerniagaan;
use App\Models\Negeri;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MaklumatPerniagaan2 extends Component
{
    public $negeriSelection = [];


    //input save
    public $buss_branch_tot;
    public $buss1_branch_loc;
    public $buss1_branch_status;
    public $buss1_branch_tot_worker;
    public $buss1_hours_start;
    public $buss1_hours_end;
    public $buss1_addr1;
    public $buss1_addr2;
    public $buss1_postcode;
    public $buss1_city;
    public $buss1_state;
    public $buss1_phone;
    public $buss1_fax;
    public $buss2_branch_loc;
    public $buss2_branch_status;
    public $buss2_branch_tot_worker;
    public $buss2_hours_start;
    public $buss2_hours_end;
    public $buss2_addr1;
    public $buss2_addr2;
    public $buss2_postcode;
    public $buss2_city;
    public $buss2_state;
    public $buss2_phone;
    public $buss2_fax;
    public $buss3_branch_loc;
    public $buss3_branch_status;
    public $buss3_branch_tot_worker;
    public $buss3_hours_start;
    public $buss3_hours_end;
    public $buss3_addr1;
    public $buss3_addr2;
    public $buss3_postcode;
    public $buss3_city;
    public $buss3_state;
    public $buss3_phone;
    public $buss3_fax;
    public $fin_details_flag;
    public $fin_mara_flag;
    public $mara_tot_fin;
    public $mara_bal_fin;
    public $fin_aim_flag;
    public $aim_tot_fin;
    public $aim_bal_fin;
    public $fin_others;
    public $others_tot_fin;
    public $others_bal_fin;


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
        MaklumatPerniagaan::create(
            [
            'user_id' => Auth::id(),
            // ],
            // [
            'buss_branch_tot' => $this->buss_branch_tot,
            'buss1_branch_loc' => $this->buss1_branch_loc,
            'buss1_branch_status' => $this->buss1_branch_status,
            'buss1_branch_tot_worker' => $this->buss1_branch_tot_worker,
            'buss1_hours_start' => $this->buss1_hours_start,
            'buss1_hours_end' => $this->buss1_hours_end,
            'buss1_addr1' => $this->buss1_addr1,
            'buss1_addr2' => $this->buss1_addr2,
            'buss1_postcode' => $this->buss1_postcode,
            'buss1_city' => $this->buss1_city,
            'buss1_state' => $this->buss1_state,
            'buss1_phone' => $this->buss1_phone,
            'buss1_fax' => $this->buss1_fax,
            'buss2_branch_loc' => $this->buss2_branch_loc,
            'buss2_branch_status' => $this->buss2_branch_status,
            'buss2_branch_tot_worker' => $this->buss2_branch_tot_worker,
            'buss2_hours_start' => $this->buss2_hours_start,
            'buss2_hours_end' => $this->buss2_hours_end,
            'buss2_addr1' => $this->buss2_addr1,
            'buss2_addr2' => $this->buss2_addr2,
            'buss2_postcode' => $this->buss2_postcode,
            'buss2_city' => $this->buss2_city,
            'buss2_state' => $this->buss2_state,
            'buss2_phone' => $this->buss2_phone,
            'buss2_fax' => $this->buss2_fax,
            'buss3_branch_loc' => $this->buss3_branch_loc,
            'buss3_branch_status' => $this->buss3_branch_status,
            'buss3_branch_tot_worker' => $this->buss3_branch_tot_worker,
            'buss3_hours_start' => $this->buss3_hours_start,
            'buss3_hours_end' => $this->buss3_hours_end,
            'buss3_addr1' => $this->buss3_addr1,
            'buss3_addr2' => $this->buss3_addr2,
            'buss3_postcode' => $this->buss3_postcode,
            'buss3_city' => $this->buss3_city,
            'buss3_state' => $this->buss3_state,
            'buss3_phone' => $this->buss3_phone,
            'buss3_fax' => $this->buss3_fax,
            'fin_details_flag' => $this->fin_details_flag,
            'fin_mara_flag' => $this->fin_mara_flag,
            'mara_tot_fin' => $this->mara_tot_fin,
            'mara_bal_fin' => $this->mara_bal_fin,
            'fin_aim_flag' => $this->fin_aim_flag,
            'aim_tot_fin' => $this->aim_tot_fin,
            'aim_bal_fin' => $this->aim_bal_fin,
            'fin_others' => $this->fin_others,
            'others_tot_fin' => $this->others_tot_fin,
            'others_bal_fin' => $this->others_bal_fin,
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
        
        return view('livewire.module.maklumat-perniagaan2');
    }
}
