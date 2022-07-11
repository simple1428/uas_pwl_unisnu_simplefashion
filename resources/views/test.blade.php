<!doctype html>

<html lang="en">

  <head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

 

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

 

    <title>Selamat Datang | Aplikasi Dependent Dropdown</title>

  </head>

  <body>

    

  <div class="container">

    <form method="post" >

        <div class="form-group row">

            <label for="name" class="col-md-4 col-form-label">Provinsi</label>

 

            <div class="col-md-6">

                <select name="provinsi" id="provinsi" class="form-control">

                    <option value="">== Pilih Provinsi ==</option>

                    @foreach ($provinces as $provinsi)
                    

                        <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>

                    @endforeach 
                </select>

            </div>

        </div>

 

        <div class="form-group row">

            <label for="name" class="col-md-4 col-form-label">Kab/Kota</label>

            <div class="col-md-6">
                <select name="kota" id="kabupaten" class="form-control">

                    <option value="">== Pilih Kab/Kota ==</option>

                </select>

            </div>

        </div>

    </form>

 

  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

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

})

}); 
  </script>
 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>

</html>