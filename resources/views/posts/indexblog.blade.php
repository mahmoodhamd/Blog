
 @extends('layouts.app')
 @section('title','Index page')
 @section('header')
@section('content')


{{-- < Body --> --}}



        <div class="container mt-3 mb-5">

            <div class="titlebar">
                <a class="btn btn-secondary float-end mt-3" href="{{ route('posts.createblog') }}" role="button" >Add Post</a>
                <h1>Mini Blog</h1>
            </div>


            <hr>

            @if ($errors->has('image'))
            <div class="alert alert-danger">{{ $errors->first('image') }}</div>
            @endif



            <div class="modal-body">
                @if(Session::has('success'))
               <div class="alert alert-success" role="alert" id="success-message">
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   {{Session::get('success')}}
           </div>
           @endif

            <div class="container">
              <div class="row row-cols-1 row-cols-md-3 g-4">

                @forelse ($posts as $post)
                <div class="col card-group">
                    <div class="card" style="width: 100%;">
                        @if($post->image)
                        <div style="width: 100%; height: 200px; overflow: hidden;">
                        <img class="img-fluid" style="object-fit: cover; width: 100%; height: 100%" src="{{ asset('storage/' . $post->image) }}" alt="image">
                        </div>
                        @endif

                          <div class="card-body">
                              <h5 class="card-title">{{ $post->title }}</h5>

                              <p class="card-text"> {!! nl2br(e(Str::limit($post->short_description, 60))) !!}</p>
                          </div>
                          <div class="card-footer">
                              <p class="card-text"><small class="text-muted">Last updated at
                                      {{ $post->updated_at->diffForHumans()}}</small></p>
                              <div class="btn-group mx-2" role="group">
                                  <a class="btn btn-info mx-2 " href='editblog/{{ $post->id }}' role="button"> Edit </a>

                                  <a class="btn btn-info mx-2 " href='delete/{{ $post->id }}'> Delete </a>
                                  <a class="btn btn-info mx-2" href='previewblog/{{ $post->slug }}'> Preview </a>
                              </div>
                          </div>
                      </div>

                  </div>

                  @empty
                  <p>No posts found</p>

                  @endforelse

              </div>
              @endsection


