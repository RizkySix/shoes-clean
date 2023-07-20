<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shoes Clean Landing Page</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Simple line icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/landing_page.css" rel="stylesheet" />
        <link rel="stylesheet" href="/css/main_view.css">
        
      
    </head>
    
    <body id="page-top">

        <!-- Header-->
        <header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5 text-center">
                <h1 class="mb-1">Shoes Clean</h1>
                <h3 class="mb-5"><em>Memudahkan Anda Dalam Mencari dan Booking Jasa Laundry Sepatu</em></h3>
                <a class="btn univ_btn me-4 btn-xl" href="{{ route('login') }}">Sign In</a>
                <a class="btn univ_btn btn-xl " href="{{ route('register') }}">Register</a>
            </div>
        </header>
        
        <!-- Services-->
        <section class="content-section bg-primary text-white text-center" id="services">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading">
                    <h3 class="text-secondary mb-0">Services</h3>
                    <h2 class="mb-5">What We Offer</h2>
                </div>
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="fa-sharp fa-solid fa-egg"></i></span>
                        <h4><strong>Kemudahan</strong></h4>
                        <p class="text-faded mb-0">Gak perlu ribet ngantri booking laundry sepatu!</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="fa-sharp fa-regular fa-face-smile"></i></span>
                        <h4><strong>Simple dan Lengkap</strong></h4>
                        <p class="text-faded mb-0">Sistem pemesanan yang simple dan menu pilihan toko lengkap</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-like"></i></span>
                        <h4><strong>Favorit</strong></h4>
                        <p class="text-faded mb-0">
                            <i class="fas fa-heart"></i>
                           Ratusan pemilik usaha laundry sepatu terdaftar!
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="fa-sharp fa-regular fa-calendar"></i></span>
                        <h4><strong>Informasi dan Event</strong></h4>
                        <p class="text-faded mb-0">Menyajikan informasi seputar sepatu dan cleaning, juga ada event-event seputar sepatu!</p>
                    </div>
                </div>
            </div>
        </section>
       
       
        <!-- Footer-->
        @include('components.footer')


        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" id="scroller" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/js/landing_page.js"></script>
    </body>
</html>
