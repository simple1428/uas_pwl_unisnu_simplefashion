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
    <div class="pagetitle p-2 me-4 bg-light ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">produk</li>
            </ol>
            <hr>
        </nav>
    </div><!-- End Page Title -->
  <div class="container "> 
    <div class="row me-4 "   >
        <div class="col-md-3 portfolio " data-aos="fade-up" data-aos-delay="200">  
            <ul class="list-group m-3  p-2  w-100 text-center" id="portfolio-flters">
                <li data-filter="*" class="filter-active list-group-item border-0 shadow"  style="cursor: pointer">All</li>
                @foreach ($category as $ctg)
                <li class="list-group-item border-0 shadow" aria-disabled="true" data-filter=".{{  $ctg->slug}}" style="cursor: pointer">{{ $ctg->name }}</li> 
                @endforeach
            </ul>
        </div>
        <div class="col-md-9 overflow-auto scroller" style="height:800px;">
            @if(session()->has('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="row portfolio-container m-2" >
                @foreach($produk as $pdk)
                <div class="col-md-6 col-lg-4 mb-3 portfolio-item  {{  $pdk->category->slug}}" data-aos="fade-up" data-aos-delay="200">
                    <div class="col mb-5 {{  $pdk->category->slug}}" data-aos="fade-up" data-aos-delay="200">
                        <div class="card shadow border-0 p-1">
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
                                        <input type="hidden" name="halaman" value="produk">
                                        <input type="hidden" name="slug" value="{{ $pdk->slug }}">
                                        <input type="hidden" name="produk_id" value="{{ $pdk->id}}">
                                        <input type="hidden" name="harga" value="{{ $pdk->harga }}">
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
    </div>
</div>

<script>
    window.addEventListener('load', () => {
    let portfolioContainer = select('.portfolio-container');
    if (portfolioContainer) {
      let portfolioIsotope = new Isotope(portfolioContainer, {
        itemSelector: '.portfolio-item'
      });

      let portfolioFilters = select('#portfolio-flters li', true);

      on('click', '#portfolio-flters li', function(e) {
        e.preventDefault();
        portfolioFilters.forEach(function(el) {
          el.classList.remove(' filter-active');
        });
        this.classList.add(' filter-active');

        portfolioIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        portfolioIsotope.on('arrangeComplete', function() {
          AOS.refresh()
        });
      }, true);
    }
 
</script>
        


@endsection

