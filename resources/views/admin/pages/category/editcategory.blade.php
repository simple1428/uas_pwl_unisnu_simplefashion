@extends('admin.app')

@section('content')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/category') }}">Category</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">Tambah Category <span>| Simple Fashion</span></h5>  
                                <form class="row g-3"action="{{ url('/admin/category/'.$category->slug) }}" method="post" >
                                    @method('PUT')
                                    @csrf
                                    <div class="col-12">
                                        <label  for="name" class="form-label">Nama Category</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$category->name) }}" required >
                                        @error('name')
                                            <div  class="invalid-feedback">{{ $message }}</div>
                                        @enderror 
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug',$category->slug) }}"required readonly>
                                        @error('slug')
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
</script>


@endsection