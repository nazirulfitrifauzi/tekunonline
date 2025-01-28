@section('title', 'Sign in to your account')

<div class="flex min-h-screen bg-white">
    <div class="flex flex-col justify-center flex-1 px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
        <div class="w-full max-w-sm mx-auto">
            <div>
                <img class="w-auto h-24" src="{{ asset('img/logo_tekun.png') }}" />
                <h2 class="mt-6 text-3xl font-extrabold leading-9 text-gray-900">
                    Log masuk akaun
                </h2>
                <p class="mt-2 text-sm leading-5 text-gray-600 max-w">
                    atau
                    <a href="{{ route('register') }}" class="font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">
                        daftar akaun anda sekarang
                    </a>
                </p>
            </div>

            <div class="mt-8">
                <div class="mt-6">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div>
                            <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                                Alamat emel
                            </label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-500 @enderror" />

                                @error('email')
                                <p class="mt-4 text-xs italic text-red-500">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6">
                            <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                                Kata laluan
                            </label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <input id="password" type="password" name="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-500 @enderror" />

                                @error('password')
                                <p class="mt-4 text-xs italic text-red-500">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <div class="flex items-center text-sm">
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">
                                    Lupa kata laluan?
                                </a>
                                @endif
                            </div>
                        </div>

                        <div class="mt-6">
                            <span class="block w-full rounded-md shadow-sm">
                                <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">
                                    Log Masuk
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <div>
                <p class="mt-6 text-sm leading-5 text-center text-gray-600 max-w">
                    Applikasi ini sesuai dilayari menggunakan Firefox & Google Chrome.
                </p>
                <p class="mt-6 text-xs leading-5 text-center text-gray-600 max-w">
                    Tekun Online@version 1.0.0
                </p>
            </div>

        </div>
    </div>
    <div class="relative flex-1 hidden w-0 lg:block">
        <img class="absolute inset-0 object-fill w-full h-full" src="{{ secure_asset('public/img/poster_tbrs.png') }}" alt="" />
    </div>
</div>
