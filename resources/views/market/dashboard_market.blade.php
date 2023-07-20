@extends('components.market_main')

@section('css')
    
@endsection

@section('container')
    <div class="container" style="margin-top:100px;">
        <div class="row">
            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
              <div class="col-md-9 ms-sm-auto col-lg-12 px-md-4">

                  @if (session('fill_market'))
                  <button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="alert">
                    Launch static backdrop modal
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body d-flex flex-column text-center" style="padding: 25px;">
                          <span class="h5 mt-4">{{ session('fill_market') }}</span> <br>
                     
                        @if (session('fill_market') == 'Selangkah lagi, ayo buat menu cleaning yang toko kamu tawarkan !')
                        <form action="{{ route('jenis_cleaning.create') }}" method="GET">
                          <input type="hidden" name="rasomon-cleaning-blury" class="d-none" value="{{ $slug_id }}" readonly>
                          <button class="btn univ_btn ">Lengkapi</button>
                        </form>
                        @else 
                        <form action="/market_shoes/{{ $slug_id }}/edit" method="GET">
                          <button class="btn univ_btn ">Lengkapi</button>
                        </form>
                        @endif

                        </div>
                       
                    </div>
                    </div>
                </div>
                  @endif


               <div class="d-flex justify-content-between align-items-center text-center">
               

                <div class="card rounded-circle" style="width: 250px; height:250px;">
          
                  <div class="card-body  d-flex flex-column justify-content-center align-items-center position-relative">
                    @if ($pending->count())
                    <span class="position-absolute top-0 end-0 translate-middle badge rounded-pill" id="notif" style="background-color: red; font-size:30px;">
                      {{ $pending->count() }}
                   </span>
                    @endif
                    <span><i class="fa-solid fa-car-side fa-lg" style="font-size: 60px;"></i></span>
                    <span class="mt-4">Menunggu sepatu dibawa ke toko.</span>
                    <a href="/market-pending-order/{{ $slug_id }}" class="text-decoration-none btn univ_btn mt-3">Lihat</a>
                  </div>
                </div>

                <div class="card rounded-circle" style="width: 250px; height:250px;">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center position-relative">
                    @if ($process->count())
                    <span class="position-absolute top-0 end-0 translate-middle badge rounded-pill" id="notif" style="background-color: red; font-size:30px;">
                      {{ $process->count() }}
                   </span>
                    @endif
                    <span><i class="fa-solid fa-spray-can-sparkles fa-lg" style="font-size: 60px;"></i></span>
                    <span class="mt-4">Sepatu dalam proses cleaning.</span>
                    <a href="/market-process-order/{{ $slug_id }}" class="text-decoration-none btn univ_btn mt-3">Lihat</a>
                  </div>
                </div>

                <div class="card rounded-circle" style="width: 250px; height:250px;">
                  <div class="card-body d-flex flex-column justify-content-center align-items-center position-relative">
                    @if ($done->count())
                    <span class="position-absolute top-0 end-0 translate-middle badge rounded-pill" id="notif" style="background-color: red; font-size:30px;">
                      {{ $done->count() }}
                   </span>
                    @endif
                    <span><i class="fa-solid fa-shoe-prints fa-lg" style="font-size: 60px;"></i></span>
                    <span class="mt-4">Sepatu sudah selesai dan siap diambil.</span>
                    <a href="/market-done-order/{{ $slug_id }}" class="text-decoration-none btn univ_btn mt-3">Lihat</a>
                  </div>
                </div>
               </div>
              </div>
              
            </div>
        </div>
    </div>   

    @if (session('fill_market'))
    <script>
      $(document).ready(function(){
               $('#alert').trigger('click');
     })
   </script>
    @endif


@endsection