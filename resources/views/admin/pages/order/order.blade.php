@extends('admin.app')

@section('content')

<main id="main" class="main">
    <div class="flash-data" data-flashdata="{{ session('success') }}" data-name="Order"></div>
    @if(session()->has('loginsuccess'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('loginsuccess') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">

        
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-xl-12">

                        <div class="card">
                            <div class="card-body pt-3">
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
                                                <th scope="col">Username</th>
                                                <th scope="col">Action</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($order1 as $no => $pdk  )                              
                                                <tr>
                                                    <th scope="row">{{ ++$no }} </th> 
                                                    <td>{{ $pdk->no_invoice }}</td> 
                                                    <td>{{ $pdk->user->username }}</td> 
                                                    <td >
                                                        <a href="{{ url('/admin/order/'.$pdk->id) }}" class="badge bg-primary text-white">Detail</a> 
                                                        <form action="{{ url('/admin/order/konfirm/'.$pdk->id) }}" method="post" class="d-inline">
                                                        @method('PUT')
                                                        @csrf
                                                            <input type="hidden" name="status" value="pesanan-diproses">
                                                            <button type="submit" href="#" class="badge bg-success text-white border-0" onclick="return confirm('Konfirmasi?')">Konfirmasi</button>
                                                        </form>
                                                        <form action="{{ url('/admin/produk/cancel/'.$pdk->id) }}" method="post" class="d-inline">
                                                        @method('PUT')
                                                        @csrf
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
                                                <th scope="col">Username</th>
                                                <th scope="col">Action</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($order2 as $no => $pdk  )                              
                                                <tr>
                                                    <th scope="row">{{ ++$no }} </th> 
                                                    <td>{{ $pdk->no_invoice }}</td> 
                                                    <td>{{ $pdk->user->username }}</td> 
                                                    <td >
                                                        <a href="{{ url('/admin/order/'.$pdk->id) }}" class="badge bg-primary text-white">Detail</a> 
                                                        <form action="{{ url('/admin/order/cancel/'.$pdk->id) }}" method="post" class="d-inline">
                                                            @method('PUT')
                                                            @csrf
                                                                <input type="hidden" name="status" value="pesanan-dibatalkan">
                                                                <button type="submit"class="badge bg-danger text-white border-0">Batalkan</button>
                                                            </form>
                                                        <form action="{{ url('/admin/order/resi/'.$pdk->id) }}" method="post">
                                                            @method('PUT')
                                                            @csrf
                                                                <label for="inputText" class="col-sm-6 col-form-label">Masukan Nomor Resi</label>
                                                                <div class="col-sm-6">
                                                                    <input type="text" name="no_resi" class="form-control">
                                                                    <input type="hidden" name="status" value="pesanan-dikirim">
                                                                </div>
                                                                <button type="submit" class="badge bg-success text-white mt-1 border-0">Simpan</button>
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
                                                <th scope="col">Username</th>
                                                <th scope="col">Action</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($order3 as $no => $pdk  )                              
                                                <tr>
                                                    <th scope="row">{{ ++$no }} </th> 
                                                    <td>{{ $pdk->no_invoice }}</td> 
                                                    <td>{{ $pdk->user->username }}</td> 
                                                    <td >
                                                        <a href="{{ url('/admin/order/'.$pdk->id) }}" class="badge bg-primary text-white">Detail</a> 
                                                        <form action="{{ url('/admin/order/cancel/'.$pdk->id) }}" method="post" class="d-inline">
                                                            @method('PUT')
                                                            @csrf
                                                                <input type="hidden" name="status" value="pesanan-dibatalkan">
                                                                <button type="submit"class="badge bg-danger text-white border-0" onclick="return confirm('Are you sure?')">Batalkan</button>
                                                            </form>
                                                        <a href="{{ url('/cetakLabel/'.$pdk->id) }}" class="badge bg-success text-white">Cetak</a>
                                                           
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
                                                <th scope="col">Username</th>
                                                <th scope="col">Action</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($order4 as $no => $pdk  )                              
                                                <tr>
                                                    <th scope="row">{{ ++$no }} </th> 
                                                    <td>{{ $pdk->no_invoice }}</td> 
                                                    <td>{{ $pdk->user->username }}</td> 
                                                    <td >
                                                        <a href="{{ url('/admin/order/'.$pdk->id) }}" class="badge bg-primary text-white">Detail</a> 
                                                        <form action="{{ url('/admin/order/cetak/'.$pdk->id) }}" method="post" class="d-inline"> 
                                                            @csrf
                                                                <button type="submit" class="badge bg-success text-white mt-1 border-0">Cetak</button>
                                                        </form>
                                                           
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
                                                <th scope="col">Username</th>
                                                <th scope="col">Action</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($order5 as $no => $pdk  )                              
                                                <tr>
                                                    <th scope="row">{{ ++$no }} </th> 
                                                    <td>{{ $pdk->no_invoice }}</td> 
                                                    <td>{{ $pdk->user->username }}</td> 
                                                    <td >
                                                        <a href="{{ url('/admin/order/'.$pdk->id) }}" class="badge bg-primary text-white">Detail</a>  
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
                        
    </section>

        
</main><!-- End #main -->



@endsection