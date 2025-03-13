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
                    Sistem Online Permohonan Pembiayaan Tekun
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
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    No. Permohonan
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Tarikh Permohonan
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">APP001</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-yellow-800 bg-yellow-100 rounded-full">
                                        Dalam Proses
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">01/01/2024</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                <a href="{{ route('home') }}" class="block p-5 bg-white rounded-lg shadow transition duration-150 ease-in-out hover:shadow-lg hover:bg-gray-50">
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