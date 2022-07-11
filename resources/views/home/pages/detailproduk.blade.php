

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
        
        <div class="pagetitle p-2 me-4">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">{{ $produk->name }}</li>
              </ol>
              <hr>
          </nav>
      </div><!-- End Page Title -->
        <section class=" py-5  bg-light me-4" style="background-color:rgb(199, 226, 247);"> 
            <div class="container  px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 ">
                    <div class="col-md-6 ">
                      @if ($produk->image)
                              <img class="card-img-top mb-5 mb-md-0" src="{{ asset('storage/' .$produk->image) }}" alt="{{ $produk->name }}" />
                                @else
                              <img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="{{ $produk->name }}" />
                      @endif 

                    </div>
                    <div class="col-md-6  ">
                      @if(session()->has('success'))
                      <div class="alert alert-primary alert-dismissible fade show" role="alert">
                          {{ session('success') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      @endif
                        <div class="small mb-1">{{ $produk->category->name }}</div>
                        <h1 class="  fw-bolder">{{ $produk->name }}</h1>
                        <div class="fs-5 mb-5">
                            {{-- <span class="text-decoration-line-through">$45.00</span> --}}
                            <span>Rp. {{ number_format($produk->harga,0,',','.') }}</span>
                        </div>
                        <p class="lead">{!! $produk->description !!}</p>
                        <div class="d-flex">
                          <form action="{{ url('/cart') }}" method="post">
                            @csrf  
                            <input type="hidden" name="halaman" value="detailproduk">
                            <input type="hidden" name="harga" value="{{ $produk->harga }}">
                            <input type="hidden" name="slug" value="{{ $produk->slug }}">
                            <input type="hidden" name="produk_id" value="{{ $produk->id}}">
                            <button class="btn btn-primary flex-shrink-0" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                                        <input type="hidden" name="halaman" value="detailproduk">
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