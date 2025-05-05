<html>
<head>
    <meta charset="UTF-8">
    <title>Form View (No Background)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        label {
            display: inline-block;
            width: 200px;
            font-weight: bold;
            margin-top: 8px;
        }
        input[type="text"] {
            width: 300px;
            margin-bottom: 5px;
            padding: 2px 5px;
        }
        .checkbox-label {
            display: inline-block;
            width: auto;
            font-weight: bold;
            margin-left: 10px;
        }
        .checkbox {
            margin-right: 3px;
        }
        .section-title {
            font-size: 110%;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .divider {
            margin: 20px 0;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>

    <h2>TEKUN Financing Application - View Form</h2>

    <!-- A. Maklumat Asas -->
    <div class="section-title">A. Maklumat Asas</div>
    
    <label>Negeri:</label>
    <input type="text" value="{{ $data->state_code ?? ' ' }}"><br>

    <label>Cawangan:</label>
    <input type="text" value="{{ $data->branch_code ?? ' ' }}"><br>

    <label>Status Perniagaan:</label>
    <input type="text" value="{{ $data->business_status ?? ' ' }}"><br>

    <label>Nama Bank Operasi Perniagaan 1:</label>
    <input type="text" value="{{ $data->bank1 ?? ' ' }}"><br>

    <label>No Akaun Bank 1:</label>
    <input type="text" value="{{ $data->bank1_acct ?? ' ' }}"><br>

    <label>Jenis Akaun 1:</label>
    <input type="text" value="{{ $data->bank1_acct_type ?? ' ' }}"><br>

    <label>No Pendaftaran Bank/ No Id Akaun Bank/ Register Bank 1:</label>
    <input type="text" value="{{ $data->bank1_register_bank_no ?? ' ' }}"><br>

    <label>Nama Bank Operasi Perniagaan 2:</label>
    <input type="text" value="{{ $data->bank2 ?? ' ' }}"><br>

    <label>No Akaun Bank 2:</label>
    <input type="text" value="{{ $data->bank2_acct ?? ' ' }}"><br>

    <label>Jenis Akaun 2:</label>
    <input type="text" value="{{ $data->bank2_acct_type ?? ' ' }}"><br>

    <label>No Pendaftaran Bank/ No Id Akaun Bank/ Register Bank 2:</label>
    <input type="text" value="{{ $data->bank2_register_bank_no ?? ' ' }}"><br>


    <label>Kaedah Perniagaan:</label>
    <input type="text" value="{{ $data->business_method ?? ' ' }}"><br>

    <div class="divider"></div>

        <!-- B. Maklumat Peribadi Pemohon -->
    <div class="section-title">B. Maklumat Peribadi Pemohon</div>
    
    <!-- Example: Name, IC, etc. -->
    <label>Nama Pemohon:</label>
    <input type="text" value="{{ $data->name ?? ' ' }}"><br>

    <label>No. KP (Baru):</label>
    <input type="text" value="{{ $data->ic_no ?? ' ' }}"><br>

    <label>No. KP (Lama):</label>
    <input type="text" value="{{ $data->ic_old ?? ' ' }}"><br>

        <label>Jantina:</label>
    <input type="text" value="{{ $data->gender ?? ' ' }}"><br>

    <label>Tarikh Lahir:</label>
    <input type="text" value="{{ $data->birthdate ?? ' ' }}"><br>

    <label>Umur:</label>
    <input type="text" value="{{ $data->age ?? ' ' }}"><br>

        <label>Agama:</label>
    <input type="text" value="{{ $data->religion ?? ' ' }}"><br>

    <label>Bangsa:</label>
    <input type="text" value="{{ $data->race ?? ' ' }}"><br>

    <label>Taraf Perkahwinan:</label>
    <input type="text" value="{{ $data->marital ?? ' ' }}"><br>

        <label>Bilangan Tanggungan:</label>
    <input type="text" value="{{ $data->dependent ?? ' ' }}"><br>

    <label>Orang Kelainan Upaya:</label>
    <input type="text" value="{{ $data->oku ?? ' ' }}"><br>
    
    <label>Diberhentikan Kerja Semasa Pandemik:</label>
    <input type="text" value="{{ $data->stop_worktime_flag ?? ' ' }}"><br>

    <label>Asnaf Berdaftar Dibawah Majlis Agama Islam Negeri</label>
    <input type="text" value="{{ $data->asnaf_berdaftar_flag ?? ' ' }}"><br>

    <label>Taraf Pendidikan:</label>
    <input type="text" value="{{ $data->education ?? ' ' }}"><br>

    <label>Alamat Kediaman:</label>
    <input type="text" value="{{ $data->address1 ?? ' ' }}"><br>
    <input type="text" value="{{ $data->address2 ?? ' ' }}"><br>

    <label>Poskod:</label>
    <input type="text" value="{{ $data->postcode ?? ' ' }}"><br>

    <label>Bandar:</label>
    <input type="text" value="{{ $data->city ?? ' ' }}"><br>

    <label>Negeri:</label>
    <input type="text" value="{{ $data->state ?? ' ' }}"><br>

    <label>No Telefon (Rumah):</label>
    <input type="text" value="{{ $data->phone_home ?? ' ' }}"><br>

    <label>No Telefon (HP):</label>
    <input type="text" value="{{ $data->phone_hp ?? ' ' }}"><br>

    <label>Email:</label>
    <input type="text" value="{{ $data->email ?? ' ' }}"><br>

    <label>Facebook:</label>
    <input type="text" value="{{ $data->facebook ?? ' ' }}"><br>
    
    <label>Instagram:</label>
    <input type="text" value="{{ $data->instagram ?? ' ' }}"><br>
    
    <label>Status Kediaman:</label>
    <input type="text" value="{{ $data->status_home ?? ' ' }}"><br>

    <label>Pekerjaan Sekarang:</label>
    <input type="text" value="{{ $data->profession ?? ' ' }}"><br>

    <label>Pendapatan:</label>
    <input type="text" value="{{ $data->income ?? ' ' }}"><br>

    <label>Nama Majikan:</label>
    <input type="text" value="{{ $data->employer_name ?? ' ' }}"><br>

    <label>Alamat Majikan:</label>
    <input type="text" value="{{ $data->employer_address1 ?? ' ' }}"><br>
    <input type="text" value="{{ $data->employer_address2 ?? ' ' }}"><br>

    <label>Poskod Majikan:</label>
    <input type="text" value="{{ $data->employer_postcode ?? ' ' }}"><br>

    <label>Bandar Majikan:</label>
    <input type="text" value="{{ $data->employer_city ?? ' ' }}"><br>

    <label>Negeri Majikan:</label>
    <input type="text" value="{{ $data->employer_state ?? ' ' }}"><br>

    <label>No Tel Majikan:</label>
    <input type="text" value="{{ $data->employer_phone ?? ' ' }}"><br>

    <div class="divider"></div>

    <!-- C. Maklumat Pasangan -->
    <div class="section-title">C. Maklumat Pasangan</div>

    <label>Nama Pasangan:</label>
    <input type="text" value="{{ $data->spouse_name ?? ' ' }}"><br>

    <label>Warganegara Malaysia:</label>
    <input type="text" value="{{ $data->spouse_nationality ?? ' ' }}"><br>

    <label>No. Kad Pengenalan (Pasangan):</label>
    <input type="text" value="{{ $data->spouse_ic_no ?? ' ' }}"><br>

    <label>No. Passport Pengenalan (Pasangan):</label>
    <input type="text" value="{{ $data->spouse_passport_no ?? ' ' }}"><br>

    <label>Pekerjaan (Pasangan):</label>
    <input type="text" value="{{ $data->spouse_profession ?? ' ' }}"><br>

    <label>No Telefon (Pasangan):</label>
    <input type="text" value="{{ $data->spouse_phone ?? ' ' }}"><br>

    <label>Pendapatan (Pasangan):</label>
    <input type="text" value="{{ $data->spouse_income ?? ' ' }}"><br>

    <label>Alamat Majikan:</label>
    <input type="text" value="{{ $data->spouse_employer_address1 ?? ' ' }}"><br>
    <input type="text" value="{{ $data->spouse_employer_address2 ?? ' ' }}"><br>

    <label>Poskod Majikan:</label>
    <input type="text" value="{{ $data->spouse_employer_postcode ?? ' ' }}"><br>

    <label>Bandar Majikan:</label>
    <input type="text" value="{{ $data->spouse_employer_city ?? ' ' }}"><br>

    <label>Negeri Majikan:</label>
    <input type="text" value="{{ $data->spouse_employer_state ?? ' ' }}"><br>

    <label>No Tel Majikan:</label>
    <input type="text" value="{{ $data->spouse_employer_no ?? ' ' }}"><br>

    <div class="divider"></div>

    <!-- D. Maklumat Perniagaan -->
    <div class="section-title">D. Maklumat Perniagaan</div>

    <label>Perniagaan Patuh Syariah:</label>
    <input type="text" value="{{ $data->business_syariah ?? ' ' }}"><br>

    <label>Jenis Lesen:</label>
    <input type="text" value="{{ $data->license_type ?? ' ' }}"><br>

    <label>No Lesen:</label>
    <input type="text" value="{{ $data->business_no ?? ' ' }}"><br>

    <label>Pemilikan Perniagaan:</label>
    <input type="text" value="{{ $data->business_ownership ?? ' ' }}"><br>

    <label>Pemegang Saham:</label>
    <input type="text" value="{{ $data->shareholder ?? ' ' }}"><br>

    <label>Modal Berbayar:</label>
    <input type="text" value="{{ $data->business_modal ?? ' ' }}"><br>

    <label>Tarikh Didaftarkan:</label>
    <input type="text" value="{{ $data->register_date ?? ' ' }}"><br>

    <label>Tarikh Tamat Lesen:</label>
    <input type="text" value="{{ $data->license_expired_date ?? ' ' }}"><br>

    <label>Nama Perniagaan:</label>
    <input type="text" value="{{ $data->business_name ?? ' ' }}"><br>

    <label>Sektor Perniagaan:</label>
    <input type="text" value="{{ $data->business_sector ?? ' ' }}"><br>

    <label>Aktiviti Perniagaan:</label>
    <input type="text" value="{{ $data->business_activity ?? ' ' }}"><br>

    <label>Sub Aktiviti Perniagaan:</label>
    <input type="text" value="{{ $data->sub_business_activity ?? ' ' }}"><br>
    
    <label>Tempoh Pengalaman (Tahun):</label>
    <input type="text" value="{{ $data->business_duration_year ?? ' ' }}"><br>

    <label>Tempoh Pengalaman (Bulan):</label>
    <input type="text" value="{{ $data->business_duration_month ?? ' ' }}"><br>

    <label>Alamat Perniagaan:</label>
    <input type="text" value="{{ $data->business_address1 ?? ' ' }}"><br>
    <input type="text" value="{{ $data->business_address2 ?? ' ' }}"><br>

    <label>Poskod Perniagaan:</label>
    <input type="text" value="{{ $data->business_postcode ?? ' ' }}"><br>

    <label>Bandar Perniagaan:</label>
    <input type="text" value="{{ $data->business_city ?? ' ' }}"><br>
    
    <label>Negeri Perniagaan:</label>
    <input type="text" value="{{ $data->business_state ?? ' ' }}"><br>

    <label>Anggaran Pendapatan Kasar (Sebulan):</label>
    <input type="text" value="{{ $data->business_income ?? ' ' }}"><br>

    <label>No Telefon Premis Perniagaan:</label>
    <input type="text" value="{{ $data->business_phone ?? ' ' }}"><br>

    <label>No Telefon Bimbit Perniagaan:</label>
    <input type="text" value="{{ $data->business_phone_hp ?? ' ' }}"><br>

    <label>Status Premis/Projek:</label>
    <input type="text" value="{{ $data->business_premise ?? ' ' }}"><br>
    
    <label>Status Premis/Projek (Lain-lain):</label>
    <input type="text" value="{{ $data->business_other_premise ?? ' ' }}"><br>
    
    <label>Lokasi Premis:</label>
    <input type="text" value="{{ $data->premise_loc_code ?? ' ' }}"><br>
    
    <label>Lokasi Premis (Lain-lain):</label>
    <input type="text" value="{{ $data->buss_other_loc_premise ?? ' ' }}"><br>

    <label>Bilangan Pekerja:</label>
    <input type="text" value="{{ $data->total_employees ?? ' ' }}"><br>

    <label>Keahlian Persatuan:</label>
    <input type="text" value="{{ $data->membership_status ?? ' ' }}"><br>

    <label>Jenis Keahlian Persatuan:</label>
    <input type="text" value="{{ $data->membership_assoc ?? ' ' }}"><br>

    <label>Masa Berniaga Dari:</label>
    <input type="text" value="{{ $data->business_open ?? ' ' }}"><br>

    <label>Masa Berniaga Hingga:</label>
    <input type="text" value="{{ $data->business_closed ?? ' ' }}"><br>

    <label>Pengiktirafan Sijil:</label>
    <input type="text" value="{{ $data->cert_recognition_flag ?? ' ' }}"><br>

    <label>Nilai Aset Perniagaan Sedia Ada:</label>
    <input type="text" value="{{ $data->business_asset_value ?? ' ' }}"><br>

    <label>Modal Untuk Memulakan Perniagaan:</label>
    <input type="text" value="{{ $data->business_start_resources ?? ' ' }}"><br>

    <label>Nama Kursus:</label>
    <input type="text" value="{{ $data->course_name_attend ?? ' ' }}"><br>

    <label>Nama Agensi:</label>
    <input type="text" value="{{ $data->agency_name ?? ' ' }}"><br>

    <label>Kursus-Kursus Lain Yang Dihadiri (Jika Ada):</label>
    <input type="text" value="{{ $data->course_name_attend2 ?? ' ' }}"><br>
    <input type="text" value="{{ $data->course_name_attend3 ?? ' ' }}"><br>

    <label>Sila Nyatakan Perniagaan Terdahulu Sekiranya Bertukar Aktiviti Perniagaan:</label>
    <input type="text" value="{{ $data->previous_business ?? ' ' }}"><br>

    <div class="divider"></div>

    <!-- E. Maklumat Pemilik Syarikat / Rakan Kongsi -->
    <div class="section-title">E. Maklumat Pemilik Syarikat / Rakan Kongsi</div>

    <label>Bilangan Rakan Kongsi:</label>
    <input type="text" value="{{ $data->tot_partner ?? ' ' }}"><br>

    <label>Nama Rakan Kongsi 1:</label>
    <input type="text" value="{{ $data->partner_name ?? ' ' }}"><br>

    <label>No Kad Pengenalan Rakan Kongsi 1:</label>
    <input type="text" value="{{ $data->partner_ic ?? ' ' }}"><br>

    <label>Alamat Rakan Kongsi 1:</label>
    <input type="text" value="{{ $data->partner_address1 ?? ' ' }}"><br>
    <input type="text" value="{{ $data->partner_address2 ?? ' ' }}"><br>
    
    <label>Poskod Rakan Kongsi 1:</label>
    <input type="text" value="{{ $data->partner_postcode ?? ' ' }}"><br>

    <label>Bandar Rakan Kongsi 1:</label>
    <input type="text" value="{{ $data->partner_city ?? ' ' }}"><br>
    
    <label>Negeri Rakan Kongsi 1:</label>
    <input type="text" value="{{ $data->partner_state ?? ' ' }}"><br>

    <label>No Telefon Rumah Rakan Kongsi 1:</label>
    <input type="text" value="{{ $data->partner_phone ?? ' ' }}"><br>

    <label>No Telefon Bimbit Rakan Kongsi 1:</label>
    <input type="text" value="{{ $data->partner_phone_hp ?? ' ' }}"><br>
    
    <label>Jumlah Saham Rakan Kongsi 1:</label>
    <input type="text" value="{{ $data->partner_total_shares ?? ' ' }}"><br>

    <label>Jawatan Rakan Kongsi 1:</label>
    <input type="text" value="{{ $data->partner_roles ?? ' ' }}"><br>

    <!-- Example: More fields from your data as needed -->
    <label>Jumlah Pembiayaan Diperlukan:</label>
    <input type="text" value="{{ $data->purchase_price ?? ' ' }}"><br>

    <label>Tempoh Bayaran:</label>
    <input type="text" value="{{ $data->pymt_duration ?? ' ' }}"><br>

    <!-- ... add as many fields/labels as you want from $this->pdfData[0] ... -->

</body>
</html>
