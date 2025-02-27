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
                    Maklumat Akaun
                </h1>
            </div>
        </header>
    </div>

    <main class="-mt-32">
        <div class="px-4 pb-12 mx-auto w-11/12">
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">Nama Penuh</label>
                            <div class="mt-1 p-2 bg-gray-50 rounded-md">
                                {{ auth()->user()->name }}
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">No. Kad Pengenalan</label>
                            <div class="mt-1 p-2 bg-gray-50 rounded-md">
                                {{ substr(auth()->user()->ic_no,0,6) }}-{{ substr(auth()->user()->ic_no,6,2) }}-{{ substr(auth()->user()->ic_no,8,4) }}
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">Emel</label>
                            <div class="mt-1 p-2 bg-gray-50 rounded-md">
                                {{ auth()->user()->email }}
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">Status Akaun</label>
                            <div class="mt-1 p-2 bg-gray-50 rounded-md">
                                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                    Aktif
                                </span>
                            </div>
                        </div>
                        
                        <!-- Add Back Button -->
                        <div class="col-span-6 flex justify-center mt-6">
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-600 rounded-md border border-transparent shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                <svg class="mr-2 -ml-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Kembali
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
</div> 