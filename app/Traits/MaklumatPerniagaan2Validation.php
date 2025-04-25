<?php

namespace App\Traits;

trait MaklumatPerniagaan2Validation
{
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
    public $num_exist_busi_fin;
    public $fin1_flag;
    public $fin1_other_name;
    public $fin1_tot;
    public $fin1_bal;
    public $fin2_flag;
    public $fin2_other_name;
    public $fin2_tot;
    public $fin2_bal;
    public $fin3_flag;
    public $fin3_other_name;
    public $fin3_tot;
    public $fin3_bal;
    public $tot_fin_tot;
    public $tot_bal;


        // protected $rules = [
    //     'tekun_state' => 'required',
    //     'tekun_branch' => 'required',
        // 'business_status' => 'required',
        // 'business_method' => 'required',
        // 'bank1' => 'required',
        // 'bank1_acct' => 'required',
        // 'bank1_acc_type' => 'required',
   
    // ];

    public function rules()
    {
        $rules = [
            'buss_branch_tot' => 'required|in:1,2,3',
            'fin_details_flag' => 'required|in:0,1',
            'num_exist_busi_fin' =>'required_if:fin_details_flag,1',
        ];

        // Add financing validation rules only if fin_details_flag is 1
        if ($this->num_exist_busi_fin >= 1) {
            $rules = array_merge($rules, [
                'fin1_flag' => 'required',
                'fin1_other_name' => 'required_if:fin1_flag,LAIN-LAIN',
                'fin1_tot' => 'required',
                'fin1_bal' => 'required',
            ]);
        }

        if ($this->num_exist_busi_fin >= 2) {
            $rules = array_merge($rules, [
                'fin2_flag' =>'required',
                'fin2_other_name' =>'required_if:fin2_flag,LAIN-LAIN',
                'fin2_tot' =>'required',
                'fin2_bal' =>'required',
            ]);
        }

        if ($this->num_exist_busi_fin >= 3) {
            $rules = array_merge($rules, [
                'fin3_flag' =>'required',
                'fin3_other_name' =>'required_if:fin3_flag,LAIN-LAIN',
                'fin3_tot' =>'required',
                'fin3_bal' =>'required',
            ]);
        }
        
        

        // Cawangan 1 rules (always required if any branch is selected)
        if ($this->buss_branch_tot >= 1) {
            $rules = array_merge($rules, [
                'buss1_branch_loc' => 'required',
                'buss1_branch_status' => 'required',
                'buss1_branch_tot_worker' => 'required',
                'buss1_hours_start' => 'required',
                'buss1_hours_end' => 'required',
                'buss1_addr1' => 'required',
                'buss1_postcode' => 'required|digits:5',
                'buss1_city' => 'required',
                'buss1_state' => 'required',
                'buss1_phone' => 'required',
                //'buss1_fax' => 'required',
            ]);
        }

        // Cawangan 2 rules
        if ($this->buss_branch_tot >= 2) {
            $rules = array_merge($rules, [
                'buss2_branch_loc' => 'required',
                'buss2_branch_status' => 'required',
                'buss2_branch_tot_worker' => 'required',
                'buss2_hours_start' => 'required',
                'buss2_hours_end' => 'required',
                'buss2_addr1' => 'required',
                'buss2_postcode' => 'required|digits:5',
                'buss2_city' => 'required',
                'buss2_state' => 'required',
                'buss2_phone' => 'required',
                'buss2_fax' => 'required',
            ]);
        }

        // Cawangan 3 rules
        if ($this->buss_branch_tot >= 3) {
            $rules = array_merge($rules, [
                'buss3_branch_loc' => 'required',
                'buss3_branch_status' => 'required',
                'buss3_branch_tot_worker' => 'required',
                'buss3_hours_start' => 'required',
                'buss3_hours_end' => 'required',
                'buss3_addr1' => 'required',
                'buss3_postcode' => 'required|digits:5',
                'buss3_city' => 'required',
                'buss3_state' => 'required',
                'buss3_phone' => 'required',
                'buss3_fax' => 'required',
            ]);
        }

        return $rules;
    }

