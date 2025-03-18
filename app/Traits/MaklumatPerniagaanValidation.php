<?php

namespace App\Traits;

trait MaklumatPerniagaanValidation
{
    //input save
    public $business_syariah;
    public $license_type;
    public $business_no;
    public $register_date;
    public $license_expired_date;
    public $business_name;
    public $business_sector;
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
    public $shareholder;
    public $business_modal;
    public $premise_loc_code;
    public $buss_other_loc_premise;
    public $total_employees;
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
    public $tot_partner;
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
    public $partner2_name;
    public $partner2_ic;
    public $partner2_address1;
    public $partner2_address2;
    public $partner2_postcode;
    public $partner2_city;
    public $partner2_state;
    public $partner2_phone;
    public $partner2_phone_hp;
    public $partner2_total_shares;
    public $partner2_roles;
    public $partner3_name;
    public $partner3_ic;
    public $partner3_address1;
    public $partner3_address2;
    public $partner3_postcode;
    public $partner3_city;
    public $partner3_state;
    public $partner3_phone;
    public $partner3_phone_hp;
    public $partner3_total_shares;
    public $partner3_roles;
    public $partner4_name;
    public $partner4_ic;
    public $partner4_address1;
    public $partner4_address2;
    public $partner4_postcode;
    public $partner4_city;
    public $partner4_state;
    public $partner4_phone;
    public $partner4_phone_hp;
    public $partner4_total_shares;
    public $partner4_roles;
    public $partner5_name;
    public $partner5_ic;
    public $partner5_address1;
    public $partner5_address2;
    public $partner5_postcode;
    public $partner5_city;
    public $partner5_state;
    public $partner5_phone;
    public $partner5_phone_hp;
    public $partner5_total_shares;
    public $partner5_roles;      
    
    public function rules()
    {
        $rules = [
            'business_syariah' => 'required',
            'business_sector' => 'required',
            'business_name' => 'required|string|max:255',
            'license_type' => 'required',
            'business_no' => 'required_unless:license_type,TIADA|string|max:50',
            'business_activity' => 'required',
            'sub_business_activity' => 'required',
            'business_duration' => 'required',
            'business_address1' => 'required|string|max:255',
            'business_address2' => 'nullable|string|max:255',
            'business_postcode' => 'required|string|size:5',
            'business_city' => 'required|string|max:100',
            'business_state' => 'required',
            'business_income' => 'required',
            'business_phone' => 'required|string|min:9|max:11',
            'business_phone_hp' => 'required|string|min:10|max:11',
            'business_premise' => 'required',
            'business_other_premise' => 'required_if:business_premise,LAIN-LAIN (SILA NYATAKAN)',
            'business_ownership' => 'required',
            'business_modal' => 'required_if:business_ownership,5|nullable|numeric',
            'premise_loc_code' => 'required',
            'total_employees' => 'required',
            'register_date' => 'required_if:license_type,NO. SSM|nullable|date',
            'license_expired_date' => 'required_if:license_type,NO. SSM|nullable|date|after:register_date',
            'shareholder' => 'required_if:business_ownership,5',
            'business_open' => 'required',
            'business_closed' => 'required',
            'tot_partner' =>'required',
            'partner_name' => 'required_if:business_ownership,4,5',
            'partner_ic' => 'required_if:business_ownership,4,5|nullable|string|size:12',
            'partner_address1' => 'required_if:business_ownership,4,5',
            'partner_postcode' => 'required_if:business_ownership,4,5|nullable|string|size:5',
            'partner_city' => 'required_if:business_ownership,4,5',
            'partner_state' => 'required_if:business_ownership,4,5',
            'partner_phone' => 'required_if:business_ownership,4,5|nullable|string|min:9|max:11',
            'partner_phone_hp' => 'required_if:business_ownership,4,5|nullable|string|min:10|max:11',
            'partner_total_shares' => 'required_if:business_ownership,5|nullable|numeric|min:0',
            'partner_roles' => 'required_if:business_ownership,4,5',
            'partner2_name' =>'required_if:tot_partner,2',
            'partner2_ic' =>'required_if:tot_partner,2|nullable|string|size:12',
            'partner2_address1' =>'required_if:tot_partner,2',
            'partner2_postcode' =>'required_if:tot_partner,2|nullable|string|size:5',
            'partner2_city' =>'required_if:tot_partner,2',
            'partner2_state' =>'required_if:tot_partner,2',
            'partner2_phone' =>'required_if:tot_partner,2|nullable|string|min:9|max:11',
            'partner2_phone_hp' =>'required_if:tot_partner,2|nullable|string|min:10|max:11',
            'partner2_total_shares' =>'required_if:tot_partner,2|nullable|numeric|min:0',
            'partner2_roles' =>'required_if:tot_partner,2',
            'partner3_name' =>'required_if:tot_partner,3',
            'partner3_ic' =>'required_if:tot_partner,3|nullable|string|size:12',
            'partner3_address1' =>'required_if:tot_partner,3',
            'partner3_postcode' =>'required_if:tot_partner,3|nullable|string|size:5',
            'partner3_city' =>'required_if:tot_partner,3',
            'partner3_state' =>'required_if:tot_partner,3',
            'partner3_phone' =>'required_if:tot_partner,3|nullable|string|min:9|max:11',
            'partner3_phone_hp' =>'required_if:tot_partner,3|nullable|string|min:10|max:11',
            'partner3_total_shares' =>'required_if:tot_partner,3|nullable|numeric|min:0',
            'partner3_roles' =>'required_if:tot_partner,3',
            'partner4_name' =>'required_if:tot_partner,4',
            'partner4_ic' =>'required_if:tot_partner,4|nullable|string|size:12',
            'partner4_address1' =>'required_if:tot_partner,4',
            'partner4_postcode' =>'required_if:tot_partner,4|nullable|string|size:5',
            'partner4_city' =>'required_if:tot_partner,4',
            'partner4_state' =>'required_if:tot_partner,4',
            'partner4_phone' =>'required_if:tot_partner,4|nullable|string|min:9|max:11',
            'partner4_phone_hp' =>'required_if:tot_partner,4|nullable|string|min:10|max:11',
            'partner4_total_shares' =>'required_if:tot_partner,4|nullable|numeric|min:0',
            'partner4_roles' =>'required_if:tot_partner,4',
            'partner5_name' =>'required_if:tot_partner,5',
            'partner5_ic' =>'required_if:tot_partner,5|nullable|string|size:12',
            'partner5_address1' =>'required_if:tot_partner,5',
            'partner5_postcode' =>'required_if:tot_partner,5|nullable|string|size:5',
            'partner5_city' =>'required_if:tot_partner,5',
            'partner5_state' =>'required_if:tot_partner,5',
            'partner5_phone' =>'required_if:tot_partner,5|nullable|string|min:9|max:11',
            'partner5_phone_hp' =>'required_if:tot_partner,5|nullable|string|min:10|max:11',
            'partner5_total_shares' =>'required_if:tot_partner,5|nullable|numeric|min:0',
            'partner5_roles' =>'required_if:tot_partner,5',
        ];

        return $rules;
    }

