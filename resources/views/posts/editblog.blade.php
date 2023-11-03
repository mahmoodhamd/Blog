
{{-- { Navbar → --}}


{{-- < Body --> --}}

  @extends('layouts.app')
  @section('content')
  @section('title', 'Edit Blog')
   @section('style')
   @section('header')
  <style>
      /* Your CSS styles here */
      .custom-file-label::after {
        content: none;
      }
  </style>

    <div class="container">
        <h1>Edit Post</h1>
        <section class="mb-5">
          {{-- action="/editblog" --}}
          <form method="post" action="{{route('posts.editblog', $posts->id)}}" enctype="multipart/form-data">
            @csrf
            <!-- Error message when data is not inputted -->

            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <div class="card p-3">
              <label for="floatingInput">Title</label>
              <input type="hidden" id="id" name="id" value="{{$posts->id ?? ''}}">
              <input class="form-control" name="title" type="text" id="title" value="{{$posts->title ?? '' }}"  >

              <div class="form-group">
                <label for="description">description</label>
                <textarea class="form-control" name="description" id="description"  rows="3" required>{{ $posts->description ?? ''}} </textarea>
              </div>

              <div class="form-group">
                <label for="short_description">short_description</label>
                <textarea class="form-control" name="short_description" id="short_description"  rows="3" required>{{ $posts->short_description ?? ''}} </textarea>
              </div>


              <label for="slug" class="form-label">Slug</label>
              <input type="text" name="slug" class="form-control" id="slug"  value="{{$posts->slug ?? ''}}" >


              <div class="custom-file">
                <input type="file" name="image" id="image" class="custom-file-input" >

            </div>
            <img class="img-fluid  w-25" src="{{ asset('storage/'.$posts->image) }}" alt=""  >

            </div>
            <button class="btn btn-secondary m-3">Save</button>
          </form>
        </section>

      </div>
      @endsection




