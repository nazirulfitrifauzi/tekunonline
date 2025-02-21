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

                        <div class="col-span-6 sm:col-span-2">
                                <label for="purchase_price" class="block text-sm font-medium leading-5 text-gray-700">Jumlah Pembiayaan Yang Diperlukan<span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            RM
                                        </span>
                                    </div>
                                    <input id="purchase_price" name="purchase_price" min="0" value="" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="purchase_price">
                                </div>
                            </div>
                            
                            <div class="col-span-6 sm:col-span-2">
                                <label for="pymt_duration" class="block text-sm font-medium leading-5 text-gray-700">Tempoh Bayaran (Bulan)<span class="text-red-700">*</span></label>
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
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="pymt_frequency" class="block text-sm font-medium leading-5 text-gray-700">Kekerapan Bayaran<span class="text-red-700">*</span></label>
                                <select id="pymt_frequency" name="pymt_frequency" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="pymt_frequency">
                                    <option value="">SILA PILIH</option>
                                    <option value="MINGGUAN">MINGGUAN</option>
                                    <option value="BULANAN">BULANAN</option>
                                    <option value="MENGIKUT TEMPOH KONTRAK KERJA/INDEN">MENGIKUT TEMPOH KONTRAK KERJA/INDEN</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="pymt_method" class="block text-sm font-medium leading-5 text-gray-700">Cara Bayaran<span class="text-red-700">*</span></label>
                                <select id="pymt_method" name="pymt_method" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="pymt_method">
                                    <option value="">SILA PILIH</option>
                                    <option value="E-MANDATE">E-MANDATE</option>
                                    <option value="PEJABAT TEKUN">PEJABAT TEKUN</option>
                                    <option value="BSN/BANK RAKYAT/POS MALAYSIA">BSN/BANK RAKYAT/POS MALAYSIA</option>
                                    <option value="CEK TARIKH TERTUNDA">CEK TARIKH TERTUNDA</option>
                                    <option value="PSAT">PSAT</option>
                                </select>
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
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Maklumat Perujuk</h3>
                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="reference_name" class="block text-sm font-medium leading-5 text-gray-700">Nama Perujuk 1<span class="text-red-700">*</span></label>
                                <input id="reference_name" name="reference_name" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference_name">                               
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="reference_icno" class="block text-sm font-medium leading-5 text-gray-700">No KP Perujuk 1<span class="text-red-700">*</span></label>
                                <input id="reference_icno" name="reference_icno" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference_icno">                               
                            </div>

                            <div class="col-span-6">
                                <label for="reference_address1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Perujuk 1<span class="text-red-700">*</span></label>
                                <input id="reference_address1" name="reference_address1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference_address1">                               
                                <input id="reference_address2" name="reference_address2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference_address2">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="reference_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod 1<span class="text-red-700">*</span></label>
                                <input id="reference_postcode" name="reference_postcode" minlength="5" maxlength="5" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference_postcode">
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="reference_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar 1<span class="text-red-700">*</span></label>
                                <input id="reference_city" name="reference_city" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference_city">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="reference_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri 1<span class="text-red-700">*</span></label>
                                <select id="reference_state" name="reference_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference_state">
                                    <option value="">SILA PILIH</option>
                                    @foreach ($negeriSelection as $negeris)
                                    <option value="{{ $negeris->kodnegeri }}">{{ $negeris->namanegeri}}</option>
                                    @endforeach 
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="reference_relation" class="block text-sm font-medium leading-5 text-gray-700">Hubungan Perujuk 1 Dengan Pemohon<span class="text-red-700">*</span></label>
                                <input id="reference_relation" name="reference_relation" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference_relation">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="reference_phone" class="block text-sm font-medium leading-5 text-gray-700">No Tel Perujuk 1<span class="text-red-700">*</span></label>
                                <input id="reference_phone" name="reference_phone" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference_phone">
                            </div>

                            <div class="col-span-4">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="reference2_name" class="block text-sm font-medium leading-5 text-gray-700">Nama Perujuk 2<span class="text-red-700">*</span></label>
                                <input id="reference2_name" name="reference2_name" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference2_name">                               
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="reference2_icno" class="block text-sm font-medium leading-5 text-gray-700">No KP Perujuk 2<span class="text-red-700">*</span></label>
                                <input id="reference2_icno" name="reference2_icno" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference2_icno">                               
                            </div>

                            <div class="col-span-6">
                                <label for="reference2_address1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Perujuk 2<span class="text-red-700">*</span></label>
                                <input id="reference2_address1" name="reference2_address1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference2_address1">                               
                                <input id="reference2_address2" name="reference2_address2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference2_address2">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="reference2_relation" class="block text-sm font-medium leading-5 text-gray-700">Hubungan Perujuk 2 Dengan Pemohon<span class="text-red-700">*</span></label>
                                <input id="reference2_relation" name="reference2_relation" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference2_relation">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="reference2_phone" class="block text-sm font-medium leading-5 text-gray-700">No Tel Perujuk 2<span class="text-red-700">*</span></label>
                                <input id="reference2_phone" name="reference2_phone" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="reference2_phone">
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

                            <div class="col-span-6 sm:col-span-2">
                                <label for="takaful_incident" class="block text-sm font-medium leading-5 text-gray-700">Takaful Kemalangan Peribadi Berkelompok<span class="text-red-700">*</span></label>
                                <select id="takaful_incident" name="takaful_incident" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="takaful_incident">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="skim_safety" class="block text-sm font-medium leading-5 text-gray-700">Skim Keselamatan Sosial Pekerjaan Sendiri PERKESO<span class="text-red-700">*</span></label>
                                <select id="skim_safety" name="skim_safety" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="skim_safety">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
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
                                <label for="will_registration" class="block text-sm font-medium leading-5 text-gray-700">Pendaftaran Wasiat<span class="text-red-700">*</span></label>
                                <select id="will_registration" name="will_registration" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="will_registration">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="will_comp_name" class="block text-sm font-medium leading-5 text-gray-700">Nama Syarikat<span class="text-red-700">*</span></label>
                                <select id="will_comp_name" name="will_comp_name" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="will_comp_name">
                                    <option value="">SILA PILIH</option>
                                    <option value="W001">MAAB</option>
                                    <option value="W002">AWARIS</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="will_fi" class="block text-sm font-medium leading-5 text-gray-700">Fi Wasiat<span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            RM
                                        </span>
                                    </div>
                                    <input id="will_fi" name="will_fi" value="200" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="will_fi">
                                </div>
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
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Kebenaran Penzahiran Maklumat Kredit Individu</h3>
                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-3">
                                <fieldset>
                                    <legend class="block text-sm font-medium leading-5 text-gray-700">Kebenaran Penzahiran Maklumat Kredit Individu<span class="text-red-700">*</span></legend>
                                    <div class="mt-3">
                                        <div class="flex items-center">
                                            <input id="auth_disc_info_flag" name="oku" value="1" type="radio" class="w-4 h-4 text-indigo-600 transition duration-150 ease-in-out form-radio" wire:model.live="auth_disc_info_flag">
                                            <label for="auth_disc_info_flag" class="ml-3" >
                                                <span class="block text-sm font-medium leading-5 text-gray-700">Ya</span>
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
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

                            <div class="col-span-6 sm:col-span-6">
                                <fieldset>
                                    <legend class="block text-sm font-medium leading-5 text-gray-700">Akuan Pemohon<span class="text-red-700">*</span></legend>
                                    <legend class="block text-sm font-medium leading-5 text-gray-700">Dengan ini saya mengesahkan semua maklumat yang diisi adalah benar.</legend>
                                    <div class="mt-3">
                                        <div class="flex items-center">
                                            <input id="appl_stmt_flag" name="oku" value="1" type="radio" class="w-4 h-4 text-indigo-600 transition duration-150 ease-in-out form-radio" wire:model.live="appl_stmt_flag">
                                            <label for="appl_stmt_flag" class="ml-3" >
                                                <span class="block text-sm font-medium leading-5 text-gray-700">Ya</span>
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
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
                                <label for="name_penamaan" class="block text-sm font-medium leading-5 text-gray-700">Nama<span class="text-red-700">*</span></label>
                                <input id="name_penamaan" name="name_penamaan" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="name_penamaan">                               
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="nationality_penamaan" class="block text-sm font-medium leading-5 text-gray-700">Warganegara Malaysia<span class="text-red-700">*</span></label>
                                <select id="nationality_penamaan" name="nationality_penamaan" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="nationality_penamaan">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="icno_penamaan" class="block text-sm font-medium leading-5 text-gray-700">No. Kad Pengenalan<span class="text-red-700">*</span></label>
                                <input id="icno_penamaan" name="icno_penamaan" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="icno_penamaan">                               
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="passportno_penamaan" class="block text-sm font-medium leading-5 text-gray-700">No. Passport<span class="text-red-700">*</span></label>
                                <input id="passportno_penamaan" name="passportno_penamaan" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="passportno_penamaan">                               
                            </div>

                            <div class="col-span-6">
                                <label for="penamaan_addr1" class="block text-sm font-medium leading-5 text-gray-700">Alamat<span class="text-red-700">*</span></label>
                                <input id="penamaan_addr1" name="penamaan_addr1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="penamaan_addr1">                               
                                <input id="penamaan_addr2" name="penamaan_addr2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="penamaan_addr2">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="penamaan_relationship" class="block text-sm font-medium leading-5 text-gray-700">Hubungan Dengan Pemohon<span class="text-red-700">*</span></label>
                                <input id="penamaan_relationship" name="penamaan_relationship" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="penamaan_relationship">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="penamaan_phone" class="block text-sm font-medium leading-5 text-gray-700">No. Telefon<span class="text-red-700">*</span></label>
                                <input id="penamaan_phone" name="penamaan_phone" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="penamaan_phone">
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