    protected $messages = [
            'business_syariah.required' => 'Sila pilih status patuh syariah',
            'business_sector.required' => 'Sila pilih sektor perniagaan',
            'business_name.required' => 'Sila masukkan nama perniagaan',
            'license_type.required' => 'Sila pilih jenis lesen',
            'business_no.required_unless' => 'Sila masukkan nombor lesen/pendaftaran',
            'business_activity.required' => 'Sila pilih aktiviti perniagaan',
            'sub_business_activity.required' => 'Sila pilih sub aktiviti perniagaan',
            'business_duration.required' => 'Sila pilih tempoh perniagaan',
            'business_address1.required' => 'Sila masukkan alamat perniagaan',
            'business_postcode.required' => 'Sila masukkan poskod',
            'business_postcode.size' => 'Poskod mestilah 5 digit',
            'business_city.required' => 'Sila masukkan bandar',
            'business_state.required' => 'Sila pilih negeri',
            'business_income.required' => 'Sila pilih anggaran pendapatan',
            'business_phone.required' => 'Sila masukkan nombor telefon premis',
            'business_phone_hp.required' => 'Sila masukkan nombor telefon bimbit',
            'business_premise.required' => 'Sila pilih status premis',
            'business_other_premise.required_if' => 'Sila nyatakan status premis lain',
            'business_ownership.required' => 'Sila pilih pemilikan perniagaan',
            'business_modal.required_if' => 'Sila masukkan modal berbayar',
            'premise_loc_code.required' => 'Sila pilih lokasi premis',
            'total_employees.required' => 'Sila masukkan jumlah pekerja',
            'register_date.required_if' => 'Sila masukkan tarikh pendaftaran',
            'license_expired_date.required_if' => 'Sila masukkan tarikh tamat lesen',
            'license_expired_date.after' => 'Tarikh tamat lesen mestilah selepas tarikh pendaftaran',
            'shareholder.required_if' => 'Sila pilih status pemegang saham',
            'business_open.required' => 'Sila masukkan waktu buka',
            'business_closed.required' => 'Sila masukkan waktu tutup',
            'tot_partner.required' => 'Sila masukkan jumlah rakan kongsi',
            'partner_name.required_if' => 'Sila masukkan nama rakan kongsi',
            'partner_ic.required_if' => 'Sila masukkan no KP rakan kongsi',
            'partner_ic.size' => 'No KP mestilah 12 digit',
            'partner_address1.required_if' => 'Sila masukkan alamat rakan kongsi',
            'partner_postcode.required_if' => 'Sila masukkan poskod rakan kongsi',
            'partner_city.required_if' => 'Sila masukkan bandar rakan kongsi',
            'partner_state.required_if' => 'Sila pilih negeri rakan kongsi',
            'partner_phone.required_if' => 'Sila masukkan nombor telefon rakan kongsi',
            'partner_total_shares.required_if' => 'Sila masukkan jumlah saham',
            'partner_roles.required_if' => 'Sila masukkan peranan rakan kongsi',
            'partner2_name.required_if' => 'Sila masukkan nama rakan kongsi',
            'partner2_ic.required_if' => 'Sila masukkan no KP rakan kongsi',
            'partner2_ic.size' => 'No KP mestilah 12 digit',
            'partner2_address1.required_if' => 'Sila masukkan alamat rakan kongsi',
            'partner2_postcode.required_if' => 'Sila masukkan poskod rakan kongsi',
            'partner2_city.required_if' => 'Sila masukkan bandar rakan kongsi',
            'partner2_state.required_if' => 'Sila pilih negeri rakan kongsi',
            'partner2_phone.required_if' => 'Sila masukkan nombor telefon rakan kongsi',
            'partner2_total_shares.required_if' => 'Sila masukkan jumlah saham',
            'partner2_roles.required_if' => 'Sila masukkan peranan rakan kongsi',
            'partner3_name.required_if' => 'Sila masukkan nama rakan kongsi',
            'partner3_ic.required_if' => 'Sila masukkan no KP rakan kongsi',
            'partner3_ic.size' => 'No KP mestilah 12 digit',
            'partner3_address1.required_if' => 'Sila masukkan alamat rakan kongsi',
            'partner3_postcode.required_if' => 'Sila masukkan poskod rakan kongsi',
            'partner3_city.required_if' => 'Sila masukkan bandar rakan kongsi',
            'partner3_state.required_if' => 'Sila pilih negeri rakan kongsi',
            'partner3_phone.required_if' => 'Sila masukkan nombor telefon rakan kongsi',
            'partner3_total_shares.required_if' => 'Sila masukkan jumlah saham',
            'partner3_roles.required_if' => 'Sila masukkan peranan rakan kongsi',
            'partner4_name.required_if' => 'Sila masukkan nama rakan kongsi',
            'partner4_ic.required_if' => 'Sila masukkan no KP rakan kongsi',
            'partner4_ic.size' => 'No KP mestilah 12 digit',
            'partner4_address1.required_if' => 'Sila masukkan alamat rakan kongsi',
            'partner4_postcode.required_if' => 'Sila masukkan poskod rakan kongsi',
            'partner4_city.required_if' => 'Sila masukkan bandar rakan kongsi',
            'partner4_state.required_if' => 'Sila pilih negeri rakan kongsi',
            'partner4_phone.required_if' => 'Sila masukkan nombor telefon rakan kongsi',
            'partner4_total_shares.required_if' => 'Sila masukkan jumlah saham',
            'partner4_roles.required_if' => 'Sila masukkan peranan rakan kongsi',
            'partner5_name.required_if' => 'Sila masukkan nama rakan kongsi',
            'partner5_ic.required_if' => 'Sila masukkan no KP rakan kongsi',
            'partner5_ic.size' => 'No KP mestilah 12 digit',
            'partner5_address1.required_if' => 'Sila masukkan alamat rakan kongsi',
            'partner5_postcode.required_if' => 'Sila masukkan poskod rakan kongsi',
            'partner5_city.required_if' => 'Sila masukkan bandar rakan kongsi',
            'partner5_state.required_if' => 'Sila pilih negeri rakan kongsi',
            'partner5_phone.required_if' => 'Sila masukkan nombor telefon rakan kongsi',
            'partner5_total_shares.required_if' => 'Sila masukkan jumlah saham',
            'partner5_roles.required_if' => 'Sila masukkan peranan rakan kongsi',
        ];
}
