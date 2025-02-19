<?php

namespace App\Traits;

trait MaklumatPeribadiValidation
{
    // Form fields
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

    // Validation rules
    protected $rules = [
        'tekun_state' => 'required',
        'tekun_branch' => 'required',
        // ... other commented rules remain the same ...
    ];

    // Validation messages
    protected $messages = [
        'tekun_state.required' => 'Sila Pilih Negeri',
        'tekun_branch.required' => 'Sila Pilih Cawangan',
        // ... other commented messages remain the same ...
    ];
} 