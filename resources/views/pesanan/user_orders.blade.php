@extends('components.main_view')

@section('css')
    <style>
        .text-order{
            font-size: 12px;
        }
        .stars{
        cursor: pointer;
        }

        .star{
        /*  color:rgb(219, 219, 48); */
        color: rgb(85, 74, 74);
        }
        .star label i.fa-star.active, .star label i:hover {
            color:rgb(219, 219, 48);
        }


        .vertical-line {
        display: inline-block;
        width: 1px;
        height: auto;
        background-color: black;
        margin: 0 10px;
        padding: 10px 0;
        }
        .opt1{
            color:blue;
        }

        .opt2{
            color:black;
        }

    </style>
@endsection

@section('container')
    <div class="container" style="margin-top:100px;">
        <div class="row">
            <div class="col-sm-12 d-flex justify-content-around flex-wrap">

                <div class="col-sm-8  d-flex justify-content-center">
                    <div class="card col-sm-5 ">
                        <div class="card-body d-flex justify-content-around">
                        <div class="sepatu active d-flex flex-column text-center" style="cursor: pointer;">
                            <span><i class="opt1 fa-sharp fa-solid fa-socks fa-lg"></i></span>
                            <a type="button" class="opt1 text-decoration-none">On Process</a>
                        </div>
                        <div class="vertical-line"></div>
                        <div class="clean d-flex flex-column text-center" style="cursor: pointer;">
                            <span><i class="opt2 fa-sharp fa-solid fa-soap fa-lg"></i></span>
                            <a type="button" class="opt2  text-decoration-none">History</a>
                        </div>
                        </div>
                      </div>
                </div>
                <div class="col-sm-12 mb-4">
                    <hr>
                </div>

                <div class="col-sm-12">
                    <div class="data-null mt-4">
                        @if ($on_proses == 0)
                        <div class="pros">
                            <span class=" d-flex justify-content-center" style="font-size:150px; color:rgb(179, 172, 172)">
                                <i class="fa-sharp fa-solid fa-file-lines"></i>
                            </span>
                            <p class="text-center mt-4" style="font-size:24px; color:rgb(179, 172, 172)">
                                Kamu belum memiliki sepatu yang sedang diproses!
                            </p>
                        </div>
                         @endif
    
                         @if ($done == 0)
                            <div class="dn" style="display:none">
                                <span class=" d-flex justify-content-center" style="font-size:150px; color:rgb(179, 172, 172)">
                                    <i class="fa-sharp fa-solid fa-file-lines"></i>
                                </span>
                                <p class="text-center mt-4" style="font-size:24px; color:rgb(179, 172, 172)">
                                    Kamu tidak memiliki riwayat pesanan!
                                </p>
                            </div>
                          @endif
                    </div>
                </div>

                @if ($user_orders->count())
                  @foreach ($user_orders as $orders)
                  <div class="@if($orders->dinilai == true) done_order @else proses_order @endif col-sm-5 me-3 animate__animated animate__fadeIn animate__slow"  @if($orders->dinilai == true) style="display:none" @endif>
                    <div class="card mb-3">
                        <div class="card-header d-flex">
                           <span class="text-capitalize me-auto">{{ $orders->status_pesanan }}</span>
                           @if ($orders->pesanan_diantar == false)
                           <form action="/pesanan/{{ $orders->kode_pesanan }}" method="POST">
                            @csrf
                            @method('put')
                                <input type="hidden" name="diantar" value="{{ hash('sha256' , 'Diantar') }}" class="d-none">
                                <button class="btn univ_btn text-order">Pesanan diantar</button>
                           </form>  
                           @else
                           <span><i class="fa-sharp fa-solid fa-circle-check fa-lg" style="color:goldenrod;"></i></span>
                           @endif
                          </div>
                        <div class="card-body">
                           <div class="d-flex">
                            <div style="width:300px; height:auto;" class="me-3">
                                @if ($orders->market->foto_toko)
                                <img src="{{ asset('storage/' . $orders->market->foto_toko) }}" alt="gambar rusak" class="img-fluid rounded me-3" style="width:200px; height:200px; object-fit:cover;">
                                @else
                                <img src="/image/toko.jpg" alt="gambar rusak" class="img-fluid rounded me-3" style="width:200px; height:200px; object-fit:cover;">
                                @endif
                              <!-- Split dropup button -->
                                @if ($orders->status_pesanan == 'pending')
                                @if($orders->pesanan_diantar == false)
                                <div class="btn-group dropup mt-3">
                                    <button type="button" class="btn btn-danger text-order" style="width: 75%;">
                                    Batalkan
                                    </button>
                                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <div class="dropdown-menu">
                                        <form action="{{ route('cancel.user.orders' , $orders->kode_pesanan) }}" method="POST">
                                            @csrf
                                            @method('put')

                                            <span class="dropdown-item fw-bold text-order">Alasan pembatalan ?</span>
                                          <span><hr class="dropdown-divider"></span>
                                          <span class="dropdown-item" id="triggers1{{ $orders->id }}">
                                            <label for="reason1{{ $orders->id }}" class="form-label text-order">
                                                Mengganti jenis cleaning
                                            </label>
                                            <input type="radio" class="form-check-input d-none" name="cancel_reason" value="Mengganti jenis cleaning" id="reason1{{ $orders->id }}">
                                          </span>
                                          <span class="dropdown-item" id="triggers2{{ $orders->id }}">
                                            <label for="reason2{{ $orders->id }}" class="form-label text-order">
                                                Mengganti metode
                                            </label>
                                            <input type="radio" class="form-check-input d-none" name="cancel_reason" value="Mengganti metode" id="reason2{{ $orders->id }}">
                                          </span>
                                          <span class="dropdown-item" id="triggers3{{ $orders->id }}">
                                            <label for="reason3{{ $orders->id }}" class="form-label text-order">
                                              Lainnya
                                            </label>
                                            <input type="radio" class="form-check-input d-none" name="cancel_reason" value="Lainnya" id="reason3{{ $orders->id }}">
                                          </span>

                                          <button class="d-none" id="form_cancel{{ $orders->id }}">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                                @endif
                                @else
                                    @if ($orders->status_pesanan == 'done' && $orders->dinilai == true)
                                        <form action="/pesanan/{{ $orders->kode_pesanan }}" method="POST" id="donedel{{ $orders->id }}">
                                            @csrf
                                            @method('delete')
                                            <div class="mt-3">
                                                <input type="hidden" name="doneOrder" value="{{ hash('sha256' , 'the-order-was-done') }}" class="d-none">
                                                <button type="button" class="btn univ_btn text-order text-capitalize" id="done{{ $orders->id }}">
                                                    Hapus
                                                </button>
                                            </div>
                                        </form>
                                    @elseif($orders->status_pesanan == 'done' && $orders->dinilai == false)
                                    <form action="/pesanan/{{ $orders->kode_pesanan }}" method="POST" id="dinilai{{ $orders->id }}">
                                        @csrf
                                        @method('put')
                                        <div class="mt-3">
                                            <input type="hidden" name="dinilaiOrder" value="{{ hash('sha256' , 'the-order-was-great') }}" class="d-none">
                                            <button type="button" class="btn univ_btn text-order text-capitalize" id="nilai{{ $orders->id }}">
                                               {{ $orders->status_pesanan }}
                                            </button>
                                        </div>
                                    </form>
                                    @else
                                    <div class="mt-3">
                                        @if ($orders->status_pesanan != 'on process')
                                        <button type="button" class="btn univ_btn text-order text-capitalize">
                                            {{ $orders->status_pesanan }}
                                        </button>
                                        @endif
                                    </div>
                                    @endif
                                @endif
                            </div>

                            <div class="d-flex flex-column w-100">
                                <a href="#" class="text-decoration-none">{{ $orders->market->nama_toko }}</a>
                                
                                <div class="rounded d-flex flex-column text-center mt-3" style="padding:10px; background-color: #F5F5F5; border:1px solid rgb(168, 161, 161 , 30%);">
                                    <span class="fw-bold">ID : {{ $orders->kode_pesanan }}</span>
                                        @php
                                            $format_price = number_format($orders->harga_total);
                                            $format_price = str_replace(',' , '.' ,  $format_price);
                                        @endphp
                                    <span class="fw-bold">TOTAL : Rp. {{  $format_price }}</span>
                                    <span class="text-muted mt-2">{{ $orders->market->alamat }}</span>
                                </div>

                                <span class="icon text-end  mt-auto" style="cursor: pointer;" id="detailtgl{{ $orders->id }}"> <i class="fa-sharp fa-solid fa-bars"></i></span>
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
                                                $format_price = number_format($cleaning->harga);
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

                                    $('#reason1{{ $orders->id }}').click(function(){
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
                                               $('#form_cancel{{ $orders->id }}').trigger('click')
                                            }
                                            })
                                    })
                                    $('#reason2{{ $orders->id }}').click(function(){
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
                                               $('#form_cancel{{ $orders->id }}').trigger('click')
                                            }
                                            })
                                    })
                                    $('#reason3{{ $orders->id }}').click(function(){
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
                                               $('#form_cancel{{ $orders->id }}').trigger('click')
                                            }
                                            })
                                    })

                                    $('#nilai{{ $orders->id }}').click(function(){
                                        Swal.fire({
                                            title: 'Selesaikan Pesanan?',
                                            text: "Pastikan sepatu anda sudah diterima!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Yes, selesai!'
                                            }).then((result) => {
                                            if (result.isConfirmed) {
                                               $('#dinilai{{ $orders->id }}').trigger('submit')
                                            }
                                            })
                                    })

                                    $('#done{{ $orders->id }}').click(function(){
                                        Swal.fire({
                                            title: 'Hapus History?',
                                            text: "Pastikan sepatu anda sudah diterima!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Yes, selesai!'
                                            }).then((result) => {
                                            if (result.isConfirmed) {
                                               $('#donedel{{ $orders->id }}').trigger('submit')
                                            }
                                            })
                                    })
                                })
                            </script>

                        </div>
                      </div>
                </div>
                  @endforeach


                @endif

               
                 
            </div>

            {{-- Rating Market --}}
          
               @if (session('rating'))
               <button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#ratingModal" id="ratingDone">
                Rating Buttin
              </button>
              
              <!-- Modal -->
              <div class="modal fade" id="ratingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    
                      <form action="{{ route('rating' , session('rating')) }}" method="POST">
                      <div class="modal-body text-center">
                          <span class="h5 text-center mt-4 ">Ayo berikan penilaian untuk mendukung toko ini !!</span>
                       
                              @csrf
                              @method('put')
                              <div class="rating mt-4">
                                  <span class="h6 d-flex justify-content-center">
  
                                      <div class="star" style="font-size:21px;">
                                          <label for="star1" class="stars me-2" id="theStar1">
                                              <i class="fa-sharp fa-solid fa-star fa-lg"></i>
                                          </label>
                                          <label for="star2" class="stars me-2" id="theStar2">
                                              <i class="fa-sharp fa-solid fa-star fa-lg"></i>
                                          </label>
                                          <label for="star3" class="stars me-2" id="theStar3">
                                              <i class="fa-sharp fa-solid fa-star fa-lg"></i>
                                          </label>
                                          <label for="star4" class="stars me-2" id="theStar4">
                                              <i class="fa-sharp fa-solid fa-star fa-lg"></i>
                                          </label>
                                          <label for="star5" class="stars me-2" id="theStar5">
                                              <i class="fa-sharp fa-solid fa-star fa-lg"></i>
                                          </label>
                                      </div>
                                     <div class="d-none">
                                      <input type="radio" class="form-check-input" name="rating" id="star1" value="1">
                                      <input type="radio" class="form-check-input" name="rating" id="star2" value="2">
                                      <input type="radio" class="form-check-input" name="rating" id="star3" value="3">
                                      <input type="radio" class="form-check-input" name="rating" id="star4" value="4">
                                      <input type="radio" class="form-check-input" name="rating" id="star5" value="5">
                                     </div>
                                    
                                  </span>
                              </div>
                           
                          
                      </div>
                      <div class="modal-footer">
                     {{--  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Lain Kali</button> --}}
                      <button id="nilai_btn" type="button" class="btn univ_btn ">Beri Penilaian</button>
                      </div>
                  </form>

                  </div>
                  </div>
              </div>
               @endif
               
               <script>
                    $(document).ready(function(){
                        if({{ session('rating') }}){
                            $('#ratingDone').trigger('click')
                        }
                    })
               </script>

                <script>
                    //thanks chatpgt
                    // Mendaftarkan event click pada bintang
                    $(document).ready(function(){
                        const but = document.getElementById('nilai_btn');
                        $(".star label i").on("click", function() {
                            but.type = "submit"
                        // Menandai bintang yang di-klik dan bintang-bintang sebelumnya
                        $(this).addClass("active");
                        $(this).parent().prevAll().find('i').addClass("active");
                        
                        // Menghapus penanda pada bintang-bintang setelah yang di-klik
                        $(this).parent().nextAll().find('i').removeClass("active");
                        
                    });

                    $(".star label i").hover(function() {
                        // Menandai bintang yang di-klik dan bintang-bintang sebelumnya
                        $(this).addClass("active");
                        $(this).parent().prevAll().find('i').addClass("active");
                        
                        // Menghapus penanda pada bintang-bintang setelah yang di-klik
                        $(this).parent().nextAll().find('i').removeClass("active");
                        
                    });
                    
                    })
                </script>

                <script>
                    $(document).ready(function(){
                        $('.opt1').click(function(){
                            $('.opt1').css('color' , 'blue');
                            $('.opt2').css('color' , 'black');
                            $('.proses_order').show()
                            $('.done_order').hide()
                            $('.pros').show()
                            $('.dn').hide()
                        })

                        $('.opt2').click(function(){
                            $('.opt1').css('color' , 'black');
                             $('.opt2').css('color' , 'blue');
                            $('.proses_order').hide()
                            $('.done_order').show()
                            $('.dn').show()
                            $('.pros').hide()
                        })
                    })
                </script>

        </div>
    </div>
@endsection