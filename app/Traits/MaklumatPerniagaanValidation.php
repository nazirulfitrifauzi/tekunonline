<?php

namespace App\Traits;
use Illuminate\Validation\Rule;

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
    public $selectedSubActivities = [];
    public $selectedSubActivitiesString;
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
            'license_expired_date' => [
                Rule::requiredIf(function () {
                    return $this->license_type === 'NO. SSM' && $this->business_ownership != '5';
                }),
            ],
            'business_ownership' =>'required',
            'shareholder' =>'required_if:business_ownership,5',
            // 'business_modal' =>'required_if:business_ownership,5|numeric|lte:300000',
            'business_name' =>'required',
            'business_sector' =>'required',
            'business_activity' =>'required',
            'selectedSubActivities' =>'required_if:business_activity,100500|required_if:business_activity,100501|required_if:business_activity,100502
                                    |required_if:business_activity,100503|required_if:business_activity,100504|required_if:business_activity,100505
                                    |required_if:business_activity,100506|required_if:business_activity,100507|required_if:business_activity,100508
                                    |required_if:business_activity,100509|array',
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
            'business_other_premise' =>'required_if:business_premise,LAIN-LAIN (SILA NYATAKAN)',
            'premise_loc_code' =>'required',
            'buss_other_loc_premise' =>'required_if:premise_loc_code,Lain-Lain (Nyatakan)',
            'total_employees' =>'required',
            'membership_status' =>'required',
            'membership_assoc' =>'required_if:membership_status,YA',
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

        if($this->business_ownership == 5){
            $this->business_modal = str_replace(',', '', $this->business_modal);
            $rules['business_modal'] = 'required|lte:300000|numeric';
        }

        return $rules;
    }

    protected $messages = [
        'business_syariah.required' => 'Sila pilih perniagaan patuh syariah.',
        'license_type.required' => 'Sila pilih jenis lesen.',
        'business_no.required_if' => 'Sila masukkan no. lesen.',
        'register_date.required_if' => 'Sila masukkan tarikh pendaftaran.',
        'license_expired_date.required_if' => 'Sila masukkan tarikh tamat lesen.',
        'license_expired_date.after' => 'Tarikh masa lesen mestilah selepas tarikh pendaftaran.',
        'business_ownership.required' => 'Sila pilih pemilikan perniagaan.',
        'shareholder.required_if' => 'Sila masukkan pastikan pemohon pemegang saham.',
        'business_modal.required_if' => 'Sila masukkan modal berbayar.',
        'business_modal.lte' => 'Modal berbayar tidak boleh lebih daripada RM300,000.',
        'business_name.required' => 'Sila masukkan nama perniagaan.',
        'business_sector.required' => 'Sila pilih sektor perniagaan.',
        'business_activity.required' => 'Sila pilih aktiviti perniagaan.',
        'selectedSubActivities.required_if' => 'Sila pilih sub aktiviti perniagaan.',
        'selectedSubActivities.array' => 'Format sub aktiviti perniagaan tidak sah.',
        'business_duration_year.required' => 'Sila pilih masa perniagaan (tahun).',
        'business_duration_month.required' => 'Sila pilih masa perniagaan (bulan).',
        'business_address1.required' => 'Sila masukkan alamat perniagaan.',
        'business_postcode.required' => 'Sila masukkan poskod perniagaan.',
        'business_city.required' => 'Sila masukkan bandar perniagaan.',
        'business_state.required' => 'Sila pilih negeri perniagaan.',
        'business_income.required' => 'Sila masukkan anggaran pendapatan kasar(sebulan)',
        'business_phone.required' => 'Sila masukkan nombor telefon premis perniagaan.',
        'business_phone_hp.required' => 'Sila masukkan nombor telefon bimbit perniagaan.',
        'business_premise.required' => 'Sila pilih status premis/projek.',
        'business_other_premise.required_if' => 'Sila masukkan stattus premis/projek (lain-lain).',
        'premise_loc_code.required' => 'Sila pilih lokasi premis.',
        'buss_other_loc_premise.required_if' => 'Sila masukkan lokasi premis (lain-lain).',
        'total_employees.required' => 'Sila masukkan jumlah bilangan pekerja.',
        'membership_status.required' => 'Sila pilih keahlian persatuan.',
        'membership_assoc.required_if' => 'Sila pilih jenis keahlian persatuan.',
        'business_open.required' => 'Sila pilih masa buka.',
        'business_closed.required' => 'Sila pilih masa tutup.',
        'cert_recognition_flag.required' => 'Sila pilih pengiktirafan sijil.',
        'business_asset_value.required' => 'Sila masukkan nilai aset perniagaan sedia ada.',
        'business_start_resources.required' => 'Sila masukkan modal memulakan perniagaan.',
        'tot_partner.required' => 'Sila masukkan jumlah rakan kongsi.',
        'tot_partner.required_if' => 'Sila masukkan jumlah rakan kongsi.',


        //partner 1
        'partner_name.required' => 'Sila masukkan nama rakan kongsi.',
        'partner_ic.required' => 'Sila masukkan no. kad pengenalan rakan kongsi.',
        'partner_address1.required' => 'Sila masukkan alamat rakan kongsi.',
        'partner_postcode.required' => 'Sila masukkan poskodrakan kongsi.',
        'partner_city.required' => 'Sila masukkan bandar rakan kongsi.',
        'partner_state.required' => 'Sila pilih negeri rakan kongsi.',
        'partner_phone.required' => 'Sila masukkan nombor telefon rumah rakan kongsi.',
        'partner_phone_hp.required' => 'Sila masukkan nombor telefon hp rakan kongsi.',
        'partner_total_shares.required' => 'Sila masukkan jumlah saham rakan kongsi.',
        'partner_roles.required' => 'Sila pilih jawatan rakan kongsi.',

        //partner 2
        'partner2_name.required' => 'Sila masukkan nama rakan kongsi.',
        'partner2_ic.required' => 'Sila masukkan no. kad pengenalan rakan kongsi.',
        'partner2_address1.required' => 'Sila masukkan alamat rakan kongsi.',
        'partner2_postcode.required' => 'Sila masukkan poskod rakan kongsi.',    
        'partner2_city.required' => 'Sila masukkan bandar rakan kongsi.',
        'partner2_state.required' => 'Sila pilih negeri rakan kongsi.',
        'partner2_phone.required' => 'Sila masukkan nombor telefon rumah rakan kongsi.',
        'partner2_phone_hp.required' => 'Sila masukkan nombor telefon hp rakan kongsi.',
        'partner2_total_shares.required' => 'Sila masukkan jumlah saham rakan kongsi.',
        'partner2_roles.required' => 'Sila pilih jawatan rakan kongsi.',

        //partner 3
        'partner3_name.required' => 'Sila masukkan nama rakan kongsi.',
        'partner3_ic.required' => 'Sila masukkan no. kad pengenalan rakan kongsi.',
        'partner3_address1.required' => 'Sila masukkan alamat rakan kongsi.',
        'partner3_postcode.required' => 'Sila masukkan poskod rakan kongsi.',    
        'partner3_city.required' => 'Sila masukkan bandar rakan kongsi.',
        'partner3_state.required' => 'Sila pilih negeri rakan kongsi.',
        'partner3_phone.required' => 'Sila masukkan nombor telefon rumah rakan kongsi.',
        'partner3_phone_hp.required' => 'Sila masukkan nombor telefon hp rakan kongsi.',
        'partner3_total_shares.required' => 'Sila masukkan jumlah saham rakan kongsi.',
        'partner3_roles.required' => 'Sila pilih jawatan rakan kongsi.',

        //partner 4
        'partner4_name.required' => 'Sila masukkan nama rakan kongsi.',
        'partner4_ic.required' => 'Sila masukkan no. kad pengenalan rakan kongsi.',
        'partner4_address1.required' => 'Sila masukkan alamat rakan kongsi.',
        'partner4_postcode.required' => 'Sila masukkan poskod rakan kongsi.',    
        'partner4_city.required' => 'Sila masukkan bandar rakan kongsi.',
        'partner4_state.required' => 'Sila pilih negeri rakan kongsi.',
        'partner4_phone.required' => 'Sila masukkan nombor telefon rumah rakan kongsi.',
        'partner4_phone_hp.required' => 'Sila masukkan nombor telefon hp rakan kongsi.',
        'partner4_total_shares.required' => 'Sila masukkan jumlah saham rakan kongsi.',
        'partner4_roles.required' => 'Sila pilih jawatan rakan kongsi.',

        //partner 5
        'partner5_name.required' => 'Sila masukkan nama rakan kongsi.',
        'partner5_ic.required' => 'Sila masukkan no. kad pengenalan rakan kongsi.',
        'partner5_address1.required' => 'Sila masukkan alamat rakan kongsi.',
        'partner5_postcode.required' => 'Sila masukkan poskod rakan kongsi.',   
        'partner5_city.required' => 'Sila masukkan bandar rakan kongsi.',
        'partner5_state.required' => 'Sila pilih negeri rakan kongsi.',
        'partner5_phone.required' => 'Sila masukkan nombor telefon rumah rakan kongsi.',
        'partner5_phone_hp.required' => 'Sila masukkan nombor telefon hp rakan kongsi.',
        'partner5_total_shares.required' => 'Sila masukkan jumlah saham rakan kongsi.',
        'partner5_roles.required' => 'Sila pilih jawatan rakan kongsi.',
        ];
}

