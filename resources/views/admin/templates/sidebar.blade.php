
<!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ url('/admin') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#produk-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Produk</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="produk-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('/admin/produk') }}">
                    <i class="bi bi-circle"></i><span>Produk</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/admin/category')}}">
                    <i class="bi bi-circle"></i><span>Category</span>
                    </a>
                </li> 
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#pesanan" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Pesanan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="pesanan" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('/admin/order') }}">
                    <i class="bi bi-circle"></i><span>Pesanan</span>
                    </a>
                </li> 
            </ul>
        </li><!-- End Forms Nav -->

        

        

        
        

        </ul>

    </aside>
    <!-- End Sidebar-->