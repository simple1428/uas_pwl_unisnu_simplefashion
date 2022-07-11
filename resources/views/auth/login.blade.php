@extends('auth.app')

@section('content')


<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
          
          <div class="d-flex justify-content-center py-4">
            <a href="index.html" class="logo d-flex align-items-center w-auto">
            <img src="{{ asset('admin/assets/img/logosimple.png') }}" alt="">
            <span class="d-none d-lg-block">Simple Fashion</span>
            </a>
        </div><!-- End Logo -->

          <div class="card mb-3">

            <div class="card-body">
              

              <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                <p class="text-center small">Enter your username & password to login</p>


                  @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                  @if(session()->has('loginerror'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginerror') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif


              </div>


              <form class="row g-3 needs-validation" action="{{ url('/login') }}" method="post">
                @csrf
                <div class="col-12">
                  <label for="email" class="form-label">Email</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}"required>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="col-12">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
                  @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="submit">Login</button>
                </div>
                <div class="col-12">
                  <p class="small mb-0">Don't have account? <a href="{{ url('/register') }}">Create an account</a></p>
                </div>
              </form>

            </div>
          </div> 

        </div>
      </div>
    </div>

  </section>

  @endsection