@extends('components.market_main')

@section('css')
<style>
  input{
      height: 50px;
  }
  select{
      height: 50px;
  }
  .error-feedback{
      font-size: .875em;
      color: #dc3545;
  }
  .juds{
        font-size: 12px;
    }

    .kon-juds{
        font-size: 12px;
        font-weight: bolder;
    }
</style>
@endsection

@section('container')
<div class="container" style="margin-top:100px;">
    <div class="row">
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="col-md-9 ms-sm-auto col-lg-12 px-md-4">
            @if (session('success'))
               <div class="d-flex justify-content-center mt-4">
                <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
                    <span class="fw-bold">{{ session('success') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            </div>

               @endif

           <div class="d-flex justify-content-center align-items-center text-center">
            <div class="col-sm-4 me-4">
                <img src="{{ asset('storage/' . $market->foto_toko) }}" alt="Gambar rusak" class="img-fluid rounded overflow-hidden" style="width: 100%; height:500px; object-fit: cover;">
             </div>

             <div class="col-sm-4 text-end" id="detail">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex">
                            <div class="info-toko me-auto text-start w-50">
                                <span class="h6">{{ $market->nama_toko }}</span>
                                <p class="text-muted">{{ $market->alamat }}</p>
                            </div>
                            <div class="rating ms-2">
                                @if ($market->jumlah_star != 0 && $market->like_user != 0)
                                    @php
                                        $rating = $market->jumlah_star / $market->like_user;
                                        $real_rating = number_format($rating , 1);
                                        $real_rating = sprintf('%.1f', $real_rating);//mengubah angka menjadi decimal jika hasil pembagian bernilai bilangan bulat, misal hasil nya ada 5 akan dirubah menjadi 5.0
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
                        <div class="sosmed d-flex justify-content-around">
                          @if ($market->jam_buka && $market->jam_tutup)
                          <div class="jam-buka mt-4 text-center me-1">
                              <img src="/image/waktu.png" alt="gambar rusak" class="img-fluid overflow-hidden" style="width:35px; height:35px; object-fit:cover;">
                              <div>
                              <span class="juds text-muted">Open </span>
                              <p class="kon-juds text-muted">{{ \Carbon\Carbon::parse($market->jam_buka)->format('H:i') }} - {{ \Carbon\Carbon::parse($market->jam_tutup)->format('H:i') }}</p>
                              </div>
                          </div>
                          @endif
                          @if ($market->whatssapp)
                          <div class="jam-buka mt-4 text-center me-1">
                             <a href="https://wa.me/{{ str_replace('-' , '' , $market->whatssapp) }}" class="text-decoration-none">
                              <img src="/image/whatsapp.png" alt="gambar rusak" class="img-fluid overflow-hidden" style="width:35px; height:35px; object-fit:cover;">
                             </a>
                              <div>
                              <span class="juds text-muted">WhatssApp </span>
                              <p class="kon-juds text-muted">{{ str_replace('-' , '' , $market->whatssapp) }}</p>
                              </div>
                          </div> 
                          @endif
                          @if ($market->instagram)
                          <div class="jam-buka mt-4 text-center me-1">
                             <a href="https://instagram.com/{{ $market->instagram }}?igshid=YmMyMTA2M2Y=" class="text-decoration-none">
                              <img src="/image/ig.png" alt="gambar rusak" class="img-fluid overflow-hidden" style="width:35px; height:35px; object-fit:cover;">
                             </a>
                              <div>
                              <span class="juds text-muted">Instagram </span>
                              <p class="kon-juds text-muted">{{ $market->instagram }}</p>
                              </div>
                          </div>
                          @endif
                         
                      </div>
        
                    </div>
                  </div>
            </div>

           </div>

           <div class="d-flex justify-content-center align-items-center mt-4 flex-column" style="margin-bottom:50px;">
            <div class="card mt-4 col-sm-8">
                <div class="card-header bg-warning text-center">
                    Normal Cleaning
                  </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Cleaning</th>
                            <th scope="col">Harga Service</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if($normal->count())
                         @foreach ($normal as $norm)
                         @php
                             $price = number_format($norm->harga);
                             $price = explode(',' , $price);
                             $price = implode('.' , $price);
                         @endphp
                         <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $norm->nama_cleaning }}</td>
                            <td class="">Rp. {{ $price }}</td>
                            <td class="d-flex">
                                <a type="button" class=" text-decoration-none " style="color:blueviolet;"><i class="fa-solid fa-file-pen" data-bs-toggle="modal" id="btnmod{{ $norm->id }}" data-bs-target="#modaledit{{ $norm->id }}"></i></a>
                               <form action="/jenis_cleaning/{{ $norm->id }}" method="POST" id="submit_del{{ $norm->id }}">
                                @csrf
                                @method('delete')
                                <button type="button" id="delete{{ $norm->id }}" class=" border-0 ms-2" style="color:crimson; background-color:white;"><i class="fa-solid fa-trash-can"></i></button>

                                <script>
                                  $('#delete{{ $norm->id }}').click(function(){
                                    Swal.fire({
                                            title: 'Yakin lanjut?',
                                            text: "Silahkan cancel jika berubah pikiran!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Yes, hapus!'
                                            }).then((result) => {
                                            if (result.isConfirmed) {
                                               $('#submit_del{{ $norm->id }}').trigger('submit')
                                            }
                                            })
                                  })
                                </script>
                              </form>

                              <!-- Modal -->
                              <div class="modal fade" id="modaledit{{ $norm->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Cleaning</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/jenis_cleaning/{{ $norm->id }}" method="POST">
                                      @csrf
                                      @method('put')
                                      <div class="modal-body d-flex justify-content-center">
                                        <div class="col-sm-8 d-flex flex-column justify-content-center">
                                          <div class="mt-3">
                                              <input type="text" name="nama_cleaning" class="form-control @error('nama_cleaning') is-invalid @enderror" placeholder="Nama Cleaning" value="{{ old('nama_cleaning' , $norm->nama_cleaning) }}" required>
                                              @error('nama_cleaning')
                                              <div class="error-feedback">
                                                  <span>{{ $message }}</span>
                                              </div>
                                              @enderror
                                          </div>
                      
                                          <div class="mt-3">
                                              <select name="category_cleaning" id="category" class="form-select">
                                                 @if (old('category_cleaning') == 'Normal Cleaning')
                                                      <option value="Normal Cleaning" selected>Normal Cleaning</option>
                                                      <option value="Repair">Repair</option>
                                                      <option value="Repaint">Repaint</option>
                                                 @elseif(old('category_cleaning') == 'Repair')
                                                      <option value="Normal Cleaning">Normal Cleaning</option>
                                                      <option value="Repair" selected>Repair</option>
                                                      <option value="Repaint">Repaint</option>
                                                 @elseif(old('category_cleaning') == 'Repaint')
                                                      <option value="Normal Cleaning">Normal Cleaning</option>
                                                      <option value="Repair">Repair</option>
                                                      <option value="Repaint" selected>Repaint</option>
                                                  @else
                                                  <option value="Normal Cleaning" selected>Normal Cleaning</option>
                                                  <option value="Repair">Repair</option>
                                                  <option value="Repaint">Repaint</option>
                                                 @endif
                      
                                              </select>
                                          </div>
                      
                                          <div class="mt-3">
                                              <div class="input-group">
                                                  <span class="input-group-text text-muted">Rp.</span>
                                                  <input type="text" name="harga" class="for_money form-control @error('harga') is-invalid @enderror" placeholder="Harga Cleaning" value="{{ old('harga' , $price) }}" required>
                                              </div>
                                              @error('harga')
                                              <div class="error-feedback">
                                                  <span>{{ $message }}</span>
                                              </div>
                                              @enderror
                                          </div>
                      
                                          <input type="hidden" name="rasomon_blury" value="{{ request('rasomon-cleaning-blury') }}" class="form-control d-none" readonly>
                                
                      
                                      </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="cancels btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button class="btn univ_btn">Update</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>

                              </div>
                            </td>
                          </tr>


                         @endforeach
                          @endif
                      
                        </tbody>
                      </table>
                      
                </div>
              </div>

              <div class="card mt-4 col-sm-8">
                <div class="card-header bg-warning text-center">
                   Repair
                  </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Cleaning</th>
                            <th scope="col">Harga Service</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if($repair->count())
                         @foreach ($repair as $rpr)
                         @php
                             $price = number_format($rpr->harga);
                             $price = explode(',' , $price);
                             $price = implode('.' , $price);
                         @endphp
                         <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $rpr->nama_cleaning }}</td>
                            <td class="">Rp. {{ $price }}</td>
                            <td class="d-flex">
                              <a type="button" class=" text-decoration-none " style="color:blueviolet;"><i class="fa-solid fa-file-pen" data-bs-toggle="modal" id="btnmod{{ $rpr->id }}" data-bs-target="#modaledit{{ $rpr->id }}"></i></a>
                             <form action="/jenis_cleaning/{{ $rpr->id }}" method="POST" id="submit_del{{ $rpr->id }}">
                              @csrf
                              @method('delete')
                              <button type="button" id="delete{{ $rpr->id }}" class=" border-0 ms-2" style="color:crimson; background-color:white;"><i class="fa-solid fa-trash-can"></i></button>

                              <script>
                                $('#delete{{ $rpr->id }}').click(function(){
                                  Swal.fire({
                                          title: 'Yakin lanjut?',
                                          text: "Silahkan cancel jika berubah pikiran!",
                                          icon: 'warning',
                                          showCancelButton: true,
                                          confirmButtonColor: '#3085d6',
                                          cancelButtonColor: '#d33',
                                          confirmButtonText: 'Yes, hapus!'
                                          }).then((result) => {
                                          if (result.isConfirmed) {
                                             $('#submit_del{{ $rpr->id }}').trigger('submit')
                                          }
                                          })
                                })
                              </script>
                            </form>

                            <!-- Modal -->
                            <div class="modal fade" id="modaledit{{ $rpr->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Cleaning</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <form action="/jenis_cleaning/{{ $rpr->id }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="modal-body d-flex justify-content-center">
                                      <div class="col-sm-8 d-flex flex-column justify-content-center">
                                        <div class="mt-3">
                                            <input type="text" name="nama_cleaning" class="form-control @error('nama_cleaning') is-invalid @enderror" placeholder="Nama Cleaning" value="{{ old('nama_cleaning' , $rpr->nama_cleaning) }}" required>
                                            @error('nama_cleaning')
                                            <div class="error-feedback">
                                                <span>{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>
                    
                                        <div class="mt-3">
                                            <select name="category_cleaning" id="category" class="form-select">
                                               @if (old('category_cleaning') == 'Normal Cleaning')
                                                    <option value="Normal Cleaning" selected>Normal Cleaning</option>
                                                    <option value="Repair">Repair</option>
                                                    <option value="Repaint">Repaint</option>
                                               @elseif(old('category_cleaning') == 'Repair')
                                                    <option value="Normal Cleaning">Normal Cleaning</option>
                                                    <option value="Repair" selected>Repair</option>
                                                    <option value="Repaint">Repaint</option>
                                               @elseif(old('category_cleaning') == 'Repaint')
                                                    <option value="Normal Cleaning">Normal Cleaning</option>
                                                    <option value="Repair">Repair</option>
                                                    <option value="Repaint" selected>Repaint</option>
                                                @else
                                                <option value="Normal Cleaning">Normal Cleaning</option>
                                                <option value="Repair" selected>Repair</option>
                                                <option value="Repaint">Repaint</option>
                                               @endif
                    
                                            </select>
                                        </div>
                    
                                        <div class="mt-3">
                                            <div class="input-group">
                                                <span class="input-group-text text-muted">Rp.</span>
                                                <input type="text" name="harga" class="for_money form-control @error('harga') is-invalid @enderror" placeholder="Harga Cleaning" value="{{ old('harga' , $price) }}" required>
                                            </div>
                                            @error('harga')
                                            <div class="error-feedback">
                                                <span>{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>
                    
                                        <input type="hidden" name="rasomon_blury" value="{{ request('rasomon-cleaning-blury') }}" class="form-control d-none" readonly>
                              
                    
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="cancels btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button class="btn univ_btn">Update</button>
                                    </div>
                                  </form>
                                </div>
                              </div>

                            </div>
                          </td>
                          </tr>
                         @endforeach
                        @endif
                      
                        </tbody>
                      </table>
                      
                </div>
              </div>

              <div class="card mt-4 col-sm-8">
                <div class="card-header bg-warning text-center">
                    Repaint
                  </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Cleaning</th>
                            <th scope="col">Harga Service</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if($repaint->count())
                         @foreach ($repaint as $rpn)
                         @php
                             $price = number_format($rpn->harga);
                             $price = explode(',' , $price);
                             $price = implode('.' , $price);
                         @endphp
                         <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $rpn->nama_cleaning }}</td>
                            <td class="">Rp. {{ $price }}</td>
                            <td class="d-flex">
                              <a type="button" class=" text-decoration-none " style="color:blueviolet;"><i class="fa-solid fa-file-pen" data-bs-toggle="modal" id="btnmod{{ $rpn->id }}" data-bs-target="#modaledit{{ $rpn->id }}"></i></a>
                             <form action="/jenis_cleaning/{{ $rpn->id }}" method="POST" id="submit_del{{ $rpn->id }}">
                              @csrf
                              @method('delete')
                              <button type="button" id="delete{{ $rpn->id }}" class=" border-0 ms-2" style="color:crimson; background-color:white;"><i class="fa-solid fa-trash-can"></i></button>

                              <script>
                                $('#delete{{ $rpn->id }}').click(function(){
                                  Swal.fire({
                                          title: 'Yakin lanjut?',
                                          text: "Silahkan cancel jika berubah pikiran!",
                                          icon: 'warning',
                                          showCancelButton: true,
                                          confirmButtonColor: '#3085d6',
                                          cancelButtonColor: '#d33',
                                          confirmButtonText: 'Yes, hapus!'
                                          }).then((result) => {
                                          if (result.isConfirmed) {
                                             $('#submit_del{{ $rpn->id }}').trigger('submit')
                                          }
                                          })
                                })
                              </script>
                            </form>

                            <!-- Modal -->
                            <div class="modal fade" id="modaledit{{ $rpn->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Cleaning</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <form action="/jenis_cleaning/{{ $rpn->id }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="modal-body d-flex justify-content-center">
                                      <div class="col-sm-8 d-flex flex-column justify-content-center">
                                        <div class="mt-3">
                                            <input type="text" name="nama_cleaning" class="form-control @error('nama_cleaning') is-invalid @enderror" placeholder="Nama Cleaning" value="{{ old('nama_cleaning' , $rpn->nama_cleaning) }}" required>
                                            @error('nama_cleaning')
                                            <div class="error-feedback">
                                                <span>{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>
                    
                                        <div class="mt-3">
                                            <select name="category_cleaning" id="category" class="form-select">
                                               @if (old('category_cleaning') == 'Normal Cleaning')
                                                    <option value="Normal Cleaning" selected>Normal Cleaning</option>
                                                    <option value="Repair">Repair</option>
                                                    <option value="Repaint">Repaint</option>
                                               @elseif(old('category_cleaning') == 'Repair')
                                                    <option value="Normal Cleaning">Normal Cleaning</option>
                                                    <option value="Repair" selected>Repair</option>
                                                    <option value="Repaint">Repaint</option>
                                               @elseif(old('category_cleaning') == 'Repaint')
                                                    <option value="Normal Cleaning">Normal Cleaning</option>
                                                    <option value="Repair">Repair</option>
                                                    <option value="Repaint" selected>Repaint</option>
                                                @else
                                                <option value="Normal Cleaning">Normal Cleaning</option>
                                                <option value="Repair">Repair</option>
                                                <option value="Repaint" selected>Repaint</option>
                                               @endif
                    
                                            </select>
                                        </div>
                    
                                        <div class="mt-3">
                                            <div class="input-group">
                                                <span class="input-group-text text-muted">Rp.</span>
                                                <input type="text" name="harga" class="for_money form-control @error('harga') is-invalid @enderror" placeholder="Harga Cleaning" value="{{ old('harga' , $price) }}" required>
                                            </div>
                                            @error('harga')
                                            <div class="error-feedback">
                                                <span>{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>
                    
                                        <input type="hidden" name="rasomon_blury" value="{{ request('rasomon-cleaning-blury') }}" class="form-control d-none" readonly>
                              
                    
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="cancels btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button class="btn univ_btn">Update</button>
                                    </div>
                                  </form>
                                </div>
                              </div>

                            </div>
                          </td>
                          </tr>
                         @endforeach
                          @endif
                      
                        </tbody>
                      </table>
                      
                </div>
              </div>
           </div>
          </div>

          <script>
            $(document).ready(function(){
               if({{ session('errors_format')}}){
                 $("#btnmod{{ session('errors_format') }}").trigger('click');
               }
             })
         </script>
          
        </div>
    </div>
</div> 
@endsection