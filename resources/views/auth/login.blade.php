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
            <div class="d-flex vh-100 justify-content-center align-items-center flex-column">
               <span class="h3">Selamat Datang !</span>
               <p class="text-muted">Silahkan login untuk menggunakan layanan kami.</p>
               <img src="/image/shoes.png" alt="gambar rusak" class="img-fluid" style="height:250px; width:250px;">

               <div class="col-sm-3 mt-4">
                <form action="{{ route('login.store') }}" method="POST">
                    @csrf
                    <input type="email" name="email" placeholder="Email terdaftar" class="form-control " style="height: 50px;" required autofocus>
                    @error('email')
                        <div class="error-feedback">
                            Akun yang kamu coba untuk masuk tidak terdaftar.
                        </div>
                    @enderror
                    <div class="position-relative">
                        <input type="password" name="password" id="thePW" placeholder="Password" class="thePW form-control mt-3 mb-2" style="height: 50px;" required>
                        <span class="hide-eye position-absolute end-0 top-50" id="hide-eye" style="transform: translate(-15px , -10px) ;  cursor: pointer; ">
                            <i class="fa-sharp fa-regular fa-eye-slash"></i>
                        </span>
                        <span class="show-eye position-absolute end-0 top-50" id="show-eye" style="transform: translate(-15px , -10px) ; display:none; cursor: pointer; ">
                            <i class="fa-regular fa-eye"></i>
                        </span>
                      
                    </div>
                      
                   <a href="{{ route('password.request') }}" class="text-decoration-none" style="color:blue; font-size:14px; margin-left:15px;">Lupa password?</a>
                    <button class="btn univ_btn w-100 mt-3 mb-2">Login</button>
                    <a href="{{ route('register') }}" class="text-decoration-none d-flex justify-content-center" style="color:blue; font-size:14px;">Belum punya akun? Daftar sekarang!</a>
                </form>
               </div>
            </div>
        </div>
    </div>
   </div>

   <script src="/js/show_hide_pass.js"></script>
@endsection