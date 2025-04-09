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
                <div class="flex">
                    <h1 class="text-3xl font-bold leading-9 text-white">
                        Sistem Permohonan Online TEKUN Nasional
                    </h1>
                </div>
            </div>
        </header>
    </div>

    {{-- <main class="-mt-32">
        <div class="px-4 pb-12 mx-auto w-11/12">
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
                x-init="
                    tabRepositionMarker($refs.tabButtons.children[0]);

                    Livewire.on('redirectToTab', tab => {
                        const btn = document.querySelector(`#tabs-${tab}`);
                        if (btn) {
                            setTimeout(() => {
                                if (!btn.disabled) {
                                    tabButtonClicked(btn);
                                    tabRepositionMarker(btn);
                                }
                            }, 50);
                        }
                    });
                "
                class="flex relative flex-col flex-1 w-full min-h-0"
            >
                    <!-- 2a) Tab Buttons (fixed height, no scroll) -->
                    <div
                        x-ref="tabButtons"
                        class="inline-grid relative grid-cols-7 justify-center items-center p-1 w-full h-10 bg-gray-100 rounded-lg select-none dark:bg-gray-800 dark:border-gray-700"
                    >
                        <!-- Tab 1: Maklumat Peribadi -->
                        <button
                            id="tabs-1"
                            @click="tabButtonClicked($el)"
                            :class="{ 'bg-indigo-500 text-white': tabButtonActive(1) }"
                            class="inline-flex relative z-20 justify-center items-center px-3 w-full h-8 text-sm font-medium whitespace-nowrap rounded-md transition-all dark:text-gray-300"
                        >
                            Maklumat Peribadi
                        </button>

                        <!-- Tab 2: Maklumat Perniagaan I -->
                       
                        <button
                            id="tabs-2"
                            @click="tabButtonClicked($el)"
                            :class="{ 'bg-indigo-500 text-white': tabButtonActive(2) }"
                            class="inline-flex relative z-20 justify-center items-center px-3 w-full h-8 text-sm font-medium whitespace-nowrap rounded-md transition-all dark:text-gray-300"
                        >
                            Maklumat Perniagaan I
                        </button>

                        <!-- Tab 3: Maklumat Perniagaan II -->
                       
                        <button
                            id="tabs-3"
                            @click="tabButtonClicked($el)"
                            :class="{ 'bg-indigo-500 text-white': tabButtonActive(3) }"
                            class="inline-flex relative z-20 justify-center items-center px-3 w-full h-8 text-sm font-medium whitespace-nowrap rounded-md transition-all dark:text-gray-300"
                        >
                            Maklumat Perniagaan II
                        </button>

                        <!-- Tab 7: Maklumat Pembiayaan -->
                        
                        <button
                            id="tabs-7"
                            @click="tabButtonClicked($el)"
                            :class="{ 'bg-indigo-500 text-white': tabButtonActive(7) }"
                            class="inline-flex relative z-20 justify-center items-center px-3 w-full h-8 text-sm font-medium whitespace-nowrap rounded-md transition-all dark:text-gray-300"
                        >
                            Maklumat Pembiayaan
                        </button>

                        <!-- Tab 6: Muat Naik Dokumen -->
                        
                        <button
                            id="tabs-6"
                            @click="tabButtonClicked($el)"
                            :class="{ 'bg-indigo-500 text-white': tabButtonActive(6) }"
                            class="inline-flex relative z-20 justify-center items-center px-3 w-full h-8 text-sm font-medium whitespace-nowrap rounded-md transition-all dark:text-gray-300"
                        >
                            Muat Naik Dokumen
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
                            class="overflow-y-auto flex-1 p-6 min-w-0 min-h-0 rounded-lg transition-all duration-300 dark:bg-gray-800 dark:border-gray-700"
                        >
                            <!-- Tab #1 -->
                            <div x-show="tabContentActive(1)" class="relative">
                                @livewire('module.maklumat-peribadi')
                            </div>

                            <!-- Tab #2 -->
                            <div x-show="tabContentActive(2)" class="relative" x-cloak>
                                @livewire('module.maklumat-perniagaan')
                            </div>

                            <!-- Tab #3 -->
                            <div x-show="tabContentActive(3)" class="relative" x-cloak>
                                @livewire('module.maklumat-perniagaan2')
                            </div>

                            <!-- Tab #6 -->
                            <div x-show="tabContentActive(6)" class="relative" x-cloak>
                                @livewire('module.muat-naik-dokumen')
                            </div>
                            
                            <!-- Tab #7 -->
                            <div x-show="tabContentActive(7)" class="relative" x-cloak>
                            @livewire('module.maklumat-pinjaman')
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> --}}

    <main class="-mt-32">
        <div class="w-11/12 px-4 pb-12 mx-auto">
            <div class="px-5 py-6 bg-gray-100 rounded-lg shadow sm:px-6">
    
                <div
                    x-data="{
                        /* two‑way bind with Livewire */
                        tabSelected: @entangle('activeTab').live,
    
                        /* tabs & labels */
                        tabs: [
                            { id: 1, label: 'Maklumat Peribadi' },
                            { id: 2, label: 'Maklumat Perniagaan I' },
                            { id: 3, label: 'Maklumat Perniagaan II' },
                            { id: 7, label: 'Maklumat Pembiayaan' },
                            { id: 6, label: 'Muat Naik Dokumen' },
                        ],
    
                        /* move the purple marker */
                        reposition(btn) {
                            this.$refs.tabMarker.style.width  = btn.offsetWidth  + 'px';
                            this.$refs.tabMarker.style.left   = btn.offsetLeft   + 'px';
                        },
    
                        init() {
                            /* place marker on first paint */
                            this.$nextTick(() =>
                                this.reposition(this.$refs.tabButtons.children[
                                    this.tabs.findIndex(t => t.id === this.tabSelected)
                                ])
                            );
    
                            /* whenever Alpine or Livewire changes the tab */
                            this.$watch('tabSelected', v => {
                                const btn = document.querySelector(`#tabs-${v}`);
                                if (btn) this.reposition(btn);
                            });
    
                            /* still honour any external Livewire event */
                            Livewire.on('redirectToTab', v => this.tabSelected = v);
                        },
    
                        isActive(i) { return this.tabSelected === i },
                        show(i)     { return this.tabSelected === i }
                    }"
                    class="relative flex flex-col flex-1 w-full min-h-0"
                >
    
                    {{-- buttons --}}
                    <div x-ref="tabButtons"
                         class="relative inline-grid w-full h-10 grid-cols-7 p-1 bg-gray-100 rounded-lg select-none dark:bg-gray-800 dark:border-gray-700">
    
                        <template x-for="t in tabs" :key="t.id">
                            <button
                                :id="`tabs-${t.id}`"
                                @click="tabSelected = t.id"
                                :class="isActive(t.id) ? 'text-black' : 'text-gray-800 hover:text-indigo-600'"
                                class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3 text-sm font-medium whitespace-nowrap rounded-md transition-all">
                                <span x-text="t.label"></span>
                            </button>
                        </template>
    
                        {{-- purple sliding marker --}}
                        {{-- <div x-ref="tabMarker" class="absolute left-0 top-0 z-10 h-full duration-300 ease-out">
                            <div class="w-full h-full bg-indigo-600 rounded-md"></div>
                        </div> --}}
                    </div>
    
                    {{-- panels --}}
                    <div class="relative flex flex-col flex-1 w-full min-h-0 mt-4">
                        <div class="flex-1 min-w-0 min-h-0 p-6 overflow-y-auto transition-all duration-300 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                            <div x-show="show(1)">@livewire('module.maklumat-peribadi')</div>
                            <div x-show="show(2)" x-cloak>@livewire('module.maklumat-perniagaan')</div>
                            <div x-show="show(3)" x-cloak>@livewire('module.maklumat-perniagaan2')</div>
                            <div x-show="show(6)" x-cloak>@livewire('module.muat-naik-dokumen')</div>
                            <div x-show="show(7)" x-cloak>@livewire('module.maklumat-pinjaman')</div>
                        </div>
                    </div>
                </div> {{-- /Alpine --}}
            </div>
        </div>
    </main>
    
    
    
</div>
