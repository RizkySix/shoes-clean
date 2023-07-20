@extends('components.market_main')

@section('css')
<style>
  .text-order{
      font-size: 12px;
  }
</style>
@endsection

@section('container')
<div class="container-fluid" style="margin-top:50px;">
  <div class="row">
      <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="col-md-9 ms-sm-auto col-lg-12 px-md-12">



         <div class=" d-flex justify-content-between align-items-center flex-wrap">

          <div class="col-sm-12 me-auto">
            <form action="/market-process-order/{{ $slug_id }}" method="GET">
              <div class="col-sm-4">
                <div class="input-group">
                  <input type="text" name="search" class="form-control" placeholder="Cari kode pesanan..." style="height: 50px;" value="{{ request('search') }}"> 
                  <button class="btn univ_btn" style="width:80px;"><i class="fa-sharp fa-solid fa-magnifying-glass fa-lg"></i></button>
              </div>
              </div>
            </form>
          </div>

          <div class="col-sm-12 mb-4">
            <hr>
          </div>
           

            @if ($all_pesanan->count())
            @foreach ($all_pesanan as $orders)
            <div class="col-sm-5 me-4">
              <div class="card mb-3">
                  <div class="card-header text-center">
                     <span class="text-capitalize">{{ $orders->status_pesanan }} @if ($orders->status_pesanan == 'cancel')
                         <span class="text-muted" style="color:red">({{ $orders->dibatalkan }})</span>
                     @endif</span>
                    </div>
                  <div class="card-body">
                     <div class="d-flex text-center">

                      <div class="d-flex flex-column w-100">
                          <a href="#" class="text-decoration-none">{{ $orders->market->nama_toko }}</a>
                          
                          <div class="rounded d-flex flex-column text-center mt-3" style="padding:10px; background-color: #F5F5F5; border:1px solid rgb(168, 161, 161 , 30%);">
                              <span class="fw-bold">ID : {{ $orders->kode_pesanan }}</span>
                              @php
                              $format_price = number_format($orders->harga_total);
                              $format_price = str_replace(',' , '.' ,  $format_price);
                             @endphp
                              <span class="fw-bold">TOTAL : Rp. {{ $format_price }}</span>
                          

                              <div class="mt-3 d-flex flex-column">
                                <span class="fw-bold">Informasi Pemesan :</span>
                                <span class="text-muted">Nama ({{ $orders->nama_pemesan }})</span>
                                <span class="text-muted">No WhatssApp ({{ $orders->no_hp }})</span>
                                <span class="text-muted">Alamat ({{ $orders->alamat }})</span>
                              </div>
                          </div>
                          
                          <div class="d-flex mt-4">
                            @if ($orders->pesanan_diantar == true)
                            <form action="/pesanan/{{ $orders->kode_pesanan }}" method="POST" class="me-auto" id="pending{{ $orders->id }}">
                              @csrf
                              @method('put')
                              <input type="hidden" name="process" value="{{ hash('sha256' , 'process-data-cant-be-forget') }}" class="d-none">
                              <button type="button" class="btn univ_btn" id="proses{{ $orders->id }}">Sepatu Selesai</button>
                            </form>
                            @else
                            <button type="button" class="btn btn-danger me-auto">Sepatu Selesai</button>
                            @endif
                          <span class="icon " style="cursor: pointer;" id="detailtgl{{ $orders->id }}"> <i class="fa-sharp fa-solid fa-bars"></i></span>
                          </div>
                      </div>
                     </div>


                      <hr>
                      <div class="" id="theDetail{{ $orders->id }}" style="display:none;">

                          <table class="table">
                              <thead>
                                <tr class="text-order">
                                  <th scope="col">Foto Sepatu</th>
                                  <th scope="col">Jenis Cleaning</th>
                                  <th scope="col">Price</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($details as $detail)
                                  @if ($detail->pesanan_id == $orders->id)
                                  <tr class="text-order">
                                      <td>
                                        @if ($detail->foto_sepatu)
                                            <img src="{{ asset('storage/' . $detail->foto_sepatu) }}" alt="Gambar wrong" class="img-fluid rounded-circle" style="width: 40px; height:40px; object-fit:cover;">
                                        @else
                                            <img src="/image/shoes.png" alt="Gambar wrong" class="img-fluid rounded-circle" style="width: 40px; height:40px; object-fit:cover;">
                                        @endif
                                      </td>

                                  
                                      <td>
                                          @foreach ($detail->cleanings as $cleaning)
                                              {{ $cleaning->nama_cleaning }}, <br>
                                          @endforeach
                                      </td>
                                      <td style="width:20%;">
                                      @foreach ($detail->cleanings as $cleaning)
                                      @php
                                      $format_price = number_format( $cleaning->harga);
                                      $format_price = str_replace(',' , '.' ,  $format_price);
                                     @endphp
                                          Rp. {{ $format_price }} <br>
                                      @endforeach
                                      </td>

                                  </tr>
                                  @endif
                              @endforeach
                              </tbody>
                            </table>

                      </div>
                      <script>
                          $(document).ready(function(){
                              $('#detailtgl{{ $orders->id }}').click(function(){
                                  $('#theDetail{{ $orders->id }}').toggle('fast')
                              })

                              $('#proses{{ $orders->id }}').click(function(){
                                Swal.fire({
                                            title: 'Proses Sepatu?',
                                            text: "Pastikan sepatu sudah berada di toko!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Proses!'
                                            }).then((result) => {
                                            if (result.isConfirmed) {
                                               $('#pending{{ $orders->id }}').trigger('submit')
                                            }
                                            })
                              })
                            
                          })
                      </script>

                  </div>
                </div>
          </div>
            @endforeach

            <div class="pros col-sm-12 justify-content-center mt-4">
              <span>
                {{ $all_pesanan->links() }}
              </span>
          </div>
            @else
            <div class="pros col-sm-12">
              <span class=" d-flex justify-content-center" style="font-size:150px; color:rgb(179, 172, 172)">
                  <i class="fa-sharp fa-solid fa-file-lines"></i>
              </span>
              <p class="text-center mt-4" style="font-size:24px; color:rgb(179, 172, 172)">
                  Tidak ada sepatu yang sedang diproses!
              </p>
          </div>
          @endif
          
           
           </div>
          </div>
          
        </div>
    </div>
</div> 
@endsection