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
    public $business_ownership;
    public $shareholder;
    public $business_modal;
    public $business_name;
    public $business_sector;
    public $business_activity;
    public $sub_business_activity;
    public $business_duration;
    public $business_duration_year;
    public $business_duration_month;
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
            'license_type' =>'required',
            'business_no' => 'required_if:license_type,LESEN|required_if:license_type,ORDINAN|required_if:license_type,NO. SSM',
            'register_date' => 'required_if:license_type,NO. SSM',
            'license_expired_date' =>'required_if:license_type,NO. SSM',
            'business_ownership' =>'required',
            'shareholder' =>'required_if:business_ownership,5',
            'business_modal' =>'required_if:business_ownership,5',
            'business_name' =>'required',
            'business_sector' =>'required',
            'business_activity' =>'required',
            'sub_business_activity' =>'required_if:business_activity,100500|required_if:business_activity,100501|required_if:business_activity,100502
                                    |required_if:business_activity,100503|required_if:business_activity,100504|required_if:business_activity,100505
                                    |required_if:business_activity,100506|required_if:business_activity,100507|required_if:business_activity,100508
                                    |required_if:business_activity,100509',
            'business_duration_year' =>'required',
            'business_duration_month' =>'required',
            'business_address1' =>'required',
            'business_postcode' =>'required',
            'business_city' =>'required',
            'business_state' =>'required',
            'business_income' =>'required',
            'business_phone' =>'required',
            'business_phone_hp' =>'required',
            'business_premise' =>'required',
            'business_other_premise' =>'required_if:business_premise,LAIN-LAIN',
            'premise_loc_code' =>'required',
            'buss_other_loc_premise' =>'required_if:premise_loc_code,LAIN-LAIN',
            'total_employees' =>'required',
            'membership_status' =>'required',
            'membership_assoc' =>'required_if:membership_status,1',
            'business_open' =>'required',
            'business_closed' =>'required',
            'cert_recognition_flag' =>'required',
            'business_asset_value' =>'required',
            'business_start_resources' =>'required',
            'tot_partner' =>'required_if:business_ownership,4|required_if:business_ownership,5',
        ];

        // Add partner validation rules only if tot_partner is 1
        if ($this->tot_partner >= 1) {
            $rules = array_merge($rules, [
                'partner_name' => 'required',
                'partner_ic' =>'required',
                'partner_address1' =>'required',
                'partner_postcode' =>'required',
                'partner_city' =>'required',
                'partner_state' =>'required',
                'partner_phone' =>'required',
                'partner_phone_hp' =>'required',
                'partner_total_shares' =>'required',
                'partner_roles' =>'required',
            ]);
        }

        // Add partner validation rules only if tot_partner is 2
        if ($this->tot_partner >= 2) {
            $rules = array_merge($rules, [
                'partner2_name' =>'required',
                'partner2_ic' =>'required',
                'partner2_address1' =>'required',
                'partner2_postcode' =>'required',
                'partner2_city' =>'required',
                'partner2_state' =>'required',
                'partner2_phone' =>'required',
                'partner2_phone_hp' =>'required',   
                'partner2_total_shares' =>'required',
                'partner2_roles' =>'required',
            ]);
        }

        // Add partner validation rules only if tot_partner is 3
        if ($this->tot_partner >= 3) {
            $rules = array_merge($rules, [
                'partner3_name' =>'required',
                'partner3_ic' =>'required',
                'partner3_address1' =>'required',
                'partner3_postcode' =>'required',
                'partner3_city' =>'required',
                'partner3_state' =>'required',
                'partner3_phone' =>'required',
                'partner3_phone_hp' =>'required',
                'partner3_total_shares' =>'required',
                'partner3_roles' =>'required',
            ]);
        }

        // Add partner validation rules only if tot_partner is 4
        if ($this->tot_partner >= 4) {
            $rules = array_merge($rules, [
                'partner4_name' =>'required',
                'partner4_ic' =>'required',
                'partner4_address1' =>'required',
                'partner4_postcode' =>'required',               
                'partner4_city' =>'required',
                'partner4_state' =>'required',
                'partner4_phone' =>'required',
                'partner4_phone_hp' =>'required',
                'partner4_total_shares' =>'required',
                'partner4_roles' =>'required',
            ]);
        }

        // Add partner validation rules only if tot_partner is 5
        if ($this->tot_partner >= 5) {
            $rules = array_merge($rules, [
                'partner5_name' =>'required',
                'partner5_ic' =>'required',
                'partner5_address1' =>'required',
                'partner5_postcode' =>'required',
                'partner5_city' =>'required',
                'partner5_state' =>'required',
                'partner5_phone' =>'required',
                'partner5_phone_hp' =>'required',
                'partner5_total_shares' =>'required',
                'partner5_roles' =>'required',  
            ]);
        }

        // if($this->business_ownership == 5){
        //     $rules['business_modal'] = 'required|lte:300000|numeric';
        // }

        return $rules;
    }

    protected $messages = [
        'business_syariah.required' => 'Sila pilih jenis syariah.',
        'license_type.required' => 'Sila pilih jenis lesen.',
        'business_no.required_if' => 'Sila masukkan no. lesen.',
        'register_date.required_if' => 'Sila masukkan tarikh pendaftaran.',
        'license_expired_date.required_if' => 'Sila masukkan tarikh masa lesen.',
        'license_expired_date.after' => 'Tarikh masa lesen mestilah selepas tarikh pendaftaran.',
        'business_ownership.required' => 'Sila pilih jenis pemilik.',
        'shareholder.required_if' => 'Sila masukkan jumlah pemegang.',
        'business_modal.required_if' => 'Sila masukkan modal.',
        'business_name.required' => 'Sila masukkan nama perniagaan.',
        'business_sector.required' => 'Sila pilih sektor perniagaan.',
        'business_activity.required' => 'Sila pilih aktiviti perniagaan.',
        'sub_business_activity.required_if' => 'Sila pilih sub aktiviti perniagaan.',
        'business_duration_year.required' => 'Sila pilih masa perniagaan (tahun).',
        'business_duration_month.required' => 'Sila pilih masa perniagaan (bulan).',
        'business_address1.required' => 'Sila masukkan alamat 1.',
        'business_postcode.required' => 'Sila masukkan poskod.',
        'business_city.required' => 'Sila masukkan bandar.',
        'business_state.required' => 'Sila pilih negeri.',
        'business_income.required' => 'Sila masukkan pendapatan perniagaan.',
        'business_phone.required' => 'Sila masukkan nombor telefon.',
        'business_phone_hp.required' => 'Sila masukkan nombor telefon hp.',
        'business_premise.required' => 'Sila pilih jenis tempat perniagaan.',
        'business_other_premise.required_if' => 'Sila masukkan jenis tempat perniagaan.',
        'premise_loc_code.required' => 'Sila pilih jenis tempat perniagaan.',
        'buss_other_loc_premise.required_if' => 'Sila masukkan jenis tempat perniagaan.',
        'total_employees.required' => 'Sila masukkan jumlah pegawai.',
        'membership_status.required' => 'Sila pilih status perniagaan.',
        'membership_assoc.required_if' => 'Sila masukkan perniagaan.',
        'business_open.required' => 'Sila pilih masa buka.',
        'business_closed.required' => 'Sila pilih masa tutup.',
        'cert_recognition_flag.required' => 'Sila pilih maklumat pembiayaan perniagaan sedia ada.',
        'business_asset_value.required' => 'Sila masukkan nilai aset perniagaan.',
        'business_start_resources.required' => 'Sila masukkan sumber daya perniagaan.',
        'tot_partner.required' => 'Sila masukkan jumlah perniagaan.',

        //partner 1
        'partner_name.required' => 'Sila masukkan nama pemegang.',
        'partner_ic.required' => 'Sila masukkan no. kad pengenalan.',
        'partner_address1.required' => 'Sila masukkan alamat 1.',
        'partner_postcode.required' => 'Sila masukkan poskod.',
        'partner_city.required' => 'Sila masukkan bandar.',
        'partner_state.required' => 'Sila pilih negeri.',
        'partner_phone.required' => 'Sila masukkan nombor telefon.',
        'partner_phone_hp.required' => 'Sila masukkan nombor telefon hp.',
        'partner_total_shares.required' => 'Sila masukkan jumlah saham.',
        'partner_roles.required' => 'Sila pilih peranan.',

        //partner 2
        'partner2_name.required' => 'Sila masukkan nama pemegang.',
        'partner2_ic.required' => 'Sila masukkan no. kad pengenalan.',
        'partner2_address1.required' => 'Sila masukkan alamat 1.',
        'partner2_postcode.required' => 'Sila masukkan poskod.',    
        'partner2_city.required' => 'Sila masukkan bandar.',
        'partner2_state.required' => 'Sila pilih negeri.',
        'partner2_phone.required' => 'Sila masukkan nombor telefon.',
        'partner2_phone_hp.required' => 'Sila masukkan nombor telefon hp.',
        'partner2_total_shares.required' => 'Sila masukkan jumlah saham.',
        'partner2_roles.required' => 'Sila pilih peranan.',

        //partner 3
        'partner3_name.required' => 'Sila masukkan nama pemegang.',
        'partner3_ic.required' => 'Sila masukkan no. kad pengenalan.',
        'partner3_address1.required' => 'Sila masukkan alamat 1.',
        'partner3_postcode.required' => 'Sila masukkan poskod.',    
        'partner3_city.required' => 'Sila masukkan bandar.',
        'partner3_state.required' => 'Sila pilih negeri.',
        'partner3_phone.required' => 'Sila masukkan nombor telefon.',
        'partner3_phone_hp.required' => 'Sila masukkan nombor telefon hp.',
        'partner3_total_shares.required' => 'Sila masukkan jumlah saham.',
        'partner3_roles.required' => 'Sila pilih peranan.',

        //partner 4
        'partner4_name.required' => 'Sila masukkan nama pemegang.',
        'partner4_ic.required' => 'Sila masukkan no. kad pengenalan.',
        'partner4_address1.required' => 'Sila masukkan alamat 1.',
        'partner4_postcode.required' => 'Sila masukkan poskod.',    
        'partner4_city.required' => 'Sila masukkan bandar.',
        'partner4_state.required' => 'Sila pilih negeri.',
        'partner4_phone.required' => 'Sila masukkan nombor telefon.',
        'partner4_phone_hp.required' => 'Sila masukkan nombor telefon hp.',
        'partner4_total_shares.required' => 'Sila masukkan jumlah saham.',
        'partner4_roles.required' => 'Sila pilih peranan.',

        //partner 5
        'partner5_name.required' => 'Sila masukkan nama pemegang.',
        'partner5_ic.required' => 'Sila masukkan no. kad pengenalan.',
        'partner5_address1.required' => 'Sila masukkan alamat 1.',
        'partner5_postcode.required' => 'Sila masukkan poskod.',   
        'partner5_city.required' => 'Sila masukkan bandar.',
        'partner5_state.required' => 'Sila pilih negeri.',
        'partner5_phone.required' => 'Sila masukkan nombor telefon.',
        'partner5_phone_hp.required' => 'Sila masukkan nombor telefon hp.',
        'partner5_total_shares.required' => 'Sila masukkan jumlah saham.',
        'partner5_roles.required' => 'Sila pilih peranan.',
        ];
}
