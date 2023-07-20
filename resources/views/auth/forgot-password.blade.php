<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Lupa password? jangan khawatir. Beritahu kami alamat email kamu kemudian kami akan mengirm link reset password ke email kamu.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus style="height: 50px;" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button class="btn univ_btn"><span class="fw-bold text-small" style="font-size: 14px;">Password Reset Link</span></button>
        </div>
    </form>
</x-guest-layout>
