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
                                <label for="buss_branch_tot" class="block text-sm font-medium leading-5 text-gray-700">Bilangan Cawangan<span class="text-red-700">*</span></label>
                                <select id="buss_branch_tot" name="buss_branch_tot" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss_branch_tot">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>

                            <div class="col-span-6 ">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="buss1_branch_loc" class="block text-sm font-medium leading-5 text-gray-700">Lokasi Cawangan 1<span class="text-red-700">*</span></label>
                                <select id="buss1_branch_loc" name="buss1_branch_loc" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="buss1_branch_loc">
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
                                    <option value="Lain-Lain">Lain-Lain</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="buss1_branch_status" class="block text-sm font-medium leading-5 text-gray-700">Status Cawangan 1<span class="text-red-700">*</span></label>
                                <select id="buss1_branch_status" name="buss1_branch_status" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="buss1_branch_status">
                                    <option value="">SILA PILIH</option>
                                    <option value="SENDIRI">SENDIRI</option>
                                    <option value="SEWA">SEWA</option>
                                    <option value="KELUARGA">KELUARGA</option>
                                    <option value="PERSATUAN">PERSATUAN</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="buss1_branch_tot_worker" class="block text-sm font-medium leading-5 text-gray-700">Bilangan Pekerja 1<span class="text-red-700">*</span></label>
                                <select id="buss1_branch_tot_worker" name="buss1_branch_tot_worker" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="buss1_branch_tot_worker">
                                    <option value="">SILA PILIH</option>
                                    <option value="TIADA">TIADA</option>
                                    <option value="1 - 3 Orang">1 - 3 Orang</option>
                                    <option value="4 - 6 Orang">4 - 6 Orang</option>
                                    <option value="7 - 10 Orang">7 - 10 Orang</option>
                                    <option value="> 10 Orang">> 10 Orang</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <x-time-picker
                                    id="buss1_hours_start"
                                    label="Masa Berniaga Dari"
                                    placeholder="12:00 AM"
                                    without-seconds
                                    wire:model="buss1_hours_start"
                                />
                             </div>

                             <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <x-time-picker
                                    id="buss1_hours_end"
                                    label="Masa Berniaga Hingga"
                                    placeholder="12:00 AM"
                                    without-seconds
                                    wire:model="buss1_hours_end"
                                />
                             </div>

                             <div class="col-span-6">
                                <label for="buss1_addr1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Cawangan 1<span class="text-red-700">*</span></label>
                                <input id="buss1_addr1" name="buss1_addr1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss1_addr1">                               
                                <input id="buss1_addr2" name="buss1_addr2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss1_addr2">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="buss1_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod 1<span class="text-red-700">*</span></label>
                                <input id="buss1_postcode" name="buss1_postcode" minlength="5" maxlength="5" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss1_postcode">
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="buss1_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar 1<span class="text-red-700">*</span></label>
                                <input id="buss1_city" name="buss1_city" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss1_city">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="buss1_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri 1<span class="text-red-700">*</span></label>
                                <select id="buss1_state" name="buss1_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss1_state">
                                    <option value="">SILA PILIH</option>
                                    @foreach ($negeriSelection as $negeris)
                                    <option value="{{ $negeris->kodnegeri }}">{{ $negeris->namanegeri}}</option>
                                    @endforeach 
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="buss1_phone" class="block text-sm font-medium leading-5 text-gray-700">No. Tel Cawangan 1<span class="text-red-700">*</span></label>
                                <input id="buss1_phone" name="buss1_phone" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss1_phone">
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="buss1_fax" class="block text-sm font-medium leading-5 text-gray-700">No. Faks Cawangan 1<span class="text-red-700">*</span></label>
                                <input id="buss1_fax" name="buss1_fax" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss1_fax">
                            </div>

                            <div class="col-span-6 ">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="buss2_branch_loc" class="block text-sm font-medium leading-5 text-gray-700">Lokasi Cawangan 2<span class="text-red-700">*</span></label>
                                <select id="buss2_branch_loc" name="buss2_branch_loc" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="buss2_branch_loc">
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
                                    <option value="Lain-Lain">Lain-Lain</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="buss2_branch_status" class="block text-sm font-medium leading-5 text-gray-700">Status Cawangan 2<span class="text-red-700">*</span></label>
                                <select id="buss2_branch_status" name="buss2_branch_status" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="buss2_branch_status">
                                    <option value="">SILA PILIH</option>
                                    <option value="SENDIRI">SENDIRI</option>
                                    <option value="SEWA">SEWA</option>
                                    <option value="KELUARGA">KELUARGA</option>
                                    <option value="PERSATUAN">PERSATUAN</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="buss2_branch_tot_worker" class="block text-sm font-medium leading-5 text-gray-700">Bilangan Pekerja 2<span class="text-red-700">*</span></label>
                                <select id="buss2_branch_tot_worker" name="buss2_branch_tot_worker" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="buss2_branch_tot_worker">
                                    <option value="">SILA PILIH</option>
                                    <option value="TIADA">TIADA</option>
                                    <option value="1 - 3 Orang">1 - 3 Orang</option>
                                    <option value="4 - 6 Orang">4 - 6 Orang</option>
                                    <option value="7 - 10 Orang">7 - 10 Orang</option>
                                    <option value="> 10 Orang">> 10 Orang</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <x-time-picker
                                    id="buss2_hours_start"
                                    label="Masa Berniaga Dari"
                                    placeholder="12:00 AM"
                                    without-seconds
                                    wire:model="buss2_hours_start"
                                />
                             </div>

                             <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <x-time-picker
                                    id="buss2_hours_end"
                                    label="Masa Berniaga Hingga"
                                    placeholder="12:00 AM"
                                    without-seconds
                                    wire:model="buss2_hours_end"
                                />
                             </div>

                             <div class="col-span-6">
                                <label for="buss2_addr1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Cawangan 2<span class="text-red-700">*</span></label>
                                <input id="buss2_addr1" name="buss2_addr1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss2_addr1">                               
                                <input id="buss2_addr2" name="buss2_addr2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss2_addr2">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="buss2_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod 2<span class="text-red-700">*</span></label>
                                <input id="buss2_postcode" name="buss2_postcode" minlength="5" maxlength="5" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss2_postcode">
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="buss2_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar 2<span class="text-red-700">*</span></label>
                                <input id="buss2_city" name="buss2_city" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss2_city">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="buss2_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri 2<span class="text-red-700">*</span></label>
                                <select id="buss2_state" name="buss2_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss2_state">
                                    <option value="">SILA PILIH</option>
                                    @foreach ($negeriSelection as $negeris)
                                    <option value="{{ $negeris->kodnegeri }}">{{ $negeris->namanegeri}}</option>
                                    @endforeach 
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="buss2_phone" class="block text-sm font-medium leading-5 text-gray-700">No. Tel Cawangan 2<span class="text-red-700">*</span></label>
                                <input id="buss2_phone" name="buss2_phone" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss2_phone">
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="buss2_fax" class="block text-sm font-medium leading-5 text-gray-700">No. Faks Cawangan 2<span class="text-red-700">*</span></label>
                                <input id="buss2_fax" name="buss2_fax" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss2_fax">
                            </div>


                            <div class="col-span-6 ">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="buss3_branch_loc" class="block text-sm font-medium leading-5 text-gray-700">Lokasi Cawangan 3<span class="text-red-700">*</span></label>
                                <select id="buss3_branch_loc" name="buss3_branch_loc" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="buss3_branch_loc">
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
                                    <option value="Lain-Lain">Lain-Lain</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="buss3_branch_status" class="block text-sm font-medium leading-5 text-gray-700">Status Cawangan 3<span class="text-red-700">*</span></label>
                                <select id="buss3_branch_status" name="buss3_branch_status" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="buss3_branch_status">
                                    <option value="">SILA PILIH</option>
                                    <option value="SENDIRI">SENDIRI</option>
                                    <option value="SEWA">SEWA</option>
                                    <option value="KELUARGA">KELUARGA</option>
                                    <option value="PERSATUAN">PERSATUAN</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="buss3_branch_tot_worker" class="block text-sm font-medium leading-5 text-gray-700">Bilangan Pekerja 2<span class="text-red-700">*</span></label>
                                <select id="buss3_branch_tot_worker" name="buss3_branch_tot_worker" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="buss3_branch_tot_worker">
                                    <option value="">SILA PILIH</option>
                                    <option value="TIADA">TIADA</option>
                                    <option value="1 - 3 Orang">1 - 3 Orang</option>
                                    <option value="4 - 6 Orang">4 - 6 Orang</option>
                                    <option value="7 - 10 Orang">7 - 10 Orang</option>
                                    <option value="> 10 Orang">> 10 Orang</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <x-time-picker
                                    id="buss3_hours_start"
                                    label="Masa Berniaga Dari"
                                    placeholder="12:00 AM"
                                    without-seconds
                                    wire:model="buss3_hours_start"
                                />
                             </div>

                             <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <x-time-picker
                                    id="buss3_hours_end"
                                    label="Masa Berniaga Hingga"
                                    placeholder="12:00 AM"
                                    without-seconds
                                    wire:model="buss3_hours_end"
                                />
                             </div>

                             <div class="col-span-6">
                                <label for="buss3_addr1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Cawangan 3<span class="text-red-700">*</span></label>
                                <input id="buss3_addr1" name="buss3_addr1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss3_addr1">                               
                                <input id="buss3_addr2" name="buss3_addr2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss3_addr2">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="buss3_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod 3<span class="text-red-700">*</span></label>
                                <input id="buss3_postcode" name="buss3_postcode" minlength="5" maxlength="5" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss3_postcode">
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="buss3_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar 3<span class="text-red-700">*</span></label>
                                <input id="buss3_city" name="buss3_city" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss3_city">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="buss3_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri 3<span class="text-red-700">*</span></label>
                                <select id="buss3_state" name="buss3_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss3_state">
                                    <option value="">SILA PILIH</option>
                                    @foreach ($negeriSelection as $negeris)
                                    <option value="{{ $negeris->kodnegeri }}">{{ $negeris->namanegeri}}</option>
                                    @endforeach 
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="buss3_phone" class="block text-sm font-medium leading-5 text-gray-700">No. Tel Cawangan 3<span class="text-red-700">*</span></label>
                                <input id="buss3_phone" name="buss3_phone" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss3_phone">
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="buss3_fax" class="block text-sm font-medium leading-5 text-gray-700">No. Faks Cawangan 3<span class="text-red-700">*</span></label>
                                <input id="buss3_fax" name="buss3_fax" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="buss3_fax">
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
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Maklumat Pembiayaan Perniagaan Sedia Ada</h3>
                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-6">
                                <label for="fin_details_flag" class="block text-sm font-medium leading-5 text-gray-700">MAKLUMAT PEMBIAYAAN PERNIAGAAN SEDIA ADA<span class="text-red-700">*</span></label>
                                <select id="fin_details_flag" name="fin_details_flag" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="fin_details_flag">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">ADA</option>
                                    <option value="0">TIADA</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <fieldset>
                                    <legend class="block text-sm font-medium leading-5 text-gray-700">Institusi Pembiayaan MARA<span class="text-red-700">*</span></legend>
                                    <div class="mt-3">
                                        <div class="flex items-center">
                                            <input id="fin_mara_flag" name="oku" value="1" type="radio" class="w-4 h-4 text-indigo-600 transition duration-150 ease-in-out form-radio" wire:model.live="fin_mara_flag">
                                            <label for="fin_mara_flag" class="ml-3" >
                                                <span class="block text-sm font-medium leading-5 text-gray-700">Ya</span>
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="mara_tot_fin" class="block text-sm font-medium leading-5 text-gray-700">Jumlah Pembiayaan MARA<span class="text-red-700">*</span></label>
                                <input id="mara_tot_fin" name="mara_tot_fin" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="mara_tot_fin">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="mara_bal_fin" class="block text-sm font-medium leading-5 text-gray-700">Baki Pembiayaan MARA<span class="text-red-700">*</span></label>
                                <input id="mara_bal_fin" name="mara_bal_fin" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="mara_bal_fin">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <fieldset>
                                    <legend class="block text-sm font-medium leading-5 text-gray-700">Institusi Pembiayaan AIM<span class="text-red-700">*</span></legend>
                                    <div class="mt-3">
                                        <div class="flex items-center">
                                            <input id="fin_aim_flag" name="fin_aim_flag" value="1" type="radio" class="w-4 h-4 text-indigo-600 transition duration-150 ease-in-out form-radio" wire:model.live="fin_aim_flag">
                                            <label for="fin_aim_flag" class="ml-3" >
                                                <span class="block text-sm font-medium leading-5 text-gray-700">Ya</span>
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="aim_tot_fin" class="block text-sm font-medium leading-5 text-gray-700">Jumlah Pembiayaan AIM<span class="text-red-700">*</span></label>
                                <input id="aim_tot_fin" name="aim_tot_fin" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="aim_tot_fin">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="aim_bal_fin" class="block text-sm font-medium leading-5 text-gray-700">Baki Pembiayaan AIM<span class="text-red-700">*</span></label>
                                <input id="aim_bal_fin" name="aim_bal_fin" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="aim_bal_fin">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="fin_others" class="block text-sm font-medium leading-5 text-gray-700">Institusi Pembiayaan LAIN-LAIN AGENSI KERAJAAN<span class="text-red-700">*</span></label>
                                <input id="fin_others" name="fin_others" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="fin_others">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="others_tot_fin" class="block text-sm font-medium leading-5 text-gray-700">Jumlah Pembiayaan LAIN-LAIN AGENSI KERAJAAN<span class="text-red-700">*</span></label>
                                <input id="others_tot_fin" name="others_tot_fin" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="others_tot_fin">
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="others_bal_fin" class="block text-sm font-medium leading-5 text-gray-700">Baki Pembiayaan LAIN-LAIN AGENSI KERAJAAN<span class="text-red-700">*</span></label>
                                <input id="others_bal_fin" name="others_bal_fin" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="others_bal_fin">
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
