
<style>

 #notify{
  background-color: rgba(255, 255, 255, 1); /* warna latar belakang putih dengan opasitas 1 */;
  border: 2px solid rgb(218, 26, 26);
  box-shadow: 10px 8px 10px rgb(109, 38, 38);
 }

 .text-notif{
  font-size: 12px;
 }

 @media (max-width: 500px) {
  .all-menus{
    width: 40%;
    margin-left: auto;
  }
  .menus {
   
    display: flex;
    justify-content: center;
    align-items: center;
    width: 50px;
    height: 50px;
  }
}

</style>

<nav class="navbar navbar-expand-lg" style="background-color: #6286CB;">
    <div class="container">
        <a href="{{ route('dashboard') }}" class="navbar-brand me-3">
            @if (auth()->user()->foto_profile)
            <img src="{{ asset('storage/' . auth()->user()->foto_profile) }}" alt="profile rusak" class="img-thumbnail rounded-circle" style="width:65px; height:65px; object-fit:cover;">
            @else
            <img src="/image/shoes.png" alt="profile rusak" class="img-thumbnail rounded-circle" style="width:65px; height:65px; object-fit:cover;">
            @endif
           </a>
      <button class="navbar-toggler me-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item d-flex flex-column">
            <span style="color:ghostwhite">Selamat Datang,</span>
            <span class="h5" style="color:ghostwhite">{{ auth()->user()->nama }}</span>
          </li>
        </ul>

       
        <div class="all-menus d-flex">
       @can('normies')
       <div class="menus bg-light rounded-circle me-2" style="padding:8px 12px; cursor: pointer;">
        @if (auth()->user()->status_toko == true)
          @foreach ($slug_id as $hash_id)
          <a href="{{ route('user.market.view' , $hash_id) }}" class="text-center text-decoration-none" style="color:rgb(36, 33, 33)"><i class="fa-sharp fa-solid fa-shop fa-lag"></i></a>
          @endforeach
        @else
        <a href="{{ route('user.market.view' , 'no-market') }}" class="text-center text-decoration-none" style="color:rgb(36, 33, 33)"><i class="fa-sharp fa-solid fa-shop fa-lg"></i></a>
        @endif
      </div>
       @endcan

     
        <div class="menus bg-light rounded-circle me-2 position-relative" style="padding:8px 12px; cursor: pointer;" id="liveToastBtn" >
          <a class="text-center text-decoration-none" style="color:rgb(36, 33, 33)"><i class="fa-sharp fa-solid fa-bell fa-lg"></i></a>
        @if ($theNotif != 0 && !request()->cookie('readed_notif'))
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" id="notif" style="background-color: red; font-size:14px;">
         {{ $theNotif }}
        </span>
        @endif

        <div id="notify" class="position-absolute top-100 end-50  mt-2 animate__animated animate__fadeIn" style="width: 250px; padding:25px; position: relative; z-index: 999; display:none;">
          @if ($pss_nan->count())
          @foreach ($pss_nan as $pss)
          <div class="d-flex flex-column justify-content-center text-center">
            <span class="h6 text-notif">Segera bawa pawa sepatu anda, dan bayar di toko !</span>
            <a href="/user-clean-shoe-orders" class="text-decoration-none">
              <div class="bg-light rounded d-flex flex-column text-center" style="padding:25px; color:black;">
                <span class="fw-bold h5 text-notif">ID : {{ $pss->kode_pesanan }}</span>
                @php
                $format_price = number_format($pss->harga_total);
                $format_price = str_replace(',' , '.' ,  $format_price);
               @endphp
                <span class="fw-bold h5 text-notif">TOTAL : Rp. {{ $format_price }}</span>
                <span class="text-muted text-notif" style="">{{ $pss->market->nama_toko }}</span>
                <span class="text-muted text-notif" style="">{{ $pss->market->alamat }}</span>
              </div>
            </a>
            <span class="h6 mt-3 text-notif">Pesanan otomatis dibatalkan jika tidak diproses selama 72 jam, detail pesanan bisa dilihat pada menu My Shoes.</span>
            <hr>
          </div>
       @endforeach
       @else
        <div class="text-center">
          <span class="h6">Kamu belum memiliki riwayat orderan.</span>
        </div>
          @endif
        </div>

      </div>

        <div class="menus bg-light rounded-circle dropstart"  style="padding:8px 12px; cursor: pointer;" id="cover">
            <a type="button" id="trig" role="button" data-bs-toggle="dropdown" class="text-center text-decoration-none"  style="color:rgb(36, 33, 33);"><i class="fa-sharp fa-solid fa-gear fa-lg"></i></a>
            <ul class="dropdown-menu end-50 top-100">
              <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>

              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
            </form>
            </ul>
        </div>
      </div>
      
        
      </div>



    </div>
  </nav>

 
    <script>
      $(document).ready(function(){
        $('#liveToastBtn').click(function(){
          $('#notify').toggle()
          $.ajax({
          url: '/set-cookie-unread-notif',
          method: 'GET',
          success: function(data) {
           $('#notif').css('display' , 'none');
          },
          error: function(jqXHR, textStatus, errorThrown) {
            alert('Woops I Dont Know Who You Are....???!!!')
            console.error('Error:', textStatus, errorThrown);
          }
        });


        })

        $('#cover').click(function(){
          $('#trig').trigger('click');
        })
      })
    </script>

  