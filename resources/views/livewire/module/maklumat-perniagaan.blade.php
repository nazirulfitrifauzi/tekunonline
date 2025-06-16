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
                                <label for="business_syariah" class="block text-sm font-medium leading-5 text-gray-700">
                                    Perniagaan Patuh Syariah <span class="text-red-700">*</span>
                                </label>
                                <select id="business_syariah" 
                                        name="business_syariah" 
                                        class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" 
                                        wire:model.live="business_syariah" >
                                    <option value="">SILA PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
                                @error('business_syariah')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="license_type" class="block text-sm font-medium leading-5 text-gray-700">Jenis Lesen <span class="text-red-700">*</span></label>
                                <select id="license_type" name="license_type" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="license_type">
                                    <option value="">SILA PILIH</option>
                                    <option value="NO. SSM">NO. SSM</option>
                                    <option value="LESEN">LESEN</option>
                                    <option value="ORDINAN">ORDINAN</option>
                                    <option value="TIADA">TIADA</option>
                                </select>
                                @error('license_type')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            @if($license_type == 'NO. SSM')
                            <div class="col-span-6 sm:col-span-2">
                                <label for="business_no" class="block text-sm font-medium leading-5 text-gray-700">No. SSM <span class="text-red-700">*</span></label>
                                <input id="business_no" name="business_no" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase"   wire:model.live="business_no">
                                @error('business_no')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            @elseif($license_type == 'LESEN')
                            <div class="col-span-6 sm:col-span-2">
                                <label for="business_no" class="block text-sm font-medium leading-5 text-gray-700">No. Lesen <span class="text-red-700">*</span></label>
                                <input id="business_no" name="business_no" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase"   wire:model.live="business_no">
                                @error('business_no')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            @elseif($license_type == 'ORDINAN')
                            <div class="col-span-6 sm:col-span-2">
                                <label for="business_no" class="block text-sm font-medium leading-5 text-gray-700">No. Ordinan <span class="text-red-700">*</span></label>
                                <input id="business_no" name="business_no" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase"   wire:model.live="business_no">
                                @error('business_no')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            @endif

                            <div class="col-span-6 sm:col-span-2">
                                <label for="business_ownership" class="block text-sm font-medium leading-5 text-gray-700">Pemilikan Perniagaan <span class="text-red-700">*</span></label>
                                <select id="business_ownership" name="business_ownership" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="business_ownership">
                                    <option value="">SILA PILIH</option>
                                    <option value="2">INDIVIDU</option>
                                    <option value="3">PEMILIKAN TUNGGAL</option>
                                    <option value="4">PERKONGSIAN</option>
                                    <option value="5">SENDIRIAN BERHAD</option>
                                </select>
                                @error('business_ownership')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="shareholder" class="block text-sm font-medium leading-5 text-gray-700">
                                    Adakah Pemohon Pemegang Saham
                                    @if($business_ownership === '5')
                                        <span class="text-red-700">*</span>
                                    @endif
                                </label>
                                <select 
                                    id="shareholder" 
                                    name="shareholder" 
                                    class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 disabled:bg-gray-100 {{ $business_ownership != '5' ? 'bg-gray-100 cursor-not-allowed' : 'bg-white' }}"  
                                    wire:model.live="shareholder"
                                    @if($business_ownership != '5') disabled @endif
                                >
                                    <option value="">SILA PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
                                @error('shareholder')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="business_modal" class="block text-sm font-medium leading-5 text-gray-700">Modal Berbayar (Sendirian Berhad) <span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            RM
                                        </span>
                                    </div>
                                    <input 
                                        id="business_modal" 
                                        name="business_modal" 
                                        type="text"
                                        wire:model.defer="business_modal"
                                        x-data
                                        x-on:keyup="$el.value = $el.value.replace(/[^0-9]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ',')"
                                        class="block w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5 pl-12 pr-3 py-2 {{ $business_ownership != '5' ? 'bg-gray-100 cursor-not-allowed' : '' }}"
                                        @if($business_ownership != '5') disabled @endif
                                    >
                                </div>
                                @error('business_modal')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>


                            @if($license_type == 'NO. SSM')
                            <div class="col-span-6 sm:col-span-3">
                                <x-datetime-picker 
                                    label="Tarikh Didaftarkan" 
                                    id="register_date"
                                    placeholder="Tarikh Didaftarkan" 
                                    without-time 
                                    wire:model="register_date"
                                    display-format="DD/MM/YYYY"
                                />
                                {{-- @error('register_date')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror --}}
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <x-datetime-picker 
                                    label="Tarikh Tamat Lesen" 
                                    id="license_expired_date"
                                    placeholder="Tarikh Tamat Lesen" 
                                    without-time 
                                    wire:model="license_expired_date"
                                    display-format="DD/MM/YYYY"
                                    :disabled="$business_ownership == 5"
                                />
                                {{-- @error('license_expired_date')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror --}}
                            </div>
                            @endif

                            <div class="col-span-6 sm:col-span-6">
                                    <label for="business_name" class="block text-sm font-medium leading-5 text-gray-700">Nama Perniagaan / Syarikat <span class="text-red-700">*</span></label>
                                    <input id="business_name" name="business_name" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase"   wire:model="business_name">
                                    @error('business_name')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                            </div>

                        @if($business_syariah == '1')
                            <div class="col-span-6 sm:col-span-3">
                                <label for="business_sector" class="block text-sm font-medium leading-5 text-gray-700">Sektor Perniagaan <span class="text-red-700">*</span></label>
                                <select id="business_sector" name="business_sector" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_sector">
                                    <option value="">SILA PILIH</option>
                                    @foreach ($sektorSelection as $sektor)
                                        <option value="{{ $sektor->idPerniagaan }}">{{ $sektor->jenisPerniagaan }}</option>
                                    @endforeach
                                </select>
                                @error('business_sector')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="business_activity" class="block text-sm font-medium leading-5 text-gray-700">Aktiviti Perniagaan <span class="text-red-700">*</span></label>
                                <select id="business_activity" name="business_activity" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_activity">
                                    <option value="">SILA PILIH</option>
                                    @foreach ($aktivitiSelection as $aktivitis)
                                    <option value="{{ $aktivitis->idAktiviti }}">{{ $aktivitis->Aktiviti}}</option>
                                    @endforeach 
                                </select>
                                @error('business_activity')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            @if($business_activity == '100505' || $business_activity == '100506'|| $business_activity == '100507'
                            || $business_activity == '100508'|| $business_activity == '100509'|| $business_activity == '100500'
                            || $business_activity == '100501'|| $business_activity == '100502'|| $business_activity == '100503'|| $business_activity == '100504')
                            <div class="col-span-6 sm:col-span-6">
                                <label class="block text-sm font-medium leading-5 text-gray-700">Sub Aktiviti Perniagaan <span class="text-red-700">*</span></label>
                                <div class="mt-2 grid grid-cols-3 gap-4">
                                    @foreach ($subAktivitiSelection as $subAktivitis)
                                    <x-checkbox
                                        id="sub_business_activity_{{ $subAktivitis->idSubAktiviti }}"
                                        value="{{ $subAktivitis->idSubAktiviti }}"
                                        label="{{ $subAktivitis->sub_aktiviti }}"
                                        wire:model.live="selectedSubActivities"
                                    />
                                    @endforeach
                                </div>
                                @error('selectedSubActivities')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <!-- Hidden input to store comma-separated values -->
                                <input type="hidden" 
                                    wire:model="selectedSubActivitiesString" 
                                    value="{{ is_array($selectedSubActivities) ? implode(',', $selectedSubActivities) : '' }}"
                                >
                            </div>
                            @endif
                        @endif

                        @if($business_syariah == '0')
                            <div class="col-span-6 sm:col-span-3">
                                <label for="business_sector" class="block text-sm font-medium leading-5 text-gray-700">Sektor Perniagaan <span class="text-red-700">*</span></label>
                                <select id="business_sector" name="business_sector" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_sector">
                                    <option value="">SILA PILIH</option>
                                    <option value="26">PERTANIAN DAN PERUSAHAAN ASAS TANI</option>
                                    <option value="9">PERUNCITAN</option>
                                    <option value="3">PERHIDMATAN</option>
                                </select>
                                @error('business_sector')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="business_activity" class="block text-sm font-medium leading-5 text-gray-700">Aktiviti Perniagaan <span class="text-red-700">*</span></label>
                                <select id="business_activity" name="business_activity" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_activity">
                                    <option value="">SILA PILIH</option>
                                    @if($business_sector == '26')
                                        <option value="100511">PERNIAGAAN YANG MELIBATKAN KHINZIR</option>
                                    @elseif($business_sector == '9')
                                        <option value="100512">KEAGAMAAN / PERAYAAN SELAIN DARI ISLAM</option>
                                        <option value="100513">PERNIAGAAN YANG MELIBATKAN KHINZIR</option>                                       
                                    @elseif($business_sector == '3')
                                        <option value="100514">PERNIAGAAN YANG MELIBATKAN KHINZIR</option>                                       
                                        <option value="100515">PERNIAGAAN YANG MELIBATKAN ANJING</option>
                                        <option value="100516">SALUN UNISEX / SPA UNISEX / KEDAI GUNTING RAMBUT UNISEX</option>
                                        <option value="100517">PROSEDUR / RAWATAN ESTETIK</option>
                                        <option value="100518">KEAGAMAAN / PERAYAAN SELAIN DARI ISLAM</option>
                                    @endif
                                </select>
                                @error('business_activity')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            @endif

                            <div class="col-span-6 sm:col-span-2">
                                <label for="business_duration_year" class="block text-sm font-medium leading-5 text-gray-700">Tempoh / Pengalaman Berniaga(Tahun) <span class="text-red-700">*</span></label>
                                <select id="business_duration_year" name="business_duration_year" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"  wire:model.live="business_duration_year">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                </select>
                                @error('business_duration_year')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="business_duration_month" class="block text-sm font-medium leading-5 text-gray-700">Tempoh / Pengalaman Berniaga(Bulan) <span class="text-red-700">*</span></label>
                                <select id="business_duration_month" name="business_duration_month" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"  wire:model.live="business_duration_month">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                </select>
                                @error('business_duration_month')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6">
                                <label for="business_address1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Perniagaan / Premis / Projek <span class="text-red-700">*</span></label>
                                <input id="business_address1" name="business_address1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="business_address1">                               
                                <input id="business_address2" name="business_address2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="business_address2">
                                @error('business_address1')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="business_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod <span class="text-red-700">*</span></label>
                                <input id="business_postcode" name="business_postcode" minlength="5" maxlength="5" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="business_postcode">
                                @error('business_postcode')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="business_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar <span class="text-red-700">*</span></label>
                                <input id="business_city" name="business_city" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="business_city">
                                @error('business_city')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="business_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri <span class="text-red-700">*</span></label>
                                <select id="business_state" name="business_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="business_state">
                                    <option value="">SILA PILIH</option>
                                    @foreach ($negeriSelection as $negeris)
                                    <option value="{{ $negeris->kodnegeri }}">{{ $negeris->namanegeri}}</option>
                                    @endforeach 
                                </select>
                                @error('business_state')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="business_income" class="block text-sm font-medium leading-5 text-gray-700">Anggaran Pendapatan Kasar (Sebulan) <span class="text-red-700">*</span></label>
                                <select id="business_income" name="business_income" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"  wire:model="business_income">
                                    <option value="">SILA PILIH</option>
                                    <option value="< RM5,000">< RM5,000</option>
                                    <option value="RM5,000 - RM10,000">RM5,000 - RM10,000</option>
                                    <option value="> RM10,000 - RM50,000">> RM10,000 - RM50,000</option>
                                    <option value="> RM50,000">> RM50,000</option>
                                </select>
                                @error('business_income')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="business_phone" class="block text-sm font-medium leading-5 text-gray-700">No Tel Premis Perniagaan <span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            +6
                                        </span>
                                    </div>
                                    <input 
                                        id="business_phone" 
                                        type="text" 
                                        wire:model="business_phone"
                                        class="block px-3 py-2 pl-8 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                        minlength="10"
                                        maxlength="10"
                                    >
                                </div>    
                                @error('business_phone')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="business_phone_hp" class="block text-sm font-medium leading-5 text-gray-700">No. Tel Bimbit Perniagaan <span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            +6
                                        </span>
                                    </div>
                                    <input 
                                        id="business_phone_hp" 
                                        type="text" 
                                        wire:model.live="business_phone_hp"
                                        class="block w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5 pl-12 pr-3 py-2"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/^6/, '')"
                                        minlength="10"
                                        maxlength="11"
                                    >
                                </div>
                                @error('business_phone_hp')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="business_premise" class="block text-sm font-medium leading-5 text-gray-700">Status Premis / Projek <span class="text-red-700">*</span></label>
                                <select id="business_premise" name="business_premise" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="business_premise">
                                    <option value="">SILA PILIH</option>
                                    <option value="SENDIRI">SENDIRI</option>
                                    <option value="SEWA">SEWA</option>
                                    <option value="KELUARGA">KELUARGA</option>
                                    <option value="LAIN-LAIN (SILA NYATAKAN)">LAIN-LAIN (SILA NYATAKAN)</option>
                                </select>
                                @error('business_premise')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="business_other_premise" class="block text-sm font-medium leading-5 text-gray-700">Status Premis / Projek (Lain-lain) <span class="text-red-700">*</span></label>
                                <input 
                                    id="business_other_premise" 
                                    name="business_other_premise" 
                                    value="" 
                                    class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase {{ $business_premise != 'LAIN-LAIN (SILA NYATAKAN)' ? 'bg-gray-100' : ''  }}" 
                                    wire:model.live="business_other_premise"
                                    @if($business_premise != 'LAIN-LAIN (SILA NYATAKAN)') disabled @endif
                                >
                                @error('business_other_premise')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="premise_loc_code" class="block text-sm font-medium leading-5 text-gray-700">Lokasi Premis <span class="text-red-700">*</span></label>
                                <select id="premise_loc_code" name="premise_loc_code" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="premise_loc_code">
                                <option value="">SILA PILIH</option>
                                <option value="BENGKEL - BESI">BENGKEL - BESI</option>
                                <option value="BENGKEL - KAYU">Bengkel - Kayu</option>
                                <option value="BENGKEL - MEKANIK">BENGKEL - MEKANIK</option>
                                <option value="BERGERAK - KERETA MOTOR">BERGERAK - KERETA MOTOR</option>
                                <option value="BERGERAK - KERETA SORONG">BERGERAK - KERETA SORONG</option>
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
                                <option value="LAIN-LAIN (NYATAKAN)">LAIN-LAIN (NYATAKAN)</option>                                </select>
                                @error('premise_loc_code')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="buss_other_loc_premise" class="block text-sm font-medium leading-5 text-gray-700">
                                    Lokasi Premis (Lain-lain)
                                    @if($premise_loc_code === 'Lain-Lain (Nyatakan)')
                                        <span class="text-red-700">*</span>
                                    @endif
                                </label>
                                <input 
                                    id="buss_other_loc_premise" 
                                    name="buss_other_loc_premise" 
                                    value="" 
                                    class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase disabled:bg-gray-100 {{ $premise_loc_code != 'Lain-Lain (Nyatakan)' ? 'bg-gray-100 cursor-not-allowed' : 'bg-white' }}" 
                                    wire:model.live="buss_other_loc_premise"
                                    @if($premise_loc_code != 'Lain-Lain (Nyatakan)') disabled @endif
                                >
                                @error('buss_other_loc_premise')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="total_employees" class="block text-sm font-medium leading-5 text-gray-700">Bil Pekerja <span class="text-red-700">*</span></label>
                                <select id="total_employees" name="total_employees" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="total_employees">
                                    <option value="">SILA PILIH</option>
                                    <option value="<= 2 ORANG"><= 2 ORANG</option>
                                    <option value="3 - 5 ORANG">3 - 5 ORANG</option>
                                    <option value="6 - 7 ORANG">6 - 7 ORANG</option>
                                    <option value="> 7 ORANG">> 7 ORANG</option>
                                </select>
                                @error('total_employees')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>


                            <div class="col-span-6 sm:col-span-3">
                                <label for="membership_status" class="block text-sm font-medium leading-5 text-gray-700">Keahlian Persatuan <span class="text-red-700">*</span></label>
                                <select id="membership_status" name="membership_status" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="membership_status">
                                    <option value="">SILA PILIH</option>
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                </select>
                                @error('membership_status')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            @if($membership_status == 'YA')
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="membership_assoc" class="block text-sm font-medium leading-5 text-gray-700">Jenis Keahlian Persatuan <span class="text-red-700">*</span></label>
                                <select 
                                    id="membership_assoc" 
                                    name="membership_assoc" 
                                    class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 disabled:bg-gray-100 {{ $business_ownership != '5' ? 'bg-gray-100 cursor-not-allowed' : 'bg-white' }}"  
                                    wire:model.live="membership_assoc"
                                >
                                    <option value="">SILA PILIH</option>
                                    <option value="DEWAN PERNIAGAAN">DEWAN PERNIAGAAN</option>
                                    <option value="PERSATUAN PENJAJA / PENIAGA">PERSATUAN PENJAJA / PENIAGA</option>
                                </select>
                                @error('membership_assoc')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            @endif

                            <div class="col-span-6 sm:col-span-2">
                                <x-time-picker
                                    id="business_open"
                                    label="Masa Berniaga Dari"
                                    placeholder="12:00 AM"
                                    without-seconds
                                    wire:model="business_open"
                                />
                             </div>

                             <div class="col-span-6 sm:col-span-2">
                                <x-time-picker
                                    id="business_closed"
                                    label="Masa Berniaga Hingga"
                                    placeholder="12:00 AM"
                                    without-seconds
                                    wire:model="business_closed"
                                />
                             </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="cert_recognition_flag" class="block text-sm font-medium leading-5 text-gray-700">Pengiktirafan Sijil <span class="text-red-700">*</span></label>
                                <select id="cert_recognition_flag" name="cert_recognition_flag" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="cert_recognition_flag">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">YA</option>
                                    <option value="0">TIDAK</option>
                                </select>
                                @error('cert_recognition_flag')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            @if($cert_recognition_flag == '1')
                            <div class="col-span-6 grid grid-cols-3 gap-4">
                                <div>
                                    <label class="inline-flex items-center">
                                        <input 
                                            type="checkbox" 
                                            class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out"
                                            wire:model.live="cert_recognition_myipo_flag"
                                            value="1"
                                            {{ $cert_recognition_myipo_flag == '1' ? 'checked' : '' }}
                                        >
                                        <span class="ml-2">Pengiktirafan Sijil MyIPO</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="inline-flex items-center">
                                        <input 
                                            type="checkbox" 
                                            class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out"
                                            wire:model.live="cert_recognition_gmp_flag"
                                            value="1"
                                            {{ $cert_recognition_gmp_flag == '1' ? 'checked' : '' }}
                                        >
                                        <span class="ml-2">Pengiktirafan Sijil GMP</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="inline-flex items-center">
                                        <input 
                                            type="checkbox" 
                                            class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out"
                                            wire:model.live="cert_recognition_mesti_flag"
                                            value="1"
                                            {{ $cert_recognition_mesti_flag == '1' ? 'checked' : '' }}
                                        >
                                        <span class="ml-2">Pengiktirafan Sijil MeSTI</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="inline-flex items-center">
                                        <input 
                                            type="checkbox" 
                                            class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out"
                                            wire:model.live="cert_recognition_haccp_flag"
                                            value="1"
                                            {{ $cert_recognition_haccp_flag == '1' ? 'checked' : '' }}
                                        >
                                        <span class="ml-2">Pengiktirafan Sijil HACCP</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="inline-flex items-center">
                                        <input 
                                            type="checkbox" 
                                            class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out"
                                            wire:model.live="cert_recognition_halal_flag"
                                            value="1"
                                            {{ $cert_recognition_halal_flag == '1' ? 'checked' : '' }}
                                        >
                                        <span class="ml-2">Pengiktirafan Sijil HALAL</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="inline-flex items-center">
                                        <input 
                                            type="checkbox" 
                                            class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out"
                                            wire:model.live="cert_recognition_iso_flag"
                                            value="1"
                                            {{ $cert_recognition_iso_flag == '1' ? 'checked' : '' }}
                                        >
                                        <span class="ml-2">Pengiktirafan Sijil ISO</span>
                                    </label>
                                </div>
                            </div>

                            @error('cert_recognition_myipo_flag')
                                <div class="col-span-6">
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                </div>
                            @enderror
                            @endif
                            
                            <div class="col-span-6 sm:col-span-3">
                                <label for="business_asset_value" class="block text-sm font-medium leading-5 text-gray-700">Nilai Aset Perniagaan Sedia Ada <span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            RM
                                        </span>
                                    </div>
                                    <input 
                                        id="business_asset_value" 
                                        name="business_asset_value" 
                                        type="text"
                                        wire:model.defer="business_asset_value"
                                        x-data
                                        x-on:keyup="$el.value = $el.value.replace(/[^0-9]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ',')"
                                        class="block w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5 pl-12 pr-3 py-2"
                                    >
                                </div>
                                @error('business_asset_value')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="business_start_resources" class="block text-sm font-medium leading-5 text-gray-700">Modal Untuk Memulakan Perniagaan <span class="text-red-700">*</span></label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            RM
                                        </span>
                                    </div>
                                    <input 
                                        id="business_start_resources" 
                                        name="business_start_resources" 
                                        type="text"
                                        wire:model.defer="business_start_resources"
                                        x-data
                                        x-on:keyup="$el.value = $el.value.replace(/[^0-9]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ',')"
                                        class="block w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5 pl-12 pr-3 py-2"
                                    >
                                </div>
                                @error('business_start_resources')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="course_name_attend" class="block text-sm font-medium leading-5 text-gray-700">Nama Kursus</label>
                                <input 
                                    id="course_name_attend" 
                                    type="text" 
                                    wire:model.live="course_name_attend"
                                    class="block w-full mt-1 rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5 uppercase"
                                >
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="agency_name" class="block text-sm font-medium leading-5 text-gray-700">
                                    Nama Agensi Penganjur
                                </label>
                                <select 
                                    id="agency_name" 
                                    wire:model.live="agency_name"
                                    class="block w-full mt-1 rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select sm:text-sm sm:leading-5"
                                >
                                    <option value="">SILA PILIH</option>
                                    <option value="INSKEN">INSKEN</option>
                                    <option value="SME CORP">SME CORP</option>
                                    <option value="CEDAR">CEDAR</option>
                                    <option value="LAIN-LAIN">LAIN-LAIN</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="course_name_attend2" class="block text-sm font-medium leading-5 text-gray-700">Kursus-Kursus Lain Yang Dihadiri (Jika Ada)</label>
                                <input id="course_name_attend2" name="course_name_attend2" value="" placeholder="Kursus-Kursus Lain Yang Dihadiri 2" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="course_name_attend2">
                                <input id="course_name_attend3" name="course_name_attend3" value="" placeholder="Kursus-Kursus Lain Yang Dihadiri 3" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="course_name_attend3">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="previous_business" class="block text-sm font-medium leading-5 text-gray-700">Sila Nyatakan Perniagaan Terdahulu Sekiranya Bertukar Aktiviti Perniagaan</label>
                                <input id="previous_business" name="previous_business" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="previous_business">
                            </div>

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($business_ownership == '4' || $business_ownership == '5')
    <div class="hidden sm:block">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Maklumat Pemilik Syarikat / Rakan Kongsi</h3>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-6">
                                <label for="tot_partner" class="block text-sm font-medium leading-5 text-gray-700">Bilangan Rakan Kongsi <span class="text-red-700">*</span></label>
                                <select id="tot_partner" wire:model.live="tot_partner" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="">SILA PILIH</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                @error('tot_partner')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            @if($tot_partner >= 1)
                            <div class="col-span-6">
                            <h4 class="text-lg font-medium text-gray-900 mb-6">Maklumat Rakan Kongsi 1</h4>
                            @php
                                $disabled = $disabledPartnerFields ? 'disabled' : '';
                            @endphp
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-6">
                                    <label for="partner_name" class="block text-sm font-medium leading-5 text-gray-700">Nama <span class="text-red-700">*</span></label>
                                    <input id="partner_name" name="partner_name" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.lazy="partner_name" {{ $disabled }}>
                                    @error('partner_name')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="partner_ic" class="block text-sm font-medium leading-5 text-gray-700">No. Kad Pengenalan <span class="text-red-700">*</span></label>
                                    <input id="partner_ic" name="partner_ic" maxlength="12" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.lazy="partner_ic" {{ $disabled }}>
                                    @error('partner_ic')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="partner_address1" class="block text-sm font-medium leading-5 text-gray-700">Alamat <span class="text-red-700">*</span></label>
                                    <input id="partner_address1" name="partner_address1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.lazy="partner_address1" {{ $disabled }}>
                                    <input id="partner_address2" name="partner_address2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.lazy="partner_address2" {{ $disabled }}>
                                    @error('partner_address1')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod <span class="text-red-700">*</span></label>
                                    <input id="partner_postcode" name="partner_postcode" minlength="5" maxlength="5" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.lazy="partner_postcode">
                                    @error('partner_postcode')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar <span class="text-red-700">*</span></label>
                                    <input id="partner_city" name="partner_city" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.lazy="partner_city">
                                    @error('partner_city')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri <span class="text-red-700">*</span></label>
                                    <select id="partner_state" name="partner_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.lazy="partner_state">
                                        <option value="">SILA PILIH</option>
                                        @foreach ($negeriSelection as $negeris)
                                        <option value="{{ $negeris->kodnegeri }}">{{ $negeris->namanegeri}}</option>
                                        @endforeach 
                                    </select>
                                    @error('partner_state')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner_phone" class="block text-sm font-medium leading-5 text-gray-700">No Tel Rumah</label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                +6
                                            </span>
                                        </div>
                                        <input id="partner_phone" name="partner_phone" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase"   wire:model.lazy="partner_phone">
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner_phone_hp" class="block text-sm font-medium leading-5 text-gray-700">No Tel Bimbit <span class="text-red-700">*</span></label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                +6
                                            </span>
                                        </div>
                                        <input id="partner_phone_hp" name="partner_phone_hp" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase"   wire:model.lazy="partner_phone_hp">
                                    </div>
                                    @error('partner_phone_hp')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner_total_shares" class="block text-sm font-medium leading-5 text-gray-700">Jumlah Saham(%) <span class="text-red-700">*</span></label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <input id="partner_total_shares" name="partner_total_shares" maxlength="3" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="partner_total_shares">
                                    </div>
                                    @error('partner_total_shares')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner_roles" class="block text-sm font-medium leading-5 text-gray-700">Jawatan <span class="text-red-700">*</span></label>
                                    <select id="partner_roles" name="partner_roles" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="partner_roles">
                                        <option value="">SILA PILIH</option>
                                        <option value="1">RAKAN KONGSI</option>
                                        <option value="2">PENGARAH</option>
                                        <option value="3">RAKAN KONGSI & PENGARAH</option>
                                    </select>
                                    @error('partner_roles')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            </div>
                            @endif

                            @if($tot_partner >= 2)
                            <div class="col-span-6">
                            <h4 class="text-lg font-medium text-gray-900 mb-6">Maklumat Rakan Kongsi 2</h4>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-6">
                                    <label for="partner2_name" class="block text-sm font-medium leading-5 text-gray-700">Nama <span class="text-red-700">*</span></label>
                                    <input id="partner2_name" name="partner2_name" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="partner2_name">
                                    @error('partner2_name')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="partner2_ic" class="block text-sm font-medium leading-5 text-gray-700">No. Kad Pengenalan <span class="text-red-700">*</span></label>
                                    <input id="partner2_ic" name="partner2_ic" maxlength="12"  value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="partner2_ic">
                                    @error('partner2_ic')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="partner2_address1" class="block text-sm font-medium leading-5 text-gray-700">Alamat <span class="text-red-700">*</span></label>
                                    <input id="partner2_address1" name="partner2_address1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="partner2_address1">
                                    <input id="partner2_address2" name="partner2_address2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="partner2_address2">
                                    @error('partner2_address1')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner2_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod <span class="text-red-700">*</span></label>
                                    <input id="partner2_postcode" name="partner2_postcode" minlength="5" maxlength="5" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="partner2_postcode">
                                    @error('partner2_postcode')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner2_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar <span class="text-red-700">*</span></label>
                                    <input id="partner2_city" name="partner2_city" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="partner2_city">
                                    @error('partner2_city')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner2_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri <span class="text-red-700">*</span></label>
                                    <select id="partner2_state" name="partner2_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="partner2_state">
                                        <option value="">SILA PILIH</option>
                                        @foreach ($negeriSelection as $negeris)
                                        <option value="{{ $negeris->kodnegeri }}">{{ $negeris->namanegeri}}</option>
                                        @endforeach 
                                    </select>
                                    @error('partner2_state')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner2_phone" class="block text-sm font-medium leading-5 text-gray-700">No Tel Rumah</label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                +6
                                            </span>
                                        </div>
                                        <input id="partner2_phone" name="partner2_phone" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="partner2_phone">
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner2_phone_hp" class="block text-sm font-medium leading-5 text-gray-700">No Tel Bimbit <span class="text-red-700">*</span></label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                +6
                                            </span>
                                        </div>
                                        <input id="partner2_phone_hp" name="partner2_phone_hp" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="partner2_phone_hp">
                                    </div>
                                    @error('partner2_phone_hp')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner2_total_shares" class="block text-sm font-medium leading-5 text-gray-700">Jumlah Saham(%) <span class="text-red-700">*</span></label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <input id="partner2_total_shares" name="partner2_total_shares" maxlength="3" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="partner2_total_shares">
                                    </div>
                                    @error('partner2_total_shares')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner2_roles" class="block text-sm font-medium leading-5 text-gray-700">Jawatan <span class="text-red-700">*</span></label>
                                    <select id="partner2_roles" name="partner2_roles" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="partner2_roles">
                                        <option value="">SILA PILIH</option>
                                        <option value="1">RAKAN KONGSI</option>
                                        <option value="2">PENGARAH</option>
                                        <option value="3">RAKAN KONGSI & PENGARAH</option>
                                    </select>
                                    @error('partner2_roles')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            </div>
                            @endif

                            @if($tot_partner >= 3)
                            <div class="col-span-6">
                            <h4 class="text-lg font-medium text-gray-900 mb-6">Maklumat Rakan Kongsi 3</h4>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-6">
                                    <label for="partner3_name" class="block text-sm font-medium leading-5 text-gray-700">Nama<span class="text-red-700">*</span></label>
                                    <input id="partner3_name" name="partner3_name" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="partner3_name">
                                    @error('partner3_name')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="partner3_ic" class="block text-sm font-medium leading-5 text-gray-700">No. Kad Pengenalan <span class="text-red-700">*</span></label>
                                    <input id="partner3_ic" name="partner3_ic" maxlength="12"  value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="partner3_ic">
                                    @error('partner3_ic')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="partner3_address1" class="block text-sm font-medium leading-5 text-gray-700">Alamat <span class="text-red-700">*</span></label>
                                    <input id="partner3_address1" name="partner3_address1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="partner3_address1">
                                    <input id="partner3_address2" name="partner3_address2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="partner3_address2">
                                    @error('partner3_address1')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner3_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod <span class="text-red-700">*</span></label>
                                    <input id="partner3_postcode" name="partner3_postcode" minlength="5" maxlength="5" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="partner3_postcode">
                                    @error('partner3_postcode')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner3_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar <span class="text-red-700">*</span></label>
                                    <input id="partner3_city" name="partner3_city" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="partner3_city">
                                    @error('partner3_city')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner3_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri <span class="text-red-700">*</span></label>
                                    <select id="partner3_state" name="partner3_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="partner3_state">
                                        <option value="">SILA PILIH</option>
                                        @foreach ($negeriSelection as $negeris)
                                        <option value="{{ $negeris->kodnegeri }}">{{ $negeris->namanegeri}}</option>
                                        @endforeach 
                                    </select>
                                    @error('partner3_state')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner3_phone" class="block text-sm font-medium leading-5 text-gray-700">No Tel Rumah</label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                +6
                                            </span>
                                        </div>
                                        <input id="partner3_phone" name="partner3_phone" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="partner3_phone">
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner3_phone_hp" class="block text-sm font-medium leading-5 text-gray-700">No Tel Bimbit <span class="text-red-700">*</span></label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                +6
                                            </span>
                                        </div>
                                        <input id="partner3_phone_hp" name="partner3_phone_hp" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="partner3_phone_hp">
                                    </div>
                                    @error('partner3_phone_hp')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner3_total_shares" class="block text-sm font-medium leading-5 text-gray-700">Jumlah Saham(%) <span class="text-red-700">*</span></label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <input id="partner3_total_shares" name="partner3_total_shares" maxlength="3" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="partner3_total_shares">
                                    </div>
                                    @error('partner3_total_shares')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner3_roles" class="block text-sm font-medium leading-5 text-gray-700">Jawatan <span class="text-red-700">*</span></label>
                                    <select id="partner3_roles" name="partner3_roles" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="partner3_roles">
                                        <option value="">SILA PILIH</option>
                                        <option value="1">RAKAN KONGSI</option>
                                        <option value="2">PENGARAH</option>
                                        <option value="3">RAKAN KONGSI & PENGARAH</option>
                                    </select>
                                    @error('partner3_roles')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            </div>
                            @endif

                            @if($tot_partner >= 4)
                            <div class="col-span-6">
                            <h4 class="text-lg font-medium text-gray-900 mb-6">Maklumat Rakan Kongsi 4</h4>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-6">
                                    <label for="partner4_name" class="block text-sm font-medium leading-5 text-gray-700">Nama <span class="text-red-700">*</span></label>
                                    <input id="partner4_name" name="partner4_name" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="partner4_name">
                                    @error('partner4_name')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="partner4_ic" class="block text-sm font-medium leading-5 text-gray-700">No. Kad Pengenalan <span class="text-red-700">*</span></label>
                                    <input id="partner4_ic" name="partner4_ic" maxlength="12"  value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="partner4_ic">
                                    @error('partner4_ic')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="partner4_address1" class="block text-sm font-medium leading-5 text-gray-700">Alamat <span class="text-red-700">*</span></label>
                                    <input id="partner4_address1" name="partner4_address1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="partner4_address1">
                                    <input id="partner4_address2" name="partner4_address2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="partner4_address2">
                                    @error('partner4_address1')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner4_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod <span class="text-red-700">*</span></label>
                                    <input id="partner4_postcode" name="partner4_postcode" minlength="5" maxlength="5" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="partner4_postcode">
                                    @error('partner4_postcode')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner4_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar <span class="text-red-700">*</span></label>
                                    <input id="partner4_city" name="partner4_city" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="partner4_city">
                                    @error('partner4_city')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner4_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri <span class="text-red-700">*</span></label>
                                    <select id="partner4_state" name="partner4_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="partner4_state">
                                        <option value="">SILA PILIH</option>
                                        @foreach ($negeriSelection as $negeris)
                                        <option value="{{ $negeris->kodnegeri }}">{{ $negeris->namanegeri}}</option>
                                        @endforeach 
                                    </select>
                                    @error('partner4_state')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner4_phone" class="block text-sm font-medium leading-5 text-gray-700">No Tel Rumah</label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                +6
                                            </span>
                                        </div>
                                        <input id="partner4_phone" name="partner4_phone" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase"   wire:model.live="partner4_phone">
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner4_phone_hp" class="block text-sm font-medium leading-5 text-gray-700">No Tel Bimbit <span class="text-red-700">*</span></label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                +6
                                            </span>
                                        </div>
                                        <input id="partner4_phone_hp" name="partner4_phone_hp" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase"   wire:model.live="partner4_phone_hp">
                                    </div>
                                    @error('partner4_phone_hp')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner4_total_shares" class="block text-sm font-medium leading-5 text-gray-700">Jumlah Saham(%) <span class="text-red-700">*</span></label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <input id="partner4_total_shares" name="partner4_total_shares" maxlength="3" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="partner4_total_shares">
                                    </div>
                                    @error('partner4_total_shares')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner4_roles" class="block text-sm font-medium leading-5 text-gray-700">Jawatan <span class="text-red-700">*</span></label>
                                    <select id="partner4_roles" name="partner4_roles" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="partner4_roles">
                                        <option value="">SILA PILIH</option>
                                        <option value="1">RAKAN KONGSI</option>
                                        <option value="2">PENGARAH</option>
                                        <option value="3">RAKAN KONGSI & PENGARAH</option>
                                    </select>
                                    @error('partner4_roles')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            </div>
                            @endif

                            @if($tot_partner >= 5)
                            <div class="col-span-6">
                            <h4 class="text-lg font-medium text-gray-900 mb-6">Maklumat Rakan Kongsi 5</h4>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-6">
                                    <label for="partner5_name" class="block text-sm font-medium leading-5 text-gray-700">Nama <span class="text-red-700">*</span></label>
                                    <input id="partner5_name" name="partner5_name" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="partner5_name">
                                    @error('partner5_name')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="partner5_ic" class="block text-sm font-medium leading-5 text-gray-700">No. Kad Pengenalan <span class="text-red-700">*</span></label>
                                    <input id="partner5_ic" name="partner5_ic" maxlength="12"  value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="partner5_ic">
                                    @error('partner5_ic')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="partner5_address1" class="block text-sm font-medium leading-5 text-gray-700">Alamat <span class="text-red-700">*</span></label>
                                    <input id="partner5_address1" name="partner5_address1" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="partner5_address1">
                                    <input id="partner5_address2" name="partner5_address2" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="partner5_address2">
                                    @error('partner5_address1')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner5_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod <span class="text-red-700">*</span></label>
                                    <input id="partner5_postcode" name="partner5_postcode" minlength="5" maxlength="5" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="partner5_postcode">
                                    @error('partner5_postcode')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner5_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar <span class="text-red-700">*</span></label>
                                    <input id="partner5_city" name="partner5_city" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase" wire:model.live="partner5_city">
                                    @error('partner5_city')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner5_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri <span class="text-red-700">*</span></label>
                                    <select id="partner5_state" name="partner5_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="partner5_state">
                                        <option value="">SILA PILIH</option>
                                        @foreach ($negeriSelection as $negeris)
                                        <option value="{{ $negeris->kodnegeri }}">{{ $negeris->namanegeri}}</option>
                                        @endforeach 
                                    </select>
                                    @error('partner5_state')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner5_phone" class="block text-sm font-medium leading-5 text-gray-700">No Tel Rumah</label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                +6
                                            </span>
                                        </div>
                                        <input id="partner5_phone" name="partner5_phone" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase"   wire:model.live="partner5_phone">
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner5_phone_hp" class="block text-sm font-medium leading-5 text-gray-700">No Tel Bimbit <span class="text-red-700">*</span></label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                +6
                                            </span>
                                        </div>
                                        <input id="partner5_phone_hp" name="partner5_phone_hp" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 uppercase"   wire:model.live="partner5_phone_hp">
                                    </div>
                                    @error('partner5_phone_hp')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner5_total_shares" class="block text-sm font-medium leading-5 text-gray-700">Jumlah Saham(%) <span class="text-red-700">*</span></label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <input id="partner5_total_shares" name="partner5_total_shares" maxlength="3" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" wire:model.live="partner5_total_shares">
                                    </div>
                                    @error('partner5_total_shares')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror     
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="partner5_roles" class="block text-sm font-medium leading-5 text-gray-700">Jawatan <span class="text-red-700">*</span></label>
                                    <select id="partner5_roles" name="partner5_roles" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"   wire:model.live="partner5_roles">
                                        <option value="">SILA PILIH</option>
                                        <option value="1">RAKAN KONGSI</option>
                                        <option value="2">PENGARAH</option>
                                        <option value="3">RAKAN KONGSI & PENGARAH</option>
                                    </select>
                                    @error('partner5_roles')
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
    @endif
    <div class="flex justify-center mt-6">
        <span class="inline-flex rounded-md shadow-sm">
            <button 
                wire:click="submit" 
                class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white {{ ($business_ownership === '5' && $shareholder === '0') ? 'bg-gray-400 cursor-not-allowed' : 'bg-green-600 hover:bg-green-500 focus:border-green-700 focus:shadow-outline-green active:bg-green-700' }} rounded-md border border-transparent transition duration-150 ease-in-out focus:outline-none"
                {{ ($business_ownership === '5' && $shareholder === '0') ? 'disabled' : '' }}
            >
                Simpan
            </button>
        </span>
    </div>
    @if($business_ownership === '5' && $shareholder === '0')
    <div class="mt-4 text-center">
        <p class="text-red-500 font-medium">Permohonan tidak dapat diteruskan. Pemohon adalah wajib daripada pemegang saham syarikat.</p>
    </div>
    @endif
</div>
