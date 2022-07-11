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
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                </div>

                <form class="row g-3 needs-validation" action="{{ url('/register') }}" method="post">
                    @csrf
                    <div class="col-12">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="col-12">
                    <label for="no_hp" class="form-label">Nomor Telepon</label>
                    <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" value="{{ old('no_hp') }}" required>
                    @error('no_hp')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="col-12">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ old('username') }}" required>
                        @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror 
                    </div>
                    </div>
                    
                    <input type="hidden" name="status" value="1">

                    <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror 
                    </div>
                    <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror 
                    </div>

                    <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                    </div>
                    </div>
                    <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                    <p class="small mb-0">Already have an account? <a href="{{ url('/login') }}">Log in</a></p>
                    </div>
                </form>

                </div>
            </div> 

            </div>
        </div>
        </div>

</section>

@endsection