    protected $messages = [
        'buss_branch_tot.required' => 'Sila pilih bilangan cawangan.',
        'buss_branch_tot.in' => 'Bilangan cawangan tidak sah.',
        
        // Cawangan 1 messages
        'buss1_branch_loc.required' => 'Sila pilih lokasi cawangan 1.',
        'buss1_branch_status.required' => 'Sila pilih status cawangan 1.',
        'buss1_branch_tot_worker.required' => 'Sila pilih bilangan pekerja cawangan 1.',
        'buss1_hours_start.required' => 'Sila masukkan masa mula berniaga cawangan 1.',
        'buss1_hours_end.required' => 'Sila masukkan masa tutup berniaga cawangan 1.',
        'buss1_addr1.required' => 'Sila masukkan alamat cawangan 1.',
        'buss1_postcode.required' => 'Sila masukkan poskod cawangan 1.',
        'buss1_postcode.digits' => 'Poskod cawangan 1 mestilah 5 digit.',
        'buss1_city.required' => 'Sila masukkan bandar cawangan 1.',
        'buss1_state.required' => 'Sila pilih negeri cawangan 1.',
        'buss1_phone.required' => 'Sila masukkan nombor telefon cawangan 1.',
        //'buss1_fax.required' => 'Sila masukkan nombor fax cawangan 1.',

        // Cawangan 2 messages
        'buss2_branch_loc.required' => 'Sila pilih lokasi cawangan 2.',
        'buss2_branch_status.required' => 'Sila pilih status cawangan 2.',
        'buss2_branch_tot_worker.required' => 'Sila pilih bilangan pekerja cawangan 2.',
        'buss2_hours_start.required' => 'Sila masukkan masa mula berniaga cawangan 2.',
        'buss2_hours_end.required' => 'Sila masukkan masa tutup berniaga cawangan 2.',
        'buss2_addr1.required' => 'Sila masukkan alamat cawangan 2.',
        'buss2_postcode.required' => 'Sila masukkan poskod cawangan 2.',
        'buss2_postcode.digits' => 'Poskod cawangan 2 mestilah 5 digit.',
        'buss2_city.required' => 'Sila masukkan bandar cawangan 2.',
        'buss2_state.required' => 'Sila pilih negeri cawangan 2.',
        'buss2_phone.required' => 'Sila masukkan nombor telefon cawangan 2.',
        'buss2_fax.required' => 'Sila masukkan nombor fax cawangan 2.',

        // Cawangan 3 messages
        'buss3_branch_loc.required' => 'Sila pilih lokasi cawangan 3.',
        'buss3_branch_status.required' => 'Sila pilih status cawangan 3.',
        'buss3_branch_tot_worker.required' => 'Sila pilih bilangan pekerja cawangan 3.',
        'buss3_hours_start.required' => 'Sila masukkan masa mula berniaga cawangan 3.',
        'buss3_hours_end.required' => 'Sila masukkan masa tutup berniaga cawangan 3.',
        'buss3_addr1.required' => 'Sila masukkan alamat cawangan 3.',
        'buss3_postcode.required' => 'Sila masukkan poskod cawangan 3.',
        'buss3_postcode.digits' => 'Poskod cawangan 3 mestilah 5 digit.',
        'buss3_city.required' => 'Sila masukkan bandar cawangan 3.',
        'buss3_state.required' => 'Sila pilih negeri cawangan 3.',
        'buss3_phone.required' => 'Sila masukkan nombor telefon cawangan 3.',
        'buss3_fax.required' => 'Sila masukkan nombor fax cawangan 3.',

        //Financing
        'fin_details_flag.required' => 'Sila pilih maklumat pembiayaan perniagaan sedia ada.',
        'num_exist_busi_fin.required_if' => 'Sila masukkan jumlah pembiayaan perniagaan sedia ada.',

        //Financing 1
        'fin1_flag.required' => 'Sila pilih jenis pembiayaan.',
        'fin1_other_name.required_if' => 'Sila masukkan nama pembiayaan.',
        'fin1_tot.required' => 'Sila masukkan jumlah pembiayaan.',
        'fin1_bal.required' => 'Sila masukkan baki pembiayaan.',

        //Financing 2
        'fin2_flag.required' => 'Sila pilih jenis pembiayaan.',
        'fin2_other_name.required_if' => 'Sila masukkan nama pembiayaan.',
        'fin2_tot.required' => 'Sila masukkan jumlah pembiayaan.',
        'fin2_bal.required' => 'Sila masukkan baki pembiayaan.',    

        //Financing 3
        'fin3_flag.required' => 'Sila pilih jenis pembiayaan.',
        'fin3_other_name.required_if' => 'Sila masukkan nama pembiayaan.',
        'fin3_tot.required' => 'Sila masukkan jumlah pembiayaan.',
        'fin3_bal.required' => 'Sila masukkan baki pembiayaan.',    
    ];
}
