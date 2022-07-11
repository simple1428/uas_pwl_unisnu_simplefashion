@extends('home.app')

@section('konten')
<meta name="csrf-token" content="{{ csrf_token() }}">
 

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
<div class="container">
    <div class="me-4 p-3 bg-light">
      <div class="row">
        <div class="section-title mt-4">
          <h2>Data Diri</h2>
        </div>
          <div class="col-md-6">
            <form method="post" action="{{ url('/cekout') }}">
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label">Nama lengkap</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required > 
                @error('name')
                  <div  class="invalid-feedback">{{ $message }}</div>
                @enderror 
              </div>
              <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor Hp</label>
                <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"  required> 
                @error('no_hp')
                <div  class="invalid-feedback">{{ $message }}</div>
              @enderror 
              </div>
              <div class="mb-3">
                <label for="provinsi" class="form-label">Provinsi</label>
                <select class="form-select form-select @error('provinsi') is-invalid @enderror" name="provinsi" id="provinsi"  required>
                  <option value="">== Pilih Provinsi ==</option> 
                  @foreach ($provinces as $provinsi) 
                          <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option> 
                      @endforeach 
                </select>
                @error('provinsi')
                <div  class="invalid-feedback">{{ $message }}</div>
                @enderror 
              </div>
              <div class="mb-3">
                <label for="kabupaten" class="form-label">Kabupaten</label>
                <select class="form-select @error('kabupaten') is-invalid @enderror" name="kabupaten" id="kabupaten" required> 
                  <option value="">== Pilih Kab/Kota ==</option>
                </select>
                @error('kabupaten')
                <div  class="invalid-feedback">{{ $message }}</div>
              @enderror 
              </div>
              
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="kecamatan" class="form-label">Kecamatan</label>
              <select class="form-select @error('kecamatan') is-invalid @enderror" name="kecamatan" id="kecamatan" required> 
                <option value="">== Pilih Kecamatan ==</option>
              </select>
              @error('kecamatan')
              <div  class="invalid-feedback">{{ $message }}</div>
              @enderror 
            </div>
            <div class="mb-3">
              <label for="desa" class="form-label">Desa</label>
              <select class="form-select @error('desa') is-invalid @enderror" name="desa" id="desa" required> 
                <option value="">== Pilih Desa ==</option>
              </select>
              @error('desa')
              <div  class="invalid-feedback">{{ $message }}</div>
              @enderror 
            </div>
            <div class="mb-3">
              <label for="desa" class="form-label">Alamat lengkap</label>
              <div class="form-floating">
                <textarea  class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 125px" required></textarea>
                <label for="floatingTextarea2">Address</label>
              </div>
              @error('alamat')
              <div  class="invalid-feedback">{{ $message }}</div>
              @enderror 
            </div>  
          </div>
        </div>
        <table class="table table-hover text-center ">
          <thead>
              <tr >
              <th scope="col">#</th>
              <th scope="col">Image</th>
              <th scope="col">Produk</th>
              <th scope="col">Qty</th>
              <th scope="col">Harga</th> 
              </tr>
          </thead>
          <tbody> 
            @foreach($cart as $no => $crt)
            @foreach ($crt->produk as  $pdk)
            
            <input type="hidden" name="no_invoice" value="{{ $crt->no_invoice }}">
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
              <td> {{ $crt->qty }}</td>
              <td>{{ $pdk->harga }}</td> 
              </tr> 

              @endforeach
              @endforeach

          </tbody>
      </table>  
    </div>
      <div class="row me-4"> 
        <div class="col-md-12 text-end p-2" > 
          <p><strong>Cash On Delivery</strong></p>

          @php  
          $ongkir = 20000;
          $total = $ongkir + $cart->sum('total');
          @endphp
          <input type="hidden" name="ongkir" value="{{ $ongkir }}">
          <input type="hidden" name="pembayaran" value="Cash On Delivery">
          <input type="hidden" name="jumlah" value="{{ $total }}"> 
            <p>Barang : Rp {{ number_format($cart->sum('total'),0,',','.') }}</p>
            <p>Ongkir : Rp {{ number_format($ongkir,0,',','.') }}</p>
            <p>Total : Rp {{ number_format($total,0,',','.') }}</p>
            <button  type="submit" class="btn btn-primary" >Konfirmasi</button>
        </div> 
      </div>
      </form>
  </div> 
</div>
                    
                     

















    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script>
      $(function () {
         $.ajaxSetup({
             headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
         });
         $(function () {
     
             $('#provinsi').on('change', function () {
                 let id_provinsi = $('#provinsi').val();
                 $.ajax({
                     type: "GET",
                     url :"{{ route('getkabupaten') }}",
                     data: {id_provinsi:id_provinsi},
                     cache: false,
     
                     success: function(msg){
                         $('#kabupaten').html(msg);
                         // $('#kecamatan').('');
                     },
                     error: function(data){
                         console.log("Error:".data);
                     }
                 })
     
             })
             $('#kabupaten').on('change', function () {
                 let id_kabupaten = $('#kabupaten').val();
                 $.ajax({
                     type: "GET",
                     url :"{{ route('getkecamatan') }}",
                     data: {id_kabupaten:id_kabupaten},
                     cache: false,
     
                     success: function(msg){
                         $('#kecamatan').html(msg);
                         // $('#kecamatan').('');
                     },
                     error: function(data){
                         console.log("Error:".data);
                     }
                 })
     
             })
             $('#kecamatan').on('change', function () {
                 let id_kecamatan = $('#kecamatan').val();
                 $.ajax({
                     type: "GET",
                     url :"{{ route('getdesa') }}",
                     data: {id_kecamatan:id_kecamatan},
                     cache: false,
     
                     success: function(msg){
                         $('#desa').html(msg);
                         // $('#kecamatan').('');
                     },
                     error: function(data){
                         console.log("Error:".data);
                     }
                 })
     
             })
     
     })
     
     }); 
       </script>
    
    
@endsection