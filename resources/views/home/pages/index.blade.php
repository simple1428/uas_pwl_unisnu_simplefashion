@extends('home.app')

@section('konten')

    <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center" >
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Simple Fashion</h1>
      <p>Sale!!  <span class="typed" data-typed-items="Kaos, Celana, Jaket, Aksesoris"></span></p>
      <div class="social-links">
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
      </div>
    </div>

  </section><!-- End Hero -->
    
 
    <!-- ======= Produk Section ======= -->
  <section id="portfolio" class="portfolio section-bg bg-light">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
          <h2>Produk</h2>
      </div>
      
      <div class="row">
        <div class="col-lg-12 d-flex justify-content-center  bg-light" data-aos="fade-up" data-aos-delay="100">
          <ul id="portfolio-flters" class="bg-light">
            <li data-filter="*" class="filter-active">All</li>
            @foreach($category as $ctg)
            {{-- <li data-filter=".filter-app">Celana</li> --}}
            <li data-filter=".{{  $ctg->slug}}">{{ $ctg->name }}</li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="row portfolio-container" >
        @foreach($produk as $pdk)
        <div class="col-md-6 col-lg-4 mb-3 portfolio-item {{  $pdk->category->slug}}" data-aos="fade-up" data-aos-delay="200">
          <div class="keyboard-box">
            <h4 class="keyboard-name">{{ $pdk->name }}</h4>
            <img src="{{ asset('storage/' .$pdk->imagetransparent) }}" alt="{{ $pdk->name }}" class="keyboard-img" width="250"/>
            <a href="{{ url('/produk/'.$pdk->slug) }}" class="btn btn-light keyboard-detail-button">Show Details</a>
          </div>
        </div> 
        @endforeach
      </div>
    </div>
    <div class="more text-center">
      <a href="{{ url('/produk') }}" class="btn btn-primary">More Produk</a>
    </div>
  </section><!-- End Produk Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services  testimonials section-bg bg-light" >
    <div class="container " data-aos="fade-up">
      <div class="section-title">
        <h2>Services</h2> 
      </div>
      <div class="row d-flex justify-content-center align-items-center">
        <div class="icon-box iconbox-blue  col-lg-3 col-md-6 d-flex justify-content-center align-items-center m-3 mt-md-0 " data-aos="zoom-in" data-aos-delay="100" width="400" style="border-radius: 10px">
        
          <div class="">
            <div class="icon">
              <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
              </svg>
              <i class="bi bi-wallet2"></i>
            </div>
            <h4><a href="">BAYAR DITEMPAT</a></h4> 
          </div>
        </div>

          <div class="icon-box iconbox-orange col-lg-3 col-md-6 d-flex justify-content-center align-items-center  m-3 mt-md-0 " data-aos="zoom-in" data-aos-delay="300" width="400" style="border-radius: 10px">

            <div class="   ">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
                </svg>
                <i class="bi bi-headset"></i>
              </div>
              <h4><a href="">CUSTOMER SERVICE</a></h4> 
            </div>
          </div>

          <div class=" icon-box iconbox-pink col-lg-3 col-md-6 d-flex justify-content-center align-items-center m-3 mt-lg-0  " data-aos="zoom-in" data-aos-delay="300" style="border-radius: 10px">

            <div class=" " >
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"></path>
                </svg>
                <i class="bi bi-truck"></i>
              </div>
              <h4><a href="">KURIR EXPRESS</a></h4> 
            </div>
          </div> 
      </div>
    </div>
  </section><!-- End Services Section -->

    <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials section-bg bg-light">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Testimonials</h2>
        </div>
      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="{{ asset('portfolio/assets/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="{{ asset('portfolio/assets/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="{{ asset('portfolio/assets/img/testimonials/testimonials-3.jpg') }}" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="{{ asset('portfolio/assets/img/testimonials/testimonials-4.jpg') }}" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="{{ asset('portfolio/assets/img/testimonials/testimonials-5.jpg') }}" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
          </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section><!-- End Testimonials Section -->

    


  @endsection