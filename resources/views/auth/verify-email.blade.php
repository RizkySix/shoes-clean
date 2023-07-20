
<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400" style="text-align: justify;">
        {{ __('Kamu sudah berhasil register akun, tetapi sebelum lanjut mohon untuk verifikasi email terlebih dahulu. Link verifikasi sudah kami kirim melalui email. Tidak menerima pesan? kami akan mengirimkan email baru.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('Link verifikasi baru sudah kami kirimkan ke email kamu.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <button class="btn univ_btn"><span class="fw-bold text-small" style="font-size: 14px;">Kirim Ulang Verifikasi Email</span></button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
