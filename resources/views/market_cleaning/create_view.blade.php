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
    </style>
@endsection

@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="col-md-9 ms-sm-auto col-lg-12 px-md-4">

           <div class="d-flex flex-column text-center">
            <span class="h5 mt-4">Buat menu cleaning yang toko kamu tawarkan !</span>
               @if (session('success'))
               <div class="d-flex justify-content-center mt-4">
                <div class="alert alert-success alert-dismissible fade show w-25" role="alert">
                    <span class="fw-bold">{{ session('success') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            </div>
               @endif
            <hr class="mb-4">
           </div>

           <form action="{{ route('jenis_cleaning.store') }}" method="POST">
            @csrf
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-sm-5 d-flex flex-column justify-content-center">
                    <div class="mt-3">
                        <input type="text" name="nama_cleaning" class="form-control @error('nama_cleaning') is-invalid @enderror" placeholder="Nama Cleaning" value="{{ old('nama_cleaning') }}" required>
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
                            <option value="Repaint">Repaint</option>
                           @endif

                        </select>
                    </div>

                    <div class="mt-3">
                        <div class="input-group">
                            <span class="input-group-text text-muted">Rp.</span>
                            <input type="text" name="harga" class="for_money form-control @error('harga') is-invalid @enderror" placeholder="Harga Cleaning" value="{{ old('harga') }}" required>
                        </div>
                        @error('harga')
                        <div class="error-feedback">
                            <span>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>

                    <input type="hidden" name="rasomon_blury" value="{{ request('rasomon-cleaning-blury') }}" class="form-control d-none" readonly>
                    <div class="d-flex justify-content-center mt-4">
                        <button class="btn univ_btn w-75">Buat Cleaning</button>
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