<div>
    <div class="">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Bilangan Cawangan Perniagaan</h3>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-6">
                                <label for="buss_branch_tot" class="block text-sm font-medium leading-5 text-gray-700">Bilangan Cawangan <span class="text-red-700">*</span></label>
                                <select id="buss_branch_tot" wire:model.live="buss_branch_tot" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                                @error('buss_branch_tot')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Cawangan 1 -->
                            @if($buss_branch_tot >= 1)
                            <div class="col-span-6">
                                <h4 class="text-lg font-medium text-gray-900 mb-6">Maklumat Cawangan 1</h4>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-6">
                                        <label for="buss1_branch_loc" class="block text-sm font-medium leading-5 text-gray-700">Lokasi Cawangan 1 <span class="text-red-700">*</span></label>
                                        <select id="buss1_branch_loc" name="buss1_branch_loc" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="buss1_branch_loc">
                                            <option value="">SILA PILIH</option>
                                            <option value="BENGKEL - BESI">BENGKEL - BESI</option>
                                            <option value="BENGKEL - KAYU">Bengkel - Kayu</option>
                                            <option value="BENGKEL - MEKANIK">Bengkel - Mekanik</option>
                                            <option value="BERGERAK - KERETA MOTOR">BERGERAK - KERETA MOTOR</option>
                                            <option value="Bergerak - Kereta Sorong">BERGERAK - KERETA SORONG</option>
                                            <option value="BERGERAK - MOTOSIKAL">BERGERAK - MOTOSIKAL</option>
                                            <option value="DI RUMAH">DI RUMAH</option>
                                            <option value="GERAI - TETAP">GERAI - TETAP</option>
                                            <option value="LADANG">LADANG</option>
                                            <option value="LOT KEDAI - SEWA">LOT KEDAI - SEWA</option>
                                            <option value="LOT KEDAI - TETAP">LOT KEDAI - TETAP</option>
                                            <option value="PASAR MALAM">PASAR MALAM</option>
                                            <option value="PASAR MINGGU">PASAR MINGGU</option>
                                            <option value="PASAR TANI">PASAR TANI</option>
                                            <option value="PASAR TETAP">PASAR TETAP</option>
                                            <option value="PESISIR PANTAI">PESISIR PANTAI</option>
                                            <option value="LAIN-LAIN">LAIN-LAIN</option>                                         </select>
                                        @error('buss1_branch_loc')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="buss1_branch_status" class="block text-sm font-medium leading-5 text-gray-700">Status Cawangan 1 <span class="text-red-700">*</span></label>
                                        <select id="buss1_branch_status" name="buss1_branch_status" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="buss1_branch_status">
                                            <option value="">SILA PILIH</option>
                                            <option value="SENDIRI">SENDIRI</option>
                                            <option value="SEWA">SEWA</option>
                                            <option value="KELUARGA">KELUARGA</option>
                                            <option value="PERSATUAN">PERSATUAN</option>
                                        </select>
                                        @error('buss1_branch_status')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="buss1_branch_tot_worker" class="block text-sm font-medium leading-5 text-gray-700">Bilangan Pekerja 1 <span class="text-red-700">*</span></label>
                                        <select id="buss1_branch_tot_worker" name="buss1_branch_tot_worker" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="buss1_branch_tot_worker">
                                            <option value="">SILA PILIH</option>
                                            <option value="TIADA">TIADA</option>
                                            <option value="1 - 3 ORANG">1 - 3 ORANG</option>
                                            <option value="4 - 6 ORANG">4 - 6 ORANG</option>
                                            <option value="7 - 10 ORANG">7 - 10 ORANG</option>
                                            <option value="> 10 ORANG">> 10 ORANG</option>
                                        </select>
                                        @error('buss1_branch_tot_worker')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <x-time-picker
                                            id="buss1_hours_start"
                                            label="Masa Berniaga Dari"
                                            placeholder="12:00 AM"
                                            without-seconds
                                            wire:model="buss1_hours_start"
                                        />
                                     </div>

                                     <div class="col-span-6 sm:col-span-2">
                                        <x-time-picker
                                            id="buss1_hours_end"
                                            label="Masa Berniaga Hingga"
                                            placeholder="12:00 AM"
                                            without-seconds
                                            wire:model="buss1_hours_end"
                                        />
                                     </div>

                                     <div class="col-span-6">
                                        <label for="buss1_addr1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Cawangan 1 <span class="text-red-700">*</span></label>
                                        <input id="buss1_addr1" name="buss1_addr1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="buss1_addr1">
                                        <input id="buss1_addr2" name="buss1_addr2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="buss1_addr2">
                                        @error('buss1_addr1')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="buss1_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod 1 <span class="text-red-700">*</span></label>
                                        <input id="buss1_postcode" name="buss1_postcode" minlength="5" maxlength="5" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss1_postcode">
                                        @error('buss1_postcode')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="buss1_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar 1 <span class="text-red-700">*</span></label>
                                        <input id="buss1_city" name="buss1_city" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="buss1_city">
                                        @error('buss1_city')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="buss1_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri 1 <span class="text-red-700">*</span></label>
                                        <select id="buss1_state" name="buss1_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss1_state">
                                            <option value="">SILA PILIH</option>
                                            @foreach ($negeriSelection as $negeris)
                                            <option value="{{ $negeris->kodnegeri }}">{{ $negeris->namanegeri}}</option>
                                            @endforeach 
                                        </select>
                                        @error('buss1_state')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="buss1_phone" class="block text-sm font-medium leading-5 text-gray-700">No. Tel Cawangan 1 <span class="text-red-700">*</span></label>
                                        <div class="relative mt-1 rounded-md shadow-sm">
                                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                    +6
                                                </span>
                                            </div>
                                            <input id="buss1_phone" name="buss1_phone"  maxlength="11" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase"   wire:model.live="buss1_phone">
                                            @error('buss1_phone')
                                                <p class="text-red-500 text-xs italic mt-4">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="buss1_fax" class="block text-sm font-medium leading-5 text-gray-700">No. Faks Cawangan 1</label>
                                        <div class="relative mt-1 rounded-md shadow-sm">
                                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                    +6
                                                </span>
                                            </div>
                                            <input id="buss1_fax" name="buss1_fax" maxlength="10" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase"   wire:model.live="buss1_fax">
                                        </div>
                                        @error('buss1_fax')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endif

                            <!-- Cawangan 2 -->
                            @if($buss_branch_tot >= 2)
                            <div class="col-span-6">
                                <h4 class="text-lg font-medium text-gray-900 mb-6">Maklumat Cawangan 2</h4>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-6">
                                        <label for="buss2_branch_loc" class="block text-sm font-medium leading-5 text-gray-700">Lokasi Cawangan 2 <span class="text-red-700">*</span></label>
                                        <select id="buss2_branch_loc" name="buss2_branch_loc" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="buss2_branch_loc">
                                            <option value="">SILA PILIH</option>
                                            <option value="BENGKEL - BESI">BENGKEL - BESI</option>
                                            <option value="BENGKEL - KAYU">Bengkel - Kayu</option>
                                            <option value="BENGKEL - MEKANIK">Bengkel - Mekanik</option>
                                            <option value="BERGERAK - KERETA MOTOR">BERGERAK - KERETA MOTOR</option>
                                            <option value="Bergerak - Kereta Sorong">BERGERAK - KERETA SORONG</option>
                                            <option value="BERGERAK - MOTOSIKAL">BERGERAK - MOTOSIKAL</option>
                                            <option value="DI RUMAH">DI RUMAH</option>
                                            <option value="GERAI - TETAP">GERAI - TETAP</option>
                                            <option value="LADANG">LADANG</option>
                                            <option value="LOT KEDAI - SEWA">LOT KEDAI - SEWA</option>
                                            <option value="LOT KEDAI - TETAP">LOT KEDAI - TETAP</option>
                                            <option value="PASAR MALAM">PASAR MALAM</option>
                                            <option value="PASAR MINGGU">PASAR MINGGU</option>
                                            <option value="PASAR TANI">PASAR TANI</option>
                                            <option value="PASAR TETAP">PASAR TETAP</option>
                                            <option value="PESISIR PANTAI">PESISIR PANTAI</option>
                                            <option value="LAIN-LAIN">LAIN-LAIN</option>                                         </select>
                                        @error('buss2_branch_loc')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="buss2_branch_status" class="block text-sm font-medium leading-5 text-gray-700">Status Cawangan 2 <span class="text-red-700">*</span></label>
                                        <select id="buss2_branch_status" name="buss2_branch_status" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="buss2_branch_status">
                                            <option value="">SILA PILIH</option>
                                            <option value="SENDIRI">SENDIRI</option>
                                            <option value="SEWA">SEWA</option>
                                            <option value="KELUARGA">KELUARGA</option>
                                            <option value="PERSATUAN">PERSATUAN</option>
                                        </select>
                                        @error('buss2_branch_status')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="buss2_branch_tot_worker" class="block text-sm font-medium leading-5 text-gray-700">Bilangan Pekerja 2 <span class="text-red-700">*</span></label>
                                        <select id="buss2_branch_tot_worker" name="buss2_branch_tot_worker" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="buss2_branch_tot_worker">
                                            <option value="">SILA PILIH</option>
                                            <option value="TIADA">TIADA</option>
                                            <option value="1 - 3 ORANG">1 - 3 ORANG</option>
                                            <option value="4 - 6 ORANG">4 - 6 ORANG</option>
                                            <option value="7 - 10 ORANG">7 - 10 ORANG</option>
                                            <option value="> 10 ORANG">> 10 ORANG</option>
                                        </select>
                                        @error('buss2_branch_tot_worker')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <x-time-picker
                                            id="buss2_hours_start"
                                            label="Masa Berniaga Dari"
                                            placeholder="12:00 AM"
                                            without-seconds
                                            wire:model="buss2_hours_start"
                                        />
                                     </div>

                                     <div class="col-span-6 sm:col-span-2">
                                        <x-time-picker
                                            id="buss2_hours_end"
                                            label="Masa Berniaga Hingga"
                                            placeholder="12:00 AM"
                                            without-seconds
                                            wire:model="buss2_hours_end"
                                        />
                                     </div>

                                     <div class="col-span-6">
                                        <label for="buss2_addr1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Cawangan 2 <span class="text-red-700">*</span></label>
                                        <input id="buss2_addr1" name="buss2_addr1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="buss2_addr1">                               
                                        <input id="buss2_addr2" name="buss2_addr2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="buss2_addr2">
                                        @error('buss2_addr1')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="buss2_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod 2 <span class="text-red-700">*</span></label>
                                        <input id="buss2_postcode" name="buss2_postcode" minlength="5" maxlength="5" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss2_postcode">
                                        @error('buss2_postcode')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="buss2_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar 2 <span class="text-red-700">*</span></label>
                                        <input id="buss2_city" name="buss2_city" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="buss2_city">
                                        @error('buss2_city')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="buss2_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri 2 <span class="text-red-700">*</span></label>
                                        <select id="buss2_state" name="buss2_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss2_state">
                                            <option value="">SILA PILIH</option>
                                            @foreach ($negeriSelection as $negeris)
                                            <option value="{{ $negeris->kodnegeri }}">{{ $negeris->namanegeri}}</option>
                                            @endforeach 
                                        </select>
                                        @error('buss2_state')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="buss2_phone" class="block text-sm font-medium leading-5 text-gray-700">No. Tel Cawangan 2 <span class="text-red-700">*</span></label>
                                        <div class="relative mt-1 rounded-md shadow-sm">
                                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                    +6
                                                </span>
                                            </div>
                                            <input id="buss2_phone" name="buss2_phone" maxlength="11" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="buss2_phone">
                                        </div>
                                        @error('buss2_phone')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="buss2_fax" class="block text-sm font-medium leading-5 text-gray-700">No. Faks Cawangan 2</label>
                                        <div class="relative mt-1 rounded-md shadow-sm">
                                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                    +6
                                                </span>
                                            </div>
                                            <input id="buss2_fax" name="buss2_fax" maxlength="10" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="buss2_fax">
                                        </div>
                                        @error('buss2_fax')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endif

                            <!-- Cawangan 3 -->
                            @if($buss_branch_tot >= 3)
                            <div class="col-span-6">
                                <h4 class="text-lg font-medium text-gray-900 mb-6">Maklumat Cawangan 3</h4>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-6">
                                        <label for="buss3_branch_loc" class="block text-sm font-medium leading-5 text-gray-700">Lokasi Cawangan 3 <span class="text-red-700">*</span></label>
                                        <select id="buss3_branch_loc" name="buss3_branch_loc" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="buss3_branch_loc">
                                            <option value="">SILA PILIH</option>
                                            <option value="BENGKEL - BESI">BENGKEL - BESI</option>
                                            <option value="BENGKEL - KAYU">Bengkel - Kayu</option>
                                            <option value="BENGKEL - MEKANIK">Bengkel - Mekanik</option>
                                            <option value="BERGERAK - KERETA MOTOR">BERGERAK - KERETA MOTOR</option>
                                            <option value="Bergerak - Kereta Sorong">BERGERAK - KERETA SORONG</option>
                                            <option value="BERGERAK - MOTOSIKAL">BERGERAK - MOTOSIKAL</option>
                                            <option value="DI RUMAH">DI RUMAH</option>
                                            <option value="GERAI - TETAP">GERAI - TETAP</option>
                                            <option value="LADANG">LADANG</option>
                                            <option value="LOT KEDAI - SEWA">LOT KEDAI - SEWA</option>
                                            <option value="LOT KEDAI - TETAP">LOT KEDAI - TETAP</option>
                                            <option value="PASAR MALAM">PASAR MALAM</option>
                                            <option value="PASAR MINGGU">PASAR MINGGU</option>
                                            <option value="PASAR TANI">PASAR TANI</option>
                                            <option value="PASAR TETAP">PASAR TETAP</option>
                                            <option value="PESISIR PANTAI">PESISIR PANTAI</option>
                                            <option value="LAIN-LAIN">LAIN-LAIN</option>                                         </select>
                                        @error('buss3_branch_loc')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="buss3_branch_status" class="block text-sm font-medium leading-5 text-gray-700">Status Cawangan 3 <span class="text-red-700">*</span></label>
                                        <select id="buss3_branch_status" name="buss3_branch_status" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="buss3_branch_status">
                                            <option value="">SILA PILIH</option>
                                            <option value="SENDIRI">SENDIRI</option>
                                            <option value="SEWA">SEWA</option>
                                            <option value="KELUARGA">KELUARGA</option>
                                            <option value="PERSATUAN">PERSATUAN</option>
                                        </select>
                                        @error('buss3_branch_status')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="buss3_branch_tot_worker" class="block text-sm font-medium leading-5 text-gray-700">Bilangan Pekerja 3 <span class="text-red-700">*</span></label>
                                        <select id="buss3_branch_tot_worker" name="buss3_branch_tot_worker" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="buss3_branch_tot_worker">
                                            <option value="">SILA PILIH</option>
                                            <option value="TIADA">TIADA</option>
                                            <option value="1 - 3 ORANG">1 - 3 ORANG</option>
                                            <option value="4 - 6 ORANG">4 - 6 ORANG</option>
                                            <option value="7 - 10 ORANG">7 - 10 ORANG</option>
                                            <option value="> 10 ORANG">> 10 ORANG</option>
                                        </select>
                                        @error('buss3_branch_tot_worker')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <x-time-picker
                                            id="buss3_hours_start"
                                            label="Masa Berniaga Dari"
                                            placeholder="12:00 AM"
                                            without-seconds
                                            wire:model="buss3_hours_start"
                                        />
                                     </div>

                                     <div class="col-span-6 sm:col-span-2">
                                        <x-time-picker
                                            id="buss3_hours_end"
                                            label="Masa Berniaga Hingga"
                                            placeholder="12:00 AM"
                                            without-seconds
                                            wire:model="buss3_hours_end"
                                        />
                                     </div>

                                     <div class="col-span-6">
                                        <label for="buss3_addr1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Cawangan 3 <span class="text-red-700">*</span></label>
                                        <input id="buss3_addr1" name="buss3_addr1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="buss3_addr1">                               
                                        <input id="buss3_addr2" name="buss3_addr2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="buss3_addr2">
                                        @error('buss3_addr1')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="buss3_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod 3 <span class="text-red-700">*</span></label>
                                        <input id="buss3_postcode" name="buss3_postcode" minlength="5" maxlength="5" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="buss3_postcode">
                                        @error('buss3_postcode')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="buss3_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar 3 <span class="text-red-700">*</span></label>
                                        <input id="buss3_city" name="buss3_city" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="buss3_city">
                                        @error('buss3_city')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="buss3_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri 3 <span class="text-red-700">*</span></label>
                                        <select id="buss3_state" name="buss3_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss3_state">
                                            <option value="">SILA PILIH</option>
                                            @foreach ($negeriSelection as $negeris)
                                            <option value="{{ $negeris->kodnegeri }}">{{ $negeris->namanegeri}}</option>
                                            @endforeach 
                                        </select>
                                        @error('buss3_state')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="buss3_phone" class="block text-sm font-medium leading-5 text-gray-700">No. Tel Cawangan 3 <span class="text-red-700">*</span></label>
                                        <div class="relative mt-1 rounded-md shadow-sm">
                                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                    +6
                                                </span>
                                            </div>
                                            <input id="buss3_phone" name="buss3_phone" maxlength="11" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="buss3_phone">
                                        </div>
                                        @error('buss3_phone')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="buss3_fax" class="block text-sm font-medium leading-5 text-gray-700">No. Faks Cawangan 3</label>
                                        <div class="relative mt-1 rounded-md shadow-sm">
                                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                    +6
                                                </span>
                                            </div>
                                            <input id="buss3_fax" name="buss3_fax" maxlength="10" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="buss3_fax">
                                        </div>
                                        @error('buss3_fax')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
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

    <div class="">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Maklumat Pembiayaan Perniagaan Sedia Ada</h3>
                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-6">
                                <label for="fin_details_flag" class="block text-sm font-medium leading-5 text-gray-700">MAKLUMAT PEMBIAYAAN PERNIAGAAN SEDIA ADA <span class="text-red-700">*</span></label>
                                <select id="fin_details_flag" wire:model.live="fin_details_flag" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">ADA</option>
                                    <option value="0">TIADA</option>
                                </select>
                                @error('fin_details_flag')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- NNTI NAK BUAT DIA PUNYA DATA TYPE -->
                            @if($fin_details_flag == "1")
                                <div class="col-span-6 sm:col-span-3">
                                <label for="num_exist_busi_fin" class="block text-sm font-medium leading-5 text-gray-700">Bilangan Pembiayaan Perniagaan Sedia Ada</label>
                                    <select id="num_exist_busi_fin" wire:model.live="num_exist_busi_fin" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        <option value="">SILA PILIH</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    @error('num_exist_busi_fin')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                </div>


                                @if($num_exist_busi_fin >= "1")
                                <div class="col-span-6 sm:col-span-3">
                                <label for="fin1_flag" class="block text-sm font-medium leading-5 text-gray-700">Senarai Pembiayaan Sedia Ada 1</label>
                                    <select id="fin1_flag" wire:model.live="fin1_flag" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        <option value="">SILA PILIH</option>
                                        <option value="MARA">MARA</option>
                                        <option value="AIM">AIM</option>
                                        <option value="LAIN-LAIN">LAIN-LAIN</option>
                                    </select>
                                    @error('fin1_flag')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                    @if($fin1_flag == "LAIN-LAIN")
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="fin1_other_name" class="block text-sm font-medium leading-5 text-gray-700">Sila nyatakan Lain-lain Agensi 1</label>
                                        <input id="fin1_other_name" wire:model.live="fin1_other_name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm uppercase">
                                        @error('fin1_other_name')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    @endif

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="fin1_tot" class="block text-sm font-medium leading-5 text-gray-700">Jumlah Pembiayaan 1</label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                RM
                                            </span>
                                        </div>
                                        <input 
                                            id="fin1_tot" 
                                            name="fin1_tot" 
                                            type="text"
                                            wire:model.defer="fin1_tot"
                                            x-data
                                            x-on:keyup="$el.value = $el.value.replace(/[^0-9]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ',')"
                                            class="block w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5 pl-12 pr-3 py-2"
                                        >
                                        @error('fin1_tot')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="fin1_bal" class="block text-sm font-medium leading-5 text-gray-700">Baki Pembiayaan 1</label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                RM
                                            </span>
                                        </div>
                                        <input 
                                            id="fin1_bal" 
                                            name="fin1_bal" 
                                            type="text"
                                            wire:model.defer="fin1_bal"
                                            x-data
                                            x-on:keyup="$el.value = $el.value.replace(/[^0-9]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ',')"
                                            class="block w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5 pl-12 pr-3 py-2"
                                        >
                                        @error('fin1_bal')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>    
                                        @enderror
                                    </div>
                                </div>
                                @endif
                                
                                <div class="col-span-6 sm:col-span-6">
                                </div>

                                @if($num_exist_busi_fin >= "2")
                                <!-- AIM Section -->
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="fin2_flag" class="block text-sm font-medium leading-5 text-gray-700">Senarai Pembiayaan Sedia Ada 2</label>
                                        <select id="fin2_flag" wire:model.live="fin2_flag" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                            <option value="">SILA PILIH</option>
                                            <option value="MARA">MARA</option>
                                            <option value="AIM">AIM</option>
                                            <option value="LAIN-LAIN">LAIN-LAIN</option>
                                        </select>
                                        @error('fin2_flag')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                </div>

                                    @if($fin2_flag == "LAIN-LAIN")
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="fin2_other_name" class="block text-sm font-medium leading-5 text-gray-700">Sila nyatakan Lain-lain Agensi 2</label>
                                        <input id="fin2_other_name" wire:model.live="fin2_other_name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm uppercase">
                                        @error('fin2_other_name')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    @endif


                                <div class="col-span-6 sm:col-span-3">
                                    <label for="fin2_tot" class="block text-sm font-medium leading-5 text-gray-700">Jumlah Pembiayaan 2</label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                RM
                                            </span>
                                        </div>
                                        <input 
                                            id="fin2_tot" 
                                            name="fin2_tot" 
                                            type="text"
                                            wire:model.defer="fin2_tot"
                                            x-data
                                            x-on:keyup="$el.value = $el.value.replace(/[^0-9]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ',')"
                                            class="block w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5 pl-12 pr-3 py-2"
                                        >
                                        @error('fin2_tot')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="fin2_bal" class="block text-sm font-medium leading-5 text-gray-700">Baki Pembiayaan 2</label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                RM
                                            </span>
                                        </div>
                                        <input 
                                            id="fin2_bal" 
                                            name="fin2_bal" 
                                            type="text"
                                            wire:model.defer="fin2_bal"
                                            x-data
                                            x-on:keyup="$el.value = $el.value.replace(/[^0-9]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ',')"
                                            class="block w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5 pl-12 pr-3 py-2"
                                        >
                                        @error('fin2_bal')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                @endif

                                <div class="col-span-6 sm:col-span-6">
                                </div>

                                @if($num_exist_busi_fin >= "3")
                                <!-- Others Section -->
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="fin3_flag" class="block text-sm font-medium leading-5 text-gray-700">Senarai Pembiayaan Sedia Ada 3</label>
                                        <select id="fin3_flag" wire:model.live="fin3_flag" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                            <option value="">SILA PILIH</option>
                                            <option value="MARA">MARA</option>
                                            <option value="AIM">AIM</option>
                                            <option value="LAIN-LAIN">LAIN-LAIN</option>
                                        </select>
                                        @error('fin3_flag')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                </div>

                                    @if($fin3_flag == "LAIN-LAIN")
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="fin3_other_name" class="block text-sm font-medium leading-5 text-gray-700">Sila nyatakan Lain-lain Agensi 3</label>
                                        <input id="fin3_other_name" wire:model.live="fin3_other_name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm uppercase">
                                        @error('fin3_other_name')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    @endif

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="fin3_tot" class="block text-sm font-medium leading-5 text-gray-700">Jumlah Pembiayaan 3</label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                RM
                                            </span>
                                        </div>
                                        <input 
                                            id="fin3_tot" 
                                            name="fin3_tot" 
                                            type="text"
                                            wire:model.defer="fin3_tot"
                                            x-data
                                            x-on:keyup="$el.value = $el.value.replace(/[^0-9]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ',')"
                                            class="block w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5 pl-12 pr-3 py-2"
                                        >
                                        @error('fin3_tot')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="fin3_bal" class="block text-sm font-medium leading-5 text-gray-700">Baki Pembiayaan 3</label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                RM
                                            </span>
                                        </div>
                                        <input 
                                            id="fin3_bal" 
                                            name="fin3_bal" 
                                            type="text"
                                            wire:model.defer="fin3_bal"
                                            x-data
                                            x-on:keyup="$el.value = $el.value.replace(/[^0-9]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ',')"
                                            class="block w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5 pl-12 pr-3 py-2"
                                        >
                                        @error('fin3_bal')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                @endif
                            @endif
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
