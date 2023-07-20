@extends('components.main_view')

@section('css')
   <link rel="stylesheet" href="/css/show_store.css">

   <style>
    .juds{
        font-size: 14px;
    }

    .kon-juds{
        font-size: 14px;
        font-weight: bolder;
    }
   </style>
@endsection

@section('container')
    <div class="container" style="margin-top:100px;">
        <div class="row">
            <div class="col-sm-12 d-flex justify-content-center align-items-center">
                <div class="col-sm-4 me-4">
                   @if ($market->foto_toko)
                   <img src="{{ asset('storage/' . $market->foto_toko) }}" alt="Gambar rusak" class="img-fluid rounded overflow-hidden" style="width: 100%; height:500px; object-fit: cover;">
                   @else
                   <img src="/image/toko.jpg" alt="Gambar rusak" class="img-fluid rounded overflow-hidden" style="width: 100%; height:500px; object-fit: cover;">
                   @endif
                </div>

                <div class="col-sm-4 text-end" id="detail">
                    <div class="card">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex">
                                <div class="info-toko me-auto text-start w-50">
                                    <span class="h6">{{ $market->nama_toko }}</span>
                                    <p class=" text-muted">{{ $market->alamat }}</p>
                                </div>
                                <div class="rating ms-2">
                                    @if ($market->jumlah_star != 0 && $market->like_user != 0)
                                        @php
                                            $rating = $market->jumlah_star / $market->like_user;
                                            $real_rating = number_format($rating , 1);
                                            $real_rating = sprintf('%.1f', $real_rating);
                                        @endphp
            
                                         @if ($real_rating >= 0.1 && $real_rating < 1)
                                         <span class="h6 d-flex" style="color: rgb(85, 74, 74);">
                                            <i class="fa-sharp fa-solid fa-star-half-stroke" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                        </span>
                                         @endif
            
                                         @if ($real_rating >= 1 && $real_rating < 1.5)
                                         <span class="h6 d-flex" style="color: rgb(85, 74, 74);">
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                        </span>
            
                                         @endif
                                         @if ($real_rating >= 1.5 && $real_rating < 2)
                                         <span class="h6 d-flex" style="color: rgb(85, 74, 74);">
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star-half-stroke" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                        </span>
                                         @endif
            
                                         @if ($real_rating >= 2 && $real_rating < 2.5)
                                         <span class="h6 d-flex" style="color: rgb(85, 74, 74);">
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                        </span>
                                         @endif
            
                                         @if ($real_rating >= 2.5 && $real_rating < 3)
                                         <span class="h6 d-flex" style="color: rgb(85, 74, 74);">
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star-half-stroke" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                        </span>
                                         @endif
            
                                         @if ($real_rating >= 3 && $real_rating < 3.5)
                                         <span class="h6 d-flex" style="color: rgb(85, 74, 74);">
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                        </span>
                                         @endif
            
                                         @if ($real_rating >= 3.5 && $real_rating < 4)
                                         <span class="h6 d-flex" style="color: rgb(85, 74, 74);">
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star-half-stroke" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                        </span>
                                         @endif
            
                                         @if ($real_rating >= 4 && $real_rating < 4.5)
                                         <span class="h6 d-flex" style="color: rgb(85, 74, 74);">
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                        </span>
                                         @endif
            
                                         @if ($real_rating >= 4.5 && $real_rating < 5)
                                         <span class="h6 d-flex" style="color: rgb(85, 74, 74);">
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star-half-stroke" style="color:rgb(219, 219, 48);"></i>
                                        </span>
                                         @endif
            
                                         @if ($real_rating == 5)
                                         <span class="h6 d-flex" style="color: rgb(85, 74, 74);">
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                            <i class="fa-sharp fa-solid fa-star" style="color:rgb(219, 219, 48);"></i>
                                        </span>
                                         @endif
            
                                         <p class="text-muted text-end">{{ $real_rating }}</p>
                                    @else
                                    <span class="h6 d-flex" style="color: rgb(85, 74, 74);">
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                        <i class="fa-sharp fa-solid fa-star"></i>
                                    </span>
                                    <p class="text-muted text-end">0</p>
                                    @endif
                                </div>
                            </div>
                            <div class="sosmed d-flex justify-content-around me-1">
                                @if ($market->jam_buka && $market->jam_tutup)
                                <div class="jam-buka mt-4 text-center">
                                    <img src="/image/waktu.png" alt="gambar rusak" class="img-fluid overflow-hidden" style="width:50px; height:50px; object-fit:cover;">
                                    <div>
                                    <span class="juds text-muted">Open </span>
                                    <p class="kon-juds text-muted">{{ \Carbon\Carbon::parse($market->jam_buka)->format('H:i') }} - {{ \Carbon\Carbon::parse($market->jam_tutup)->format('H:i') }}</p>
                                    </div>
                                </div>
                                @endif
                                @if ($market->whatssapp)
                                <div class="jam-buka mt-4 text-center">
                                   <a href="https://wa.me/{{ str_replace('-' , '' , $market->whatssapp) }}" class="text-decoration-none">
                                    <img src="/image/whatsapp.png" alt="gambar rusak" class="img-fluid overflow-hidden" style="width:50px; height:50px; object-fit:cover;">
                                   </a>
                                    <div>
                                    <span class="juds text-muted">WhatssApp </span>
                                    <p class="kon-juds text-muted">{{ str_replace('-' , '' , $market->whatssapp) }}</p>
                                    </div>
                                </div> 
                                @endif
                                @if ($market->instagram)
                                <div class="jam-buka mt-4 text-center">
                                   <a href="https://instagram.com/{{ $market->instagram }}?igshid=YmMyMTA2M2Y=" class="text-decoration-none">
                                    <img src="/image/ig.png" alt="gambar rusak" class="img-fluid overflow-hidden" style="width:50px; height:50px; object-fit:cover;">
                                   </a>
                                    <div>
                                    <span class="juds text-muted">Instagram </span>
                                    <p class="kon-juds text-muted">{{ $market->instagram }}</p>
                                    </div>
                                </div>
                                @endif
                               
                            </div>
                            @if ($market->user_id == auth()->user()->id)
                            <div class="d-flex justify-content-center">
                              {{--   <button class="btn univ_btn w-75 mt-3" id="restrict_pemilik">Pilih Layanan</button> --}}
                              <a href="/user-market-shoes/{{ $market->slug_id }}" class="btn univ_btn w-75 mt-3 text-decoration-none">Dashboard Toko</a>
                            </div>
                            @else
                            <div class="d-flex justify-content-center">
                                <button class="btn univ_btn w-75 mt-3" id="pilih">Pilih Layanan</button>
                            </div>
                            @endif
                        </div>
                      </div>
                </div>

                <div class="col-sm-5" id="layanan" style="display : none;">
                    <div class="card">
                        <div class="card-body d-flex flex-column">
                            <span class="h5 text-center">Pilih Layanan</span>
                            <div class="d-flex mt-4 justify-content-around">
                                <div class="layanan rounded d-flex flex-column flex-wrap" style="background-color:rgb(240, 237, 237); padding:20px; cursor: pointer;" id="layanan1">
                                    <img src="/image/M.png" alt="gambar rusak" class="img-fluid rounded overflow-hidden" style="width:160px; height:160px; object-fit: cover;">
                                    <span class="h6 mt-3">Ke Store</span>
                                    <p class="text-muted" style="width:160px;">Bawa sepatu anda dan bayar di Toko kami.</p>
                                </div>
                                <div class="layanan rounded d-flex flex-column flex-wrap" style="background-color:rgb(240, 237, 237); padding:20px; cursor: pointer;" id="layanan2"> 
                                    <img src="/image/M.png" alt="gambar rusak" class="img-fluid rounded overflow-hidden" style="width:160px; height:160px; object-fit: cover;">
                                    <span class="h6 mt-3">Home Service</span>
                                    <p class="text-muted" style="width:160px;">Pelayanan terbaik ke tempat anda tanpa perlu keluar rumah</p>
                                </div>
                            </div>
                            <form action="{{ route('pesanan.store') }}" method="POST" id="forLayanan1">
                                @csrf
                                <input type="hidden" class="form-control d-none" name="market_shoe_id" value="{{ $market->id }}" required readonly>
                               <div class="d-flex justify-content-center">
                                <button class="btn univ_btn mt-4 w-75">Buat Pesanan</button>
                               </div>
                            </form>
                            <div class="d-flex justify-content-center">
                                <a href="https://wa.me/{{ str_replace('-' , '' , $market->no_hp) }}" class="btn univ_btn mt-4 w-75 " id="forLayanan2" style="display: none;">Buat Pesanan</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

        <script>
            $(document).ready(function(){
                $('#pilih').click(function(){
                    $('#detail').css('display' , 'none');
                    $('#layanan').show('fast');
                })

                $('#layanan1').click(function(){
                    $(this).css('background-color' , '#3F72AF')
                    $('#layanan2').css('background-color' , 'rgb(240, 237, 237)')
                    $('#forLayanan1').css('display' , 'block')
                    $('#forLayanan2').css('display' , 'none')
                })
                $('#layanan2').click(function(){
                    $(this).css('background-color' , '#3F72AF')
                    $('#layanan1').css('background-color' , 'rgb(240, 237, 237)')
                    $('#forLayanan1').css('display' , 'none')
                    $('#forLayanan2').css('display' , 'block')
                })
            })
        </script>

        <script>
            $(document).ready(function(){
                $('#restrict_pemilik').click(function(){
                    Swal.fire({
                    title: 'Woah!! kamu dilarang memesan di toko mu sendiri.',
                    width: 600,
                    padding: '3em',
                    color: 'rgb(35, 48, 59)',
                    background: '#fff url(/image/repeat.jpg)',
                    backdrop: `
                        rgba(0,0,123,0.4)
                        url("/image/kawai.gif")
                        right center
                        no-repeat
                    `
                    })
                })
            })
        </script>

@endsection