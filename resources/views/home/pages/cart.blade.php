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
            <li class="breadcrumb-item active">cart</li>
            </ol>
            <hr>
        </nav>
    </div><!-- End Page Title -->
    <div class="container">
        <div class="container row p-3 me-4 bg-light">
            <h2>Keranjang</h2>
            <div class="col-md-12 p-3 card border-0 shadow ">
                @if(session()->has('success'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif 
                @if($cart->count()<=0)
                 <div class="kosong text-center">
                     <h3>Keranjang Kosong</h3>
                     
                 </div>
                @else
                    <table class="table table-hover text-center ">
                        <thead>
                            <tr >
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody> 
                            
                            @foreach($cart as $no => $crt)
                            @foreach ($crt->produk as  $pdk)
                                
                            <tr>
                            <th scope="row">{{ ++$no }}</th>
                            <td>
                                @if ($pdk->image)
                                        <img class="img-fluid  mb-5 mb-md-0 img-fluid " src="{{ asset('storage/' .$pdk->image) }}" alt="{{ $pdk->name }}"width="80" height="80"  />
                                            @else
                                        <img class="img-fluid  mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="{{ $pdk->name }}"width="80" height="80"  />
                                        @endif 
                            </td>
                            <td>{{ $pdk->name }}</td>
                            <form action="{{ url('/updatecart/'.$crt->id) }}" method="post" >
                                @method('PUT')
                                @csrf
                            <td> 
                                <input type="hidden" name="harga" value="{{ $pdk->harga }}">
                                <input type="number" name="qty" min="0" value="{{ $crt->qty }}" class="form-label" style="width:50px"/>
                            </td>
                            <td>{{ $pdk->harga }}</td>
                            <td> 

                                    
                                    <button type="submit" class="badge bg-warning border-0">Update </button>
                                </form>
                                <form action="{{ url('/deletecart/'.$crt->id) }}" method="post" >
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="badge bg-danger border-0">Delete </button>

                                </form>
                            </td>
                            </tr> 

                            @endforeach
                            @endforeach
                            

                        </tbody>
                    </table>  
                    <div class="row me-4"> 
                        <div class="col-md-12 text-end p-2" > 
                            <p>Total : Rp {{ number_format($cart->sum('total'),0,',','.') }}</p>
                            <a href="{{ url('/pesanan') }}" class="btn btn-primary" type="submit">CekOut</a>

                        </div> 
                    </div>
                    @endif
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