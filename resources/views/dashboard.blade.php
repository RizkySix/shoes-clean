@extends('components.main_view')

@section('css')
    <style>
        .logo_img{
            box-shadow: -10px 10px 5px rgb(92, 82, 82);
        }
        .logo_img2{
            box-shadow: 10px 10px 5px rgb(92, 82, 82);
        }
        .edt{
            cursor: pointer;
        }
        input{
            height: 50px;
        }
    </style>
@endsection

@section('container')
    <div class="container" style="margin-top:100px; margin-bottom:300px;">
        <div class="row">
          @if ($das_konten->count())
           @foreach ($das_konten as $konten)
           <div class="col-sm-12 d-flex justfiy-content-around">
            <a class="w-50" href="{{ route('market_shoes.index') }}">
              @if ($konten->foto_konten1)
              <img src="{{ asset('storage/' . $konten->foto_konten1) }}" alt="logo rusak" class="logo_img img-fluid overflow-hidden rounded w-100" style=" height:300px; object-fit:cover;">
              @else
              <img src="/image/M.png" alt="logo rusak" class="logo_img img-fluid overflow-hidden rounded w-100" style=" height:300px; object-fit:cover;">
              @endif
            </a>
            <div class="texts ms-4 w-50">
                <a href="{{ route('market_shoes.index') }}" class="h3 text-decoration-none" id="shs_clean">{{ $konten->judul1 }}  
                </a>
                 <!-- Button trigger modal -->
                 @can('admin')
                 <span data-bs-toggle="modal" data-bs-target="#konten1" class="edt ms-4" style="color:goldenrod">
                    <i class="fa-solid fa-file-pen"></i>
                </span>
                @endcan

                <!-- Modal -->
                <div class="modal fade" id="konten1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Content</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/dashboard-content-admin/1" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                           
                                @csrf
                                @method('put')
                                <input type="text" placeholder="Judul" class="form-control mt-3" name="judul1" value="{{ old('judul1'  , $konten->judul1) }}">
                                <div class="form-floating mt-3">
                                    <textarea class="form-control @error('deskripsi1') is-invalid @enderror" name="deskripsi1" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px;"  required>{{ old('deskripsi1' , $konten->deskripsi1) }}</textarea>
                                    <label for="floatingTextarea2" class="text-muted">Isi deskripsi</label>
                                </div>

                                <label for="gmb" class="form-label mt-3" style="cursor: pointer;">
                                    @if ($konten->foto_konten1)
                                    <img src="{{ asset('storage/' . $konten->foto_konten1) }}" id="img-preview" class="img-preview img-fluid rounded" style="width: 150px; height:150px; object-fit:cover; border:1px solid rgba(217, 180, 180 , 50%);">
                                    @else
                                    <img src="/image/shoes.png" id="img-preview" class="img-preview img-fluid rounded" style="width: 150px; height:150px; object-fit:cover; border:1px solid rgba(217, 180, 180 , 50%);">
                                    @endif
                                    <input type="file" id="gmb" name="foto_konten1" class="gmb form-control mt-3 d-none" onchange="previewImage()" > 
                                </label>
                          
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
               
               <p class="h5 text-muted">
                {!! $konten->deskripsi1 !!}
               </p>
            </div>
        </div>

        <div class="col-sm-12 d-flex justfiy-content-around" style="margin-top:50px;">
            <div class="texts ms-4 w-50">
                <a href="{{ route('user.view.orders') }}" class="h3 text-decoration-none">{{ $konten->judul2 }}</a>
                   <!-- Button trigger modal -->
                   @can('admin')
                   <span data-bs-toggle="modal" data-bs-target="#konten2" class="edt ms-4" style="color:goldenrod">
                    <i class="fa-solid fa-file-pen"></i>
                </span>
                @endcan

                <!-- Modal -->
                <div class="modal fade" id="konten2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Content</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/dashboard-content-admin/1" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                           
                                @csrf
                                @method('put')
                                <input type="text" placeholder="Judul" class="form-control mt-3" name="judul2" value="{{ old('judul2'  , $konten->judul2) }}">
                                <div class="form-floating mt-3">
                                    <textarea class="form-control @error('deskripsi2') is-invalid @enderror" name="deskripsi2" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px;"  required>{{ old('deskripsi2' , $konten->deskripsi2) }}</textarea>
                                    <label for="floatingTextarea2" class="text-muted">Isi deskripsi</label>
                                </div>

                                <label for="gmb2" class="form-label mt-3" style="cursor: pointer;">
                                    @if ($konten->foto_konten2)
                                    <img src="{{ asset('storage/' . $konten->foto_konten2) }}" id="img-preview2" class="img-preview img-fluid rounded" style="width: 150px; height:150px; object-fit:cover; border:1px solid rgba(217, 180, 180 , 50%);">
                                    @else
                                    <img src="/image/shoes.png" id="img-preview2" class="img-preview img-fluid rounded" style="width: 150px; height:150px; object-fit:cover; border:1px solid rgba(217, 180, 180 , 50%);">
                                    @endif
                                    <input type="file" id="gmb2" name="foto_konten2" class="gmb form-control mt-3 d-none" onchange="previewImage2()" > 
                                </label>
                          
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
               <p class="h5 text-muted">
                {!! $konten->deskripsi2 !!}
               </p>
            </div>
            <a href="{{ route('user.view.orders') }}" class="w-50">
                @if ($konten->foto_konten2)
                <img src="{{ asset('storage/' . $konten->foto_konten2) }}" alt="logo rusak" class="logo_img2 img-fluid overflow-hidden rounded w-100" style=" height:300px; object-fit:cover;">
                @else
                <img src="/image/M.png" alt="logo rusak" class="logo_img2 img-fluid overflow-hidden rounded w-100" style=" height:300px; object-fit:cover;">
                @endif
            </a>
        </div>

        <div class="col-sm-12 d-flex justfiy-content-around" style="margin-top:50px;">
            <a href="/jenis-clean-sepatu" class="w-50">
                @if ($konten->foto_konten3)
              <img src="{{ asset('storage/' . $konten->foto_konten3) }}" alt="logo rusak" class="logo_img img-fluid overflow-hidden rounded w-100" style=" height:300px; object-fit:cover;">
              @else
              <img src="/image/M.png" alt="logo rusak" class="logo_img img-fluid overflow-hidden rounded w-100" style=" height:300px; object-fit:cover;">
              @endif
            </a>
            <div class="texts ms-4 w-50">
                <a href="/jenis-clean-sepatu" class="h3 text-decoration-none">{{ $konten->judul3 }}</a>
                   <!-- Button trigger modal -->
                   @can('admin')
                   <span data-bs-toggle="modal" data-bs-target="#konten3" class="edt ms-4" style="color:goldenrod">
                    <i class="fa-solid fa-file-pen"></i>
                </span>
                @endcan

                <!-- Modal -->
                <div class="modal fade" id="konten3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Content</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/dashboard-content-admin/1" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                           
                                @csrf
                                @method('put')
                                <input type="text" placeholder="Judul" class="form-control mt-3" name="judul3" value="{{ old('judul3'  , $konten->judul3) }}">
                                <div class="form-floating mt-3">
                                    <textarea class="form-control @error('deskripsi3') is-invalid @enderror" name="deskripsi3" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px;"  required>{{ old('deskripsi3' , $konten->deskripsi3) }}</textarea>
                                    <label for="floatingTextarea2" class="text-muted">Isi deskripsi</label>
                                </div>

                                <label for="gmb3" class="form-label mt-3" style="cursor: pointer;">
                                    @if ($konten->foto_konten3)
                                    <img src="{{ asset('storage/' . $konten->foto_konten3) }}" id="img-preview3" class="img-fluid rounded" style="width: 150px; height:150px; object-fit:cover; border:1px solid rgba(217, 180, 180 , 50%);">
                                    @else
                                    <img src="/image/shoes.png" id="img-preview3" class="img-fluid rounded" style="width: 150px; height:150px; object-fit:cover; border:1px solid rgba(217, 180, 180 , 50%);">
                                    @endif
                                    <input type="file" id="gmb3" name="foto_konten3" class="form-control mt-3 d-none" onchange="previewImage3()" > 
                                </label>
                          
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
               <p class="h5 text-muted">
                {!! $konten->deskripsi3 !!}
               </p>
            </div>
        </div>

        <div class="col-sm-12 d-flex justfiy-content-around" style="margin-top:50px;">
            <div class="texts ms-4 w-50">
                <a href="/all-event" class="h3 text-decoration-none">{{ $konten->judul4 }}</a>
                   <!-- Button trigger modal -->
                   @can('admin')
                   <span data-bs-toggle="modal" data-bs-target="#konten4" class="edt ms-4" style="color:goldenrod">
                    <i class="fa-solid fa-file-pen"></i>
                </span>
                @endcan

                <!-- Modal -->
                <div class="modal fade" id="konten4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Content</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/dashboard-content-admin/1" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                           
                                @csrf
                                @method('put')
                                <input type="text" placeholder="Judul" class="form-control mt-3" name="judul4" value="{{ old('judul4'  , $konten->judul4) }}">
                                <div class="form-floating mt-3">
                                    <textarea class="form-control @error('deskripsi4') is-invalid @enderror" name="deskripsi4" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px;"  required>{{ old('deskripsi4' , $konten->deskripsi4) }}</textarea>
                                    <label for="floatingTextarea2" class="text-muted">Isi deskripsi</label>
                                </div>

                                <label for="gmb4" class="form-label mt-3" style="cursor: pointer;">
                                    @if ($konten->foto_konten4)
                                    <img src="{{ asset('storage/' . $konten->foto_konten4) }}" id="img-preview4" class="img-fluid rounded" style="width: 150px; height:150px; object-fit:cover; border:1px solid rgba(217, 180, 180 , 50%);">
                                    @else
                                    <img src="/image/shoes.png" id="img-preview4" class="img-fluid rounded" style="width: 150px; height:150px; object-fit:cover; border:1px solid rgba(217, 180, 180 , 50%);">
                                    @endif
                                    <input type="file" id="gmb4" name="foto_konten4" class="form-control mt-3 d-none" onchange="previewImage4()" > 
                                </label>
                          
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
               <p class="h5 text-muted">
                {!! $konten->deskripsi4 !!}
               </p>
            </div>
           <a href="/all-event" class="w-50">
            @if ($konten->foto_konten4)
            <img src="{{ asset('storage/' . $konten->foto_konten4) }}" alt="logo rusak" class="logo_img2 img-fluid overflow-hidden rounded w-100" style=" height:300px; object-fit:cover;">
            @else
            <img src="/image/M.png" alt="logo rusak" class="logo_img2 img-fluid overflow-hidden rounded w-100" style=" height:300px; object-fit:cover;">
            @endif
           </a>
        </div>
           @endforeach 

            
          @else
          <div class="col-sm-12 d-flex justfiy-content-around">
            <a class="w-50" href="{{ route('market_shoes.index') }}">
                <img src="/image/M.png" alt="logo rusak" class="logo_img img-fluid overflow-hidden rounded w-100" style=" height:300px; object-fit:cover;">
            </a>
            <div class="texts ms-4 w-50">
                <a href="{{ route('market_shoes.index') }}" class="h3 text-decoration-none" id="shs_clean">Shoes Clean</a>
               
               <p class="h5 text-muted">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore doloribus tempore similique ullam, voluptatem modi minima aliquid voluptates eos illo rem dignissimos reiciendis eum rerum non sapiente tenetur ipsum quod impedit? Veniam laudantium impedit dicta distinctio ratione sapiente accusamus ullam atque ipsum, accusantium nostrum recusandae porro nobis dolorum laborum itaque!
               </p>
            </div>
        </div>

        <div class="col-sm-12 d-flex justfiy-content-around" style="margin-top:50px;">
            <div class="texts ms-4 w-50">
                <a href="{{ route('user.view.orders') }}" class="h3 text-decoration-none">My Shoes</a>
               <p class="h5 text-muted">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore doloribus tempore similique ullam, voluptatem modi minima aliquid voluptates eos illo rem dignissimos reiciendis eum rerum non sapiente tenetur ipsum quod impedit? Veniam laudantium impedit dicta distinctio ratione sapiente accusamus ullam atque ipsum, accusantium nostrum recusandae porro nobis dolorum laborum itaque!
               </p>
            </div>
            <a href="{{ route('user.view.orders') }}" class="w-50">
                <img src="/image/M.png" alt="logo rusak" class="logo_img2 img-fluid overflow-hidden rounded w-100" style=" height:300px; object-fit:cover;">
            </a>
        </div>

        <div class="col-sm-12 d-flex justfiy-content-around" style="margin-top:50px;">
            <a href="/jenis-clean-sepatu" class="w-50">
                <img src="/image/M.png" alt="logo rusak" class="logo_img img-fluid overflow-hidden rounded w-100" style=" height:300px; object-fit:cover;">
            </a>
            <div class="texts ms-4 w-50">
                <a href="/jenis-clean-sepatu" class="h3 text-decoration-none">Jenis Sepatu & Cleaning</a>
               <p class="h5 text-muted">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore doloribus tempore similique ullam, voluptatem modi minima aliquid voluptates eos illo rem dignissimos reiciendis eum rerum non sapiente tenetur ipsum quod impedit? Veniam laudantium impedit dicta distinctio ratione sapiente accusamus ullam atque ipsum, accusantium nostrum recusandae porro nobis dolorum laborum itaque!
               </p>
            </div>
        </div>

        <div class="col-sm-12 d-flex justfiy-content-around" style="margin-top:50px;">
            <div class="texts ms-4 w-50">
                <a href="/all-event" class="h3 text-decoration-none">Event</a>
               <p class="h5 text-muted">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore doloribus tempore similique ullam, voluptatem modi minima aliquid voluptates eos illo rem dignissimos reiciendis eum rerum non sapiente tenetur ipsum quod impedit? Veniam laudantium impedit dicta distinctio ratione sapiente accusamus ullam atque ipsum, accusantium nostrum recusandae porro nobis dolorum laborum itaque!
               </p>
            </div>
           <a href="/all-event" class="w-50">
            <img src="/image/M.png" alt="logo rusak" class="logo_img2 img-fluid overflow-hidden rounded w-100" style=" height:300px; object-fit:cover;">
           </a>
        </div>
          @endif
        </div>
    </div>

    @include('components.footer')
    
      
@endsection
