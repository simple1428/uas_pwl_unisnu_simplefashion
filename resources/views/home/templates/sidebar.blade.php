<!-- ======= Mobile nav toggle button ======= -->
  <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex flex-column justify-content-center">

    <nav id="navbar" class="navbar nav-menu">
      <ul>
        <li><a href="{{ url('/') }}" class="nav-link @if($title == 'Home') active @endif "><i class="bx bx-home"></i> <span>Home</span></a></li>
        @guest
        <li><a href="{{ url('/login') }}" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Login</span></a></li>
        @endguest
         
        <li><a href="{{ url('/produk') }}" class="nav-link scrollto @if($title == 'Produk') active @endif"><i class="bx bi-view-list"></i> <span>Produk</span></a></li>
        
        
        @auth
        @if( auth()->user()->status == 1)
        <li><a href="{{ url('/admin') }}" class="nav-link scrollto "><i class="bi bi-speedometer2"></i> <span>Admin</span></a></li>
        @endif
        <li><a href="{{ url('/keranjang') }}" class="nav-link  @if($title == 'Cart') active @endif"><i class="bi bi-cart"></i><span>Keranjang</span></a></li>
        <li><a href="{{ url('/order') }}" class="nav-link  @if($title == 'Order') active @endif"><i class="bi bi-bag"></i><span>Pesanan</span></a></li>
        
        <li><a href="{{ url('/logout') }}" class="nav-link scrollto"><i class="bi bi-box-arrow-left"></i> <span>Logout</span></a></li>
        @endauth
      </ul>
    </nav><!-- .nav-menu -->

  </header><!-- End Header --> 