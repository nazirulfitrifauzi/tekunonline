<div>
    <div class="">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Maklumat Pemberi Kontrak</h3>
                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-visible">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="bidder_name" class="block text-sm font-medium leading-5 text-gray-700">Nama Penawar Kontrak (Jabatan/Agensi)<span class="text-red-700">*</span></label>
                                <input id="bidder_name" name="bidder_name" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="bidder_name">                               
                                @error('bidder_name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="contract_no" class="block text-sm font-medium leading-5 text-gray-700">No. Kontrak<span class="text-red-700">*</span></label>
                                <input id="contract_no" name="contract_no" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="contract_no">                               
                            </div>

                            <div class="col-span-6">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="contract_duration" class="block text-sm font-medium leading-5 text-gray-700">Tempoh Kontrak(Bulan)<span class="text-red-700">*</span></label>
                                <input id="contract_duration" name="contract_duration" maxlength="2" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="contract_duration">                               
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="contract_duration" class="block text-sm font-medium leading-5 text-gray-700">Tarikh Mula Kontrak<span class="text-red-700">*</span></label>
                                <x-datetime-picker id="start_date_contract"
                                    placeholder="Tarikh Mula Kontrak" without-time wire:model="start_date_contract"
                                    class="w-full"/>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="contract_duration" class="block text-sm font-medium leading-5 text-gray-700">Tarikh Tamat Kontrak<span class="text-red-700">*</span></label>
                                <x-datetime-picker id="end_date_contract"
                                    placeholder="Tarikh Tamat Kontrak" without-time wire:model="end_date_contract"
                                    class="w-full"/>
                            </div>

                            <div class="col-span-6">
                                <label for="inden_description" class="block text-sm font-medium leading-5 text-gray-700">Keterangan Inden<span class="text-red-700">*</span></label>
                                <input id="inden_description" name="inden_description" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="inden_description">                               
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="contract_value" class="block text-sm font-medium leading-5 text-gray-700">Nilai Kontrak<span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            RM
                                        </span>
                                    </div>
                                    <input id="contract_value" name="contract_value" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="contract_value">
                                </div>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="max_value" class="block text-sm font-medium leading-5 text-gray-700">Nilai Maksima<span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            RM
                                        </span>
                                    </div>
                                    <input id="max_value" name="max_value" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="max_value">
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
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Keterangan Penawar Kontrak</h3>
                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-4">
                                <label for="penawar_kontrak_nama" class="block text-sm font-medium leading-5 text-gray-700">Nama Penawar Kontrak<span class="text-red-700">*</span></label>
                                <input id="penawar_kontrak_nama" name="penawar_kontrak_nama" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="penawar_kontrak_nama">                               
                            </div>

                            <div class="col-span-6">
                                <label for="penawar_kontrak_addr1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Penawar Kontrak<span class="text-red-700">*</span></label>
                                <input id="penawar_kontrak_addr1" name="penawar_kontrak_addr1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="penawar_kontrak_addr1">                               
                                <input id="penawar_kontrak_addr2" name="penawar_kontrak_addr2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="penawar_kontrak_addr2">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="penawar_kontrak_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod<span class="text-red-700">*</span></label>
                                <input id="penawar_kontrak_postcode" name="penawar_kontrak_postcode" minlength="5" maxlength="5" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="penawar_kontrak_postcode">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="penawar_kontrak_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar<span class="text-red-700">*</span></label>
                                <input id="penawar_kontrak_city" name="penawar_kontrak_city" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="penawar_kontrak_city">                               
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="penawar_kontrak_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri<span class="text-red-700">*</span></label>
                                <select id="penawar_kontrak_state" name="penawar_kontrak_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="penawar_kontrak_state">
                                    <option value="">SILA PILIH</option>
                                    @foreach ($negeriSelection as $negeris)
                                    <option value="{{ $negeris->namanegeri }}">{{ $negeris->namanegeri}}</option>
                                    @endforeach 
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="penawar_kontrak_phone" class="block text-sm font-medium leading-5 text-gray-700">No. Tel<span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            +6
                                        </span>
                                    </div>
                                    <input id="penawar_kontrak_phone" name="penawar_kontrak_phone" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="penawar_kontrak_phone">
                                </div>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="penawar_kontrak_fax" class="block text-sm font-medium leading-5 text-gray-700">No. Faks<span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            +6
                                        </span>
                                    </div>
                                    <input id="penawar_kontrak_fax" name="penawar_kontrak_fax" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="penawar_kontrak_fax">
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
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Maklumat Pembayar Kontrak</h3>
                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-4">
                                <label for="pembayar_kontrak_name" class="block text-sm font-medium leading-5 text-gray-700">Nama Pembayar Kontrak<span class="text-red-700">*</span></label>
                                <input id="pembayar_kontrak_name" name="pembayar_kontrak_name" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="pembayar_kontrak_name">                               
                            </div>

                            <div class="col-span-6">
                                <label for="pembayar_kontrak_addr1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Pembayar Kontrak<span class="text-red-700">*</span></label>
                                <input id="pembayar_kontrak_addr1" name="pembayar_kontrak_addr1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="pembayar_kontrak_addr1">                               
                                <input id="pembayar_kontrak_addr2" name="pembayar_kontrak_addr2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="pembayar_kontrak_addr2">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="pembayar_kontrak_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod<span class="text-red-700">*</span></label>
                                <input id="pembayar_kontrak_postcode" name="pembayar_kontrak_postcode" minlength="5" maxlength="5" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="pembayar_kontrak_postcode">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="pembayar_kontrak_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar<span class="text-red-700">*</span></label>
                                <input id="pembayar_kontrak_city" name="pembayar_kontrak_city" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="pembayar_kontrak_city">                               
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="pembayar_kontrak_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri<span class="text-red-700">*</span></label>
                                <select id="pembayar_kontrak_state" name="pembayar_kontrak_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="pembayar_kontrak_state">
                                    <option value="">SILA PILIH</option>
                                    @foreach ($negeriSelection as $negeris)
                                    <option value="{{ $negeris->namanegeri }}">{{ $negeris->namanegeri}}</option>
                                    @endforeach 
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="pembayar_kontrak_phone" class="block text-sm font-medium leading-5 text-gray-700">No. Tel<span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            +6
                                        </span>
                                    </div>
                                    <input id="pembayar_kontrak_phone" name="pembayar_kontrak_phone" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="pembayar_kontrak_phone">
                                </div>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="pembayar_kontrak_fax" class="block text-sm font-medium leading-5 text-gray-700">No. Faks<span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            +6
                                        </span>
                                    </div>
                                    <input id="pembayar_kontrak_fax" name="pembayar_kontrak_fax" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="pembayar_kontrak_fax">
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
