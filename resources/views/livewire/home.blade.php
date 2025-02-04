<div>
    <div class="pb-32 bg-gray-800">
        <nav x-data="{ open: false }" @keydown.window.escape="open = false" class="bg-gray-800">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-20">
                <div class="border-b border-gray-700">
                    <div class="flex justify-between items-center px-4 h-16 sm:px-0">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <x-logo class="mx-auto w-16 h-auto text-indigo-600" />
                            </div>
                            <div class="hidden md:block">
                                <div class="flex items-baseline ml-10">
                                    <a href="#" class="px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-md focus:outline-none focus:text-white focus:bg-gray-700">
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
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-20">
                <div class="flex">
                    <h1 class="text-3xl font-bold leading-9 text-white">
                        Sistem Online Permohonan Pembiayaan Tekun
                    </h1>
                </div>
            </div>
        </header>
    </div>

    <main class="-mt-32">
        <div class="px-4 pb-12 mx-auto max-w-7xl sm:px-6 lg:px-20">
            <div class="px-5 py-6 bg-gray-100 rounded-lg shadow sm:px-6">
                <div
                    x-data="{
                        tabSelected: 1,
                        tabId: $id('tabs'),
                        tabButtonClicked(tabButton) {
                            this.tabSelected = parseInt(tabButton.id.split('-').pop());
                            this.tabRepositionMarker(tabButton);
                        },
                        tabRepositionMarker(tabButton) {
                            this.$refs.tabMarker.style.width = tabButton.offsetWidth + 'px';
                            this.$refs.tabMarker.style.height = tabButton.offsetHeight + 'px';
                            this.$refs.tabMarker.style.left = tabButton.offsetLeft + 'px';
                        },
                        tabContentActive(tabIndex) {
                            return this.tabSelected === tabIndex;
                        },
                        tabButtonActive(tabIndex) {
                            return this.tabSelected === tabIndex;
                        }
                    }"
                    x-init="tabRepositionMarker($refs.tabButtons.children[0]);"
                    class="flex relative flex-col flex-1 w-full min-h-0"
                >
                    <!-- 2a) Tab Buttons (fixed height, no scroll) -->
                    <div
                        x-ref="tabButtons"
                        class="inline-grid relative grid-cols-5 justify-center items-center p-1 w-full h-10 bg-white rounded-lg border border-gray-200 select-none dark:bg-gray-800 dark:border-gray-700"
                    >
                        <button
                            id="tabs-1"
                            @click="tabButtonClicked($el)"
                            :class="{ 'bg-indigo-600 text-indigo-100': tabButtonActive(1) }"
                            class="inline-flex relative z-20 justify-center items-center px-3 w-full h-8 text-sm font-medium text-gray-600 whitespace-nowrap rounded-md transition-all cursor-pointer dark:text-gray-300"
                        >
                            Maklumat Peribadi
                        </button>
                        <button
                            id="tabs-2"
                            @click="tabButtonClicked($el)"
                            :class="{ 'bg-indigo-600 text-indigo-100': tabButtonActive(2) }"
                            class="inline-flex relative z-20 justify-center items-center px-3 w-full h-8 text-sm font-medium text-gray-600 whitespace-nowrap rounded-md transition-all cursor-pointer dark:text-gray-300"
                        >
                            Maklumat Perniagaan
                        </button>
                        <button
                            id="tabs-3"
                            @click="tabButtonClicked($el)"
                            :class="{ 'bg-indigo-600 text-indigo-100': tabButtonActive(3) }"
                            class="inline-flex relative z-20 justify-center items-center px-3 w-full h-8 text-sm font-medium text-gray-600 whitespace-nowrap rounded-md transition-all cursor-pointer dark:text-gray-300"
                        >
                            Maklumat Pinjaman
                        </button>
                        <button
                            id="tabs-4"
                            @click="tabButtonClicked($el)"
                            :class="{ 'bg-indigo-600 text-indigo-100': tabButtonActive(4) }"
                            class="inline-flex relative z-20 justify-center items-center px-3 w-full h-8 text-sm font-medium text-gray-600 whitespace-nowrap rounded-md transition-all cursor-pointer dark:text-gray-300"
                        >
                            Maklumat Lain 1
                        </button>
                        <button
                            id="tabs-5"
                            @click="tabButtonClicked($el)"
                            :class="{ 'bg-indigo-600 text-indigo-100': tabButtonActive(5) }"
                            class="inline-flex relative z-20 justify-center items-center px-3 w-full h-8 text-sm font-medium text-gray-600 whitespace-nowrap rounded-md transition-all cursor-pointer dark:text-gray-300"
                        >
                            Maklumat Lain 2
                        </button>

                        <!-- Marker for the active tab highlight -->
                        <div
                            x-ref="tabMarker"
                            class="absolute left-0 z-10 w-1/5 h-full duration-300 ease-out"
                            x-cloak
                        >
                            <div class="w-full h-full bg-indigo-600 rounded-md"></div>
                        </div>
                    </div>

                    <div class="flex relative flex-col flex-1 mt-4 w-full min-h-0">
                        <div
                            class="overflow-y-auto flex-1 p-6 min-w-0 min-h-0 bg-white rounded-lg border border-gray-100 shadow-lg transition-all duration-300 dark:bg-gray-800 hover:shadow-xl dark:border-gray-700"
                        >
                            <!-- Tab #1 -->
                            <div x-show="tabContentActive(1)" class="relative">
                                @livewire('module.maklumat-peribadi')
                            </div>

                            <!-- Tab #2 -->
                            <div x-show="tabContentActive(2)" class="relative" x-cloak>
                                {{-- @livewire('module.cif.account-information.account-position', ['accountNo' => $accountNo]) --}}
                            </div>

                            <!-- Tab #3 -->
                            <div x-show="tabContentActive(3)" class="relative" x-cloak>
                                {{-- @livewire('module.cif.account-information.disbursement', ['accountNo' => $accountNo]) --}}
                            </div>

                            <!-- Tab #4 -->
                            <div x-show="tabContentActive(4)" class="relative" x-cloak>
                                {{-- @livewire('module.cif.account-information.repayment-schedule', ['accountNo' => $accountNo]) --}}
                            </div>

                            <!-- Tab #5 -->
                            <div x-show="tabContentActive(5)" class="relative" x-cloak>
                                {{-- @livewire('module.cif.account-information.owing', ['accountNo' => $accountNo]) --}}
                            </div>

                            <!-- Optional: Add a subtle border accent -->
                            <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r to-transparent from-indigo-500/60"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
