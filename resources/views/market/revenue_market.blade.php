@extends('components.market_main')

@section('css')
<style>
    .today{ 
        padding:5px 10px;
    }

    .today:hover{
        background-color:cyan;
    }
</style>
@endsection

@section('container')
<div class="container" style="margin-top:50px;">
    <div class="row">
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
         <div class="col-md-9 ms-sm-auto col-lg-12 px-md-4">

            <div class="col-sm-12 d-flex justify-content-center align-items-center">
                <div class="me-4">
                    <form action="/user-revenue-market/{{ $market_shoe->slug_id }}" method="GET">
                    <input type="hidden" class="d-none" name="revenue-today" value="{{ $today }}" readonly>
                    <button class="today bg-light border border-dark"><span class="text-muted">Today</span></button>
                    </form>
                </div>
                <div class="w-75 me-4">
                    <form action="/user-revenue-market/{{ $market_shoe->slug_id }}" method="GET" class="d-flex">
                        <div class="input-group">
                            <input type="date" class="form-control bg-light border border-dark" name="revenue_first">
                            <span class="input-group-text border border-dark"><i class="fa-sharp fa-regular fa-calendar"></i></span>
                            <input type="date" class="form-control bg-light border border-dark" name="revenue_sec">
                            <button class="btn univ_btn text-white" id="button-addon2">Check</button>
                          </div>
                    </form>
                </div>
                <div class="ms-2">
                    <form action="/market-revenue-pdf/{{ $market_shoe->slug_id }}" method="GET" target="__blank">
                        <button class="btn btn-danger rounded-circle" style="padding:10px;"><span>PDF</span></button>
                    </form>
                </div>
            </div>
            
            <hr>

            <div class="col-sm-12 d-flex justify-content-between" style="margin-top:50px;">
                <div class="col-sm-5">
                    <div class="card">
                        <div class="card-body d-flex flex-column" style="padding:30px;">
                            <span class="fw-bold h5">Revenue</span>
                            <span class="fw-bold h3">
                                @php
                                      $total_revenue = 0;
                                      $rev_kemarin = 0;
                                @endphp  
                              
                                @foreach ($revenue_market as $revenue)
                                    @php
                                        $total_revenue += $revenue->harga_total;
                                    @endphp
                                @endforeach

                              Rp {{ str_replace(',' , '.' , number_format($total_revenue)) }}
                             
                            </span>
                            @if (!request('revenue_first') && !request('revenue_sec'))
                            <span class="text-muted">
                                @if ($revenue_kemarin->count())

                                @foreach ($revenue_kemarin as $kemarin)
                                @php
                                    $rev_kemarin += $kemarin->harga_total;
                                @endphp
                                @endforeach

                                   {{-- mencari persentasi revenue --}}
                                @php
                                   $selisih = $total_revenue - $rev_kemarin;
                                   $persentasi = ($selisih / $rev_kemarin) * 100; 
                               @endphp
                               

                                Yesterday {{ number_format($persentasi , 1) }}%
                                @else 
                                Yesterday 0.0%
                                @endif
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="card">
                        <div class="card-body d-flex flex-column" style="padding:30px;">
                            <span class="fw-bold h5">Orders</span>
                            <span class="fw-bold h3">{{ $revenue_market->count() }}</span>
                            @if (!request('revenue_first') && !request('revenue_sec'))
                            <span class="text-muted">
                                @if ($revenue_kemarin->count())
                                 @php
                                     /* mencari persentasi orders */
                                     $selisih2 = $revenue_market->count() - $revenue_kemarin->count();
                                     $persentasi2 = ($selisih2 / $revenue_kemarin->count()) * 100;      
                                 @endphp
 
                                 Yesterday {{ number_format($persentasi2 , 1) }}%
                                 @else
                                 Yesterday 0.0%
                                @endif
                             </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

         </div>
          
        </div>
    </div>
</div> 
@endsection