<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register' ,[
            'title' => 'Register Akun'  
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
    
    $messages = [
        'nama.min' => 'Nama minimal harus 5 karakter.',
        'nama.max' => 'Nama maximal 50 karakter.',
        'email.email' => 'Alamat email tidak valid.',
        'email.unique' => 'Email sudah terdaftar.',
        'password.confirmed' => 'Konfirmasi password tidak sesuai.',
        'alamat' => 'Masukan alamat dengan lengkap.',
        'no_hp' => 'Masukan no handphone yang benar.'
    ];
     $validatedData = $request->validate([
            'nama' => ['required', 'string', 'min:5', 'max:50'],
            'email' => ['required', 'string', 'email:dns', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'alamat' => 'required|string|min:8',
            'no_hp' => 'required|string|min:11',
        ] , $messages);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
