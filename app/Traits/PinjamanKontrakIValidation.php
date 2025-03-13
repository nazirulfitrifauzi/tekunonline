<?php

namespace App\Traits;

trait PinjamanKontrakIValidation
{
    public $bidder_name;
    public $contract_no;
    public $contract_duration;
    public $start_date_contract;
    public $end_date_contract;
    public $inden_description;
    public $contract_value;
    public $max_value;
    public $penawar_kontrak_nama;
    public $penawar_kontrak_addr1;
    public $penawar_kontrak_addr2;
    public $penawar_kontrak_postcode;
    public $penawar_kontrak_city;
    public $penawar_kontrak_state;
    public $penawar_kontrak_phone;
    public $penawar_kontrak_fax;
    public $pembayar_kontrak_name;
    public $pembayar_kontrak_addr1;
    public $pembayar_kontrak_addr2;
    public $pembayar_kontrak_postcode;
    public $pembayar_kontrak_city;
    public $pembayar_kontrak_state;
    public $pembayar_kontrak_phone;
    public $pembayar_kontrak_fax;

    protected $rules = [
        'bidder_name' =>'required',
        'contract_no' =>'required',
        'contract_duration' =>'required',
        'start_date_contract' =>'required',
        'end_date_contract' =>'required',
        'inden_description' =>'required',
        'contract_value' =>'required',
        'max_value' =>'required',

        //penawar kontrak
        'penawar_kontrak_nama' =>'required',
        'penawar_kontrak_addr1' =>'required',
        'penawar_kontrak_postcode' =>'required',
        'penawar_kontrak_city' =>'required',
        'penawar_kontrak_state' =>'required',
        'penawar_kontrak_phone' =>'required',
        'penawar_kontrak_fax' =>'required',

        //pembayar kontrak
        'pembayar_kontrak_name' =>'required',
        'pembayar_kontrak_addr1' =>'required',
        'pembayar_kontrak_postcode' =>'required',
        'pembayar_kontrak_city' =>'required',
        'pembayar_kontrak_state' =>'required',
        'pembayar_kontrak_phone' =>'required',
        'pembayar_kontrak_fax' =>'required',
    ];

    protected $messages = [
        'bidder_name.required' => 'Sila Masukkan Nama Penawar',
        'contract_no.required' => 'Sila Masukkan No Kontrak',
        'contract_duration.required' => 'Sila Masukkan Durasi Kontrak',
        'start_date_contract.required' => 'Sila Masukkan Tarikh Mula Kontrak',
        'end_date_contract.required' => 'Sila Masukkan Tarikh Tamat Kontrak',
        'inden_description.required' => 'Sila Masukkan Keterangan Inden',
        'contract_value.required' => 'Sila Masukkan Nilai Kontrak',
       'max_value.required' => 'Sila Masukkan Nilai Maksimum',

        //penawar kontrak
        'penawar_kontrak_nama.required' => 'Sila Masukkan Nama Penawar',
        'penawar_kontrak_addr1.required' => 'Sila Masukkan Alamat Penawar Kontrak',
        'penawar_kontrak_postcode.required' => 'Sila Masukkan Poskod Penawar',
        'penawar_kontrak_city.required' => 'Sila Masukkan Kota Penawar',
        'penawar_kontrak_state.required' => 'Sila Masukkan Negeri Penawar',
        'penawar_kontrak_phone.required' => 'Sila Masukkan No Telefon Penawar',
        'penawar_kontrak_fax.required' => 'Sila Masukkan No Faks Penawar',

        //pembayar kontrak
        'pembayar_kontrak_name.required' => 'Sila Masukkan Nama Pembayar',
        'pembayar_kontrak_addr1.required' => 'Sila Masukkan Alamat Pembayar',
        'pembayar_kontrak_postcode.required' => 'Sila Masukkan Poskod Pembayar',
        'pembayar_kontrak_city.required' => 'Sila Masukkan Kota Pembayar',
        'pembayar_kontrak_state.required' => 'Sila Masukkan Negeri Pembayar',
        'pembayar_kontrak_phone.required' => 'Sila Masukkan No Telefon Pembayar',
        'pembayar_kontrak_fax.required' => 'Sila Masukkan No Faks Pembayar',
    ];
}
