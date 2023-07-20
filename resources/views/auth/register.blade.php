@extends('components.auth_main')

@section('css')
<style>
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
                <div class="vh-100 d-flex justify-content-center align-items-center flex-column">
                    <span class="h3">Daftar Akun</span>
                    <p class="text-muted">Silahkan lengkapi form dengan benar</p>
                    
                    <div class="col-sm-3">
                        <form action="{{ route('register.store') }}" method="POST">
                            @csrf
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" style="height: 50px;" value="{{ old('nama') }}" required autofocus>
                            @error('nama')
                                <div class="error-feedback">
                                   {{ $message }}
                                  </div>
                            @enderror

                            <input type="text" name="alamat" class="form-control mt-3 @error('alamat') is-invalid @enderror" placeholder="Alamat" style="height: 50px;" value="{{ old('alamat') }}" required>
                            @error('alamat')
                            <div class="error-feedback">
                             {{ $message }}
                            </div>
                             @enderror

                            <input type="text" name="no_hp" class="for_phone form-control mt-3 @error('no_hp') is-invalid @enderror" placeholder="No.Hp" style="height: 50px;" value="{{ old('no_hp') }}" required>
                            @error('no_hp')
                            <div class="error-feedback">
                             {{ $message }}
                            </div>
                         @enderror

                            <input type="email" name="email" class="form-control mt-3 @error('email') is-invalid @enderror" placeholder="Email aktif" style="height: 50px;" value="{{ old('email') }}" required>
                            @error('email')
                            <div class="error-feedback">
                             {{ $message }}
                            </div>
                            @enderror

                            <div class="position-relative">
                                <input type="password" name="password" class="thePW form-control mt-3 @error('password') is-invalid @enderror" placeholder="Password" style="height: 50px;" required>
                                <span class="hide-eye position-absolute end-0 top-50" id="hide-eye" style="transform: translate(-15px , -10px) ;  cursor: pointer; ">
                                    <i class="fa-sharp fa-regular fa-eye-slash"></i>
                                </span>
                                <span class="show-eye position-absolute end-0 top-50" id="show-eye" style="transform: translate(-15px , -10px) ; display:none; cursor: pointer; ">
                                    <i class="fa-regular fa-eye"></i>
                                </span>
                                @error('password')
                                <div class="error-feedback">
                                 {{ $message }}
                                </div>
                             @enderror

                            </div>
                            
                            <div class="position-relative">
                                <input type="password" name="password_confirmation" class="thePW form-control mt-3" placeholder="Konfirmasi password" style="height: 50px;" required>
                                <span class="hide-eye position-absolute end-0 top-50" id="hide-eye" style="transform: translate(-15px , -10px) ;  cursor: pointer; ">
                                    <i class="fa-sharp fa-regular fa-eye-slash"></i>
                                </span>
                                <span class="show-eye position-absolute end-0 top-50" id="show-eye" style="transform: translate(-15px , -10px) ; display:none; cursor: pointer; ">
                                    <i class="fa-regular fa-eye"></i>
                                </span>
                            </div>

                           <div class="d-flex justify-content-center">
                            <button class="btn univ_btn col-sm-8 mt-3">Buat Akun</button>
                           </div>
                           <a href="{{ route('login') }}" class="text-decoration-none d-flex justify-content-center mt-2" style="color:blue; font-size:14px;">Sudah Punya Akun? Login Sekarang!</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <script src="/js/show_hide_pass.js"></script>


@endsection