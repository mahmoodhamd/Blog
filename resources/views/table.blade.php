<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-compatible" content="IE-edge">
    @include('cdn') 

   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
  
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

   <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
     <title> Welcome Page</title>
</head>
<body>
  
  <style>
  .table-responsive{
    margin-top:20px;
  }

</style>


  <div class="container">
    <div class="row">
    <div class="col-sm-8 col-md-8 col-lg-8"><h1>Database table </h1></div>
    <div class="col-sm-4 col-md-4 col-lg-4 gx-7">
      
      <button class="btn btn-primary" onclick="location.href='{{ url('create') }}'">Create </button>
  </div>
  <div class="table-responsive ">
    <table id="myTable" class="table table-bordered" >
         <thead class="table-dark">
        <tr>
          <th>name</th>
          <th>last_name</th>
          <th>email</th>
          <th>Address</th>
        </tr>
         </thead>
        {{-- db is returning the data to view html. --}}
        
        @foreach($getuser as $user)
        
        <tr>
          
          <td>{{$user->name}}</td>
          <td>{{$user->Last_name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->address}} </td>
          <td><a href = 'edit/{{$user->id}}' > Edit </a></td>  
          <td><a href = 'delete/{{$user->id}}' > Delete </a></td>
              
        </tr>
      
        @endforeach
        
        
  </div>
</table>

 
<script>


$(document).ready(function () {
    $('#myTable').DataTable();
} );

  </script>

</body>
</html>

