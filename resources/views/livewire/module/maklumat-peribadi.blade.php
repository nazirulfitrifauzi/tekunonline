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
                                <label for="tekun_branch" class="block text-sm font-medium leading-5 text-gray-700">Cawangan Berhampiran dengan Lokasi Perniagaan <span class="text-red-700">*</span></label>
                                <select id="tekun_branch" name="tekun_branch" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model="tekun_branch">
                                    <option value="">SILA PILIH</option>
                                    @foreach ($cawanganSelect as $cawangans)
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
                                <label for="business_status" class="block text-sm font-medium leading-5 text-gray-700">Status Perniagaan <span class="text-red-700">*</span></label>
                                <select id="business_status" name="business_status" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_status">
                                    <option value="">SILA PILIH</option>
                                    <option value="SEDANG BERNIAGA">SEDANG BERNIAGA</option>
                                    <option value="MEMULAKAN PERNIAGAAN">MEMULAKAN PERNIAGAAN</option>
                                </select>
                                @error('business_status')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="business_method" class="block text-sm font-medium leading-5 text-gray-700">Kaedah Perniagaan <span class="text-red-700">*</span></label>
                                <select id="business_method" name="business_method" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_method">
                                    <option value="">SILA PILIH</option>
                                    <option value="0">OFFLINE</option>
                                    <option value="1">ONLINE</option>
                                    <option value="2">ONLINE & OFFLINE</option>
                                </select>
                                @error('business_method')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>     

                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="bank1" class="block text-sm font-medium leading-5 text-gray-700">Nama Bank Operasi Perniagaan 1 <span class="text-red-700">*</span></label>
                                    <select id="bank1" name="bank1" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="bank1">
                                        <option value="">SILA PILIH</option>
                                        @foreach ($bank as $bankas)
                                        <option value="{{ $bankas->id }}">{{ $bankas->nama_bank }}</option>
                                        @endforeach
                                    </select>
                                    @error('bank1')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                    @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="bank1_acct" class="block text-sm font-medium leading-5 text-gray-700">No Akaun Bank 1 <span class="text-red-700">*</span></label>
                                <input id="bank1_acct" 
                                       name="bank1_acct" 
                                       type="text" 
                                       maxlength="17" 
                                       class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" 
                                       wire:model.live="bank1_acct"
                                       wire:dirty.class="border-red-500"
                                       oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                       pattern="[0-9]*">
                                @error('bank1_acct')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-2">
                                <label for="bank1_acct_type" class="block text-sm font-medium leading-5 text-gray-700">Jenis Akaun 1 <span class="text-red-700">*</span></label>
                                <select id="bank1_acct_type" name="bank1_acct_type" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="bank1_acct_type">
                                    <option value="">SILA PILIH</option>
                                    <option value="SIMPANAN">SIMPANAN</option>
                                    <option value="SEMASA">SEMASA</option>
                                </select>
                                @error('bank1_acct_type')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="bank1_register_bank_no" class="block text-sm font-medium leading-5 text-gray-700">No Pendaftaran Bank / No Id Akaun Bank / Register Bank 1 
                                    @if($bank1_acct_type === 'SEMASA') <span class="text-red-700">*</span></label> @endif
                                <input id="bank1_register_bank_no" 
                                       name="bank1_register_bank_no" 
                                       type="text" 
                                       class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" 
                                       wire:model.live="bank1_register_bank_no"
                                       oninput="this.value = this.value.replace(/[^A-Za-z0-9]/g, '')"
                                       pattern="[A-Za-z0-9]*">
                                @error('bank1_register_bank_no')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="bank2" class="block text-sm font-medium leading-5 text-gray-700">Nama Bank Operasi Perniagaan 2</label>
                                    <select id="bank2" name="bank2" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="bank2">
                                        <option value="">SILA PILIH</option>
                                        @foreach ($bank as $bankas)
                                        <option value="{{ $bankas->id }}">{{ $bankas->nama_bank }}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="bank2_acct" class="block text-sm font-medium leading-5 text-gray-700">No Akaun Bank 2</label>
                                <input id="bank2_acct" 
                                       name="bank2_acct" 
                                       type="text" 
                                       maxlength="17" 
                                       class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" 
                                       wire:model.live="bank2_acct"
                                       oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                       pattern="[0-9]*">
                            </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-2">
                                <label for="bank2_acct_type" class="block text-sm font-medium leading-5 text-gray-700">Jenis Akaun 2</label>
                                <select id="bank2_acct_type" name="bank2_acct_type" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="bank2_acct_type">
                                    <option value="">SILA PILIH</option>
                                    <option value="SIMPANAN">SIMPANAN</option>
                                    <option value="SEMASA">SEMASA</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="bank2_register_bank_no" class="block text-sm font-medium leading-5 text-gray-700">No Pendaftaran Bank / No Id Akaun Bank / Register Bank 2
                                @if($bank2_acct_type === 'SEMASA') <span class="text-red-700">*</span></label> @endif
                                <input id="bank2_register_bank_no" name="bank2_register_bank_no" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="bank2_register_bank_no">
                                @error('bank2_register_bank_no')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
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
                                <label for="name" class="block text-sm font-medium leading-5 text-gray-700">Nama Pemohon(Seperti pada kad pengenalan) <span class="text-red-700">*</span></label>
                                <input id="name" 
                                name="name" 
                                type="text" 
                                class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" 
                                wire:model.live="name"
                                oninput="this.value = this.value.replace(/[^A-Za-z\s'-.@]/g, '').toUpperCase()"
                                pattern="[A-Za-z\s'-.@]*">
                                @error('name')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="ic_no" class="block text-sm font-medium leading-5 text-gray-700">No. KP Baru (tanpa -) <span class="text-red-700">*</span></label>
                                <input id="ic_no" 
                                       name="ic_no" 
                                       maxlength="12" 
                                       class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" 
                                       wire:model.live="ic_no"
                                       oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                       pattern="[0-9]*">
                                @error('ic_no')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="ic_old" @class([
                                    'block text-sm font-medium leading-5 text-gray-700',
                                    'hidden' => !$showIcOld
                                ])>No. KP (Lama) <span class="text-red-700">*</span></label>
                                <input id="ic_old" 
                                       name="ic_old" 
                                       wire:model.live="ic_old"
                                       @class([
                                           'block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5',
                                           'hidden' => !$showIcOld
                                       ])>
                                @error('ic_old')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-2">
                                <label for="gender" class="block text-sm font-medium leading-5 text-gray-700">Jantina <span class="text-red-700">*</span></label>
                                <input id="gender" name="gender" disabled value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="gender">                                       
                                @error('gender')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="birthdate" class="block text-sm font-medium leading-5 text-gray-700">Tarikh Lahir <span class="text-red-700">*</span></label>
                                <input id="birthdate" name="birthdate" disabled value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="birthdate">
                                @error('birthdate')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="age" class="block text-sm font-medium leading-5 text-gray-700">Umur <span class="text-red-700">*</span></label>
                                <input id="age" name="age" disabled value="" maxlength="3" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase"   wire:model.live="age">
                                @error('age')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div> 

                            <div class="col-span-6 sm:col-span-2">
                                <label for="religion" class="block text-sm font-medium leading-5 text-gray-700">Agama <span class="text-red-700">*</span></label>
                                <select id="religion" name="religion" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="religion">
                                    <option value="">SILA PILIH AGAMA</option>
                                    <option value="ISLAM">ISLAM</option>
                                    <option value="BUKAN ISLAM">BUKAN ISLAM</option>
                                </select>
                                @error('religion')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="race" class="block text-sm font-medium leading-5 text-gray-700">Bangsa <span class="text-red-700">*</span></label>
                                <select id="race" name="race" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="race">
                                    <option value="">SILA PILIH BANGSA</option>
                                    <option value="MELAYU">MELAYU</option>
                                    <option value="INDIA">INDIA</option>
                                    @if($religion == 'ISLAM')
                                    <option value="CINA">CINA</option>
                                    @endif
                                    <option value="SIAM">SIAM</option>
                                    <option value="ORANG ASLI (SEMENANJUNG)">ORANG ASLI (SEMENANJUNG)</option>
                                    <option value="BUMIPUTERA SABAH">BUMIPUTERA SABAH</option>
                                    <option value="BUMIPUTERA SARAWAK">BUMIPUTERA SARAWAK</option>
                                    <option value="LAIN-LAIN">LAIN-LAIN</option>
                                </select>
                                @error('race')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            
                            <div class="col-span-6 sm:col-span-2">
                                <label for="ethnic" @class([
                                    'block text-sm font-medium leading-5 text-gray-700',
                                    'hidden' => !in_array($race, ['BUMIPUTERA SABAH', 'BUMIPUTERA SARAWAK', 'LAIN-LAIN'])
                                ])>Bangsa <span class="text-red-700">*</span></label>
                                <select id="ethnic" 
                                        name="ethnic" 
                                        wire:model.live="ethnic"
                                        @class([
                                            'block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5',
                                            'hidden' => !in_array($race, ['BUMIPUTERA SABAH', 'BUMIPUTERA SARAWAK', 'LAIN-LAIN'])
                                        ])>
                                    <option value="">SILA PILIH KAUM/ETNIK</option>
                                    @if($race === 'BUMIPUTERA SABAH')
                                        <option value="BAJAU">BAJAU</option>
                                        <option value="DUSUN">DUSUN</option>
                                        <option value="MURUT">MURUT</option>
                                        <option value="SINO-NATIVE">SINO-NATIVE</option>
                                        <option value="SULUK">SULUK</option>
                                        <option value="BINADAN">BINADAN</option>
                                        <option value="BISAYA">BISAYA</option>
                                        <option value="BONGOL">BONGOL</option>
                                        <option value="BRUNEI">BRUNEI</option>
                                        <option value="DUMPAS">DUMPAS</option>
                                        <option value="IRANUN">IRANUN</option>
                                        <option value="IDAHAN">IDAHAN</option>
                                        <option value="KWIJAU">KWIJAU</option>
                                        <option value="KEDAYAN">KEDAYAN</option>
                                        <option value="LINGKABAU">LINGKABAU</option>
                                        <option value="LUNDAYEH">LUNDAYEH</option>
                                        <option value="LASAU">LASAU</option>
                                        <option value="MELANAU">MELANAU</option>
                                        <option value="MANGKAAK">MANGKAAK</option>
                                        <option value="MATAGANG">MATAGANG</option>
                                        <option value="MINOKOK">MINOKOK</option>
                                        <option value="MELAYU SABAH">MELAYU SABAH</option>
                                        <option value="MOMOGUN">MOMOGUN</option>
                                        <option value="PAITAN">PAITAN</option>
                                        <option value="RUMANAU">RUMANAU</option>
                                        <option value="RUNGUS">RUNGUS</option>
                                        <option value="SUNGAI">SUNGAI</option>
                                        <option value="SONSONGAN">SONSONGAN</option>
                                        <option value="SINULIHAN">SINULIHAN</option>
                                        <option value="TOMBONUO">TOMBONUO</option>
                                        <option value="TAGAL">TAGAL</option>
                                        <option value="TINAGAS">TINAGAS</option>
                                        <option value="KADAZAN">KADAZAN</option>
                                        <option value="KADAZAN-SINO">KADAZAN-SINO</option>
                                    @elseif($race === 'BUMIPUTERA SARAWAK')
                                        <option value="MELAYU SARAWAK">MELAYU SARAWAK</option>
                                        <option value="MELANAU">MELANAU</option>
                                        <option value="KEDAYAN">KEDAYAN</option>
                                        <option value="IBAN">IBAN</option>
                                        <option value="BIDAYUH">BIDAYUH</option>
                                        <option value="KAYAN">KAYAN</option>
                                        <option value="KENYAH">KENYAH</option>
                                        <option value="MURUT">MURUT</option>
                                        <option value="KELABIT">KELABIT</option>
                                        <option value="PUNAN">PUNAN</option>
                                        <option value="BISAYA">BISAYA</option>
                                        <option value="BERAWAN">BERAWAN</option>
                                        <option value="BELOT">BELOT</option>
                                        <option value="BHUKET ATAU UKIT">BHUKET ATAU UKIT</option>
                                        <option value="BALAU">BALAU</option>
                                        <option value="BATANG AI">BATANG AI</option>
                                        <option value="BATU ELAH">BATU ELAH</option>
                                        <option value="BAKETAN">BAKETAN</option>
                                        <option value="BINTULU">BINTULU</option>
                                        <option value="BADENG">BADENG</option>
                                        <option value="DUSUN">DUSUN</option>
                                        <option value="JAGOI">JAGOI</option>
                                        <option value="LAKIPUT">LAKIPUT</option>
                                        <option value="KAJANG">KAJANG</option>
                                        <option value="KEJAMAN">KEJAMAN</option>
                                        <option value="KANOWIT">KANOWIT</option>
                                        <option value="LIRONG">LIRONG</option>
                                        <option value="LEMANAK">LEMANAK</option>
                                        <option value="LAHANAN">LAHANAN</option>
                                        <option value="LISUM">LISUM</option>
                                        <option value="MATU">MATU</option>
                                        <option value="MEMALOH">MEMALOH</option>
                                        <option value="MELIKIN">MELIKIN</option>
                                        <option value="MELAING">MELAING</option>
                                        <option value="NGORIK">NGORIK</option>
                                        <option value="MENONDO">MENONDO</option>
                                        <option value="JAMOK">JAMOK</option>
                                        <option value="SEBOP">SEBOP</option>
                                        <option value="SEDUAN">SEDUAN</option>
                                        <option value="SEKAPAN">SEKAPAN</option>
                                        <option value="SEGALANG">SEGALANG</option>
                                        <option value="SIHAN">SIHAN</option>
                                        <option value="SEPING">SEPING</option>
                                        <option value="SARIBAS">SARIBAS</option>
                                        <option value="SEBUYAU">SEBUYAU</option>
                                        <option value="SKRANG">SKRANG</option>
                                        <option value="SABAN">SABAN</option>
                                        <option value="SELAKAN">SELAKAN</option>
                                        <option value="SELAKO">SELAKO</option>
                                        <option value="TAGAL">TAGAL</option>
                                        <option value="TABUN">TABUN</option>
                                        <option value="TUTONG">TUTONG</option>
                                        <option value="TANJONG">TANJONG</option>
                                        <option value="TATAU">TATAU</option>
                                        <option value="TAUP">TAUP</option>
                                        <option value="UKIT">UKIT</option>
                                        <option value="UNKOP">UNKOP</option>
                                        <option value="ULU AI">ULU AI</option>                                    
                                    @elseif($race === 'LAIN-LAIN')
                                        <option value="EURASIAN">EURASIAN</option>
                                    @endif
                                </select>
                                @error('ethnic')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>


                            <div class="col-span-6 sm:col-span-2">
                                <label for="marital" class="block text-sm font-medium leading-5 text-gray-700">Taraf Perkahwinan <span class="text-red-700">*</span></label>
                                <select id="marital" 
                                        name="marital" 
                                        wire:model.live="marital"
                                        class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                    <option value="">SILA PILIH</option>
                                    <option value="BUJANG">BUJANG</option>
                                    <option value="BERKAHWIN">BERKAHWIN</option>
                                    @if($gender === 'LELAKI')
                                        <option value="DUDA">DUDA</option>
                                    @elseif($gender === 'PEREMPUAN')
                                        <option value="IBU TUNGGAL">IBU TUNGGAL</option>
                                    @endif
                                </select>
                                @error('marital')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="dependent" class="block text-sm font-medium leading-5 text-gray-700">Bilangan Tanggungan <span class="text-red-700">*</span></label>
                                <input id="dependent" name="dependent" type="number" min="0" value="2" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase"    wire:model.live="dependent">
                                @error('dependent')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="oku" class="block text-sm font-medium leading-5 text-gray-700">Orang Kelainan Upaya <span class="text-red-700">*</span></label>
                                <select id="oku" name="oku" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="oku">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
                                @error('oku')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>


                            <div class="col-span-6 sm:col-span-2">
                                <label for="stop_worktime_flag" class="block text-sm font-medium leading-5 text-gray-700">DIBERHENTIKAN KERJA SEMASA PANDEMIK <span class="text-red-700">*</span></label>
                                <select id="stop_worktime_flag" name="stop_worktime_flag" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="stop_worktime_flag">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
                                @error('stop_worktime_flag')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="asnaf_berdaftar_flag" class="block text-sm font-medium leading-5 text-gray-700">Asnaf Berdaftar Dibawah Majlis Agama Islam Negeri/Lembaga Zakat Negeri/Pusat Zakat Negeri</label>
                                <select id="asnaf_berdaftar_flag" name="asnaf_berdaftar_flag" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="asnaf_berdaftar_flag">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="education" class="block text-sm font-medium leading-5 text-gray-700">Taraf Pendidikan <span class="text-red-700">*</span></label>
                                <select id="education" name="education" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"  wire:model.live="education">
                                    <option value="">Sila Pilih Taraf Pendidikan</option>
                                    <option value="5">PHD/IJAZAH SARJANA</option>
                                    <option value="4">IJAZAH SARJANA MUDA</option>
                                    <option value="3">DIPLOMA/STPM</option>
                                    <option value="2">SPM/SIJIL/SETARAF</option>
                                    <option value="1">PMR/SETARAF</option>
                                </select>
                                @error('education')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>


                            <div class="col-span-6">
                                <label for="address1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Kediaman <span class="text-red-700">*</span></label>
                                <input id="address1" name="address1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="address1">                               
                                <input id="address2" name="address2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="address2">
                                @error('address1')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod <span class="text-red-700">*</span></label>
                                <input id="postcode" name="postcode" minlength="5" maxlength="5" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="postcode">
                                @error('postcode')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="city" class="block text-sm font-medium leading-5 text-gray-700">Bandar <span class="text-red-700">*</span></label>
                                <input id="city" name="city" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="city">
                                @error('city')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="state" class="block text-sm font-medium leading-5 text-gray-700">Negeri <span class="text-red-700">*</span></label>
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
                                @error('state')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="phone_home" class="block text-sm font-medium leading-5 text-gray-700">No Telefon (Rumah)</label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            +6
                                        </span>
                                    </div>
                                    <input id="phone_home" name="phone_home" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"  minlength="10" maxlength="11" wire:model.live="phone_home">
                                </div>
                                @error('phone_home')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="phone_hp" class="block text-sm font-medium leading-5 text-gray-700">No Telefon (HP) <span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            +6
                                        </span>
                                    </div>
                                    <input id="phone_hp" name="phone_hp" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"  minlength="10" maxlength="11" wire:model.live="phone_hp">
                                </div>
                                @error('phone_hp')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-2">
                                <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Emel <span class="text-red-700">*</span></label>
                                <input id="email" name="email" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="email">
                                @error('email')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="facebook" class="block text-sm font-medium leading-5 text-gray-700">Facebook</label>
                                <input id="facebook" name="facebook" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="facebook">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="instagram" class="block text-sm font-medium leading-5 text-gray-700">Instagram</label>
                                <input id="instagram" name="instagram" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase"   wire:model.live="instagram">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="status_home" class="block text-sm font-medium leading-5 text-gray-700">Status Kediaman <span class="text-red-700">*</span></label>
                                <select id="status_home" name="status_home" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"  wire:model.live="status_home">
                                    <option value="">SILA PILIH STATUS KEDIAMAN</option>
                                    <option value="SENDIRI">SENDIRI</option>
                                    <option value="SEWA">SEWA</option>
                                    <option value="KELUARGA">KELUARGA</option>
                                </select>
                                @error('status_home')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="profession" class="block text-sm font-medium leading-5 text-gray-700">Pekerjaan Sekarang <span class="text-red-700">*</span></label>
                                <select id="profession" name="profession" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"  wire:model.live="profession">
                                    <option value="">SILA PILIH</option>
                                    <option value="BERNIAGA">BERNIAGA</option>
                                    <option value="KAKITANGAN KERAJAAN">KAKITANGAN KERAJAAN</option>
                                    <option value="KAKITANGAN SWASTA">KAKITANGAN SWASTA</option>
                                    <option value="TIDAK BEKERJA">TIDAK BEKERJA</option>
                                </select>
                                @error('profession')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="income" class="block text-sm font-medium leading-5 text-gray-700">Pendapatan <span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            RM
                                        </span>
                                    </div>
                                    <input id="income" name="income" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="income">
                                </div>
                                @error('income')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            @if($profession == 'KAKITANGAN KERAJAAN'||$profession == 'KAKITANGAN SWASTA')
                            <div class="col-span-6" >
                                <label for="employer_name" class="block text-sm font-medium leading-5 text-gray-700">Nama Majikan <span class="text-red-700">*</span></label>
                                <input id="employer_name" 
                                       name="employer_name" 
                                       wire:model.live="employer_name" 
                                       class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase">
                                @error('employer_name')
                                <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-6" >
                                <label for="employer_address1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Majikan <span class="text-red-700">*</span></label>
                                <input id="employer_address1" 
                                       name="employer_address1" 
                                       wire:model.live="employer_address1" 
                                       class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase">
                                <input id="employer_address2" 
                                       name="employer_address2" 
                                       wire:model.live="employer_address2" 
                                       class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase">
                                @error('employer_address1')
                                <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2" >
                                <label for="employer_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod <span class="text-red-700">*</span></label>
                                <input id="employer_postcode" 
                                       name="employer_postcode" 
                                       maxlength="5" 
                                       wire:model.live="employer_postcode" 
                                       class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                @error('employer_postcode')
                                <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2" >
                                <label for="employer_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar <span class="text-red-700">*</span></label>
                                <input id="employer_city" 
                                       name="employer_city" 
                                       wire:model.live="employer_city" 
                                       class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase">
                                @error('employer_city')
                                <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2" >
                                <label for="employer_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri</label>
                                <select id="employer_state" name="employer_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"  wire:model.live="employer_state">
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
                                    <option value="SE" >SELANGOR</option>
                                    <option value="TG">TERENGGANU</option>
                                    <option value="WP">WP KUALA LUMPUR</option>
                                </select>
                                @error('employer_state')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="employer_phone" class="block text-sm font-medium leading-5 text-gray-700">No Tel Majikan <span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            +6
                                        </span>
                                    </div>
                                    <input id="employer_phone" name="employer_phone" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" minlength="10" maxlength="11"  wire:model.live="employer_phone">
                                    @error('employer_phone')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            @endif
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

    <div class="mt-10 sm:mt-0" x-data x-show="$wire.marital === 'BERKAHWIN'">
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

                            <div class="col-span-6 sm:col-span-6">
                                <label for="spouse_name" class="block text-sm font-medium leading-5 text-gray-700">Nama Suami/Isteri <span class="text-red-700">*</span></label>
                                <input id="spouse_name" name="spouse_name" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="spouse_name">
                                @error('spouse_name')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="spouse_nationality" class="block text-sm font-medium leading-5 text-gray-700">Warganegara Malaysia <span class="text-red-700">*</span></label>
                                <select id="spouse_nationality" name="spouse_nationality" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="spouse_nationality">
                                    <option value="">Sila Pilih</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                                @error('spouse_nationality')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            @if($spouse_nationality == 1)
                            <div class="col-span-6 sm:col-span-2">
                                <label for="spouse_ic_no" class="block text-sm font-medium leading-5 text-gray-700">No. Kad Pengenalan <span class="text-red-700">*</span></label>
                                <input id="spouse_ic_no" 
                                       name="spouse_ic_no" 
                                       value="" 
                                       class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" 
                                       wire:model.live="spouse_ic_no">
                                @error('spouse_ic_no')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            @endif

                            @if($spouse_nationality == 0)
                            <div class="col-span-6 sm:col-span-2">
                                <label for="spouse_passport_no" class="block text-sm font-medium leading-5 text-gray-700">No. Passport <span class="text-red-700">*</span></label>
                                <input id="spouse_passport_no" 
                                       name="spouse_passport_no" 
                                       value="" 
                                       class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" 
                                       wire:model.live="spouse_passport_no">
                                @error('spouse_passport_no')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            @endif

                            <div class="col-span-6 sm:col-span-2">
                                <label for="spouse_profession" class="block text-sm font-medium leading-5 text-gray-700">Perkerjaan Sekarang <span class="text-red-700">*</span></label>
                                <input id="spouse_profession" name="spouse_profession" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase"   wire:model.live="spouse_profession">
                                @error('spouse_profession')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="spouse_phone" class="block text-sm font-medium leading-5 text-gray-700">No Telefon (HP) <span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            +6
                                        </span>
                                    </div>
                                    <input id="spouse_phone" name="spouse_phone" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" minlength="10" maxlength="11"  wire:model.live="spouse_phone">
                                    @error('spouse_phone')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="spouse_income" class="block text-sm font-medium leading-5 text-gray-700">Pendapatan <span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            RM
                                        </span>
                                    </div>
                                    <input id="spouse_income" name="spouse_income" min="0" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="spouse_income">
                                    @error('spouse_income')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                            </div>

                            <div class="col-span-6">
                                <label for="spouse_employer_address1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Majikan</label>
                                <input id="spouse_employer_address1" name="spouse_employer_address1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase"    wire:model.live="spouse_employer_address1">
                                <input id="spouse_employer_address2" name="spouse_employer_address2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase"    wire:model.live="spouse_employer_address2">
                                @error('spouse_employer_address1')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="spouse_employer_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod</label>
                                <input id="spouse_employer_postcode" 
                                       name="spouse_employer_postcode" 
                                       maxlength="5" 
                                       wire:model.live="spouse_employer_postcode" 
                                       class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                @error('spouse_employer_postcode')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="spouse_employer_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar</label>
                                <input id="spouse_employer_city" 
                                       name="spouse_employer_city" 
                                       wire:model.live="spouse_employer_city" 
                                       class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase">
                                @error('spouse_employer_city')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
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
                                @error('spouse_employer_state')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="spouse_employer_no" class="block text-sm font-medium leading-5 text-gray-700">No Telefon Majikan</label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            +6
                                        </span>
                                    </div>
                                    <input id="spouse_employer_no" name="spouse_employer_no" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" minlength="10" maxlength="11"  wire:model.live="spouse_employer_no">
                                </div>
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
                Simpan
            </button>
        </span>
    </div>
</div>
