<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Terima kasih kerana mendaftar! Sebelum memulakan, sila sahkan alamat e-mel anda dengan mengklik pautan yang telah kami hantar. Jika anda tidak menerima e-mel tersebut, kami sedia menghantarnya semula kepada anda.') }}
    </div>

    @if (session('status') === 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Pautan pengesahan baharu telah dihantar ke alamat e-mel yang anda berikan semasa pendaftaran.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700">
                {{ __('Hantar Semula E-mel Pengesahan') }}
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="px-4 py-2 text-sm text-gray-600 hover:text-gray-900">
                {{ __('Log Keluar') }}
            </button>
        </form>
    </div>
</x-guest-layout> 