<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <title>  @yield('title') </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- < Styles → --}}

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
{{-- < Navbar → --}}
<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="{{ route('posts.indexblog') }}">Mini-Blog</a>
    </div>
    <div class="d-flex justify-content-end align-items-center">

        @if (Auth::check())

       <img src="{{ asset('storage/user_images/'.Auth::user()->user_image) }}" class="card-img-top rounded-circle bg-transparent" style="-webkit-background-size: 32px 32px;
       background-size: 32px 32px;
       border: 0;
       -webkit-border-radius: 50%;
       border-radius: 50%;
       display: block;
       margin: 0px;
       position: relative;
       height: 45px;
       width: 45px;
       z-index: 0;">


       <span class="text-white me-2 mx-2"> {{ Auth::user()->firstname }}</span>
          <a href="{{ route('signout') }}" class="btn btn-info ms-2">Signout</a>

      @else
          <button class="btn btn-info ms-2 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
          <button class="btn btn-info ms-2 me-2 " data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</button>
      @endif
  </div>
  </nav>
</header>

{{-- < Body --> --}}


   {{-- @include('layouts.navigation')  --}}
   @yield('header')
   @yield('content')
   @include('layouts.modal')
   @yield('style')


{{-- <!-- Footer -->
<footer class="footer bg-dark py-3 sticky-bottom">
  <div class="container d-lg-flex justify-content-between">
    <span class="text-light">Mini-Blog ©  2023</span>
  </div>
</footer> --}}

<!-- Footer -->

<footer class="footer bg-dark fixed-bottom py-3 mt-5">
    <div class="container ">
      <div class="d-lg-flex  justify-content-center  ">
        <div class="text-light ">

            Mini-Blog ©@php
               echo date('Y M');
            @endphp

        </div>
      </div>
    </div>
  </footer>
  <!-- Footer -->


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
