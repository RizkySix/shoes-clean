<style>
    input{
        height: 50px;
    }
</style>
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Informasi Profile') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Ayo lengkapi informasi profile kamu.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
          <label for="gmb" class="position-relative" style="cursor: pointer;">
            @if ($user->foto_profile)
             <img src="{{ asset('storage/' . $user->foto_profile) }}" alt="gambar rusak" id="img-preview" class="img-fluid rounded-circle" style="width:100px; height:100px; object-fit:cover;">
             @else
             <img src="/image/shoes.png" alt="gambar rusak" id="img-preview" class="img-fluid rounded-circle" style="width:100px; height:100px; object-fit:cover;">
            @endif
            <input type="file" name="foto_profile" class="form-control d-none" id="gmb" onchange="previewImage()">
            <span class="position-absolute top-100 start-50 translate-middle badge rounded" id="notif" style="background-color:rgba(47, 53, 53, 0.8); font-size:20px; margin-top:-5px;">
                <i class="fa-sharp fa-solid fa-camera" style="color:ghostwhite"></i>
             </span>
          </label>
          <x-input-error class="mt-2" :messages="$errors->get('foto_profile')" />
        </div>

        <div>
            <x-text-input id="nama" name="nama" type="text" placeholder="Nama" class="mt-1 block w-full" :value="old('nama', $user->nama)" required autofocus autocomplete="nama" />
            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
        </div>

        <div>
            <x-text-input id="email" name="email"  placeholder="Email Aktif" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Email kamu belum terverifikasi.') }}

                        <button form="send-verification" class=" underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Klik untuk mengirim verifikasi email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('Link verifikasi email telah kami kirim.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-text-input id="alamat" name="alamat"  placeholder="Alamat Lengkap" type="text" class="mt-1 block w-full" :value="old('alamat', $user->alamat)" required autofocus autocomplete="alamat" />
            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
        </div>

        <div>
            <x-text-input id="no_hp" name="no_hp"  placeholder="No.WhatssApp" type="text" class="for_phone mt-1 block w-full" :value="old('no_hp', $user->no_hp)" required autofocus autocomplete="no_hp" />
            <x-input-error class="mt-2" :messages="$errors->get('no_hp')" />
        </div>

        <div class="flex items-center gap-4">
            <button class="btn univ_btn"><span class="fw-bold text-small" style="font-size: 14px;">SIMPAN</span></button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Tersimpan.') }}</p>
            @endif
        </div>
    </form>
</section>
