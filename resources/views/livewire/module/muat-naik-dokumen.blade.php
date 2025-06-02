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
                                <label for="document_ic_no" class="flex text-sm leading-5 font-medium text-gray-700">
                                    Salinan Kad Pengenalan Pemohon (PDF sahaja) <span class="text-red-700 ml-1">*</span>
                                </label>

                                <div id="ic-document-div"
                                    class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 @error('document_ic_no') border-red-500 @enderror border-dashed rounded-md cursor-pointer">

                                    @if($existingData && $existingData->document_ic_no)
                                    <div class="flex" x-data="{ open: false }">
                                        <div class="justify-center">
                                            <span class="inline-flex rounded-md shadow-sm">
                                                <a href="{{ asset('storage/' . Auth::user()->ic_no . '/' . $existingData->document_ic_no) }}"
                                                    target="_blank"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500">
                                                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5 mr-2">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Lihat Dokumen IC
                                                </a>
                                            </span>
                                            <span class="inline-flex rounded-md shadow-sm ml-2">
                                                <button type="button"
                                                    @click.prevent="open = true"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-500">
                                                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5 mr-2">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Padam Fail
                                                </button>
                                            </span>
                                        </div>

                                        {{-- Modal Padam --}}
                                        <div class="fixed z-50 inset-0 flex items-center justify-center" x-show="open" x-cloak>
                                            <div class="fixed inset-0 bg-gray-600 bg-opacity-75 transition-opacity"></div>
                                            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full p-6">
                                                <div class="sm:flex sm:items-start">
                                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                                                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                        </svg>
                                                    </div>
                                                    <div class="ml-4">
                                                        <h3 class="text-lg font-medium text-gray-900">Padam Dokumen?</h3>
                                                        <p class="mt-2 text-sm text-gray-500">
                                                            Anda pasti ingin memadam fail Dokumen IC ini?
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="mt-5 sm:flex sm:flex-row-reverse">
                                                    <button type="button" wire:click="deleteIcDocument" class="w-full sm:w-auto bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-500">Padam</button>
                                                    <button type="button" @click="open = false" class="mt-3 sm:mt-0 w-full sm:w-auto bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md hover:text-gray-500">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="text-center w-full">
                                        <input type="file" wire:model="document_ic_no" accept="application/pdf" class="block w-full text-sm text-gray-900 mt-2" />
                                        <p class="mt-1 text-xs text-gray-500">Saiz fail tidak melebihi 10MB.</p>
                                    </div>
                                    @endif
                                </div>

                                @error('document_ic_no')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-6">
                                <label for="document_icP_no" class="flex text-sm leading-5 font-medium text-gray-700">
                                    Salinan Kad Pengenalan Pasangan (PDF sahaja) <span class="text-red-700 ml-1">*</span>
                                </label>

                                <div id="icp-document-div"
                                    class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 @error('document_icP_no') border-red-500 @enderror border-dashed rounded-md cursor-pointer">
                                    @if($existingData && $existingData->document_icP_no)
                                    <div class="flex" x-data="{ open: false }">
                                        <div class="justify-center">
                                            <span class="inline-flex rounded-md shadow-sm">
                                                <a href="{{ asset('storage/' . Auth::user()->ic_no . '/' . $existingData->document_icP_no) }}"
                                                    target="_blank"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500">
                                                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5 mr-2">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Lihat Dokumen IC Pasangan
                                                </a>
                                            </span>
                                            <span class="inline-flex rounded-md shadow-sm ml-2">
                                                <button type="button"
                                                    @click.prevent="open = true"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-500">
                                                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5 mr-2">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Padam Fail
                                                </button>
                                            </span>
                                        </div>
                                        {{-- Modal Padam --}}
                                        <div class="fixed z-50 inset-0 flex items-center justify-center" x-show="open" x-cloak>
                                            <div class="fixed inset-0 bg-gray-600 bg-opacity-75 transition-opacity"></div>
                                            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full p-6">
                                                <div class="sm:flex sm:items-start">
                                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                                                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                        </svg>
                                                    </div>
                                                    <div class="ml-4">
                                                        <h3 class="text-lg font-medium text-gray-900">Padam Dokumen?</h3>
                                                        <p class="mt-2 text-sm text-gray-500">
                                                            Anda pasti ingin memadam fail Dokumen IC Pasangan ini?
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="mt-5 sm:flex sm:flex-row-reverse">
                                                    <button type="button" wire:click="deleteIcPDocument" class="w-full sm:w-auto bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-500">Padam</button>
                                                    <button type="button" @click="open = false" class="mt-3 sm:mt-0 w-full sm:w-auto bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md hover:text-gray-500">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="text-center w-full">
                                        <input type="file" wire:model="document_icP_no" accept="application/pdf" class="block w-full text-sm text-gray-900 mt-2" />
                                        <p class="mt-1 text-xs text-gray-500">Saiz fail tidak melebihi 10MB.</p>
                                    </div>
                                    @endif
                                </div>
                                @error('document_icP_no')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-6">
                                <label for="document_ssm" class="flex text-sm leading-5 font-medium text-gray-700">
                                    Salinan Lesen/Permit/Daftar Perniagaan (SSM)/Sijil Perakuan Amalan (Program Profesional Muda) <span class="text-red-700 ml-1">*</span>
                                </label>

                                <div id="ssm-document-div"
                                    class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 @error('document_ssm') border-red-500 @enderror border-dashed rounded-md cursor-pointer">

                                    @if($existingData && $existingData->document_ssm)
                                    <div class="flex" x-data="{ open: false }">
                                        <div class="justify-center">
                                            <span class="inline-flex rounded-md shadow-sm">
                                                <a href="{{ asset('storage/' . Auth::user()->ic_no . '/' . $existingData->document_ssm) }}"
                                                    target="_blank"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500">
                                                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5 mr-2">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Lihat Dokumen SSM
                                                </a>
                                            </span>
                                            <span class="inline-flex rounded-md shadow-sm ml-2">
                                                <button type="button"
                                                    @click.prevent="open = true"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-500">
                                                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5 mr-2">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Padam Fail
                                                </button>
                                            </span>
                                        </div>
                                        {{-- Modal Padam --}}
                                        <div class="fixed z-50 inset-0 flex items-center justify-center" x-show="open" x-cloak>
                                            <div class="fixed inset-0 bg-gray-600 bg-opacity-75 transition-opacity"></div>
                                            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full p-6">
                                                <div class="sm:flex sm:items-start">
                                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                                                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                        </svg>
                                                    </div>
                                                    <div class="ml-4">
                                                        <h3 class="text-lg font-medium text-gray-900">Padam Dokumen?</h3>
                                                        <p class="mt-2 text-sm text-gray-500">
                                                            Anda pasti ingin memadam fail Dokumen SSM ini?
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="mt-5 sm:flex sm:flex-row-reverse">
                                                    <button type="button" wire:click="deleteSsmDocument" class="w-full sm:w-auto bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-500">Padam</button>
                                                    <button type="button" @click="open = false" class="mt-3 sm:mt-0 w-full sm:w-auto bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md hover:text-gray-500">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="text-center w-full">
                                        <input type="file" wire:model="document_ssm" accept="application/pdf" class="block w-full text-sm text-gray-900 mt-2" />
                                        <p class="mt-1 text-xs text-gray-500">Saiz fail tidak melebihi 10MB.</p>
                                    </div>
                                    @endif
                                </div>
                                @error('document_ssm')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-6">
                                <label for="document_business_picture" class="flex text-sm leading-5 font-medium text-gray-700">
                                    Gambar perniagaan pemohon yang menunjukkan aktiviti perniagaan yang sedang dijalankan <span class="text-red-700 ml-1">*</span>
                                </label>

                                <div id="business-picture-div"
                                    class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 @error('document_business_picture') border-red-500 @enderror border-dashed rounded-md cursor-pointer">
                                    @if($existingData && $existingData->document_business_picture)
                                    <div class="flex" x-data="{ open: false }">
                                        <div class="justify-center">
                                            <span class="inline-flex rounded-md shadow-sm">
                                                <a href="{{ asset('storage/' . Auth::user()->ic_no . '/' . $existingData->document_business_picture) }}"
                                                    target="_blank"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500">
                                                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5 mr-2">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Lihat Dokumen Perniagaan
                                                </a>
                                            </span>
                                            <span class="inline-flex rounded-md shadow-sm ml-2">
                                                <button type="button"
                                                    @click.prevent="open = true"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-500">
                                                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5 mr-2">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Padam Fail
                                                </button>
                                            </span>
                                        </div>
                                        {{-- Modal Padam --}}
                                        <div class="fixed z-50 inset-0 flex items-center justify-center" x-show="open" x-cloak>
                                            <div class="fixed inset-0 bg-gray-600 bg-opacity-75 transition-opacity"></div>
                                            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full p-6">
                                                <div class="sm:flex sm:items-start">
                                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                                                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                        </svg>
                                                    </div>
                                                    <div class="ml-4">
                                                        <h3 class="text-lg font-medium text-gray-900">Padam Dokumen?</h3>
                                                        <p class="mt-2 text-sm text-gray-500">
                                                            Anda pasti ingin memadam fail Dokumen Perniagaan ini?
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="mt-5 sm:flex sm:flex-row-reverse">
                                                    <button type="button" wire:click="deleteBusinessPictureDocument" class="w-full sm:w-auto bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-500">Padam</button>
                                                    <button type="button" @click="open = false" class="mt-3 sm:mt-0 w-full sm:w-auto bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md hover:text-gray-500">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="text-center w-full">
                                        <input type="file" wire:model="document_business_picture" accept="application/pdf" class="block w-full text-sm text-gray-900 mt-2" />
                                        <p class="mt-1 text-xs text-gray-500">Saiz fail tidak melebihi 10MB.</p>
                                    </div>
                                    @endif
                                </div>
                                @error('document_business_picture')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-6">
                                <label for="document_bank_statements" class="flex text-sm leading-5 font-medium text-gray-700">
                                    Penyata Bank <span class="text-red-700 ml-1">*</span>
                                </label>

                                <div id="bank-statement-div"
                                    class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 @error('document_bank_statements') border-red-500 @enderror border-dashed rounded-md cursor-pointer">

                                    @if($existingData && $existingData->document_bank_statements)
                                    <div class="flex" x-data="{ open: false }">
                                        <div class="justify-center">
                                            <span class="inline-flex rounded-md shadow-sm">
                                                <a href="{{ asset('storage/' . Auth::user()->ic_no . '/' . $existingData->document_bank_statements) }}"
                                                    target="_blank"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500">
                                                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5 mr-2">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Lihat Penyata
                                                </a>
                                            </span>
                                            <span class="inline-flex rounded-md shadow-sm ml-2">
                                                <button type="button"
                                                    @click.prevent="open = true"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-500">
                                                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5 mr-2">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Padam Fail
                                                </button>
                                            </span>
                                        </div>

                                        {{-- Modal Padam --}}
                                        <div class="fixed z-50 inset-0 flex items-center justify-center" x-show="open" x-cloak>
                                            <div class="fixed inset-0 bg-gray-600 bg-opacity-75 transition-opacity"></div>
                                            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full p-6">
                                                <div class="sm:flex sm:items-start">
                                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                                                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                        </svg>
                                                    </div>
                                                    <div class="ml-4">
                                                        <h3 class="text-lg font-medium text-gray-900">Padam Penyata?</h3>
                                                        <p class="mt-2 text-sm text-gray-500">
                                                            Anda pasti ingin memadam fail Penyata Bank ini?
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="mt-5 sm:flex sm:flex-row-reverse">
                                                    <button type="button" wire:click="deleteBankStatement" class="w-full sm:w-auto bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-500">Padam</button>
                                                    <button type="button" @click="open = false" class="mt-3 sm:mt-0 w-full sm:w-auto bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md hover:text-gray-500">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="text-center w-full">
                                        <input type="file" wire:model="document_bank_statements" accept="application/pdf" class="block w-full text-sm text-gray-900 mt-2" />
                                        <p class="mt-1 text-xs text-gray-500">Saiz fail tidak melebihi 10MB.</p>
                                    </div>
                                    @endif
                                </div>

                                @error('document_bank_statements')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                            </div>


                            @if(optional($existingData)->skim_safety == 0)
                            <div class="col-span-6">
                                <label for="document_perkeso" class="flex text-sm leading-5 font-medium text-gray-700">
                                    Salinan Nota Perlindungan Perkeso <span class="text-red-700 ml-1">*</span>
                                </label>

                                <div id="perkeso-document-div"
                                    class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 @error('document_perkeso') border-red-500 @enderror border-dashed rounded-md cursor-pointer">

                                    @if($existingData && $existingData->document_perkeso)
                                    <div class="flex" x-data="{ open: false }">
                                        <div class="justify-center">
                                            <span class="inline-flex rounded-md shadow-sm">
                                                <a href="{{ asset('storage/' . Auth::user()->ic_no . '/' . $existingData->document_perkeso) }}"
                                                    target="_blank"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500">
                                                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5 mr-2">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Lihat Nota Perlindungan Perkeso
                                                </a>
                                            </span>
                                            <span class="inline-flex rounded-md shadow-sm ml-2">
                                                <button type="button"
                                                    @click.prevent="open = true"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-500">
                                                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5 mr-2">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Padam Fail
                                                </button>
                                            </span>
                                        </div>

                                        {{-- Modal Padam --}}
                                        <div class="fixed z-50 inset-0 flex items-center justify-center" x-show="open" x-cloak>
                                            <div class="fixed inset-0 bg-gray-600 bg-opacity-75 transition-opacity"></div>
                                            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full p-6">
                                                <div class="sm:flex sm:items-start">
                                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                                                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                        </svg>
                                                    </div>
                                                    <div class="ml-4">
                                                        <h3 class="text-lg font-medium text-gray-900">Padam Dokumen?</h3>
                                                        <p class="mt-2 text-sm text-gray-500">
                                                            Anda pasti ingin memadam fail Nota Perlindungan Perkeso ini?
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="mt-5 sm:flex sm:flex-row-reverse">
                                                    <button type="button" wire:click="deletePerkesoDocument" class="w-full sm:w-auto bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-500">Padam</button>
                                                    <button type="button" @click="open = false" class="mt-3 sm:mt-0 w-full sm:w-auto bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md hover:text-gray-500">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="text-center w-full">
                                        <input type="file" wire:model="document_perkeso" accept="application/pdf" class="block w-full text-sm text-gray-900 mt-2" />
                                        <p class="mt-1 text-xs text-gray-500">Saiz fail tidak melebihi 10MB.</p>
                                    </div>
                                    @endif
                                </div>

                                @error('document_perkeso')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
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

@script
    <script>
        Livewire.on('saved', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
    @endscript

<!-- Add this to your main layout file -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.addEventListener('redirectToDashboard', event => {
            window.location.href = event.detail.url;
        });
    });
</script>
