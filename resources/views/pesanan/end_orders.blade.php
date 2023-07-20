@extends('components.main_view')

@section('css')
<link rel="stylesheet" href="/css/show_store.css">

<style>
    
</style>
@endsection

@section('container')
<div class="container" style="margin-top:100px;">
    <div class="row">
        <div class="col-sm-12 d-flex justify-content-center align-items-center">
            @foreach ($orders as $order)
            <div class="col-sm-4 me-4">
                @if ($order->market->foto_toko)
                   <img src="{{ asset('storage/' . $order->market->foto_toko) }}" alt="Gambar rusak" class="img-fluid rounded overflow-hidden" style="width: 100%; height:500px; object-fit: cover;">
                   @else
                   <img src="/image/toko.jpg" alt="Gambar rusak" class="img-fluid rounded overflow-hidden" style="width: 100%; height:500px; object-fit: cover;">
                   @endif
            </div>

            <div class="col-sm-4 text-end" id="detail">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                    
                           <span class="text-center h5">Pesanan Selesai</span>

                           <div class="rounded d-flex flex-column text-center mt-3" style="padding:10px; background-color: #F5F5F5; border:1px solid rgb(168, 161, 161 , 30%);">
                            <span class="fw-bold">ID : {{ $order->kode_pesanan }}</span>
                            @php
                                $format_price = number_format($order->harga_total);
                                $format_price = str_replace(',' , '.' ,  $format_price);
                            @endphp
                            <span class="fw-bold">TOTAL : Rp. {{ $format_price }}</span>

                            <span class="text-muted mt-2">{{ $order->market->nama_toko }}</span>
                            <span class="text-muted">{{ $order->market->alamat }}</span>
                        </div>

                        <span class="text-muted text-center mt-3">
                            Silahkan segera bawa sepatu anda dan lakukan pembayaran di toko, pesanan ini akan terhapus jika tidak ada proses selama 72 jam !
                        </span>

                        <form action="{{ route('dashboard') }}" method="GET">
                            <div class="d-flex justify-content-center">
                                <button class="btn univ_btn mt-4 w-75">Ke Dashboard</button>
                            </div>
                        </form>
                     
                    </div>
                  </div>
            </div>
            @endforeach
      

        </div>
    </div>
</div>
@endsection