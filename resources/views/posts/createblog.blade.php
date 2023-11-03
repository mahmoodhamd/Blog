
{{-- { Navbar → --}}


{{-- < Body --> --}}
   @extends('layouts.app')
   @section('content')
   @section('title','createblog')
   @section('header')
    <div class="container">
        <h1>Add Post</h1>
        <section class="mb-5">
          <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
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
              <input class="form-control" type="text" id="title" name="title">

              <label for="floatingTextArea">Description</label>
              <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>

              <label for="floatingTextArea">Short Description</label>
              <textarea class="form-control" name="short_description" id="short_description" cols="10" rows="10"></textarea>

              <label for="slug" class="form-label">Slug</label>
              <input type="text" name="slug" class="form-control" id="slug"> <br>

              <div class="input-group">

                  <div class="custom-file">
                    <label class="custom-file-label" >Choose file </label>
                    <input type="file" name="image" id="image" class="custom-file-input">

                  </div>

              </div>
            </div>
            <button class="btn btn-secondary m-3">Save</button>
          </form>
        </section>

      </div>
     @endsection






