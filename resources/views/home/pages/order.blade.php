@extends('home.app')

@section('konten') 
<nav class="navbar card bg-primary text-white me-4" >
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="{{ url('/') }}">
            <img src="{{asset('admin/assets/img/logosimple.png')}}" alt="" width="40">
            <span class="navbar-brand mb-0 h1 fs-4 text-white">Simple Fashion</span>
            </a>
        </div>
    </div>
</nav> 
    <div class="pagetitle p-2 me-4 bg-light">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">pesanan</li>
            </ol>
            <hr>
        </nav>
    </div><!-- End Page Title -->
    <div class="container">
        <div class="container row p-3 me-4 bg-light">
            <h2>Daftar Pesanan</h2>
            <div class="col-md-12 p-3   shadow ">
                <div class="card">
                    
                    <div class="card-body pt-3 border-0">
                        @if(session()->has('success'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif 
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">
        
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#pesanan-baru">Pesanan Baru</button>
                            </li>
                
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Pesanan Diproses</button>
                            </li>
                
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Pesanan Dikirim</button>
                            </li>
                
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Pesanan Selesai</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#pesanan-dibatalkan">Pesanan Dibatalkan</button>
                            </li>
        
                    </ul>
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="pesanan-baru">
                        <!-- Pesanan baru -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    
                                    <table class="table table-borderless datatable table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th> 
                                        <th scope="col">No Invoice</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Action</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order1 as $no => $pdk  )                              
                                        <tr>
                                            <th scope="row">{{ ++$no }} </th> 
                                            <td>{{ $pdk->no_invoice }}</td> 
                                            <td>Rp {{ number_format($pdk->jumlah,0,',','.') }}</td> 
                                            <td >
                                                <a href="{{ url('/orderdetail/'.$pdk->id) }}" class="badge bg-primary text-white">Detail</a> 
                                                <form action="{{ url('/ordercancel/'.$pdk->id) }}" method="post" class="d-inline">
                                                @method('PUT')
                                                @csrf
                                                    <input type="hidden" name="id" value="{{ $pdk->id }}">
                                                    <input type="hidden" name="status" value="pesanan-dibatalkan">
                                                    <button type="submit" href="#" class="badge bg-danger text-white border-0" onclick="return confirm('Are you sure?')">Batalkan</button>
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End   -->
        
                        </div>
            
                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                        <!-- Pesanan di proses -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    
                                    <table class="table table-borderless datatable table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th> 
                                        <th scope="col">No Invoice</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Action</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order2 as $no => $pdk  )                              
                                        <tr>
                                            <th scope="row">{{ ++$no }} </th> 
                                            <td>{{ $pdk->no_invoice }}</td> 
                                            <td>Rp {{ number_format($pdk->jumlah,0,',','.') }}</td> 
                                            <td >
                                                <a href="{{ url('/orderdetail/'.$pdk->id) }}" class="badge bg-primary text-white">Detail</a>  
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End   --> 
                        </div>
            
                        <div class="tab-pane fade pt-3" id="profile-settings">
                            <!-- Pesanan dikirim -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    
                                    <table class="table table-borderless datatable table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th> 
                                        <th scope="col">No Invoice</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Action</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order3 as $no => $pdk  )                              
                                        <tr>
                                            <th scope="row">{{ ++$no }} </th> 
                                            <td>{{ $pdk->no_invoice }}</td> 
                                            <td><td>Rp {{ number_format($pdk->jumlah,0,',','.') }}</td> </td> 
                                            <td >
                                                <a href="{{ url('/orderdetail/'.$pdk->id) }}" class="badge bg-primary text-white">Detail</a>  
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End   -->
                            
                            
            
                        </div>
            
                        <div class="tab-pane fade pt-3" id="profile-change-password">
                            <!-- Pesanan Selesai-->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    
                                    <table class="table table-borderless datatable table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th> 
                                        <th scope="col">No Invoice</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Action</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order4 as $no => $pdk  )                              
                                        <tr>
                                            <th scope="row">{{ ++$no }} </th> 
                                            <td>{{ $pdk->no_invoice }}</td> 
                                            <td><td>Rp {{ number_format($pdk->jumlah,0,',','.') }}</td> </td> 
                                            <td >
                                                <a href="{{ url('/orderdetail/'.$pdk->id) }}" class="badge bg-primary text-white">Detail</a> 
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End s --> 
                        </div>
                        <div class="tab-pane fade pt-3" id="pesanan-dibatalkan">
                            <!-- Pesanan dibatalkan -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    
                                    <table class="table table-borderless datatable table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th> 
                                        <th scope="col">No Invoice</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Action</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order5 as $no => $pdk  )                              
                                        <tr>
                                            <th scope="row">{{ ++$no }} </th> 
                                            <td>{{ $pdk->no_invoice }}</td> 
                                            <td>Rp {{ number_format($pdk->jumlah,0,',','.') }}</td>  
                                            <td >
                                                <a href="{{ url('/orderdetail/'.$pdk->id) }}" class="badge bg-primary text-white">Detail</a>  
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End   -->
                            
            
                        </div>
        
                    </div><!-- End Bordered Tabs -->
        
                    </div>
                </div>

        </div>
    </div>
                
        </div> 
    </div>  
        </div> 

    <!-- Related items section-->
    <section class="py-5 bg-light me-4" >
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Related products</h2>
            <hr>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center border p-2 bg-white  border-0 " style="border-radius:10px ; ">
                @foreach($produks as $pdk)
            <div class="col-md-6 col-lg-4 mb-3 mt-5 portfolio-item {{  $pdk->category->slug}}" data-aos="fade-up" data-aos-delay="200">
                <div class="col mb-5 {{  $pdk->category->slug}}" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow  ">
                        @if ($pdk->image)
                                <img class="card-img-top" src="{{ asset('storage/' .$pdk->image) }}" alt="{{ $pdk->name }}" />
                                    @else
                                <img class="card-img-top" src="https://dummyimage.com/300x320/dee2e6/6c757d.jpg" alt="{{ $pdk->name }}" />
                        @endif  
                        <!-- Product details-->
                        <div class="card-body p-1 ">
                            <div class="text-center">
                                <!-- Product name-->
                                <p class="fw-bolder">{{ $pdk->name }}</p>
                                <!-- Product price-->
                                <p> Rp. {{ number_format($pdk->harga,0,',','.') }}</p>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a class="btn btn-outline-warning mt-auto" href="{{ url('/produk/'.$pdk->slug) }}"><i class="bi bi-eye"></i></a>
                                <form action="{{ url('/cart') }}" method="post" class="d-inline">
                                    @csrf  
                                    <input type="hidden" name="halaman" value="keranjang">
                                    <input type="hidden" name="harga" value="{{ $pdk->harga }}">
                                    <input type="hidden" name="slug" value="{{ $pdk->slug }}">
                                    
                                    <input type="hidden" name="produk_id" value="{{ $pdk->id}}">
                                    <button class="btn btn-outline-primary flex-shrink-0" type="submit">
                                        <i class="bi-cart-fill me-1"></i> 
                                    </button>
                                </form>
                                </div> 
                        </div>
                    </div>
                </div>
            </div> 
            @endforeach
            </div>

        </div>
    </section> 
    
@endsection