<div>
    <div class="">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Maklumat Perniagaan</h3>
                    
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-2">
                                <label for="business_syariah" class="block text-sm font-medium leading-5 text-gray-700">Perniagaan Patuh Syariah<span class="text-red-700">*</span></label>
                                <select id="business_syariah" name="business_syariah" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_syariah">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-6">
                                    <label for="business_name" class="block text-sm font-medium leading-5 text-gray-700">Nama Perniagaan / Syarikat<span class="text-red-700">*</span></label>
                                    <input id="business_name" name="business_name" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="business_name">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="license_type" class="block text-sm font-medium leading-5 text-gray-700">Lesen<span class="text-red-700">*</span></label>
                                <select id="license_type" name="license_type" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="license_type">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                    <label for="business no" class="block text-sm font-medium leading-5 text-gray-700">No. SSM / Lesen / Ordinan<span class="text-red-700">*</span></label>
                                    <input id="business_no" name="business_no" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="business_no">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="business_sector" class="block text-sm font-medium leading-5 text-gray-700">Sektor Perniagaan <span class="text-red-700">*</span></label>
                                <select id="business_sector" name="business_sector" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_sector">
                                    <option value="">SILA PILIH</option>
                                    @foreach ($sektorSelection as $sektors)
                                    <option value="{{ $sektors->idPerniagaan }}">{{ $sektors->jenisPerniagaan}}</option>
                                    @endforeach 
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="business_activity" class="block text-sm font-medium leading-5 text-gray-700">Aktiviti Perniagaan<span class="text-red-700">*</span></label>
                                <select id="business_activity" name="business_activity" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_activity">
                                    <option value="">SILA PILIH</option>
                                    @foreach ($aktivitiSelection as $aktivitis)
                                    <option value="{{ $aktivitis->idAktiviti }}">{{ $aktivitis->Aktiviti}}</option>
                                    @endforeach 
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="sub_business_activity" class="block text-sm font-medium leading-5 text-gray-700">Sub Aktiviti Perniagaan
                                    <span class="text-red-700">*</span></label>
                                <select id="sub_business_activity" name="sub_business_activity" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="sub_business_activity">
                                    <option value="">SILA PILIH</option>
                                    <option value="Kraf-Tekstil">Kraf-Tekstil</option>
                                    <option value="Kraf-Hasil Rimba">Kraf-Hasil Rimba</option>
                                    <option value="Kraf-Hasil Logam<">Kraf-Hasil Logam</option>
                                    <option value="Kraf-Hasil Tanah<">Kraf-Hasil Tanah</option>
                                    <option value="Kraf-Aneka Kraf">Kraf-Aneka Kraf</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="business_duration" class="block text-sm font-medium leading-5 text-gray-700">Tempoh / Pengalaman Berniaga(Bulan)<span class="text-red-700">*</span></label>
                                <input id="business_duration" name="business_duration" type="number" min="0" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_duration">
                            </div>

                            <div class="col-span-6">
                                <label for="business_address1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Perniagaan / Premis / Projek<span class="text-red-700">*</span></label>
                                <input id="business_address1" name="business_address1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_address1">                               
                                <input id="business_address2" name="business_address2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_address2">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="business_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod <span class="text-red-700">*</span></label>
                                <input id="business_postcode" name="business_postcode" minlength="5" maxlength="5" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_postcode">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="business_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar<span class="text-red-700">*</span></label>
                                <input id="business_city" name="business_city" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_city">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="business_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri <span class="text-red-700">*</span></label>
                                <select id="business_state" name="business_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_state">
                                    <option value="">SILA PILIH</option>
                                    @foreach ($negeriSelection as $negeris)
                                    <option value="{{ $negeris->kodnegeri }}">{{ $negeris->namanegeri}}</option>
                                    @endforeach 
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="business_income" class="block text-sm font-medium leading-5 text-gray-700">Anggaran Pendapatan Kasar (Sebulan)<span class="text-red-700">*</span></label>
                                <select id="business_income" name="business_income" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"  wire:model.live="business_income">
                                    <option value="">SILA PILIH</option>
                                    <option value="< RM5,000">< RM5,000</option>
                                    <option value="RM5,000 - RM10,000">RM5,000 - RM10,000</option>
                                    <option value="> RM10,000 - RM50,000">> RM10,000 - RM50,000</option>
                                    <option value="> RM50,000">> RM50,000</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                <label for="business_phone" class="block text-sm font-medium leading-5 text-gray-700">No Tel Premis Perniagaan<span class="text-red-700">*</span></label>
                                <input id="business_phone" name="business_phone" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_phone">
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                <label for="business_phone_hp" class="block text-sm font-medium leading-5 text-gray-700">No Tel Bimbit Perniagaan<span class="text-red-700">*</span></label>
                                <input id="business_phone_hp" name="business_phone_hp" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_phone_hp">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="business_premise" class="block text-sm font-medium leading-5 text-gray-700">Status Premis / Projek<span class="text-red-700">*</span></label>
                                <select id="business_premise" name="business_premise" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="business_premise">
                                    <option value="">SILA PILIH</option>
                                    <option value="SENDIRI">SENDIRI</option>
                                    <option value="SEWA">SEWA</option>
                                    <option value="KELUARGA">KELUARGA</option>
                                    <option value="LAIN-LAIN (SILA NYATAKAN)">LAIN-LAIN (SILA NYATAKAN)</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                <label for="business_other_premise" class="block text-sm font-medium leading-5 text-gray-700">Status Premis / Projek (Lain-lain)<span class="text-red-700">*</span></label>
                                <input id="business_other_premise" name="business_other_premise" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_other_premise">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="business_ownership" class="block text-sm font-medium leading-5 text-gray-700">Pemilikan Perniagaan<span class="text-red-700">*</span></label>
                                <select id="business_ownership" name="business_ownership" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="business_ownership">
                                    <option value="">SILA PILIH</option>
                                    <option value="2">INDIVIDU</option>
                                    <option value="3">PEMILIKAN TUNGGAL</option>
                                    <option value="4">PERKONGSIAN</option>
                                    <option value="5">SENDIRIAN BERHAD</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                <label for="business_modal" class="block text-sm font-medium leading-5 text-gray-700">Modal Berbayar (Sendirian Berhad)<span class="text-red-700">*</span></label>
                                <input id="business_modal" name="business_modal" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_modal">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="premise_loc_code" class="block text-sm font-medium leading-5 text-gray-700">Lokasi Premis<span class="text-red-700">*</span></label>
                                <select id="premise_loc_code" name="premise_loc_code" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="premise_loc_code">
                                    <option value="">SILA PILIH</option>
                                    <option value="Bengkel - Besi">Bengkel - Besi</option>
                                    <option value="Bengkel - Kayu">Bengkel - Kayu</option>
                                    <option value="Bengkel - Mekanik">Bengkel - Mekanik</option>
                                    <option value="Bergerak - Kereta Motor">Bergerak - Kereta Motor</option>
                                    <option value="Bergerak - Kereta Sorong">Bergerak - Kereta Sorong</option>
                                    <option value="Bergerak - Motosikal">Bergerak - Motosikal</option>
                                    <option value="Di Rumah">Di Rumah</option>
                                    <option value="Gerai - Tetap">Gerai - Tetap</option>
                                    <option value="Ladang">Ladang</option>
                                    <option value="Lot Kedai - Sewa">Lot Kedai - Sewa</option>
                                    <option value="Lot Kedai - Tetap">Lot Kedai - Tetap</option>
                                    <option value="Pasar Malam">Pasar Malam</option>
                                    <option value="Pasar Minggu">Pasar Minggu</option>
                                    <option value="Pasar Tani">Pasar Tani</option>
                                    <option value="Pasar Tetap">Pasar Tetap</option>
                                    <option value="Pesisir Pantai">Pesisir Pantai</option>
                                    <option value="Lain-Lain (Nyatakan)">Lain-Lain (Nyatakan)</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="total_employees" class="block text-sm font-medium leading-5 text-gray-700">Bil Pekerja<span class="text-red-700">*</span></label>
                                <select id="total_employees" name="total_employees" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="total_employees">
                                    <option value="">SILA PILIH</option>
                                    <option value="1 - 3 ORANG">1 - 3 ORANG</option>
                                    <option value="4 - 6 ORANG">4 - 6 ORANG</option>
                                    <option value="7 - 10 ORANG">7 - 10 ORANG</option>
                                    <option value="> 10 ORANG">> 10 ORANG</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                <!-- <label for="register_date" class="block text-sm font-medium leading-5 text-gray-700">Tarikh Didaftarkan<span class="text-red-700">*</span></label>
                                <input id="register_date" name="register_date" type="date" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="register_date"> -->
                                <x-datetime-picker label="Tarikh Didaftarkan" id="register_date"
                                    placeholder="Appointment Date" without-time wire:model="register_date"/>
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                <!-- <label for="license_expired_date" class="block text-sm font-medium leading-5 text-gray-700">Tarikh Tamat Lesen<span class="text-red-700">*</span></label>
                                <input id="license_expired_date" name="license_expired_date" type="date" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="license_expired_date"> -->
                                <x-datetime-picker label="Tarikh Tamat Lesen" id="license_expired_date"
                                    placeholder="Appointment Date" without-time wire:model="license_expired_date"/>
                            
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="shareholder" class="block text-sm font-medium leading-5 text-gray-700">Adakah Pemohon Pemegang Saham (Share Holder)<span class="text-red-700">*</span></label>
                                <select id="shareholder" name="shareholder" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"  wire:model.live="shareholder">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="membership_status" class="block text-sm font-medium leading-5 text-gray-700">Keahlian Persatuan<span class="text-red-700">*</span></label>
                                <select id="membership_status" name="membership_status" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="membership_status">
                                    <option value="">SILA PILIH</option>
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="membership_assoc" class="block text-sm font-medium leading-5 text-gray-700">Jenis Keahlian Persatuan<span class="text-red-700">*</span></label>
                                <select id="membership_assoc" name="membership_assoc" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="membership_assoc">
                                    <option value="">SILA PILIH</option>
                                    <option value="DEWAN PERNIAGAAN">DEWAN PERNIAGAAN</option>
                                    <option value="PERSATUAN PENJAJA / PENIAGA">PERSATUAN PENJAJA / PENIAGA</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <x-time-picker
                                    id="business_open"
                                    label="Masa Berniaga Dari"
                                    placeholder="12:00 AM"
                                    without-seconds
                                    wire:model="business_open"
                                />
                             </div>

                             <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                <x-time-picker
                                    id="business_closed"
                                    label="Masa Berniaga Hingga"
                                    placeholder="12:00 AM"
                                    without-seconds
                                    wire:model="business_closed"
                                />
                             </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="cert_recognition_flag" class="block text-sm font-medium leading-5 text-gray-700">Pengiktirafan Sijil<span class="text-red-700">*</span></label>
                                <select id="cert_recognition_flag" name="cert_recognition_flag" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="cert_recognition_flag">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
                            </div>

                            <div class="col-span-1">
                                <x-checkbox id="cert_recognition_myipo_flag" left-label="Pengiktirafan Sijil MYIPO" wire:model="cert_recognition_myipo_flag" value="1" />
                            </div>

                            <div class="col-span-1">
                                <x-checkbox id="cert_recognition_gmp_flag" left-label="Pengiktirafan Sijil GMP" wire:model="cert_recognition_gmp_flag" value="1" />
                            </div>

                            <div class="col-span-1">
                                <x-checkbox id="cert_recognition_mesti_flag" left-label="Pengiktirafan Sijil MESTI" wire:model="cert_recognition_mesti_flag" value="1" />
                            </div>

                            <div class="col-span-1">
                                <x-checkbox id="cert_recognition_haccp_flag" left-label="Pengiktirafan Sijil HACCP" wire:model="cert_recognition_haccp_flag" value="1" />
                            </div>

                            <div class="col-span-1">
                                <x-checkbox id="cert_recognition_halal_flag" left-label="Pengiktirafan Sijil HALAL" wire:model="cert_recognition_halal_flag" value="1" />
                            </div>

                            <div class="col-span-1">
                                <x-checkbox id="cert_recognition_iso_flag" left-label="Pengiktirafan Sijil ISO" wire:model="cert_recognition_iso_flag" value="1" />
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="business_asset_value" class="block text-sm font-medium leading-5 text-gray-700">Nilai Aset Perniagaan Sedia Ada<span class="text-red-700">*</span></label>
                                <input id="business_asset_value" name="business_asset_value" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_asset_value">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="business_start_resources" class="block text-sm font-medium leading-5 text-gray-700">Sumber Modal Memulakan Perniagaan<span class="text-red-700">*</span></label>
                                <input id="business_start_resources" name="business_start_resources" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_start_resources">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="course_name_attend" class="block text-sm font-medium leading-5 text-gray-700">Nama Kursus Yang Dihadiri Anjuran Agensi Di Bawah Kementerian Pembangunan Usahawan & Koperasi<span class="text-red-700">*</span></label>
                                <input id="course_name_attend" name="course_name_attend" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="course_name_attend">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="agency_name" class="block text-sm font-medium leading-5 text-gray-700">Nama Agensi Penganjur<span class="text-red-700">*</span></label>
                                <select id="agency_name" name="agency_name" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="agency_name">
                                    <option value="">SILA PILIH</option>
                                    <option value="INSKEN">INSKEN</option>
                                    <option value="SME CORP">SME CORP</option>
                                    <option value="CEDAR">CEDAR</option>
                                    <option value="LAIN-LAIN">LAIN-LAIN</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="course_name_attend2" class="block text-sm font-medium leading-5 text-gray-700">Kursus-Kursus Lain Yang Dihadiri (Jika Ada)<span class="text-red-700">*</span></label>
                                <input id="course_name_attend2" name="course_name_attend2" value="" placeholder="Kursus-Kursus Lain Yang Dihadiri 2" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="course_name_attend2">
                                <input id="course_name_attend3" name="course_name_attend3" value="" placeholder="Kursus-Kursus Lain Yang Dihadiri 3" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="course_name_attend3">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="previous_business" class="block text-sm font-medium leading-5 text-gray-700">Sila Nyatakan Perniagaan Terdahulu Sekiranya Bertukar Aktiviti Perniagaan<span class="text-red-700">*</span></label>
                                <input id="previous_business" name="previous_business" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="previous_business">
                            </div>

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hidden sm:block">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Maklumat Pemilik Syarikat / Rakan Kongsi </h3>
                    
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-6">
                                <label for="partner_name" class="block text-sm font-medium leading-5 text-gray-700">Nama<span class="text-red-700">*</span></label>
                                <input id="partner_name" name="partner_name" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="partner_name">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="partner_ic" class="block text-sm font-medium leading-5 text-gray-700">No. Kad Pengenalan<span class="text-red-700">*</span></label>
                                <input id="partner_ic" name="partner_ic" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="partner_ic">
                            </div>

                            <div class="col-span-6">
                                <label for="partner_address1" class="block text-sm font-medium leading-5 text-gray-700">Alamat<span class="text-red-700">*</span></label>
                                <input id="partner_address1" name="partner_address1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="partner_address1">                               
                                <input id="partner_address2" name="partner_address2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="partner_address2">
                            </div>

                            <div class="col-span-6 sm:col-span-2 lg:col-span-2">
                                <label for="partner_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod <span class="text-red-700">*</span></label>
                                <input id="partner_postcode" name="partner_postcode" minlength="5" maxlength="5" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="partner_postcode">
                            </div>

                            <div class="col-span-6 sm:col-span-2 lg:col-span-2">
                                <label for="partner_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar<span class="text-red-700">*</span></label>
                                <input id="partner_city" name="partner_city" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="partner_city">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="partner_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri <span class="text-red-700">*</span></label>
                                <select id="partner_state" name="partner_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="partner_state">
                                    <option value="">SILA PILIH</option>
                                    @foreach ($negeriSelection as $negeris)
                                    <option value="{{ $negeris->kodnegeri }}">{{ $negeris->namanegeri}}</option>
                                    @endforeach 
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="partner_phone" class="block text-sm font-medium leading-5 text-gray-700">No Tel Rumah<span class="text-red-700">*</span></label>
                                <input id="partner_phone" name="partner_phone" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="partner_phone">
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="partner_phone_hp" class="block text-sm font-medium leading-5 text-gray-700">No Tel Bimbit<span class="text-red-700">*</span></label>
                                <input id="partner_phone_hp" name="partner_phone_hp" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="partner_phone_hp">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="partner_total_shares" class="block text-sm font-medium leading-5 text-gray-700">Jumlah Saham<span class="text-red-700">*</span></label>
                                <input id="partner_total_shares" name="partner_total_shares" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="partner_total_shares">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="partner_roles" class="block text-sm font-medium leading-5 text-gray-700">Jawatan<span class="text-red-700">*</span></label>
                                <select id="partner_roles" name="partner_roles" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="partner_roles">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">RAKAN KONGSI</option>
                                    <option value="2">PENGARAH</option>
                                    <option value="3">RAKAN KONGSI & PENGARAH</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center mt-6">
        <span class="inline-flex rounded-md shadow-sm">
            <button wire:click="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white bg-green-600 rounded-md border border-transparent transition duration-150 ease-in-out hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                Simpan
            </button>
        </span>
    </div>
</div>
