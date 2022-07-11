@extends('admin.app')

@section('content')

<main id="main" class="main">
    <div class="flash-data" data-flashdata="{{ session('success') }}" data-name="Produk"></div>

    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/produk') }}">Produk</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        @if(session()->has('loginsuccess'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('loginsuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                            <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <!-- Product section-->
                        <section class="py-2">
                            <div class="container px-4 px-lg-5 my-5">
                                <div class="row gx-4 gx-lg-5 align-items-center">
                                    <div class="col-md-6">
                                        @if ($produk->image)
                                        <img class="card-img-top mb-5 mb-md-0" src="{{ asset('storage/' .$produk->image) }}" alt="{{ $produk->name }}" />
                                        @else
                                        <img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="{{ $produk->name }}" />
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="small mb-1">{{ $produk->category->name }}</div>
                                        <h1 class="display-6 fw-bolder">{{ $produk->name }}</h1>
                                        <div class="fs-5 mb-3">
                                            {{-- <span class="text-decoration-line-through">$45.00</span> --}}
                                            <span>Rp. {{ number_format($produk->harga,0,',','.') }}</span>
                                        </div>
                                        <p class="lead text-justify">{!! $produk->description !!}</p>
                                        <div class="d-flex">
                                            <div class="text-center me-2">

                                                <a href="{{ url('/admin/produk/'.$produk->slug.'/edit') }}" class="btn btn-warning">Edit</a>
                                            </div>
                                            <button type="submit" class="btn btn-danger text-white border-0" data-bs-toggle="modal" data-bs-target="#hapus{{ $produk->id }}">
                                                Delete
                                            </button>
                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="hapus{{ $produk->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Produk</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ url('/admin/produk/'.$produk->slug) }}" method="post" class="d-inline">
                                                        @method('DELETE')
                                                        @csrf
                                                    <div class="modal-body"> 
                                                        <h3>Apakah anda yakin akan menghapus produk "{{ $produk->name }}"</h3> 
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                    
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
        
                        </div>
        
                        </div>
                    </div><!-- End Recent Sales -->
                </div>
            </div>
                        
    </section>
</main><!-- End #main -->
@endsection