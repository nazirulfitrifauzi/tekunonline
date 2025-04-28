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
    public $sektor_perkeso;
    public $kelas_perkeso;
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
      'sektor_perkeso' =>'required_if:skim_safety,1',
      'kelas_perkeso' =>'required_if:skim_safety,1',
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
        'pymt_frequency.required' => 'Sila Pilih Kekerapan Bayaran',
        'pymt_method.required' => 'Sila Pilih Cara Bayaran',
        'reference_name.required' => 'Sila Masukkan Nama Perujuk',
        'reference_icno.required' => 'Sila Masukkan No Kad Pengenalan Perujuk',
       'reference_address1.required' => 'Sila Masukkan Alamat Perujuk',
       'reference_postcode.required' => 'Sila Masukkan Poskod Perujuk',
       'reference_city.required' => 'Sila Masukkan Bandar Perujuk',
       'reference_state.required' => 'Sila Masukkan Negeri Perujuk',
     'reference_relation.required' => 'Sila Pilih Hubungan Dengan Perujuk',
     'reference_phone.required' => 'Sila Masukkan No Telefon Perujuk',
      'reference2_name.required' => 'Sila Masukkan Nama Perujuk 2',
     'reference2_icno.required' => 'Sila Masukkan No Kad Pengenalan Perujuk 2',
    'reference2_address1.required' => 'Sila Masukkan Alamat Perujuk 2',  
    'reference2_relation.required' => 'Sila Pilih Hubungan dengan Perujuk 2',
    'reference2_phone.required' => 'Sila Masukkan No Telefon Perujuk 2',
     'takaful_incident.required' => 'Sila Pilih Takaful Kemalangan Peribadi Berkelompok',
     'skim_safety.required' => 'Sila Pilih  Skim Keselamatan Sosial Pekerjaan Sendiri PERKESO',
    'pakej_skim_safety.required_if' => 'Sila Pilih Pakej Skim Keselamatan Sosial Pekerjaan Sendiri PERKESO',
    'sektor_perkeso.required_if' => 'Sila Pilih Sektor Perkeso',
    'kelas_perkeso.required_if' => 'Sila Pilih Kelas Perkeso',
    'will_registration.required' => 'Sila Pilih Pendaftaran Wasiat',
    'will_comp_name.required_if' => 'Sila Pilih Nama Syarikat',
    'will_fi.required_if' => 'Sila Masukkan Fi Wasiat',
    'auth_disc_info_flag.required' => 'Sila Tandakan Ya untuk Kebenaran Penzahiran Maklumat Kredit Individu',
    'appl_stmt_flag.required' => 'Sila Tandakan Ya untuk Akuan Pemohon',
    'name_penamaan.required' => 'Sila Masukkan Nama Penamaan',
    'nationality_penamaan.required' => 'Sila Pilih Warganegara Penama',
    'icno_penamaan.required_if' => 'Sila Masukkan No Kad Pengenalan Penama',
    'passportno_penamaan.required_if' => 'Sila Masukkan No Pasport Penama',
    'penamaan_addr1.required' => 'Sila Masukkan Alamat Penama',
    'penamaan_relationship.required' => 'Sila Pilih Hubungan Penama',
    'penamaan_phone.required' => 'Sila Masukkan No Telefon Penama',   
    
    ];
}
