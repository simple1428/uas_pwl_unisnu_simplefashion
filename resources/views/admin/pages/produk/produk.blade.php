@extends('admin.app')

@section('content')

<main id="main" class="main">

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
                            <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">Produk <span>| Simple Fashion</span></h5> 
                            <div class="flash-data" data-flashdata="{{ session('success') }}" data-name="Produk"></div>
                            @if(session()->has('loginsuccess'))
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                {{ session('loginsuccess') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            
                            <a href="{{ url('/admin/produk/create') }}" class="btn btn-primary mb-3" >
                                Tambah
                            </a>
                            <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Action</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($produk as $no => $pdk  )                              
                                <tr>
                                    <th scope="row">{{ ++$no }} </th>
                                    <td>
                                        @if ($pdk->image)
                                        <img src="{{ asset('storage/' .$pdk->image) }}" alt="{{ $pdk->name }}" class="img-fluid img-thumbnail" width="120">
                                        @else
                                        <img src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="{{ $pdk->name }}" class="img-fluid img-thumbnail" width="120">
                                        @endif
                                    </td>
                                    <td>{{ $pdk->name }}</td>
                                    <td>{{ $pdk->harga }}</td>
                                    <td>{{ $pdk->stok }}</td>
                                    <td >
                                        <a href="{{ url('/admin/produk/'.$pdk->slug) }}" class="badge bg-primary text-white"><i class="bi bi-eye"></i></a>
                                        <a href="{{ url('/admin/produk/'.$pdk->slug.'/edit') }}" class="badge bg-warning text-white"><i class="bi bi-pencil-square"></i></a>
                                        
                                        <button type="submit" class="badge bg-danger text-white border-0" data-bs-toggle="modal" data-bs-target="#hapus{{ $pdk->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="hapus{{ $pdk->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Produk</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ url('/admin/produk/'.$pdk->slug) }}" method="post" class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                <div class="modal-body"> 
                                                    <h3>Apakah anda yakin akan menghapus produk "{{ $pdk->name }}"</h3> 
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                                
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                    </td> 
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
        
                        </div>
        
                        </div>
                    </div><!-- End Recent Sales -->
                </div>
            </div>
                        
    </section>
</main><!-- End #main -->



@endsection