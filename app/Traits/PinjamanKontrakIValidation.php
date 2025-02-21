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
}
