@extends('admin.app')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">{{ url('/admin') }}</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
              <div class="flash-data" data-flashdata="{{ session('success') }}" data-name="Profil"></div>
              
              @if(session()->has('loginsuccess'))
              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ session('loginsuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            @if ($user->image)
                            <img src="{{ asset('storage/' .$user->image) }}" alt="{{ $user->image }}" class="rounded-circle" width="250" height="250">
                            @else
                            <img src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="{{ $user->image }}" class="rounded-circle" width="250" height="250">
                            @endif
                            <h2>{{ $user->username }}</h2>
                            <h4>Admin</h4>
                            <div class="social-links mt-2">
                              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>
                          </div>
                        </div>
              
                      </div>
              
                      <div class="col-xl-8">
              
                        <div class="card">
                          <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">
              
                              <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                              </li>
              
                              <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                              </li> 
              
                            </ul>
                            <div class="tab-content pt-2">
              
                              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                
                                <h5 class="card-title">Profile Details</h5>
              
                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label ">Nama lengkap</div>
                                  <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                                </div>
              
                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Email</div>
                                  <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                                </div>
              
                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Username</div>
                                  <div class="col-lg-9 col-md-8">{{ $user->username }}</div>
                                </div>
              
                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Nomor Telepon </div>
                                  <div class="col-lg-9 col-md-8">{{ $user->no_hp }}</div>
                                </div>
              
                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Provinsi</div>
                                  <div class="col-lg-9 col-md-8">{{ $user->provinsi }}</div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Kabupaten</div>
                                  <div class="col-lg-9 col-md-8">{{ $user->kabupaten }}</div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Kecamatan</div>
                                  <div class="col-lg-9 col-md-8">{{ $user->kecamatan }}</div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Alamat</div>
                                  <div class="col-lg-9 col-md-8">{{ $user->alamat }}</div>
                                </div>
              
                              </div>
              
                              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
              
                                <!-- Profile Edit Form -->
                                <form action="{{ url('/admin/user/'.$user->id)}}" method="post" enctype="multipart/form-data">
                                  @method('PUT')
                                  @csrf
                                  <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                    <div class="col-md-8 col-lg-9"> 
                                      <div class="pt-2"> 
                                    <input type="hidden" name="oldImage" value="{{ $user->image }}">
                                            @if ($user->image)
                                            <img src="{{asset('storage/'. $user->image) }}" class="img-preview img-fluid mb-3 d-block" width="120 ">
                                            @else
                                            <img src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" class="img-preview img-fluid mb-3" width="120 ">
                                            @endif 
                                            <br>
                                        <input type="file" id="image" name="image" class="@error('image') is-invalid @enderror" onchange="previewImage()">
                                        @error('image')
                                        <div  class="invalid-feedback">{{ $message }}</div>
                                        @enderror 
                                      </div>
                                    </div>
                                  </div>
              
                                  <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-md-8 col-lg-9">
                                      <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="fullName" value="{{ old('name',$user->name) }}">
                                    </div>
                                    @error('name')
                                            <div  class="invalid-feedback">{{ $message }}</div>
                                        @enderror 
                                  </div>  
              
                                  <div class="row mb-3">
                                    <label for="no_hp" class="col-md-4 col-lg-3 col-form-label">Nomor Hp</label>
                                    <div class="col-md-8 col-lg-9">
                                      <input name="no_hp" type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" value="{{ old('no_hp',$user->no_hp) }}">
                                    </div>
                                    @error('no_hp')
                                            <div  class="invalid-feedback">{{ $message }}</div>
                                        @enderror 
                                  </div>
              
                                  <div class="row mb-3">
                                    <label for="provinsi" class="col-md-4 col-lg-3 col-form-label">Provinsi</label>
                                    <div class="col-md-8 col-lg-9">
                                      <input name="provinsi" type="text" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" value="{{ old('provinsi',$user->provinsi) }}">
                                    </div>
                                    @error('provinsi')
                                            <div  class="invalid-feedback">{{ $message }}</div>
                                        @enderror 
                                  </div>
              
                                  <div class="row mb-3">
                                    <label for="kabupaten" class="col-md-4 col-lg-3 col-form-label">Kabupaten</label>
                                    <div class="col-md-8 col-lg-9">
                                      <input name="kabupaten" type="text" class="form-control @error('kabupaten') is-invalid @enderror" id="kabupaten" value="{{ old('kabupaten',$user->kabupaten) }}">
                                    </div>
                                    @error('kabupaten')
                                            <div  class="invalid-feedback">{{ $message }}</div>
                                        @enderror 
                                  </div>
              
                                  <div class="row mb-3">
                                    <label for="kecamatan" class="col-md-4 col-lg-3 col-form-label">Kecamatan</label>
                                    <div class="col-md-8 col-lg-9">
                                      <input name="kecamatan" type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" value="{{ old('kecamatan',$user->kecamatan) }}">
                                    </div>
                                    @error('kecamatan')
                                            <div  class="invalid-feedback">{{ $message }}</div>
                                        @enderror 
                                  </div>
                                  <div class="row mb-3">
                                    <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                    <div class="col-md-8 col-lg-9">
                                      <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" value="{{ old('alamat', $user->alamat) }}">
                                    </div>
                                    @error('alamat')
                                            <div  class="invalid-feedback">{{ $message }}</div>
                                        @enderror 
                                  </div>
              
              
                                  <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                  </div>
                                </form><!-- End Profile Edit Form -->
              
                              </div>
                              
              
                            </div><!-- End Bordered Tabs -->
              
                          </div>
                        </div>
              
                      </div>
                </div>
            </div>
                        
    </section>
</main><!-- End #main -->


<script>
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