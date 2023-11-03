<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-compatible" content="IE-edge">
   @include('cdn')
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Welcome Page</title>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>
 <style>
   .form-control:focus{
    border:1px solid #ffffff;
    border-color: #28a745;
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
   }
  </style>
  <div class="row ">
    <div class="mx-auto col-10 col-md-8 col-lg6 bg-info text-dark">
      <div class="row align-items-center" style="height: 80vh;">
  <h1 class="mx-auto" style="width:300px;">put your data</h1>
  
  <form id="my-form" action="store_data" method="POST" >
    @csrf
    <div class="mb-3">
      
      <label for="name">First name:</label><br>
    
      <input id="name" type="text" name="name" class="form-control " placeholder="Enter name">
          
    </div>
    <div class="mb-3 ">
      <label for="Last_name">Last name:</label><br>
      
      <input type="text" name="Last_name" class="form-control" id="Last_name"  placeholder="Enter last name">
    
    </div>
     
    <div class="mb-3">
      <label for="email">Email:</label><br>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
    
    </div>
    
    <div class="mb-3">
      <label for="address">Address:</label> <br>
      <input type="text" id="address" name="address" placeholder="add your address" value="{{$users->address ?? ''}}"><br> <br>
   
    </div>
    

    <button type="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
 
  </form>
  <span id="output"></span>
  <script>
    $(document).ready(function(){
         $("#my-form").submit(function(event){
            event.preventDefault();
            // instead of using [0] array index you can use
            // we can use first method in order to acces the child elements of dom elements.
            // var form=$("#my-form")[0];
            // var form=$("#my-form:first"); 
            var form=$("#my-form").get(0);
            var data= new FormData(form);
            $('#btnSubmit').prop("disabled",true);
            
            $.ajax({
              type:"POST",
              url:"store_data",
              data:data,
              processData:false,
              contentType:false,
              success:function(data){
                   $("#output").text(data.res);
                   $('#btnSubmit').prop("disabled",false);
                   $("input[type='text']").val('');
                   $("input[type='text']").val('');
                   $("input[type='email']").val('');
                   $("input[type='text']").val('');
                   
              },
              error:function(e){
                $("#output").text(e.responseText);
                //  console.log(e.responseText);
                  $('#btnSubmit').prop("disabled",false);
                   $("input[type='text']").val('');
                   $("input[type='text']").val('');
                   $("input[type='email']").val('');
                   $("input[type='text']").val('');
                   
              }
            })
          /// console.log('clicked');
          });
    });
    </script>
<br><br>
   
</div>
  </div>
  </div>

  

</body>
</html>
