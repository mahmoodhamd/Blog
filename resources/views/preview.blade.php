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
   <div class="row">
     <p>userid:  {{$users->id}}<p>
      <p> username: {{$users->name ?? ''}} </p><br><br>
      <p>lastname: {{$users->Last_name ?? ''}} </p><br><br>
      <p> email: {{$users->email ?? ''}} </p><br><br>
      <p> address: {{$users->address ?? ''}}</p><br><br>
     </div>          
 
   
</body>

</html>