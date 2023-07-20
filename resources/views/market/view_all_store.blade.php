@extends('components.main_view')

@section('css')
    
@endsection

@section('container')
    <div class="container" style="margin-top:50px">
        <div class="row">
            <div class="col-sm-12 d-flex justify-content-between mb-3">
               <div class="col-sm-6 d-flex">
                <form action="/market_shoes" method="GET" class="me-3" style="width:60%;">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari nama toko..." style="height: 50px;" value="{{ request('search') }}"> 
                        <button class="btn univ_btn" style="width:80px;"><i class="fa-sharp fa-solid fa-magnifying-glass fa-lg"></i></button>
                    </div>
                </form>
                <form action="/market_shoes" method="GET">
                    <select name="filter" id="filter" class="form-select h-100">
                        <option value="default" selected>Default</option>
                        <option value="terdekat" @if(request('filter')  == 'terdekat') selected @endif>Terdekat</option>
                        <option value="rating" @if(request('filter')  == 'rating') selected @endif>Rating</option>
                    </select>

                    <button class="d-none" id="filterBtn">Filter</button>
                </form>
               </div>
               <div class="col-sm-4 text-end">
                <span class="h4">SHOES CLEAN</span>
               </div>
            </div>
            <hr>

            <div class="col-sm-12 d-flex justify-content-around mt-4 flex-wrap">
                @if($markets->count())
               @foreach ($markets as $market)
               <div class="col-sm-4 me-4 mb-4" style="cursor: pointer;" id="card{{ $market->id }}">
                <div class="card">
                    <div class="card-body d-flex">
                        @if ($market->foto_toko)
                        <img src="{{ asset('storage/'. $market->foto_toko) }}" alt="gambar toko rusak" class="img-fluid rounded-circle me-3" style="width:80px; height:80px; object-fit:cover;">
                        @else
                        <img src="/image/M.png" alt="gambar toko rusak" class="img-fluid rounded-circle me-3" style="width:80px; height:80px; object-fit:cover;">
                        @endif
                    <div class="info-toko me-auto w-50">
                        <span class="h6">{{ $market->nama_toko }}</span>
                        <p class="text-muted">{{ $market->alamat }}</p>
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
                  </div>
            </div>
            <form action="{{ route('market_shoes.show' , $market->slug_id) }}" method="GET" class="d-none" id="link{{ $market->id }}"></form>

            <script>
                $(document).ready(function(){
                    $('#card{{ $market->id }}').click(function(){
                        $('#link{{ $market->id }}').trigger('submit');
                    })

                    $('#filter').change(function(){
                        $('#filterBtn').trigger('click');
                    });
                })
            </script>

               @endforeach
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $markets->links() }}
            </div>
            @endif
        </div>
    </div>
@endsection