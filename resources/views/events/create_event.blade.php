@extends('components.main_view')

@section('css')
    <style>
        input{
            height: 50px;
        }
        .error-feedback{
            font-size: .875em;
            color: #dc3545;
        }
    </style>
@endsection

@section('container')
    <div class="container" style="margin-top:100px;">
        <div class="row">
            <div class="col-sm-12 d-flex justify-content-center align-items-center flex-column">
                <span class="h5">Lengkapi form Event berikut !</span>
                <div class="col-sm-3 mt-3">
                    <form action="/all-event" method="POST" id="less-pesanan" enctype="multipart/form-data">
                        @csrf
        
                       <div class="event-data">
                        <input type="text" name="judul_event" class="form-control mt-1 @error('judul_event') is-invalid @enderror" placeholder="Judul Event" value="{{ old('judul_event') }}"  required>
                        @error('judul_event')
                        <div class="error-feedback">
                         {{ $message }}
                        </div>
                        @enderror  

                        <label for="gmb" class="form-label mt-3" style="cursor: pointer;">
                            <img src="/image/shoes.png" id="img-preview" class="img-fluid rounded" style="width: 150px; height:150px; object-fit:cover; border:1px solid rgba(217, 180, 180 , 50%);">
                        </label>
                        <input type="file" id="gmb" name="foto_event" class="form-control mt-3 d-none" onchange="previewImage()" required> 
                       
                        <div class="form-floating mt-3">
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px;"  required>{{ old('deskripsi') }}</textarea>
                            <label for="floatingTextarea2" class="text-muted">Isi deskripsi Event</label>
                        </div>
                        @error('deskripsi')
                        <div class="error-feedback">
                         {{ $message }}
                        </div>
                        @enderror  

                        <div class="mt-4">
                            <span class="text-muted">Pilih Durasi</span>
                        </div>
                        <select name="durasi" id="durasi" class="form-select mt-2 mb-3 @error('durasi') is-invalid @enderror" required>
                            <option value="3" @if(old('durasi') == '3') selected @endif>3 Hari</option>
                            <option value="7" @if(old('durasi') == '7') selected @endif>1 Minggu</option>
                            <option value="31" @if(old('durasi') == '31') selected @endif>1 Bulan</option>
                        </select>
                        @error('durasi')
                           <div class="error-feedback">
                            {{ $message }}
                           </div>
                        @enderror

                       </div>
                       <div class="d-flex justify-content-center mb-4">
                        <button class=" btn univ_btn w-50" id="pesanan">Buat Event</button>
                       </div>
                    </form>
                </div>
                

            </div>
        </div>
    </div>

   
 
@endsection