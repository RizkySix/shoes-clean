@extends('components.market_main')

@section('css')
    <style>
        input{
            height: 50px;
        }

        .error-feedback{
            font-size: .875em;
            color: #dc3545;
        }

        .sosmd{
          font-size: 12px;
        }
    </style>
@endsection

@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="col-md-9 ms-sm-auto col-lg-12 px-md-4">

           <div class="d-flex flex-column text-center">
            <span class="h5 mt-4">Lengkapi atau perbarui informasi toko kamu !</span>
            <hr class="mb-4">
           </div>

        
            <form action="{{ route('market_shoes.update' , $market->slug_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="d-flex justify-content-center align-items-center">
                <div class="col-sm-5 d-flex flex-column justify-content-center">
                  <div class="mt-3">
                    <input type="text" name="nama_toko" class="form-control @error('nama_toko') is-invalid @enderror" value="{{ old('nama_toko' , $market->nama_toko) }}" placeholder="Nama toko" required>
                    @error('nama_toko')
                    <div class="error-feedback">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                  </div>

                  <div class="mt-3">
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat' , $market->alamat) }}" placeholder="Alamat toko" required>
                    @error('alamat')
                    <div class="error-feedback">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                  </div>

                  <div class="mt-3">
                    <input type="text" name="no_hp" class="for_phone form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp' , $market->no_hp) }}" placeholder="No.Hp" required>
                    @error('no_hp')
                    <div class="error-feedback">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                  </div>

                  <div class="mt-3">
                    <input type="email" name="email_toko" class="form-control @error('email_toko') is-invalid @enderror" value="{{ old('email_toko' , $market->email_toko) }}" placeholder="Email toko" required>
                    @error('email_toko')
                    <div class="error-feedback">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                  </div>

        
                  <div class="mt-3">
                    <input type="text" name="pemilik_toko" class="form-control @error('pemilik_toko') is-invalid @enderror" value="{{ old('pemilik_toko' , $market->pemilik_toko ) }}" placeholder="Pemilik toko" required>
                    @error('pemilik_toko')
                    <div class="error-feedback">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                  </div>

                  <div class="mt-3">
                   <span class="text-muted text-start">Berikan foto yang menarik dari toko kamu 🥰</span>
                    <label for="gmb" class="form-label mt-3" style="cursor: pointer;">
                        @if ($market->foto_toko)
                          <img src="{{ asset('storage/' . $market->foto_toko) }}" id="img-preview" class="img-fluid rounded" style="width: 150px; height:150px; object-fit:cover; border:1px solid rgba(217, 180, 180 , 50%);">
                        @else
                           <img src="/image/shoes.png" id="img-preview" class="img-fluid rounded" style="width: 150px; height:150px; object-fit:cover; border:1px solid rgba(217, 180, 180 , 50%);">
                        @endif
                    </label><br>
                    <input type="file" name="foto_toko" class="form-control d-none" id="gmb" @if(!$market->foto_toko) required @endif onchange="previewImage()">
                    @error('foto_toko')
                    <span class="error-feedback">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="mt-3 d-flex">
                    <input type="time" name="jam_buka" id="jam_buka" class="form-control me-2 @error('jam_buka') is-invalid @enderror" value="{{ old('jam_buka' , $market->jam_buka ) }}" placeholder="Jam buka" required>
                    <span class="text-muted me-2 d-flex align-items-center">sampai</span>
                    <input type="time" name="jam_tutup" id="jam_tutup" class="form-control @error('jam_tutup') is-invalid @enderror" value="{{ old('jam_tutup' , $market->jam_tutup ) }}" placeholder="Jam tutup" required>
                    @error('jam_buka')
                    <div class="error-feedback">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                  </div>

                  <span class="text-muted mt-4">Sosial Media (Optional)</span>
                  <div class=" d-flex justify-content-between">
                  <div class="mt-3 me-2">
                    <div class="d-flex justify-content-center">
                      <img src="/image/ig.png" alt="instagram"  class="img-fluid rounded mb-3 d-flex" style="width:100px; height:100px; object-fit:cover;">
                    </div>
                    <input type="text" name="instagram" class="sosmd form-control @error('instagram') is-invalid @enderror" value="{{ old('instagram' , $market->instagram ) }}" placeholder="Instagram">
                    @error('instagram')
                    <div class="error-feedback">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                  </div>
                  <div class="mt-3 me-2">
                    <div class="d-flex justify-content-center">
                      <img src="/image/whatsapp.png" alt="whatssapp"  class="img-fluid rounded mb-3 d-flex" style="width:100px; height:100px; object-fit:cover;">
                    </div>
                    <input type="text" name="whatssapp" class="sosmd for_phone form-control @error('whatssapp') is-invalid @enderror" value="{{ old('whatssapp' , $market->whatssapp ) }}" placeholder="WhatssApp">
                    @error('whatssapp')
                    <div class="error-feedback">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                  </div>
                 
                  </div>

                  <div class="d-flex justify-content-center mt-4" style="margin-bottom:50px;">
                    <button class="btn univ_btn w-75">Update</button>
                  </div>

                </div>
            </div>
            </form>

           
            
           </div>
          </div>
          
        </div>
    </div>
</div>   
@endsection