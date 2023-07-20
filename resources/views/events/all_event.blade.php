@extends('components.main_view')

@section('css')
    <style>
        .logo_img{
            box-shadow: -10px 10px 5px rgb(92, 82, 82);
        }
        .logo_img2{
            box-shadow: 10px 10px 5px rgb(92, 82, 82);
        }
        .aksi{
            background: palegoldenrod;
            box-shadow: 5px 5px 5px rgb(92, 82, 82);
        }
    </style>
@endsection

@section('container')
    <div class="container" style="margin-top:50px;">
        <div class="row">
            <div class="col-sm-12 d-flex mb-4">
               @can('admin')
                <form action="{{ route('all-event.create') }}" method="GET">
                    <button class="btn univ_btn"><span class="h5">Buat Event</span></button>
                </form>
               @endcan
                <span class="h5 ms-auto">EVENT</span>
            </div>
            <hr class="mb-4">
            
            @if ($all_event->count())
            @foreach ($all_event as $event)
            <div class="col-sm-12 mt-4">
              <div class="d-flex justfiy-content-around col-sm-7 @if($loop->iteration % 2 == 0) ms-auto @else me-auto @endif">
                @if($loop->iteration % 2 != 0) 
                    @if ($event->foto_event)
                    <img src="{{ asset('storage/' . $event->foto_event) }}" alt="logo rusak" class="logo_img img-fluid overflow-hidden rounded-circle" style="width:300px; height:300px; object-fit:cover;">
                    @else
                    <img src="/image/M.png" alt="logo rusak" class="logo_img img-fluid overflow-hidden rounded-circle" style="width:300px; height:300px; object-fit:cover;">
                    @endif
                @endif
                    <div class="texts ms-4 w-50">
                       <div class="d-flex">
                        <span  class="h4 fw-bold">{{ $event->judul_event }}</span>
                        @can('admin')
                        <div class="aksi border mb-2 d-flex align-items-center ms-auto rounded" style="padding:0px 10px;">
                            <a href="/all-event/{{ $event->id }}/edit" class=" text-decoration-none " style="color:blueviolet;"><i class="fa-solid fa-file-pen"></i></a>
                            <form action="{{ route('all-event.destroy' , $event->id) }}" method="POST" id="submit_del{{ $event->id }}">
                             @csrf
                             @method('delete')
                             <button type="button" id="delete{{ $event->id }}" class=" border-0 ms-2" style="color:crimson;           background-color: palegoldenrod; "><i class="fa-solid fa-trash-can"></i></button>
    
                             <script>
                               $('#delete{{ $event->id }}').click(function(){
                                 Swal.fire({
                                         title: 'Hapus Event?',
                                         text: "Yakin hapus event sebelum durasi habis?",
                                         icon: 'warning',
                                         showCancelButton: true,
                                         confirmButtonColor: '#3085d6',
                                         cancelButtonColor: '#d33',
                                         confirmButtonText: 'Yes, hapus!'
                                         }).then((result) => {
                                         if (result.isConfirmed) {
                                            $('#submit_del{{ $event->id }}').trigger('submit')
                                         }
                                         })
                               })
                             </script>
                           </form>
                        </div>
                        @endcan
                       </div>
                    
                    <div class="col-sm-12">
                        <p class="text-muted">
                        {!! $event->deskripsi !!}
                        </p>
                    </div>
            </div>
            @if($loop->iteration % 2 == 0) 
                @if ($event->foto_event)
                <img src="{{ asset('storage/' . $event->foto_event) }}" alt="logo rusak" class="logo_img2 img-fluid ms-4 overflow-hidden rounded-circle" style="width:300px; height:300px; object-fit:cover;">
                @else
                <img src="/image/M.png" alt="logo rusak" class="logo_img2 ms-4 img-fluid overflow-hidden rounded-circle" style="width:300px; height:300px; object-fit:cover;">
                @endif
            @endif
              </div>
            </div>
            @endforeach
            @else
            <div class="col-sm-12 d-flex justify-content-center">
                <span class="h3 fw-bold">Masih belum ada Event yang tersedia saat ini.</span>
            </div>
            @endif

          

          

        </div>
    </div>

 
@endsection
