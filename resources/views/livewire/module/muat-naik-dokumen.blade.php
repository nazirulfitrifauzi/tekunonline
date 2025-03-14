<div>
    <div class="">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Dokumen Penting</h3>
                    
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
                                @error('document_ic_no') <span class="error">{{ $message }}</span> @enderror
                                @if($existingData && $existingData->document_ic_no)
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . Auth::user()->ic_no . '/' . $existingData->document_ic_no) }}" 
                                           target="_blank" 
                                           class="text-blue-600 hover:text-blue-800">
                                            View Uploaded IC Document
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="col-span-6">
                                <label for="document_icP_no" class="block text-sm font-medium leading-5 text-gray-700">Salinan Kad Pengenalan Pasangan (PDF sahaja)<span class="text-red-700">*</span></label>
                                <input type="file" wire:model="document_icP_no">
                                    @error('document_icP_no') <span class="error">{{ $message }}</span> @enderror
                                @if($existingData && $existingData->document_icP_no)
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . Auth::user()->ic_no . '/' . $existingData->document_icP_no) }}" 
                                           target="_blank" 
                                           class="text-blue-600 hover:text-blue-800">
                                            View Uploaded IC Pasangan Document
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="col-span-6">
                                <label for="document_ssm" class="block text-sm font-medium leading-5 text-gray-700">Salinan Lesen/Permit/Daftar Perniagaan (SSM)/Sijil Perakuan Amalan (Program Profesional Muda)<span class="text-red-700">*</span></label>
                                <input type="file" wire:model="document_ssm">
                                    @error('document_ssm') <span class="error">{{ $message }}</span> @enderror
                                @if($existingData && $existingData->document_ssm)
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . Auth::user()->ic_no . '/' . $existingData->document_ssm) }}" 
                                           target="_blank" 
                                           class="text-blue-600 hover:text-blue-800">
                                            View Uploaded SSM Document
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="col-span-6">
                                <label for="document_business_picture" class="block text-sm font-medium leading-5 text-gray-700">Gambar perniagaan pemohon yang menunjukkan aktiviti perniagaan yang sedang dijalankan<span class="text-red-700">*</span></label>
                                <input type="file" wire:model="document_business_picture">
                                    @error('document_business_picture') <span class="error">{{ $message }}</span> @enderror
                                @if($existingData && $existingData->document_business_picture)
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . Auth::user()->ic_no . '/' . $existingData->document_business_picture) }}" 
                                           target="_blank" 
                                           class="text-blue-600 hover:text-blue-800">
                                            View Uploaded Business Picture
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="col-span-6">
                                <label for="document_bank_statements" class="block text-sm font-medium leading-5 text-gray-700">Salinan Penyata Bank akaun Simpanan/akaun Semasa  yang mengandungi nama/syarikat pemohon, nombor akaun bank dan nama bank serta 3 bulan transaksi terkini yang aktif<span class="text-red-700">*</span></label>
                                <input type="file" wire:model="document_bank_statements">
                                    @error('document_bank_statements') <span class="error">{{ $message }}</span> @enderror
                                @if($existingData && $existingData->document_bank_statements)
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . Auth::user()->ic_no . '/' . $existingData->document_bank_statements) }}" 
                                           target="_blank" 
                                           class="text-blue-600 hover:text-blue-800">
                                            View Uploaded Bank Statements
                                        </a>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="flex justify-center mt-6 space-x-4">
    <span class="inline-flex rounded-md shadow-sm">
        <button wire:click="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white bg-green-600 rounded-md border border-transparent transition duration-150 ease-in-out hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700">
            Simpan
        </button>
    </span>
    <span class="inline-flex rounded-md shadow-sm">
        <button wire:click="submitPermohonan" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white bg-blue-600 rounded-md border border-transparent transition duration-150 ease-in-out hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700">
            Submit
        </button>
    </span>
    </div>
</div>
