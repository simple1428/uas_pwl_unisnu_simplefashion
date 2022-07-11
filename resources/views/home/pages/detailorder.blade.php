

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
              <li class="breadcrumb-item active">{{ $order->no_invoice }}</li>
              </ol>
              <hr>
          </nav>
      </div><!-- End Page Title -->
        <section class=" py-5  bg-light me-4" style="background-color:rgb(199, 226, 247);"> 
            <div class="container  px-4 px-lg-5">
                <div class="card-body">
                    <div class="row">
                        <div class="section-title mt-4 test-center">
                          <h2>Detail Order</h2>
                        </div>
                          <div class="col-md-6">
                            <form method="post" action="{{ url('/cekout') }}">
                              @csrf
                              <div class="mb-3">
                                <strong for="name" class="form-label">Nama lengkap</strong>
                                <p>{{ $order->name }} </p>
                              </div>
                              <div class="mb-3">
                                <strong for="no_hp" class="form-label">Nomor Hp</strong>
                                <p>{{ $order->no_hp }}</p>
                                 
                              </div>
                               
                              
                          </div>
                          <div class="col-md-6"> 
                               
                            <div class="mb-3">
                              <strong for="desa" class="form-label">Alamat lengkap</strong>
                               <p>{{ $order->alamat }} <strong class="text-uppercase"> ({{ $order->kecamatan }},{{ $order->kabupaten }},{{ $order->provinsi }})</strong></p>
                            </div>  
                            <div class="mb-3">
                              <strong for="desa" class="form-strong">Pembayaran</strong>
                               <p>{{ $order->pembayaran }} </p>
                            </div>  
                          </div>
                    </div> 
                    </div>
                    <!-- Order section-->
                    <h5 class="card-title">Detail Order <span>| Simple Fashion</span></h5>   
                    @if(session()->has('loginsuccess'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        {{ session('loginsuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                        <table class="table table-borderless">
                          <thead>
                            <tr>
                              <th scope="col">Preview</th>
                              <th scope="col">Product</th>
                              <th scope="col">Price</th>
                              <th scope="col">Qty</th>
                              <th scope="col">Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($cart as $crt) 
                                @foreach ($crt->produk as $pdk)
                                
                                <tr>
                                    <th scope="row">
                                        @if ($pdk->image)
                                        <img src="{{ asset('storage/' .$pdk>image) }}" alt="{{ $pdk->name }}" class="img-fluid img-thumbnail" width="120">
                                        @else
                                        <img src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="{{ $pdk->name }}" class="img-fluid img-thumbnail" width="120">
                                        @endif
                                    </th>
                                    <td><a href="#" class="text-primary fw-bold">{{ $pdk->name }}</a></td>
                                    <td>{{ $pdk->harga }}</td>
                                    <td class="fw-bold">{{ $crt->qty }}</td>
                                    <td>{{ $pdk->harga * $crt->qty }}</td>
                                </tr> 
                                @endforeach
                            @endforeach
                        </tbody>
                        </table> 
                        <div class="row">
                            <div class="col-md-8">

                            </div>
                            <div class="col-md-4" style="border-top: 2px blue solid;border-bottom: 2px blue solid">
                                <div class="card" >
                                    <div class="card-body p-3">
                                        <p><strong>Total Produk</strong> :   Rp {{ number_format($order->jumlah,0,',','.') }}</p>
                                        <p><strong>Ongkir</strong>       : Rp {{ number_format($order->ongkir,0,',','.') }}</p>
                                        @php
                                        $total = $order->jumlah + 15000 
                                        @endphp
                                        <p><strong>Jumlah semua</strong> : Rp {{ number_format($total,0,',','.') }}</p>
                                        @if($order->status == 'pesanan-diproses')
                                        <div class="row">
                                            <label class="">Nomor Resi</label> 
                                            <p><strong class="card p-2 " >{{  $order->no_resi}}</strong> </p>
                                        <p><strong>Status</strong> : On Prosses</p>
                                        </div>
                                        @elseif($order->status == 'pesanan-baru')
                                        <div class="row">     
                                            <p><strong>Status</strong> : Order New</p>
                                        </div>
                                        @elseif($order->status == 'pesanan-dikirim')
                                        <div class="row">  
                                                <label class="">Nomor Resi</label> 
                                                    <p><strong class="card p-2 " >{{  $order->no_resi}}</strong> </p>
                                                <p><strong>Status</strong> : On Prosses</p>
                                        </div>
                                        @elseif($order->status == 'pesanan-selesai')
                                        <div class="row">  
                                                <label class="">Nomor Resi</label> 
                                                    <p><strong class="card p-2 " >{{  $order->no_resi}}</strong> </p>
                                                <p><strong>Status</strong> : Complete</p>
                                        </div>
                                        @elseif($order->status == 'pesanan-dibatalkan')
                                        <div class="row">  
                                                <p><strong>Status</strong> : Cancel</p>
                                        </div>
                                        @endif
                                        

                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>

                </div>
            </div>
        </section>
         


@endsection 