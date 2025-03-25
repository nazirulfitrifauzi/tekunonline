@section('title', 'Create a new account')

<div class="flex min-h-screen bg-white">
    <div class="hidden relative flex-1 w-0 lg:block">
        <img class="object-cover absolute inset-0 w-full h-full" src="{{ asset('img/bg.jpg') }}" alt="">
    </div>
    <div class="relative z-10 pb-8 bg-white max-w-1 sm:pb-16 lg:w-full">
        <svg class="hidden absolute inset-y-0 right-1 w-48 h-full text-white transform translate-x-1/2 lg:block" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
            <polygon points="50,0 100,0 50,100 0,100"></polygon>
        </svg>
    </div>
    <div class="flex flex-col flex-1 justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
        <div class="mx-auto w-full max-w-sm lg:w-96">
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <a href="{{ route('home') }}">
                    <x-logo class="mx-auto w-auto h-16 text-indigo-600" />
                </a>

                <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center text-gray-900">
                    Buat akaun baharu
                </h2>

                <p class="mt-2 text-sm leading-5 text-center text-gray-600 max-w">
                    Atau
                    <a href="{{ route('login') }}" class="font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">
                        Log masuk ke akaun anda
                    </a>
                </p>
            </div>

            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                <form wire:submit.prevent="register">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                                Nama Penuh
                            </label>

                            <div class="mt-1 rounded-md shadow-sm">
                                <input wire:model.lazy="name" id="name" type="text" required autofocus onkeyup="this.value = this.value.toUpperCase();" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-red-500 focus:border-red-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                            </div>

                            @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                                Emel
                            </label>

                            <div class="mt-1 rounded-md shadow-sm">
                                <input wire:model.lazy="email" id="email" type="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-red-500 focus:border-red-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                            </div>

                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phoneNo" class="block text-sm font-medium leading-5 text-gray-700">
                                No. Telefon
                            </label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm sm:leading-5">
                                            +6
                                        </span>
                                    </div>
                                    <input id="phoneNo" class="block px-3 py-2 pl-16 mt-1 w-full rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out form-input sm:pl-14 focus:outline-none focus:ring-red-500 focus:border-red-300 sm:text-sm sm:leading-5 @error('phoneNo') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" type="text" required wire:model.lazy="phoneNo">
                            </div>
                            @error('phoneNo')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="ic_no" class="block text-sm font-medium leading-5 text-gray-700">
                                No Kad Pengenalan (tanpa -)
                            </label>

                            <div class="mt-1 rounded-md shadow-sm">
                                <input wire:model.lazy="ic_no" id="ic_no" maxlength="12" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-red-500 focus:border-red-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('ic_no') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror"/>
                            </div>

                            @error('ic_no')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div x-data="{ showPassword: false }">
                            <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                                Kata Laluan
                            </label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input wire:model.lazy="password" 
                                       id="password" 
                                       :type="showPassword ? 'text' : 'password'" 
                                       required 
                                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-red-500 focus:border-red-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror">
                                
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <button type="button" 
                                            @click="showPassword = !showPassword" 
                                            class="text-gray-400 hover:text-gray-500 focus:outline-none">
                                        <svg x-show="!showPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <svg x-show="showPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div x-data="{ showConfirmPassword: false }">
                            <label for="passwordConfirmation" class="block text-sm font-medium leading-5 text-gray-700">
                                Pastikan Kata Laluan
                            </label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input wire:model.lazy="passwordConfirmation" 
                                       id="passwordConfirmation" 
                                       :type="showConfirmPassword ? 'text' : 'password'" 
                                       required 
                                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-red-500 focus:border-red-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <button type="button" 
                                            @click="showConfirmPassword = !showConfirmPassword" 
                                            class="text-gray-400 hover:text-gray-500 focus:outline-none">
                                        <svg x-show="!showConfirmPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <svg x-show="showConfirmPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit" class="flex justify-center px-4 py-2 w-full text-sm font-medium text-white bg-red-600 rounded-md border border-transparent transition duration-150 ease-in-out hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring-red active:bg-red-700">
                                Daftar
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
