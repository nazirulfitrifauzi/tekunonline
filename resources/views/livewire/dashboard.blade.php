<div>
    <div class="pb-32 bg-gray-800">
        <nav x-data="{ open: false }" @keydown.window.escape="open = false" class="bg-gray-800">
            <div class="mx-auto w-11/12">
                <div class="border-b border-gray-700">
                    <div class="flex justify-between items-center px-4 h-16 sm:px-0">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <x-logo class="mx-auto w-16 h-auto text-indigo-600" />
                            </div>
                            <div class="hidden md:block">
                                <div class="flex items-baseline ml-10">
                                    <a href="{{ route('dashboard') }}" class="px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-md focus:outline-none focus:text-white focus:bg-gray-700">
                                    Laman Utama
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="ml-auto">
                            <div class="items-baseline">
                                <a href="#" class="px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-md focus:outline-none focus:text-white focus:bg-gray-700">
                                    {{ substr(auth()->user()->ic_no,0,6) }}-{{ substr(auth()->user()->ic_no,6,2) }}-{{ substr(auth()->user()->ic_no,8,4) }}
                                </a>
                            </div>
                        </div>
                        <div class="block ml-2">
                            <span class="inline-flex rounded-md shadow-sm">
                                <a href="{{ route('logout') }}" type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white bg-red-600 rounded-md border border-transparent transition duration-150 ease-in-out hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700" onclick="event.preventDefault();getElementById('logout-form').submit();">
                                    <svg class="mr-2 -ml-0.5 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd">
                                    </svg>
                                    Log Keluar
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    {{ csrf_field() }}
                                </form>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <header class="py-10">
            <div class="px-4 mx-auto w-11/12">
                <h1 class="text-3xl font-bold leading-9 text-white">
                    Sistem Permohonan Online TEKUN Nasional
                </h1>
            </div>
        </header>
    </div>

    <main class="-mt-32">
        <div class="px-4 pb-12 mx-auto w-11/12">
            <!-- Status Table -->
            <div class="mb-8 overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Status Permohonan</h3>
                </div>
                <div class="border-t border-gray-200">
                <table class="w-full min-w-full divide-y divide-gray-200 text-center">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase text-center">
                                No. Rujukan
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase text-center">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase text-center">
                                Tarikh Permohonan
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase text-center">
                                Tindakan
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($applnStatuses as $status)
                            <tr>
                                <!-- Application Reference Number -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                    {{ $status->appln_ref_no ?? 'N/A' }}
                                </td>

                                <!-- Application Status -->
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if($status->appln_status == 'S' && is_null($status->appln_status_fas))
                                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-yellow-800 bg-yellow-100 rounded-full">
                                            PERMOHONAN TELAH DI HANTAR
                                        </span>                                
                                    @elseif($status->appln_status == 'P' && is_null($status->appln_status_fas))
                                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-yellow-800 bg-yellow-100 rounded-full">
                                            SILA SAMBUNG PERMOHONAN
                                        </span>  
                                    @elseif($status->appln_status == 'S' && $status->appln_status_fas == 10)
                                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                            PERMOHONAN DILULUSKAN
                                        </span>                                                              
                                    @elseif($status->appln_status == 'S' && $status->appln_status_fas == 20)
                                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                            PERMOHONAN DITOLAK
                                        </span>
                                    @else
                                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-yelllow-800 bg-yellow-100 rounded-full">
                                            PERMOHONAN DALAM PROSES
                                        </span>                                                       
                                    @endif                                
                                </td>

                                <!-- Date of Submission -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                    {{ $status->appln_date_submit ? date('d/m/Y', strtotime($status->appln_date_submit)) : 'N/A' }}
                                </td>

                                <!-- Action Button -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                    @if($status->appln_status == 'P' && is_null($status->appln_status_fas) && !is_null($status->id))
                                        <a href="{{ route('home', ['appln_id' => $status->id ?? null]) }}"
                                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium
                                                rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2
                                                focus:ring-blue-500 transition ease-in-out duration-150">
                                            <span class="ml-1">Teruskan Permohonan</span>
                                        </a>
                                    @else
                                        <!-- Disabled button when conditions are not met -->
                                        <a href="javascript:void(0)"
                                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium
                                                rounded-md opacity-50 pointer-events-none focus:outline-none
                                                transition ease-in-out duration-150">
                                            <span class="ml-1">Selesai Mohon</span>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <!-- Ensure the empty row spans all 4 columns -->
                                <td colspan="4" class="text-center text-gray-500 py-6">
                                    Tiada rekod permohonan.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                </div>
                <!-- Pagination Links -->
                <div class="mt-4 px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                    {{ $applnStatuses->links('pagination::tailwind') }}
                </div>
            </div>
           

            <div class="mb-8 overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Makluman Kepada Pemohon</h3>
                    <p class="mt-4 text-sm text-gray-500">
                        1. Sebarang makluman yang berkaitan dengan permohonan anda akan dihantar kepada emel anda.
                    </p>
                    <p class="mt-4 text-sm text-gray-500">
                        2. Pemohon hanya boleh membuat satu permohonan sahaja. 
                    </p>                                        
                </div>
            </div>

            <!-- Summary Cards with Buttons -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <a href="{{ route('home',['appln_id' => $status->id ?? null]) }}"
                    wire:click.prevent="{{ !$disableButton ? 'save' : '' }}"
                    class="block p-5 bg-white rounded-lg shadow transition duration-150 ease-in-out
                        {{ $disableButton ? 'opacity-50 cursor-not-allowed pointer-events-none' : 'hover:shadow-lg hover:bg-gray-50' }}"
                >
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Mohon Pembiayaan</h3>
                        </div>
                        <div class="ml-4">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>


                <a href="{{ route('change-password') }}" class="block p-5 bg-white rounded-lg shadow transition duration-150 ease-in-out hover:shadow-lg hover:bg-gray-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Tukar Kata Laluan</h3>
                        </div>
                        <div class="ml-4">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <a href="{{ route('maklumat-akaun') }}" class="block p-5 bg-white rounded-lg shadow transition duration-150 ease-in-out hover:shadow-lg hover:bg-gray-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Maklumat Profil</h3>
                        </div>
                        <div class="ml-4">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </main>
</div> 