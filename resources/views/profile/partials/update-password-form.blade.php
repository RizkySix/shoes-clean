<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Ubah Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Pastikan untuk membuat password yang panjang dan kuat untuk menjaga akun kamu.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="position-relative">
            <x-text-input id="current_password" placeholder="Password Sekarang" name="current_password" type="password" class="thePW mt-1 block w-full" autocomplete="current-password" />
            <span class="hide-eye position-absolute end-0 top-50" id="hide-eye" style="transform: translate(-15px , -10px) ;  cursor: pointer; ">
                <i class="fa-sharp fa-regular fa-eye-slash"></i>
            </span>
            <span class="show-eye position-absolute end-0 top-50" id="show-eye" style="transform: translate(-15px , -10px) ; display:none; cursor: pointer; ">
                <i class="fa-regular fa-eye"></i>
            </span>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="position-relative">
            <x-text-input id="password" name="password"  placeholder="Password Baru" type="password" class="thePW mt-1 block w-full" autocomplete="new-password" />
            <span class="hide-eye position-absolute end-0 top-50" id="hide-eye" style="transform: translate(-15px , -10px) ;  cursor: pointer; ">
                <i class="fa-sharp fa-regular fa-eye-slash"></i>
            </span>
            <span class="show-eye position-absolute end-0 top-50" id="show-eye" style="transform: translate(-15px , -10px) ; display:none; cursor: pointer; ">
                <i class="fa-regular fa-eye"></i>
            </span>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="position-relative">
            <x-text-input id="password_confirmation"  placeholder="Konfirmasi Password" name="password_confirmation" type="password" class="thePW mt-1 block w-full" autocomplete="new-password" />
            <span class="hide-eye position-absolute end-0 top-50" id="hide-eye" style="transform: translate(-15px , -10px) ;  cursor: pointer; ">
                <i class="fa-sharp fa-regular fa-eye-slash"></i>
            </span>
            <span class="show-eye position-absolute end-0 top-50" id="show-eye" style="transform: translate(-15px , -10px) ; display:none; cursor: pointer; ">
                <i class="fa-regular fa-eye"></i>
            </span>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
          

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Password berubah.') }}</p>
            @endif
        </div>
    </form>

    <script src="/js/show_hide_pass.js"></script>
</section>
