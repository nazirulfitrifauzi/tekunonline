<div>
    <div class="">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Maklumat Asas</h3>
                    
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="tekun_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri <span class="text-red-700">*</span></label>
                                <select id="tekun_state" name="tekun_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="tekun_state">
                                    <option value="">SILA PILIH</option>
                                    @foreach ($negeriSelection as $negeris)
                                    <option value="{{ $negeris->kodnegeri }}">{{ $negeris->namanegeri}}</option>
                                    @endforeach 
                                </select>
                                @error('tekun_state')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>


                            <div class="col-span-6 sm:col-span-3">
                                <label for="tekun_branch" class="block text-sm font-medium leading-5 text-gray-700">Cawangan Berhampiran
                                    dengan Lokasi Perniagaan <span class="text-red-700">*</span></label>
                                    <select id="tekun_branch" name="tekun_branch" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="tekun_branch">
                                    <option value="">SILA PILIH</option>
                                    @foreach ($cawanganSelection as $cawangans)
                                    <option value="{{ $cawangans->kodcawangan }}">{{ $cawangans->namacawangan}}</option>
                                    @endforeach 
                                </select>
                                @error('tekun_branch')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror

                            </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="business_status" class="block text-sm font-medium leading-5 text-gray-700">Status Perniagaan
                                    <span class="text-red-700">*</span></label>
                                <select id="business_status" name="business_status" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_status">
                                    <option value="">SILA PILIH</option>
                                    <option value="SEDANG BERNIAGA">SEDANG BERNIAGA</option>
                                    <option value="MEMULAKAN PERNIAGAAN">MEMULAKAN PERNIAGAAN</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="business_method" class="block text-sm font-medium leading-5 text-gray-700">Kaedah Perniagaan
                                    <span class="text-red-700">*</span></label>
                                <select id="business_method" name="business_method" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_method">
                                    <option value="">SILA PILIH</option>
                                    <option value="0">OFFLINE</option>
                                    <option value="1">ONLINE</option>
                                    <option value="2">ONLINE & OFFLINE</option>
                                </select>
                            </div>
                        </div>     

                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="bank1" class="block text-sm font-medium leading-5 text-gray-700">Nama Bank Operasi Perniagaan 1<span class="text-red-700">*</span></label>
                                    <select id="bank1" name="bank1" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="bank1">
                                        <option value="">SILA PILIH</option>
                                        @foreach ($bank as $bankas)
                                        <option value="{{ $bankas->id }}">{{ $bankas->nama_bank }}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="bank1_acct" class="block text-sm font-medium leading-5 text-gray-700">No Akaun Bank 1<span class="text-red-700">*</span></label>
                                <input id="bank1_acct" name="bank1_acct" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="bank1_acct">
                            </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="bank1_acct_type" class="block text-sm font-medium leading-5 text-gray-700">Jenis Akaun
                                    <span class="text-red-700">*</span></label>
                                <select id="bank1_acct_type" name="bank1_acct_type" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="bank1_acct_type">
                                    <option value="">SILA PILIH</option>
                                    <option value="SIMPANAN">SIMPANAN</option>
                                    <option value="SEMASA">SEMASA</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="bank1_register_bank_no" class="block text-sm font-medium leading-5 text-gray-700">No Pendaftaran Bank / No Id Akaun Bank / Register Bank<span class="text-red-700">*</span></label>
                                <input id="bank1_register_bank_no" name="bank1_register_bank_no" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="bank1_register_bank_no">
                            </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="bank2" class="block text-sm font-medium leading-5 text-gray-700">Nama Bank Operasi Perniagaan 2<span class="text-red-700">*</span></label>
                                    <select id="bank2" name="bank2" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="bank2">
                                        <option value="">SILA PILIH</option>
                                        @foreach ($bank as $bankas)
                                        <option value="{{ $bankas->id }}">{{ $bankas->nama_bank }}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="bank2_acct" class="block text-sm font-medium leading-5 text-gray-700">No Akaun Bank 2<span class="text-red-700">*</span></label>
                                <input id="bank2_acct" name="bank2_acct" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="bank2_acct">
                            </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="bank2_acct_type" class="block text-sm font-medium leading-5 text-gray-700">Jenis Akaun
                                    <span class="text-red-700">*</span></label>
                                <select id="bank2_acct_type" name="bank2_acct_type" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="bank2_acct_type">
                                    <option value="">SILA PILIH</option>
                                    <option value="SIMPANAN">SIMPANAN</option>
                                    <option value="SEMASA">SEMASA</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="bank2_register_bank_no" class="block text-sm font-medium leading-5 text-gray-700">No Pendaftaran Bank / No Id Akaun Bank / Register Bank<span class="text-red-700">*</span></label>
                                <input id="bank2_register_bank_no" name="bank2_register_bank_no" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="bank2_register_bank_no">
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
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Maklumat Peribadi Pemohon</h3>
                    
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-6">
                                <label for="name" class="block text-sm font-medium leading-5 text-gray-700">Nama
                                    Pemohon <span class="text-red-700">*</span></label>
                                <input id="name" name="name" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="name">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="ic_no" class="block text-sm font-medium leading-5 text-gray-700">No. KP
                                    (Baru) <span class="text-red-700">*</span></label>
                                <input id="ic_no" name="ic_no" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="ic_no">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="ic_old" class="block text-sm font-medium leading-5 text-gray-700">No. KP
                                    (Lama)<span class="text-red-700">*</span></label>
                                <input id="ic_old" name="ic_old" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="ic_old">
                            </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="gender" class="block text-sm font-medium leading-5 text-gray-700">Jantina <span class="text-red-700">*</span></label>
                                <select id="gender" name="gender" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="gender">
                                    <option value="">SILA PILIH JANTINA</option>
                                    <option value="LELAKI">LELAKI</option>
                                    <option value="PEREMPUAN">PEREMPUAN</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="religion" class="block text-sm font-medium leading-5 text-gray-700">Agama <span class="text-red-700">*</span></label>
                                <select id="religion" name="religion" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="religion">
                                    <option value="">SILA PILIH AGAMA</option>
                                    <option value="ISLAM">ISLAM</option>
                                    <option value="BUKAN ISLAM">BUKAN ISLAM</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-2">
                                <label for="birthdate" class="block text-sm font-medium leading-5 text-gray-700">Tarikh Lahir <span class="text-red-700">*</span></label>
                                <input id="birthdate" name="birthdate" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="birthdate">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="race" class="block text-sm font-medium leading-5 text-gray-700">Bangsa <span class="text-red-700">*</span></label>
                                <select id="race" name="race" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="race">
                                    <option value="">SILA PILIH BANGSA</option>
                                    <option value="MELAYU">MELAYU</option>
                                    <option value="INDIA">INDIA</option>
                                    <option value="CINA">CINA</option>
                                    <option value="SIAM">SIAM</option>
                                    <option value="ORANG ASLI">ORANG ASLI</option>
                                    <option value="SEMENANJUNG">SEMENANJUNG</option>
                                    <option value="BUMIPUTERA SABAH">BUMIPUTERA SABAH</option>
                                    <option value="BUMIPUTERA">BUMIPUTERA</option>
                                    <option value="SARAWAK">SARAWAK</option>
                                    <option value="LAIN-LAIN">LAIN-LAIN</option>
                                </select>
                            </div>
                            
                            <div class="col-span-6 sm:col-span-2">
                                <label for="ethnic" class="block text-sm font-medium leading-5 text-gray-700">Bangsa <span class="text-red-700">*</span></label>
                                <select id="ethnic" name="ethnic" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="ethnic">
                                <option value="">SILA PILIH KAUM/ETNIK</option>
                                    <option value="BAJAU">BAJAU</option>
                                    <option value="MELAYU SARAWAK">MELAYU SARAWAK</option>
                                    <option value="EURASIAN">EURASIAN</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="age" class="block text-sm font-medium leading-5 text-gray-700">Umur<span class="text-red-700">*</span></label>
                                <input id="age" name="age" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="age">
                            </div> 

                            <div class="col-span-6 sm:col-span-2">
                                <label for="marital" class="block text-sm font-medium leading-5 text-gray-700">Taraf Perkahwinan <span class="text-red-700">*</span></label>
                                <select id="marital" name="marital" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"  wire:model.live="marital">
                                    <option value="">SILA PILIH TARAF PERKAHWINAN</option>
                                    <option value="1">BUJANG</option>
                                    <option value="2">BERKAHWIN</option>
                                    <option value="3">DUDA</option>
                                    <option value="4">IBU TUNGGAL</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="dependent" class="block text-sm font-medium leading-5 text-gray-700">Bilangan Tanggungan<span class="text-red-700">*</span></label>
                                <input id="dependent" name="dependent" type="number" min="0" value="3" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"    wire:model.live="dependent">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="oku" class="block text-sm font-medium leading-5 text-gray-700">Orang Kelainan Upaya<span class="text-red-700">*</span></label>
                                <select id="oku" name="oku" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="oku">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
                            </div>


                            <div class="col-span-6 sm:col-span-2">
                                <label for="stop_worktime_flag" class="block text-sm font-medium leading-5 text-gray-700">DIBERHENTIKAN KERJA SEMASA PANDEMIK<span class="text-red-700">*</span></label>
                                <select id="stop_worktime_flag" name="stop_worktime_flag" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="stop_worktime_flag">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="asnaf_berdaftar_flag" class="block text-sm font-medium leading-5 text-gray-700">Asnaf Berdaftar Dibawah Majlis Agama Islam Negeri/Lembaga Zakat Negeri/Pusat Zakat Negeri<span class="text-red-700">*</span></label>
                                <select id="asnaf_berdaftar_flag" name="asnaf_berdaftar_flag" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="asnaf_berdaftar_flag">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="education" class="block text-sm font-medium leading-5 text-gray-700">Taraf Pendidikan<span class="text-red-700">*</span></label>
                                <select id="education" name="education" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"  wire:model.live="education">
                                    <option value="">Sila Pilih Taraf Pendidikan</option>
                                    <option value="0">PMR/Setaraf</option>
                                    <option value="1">SPM/Setaraf</option>
                                    <option value="2">STPM/Setaraf/Sijil</option>
                                    <option value="3" selected="">Diploma/STPM</option>
                                    <option value="4">Ijazah</option>
                                </select>
                            </div>


                            <div class="col-span-6">
                                <label for="address1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Kediaman <span class="text-red-700">*</span></label>
                                <input id="address1" name="address1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="address1">                               
                                <input id="address2" name="address2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="address2">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod <span class="text-red-700">*</span></label>
                                <input id="postcode" name="postcode" minlength="5" maxlength="5" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="postcode">
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="city" class="block text-sm font-medium leading-5 text-gray-700">Bandar<span class="text-red-700">*</span></label>
                                <input id="city" name="city" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="city">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="state" class="block text-sm font-medium leading-5 text-gray-700">Negeri<span class="text-red-700">*</span></label>
                                <select id="state" name="state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="state">
                                    <option value="">SILA PILIH</option>
                                    <option value="JH">JOHOR</option>
                                    <option value="KD">KEDAH</option>
                                    <option value="KL">KELANTAN</option>
                                    <option value="MK">MELAKA</option>
                                    <option value="NS">NEGERI SEMBILAN</option>
                                    <option value="PH">PAHANG</option>
                                    <option value="PK">PERAK</option>
                                    <option value="RC">PERLIS</option>
                                    <option value="PP">PULAU PINANG</option>
                                    <option value="SB">SABAH</option>
                                    <option value="SW">SARAWAK</option>
                                    <option value="SE">SELANGOR</option>
                                    <option value="TG">TERENGGANU</option>
                                    <option value="WP">WP KUALA LUMPUR</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="phone_home" class="block text-sm font-medium leading-5 text-gray-700">No
                                    Telefon (Rumah)</label>
                                <input id="phone_home" name="phone_home" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="phone_home">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="phone_hp" class="block text-sm font-medium leading-5 text-gray-700">No
                                    Telefon (HP) - cth (0123456789) <span class="text-red-700">*</span></label>
                                <input id="phone_hp" name="phone_hp" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="phone_hp">
                            </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-2">
                                <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Emel
                                    <span class="text-red-700">*</span></label>
                                <input id="email" name="email" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="email">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="facebook" class="block text-sm font-medium leading-5 text-gray-700">Facebook</label>
                                <input id="facebook" name="facebook" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="facebook">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="instagram" class="block text-sm font-medium leading-5 text-gray-700">Instagram</label>
                                <input id="instagram" name="instagram" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="instagram">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="status_home" class="block text-sm font-medium leading-5 text-gray-700">Status Kediaman<span class="text-red-700">*</span></label>
                                <select id="status_home" name="status_home" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"  wire:model.live="status_home">
                                    <option value="">SILA PILIH STATUS KEDIAMAN</option>
                                    <option value="SENDIRI">SENDIRI</option>
                                    <option value="SEWA">SEWA</option>
                                    <option value="KELUARGA">KELUARGA</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="profession" class="block text-sm font-medium leading-5 text-gray-700">Perkerjaan Sekarang
                                    <span class="text-red-700">*</span></label>
                                <input id="profession" name="profession" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="profession">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="income" class="block text-sm font-medium leading-5 text-gray-700">Pendapatan Bulanan
                                    <span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            RM
                                        </span>
                                    </div>
                                    <input id="income" name="income" min="0" value="4200.00" type="number" step="0.01" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="income">
                                </div>
                            </div>

                            <div class="col-span-6">
                                <label for="employer_name" class="block text-sm font-medium leading-5 text-gray-700">Nama Majikan</label>
                                <input id="employer_name" name="employer_name" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="employer_name">
                            </div>

                            <div class="col-span-6">
                                <label for="employer_address1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Majikan</label>
                                <input id="employer_address1" name="employer_address1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="employer_address1">                       
                                <input id="employer_address2" name="employer_address2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="employer_address2">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="employer_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod</label>
                                <input id="employer_postcode" name="employer_postcode" maxlength="5" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"  wire:model.live="employer_postcode">
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="employer_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar</label>
                                <input id="employer_city" name="employer_city" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="employer_city">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="employer_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri</label>
                                <select id="employer_state" name="employer_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="employer_state">
                                    <option value="">Sila Pilih</option>
                                    <option value="JH">JOHOR</option>
                                    <option value="KD">KEDAH</option>
                                    <option value="KL">KELANTAN</option>
                                    <option value="MK">MELAKA</option>
                                    <option value="NS">NEGERI SEMBILAN</option>
                                    <option value="PH">PAHANG</option>
                                    <option value="PK">PERAK</option>
                                    <option value="RC">PERLIS</option>
                                    <option value="PP">PULAU PINANG</option>
                                    <option value="SB">SABAH</option>
                                    <option value="SW">SARAWAK</option>
                                    <option value="SE">SELANGOR</option>
                                    <option value="TG">TERENGGANU</option>
                                    <option value="WP">WP KUALA LUMPUR</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="employer_phone" class="block text-sm font-medium leading-5 text-gray-700">No
                                    Telefon Majikan</label>
                                <input id="employer_phone" name="employer_phone" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"  wire:model.live="employer_phone">
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
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Maklumat Pasangan Pemohon</h3>
                    
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6 mt-1">

                            <!-- <div class="col-span-6 sm:col-span-6">
                                <fieldset>
                                    <legend class="block text-sm font-medium leading-5 text-gray-700">Hubungan <span class="text-red-700">*</span></legend>
                                    
                                    <div class="mt-4">
                                        <div class="flex items-center">
                                            <input id="spouse_type_husband" name="spouse_type" value="H" type="radio" class="w-4 h-4 text-indigo-600 transition duration-150 ease-in-out form-radio"    wire:model.live="spouse_type">
                                            <label for="spouse_type_husband" class="ml-3">
                                                <span class="block text-sm font-medium leading-5 text-gray-700">Suami</span>
                                            </label>

                                            <input id="spouse_type_wife" name="spouse_type" value="W" type="radio" class="ml-8 w-4 h-4 text-indigo-600 transition duration-150 ease-in-out form-radio"  wire:model.live="spouse_type">
                                            <label for="spouse_type_wife" class="ml-3">
                                                <span class="block text-sm font-medium leading-5 text-gray-700">Isteri</span>
                                            </label>

                                            <input id="spouse_type_beneficiary" name="spouse_type" value="B" type="radio" checked="" class="ml-8 w-4 h-4 text-indigo-600 transition duration-150 ease-in-out form-radio">
                                            <label for="spouse_type_beneficiary" class="ml-3">
                                                <span class="block text-sm font-medium leading-5 text-gray-700">Waris</span>
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div> -->

                            <div class="col-span-6 sm:col-span-6">
                                <label for="spouse_name" class="block text-sm font-medium leading-5 text-gray-700">Nama Suami/Isteri<span class="text-red-700">*</span></label>
                                <input id="spouse_name" name="spouse_name" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="spouse_name">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="spouse_nationality" class="block text-sm font-medium leading-5 text-gray-700">Warganegara Malaysia</label>
                                <select id="spouse_nationality" name="spouse_nationality" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="spouse_nationality">
                                    <option value="">Sila Pilih</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>

                            <div class="block col-span-6 sm:col-span-2" id="spuose_ic_div">
                                <label for="spouse_ic_no" class="block text-sm font-medium leading-5 text-gray-700">No. Kad Pengenalan - cth (900000010000) <span class="text-red-700">*</span></label>
                                <input id="spouse_ic_no" name="spouse_ic_no" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="spouse_ic_no">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="spouse_passport_no" class="block text-sm font-medium leading-5 text-gray-700">No. Passport <span class="text-red-700">*</span></label>
                                <input id="spouse_passport_no" name="spouse_passport_no" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="spouse_passport_no">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="spouse_profession" class="block text-sm font-medium leading-5 text-gray-700">Perkerjaan Sekarang<span class="text-red-700">*</span></label>
                                <input id="spouse_profession" name="spouse_profession" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="spouse_profession">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="spouse_phone" class="block text-sm font-medium leading-5 text-gray-700">No Telefon (HP) - cth
                                    (0123456789) <span class="text-red-700">*</span></label>
                                <input id="spouse_phone" name="spouse_phone" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="spouse_phone">
                            </div>


                            <div class="col-span-6">
                                <label for="spouse_employer_address1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Majikan</label>
                                <input id="spouse_employer_address1" name="spouse_employer_address1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"    wire:model.live="spouse_employer_address1">
                                
                                <input id="spouse_employer_address2" name="spouse_employer_address2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"    wire:model.live="spouse_employer_address2">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="spouse_employer_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod</label>
                                <input id="spouse_employer_postcode" name="spouse_employer_postcode" maxlength="5" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="spouse_employer_postcode">
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="spouse_employer_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar</label>
                                <input id="spouse_employer_city" name="spouse_employer_city" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="spouse_employer_city">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="spouse_employer_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri</label>
                                <select id="spouse_employer_state" name="spouse_employer_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"  wire:model.live="spouse_employer_state">
                                    <option value="">Sila Pilih</option>
                                    <option value="JH">JOHOR</option>
                                    <option value="KD">KEDAH</option>
                                    <option value="KL">KELANTAN</option>
                                    <option value="MK">MELAKA</option>
                                    <option value="NS">NEGERI SEMBILAN</option>
                                    <option value="PH">PAHANG</option>
                                    <option value="PK">PERAK</option>
                                    <option value="RC">PERLIS</option>
                                    <option value="PP">PULAU PINANG</option>
                                    <option value="SB">SABAH</option>
                                    <option value="SW">SARAWAK</option>
                                    <option value="SE" selected="">SELANGOR</option>
                                    <option value="TG">TERENGGANU</option>
                                    <option value="WP">WP KUALA LUMPUR</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="spouse_employer_no" class="block text-sm font-medium leading-5 text-gray-700">No. Telefon Majikan (Premis) - cth
                                    (0123456789) <span class="text-red-700">*</span></label>
                                <input id="spouse_employer_no" name="spouse_employer_no" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="spouse_employer_no">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="spouse_income" class="block text-sm font-medium leading-5 text-gray-700">Pendapatan<span class="text-red-700">*</span></label>
                                <input id="spouse_income" name="spouse_income" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="spouse_income">
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
