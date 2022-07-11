<!DOCTYPE html>
<html lang="en">

@include('home.templates.header')

<body>

@include('home.templates.sidebar')
<main id="main" class="shadow-lg bg-light ">
@yield('konten')
  
    <div class="  text-center bg-primary p-3 text-white">
      <div class="copyright">
        &copy; Copyright <strong><span>Simple Fashion</span></strong>. All Rights Reserved
      </div> 
    </div>
</main>
@include('home.templates.footer')

</body>

</html>