<?php

namespace App\Traits;

trait MaklumatPinjamanValidation
{
    //input save
    public $purchase_price;
    public $pymt_duration;
    public $pymt_frequency;
    public $pymt_method;
    public $reference_name;
    public $reference_icno;
    public $reference_address1;
    public $reference_address2;
    public $reference_postcode;
    public $reference_city;
    public $reference_state;
    public $reference_relation;
    public $reference_phone;
    public $reference2_name;
    public $reference2_icno;
    public $reference2_address1;
    public $reference2_address2;
    public $reference2_relation;
    public $reference2_phone;
    public $takaful_incident;
    public $skim_safety;
    public $will_registration;
    public $will_comp_name;
    public $will_fi;
    public $auth_disc_info_flag;
    public $appl_stmt_flag;
    public $name_penamaan;
    public $nationality_penamaan;
    public $icno_penamaan;
    public $passportno_penamaan;
    public $penamaan_addr1;
    public $penamaan_addr2;
    public $penamaan_relationship;
    public $penamaan_phone;

    protected $rules = [
        'purchase_price' => 'required',
        'pymt_duration' => 'required',
    //     'tekun_state' => 'required',
    //     'tekun_branch' => 'required',
        // 'business_status' => 'required',
        // 'business_method' => 'required',
        // 'bank1' => 'required',
        // 'bank1_acct' => 'required',
        // 'bank1_acc_type' => 'required',
   
    ];
    

    protected $messages = [
        'purchase_price.required' => 'Sila Masukkan Jumlah Pembiayaan Yang Diperlukan',
        'pymt_duration.required' => 'Sila Pilih Tempoh Bayaran',
    //     'tekun_state.required' => 'Sila Pilih Negeri',
    //     'tekun_branch.required' => 'Sila Pilih Cawangan',
        // 'business_status.required' => 'Sila Pilih Status Perniagaan',
        // 'business_method.required' => 'Sila Pilih Kaedah Perniagaan',
        // 'bank1.required' => 'Sila Pilih Bank',
        // 'bank1_acct.required' => 'Sila Masukkan No Akaun Bank',
        // 'bank1_acc_type.required' => 'Sila Pilih Jenis Akaun Bank',
    ];
}
