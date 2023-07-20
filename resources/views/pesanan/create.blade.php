@extends('components.main_view')

@section('css')
    <style>
        .nama_clean{
            font-size: 13px;
        }

        .tgl{
            cursor: pointer;
        }
    </style>
@endsection

@section('container')
    <div class="container" style="margin-top:100px;">
        <div class="row">
            <div class="col-sm-12 d-flex justify-content-center align-items-center flex-column">
                <span class="h5">Isi Data Terlebih Dahulu !</span>
                <div class="col-sm-3 mt-3">
                    <form action="{{ route('less_data' , session('kode_pesanan')) }}" method="POST" id="less-pesanan" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        @if (!session('pesanan_filled'))
                        <div class="pemesan">
                            <input type="text" name="nama_pemesan" class="form-control mb-3" placeholder="Nama pemesan" style="height: 50px;" @if(!session('pesanan_filled')) required @endif>
                            <input type="text" name="no_hp" class="for_phone form-control mb-3" placeholder="No.Hp" style="height: 50px;" @if(!session('pesanan_filled')) required @endif>
                            <input type="text" name="alamat" class="form-control mb-3" placeholder="Alamat pemesan" style="height: 50px;" @if(!session('pesanan_filled')) required @endif>
                        </div>
                        @endif

                       <div class="detail-pesanan">
                      {{--   <input type="text" name="nama_sepatu" class="form-control mb-3" placeholder="Nama sepatu" style="height: 50px;" required> --}}
                        <label for="gmb" class="form-label mb-3" style="cursor: pointer;">
                            <img src="/image/shoes.png" id="img-preview" class="img-fluid rounded" style="width: 150px; height:150px; object-fit:cover; border:1px solid rgba(217, 180, 180 , 50%);">
                        </label>
                        @if ($errors->has('cleaning'))
                            <div class="text-center mb-2" style="font-size: .875em; color: #dc3545;">
                                {{ $errors->first('cleaning') }}
                            </div>
                        @endif
                        <input type="file" id="gmb" name="foto_sepatu" class="form-control mb-3 d-none" onchange="previewImage()"> 

                       <div class=" mb-3 rounded" style="background-color:#fff; padding:25px;">
                          <div class="d-flex w-100 justify-content-between">
                            <span class="h6">Normal Cleaning :</span>
                            <span class="tgl" id="normtgl"> <i class="fa-sharp fa-solid fa-bars"></i></span>
                          </div>
                            
                          <div id="normalclean">
                            @foreach ($cleanings_normal as $normal)
                            <div class="input-group mb-2">
                                <div class="input-group-text">
                                  <input class="input-check form-check-input mt-0" type="checkbox" data-target="#check{{ $normal->id }}" aria-label="Checkbox for following text input">
                                </div>
                                <input type="hidden" class="form-control d-none" name="cleaning[{{ $normal->id }}]" value="{{ $normal->id }}" id="check{{ $normal->id }}" readonly disabled>
                                <input type="text" class="nama_clean form-control" value="{{ $normal->nama_cleaning }}" readonly>
                                <div class="input-group-text">
                                    @php
                                        $format_price = number_format($normal->harga);
                                        $format_price = str_replace(',' , '.' , $format_price);
                                    @endphp
                                    <span class="text-muted" style="font-size:12px;">Rp. {{ $format_price }}</span>
                                </div>
                              </div>
                            @endforeach
                          </div>

                            <div class="d-flex w-100 justify-content-between">
                                <span class="h6">Repair :</span>
                                <span class="tgl" id="rprtgl"> <i class="fa-sharp fa-solid fa-bars"></i></span>
                              </div>

                            <div id="repairclean" style="display:none;">
                                @foreach ($cleanings_repair as $repair)
                                <div class="input-group mb-2">
                                    <div class="input-group-text">
                                      <input class="input-check form-check-input mt-0" type="checkbox" data-target="#check{{ $repair->id }}" aria-label="Checkbox for following text input">
                                    </div>
                                    <input type="hidden" class="form-control d-none" name="cleaning[{{ $repair->id }}]" value="{{ $repair->id }}" id="check{{ $repair->id }}" readonly disabled>
                                    <input type="text" class="nama_clean form-control" value="{{ $repair->nama_cleaning }}" readonly>
                                    <div class="input-group-text">
                                        @php
                                           $format_price = number_format($repair->harga );
                                           $format_price = str_replace(',' , '.' , $format_price);
                                       @endphp
                                        <span class="text-muted" style="font-size:12px;">Rp. {{ $format_price }}</span>
                                    </div>
                                  </div>
                                @endforeach
                            </div>

                            <div class="d-flex w-100 justify-content-between">
                                <span class="h6">Repaint :</span>
                                <span class="tgl" id="rpntgl"> <i class="fa-sharp fa-solid fa-bars"></i></span>
                              </div>
                              
                              <div id="repaintclean" style="display:none;">
                                @foreach ($cleanings_repaint as $repaint)
                            <div class="input-group mb-2">
                                <div class="input-group-text">
                                  <input class="input-check form-check-input mt-0" type="checkbox" data-target="#check{{ $repaint->id }}" aria-label="Checkbox for following text input">
                                </div>
                                <input type="hidden" class="form-control d-none" name="cleaning[{{ $repaint->id }}]" value="{{ $repaint->id }}" id="check{{ $repaint->id }}" readonly disabled>
                                <input type="text" class="nama_clean form-control" value="{{ $repaint->nama_cleaning }}" readonly>
                                <div class="input-group-text">
                                    @php
                                    $format_price = number_format($repaint->harga );
                                    $format_price = str_replace(',' , '.' , $format_price);
                                @endphp
                                    <span class="text-muted" style="font-size:12px;">Rp. {{ $format_price }}</span>
                                </div>
                              </div>
                            @endforeach
                              </div>

                       </div>
                       </div>
                       <div class="d-flex justify-content-center mb-4">
                        <button class=" btn univ_btn" id="pesanan">Buat Pesanan</button>
                       </div>
                    </form>
                </div>

                <script>
                    $('.input-check').change(function() {
                       // Ambil status checkbox saat ini
                       var isChecked = $(this).prop('checked');
                       
                       // Cari target input yang terkait dan aktifkan atau nonaktifkan sesuai dengan status checkbox
                       var targetInput = $($(this).data('target'));
                       targetInput.prop('disabled', !isChecked);
                       
                   });

               </script>

               <script>
                    $(document).ready(function(){
                        $('#normtgl').click(function(){
                            $('#normalclean').toggle('fast')
                        })
                        $('#rprtgl').click(function(){
                            $('#repairclean').toggle('fast')
                        })
                        $('#rpntgl').click(function(){
                            $('#repaintclean').toggle('fast')
                        })
                    })
               </script>
               
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="alert">
                    Launch static backdrop modal
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body d-flex flex-column text-center" style="padding: 25px;">
                            <span class="h5">Pesanan kamu berhasil dibuat!</span>
                            <span class="h5">Mau tambah pesanan lagi atau cukup?</span>
                        </div>
                        <div class="modal-footer d-flex justify-content-around">
                        <form action="{{ route('user.end.orders' , session('kode_pesanan')) }}" method="GET">
                            <button class="btn btn-secondary w-100">Cukup</button>
                        </form>
                        <button type="button" class="btn univ_btn w-25" data-bs-dismiss="modal">Tambah</button>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @if (session('pesanan_filled') && !$errors->has('cleaning'))
        <script>
            $(document).ready(function(){
                $('#alert').trigger('click');
            })
        </script>
    @endif


@endsection