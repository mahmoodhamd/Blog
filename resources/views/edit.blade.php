<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-compatible" content="IE-edge">
   @include('cdn')
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Welcome Page</title>
</head>
<body>
  <style>
    .mb-3{
     padding-left:350px;
    }
    .btn{
      margin-left: 350px;
    }
</style>
  <div class="row  ">
    <div class="mx-auto col-10 col-md-8 col-lg6 bg-info text-dark d-flex ">
      <div class="row align-items-center" style="height: 80vh;">
    <div class=" row justify-content-center">
    <form action='/edit' method='POST'>
    @csrf
    <div class="mb-3 ">
      
      <label for="name">First name:</label><br>
      
      <input type="hidden" name="id" value={{$users->id}} >
      <input type="text" id="name" name="name"  placeholder='Enter your Name' value="{{$users->name ?? ''}}"><br><br>
          
    </div>
    <div class="mb-3 ">
      <label for="Last_name">Last name:</label><br>
      
      <input type="text" id="Last_name" name="Last_name" placeholder="lastname" value="{{$users->Last_name ?? ''}}" > <br><br>    
      
    </div>
     
    <div class="mb-3">
      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email" placeholder="email" value="{{$users->email ?? ''}}" ><br> <br>
    
    
    </div>
    
    <div class="mb-3">
      <label for="address">Address:</label> <br>
      <input type="text" id="address" name="address" placeholder="add your address" value="{{$users->address ?? ''}}"><br> <br>
   
    </div>
    

    <button type="submit" class="btn btn-primary btn">Submit</button>
  </form>
</div>
<br><br>
    </div>
  </div>
  </div>

</body>

</html>