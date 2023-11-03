

{{-- { Navbar → --}}
{{-- <header>
  <nav class="navbar bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand">Mini-Blog</a>
    </div>
  </nav>
</header>  --}}

{{-- < Body --> --}}
 @extends('layouts.app')
 @section('content')

 @section('title', 'previewblog')
 @section('header')
    <div class="container">
        <h1>Preview</h1>
        <section class="mb-4">
            <!-- Error message when data is not inputted -->
            <div class="card p-3">
              <body>
                <div class="row">
                       {{-- @dd($posts->all()) --}}

                      <p> title: {{$posts->title ?? ''}} </p><br><br>

                      <img class="img-fluid w-100 " style="height:40em;" src="{{ asset('storage/'.$posts->image) }}" alt="image">

                      <p> shortdescription: {!! nl2br(e($posts->short_description)) !!}</p><br><br>
                      <p> description: {!! nl2br(e($posts->description)) !!}</p><br><br>

                    </p>

                    </div>

              </body>

            </div>
            @if(Auth::check())
            {{-- <p>Wel {{ Auth::user()->firstname }}</p> --}}
            <div class="card p-3 mt-3">
                @if(session('success'))
               <h6 class="alert alert-success">{{session('success')}}</h6>

               @endif

               <strong class="d-flex  p-2 " > <img src="{{ asset('storage/user_images/'.Auth::user()->user_image) }}" class="card-img-top rounded-circle bg-transparent  " style="-webkit-background-size: 32px 32px;
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
                 <span class=" px-2 py-2">{{ Auth::user()->firstname }}</span> </strong>

              <form action="{{ route('comments.store') }}" method="POST">
                  @csrf
                  <div class="form-group">
                      <label for="comment">Leave a comment:</label>
                      <textarea class="form-control" name="comment_body" id="comment" rows="4" required></textarea>
                  </div>
                  <input type="hidden" name="blog_id" value="{{ $posts->id }}">

                  <button type="submit" class="btn btn-primary">Submit Comment</button>
              </form>
              @else
              <div class="alert alert-info mt-3">
                  Please <a href="#loginModal"   data-bs-toggle="modal" data-target="#login-modal">login</a> to leave a comment.
              </div>
              @endif


                {{-- comment section to display --}}

                <div class="row d-flex justify-content-center mb-5  ">


                    <div class="col-md-5 col-lg-6 w-100">

                        <div class="card shadow-0 border "  style="  background-color: #f6f6f6;" >
                            @foreach($posts->comments as $comment)
                            <div class="card-body p-3 ">

                          <div class="card mb-3 ">
                            <div class="card-body d-flex flex-row ">
                                <img src="{{ asset('storage/user_images/'.$comment->user->user_image) }}" class="card-img-top rounded-circle bg-transparent" style="-webkit-background-size: 32px 32px;
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

                                <strong class="px-2 py-2">{{ $comment->user->firstname ??''}}:</strong>

                            </div>

                            <div class="card-body">
                               <span > {{ $comment->comment_body }}</span>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                  {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(4).webp" alt="avatar" width="25"
                                    height="25" /> --}}
                                  {{-- <p class="small mb-0 ms-2">Martha</p> --}}
                                </div>

                              </div>
                            </div>
                          </div>

                    @endforeach
            </div>

        </section>
    </div>
        @endsection
