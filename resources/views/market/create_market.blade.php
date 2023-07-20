@extends('components.auth_main')

@section('css')
    <style>
        input{
            height: 50px;
        }
        .error-feedback{
            font-size: .875em;
            color: #dc3545;
        }
    </style>
@endsection

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex vh-100 justify-content-center align-items-center flex-column">
                    <span class="h5 text-center">Membuka Toko Kamu Gratis !</span>
                    <div class="col-sm-3 mt-4">
                        <form action="{{ route('market_shoes.store') }}" method="POST">
                            @csrf
                            <input type="text" name="nama_toko" class="form-control @error('nama_toko') is-invalid @enderror" placeholder="Nama toko" required autofocus>
                            @error('nama_toko')
                            <div class="error-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <input type="text" name="alamat" class="form-control mt-3 @error('alamat') is-invalid @enderror" placeholder="Alamat toko" required>
                            @error('alamat')
                            <div class="error-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <input type="text" name="no_hp" class="for_phone form-control mt-3 @error('no_hp') is-invalid @enderror" placeholder="No.Hp" value="{{ auth()->user()->no_hp }}" required>
                            @error('no_hp')
                            <div class="error-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <input type="email" name="email_toko" class="form-control mt-3 @error('email_toko') is-invalid @enderror" placeholder="Email toko" value="{{ auth()->user()->email }}" required>
                            @error('email_toko')
                            <div class="error-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <div class="d-flex justify-content-center mt-3">
                                <button class="btn univ_btn w-75">Buat Toko</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection