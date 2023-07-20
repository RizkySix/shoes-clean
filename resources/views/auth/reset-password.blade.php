@extends('components.auth_main')

@section('css')
<style>
    input{
        height: 50px;
    }
</style>
@endsection


@section('container')

<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-text-input id="email" class="block mt-1 w-full" placeholder="Email" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 position-relative">
            <x-text-input id="password" class="thePW block mt-1 w-full" placeholder="Password Baru" type="password" name="password" required autocomplete="new-password" />
            <span class="hide-eye position-absolute end-0 top-50" id="hide-eye" style="transform: translate(-15px , -10px) ;  cursor: pointer; ">
                <i class="fa-sharp fa-regular fa-eye-slash"></i>
            </span>
            <span class="show-eye position-absolute end-0 top-50" id="show-eye" style="transform: translate(-15px , -10px) ; display:none; cursor: pointer; ">
                <i class="fa-regular fa-eye"></i>
            </span>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 position-relative">

            <x-text-input id="password_confirmation" class="thePW block mt-1 w-full"
                                type="password"
                                placeholder="Konfirmasi Password"
                                name="password_confirmation" required autocomplete="new-password" />

                                <span class="hide-eye position-absolute end-0 top-50" id="hide-eye" style="transform: translate(-15px , -10px) ;  cursor: pointer; ">
                                    <i class="fa-sharp fa-regular fa-eye-slash"></i>
                                </span>
                                <span class="show-eye position-absolute end-0 top-50" id="show-eye" style="transform: translate(-15px , -10px) ; display:none; cursor: pointer; ">
                                    <i class="fa-regular fa-eye"></i>
                                </span>
                                

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button class="btn univ_btn"><span class="fw-bold text-small" style="font-size: 14px;">Reset Password</span></button>
        </div>
    </form>
    <script src="/js/show_hide_pass.js"></script>
</x-guest-layout>

@endsection