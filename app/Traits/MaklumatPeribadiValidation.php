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
    public $birthdate;
    public $age;
    public $religion;
    public $race;
    public $ethnic;
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

    public function rules()
    {
        $rules = [
            // ... existing rules ...
            'tekun_state' => 'required',
            'tekun_branch' => 'required',
            'business_status' => 'required',
            'business_method' => 'required',
            'bank1' => 'required',
            'bank1_acct' => 'required|numeric',
            'bank1_acct_type' => 'required',
            'bank1_register_bank_no' => 'required_if:bank1_acct_type,SEMASA',
            'bank2_register_bank_no' => 'required_if:bank2_acct_type,SEMASA',
            'name' => 'required|regex:/^[A-Za-z\s\'-.@]+$/',
            'ic_no' => 'required|digits:12',
            'birthdate' => 'required|date',
            'age' => 'required|numeric|min:0',
            'gender' => 'required',
            'religion' => 'required',
            'race' => 'required',
            'marital' => 'required',
            'dependent' => 'required|numeric|min:0',
            'oku' => 'required',
            'stop_worktime_flag' => 'required',
            'education' => 'required',
            'address1' => 'required',
            'postcode' => 'required',
            'city' => 'required',
            'state' => 'required',
            //'phone_home' => 'required|min:10',
            'phone_hp' => 'required|min:10|max:11',
            'email' => 'required|email',
            'status_home' => 'required',
            'profession' => 'required|in:BERNIAGA,KAKITANGAN KERAJAAN,KAKITANGAN SWASTA,TIDAK BEKERJA',
            'income' => 'required|numeric|min:1',
        ];

        // Add ic_old validation only if it should be shown
        if ($this->showIcOld) {
            $rules['ic_old'] = 'required';
        }

        // Add ethnic validation based on race
        if ($this->race === 'BUMIPUTERA SABAH') {
            $rules['ethnic'] = 'required|in:BAJAU,DUSUN,MURUT,SINO-NATIVE,SULUK,BINADAN,BISAYA,BONGOL,BRUNEI,DUMPAS,IRANUN,IDAHAN,KWIJAU,KEDAYAN,LINGKABAU,LUNDAYEH,LASAU,MELANAU,MANGKAAK,MATAGANG,MINOKOK,MELAYU SABAH,MOMOGUN,PAITAN,RUMANAU,RUNGUS,SUNGAI,SONSONGAN,SINULIHAN,TOMBONUO,TAGAL,TINAGAS,KADAZAN,KADAZAN-SINO';
        } elseif ($this->race === 'BUMIPUTERA SARAWAK') {
            $rules['ethnic'] = 'required|in:MELAYU SARAWAK,MELANAU,KEDAYAN,IBAN,BIDAYUH,KAYAN,KENYAH,MURUT,KELABIT,PUNAN,BISAYA,BERAWAN,BELOT,BHUKET ATAU UKIT,BALAU,BATANG AI,BATU ELAH,BAKETAN,BINTULU,BADENG,DUSUN,JAGOI,LAKIPUT,KAJANG,KEJAMAN,KANOWIT,LIRONG,LEMANAK,LAHANAN,LISUM,MATU,MEMALOH,MELIKIN,MELAING,NGORIK,MENONDO,JAMOK,SEBOP,SEDUAN,SEKAPAN,SEGALANG,SIHAN,SEPING,SARIBAS,SEBUYAU,SKRANG,SABAN,SELAKAN,SELAKO,TAGAL,TABUN,TUTONG,TANJONG,TATAU,TAUP,UKIT,UNKOP,ULU AI';
        } elseif ($this->race === 'LAIN-LAIN') {
            $rules['ethnic'] = 'required|in:EURASIAN';
        }

        // Add marital validation based on gender
        if ($this->gender === 'LELAKI') {
            $rules['marital'] = 'required|in:BUJANG,BERKAHWIN,DUDA';
        } elseif ($this->gender === 'PEREMPUAN') {
            $rules['marital'] = 'required|in:BUJANG,BERKAHWIN,IBU TUNGGAL';
        }

        // Add employer validation rules only for relevant professions
        if (in_array($this->profession, ['KAKITANGAN KERAJAAN', 'KAKITANGAN SWASTA'])) {
            $rules['employer_name'] = 'required|string';
            $rules['employer_address1'] = 'required|string';
            $rules['employer_postcode'] = 'required|digits:5';
            $rules['employer_city'] = 'required|string';
            $rules['tekun_state'] = 'required|in:JH,KD,KL,MK,NS,PH,PK,RC,PP,SB,SW,SE,TG,WP';
            $rules['employer_phone'] = 'required';
        }

        // Add spouse validation rules if married
        if ($this->marital === 'BERKAHWIN') {
            $rules['spouse_name'] = 'required';
            $rules['spouse_nationality'] = 'required|in:1,0';
            
            // Add IC validation only for Malaysian spouse
            if ($this->spouse_nationality === '1') {
                $rules['spouse_ic_no'] = 'required|digits:12';
            }
            
            // Add passport validation only for non-Malaysian spouse
            if ($this->spouse_nationality === '0') {
                $rules['spouse_passport_no'] = 'required';
            }
            
            $rules['spouse_phone'] = 'required|min:10|max:11';
            $rules['spouse_profession'] = 'required';
            $rules['spouse_income'] = 'required|numeric|min:0';
        }

        return $rules;
    }
    
    // Validation messages
    protected $messages = [
        'tekun_state.required' => 'Sila Pilih Negeri',
        'tekun_branch.required' => 'Sila Pilih Cawangan',
        'business_status.required' => 'Sila Pilih Status Perniagaan',
        'business_method.required' => 'Sila Pilih Kaedah Perniagaan',
        'bank1.required' => 'Sila Pilih Bank',
        'bank1_acct.required' => 'Sila masukkan nombor akaun bank',
        'bank1_acct.numeric' => 'Nombor akaun bank mestilah nombor sahaja',
        'bank1_acct.digits_between' => 'Nombor akaun bank mestilah antara 5 hingga 17 digit',
        'bank1_acct_type.required' => 'Sila pilih jenis akaun bank',
        'bank1_register_bank_no.required_if' => 'Sila masukkan nombor pendaftaran bank',
        'bank2_register_bank_no.required_if' => 'Sila masukkan nombor pendaftaran bank',
        'name.required' => 'Sila masukkan nama pemohon',
        'name.regex' => 'Nama pemohon mestilah mengandungi huruf dan simbol yang dibenarkan sahaja (\', -, ., @)',
        'ic_no.required' => 'Sila masukkan nombor kad pengenalan',
        'ic_no.digits' => 'Nombor kad pengenalan mestilah 12 digit',
        'birthdate.required' => 'Tarikh lahir diperlukan',
        'birthdate.date' => 'Tarikh lahir tidak sah',
        'age.required' => 'Umur diperlukan',
        'age.numeric' => 'Umur mestilah nombor',
        'age.min' => 'Umur tidak boleh kurang dari 0',
        'gender.required' => 'Jantina diperlukan',
        'gender.in' => 'Jantina tidak sah',
        'ic_old.required' => 'Sila masukkan nombor kad pengenalan lama',
        'race.required' => 'Sila pilih bangsa',
        'race.in' => 'Bangsa tidak sah',
        'religion.required' => 'Sila pilih agama',
        'religion.in' => 'Agama tidak sah',
        'ethnic.required' => 'Sila pilih kaum/etnik',
        'ethnic.in' => 'Kaum/etnik tidak sah',
        'marital.required' => 'Sila pilih status perkahwinan',
        'marital.in' => 'Status perkahwinan tidak sah',
        'dependent.required' => 'Sila masukkan bilangan tanggungan',
        'dependent.numeric' => 'Bilangan tanggungan mestilah nombor',
        'dependent.min' => 'Bilangan tanggungan tidak boleh kurang dari 0',
        'oku.required' => 'Sila pilih status oku',
        'stop_worktime_flag.required' => 'Sila pilih antara salah satu',
        'education.required' => 'Sila pilih pendidikan',
        'address1.required' => 'Sila masukkan alamat kediaman',
        'postcode.required' => 'Sila masukkan poskod',
        'city.required' => 'Sila masukkan bandar',
        'state.required' => 'Sila pilih negeri',
        //'phone_home.required' => 'Sila masukkan nombor telefon',
        //'phone_home.min' => 'Nombor telefon mestilah 10 digit',
        'phone_hp.required' => 'Sila masukkan nombor telefon',
        'phone_hp.min' => 'Nombor telefon mestilah antara 10 hingga 11 digit',
        'phone_hp.max' => 'Nombor telefon mestilah antara 10 hingga 11 digit',
        'email.required' => 'Sila masukkan emel',
        'email.email' => 'Emel tidak sah',
        'status_home.required' => 'Sila pilih status kediaman',
        'profession.required' => 'Sila pilih pekerjaan sekarang',
        'income.required' => 'Sila masukkan pendapatan bulanan',
        'income.numeric' => 'Pendapatan bulanan mestilah nombor',
        'income.min' => 'Pendapatan bulanan tidak boleh kurang dari 1',
        'employer_name.required' => 'Sila masukkan nama majikan',
        'employer_address1.required' => 'Sila masukkan alamat majikan',
        'employer_postcode.required' => 'Sila masukkan poskod',
        'employer_postcode.digits' => 'Poskod mestilah 5 digit',
        'employer_city.required' => 'Sila masukkan bandar',
        'tekun_state.required' => 'Sila pilih negeri',
        'tekun_state.in' => 'Negeri tidak sah',
        'employer_phone.required' => 'Sila masukkan no telefon majikan',
        'spouse_name.required' => 'Sila masukkan nama suami/isteri',
        'spouse_nationality.required' => 'Sila pilih kewarganegaraan',
        'spouse_nationality.in' => 'Kewarganegaraan tidak sah',
        'spouse_ic_no.required' => 'Sila masukkan nombor kad pengenalan suami/isteri',
        'spouse_ic_no.digits' => 'Nombor kad pengenalan suami/isteri mestilah 12 digit',
        'spouse_passport_no.required' => 'Sila masukkan nombor paspor suami/isteri',
        'spouse_profession.required' => 'Sila pilih pekerjaan suami/isteri',
        'spouse_phone.required' => 'Sila masukkan nombor telefon suami/isteri',
        'spouse_income.required' => 'Sila masukkan pendapatan suami/isteri',
        'spouse_income.numeric' => 'Pendapatan suami/isteri mestilah nombor',        
    ];

} 