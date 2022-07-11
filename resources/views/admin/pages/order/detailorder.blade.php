@extends('admin.app')

@section('content') 

<main id="main" class="main">

    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/order') }}">Order</a></li>
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
                                                    <form action="{{ url('/admin/order/resi/'.$order->id) }}" method="post">
                                                    @method('PUT')
                                                    @csrf
                                                        <label for="inputText" class="col-sm-12 col-form-label">Masukan Nomor Resi</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" name="no_resi" class="form-control">
                                                            <input type="hidden" name="status" value="pesanan-dikirim">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary mt-1">Simpan</button>

                                                        <p><strong>Status</strong> : On Proses</p>
                                                    </form>
                                                </div>
                                                @elseif($order->status == 'pesanan-baru')
                                                <div class="row">
                                                    <form action="{{ url('/admin/order/konfirm/'.$order->id) }}" method="post">
                                                    @method('PUT')
                                                    @csrf 
                                                        <div class="col-sm-12">
                                                            <input type="hidden" name="status" value="pesanan-diproses">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary mt-1">Proses Pesanan</button>
                                                        <p><strong>Status</strong> : New Order</p>

                                                    </form>
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
                    </div><!-- End Recent Sales -->
                </div>
            </div>
                        
    </section>
</main><!-- End #main -->
@endsection