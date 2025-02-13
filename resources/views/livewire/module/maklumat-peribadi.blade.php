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
                                <select id="tekun_state" name="tekun_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                    <option value="">Sila Pilih Negeri</option>
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
                                    <option value="WP" selected="">WP KUALA LUMPUR</option>
                            </select>
                    </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="tekun_branch" class="block text-sm font-medium leading-5 text-gray-700">Cawangan Berhampiran
                                    dengan Lokasi Perniagaan <span class="text-red-700">*</span></label>
                                <select id="tekun_branch" name="tekun_branch" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                    <option value="">Sila Pilih Cawangan</option>
                                                                                <option value="1431      ">BANDAR TUN RAZAK</option>
                                                                                <option value="1411      ">BUKIT BINTANG</option>
                                                                                <option value="1404      ">SEPUTEH</option>
                                                                                <option value="1434      ">TITIWANGSA</option>
                                                                                <option value="1433      " selected="">WANGSA MAJU</option>
                                                                        </select>

                                                                </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="business_status" class="block text-sm font-medium leading-5 text-gray-700">Status Perniagaan
                                    <span class="text-red-700">*</span></label>
                                <select id="business_status" name="business_status" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                    <option value="">Sila Pilih Status Perniagaan</option>
                                    <option value="Sedang Berniaga">Sedang Berniaga</option>
                                    <option value="Memulakan Perniagaan" selected=""> Memulakan Perniagaan </option>
                                </select>
                                                                </div>

                            <div class="col-span-6 sm:col-span-3">
                                <fieldset>
                                    <legend class="block text-sm font-medium leading-5 text-gray-700">Usahawan TEKUN
                                        <span class="text-red-700">*</span></legend>
                                    
                                    <div class="mt-4">
                                        <div class="flex items-center">
                                            <input id="business_type_yes" name="business_type" value="1" type="radio" checked="" class="w-4 h-4 text-indigo-600 transition duration-150 ease-in-out form-radio">
                                            <label for="business_type_yes" class="ml-3">
                                                <span class="block text-sm font-medium leading-5 text-gray-700">Ya</span>
                                            </label>

                                            <input id="business_type_no" name="business_type" value="0" type="radio" class="ml-8 w-4 h-4 text-indigo-600 transition duration-150 ease-in-out form-radio">
                                            <label for="business_type_no" class="ml-3">
                                                <span class="block text-sm font-medium leading-5 text-gray-700">Tidak</span>
                                            </label>
                                        </div>
                                                                                </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="bank1" class="block text-sm font-medium leading-5 text-gray-700">Nama
                                    Bank <span class="text-red-700">*</span></label>
                                <select id="bank1" name="bank1" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                    <option value="">Sila Pilih Nama Bank</option>
                                                                                <option value="99">AFFIN BANK BERHAD </option>
                                                                                <option value="28">AFFIN ISLAMIC BANK BERHAD</option>
                                                                                <option value="20">AL-RAJHI BANKING &amp; INVESTMENT CORP </option>
                                                                                <option value="84">ALLIANCE BANK M`SIA BHD</option>
                                                                                <option value="29">ALLIANCE ISLAMIC BANK BERHAD</option>
                                                                                <option value="32">AMBANK BERHAD </option>
                                                                                <option value="16">AMISLAMIC BANK BERHAD</option>
                                                                                <option value="38">BANGKOK BANK BERHAD</option>
                                                                                <option value="36">BANK ISLAM MALAYSIA BHD</option>
                                                                                <option value="39">BANK KERJASAMA RAKYAT</option>
                                                                                <option value="40">BANK MUAMALAT (M) BHD</option>
                                                                                <option value="41">BANK NEGARA MALAYSIA</option>
                                                                                <option value="120">Bank Pembangunan Malaysia</option>
                                                                                <option value="45">BANK PERTANIAN (M) BHD</option>
                                                                                <option value="121">Bank Pertanian Malaysia Berhad</option>
                                                                                <option value="1" selected="">BSN </option>
                                                                                <option value="34">CIMB BANK BERHAD</option>
                                                                                <option value="58">CIMB ISLAMIC BANK BHD</option>
                                                                                <option value="55">CITIBANK BERHAD</option>
                                                                                <option value="61">EON BANK BERHAD </option>
                                                                                <option value="62">EON FINANCE BERHAD </option>
                                                                                <option value="60">EONCAP ISLAMIC BANK BHD</option>
                                                                                <option value="66">HONG LEONG BANK BHD</option>
                                                                                <option value="67">HONG LEONG ISLAMIC BANK BHD</option>
                                                                                <option value="68">HSBC AMANAH MALAYSIA BERHAD</option>
                                                                                <option value="64">HSBC BANK MALAYSIA BHD</option>
                                                                                <option value="65">Hwang-DBS Investment Bank Berhad </option>
                                                                                <option value="73">KUWAIT FINANCE HOUSE </option>
                                                                                <option value="81">MALAYAN BANKING BERHAD</option>
                                                                                <option value="123">MBSB Bank Berhad</option>
                                                                                <option value="91">OCBC BANK (M`SIA) BHD</option>
                                                                                <option value="97">PUBLIC BANK BHD</option>
                                                                                <option value="100">PUBLIC ISLAMIC BANK BHD</option>
                                                                                <option value="102">RHB BANK BERHAD </option>
                                                                                <option value="101">RHB BANK BERHAD-ISLAMIC </option>
                                                                                <option value="111">SOUTHERN BANK BERHAD</option>
                                                                                <option value="98">SOUTHERN INVESTMENT BANK BHD</option>
                                                                                <option value="105">STANDARD CHARTERED BANK</option>
                                                                                <option value="106">STANDARD CHARTERED SAADIQ BHD </option>
                                                                                <option value="114">UNITED OVERSEAS BANK (M`SIA) BHD</option>
                                                                        </select>
                                                                </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="bank1_acct" class="block text-sm font-medium leading-5 text-gray-700">No
                                    Akaun Bank <span class="text-red-700">*</span></label>
                                <input id="bank1_acct" name="bank1_acct" value="164829055225" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
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
                        <div class="mt-1">
                            <label for="profile_pic" class="block text-sm font-medium leading-5 text-gray-700">Gambar Passport<span class="text-red-700">*</span></label>

                                                            <div class="px-6 pt-5 pb-6 mt-2 rounded-md border-2 border-gray-300 border-dashed" x-data="{ open: false }">
                                <div class="w-full">
                                    
                                    <img src="https://cscabs.net.my/tbrs/storage/910418065155/910418065155_gambar.png" class="h-40">
                                </div>
                                <div class="w-full">
                                    <span class="inline-flex mt-3 rounded-md shadow-sm">
                                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white bg-red-600 rounded-md border border-transparent transition duration-150 ease-in-out cursor-pointer hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700" @click.prevent="open = true">
                                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd">
                                            </path></svg>
                                            Padam Gambar
                                        </button>
                                    </span>
                                </div>

                                
                                <div class="fixed inset-x-0 bottom-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center" x-show="open" style="display: none;">
                                    <div class="fixed inset-0 transition-opacity" x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start=" opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" style="display: none;">
                                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                    </div>

                                    <div class="overflow-hidden px-4 pt-5 pb-4 bg-white rounded-lg shadow-xl transition-all transform sm:max-w-lg sm:w-full sm:p-6" x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start=" opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" style="display: none;">
                                        <div class="sm:flex sm:items-start">
                                            <div class="flex flex-shrink-0 justify-center items-center mx-auto w-12 h-12 bg-red-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                                <svg class="w-6 h-6 text-red-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                                </svg>
                                            </div>
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-lg font-medium leading-6 text-gray-900">
                                                    Padam Gambar!
                                                </h3>
                                                <div class="mt-2">
                                                    <p class="text-sm leading-5 text-gray-500">
                                                        Adakah anda pasti untuk memadam gambar ini?
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                                <button type="button" class="inline-flex justify-center px-4 py-2 w-full text-base font-medium leading-6 text-white bg-red-600 rounded-md border border-transparent shadow-sm transition duration-150 ease-in-out hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red sm:text-sm sm:leading-5" onclick="event.preventDefault();deleteGambar(1)">
                                                    Padam!
                                                </button>
                                            </span>
                                            <span class="flex mt-3 w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                                <button type="button" class="inline-flex justify-center px-4 py-2 w-full text-base font-medium leading-6 text-gray-700 bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline sm:text-sm sm:leading-5" @click="open = false">
                                                    Batal
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                                                        </div>

                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-6">
                                <label for="name" class="block text-sm font-medium leading-5 text-gray-700">Nama
                                    Pemohon <span class="text-red-700">*</span></label>
                                <input id="name" name="name" value="NAZIRUL FITRI FAUZI" readonly="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="ic_no" class="block text-sm font-medium leading-5 text-gray-700">No. KP
                                    (Baru) <span class="text-red-700">*</span></label>
                                <input id="ic_no" name="ic_no" value="910418065155" readonly="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="ic_old" class="block text-sm font-medium leading-5 text-gray-700">No. KP
                                    (Lama)</label>
                                <input id="ic_old" name="ic_old" value="1234321321" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-3">
                                <fieldset>
                                    <legend class="block text-sm font-medium leading-5 text-gray-700">Jantina <span class="text-red-700">*</span></legend>
                                    
                                    <div class="mt-3">
                                        <div class="flex items-center">
                                            <input id="genderL" name="gender" value="Lelaki" type="radio" readonly="" checked="" class="w-4 h-4 text-indigo-600 transition duration-150 ease-in-out form-radio">
                                            <label for="genderL" class="ml-3">
                                                <span class="block text-sm font-medium leading-5 text-gray-700">Lelaki</span>
                                            </label>
                                            <input id="genderF" name="gender" value="Perempuan" type="radio" readonly="" class="ml-8 w-4 h-4 text-indigo-600 transition duration-150 ease-in-out form-radio">
                                            <label for="genderF" class="ml-3">
                                                <span class="block text-sm font-medium leading-5 text-gray-700">Perempuan</span>
                                            </label>
                                        </div>
                                                                                </div>
                                </fieldset>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="religion" class="block text-sm font-medium leading-5 text-gray-700">Agama <span class="text-red-700">*</span></label>
                                <select id="religion" name="religion" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                    <option value="">Sila Pilih Agama</option>
                                    <option value="Islam">Islam
                                    </option>
                                    <option value="Hindu">Hindu
                                    </option>
                                    <option value="Buddha">Buddha
                                    </option>
                                    <option value="Kristian">
                                        Kristian</option>
                                    <option value="Lain" selected="">Lain-lain</option>
                                </select>
                                                                </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-2">
                                <label for="birthdate" class="block text-sm font-medium leading-5 text-gray-700">Tarikh Lahir <span class="text-red-700">*</span></label>
                                <input id="birthdate" name="birthdate" value="18/04/1991" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="race" class="block text-sm font-medium leading-5 text-gray-700">Bangsa/Kaum <span class="text-red-700">*</span></label>
                                <select id="race" name="race" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                    <option value="">Sila Pilih Bangsa/Kaum</option>
                                    <option value="Melayu">Melayu
                                    </option>
                                    <option value="Cina">Cina</option>
                                    <option value="India">India</option>
                                    <option value="Iban" selected="">Iban</option>
                                    <option value="Kadazan">Kadazan
                                    </option>
                                    <option value="Bumiputra">
                                        Bumiputra</option>
                                    <option value="Siam">Siam</option>
                                </select>
                                                                </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="age" class="block text-sm font-medium leading-5 text-gray-700">Umur
                                    <span class="text-red-700">*</span></label>
                                <input id="age" name="age" value="34" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="marital" class="block text-sm font-medium leading-5 text-gray-700">Taraf
                                    Perkahwinan <span class="text-red-700">*</span></label>
                                <select id="marital" name="marital" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                    <option value="">Sila Pilih Taraf Perkahwinan</option>
                                    <option value="Bujang">Bujang
                                    </option>
                                    <option value="Berkahwin">
                                        Berkahwin</option>
                                    <option value="Duda" selected="">Duda
                                    </option>
                                    <option value="Janda">Janda
                                    </option>
                                    <option value="Ibu Tunggal">Ibu Tunggal
                                    </option>
                                </select>
                                                                </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="dependent" class="block text-sm font-medium leading-5 text-gray-700">Bilangan Tanggungan
                                    <span class="text-red-700">*</span></label>
                                <input id="dependent" name="dependent" type="number" min="0" value="3" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6 sm:col-span-2">
                                <fieldset>
                                    <legend class="block text-sm font-medium leading-5 text-gray-700">Orang Kelainan
                                        Upaya <span class="text-red-700">*</span></legend>
                                    
                                    <div class="mt-3">
                                        <div class="flex items-center">
                                            <input id="oku_yes" name="oku" value="Ya" type="radio" class="w-4 h-4 text-indigo-600 transition duration-150 ease-in-out form-radio">
                                            <label for="oku_yes" class="ml-3">
                                                <span class="block text-sm font-medium leading-5 text-gray-700">Ya</span>
                                            </label>
                                            <input id="oku_no" name="oku" value="Tidak" type="radio" checked="" class="ml-8 w-4 h-4 text-indigo-600 transition duration-150 ease-in-out form-radio">
                                            <label for="oku_no" class="ml-3">
                                                <span class="block text-sm font-medium leading-5 text-gray-700">Tidak</span>
                                            </label>
                                        </div>
                                                                                </div>
                                </fieldset>
                            </div>

                            <div class="col-span-6">
                                <label for="address1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Kediaman <span class="text-red-700">*</span></label>
                                <input id="address1" name="address1" value="NO 11, Jalan 9/6, Taman IKS, Seksyen 10," class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                
                                <input id="address2" name="address2" value="taman seri" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod <span class="text-red-700">*</span></label>
                                <input id="postcode" name="postcode" minlength="5" maxlength="5" value="43600" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="city" class="block text-sm font-medium leading-5 text-gray-700">Bandar
                                    <span class="text-red-700">*</span></label>
                                <input id="city" name="city" value="Bangi" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="state" class="block text-sm font-medium leading-5 text-gray-700">Negeri
                                    <span class="text-red-700">*</span></label>
                                <select id="state" name="state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
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
                                                                            <option value="SW" selected="">SARAWAK</option>
                                                                            <option value="SE">SELANGOR</option>
                                                                            <option value="TG">TERENGGANU</option>
                                                                            <option value="WP">WP KUALA LUMPUR</option>
                                                                        </select>
                                                                </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="phone_home" class="block text-sm font-medium leading-5 text-gray-700">No
                                    Telefon (Rumah)</label>
                                <input id="phone_home" name="phone_home" value="123456676" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="phone_hp" class="block text-sm font-medium leading-5 text-gray-700">No
                                    Telefon (HP) - cth (0123456789) <span class="text-red-700">*</span></label>
                                <input id="phone_hp" name="phone_hp" value="0147852365" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="education" class="block text-sm font-medium leading-5 text-gray-700">Taraf Pendidikan <span class="text-red-700">*</span></label>
                                <select id="education" name="education" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                    <option value="">Sila Pilih Taraf Pendidikan</option>
                                    <option value="PMR/Setaraf">PMR/Setaraf</option>
                                    <option value="SPM/Setaraf">SPM/Setaraf</option>
                                    <option value="STPM/Setaraf">STPM/Setaraf</option>
                                    <option value="Sijil">Sijil</option>
                                    <option value="Diploma" selected="">Diploma</option>
                                    <option value="Ijazah">Ijazah</option>
                                </select>
                                                                </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6 mt-6">
                            <div class="col-span-6 sm:col-span-2">
                                <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Emel
                                    <span class="text-red-700">*</span></label>
                                <input id="email" name="email" value="xxx@csc.net.my" readonly="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="facebook" class="block text-sm font-medium leading-5 text-gray-700">Facebook</label>
                                <input id="facebook" name="facebook" value="facebook" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="instagram" class="block text-sm font-medium leading-5 text-gray-700">Instagram</label>
                                <input id="instagram" name="instagram" value="instagram" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="profession" class="block text-sm font-medium leading-5 text-gray-700">Perkerjaan Sekarang
                                    <span class="text-red-700">*</span></label>
                                <input id="profession" name="profession" value="Baker" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
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
                                    <input id="income" name="income" min="0" value="4200.00" type="number" step="0.01" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                </div>
                                                                </div>

                            <div class="col-span-6 sm:col-span-2">
                                <label for="employer_phone" class="block text-sm font-medium leading-5 text-gray-700">No
                                    Telefon Majikan</label>
                                <input id="employer_phone" name="employer_phone" value="0123456987" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6">
                                <label for="employer_name" class="block text-sm font-medium leading-5 text-gray-700">Nama Majikan</label>
                                <input id="employer_name" name="employer_name" value="IRFAN" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6">
                                <label for="employer_address1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Majikan</label>
                                <input id="employer_address1" name="employer_address1" value="NO 17, JALAN BM 2/8" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                
                                <input id="employer_address2" name="employer_address2" value="TAMAN IKS" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="employer_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod</label>
                                <input id="employer_postcode" name="employer_postcode" maxlength="5" value="43565" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="employer_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar</label>
                                <input id="employer_city" name="employer_city" value="BANGI" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="employer_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri</label>
                                <select id="employer_state" name="employer_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
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
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Maklumat Pasangan Pemohon/Waris</h3>
                    
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6 mt-1">

                            <div class="col-span-6 sm:col-span-6">
                                <fieldset>
                                    <legend class="block text-sm font-medium leading-5 text-gray-700">Hubungan <span class="text-red-700">*</span></legend>
                                    
                                    <div class="mt-4">
                                        <div class="flex items-center">
                                            <input id="spouse_type_husband" name="spouse_type" value="H" type="radio" class="w-4 h-4 text-indigo-600 transition duration-150 ease-in-out form-radio">
                                            <label for="spouse_type_husband" class="ml-3">
                                                <span class="block text-sm font-medium leading-5 text-gray-700">Suami</span>
                                            </label>

                                            <input id="spouse_type_wife" name="spouse_type" value="W" type="radio" class="ml-8 w-4 h-4 text-indigo-600 transition duration-150 ease-in-out form-radio">
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
                            </div>

                            <div class="col-span-6 sm:col-span-6">
                                <label for="spouse_name" class="block text-sm font-medium leading-5 text-gray-700">Nama
                                    Suami/Isteri/Waris <span class="text-red-700">*</span></label>
                                <input id="spouse_name" name="spouse_name" value="Izni Binti Ismails" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6 sm:col-span-3">
                                <fieldset>
                                    <legend class="block text-sm font-medium leading-5 text-gray-700">Warganegara
                                        Malaysia <span class="text-red-700">*</span></legend>
                                    
                                    <div class="mt-4">
                                        <div class="flex items-center">
                                            <input id="nationality_yes" name="nationality" value="Ya" type="radio" checked="" class="w-4 h-4 text-indigo-600 transition duration-150 ease-in-out form-radio">
                                            <label for="nationality_yes" class="ml-3">
                                                <span class="block text-sm font-medium leading-5 text-gray-700">Ya</span>
                                            </label>

                                            <input id="nationality_no" name="nationality" value="Tidak" type="radio" class="ml-8 w-4 h-4 text-indigo-600 transition duration-150 ease-in-out form-radio">
                                            <label for="nationality_no" class="ml-3">
                                                <span class="block text-sm font-medium leading-5 text-gray-700">Tidak</span>
                                            </label>
                                        </div>
                                                                                </div>
                                </fieldset>
                            </div>

                            <div class="hidden col-span-6 sm:col-span-3" id="passport_div">
                                <label for="passport_no" class="block text-sm font-medium leading-5 text-gray-700">No. Passport <span class="text-red-700">*</span></label>
                                <input id="passport_no" name="passport_no" value="" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="block col-span-6 sm:col-span-3" id="spuose_ic_div">
                                <label for="spouse_ic_no" class="block text-sm font-medium leading-5 text-gray-700">No. KP (Baru) - cth
                                    (900000010000) <span class="text-red-700">*</span></label>
                                <input id="spouse_ic_no" name="spouse_ic_no" value="900804146033" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="spouse_phone" class="block text-sm font-medium leading-5 text-gray-700">No Telefon (HP) - cth
                                    (0123456789) <span class="text-red-700">*</span></label>
                                <input id="spouse_phone" name="spouse_phone" value="0172544644" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6 sm:col-span-6">
                                <label for="spouse_profession" class="block text-sm font-medium leading-5 text-gray-700">Perkerjaan Sekarang
                                    <span class="text-red-700">*</span></label>
                                <input id="spouse_profession" name="spouse_profession" value="Assistant Admins" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6">
                                <label for="spouse_employer_address1" class="block text-sm font-medium leading-5 text-gray-700">Alamat Majikan</label>
                                <input id="spouse_employer_address1" name="spouse_employer_address1" value="TAMAN IKS" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                
                                <input id="spouse_employer_address2" name="spouse_employer_address2" value="SEKSYEN 9" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="spouse_employer_postcode" class="block text-sm font-medium leading-5 text-gray-700">Poskod</label>
                                <input id="spouse_employer_postcode" name="spouse_employer_postcode" maxlength="5" value="43660" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="spouse_employer_city" class="block text-sm font-medium leading-5 text-gray-700">Bandar</label>
                                <input id="spouse_employer_city" name="spouse_employer_city" value="BANGIS" class="block px-3 py-2 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                                                </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="spouse_employer_state" class="block text-sm font-medium leading-5 text-gray-700">Negeri</label>
                                <select id="spouse_employer_state" name="spouse_employer_state" class="block px-3 py-2 mt-1 w-full bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center mt-6">
        <span class="inline-flex rounded-md shadow-sm">
            <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white bg-green-600 rounded-md border border-transparent transition duration-150 ease-in-out hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700">
                
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                Simpan
            </button>
        </span>
    </div>
</div>
