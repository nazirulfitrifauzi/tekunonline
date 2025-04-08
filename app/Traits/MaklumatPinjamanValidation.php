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
    public $pakej_skim_safety;
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
        'purchase_price' => 'required|nullable|lte:100000|numeric',
        'pymt_duration' => 'required',
        'pymt_frequency' =>'required',
        'pymt_method' =>'required',
        'reference_name' =>'required',
        'reference_icno' =>'required',
        'reference_address1' =>'required',
        'reference_postcode' =>'required',
        'reference_city' =>'required',
        'reference_state' =>'required',
       'reference_relation' =>'required',
       'reference_phone' =>'required',
       'reference2_name' =>'required',
       'reference2_icno' =>'required',
       'reference2_address1' =>'required',
      'reference2_relation' =>'required',
      'reference2_phone' =>'required',
      'takaful_incident' =>'required',
      'skim_safety' =>'required',
      'pakej_skim_safety' =>'required_if:skim_safety,1',
      'will_registration' =>'required',
      'will_comp_name' =>'required_if:will_registration,1',
      'will_fi' =>'required_if:will_registration,1',
      'auth_disc_info_flag' =>'required',
      'appl_stmt_flag' =>'required',
      'name_penamaan' =>'required',
      'nationality_penamaan' =>'required',
      'icno_penamaan' =>'required_if:nationality_penamaan,1',
      'passportno_penamaan' =>'required_if:nationality_penamaan,0',
      'penamaan_addr1' =>'required',
      'penamaan_relationship' =>'required',
      'penamaan_phone' =>'required',
    ];
    

    protected $messages = [
        'purchase_price.required' => 'Sila Masukkan Jumlah Pembiayaan Yang Diperlukan',
        'purchase_price.lte' => 'Jumlah Pembiayaan Tidak Boleh Lebih Dari RM100,000',
        'pymt_duration.required' => 'Sila Pilih Tempoh Bayaran',
        'pymt_frequency.required' => 'Sila Pilih Frekuensi Bayaran',
        'pymt_method.required' => 'Sila Pilih Cara Bayaran',
        'reference_name.required' => 'Sila Masukkan Nama Ahli Waris',
        'reference_icno.required' => 'Sila Masukkan No Kad Pengenalan Ahli Waris',
       'reference_address1.required' => 'Sila Masukkan Alamat Ahli Waris',
       'reference_postcode.required' => 'Sila Masukkan Kod Pos Ahli Waris',
       'reference_city.required' => 'Sila Masukkan Kota Ahli Waris',
       'reference_state.required' => 'Sila Masukkan Negeri Ahli Waris',
     'reference_relation.required' => 'Sila Pilih Hubungan Ahli Waris',
     'reference_phone.required' => 'Sila Masukkan No Telefon Ahli Waris',
      'reference2_name.required' => 'Sila Masukkan Nama Ahli Waris 2',
     'reference2_icno.required' => 'Sila Masukkan No Kad Pengenalan Ahli Waris 2',
    'reference2_address1.required' => 'Sila Masukkan Alamat Ahli Waris 2',  
    'reference2_relation.required' => 'Sila Pilih Hubungan Ahli Waris 2',
    'reference2_phone.required' => 'Sila Masukkan No Telefon Ahli Waris 2',
     'takaful_incident.required' => 'Sila Pilih Tempoh Takaful',
     'skim_safety.required' => 'Sila Pilih Tempoh Takaful',
    'pakej_skim_safety.required_if' => 'Sila Pilih Pakej Skim Safety',
    'will_registration.required' => 'Sila Pilih Tempoh Takaful',
    'will_comp_name.required_if' => 'Sila Pilih Nama Perniagaan',
    'will_fi.required_if' => 'Sila Masukkan Nama Perniagaan',
    'auth_disc_info_flag.required' => 'Sila Pilih Tempoh Takaful',
    'appl_stmt_flag.required' => 'Sila Pilih Tempoh Takaful',
    'name_penamaan.required' => 'Sila Masukkan Nama Penamaan',
    'nationality_penamaan.required' => 'Sila Pilih Tempoh Takaful',
    'icno_penamaan.required_if' => 'Sila Masukkan No Kad Pengenalan Penamaan',
    'passportno_penamaan.required_if' => 'Sila Masukkan No Pasport Penamaan',
    'penamaan_addr1.required' => 'Sila Masukkan Alamat Penamaan',
    'penamaan_relationship.required' => 'Sila Pilih Hubungan Penamaan',
    'penamaan_phone.required' => 'Sila Masukkan No Telefon Penamaan',   
    
    ];
}
