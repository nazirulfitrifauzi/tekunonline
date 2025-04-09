<div>
    <div class="">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Keterangan Mengenai Pembiayaan Yang Dipohon</h3>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-3">
                                <label for="purchase_price" class="block text-sm font-medium leading-5 text-gray-700">Jumlah Pembiayaan Yang Diperlukan <span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            RM
                                        </span>
                                    </div>
                                    <input id="purchase_price" name="purchase_price" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.lazy="purchase_price" value="{{ $purchase_price }}">
                                    @error('purchase_price')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-span-6 sm:col-span-2">
                                <label for="pymt_duration" class="block text-sm font-medium leading-5 text-gray-700">Tempoh Bayaran (Bulan) <span class="text-red-700">*</span></label>
                                <select id="pymt_duration" name="pymt_duration" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="pymt_duration">
                                    <option value="">SILA PILIH</option>
                                    <option value="6">6</option>
                                    <option value="12">12</option>
                                    <option value="18">18</option>
                                    <option value="24">24</option>
                                    <option value="30">30</option>
                                    <option value="36">36</option>
                                    <option value="42">42</option>
                                    <option value="48">48</option>
                                    <option value="54">54</option>
                                    <option value="60">60</option>
                                    <option value="72">72</option>
                                    <option value="84">84</option>
                                    <option value="96">96</option>
                                    <option value="108">108</option>
                                    <option value="120">120</option>
                                </select>
                                @error('pymt_duration')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="pymt_frequency" class="block text-sm font-medium leading-5 text-gray-700">Kekerapan Bayaran <span class="text-red-700">*</span></label>
                                <select id="pymt_frequency" name="pymt_frequency" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="pymt_frequency">
                                    <option value="">SILA PILIH</option>
                                    <!-- <option value="MINGGUAN">MINGGUAN</option> -->
                                    <option value="BULANAN">BULANAN</option>
                                    <!-- <option value="MENGIKUT TEMPOH KONTRAK KERJA/INDEN">MENGIKUT TEMPOH KONTRAK KERJA/INDEN</option> -->
                                </select>
                                @error('pymt_frequency')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="pymt_method" class="block text-sm font-medium leading-5 text-gray-700">Cara Bayaran <span class="text-red-700">*</span></label>
                                <select id="pymt_method" name="pymt_method" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="pymt_method">
                                    <option value="">SILA PILIH</option>
                                    <option value="E-MANDATE">E-MANDATE</option>
                                    <option value="PEJABAT TEKUN">PEJABAT TEKUN</option>
                                    <option value="BSN/BANK RAKYAT/POS MALAYSIA">BSN/BANK RAKYAT/POS MALAYSIA</option>
                                    <option value="CEK TARIKH TERTUNDA">CEK TARIKH TERTUNDA</option>
                                    <!-- <option value="PSAT">PSAT</option> -->
                                </select>
                                @error('pymt_method')
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

    <div class="hidden sm:block">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

    <div class="">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Maklumat Perujuk  (Terdiri Dari Kalangan Ahli Keluarga Terdekat Pemohon Yang Berumur 18 Tahun Ke Atas)</h3>
                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="reference_name" class="block text-sm font-medium leading-5 text-gray-700">Nama Perujuk 1 <span class="text-red-700">*</span></label>
                                <input id="reference_name" name="reference_name" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference_name">                               
                                @error('reference_name')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="reference_icno" class="block text-sm font-medium leading-5 text-gray-700">No KP Perujuk 1 <span class="text-red-700">*</span></label>
                                <input id="reference_icno" name="reference_icno"  maxlength="12" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference_icno">                               
                                @error('reference_icno')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="reference_address1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Perujuk 1 <span class="text-red-700">*</span></label>
                                <input id="reference_address1" name="reference_address1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference_address1">                               
                                <input id="reference_address2" name="reference_address2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference_address2">
                                @error('reference_address1')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="reference_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod 1 <span class="text-red-700">*</span></label>
                                <input id="reference_postcode" name="reference_postcode" minlength="5" maxlength="5" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference_postcode">
                                @error('reference_postcode')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="reference_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar 1 <span class="text-red-700">*</span></label>
                                <input id="reference_city" name="reference_city" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference_city">
                                @error('reference_city')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="reference_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri 1 <span class="text-red-700">*</span></label>
                                <select id="reference_state" name="reference_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference_state">
                                    <option value="">SILA PILIH</option>
                                    @foreach ($negeriSelection as $negeris)
                                    <option value="{{ $negeris->kodnegeri }}">{{ $negeris->namanegeri}}</option>
                                    @endforeach 
                                </select>
                                @error('reference_state')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="reference_relation" class="block text-sm font-medium leading-5 text-gray-700">Hubungan Perujuk 1 Dengan Pemohon <span class="text-red-700">*</span></label>
                                <select id="reference_relation" name="reference_relation" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference_relation">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">PASANGAN</option>
                                    <option value="2">IBU</option>
                                    <option value="3">BAPA</option>
                                    <option value="4">ANAK</option>
                                    <option value="5">ADIK-BERADIK</option>
                                    <option value="6">SEPUPU</option>
                                    <option value="7">LAIN-LAIN</option>
                                </select>
                                @error('reference_relation')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="reference_phone" class="block text-sm font-medium leading-5 text-gray-700">No Tel Perujuk 1 <span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            +6
                                        </span>
                                    </div>
                                    <input id="reference_phone" name="reference_phone" maxlength="11" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="reference_phone">
                                </div>
                                @error('reference_phone')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-4">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="reference2_name" class="block text-sm font-medium leading-5 text-gray-700">Nama Perujuk 2 <span class="text-red-700">*</span></label>
                                <input id="reference2_name" name="reference2_name" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference2_name">                               
                                @error('reference2_name')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="reference2_icno" class="block text-sm font-medium leading-5 text-gray-700">No KP Perujuk 2 <span class="text-red-700">*</span></label>
                                <input id="reference2_icno" name="reference2_icno" value=""  maxlength="12" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference2_icno">                               
                                @error('reference2_icno')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="reference2_address1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Perujuk 2 <span class="text-red-700">*</span></label>
                                <input id="reference2_address1" name="reference2_address1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference2_address1">                               
                                <input id="reference2_address2" name="reference2_address2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference2_address2">
                                @error('reference2_address1')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="reference2_relation" class="block text-sm font-medium leading-5 text-gray-700">Hubungan Perujuk 2 Dengan Pemohon <span class="text-red-700">*</span></label>
                                <select id="reference2_relation" name="reference2_relation" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference2_relation">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">PASANGAN</option>
                                    <option value="2">IBU</option>
                                    <option value="3">BAPA</option>
                                    <option value="4">ANAK</option>
                                    <option value="5">ADIK-BERADIK</option>
                                    <option value="6">SEPUPU</option>
                                    <option value="7">LAIN-LAIN</option>
                                </select>
                                @error('reference2_relation')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="reference2_phone" class="block text-sm font-medium leading-5 text-gray-700">No Tel Perujuk 2 <span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            +6
                                        </span>
                                    </div>
                                    <input id="reference2_phone" name="reference2_phone" maxlength="11" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="reference2_phone">
                                </div>
                                @error('reference2_phone')
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

    <div class="">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Perlindungan Takaful Dan Perkeso</h3>
                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="takaful_incident" class="block text-sm font-medium leading-5 text-gray-700">Takaful Kemalangan Peribadi Berkelompok <span class="text-red-700">*</span></label>
                                <select id="takaful_incident" name="takaful_incident" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="takaful_incident">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
                                @error('takaful_incident')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            
                            <div class="col-span-6 sm:col-span-3">
                                <label for="skim_safety" class="block text-sm font-medium leading-5 text-gray-700">Skim Keselamatan Sosial Pekerjaan Sendiri PERKESO <span class="text-red-700">*</span></label>
                                <select id="skim_safety" name="skim_safety" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="skim_safety">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
                                @error('skim_safety')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="pakej_skim_safety" class="block text-sm font-medium leading-5 text-gray-700">Skim Keselamatan Sosial Pekerjaan Sendiri PERKESO <span class="text-red-700">*</span></label>
                                <select id="pakej_skim_safety" name="pakej_skim_safety" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="pakej_skim_safety">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">Pakej 1 - RM 157.20 setahun</option>
                                    <option value="2">Pakej 2 - RM 232.80 setahun</option>
                                    <option value="3">Pakej 3 - RM 442.80 setahun</option>
                                    <option value="4">Pakej 4 - RM 592.80 setahun</option>
                                </select>
                                @error('pakej_skim_safety')
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

    <div class="">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Pendaftaran Wasiat</h3>
                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-2">
                                <label for="will_registration" class="block text-sm font-medium leading-5 text-gray-700">Pendaftaran Wasiat <span class="text-red-700">*</span></label>
                                <select id="will_registration" name="will_registration" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="will_registration">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
                                @error('will_registration')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            @if ($will_registration == 1)
                            <div class="col-span-6 sm:col-span-3">
                                <label for="will_comp_name" class="block text-sm font-medium leading-5 text-gray-700">Nama Syarikat <span class="text-red-700">*</span></label>
                                <select id="will_comp_name" name="will_comp_name" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="will_comp_name">
                                    <option value="">SILA PILIH</option>
                                    <option value="W001">MAAB</option>
                                    <option value="W002">AWARIS</option>
                                </select>
                                @error('will_comp_name')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="will_fi" class="block text-sm font-medium leading-5 text-gray-700">Fi Wasiat <span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            RM
                                        </span>
                                    </div>
                                    <input id="will_fi" name="will_fi" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="will_fi">
                                </div>
                                @error('will_fi')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
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

    <div class="">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Kebenaran Penzahiran Maklumat Kredit Individu</h3>
                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <legend class="block text-sm font-medium leading-5 text-gray-700">Kebenaran Penzahiran Maklumat Kredit Individu <span class="text-red-700">*</span></legend>
                            </div>
                            <div class="col-span-6">
                                <legend class="block text-sm font-medium leading-5 text-gray-700">Pemohon dengan ini membenarkan (*TEKUN Nasional atau pegawainya untuk menggunakan, mendedahkan, memberitahu apa-apa maklumat berhubung dengan akaun pembiayaan TEKUN / untuk tujuan atau berhubung dengan apa-apa tindakan atau prosiding diambil bagi tujuan penilaian kredit atau bayaran di bawah Terma dan Syarat ini;</legend>
                            </div>
                            <div class="col-span-6">
                                <legend class="block text-sm font-medium leading-5 text-gray-700">Pemohon dengan ini membenarkan (*TEKUN Nasional atau pegawainya untuk penzahiran apa-apa maklumat kredit individu yang berkaitan dengan kedudukan kredit, kemudahan kredit yang diberi kepada pemohon kepada Experian Information Services (Malaysia) Sdn Bhd (dahulu dikenali sebagai RAMCI) ('Experian') dan / atau Credit Tip Off Service Sdn Bhd ('CTOS') serta pelanggan Experian / CTOS termasuk Bank, Institusi kewangan atau mana-mana agensi pelaporan kredit yang berkuat kuasa di Malaysia.</legend>
                            </div>
                            <div class="col-span-6">
                                <legend class="block text-sm font-medium leading-5 text-gray-700">Pemohon dengan ini memberi kebenaran kepada Experian dan / atau CTOS bagi mendedahkan maklumat kredit, termasuk maklumat kredit perbankan kepada (*TEKUN Nasional atau pegawainya bagi maksud seperti berikut selepas dinyatakan di bawah seksyen 24, menurut Akta Pelaporan Kredit 2010. Persetujuan hendaklah kekal terpakai selagi pemohon mengekalkan akaun / pembiayaan / kredit / apa-apa transaksi dengan organisasi.)</legend>
                            </div>
                            <div class="col-span-6">
                                <x-checkbox id="auth_disc_info_flag" label="Ya" wire:model="auth_disc_info_flag" value="1" />
                                @error('auth_disc_info_flag')
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

    <div class="">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Akuan Pemohon</h3>
                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <legend class="block text-sm font-medium leading-5 text-gray-700">Akuan Pemohon</legend>
                            </div>
                            <div class="col-span-6">
                                <legend class="block text-sm font-medium leading-5 text-gray-700">Adalah Dengan Ini Saya Mengaku Bahawa:</legend>
                            </div>
                            <div class="col-span-6">
                                <legend class="block text-sm font-medium leading-5 text-gray-700">1. Segala maklumat dan keterangan yang diberikan adalah benar.</legend>
                            </div>
                            <div class="col-span-6">
                                <legend class="block text-sm font-medium leading-5 text-gray-700">2. Pihak TEKUN berhak menolak permohonan ini jika didapati maklumat yang diberikan tidak benar. </legend>
                            </div>
                            <div class="col-span-6">
                                <legend class="block text-sm font-medium leading-5 text-gray-700">3. Saya berikrar untuk membayar jumlah terhutang sepertimana yang dijanjikan.</legend>
                            </div>
                            <div class="col-span-6">
                                <legend class="block text-sm font-medium leading-5 text-gray-700">4. Saya memperakukan bahawa kemudahan pembiayaan ini tidak akan disalahgunakan. </legend>
                            </div>
                            <div class="col-span-6">
                                <legend class="block text-sm font-medium leading-5 text-gray-700">5. Saya bukan seorang yang bankrap.</legend>
                            </div>
                            <div class="col-span-6">
                                <legend class="block text-sm font-medium leading-5 text-gray-700">6. Saya bersetuju untuk mengikuti Seminar Asas Keusahawanan ( SAK ) TEKUN Nasional yang diwajibkan ke atas saya (Jika berkenaan).</legend>
                            </div>
                            <div class="col-span-6">
                                <legend class="block text-sm font-medium leading-5 text-gray-700">7. Saya dengan ini membenarkan pihak TEKUN Nasional memproses data-data peribadi bagi tujuan permohonan pembiayaan.</legend>
                            </div>
                            <div class="col-span-6">
                                <legend class="block text-sm font-medium leading-5 text-gray-700">8. Saya mengakui tidak pernah melantik /menggunakan khidmat ejen(orang tengah) bagi memproses permohonan ini.Borang dan proses permohonan ini juga tidak dikenakan sebarang bayaran oleh mana-mana pihak.</legend>
                            </div>
                            <div class="col-span-6">
                                <x-checkbox id="appl_stmt_flag" label="Ya" wire:model="appl_stmt_flag" value="1" />
                                @error('appl_stmt_flag')
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

    <div class="">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Perakuan Penamaan</h3>
                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6">
                                <label for="name_penamaan" class="block text-sm font-medium leading-5 text-gray-700">Nama <span class="text-red-700">*</span></label>
                                <input id="name_penamaan" name="name_penamaan" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="name_penamaan">                               
                                @error('name_penamaan')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="nationality_penamaan" class="block text-sm font-medium leading-5 text-gray-700">Warganegara Malaysia <span class="text-red-700">*</span></label>
                                <select id="nationality_penamaan" name="nationality_penamaan" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="nationality_penamaan">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
                                @error('nationality_penamaan')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            @if($nationality_penamaan == 1)
                            <div class="col-span-6 sm:col-span-2">
                                <label for="icno_penamaan" class="block text-sm font-medium leading-5 text-gray-700">No. Kad Pengenalan <span class="text-red-700">*</span></label>
                                <input id="icno_penamaan" name="icno_penamaan" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="icno_penamaan">                               
                                @error('icno_penamaan')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            @endif

                            @if($nationality_penamaan == 0)
                            <div class="col-span-6 sm:col-span-2">
                                <label for="passportno_penamaan" class="block text-sm font-medium leading-5 text-gray-700">No. Passport <span class="text-red-700">*</span></label>
                                <input id="passportno_penamaan" name="passportno_penamaan" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="passportno_penamaan">                               
                                @error('passportno_penamaan')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            @endif

                            <div class="col-span-6">
                                <label for="penamaan_addr1" class="block text-sm font-medium leading-5 text-gray-700">Alamat <span class="text-red-700">*</span></label>
                                <input id="penamaan_addr1" name="penamaan_addr1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="penamaan_addr1">                               
                                <input id="penamaan_addr2" name="penamaan_addr2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="penamaan_addr2">
                                @error('penamaan_addr1')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="penamaan_relationship" class="block text-sm font-medium leading-5 text-gray-700">Hubungan Dengan Pemohon <span class="text-red-700">*</span></label>
                                <input id="penamaan_relationship" name="penamaan_relationship" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="penamaan_relationship">
                                @error('penamaan_relationship')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="penamaan_phone" class="block text-sm font-medium leading-5 text-gray-700">No. Telefon <span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            +6
                                        </span>
                                    </div>
                                    <input id="penamaan_phone" name="penamaan_phone" maxlength="11" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="penamaan_phone">
                                </div>
                                @error('penamaan_phone')
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

    <div class="flex justify-center mt-6">
        <span class="inline-flex rounded-md shadow-sm">
            <button wire:click="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white bg-green-600 rounded-md border border-transparent transition duration-150 ease-in-out hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700">
                Simpan
            </button>
        </span>
    </div>
</div>
