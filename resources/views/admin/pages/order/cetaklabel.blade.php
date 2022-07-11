<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Fashion | Cetak Label</title>
    <!-- Favicons -->
    <link href="{{ asset('admin/assets/img/favicon.png') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container col-sm-6">
        <div class="row">
            <div class="card mt-5">
                <div class="header p-2">
                    <img src="{{ asset('test3.png') }}" alt="" width="40">
                    <span class="fs-4">Simple Fashion</span>
                    <hr>
                </div>
                <div class="card text-center p-0" >
                    <p class="fs-5 mt-3">No Resi : <span class="">{{ $order->no_resi }}</span></p>
                </div>
                <div class=" text-center p-2">
                    <center>{!! DNS1D::getBarcodeHTML(''. $order->no_resi, 'C128',4,70,'black') !!}</center>
                </div>
                <hr>
                <div class="row p-2">
                    <div class="col-sm-6">
                        <strong class="mb-2">Penerima  </strong>
                        <p class="">{{ $order->name }}</p>
                        <p class="">{{ $order->no_hp }}</p> 
                        <p class="">{{ $order->alamat }}</p>
                        <span class=" text-uppercase" >{{ $order->kecamatan .' , '. $order->kabupaten .' , '.$order->provinsi }}</span>
                    </div>
                    <div class="col-sm-6">
                        <strong class="mb-2">Pengirim  </strong>
                        <p class="">Simple Fashion</p>
                        <p class="">089619080300</p> 
                        <span class=" text-uppercase" >Donorojo , Jepara , Jawa Tengah</span> 
                    </div>
                </div>
                <div class="row m-3">
                    <div class="col-sm-6 ">
                        <div class="card p-0">
                            <p class="fs-5 mt-3 text-center text-uppercase">{{ $order->kabupaten }}</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card p-0">
                            <p class="fs-5 mt-3 text-center text-uppercase">{{ $order->kecamatan }}</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mt-2 p-0">
                            <p><strong>Ongkir :</strong> Rp {{ number_format($order->ongkir,0,',','.') }}</p>
                            <p><strong>COD :</strong> Rp {{ number_format($order->jumlah,0,',','.') }}</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mt-2 p-0">
                            <center>{!! DNS1D::getBarcodeHTML(''. $order->no_invoice, 'C128',2,70,'black') !!}
                                <p class="m-3"><strong>No Invoice :</strong> {{ $order->no_invoice }}</p>
                            </center>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">SKU</th>
                        <th scope="col">Qty</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $carts )
                        @foreach ($carts->produk as $no => $pdk )
                        
                        <tr>
                            <th scope="row">{{ ++$no }}</th>
                            <td>{{ $pdk->name }}</td>
                            <td></td>
                            <td>{{ $carts->qty }}</td>
                          </tr>
                        @endforeach
                        @endforeach
                      
                      
                    </tbody>
                  </table>

            </div>
        </div>
    </div>

</body>
</html>