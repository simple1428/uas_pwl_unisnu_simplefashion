@extends('admin.app')

@section('content')

<main id="main" class="main">

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
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">Tambah Produk <span>| Simple Fashion</span></h5>  
                                <form class="row g-3"action="{{ url('/admin/produk') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <label  for="name" class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required >
                                        @error('name')
                                            <div  class="invalid-feedback">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                    <div class="col-12">
                                        <label for="slug" class="form-label">Slug</label> 
                                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}"required >
                                        @error('slug')
                                            <div  class="invalid-feedback">{{ $message }}</div>
                                        @enderror 
                                    </div> 
                                    <div class="col-12">
                                        <label class="col-sm-2 col-form-label">Category</label>
                                        <div class="col-sm-4">
                                            <select class="form-select" aria-label="Default select example" name="category_id"> 
                                            @foreach ($category as $ctg) 
                                            @if (old('category_id') == $ctg->id)
                                            <option value="{{ $ctg->id }}" selected>{{ $ctg->name }}</option>
                                            @else
                                            <option value="{{ $ctg->id }}">{{ $ctg->name }}</option>
                                            @endif
                                            @endforeach
                                            </select>
                                        @error('category_id')
                                            <div  class="invalid-feedback">{{ $message }}</div>
                                        @enderror 
                                    </div>  
                                    <div class="col-4">
                                        <label   class="form-label">Harga</label> 
                                        <input type="number" class="form-control @error('harga') is-invalid @enderror"   name="harga" value="{{ old('harga') }}"required >
                                        @error('harga')
                                            <div  class="invalid-feedback">{{ $message }}</div>
                                        @enderror 
                                    </div> 
                                    <div class="col-4">
                                        <label   class="form-label">Stok</label> 
                                        <input type="number" class="form-control @error('stok') is-invalid @enderror"   name="stok" value="{{ old('stok') }}"required >
                                        @error('stok')
                                            <div  class="invalid-feedback">{{ $message }}</div>
                                        @enderror 
                                    </div> 
                                    <div class="row mb-3">
                                        <label for="image" class=" form-label">Foto </label>
                                        <div class="col-sm-4">
                                            <img class="img-preview img-fluid " width="150 ">
                                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                                            @error('image')
                                            <div  class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="imagetransparent" class=" form-label">Foto Tranparan</label>
                                        <div class="col-sm-4">
                                            <img class="img-preview img-fluid " width="150 ">
                                            <input class="form-control @error('imagetransparent') is-invalid @enderror" type="file" id="imagetransparent" name="imagetransparent" onchange="previewimagetransparent()">
                                            @error('imagetransparent')
                                            <div  class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class=" form-label ">Description</label>
                                        <input id="description" class="@error('description') is-invalid @enderror" type="hidden" name="description" value="{{ old('description') }}">
                                        <trix-editor input="description"  ></trix-editor> 
                                        @error('description')
                                            <div  class="invalid-feedback">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                    <div class="text-start">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div> 
                                    
                                </form><!-- Vertical Form -->
                        </div>
                    </div><!-- End Recent Sales -->
                </div>
            </div> 
    </section>
    
</main><!-- End #main -->




<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $('#name').change(function(e) {
    $.get('{{ url('check_slug') }}', 
    { 'name': $(this).val() }, 
    function( data ) {
        $('#slug').val(data.slug);
    }
    );
    });


    document.addEventListener( 'trix-file-accept',function(e){
        e.preventDefault();
    })


    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';


        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>


@endsection