<style>
@media (min-width: 991.98px) {
  main {
    padding-left: 240px;
  }
}

/* Sidebar */
.sidebar {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  padding: 58px 0 0; /* Height of navbar */
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
  width: 240px;
  z-index: 600;
}

@media (max-width: 991.98px) {
  .sidebar {
    width: 100%;
  }
}
.sidebar .active {
  border-radius: 5px;
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
}

.sidebar-sticky {
  position: relative;
  top: 0;
  height: calc(100vh - 48px);
  padding-top: 0.5rem;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}

/* @media (max-width: 500px) {
  .rights {
    display: flex;
   justify-content: space-around;
  }
} */
</style>

<!--Main Navigation-->
<header>
    <!-- Sidebar -->
    <nav
         id="sidebarMenu"
         class="collapse d-lg-block sidebar collapse bg-white"
         >
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
          <a
             href="{{ route('user.market.view' , $slug_id) }}"
             class="list-group-item list-group-item-action py-2 ripple {{ Request::is('user-market-shoes*' , 'market-pending-order*' , 'market-process-order*' , 'market-done-order*') ? 'active' : '' }}"
             aria-current="true"
             >
            <i class="fas fa-tachometer-alt fa-fw me-3"></i
              ><span>Main dashboard</span>
          </a>
          @if (session('fill_market') && session('fill_market') != 'Selangkah lagi, ayo buat menu cleaning yang toko kamu tawarkan !')
          <a
          data-bs-toggle="modal" data-bs-target="#restrict"
          type="button"
          class="alr list-group-item list-group-item-action py-2 ripple {{ Request::is('jenis_cleaning*') ? 'active' : '' }}"
          ><i class="fas fa-users fa-fw me-3"></i><span>Buat Cleaning</span></a
         > 
          @else
          <a
          type="button" id="create_clean"
          class="list-group-item list-group-item-action py-2 ripple {{ Request::is('jenis_cleaning*') ? 'active' : '' }}"
          ><i class="fas fa-users fa-fw me-3"></i><span>Buat Cleaning</span></a
         > 
          @endif
          @if (session('fill_market'))
          <a
          data-bs-toggle="modal" data-bs-target="#restrict"
          type="button"
          class="alr list-group-item list-group-item-action py-2 ripple {{ Request::is('user-show-market*') ? 'active' : '' }}"
          ><i class="fas fa-money-bill fa-fw me-3"></i><span>Lihat Toko</span></a
         >
          @else
          <a
          href="{{ route('user.show.market' , $slug_id) }}"
          class="list-group-item list-group-item-action py-2 ripple {{ Request::is('user-show-market*') ? 'active' : '' }}"
          ><i class="fas fa-money-bill fa-fw me-3"></i><span>Lihat Toko</span></a
         >
          @endif

          @if (session('fill_market'))
          <a
          data-bs-toggle="modal" data-bs-target="#restrict"
          type="button"
          class="alr list-group-item list-group-item-action py-2 ripple {{ Request::is('user-show-market*') ? 'active' : '' }}"
          ><i class="fas fa-money-bill fa-fw me-3"></i><span>Revenue</span></a
         >
          @else
          <a
          href="{{ route('user.revenue.market' , $slug_id) }}"
          class="list-group-item list-group-item-action py-2 ripple {{ Request::is('user-revenue-market*') ? 'active' : '' }}"
          ><i class="fas fa-money-bill fa-fw me-3"></i><span>Revenue</span></a
         >
          @endif
        </div>
      </div>
    </nav>
    <!-- Sidebar -->
  
    <!-- Navbar -->
    <nav
         id="main-navbar"
         class="navbar navbar-expand-lg navbar-light bg-white fixed-top"
         >
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu"
                aria-controls="sidebarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation"
                >
          <i class="fas fa-bars"></i>
        </button>
  
        <!-- Brand -->
        <a class="navbar-brand" href="#">
          <img
               src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png"
               height="25"
               alt=""
               loading="lazy"
               />
        </a>
       
  
        <!-- Right links -->
        <ul class="rights navbar-nav ms-auto d-flex flex-row">
         
         <li class="nav-item dropdown d-flex align-items-center">
          <a
             class="nav-link hidden-arrow d-flex align-items-center"
             href="{{ route('dashboard') }}"
             id="navbarDropdownMenuLink"
             role="button"
             data-mdb-toggle="dropdown"
             aria-expanded="false"
             >
             <i class="fa-sharp fa-solid fa-house-chimney fa-lg" style="color:black"></i>
          </a>
        </li>

          <!-- Avatar -->
          <li class="nav-item ">
            <a
               class="nav-link hidden-arrow d-flex align-items-center"
               href="/market_shoes/{{ $slug_id }}/edit"
               aria-expanded="false"
               >
              @if ($foto_toko != null)
              <img
              src="{{ asset('storage/' . $foto_toko) }}"
              class="rounded-circle"
              height="30"
              width="30"
              alt=""
              loading="lazy"
              style="object-fit: cover;"
              />
              @else
              <img
              src="/image/shoes.png"
              class="rounded-circle"
              height="30"
              width="30"
              alt=""
              loading="lazy"
              style="object-fit: cover;"
              />
              @endif
            </a>
          </li>

          <li class="nav-item dropstart">
            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-sharp fa-solid fa-bars"></i>
            </a>
            <ul class="dropdown-menu end-50 top-100">
              <li>
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                  </form>
              </li>
          
            </ul>
        </ul>
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
  </header>
  <!--Main Navigation-->
  
  <!--Main layout-->
  <main style="margin-top: 58px">
    <div class="container pt-4">
  
    </div>
  </main>
  <!--Main layout-->


  @if (session('fill_market'))
  
<!-- Modal -->
<div class="modal fade" id="restrict" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-body d-flex flex-column text-center" style="padding: 25px;">
          <span class="h5 mt-4">{{ session('fill_market') }}</span> <br>
     
        @if (session('fill_market') == 'Selangkah lagi, ayo buat menu cleaning yang toko kamu tawarkan !')
        <form action="{{ route('jenis_cleaning.create') }}" method="GET">
          <input type="hidden" name="rasomon-cleaning-blury" class="d-none" value="{{ $slug_id }}" readonly>
          <button type="button" class="btn univ_btn " data-bs-dismiss="modal">Lengkapi</button>
        </form>
        @else 
        <form action="/market_shoes/{{ $slug_id }}/edit" method="GET">
          <button type="button" class="btn univ_btn " data-bs-dismiss="modal">Lengkapi</button>
        </form>
        @endif

        </div>
       
    </div>
    </div>
</div>
  @endif

  <form action="{{ route('jenis_cleaning.create') }}" method="GET" class="d-none" id="form_go">
    <input type="hidden" name="rasomon-cleaning-blury" class="d-none" value="{{ $slug_id }}" readonly>
  </form>

  <script>
    $(document).ready(function(){
      $('#create_clean').click(function(){
        $('#form_go').trigger('submit')
      })
    })
  </script>


<script>
 
</script>

 