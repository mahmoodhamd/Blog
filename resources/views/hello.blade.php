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
      .my-custom-row{
      background-color:bisque;
      height: 400px;
      }
     </style>



    <div class="container">
      <div class="row">
    
      <div class="col-sm-12 col-md-6"> Col one </div>
      <div class="col-sm-12 col-md-6"> Col two </div>
      </div>

      <div class="row">
        {{-- we can order our bootstrap classes for different screen or without the screens. --}}
        <div class="col-sm-12 col-md-6 order-2 " > Col one </div>
        <div class="col-sm-12 col-md-2 order-1 "> Col two </div>
        </div>
        
        <div class="row">
            {{-- we can use offset class in our bootstrap. --}}
            <div class="col-sm-12 col-md-6 offset-md-3 " > Col one </div>
            <div class="col-sm-12 col-md-2 offset-md-1 "> Col two </div>
            </div>
       
            <div class="row my-custom-row justify-content-center align-items-center gx-5 " >
                {{-- we can use offset class in our bootstrap. --}}
                {{-- if you want to create some gaps between use this gx-2 --}}
                <div class="col-sm-4 " ><div class="p-3 border bg-light"> Col one </div></div>
                <div class="col-sm-4 " ><div class="p-3 border bg-light"> Col one </div></div>
                
                </div>

    </div>

</body>
</html>





