<div>
    <div class="">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Dokumen Penting</h3>
                        <p class="mt-1 text-sm leading-5 text-gray-500">
                            Panduan menukar gambar jenis "JPG" kepada PDF
                        </p>
                        <span class="inline-flex rounded-md shadow-sm">
                            <a href="https://cscabs.net.my/tbrs/img/cbrm/pdf_convert.pdf" target="_blank" type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                                <svg class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                                </svg>
                                Klik sini
                            </a>
                        </span>
                        <p class="mt-3 text-sm leading-5 text-gray-500">
                            Link Website
                        </p>
                        <span class="inline-flex rounded-md shadow-sm">
                            <a href="https://jpg2pdf.com/" target="_blank" type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                                <svg class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M6.672 1.911a1 1 0 10-1.932.518l.259.966a1 1 0 001.932-.518l-.26-.966zM2.429 4.74a1 1 0 10-.517 1.932l.966.259a1 1 0 00.517-1.932l-.966-.26zm8.814-.569a1 1 0 00-1.415-1.414l-.707.707a1 1 0 101.415 1.415l.707-.708zm-7.071 7.072l.707-.707A1 1 0 003.465 9.12l-.708.707a1 1 0 001.415 1.415zm3.2-5.171a1 1 0 00-1.3 1.3l4 10a1 1 0 001.823.075l1.38-2.759 3.018 3.02a1 1 0 001.414-1.415l-3.019-3.02 2.76-1.379a1 1 0 00-.076-1.822l-10-4z" clip-rule="evenodd"></path>
                                </svg>
                                Klik sini
                            </a>
                        </span>
                    </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <label for="document_ic_no" class="block text-sm font-medium leading-5 text-gray-700">Salinan Kad Pengenalan Pemohon (PDF sahaja)<span class="text-red-700">*</span>
                                </label>
                                <input type="file" wire:model="document_ic_no" accept="application/pdf">
                                <p class="mt-1 text-xs text-gray-500">Saiz fail tidak melebihi 10MB.</p>
                                @error('document_ic_no')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                                @if($existingData && $existingData->document_ic_no)
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . Auth::user()->ic_no . '/' . $existingData->document_ic_no) }}" 
                                           target="_blank" 
                                           class="text-blue-600 hover:text-blue-800">
                                            Lihat Dokumen IC
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="col-span-6">
                                <label for="document_icP_no" class="block text-sm font-medium leading-5 text-gray-700">Salinan Kad Pengenalan Pasangan (PDF sahaja)<span class="text-red-700">*</span></label>
                                <input type="file" wire:model="document_icP_no" accept="application/pdf">
                                <p class="mt-1 text-xs text-gray-500">Saiz fail tidak melebihi 10MB.</p>
                                @error('document_icP_no')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                                @if($existingData && $existingData->document_icP_no)
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . Auth::user()->ic_no . '/' . $existingData->document_icP_no) }}" 
                                           target="_blank" 
                                           class="text-blue-600 hover:text-blue-800">
                                           Lihat Dokumen IC Pasangan
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="col-span-6">
                                <label for="document_ssm" class="block text-sm font-medium leading-5 text-gray-700">Salinan Lesen/Permit/Daftar Perniagaan (SSM)/Sijil Perakuan Amalan (Program Profesional Muda)<span class="text-red-700">*</span></label>
                                <input type="file" wire:model="document_ssm" accept="application/pdf">
                                <p class="mt-1 text-xs text-gray-500">Saiz fail tidak melebihi 10MB.</p>
                                @error('document_ssm')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                                @if($existingData && $existingData->document_ssm)
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . Auth::user()->ic_no . '/' . $existingData->document_ssm) }}" 
                                           target="_blank" 
                                           class="text-blue-600 hover:text-blue-800">
                                           Lihat Dokumen SSM
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="col-span-6">
                                <label for="document_business_picture" class="block text-sm font-medium leading-5 text-gray-700">Gambar perniagaan pemohon yang menunjukkan aktiviti perniagaan yang sedang dijalankan<span class="text-red-700">*</span></label>
                                <input type="file" wire:model="document_business_picture" accept="application/pdf">
                                    <p class="mt-1 text-xs text-gray-500">Saiz fail tidak melebihi 10MB.</p>
                                    @error('document_business_picture')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                                @if($existingData && $existingData->document_business_picture)
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . Auth::user()->ic_no . '/' . $existingData->document_business_picture) }}" 
                                           target="_blank" 
                                           class="text-blue-600 hover:text-blue-800">
                                           Lihat Dokumen Perniagaan
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="col-span-6">
                                <label for="document_bank_statements" class="block text-sm font-medium leading-5 text-gray-700">Salinan Penyata Bank akaun Simpanan/akaun Semasa  yang mengandungi nama/syarikat pemohon, nombor akaun bank dan nama bank serta 3 bulan transaksi terkini yang aktif<span class="text-red-700">*</span></label>
                                <input type="file" wire:model="document_bank_statements" accept="application/pdf">
                                <p class="mt-1 text-xs text-gray-500">Saiz fail tidak melebihi 10MB.</p>
                                @error('document_bank_statements')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                                @if($existingData && $existingData->document_bank_statements)
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . Auth::user()->ic_no . '/' . $existingData->document_bank_statements) }}" 
                                           target="_blank" 
                                           class="text-blue-600 hover:text-blue-800">
                                            Lihat Penyata Bank
                                        </a>
                                    </div>
                                @endif
                            </div>

                            @if($existingData->skim_safety == 1)
                                <div class="col-span-6">
                                    <label for="document_perkeso" class="block text-sm font-medium leading-5 text-gray-700">Salinan Nota Perlindungan Perkeso <span class="text-red-700">*</span></label>
                                    <input type="file" wire:model="document_perkeso" accept="application/pdf">
                                    <p class="mt-1 text-xs text-gray-500">Saiz fail tidak melebihi 10MB.</p>
                                    @error('document_perkeso')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                    @if($existingData && $existingData->document_perkeso)
                                        <div class="mt-2">
                                            <a href="{{ asset('storage/' . Auth::user()->ic_no . '/' . $existingData->document_perkeso) }}" 
                                            target="_blank" 
                                            class="text-blue-600 hover:text-blue-800">
                                                Lihat Nota Perlindungan Perkeso
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="flex justify-center mt-6 space-x-4">
    @if($show_hantar == false)
        <span class="inline-flex rounded-md shadow-sm">
            <button wire:click="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white bg-green-600 rounded-md border border-transparent transition duration-150 ease-in-out hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700">
                Simpan
            </button>
        </span>
    @else
        <span class="inline-flex rounded-md shadow-sm">
            <button wire:click="submitPermohonan" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white bg-blue-600 rounded-md border border-transparent transition duration-150 ease-in-out hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700">
                Hantar
            </button>
        </span>
    @endif
    </div>
</div>
