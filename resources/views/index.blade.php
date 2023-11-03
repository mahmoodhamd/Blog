<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
  {{-- @include('cdn') --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> 
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



   

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"> 

    
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
   
   

   <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
   

   
   <title> Welcome Page</title>


</head>


<body>
   {{-- <style>
    a{
      text-decoration: none;
    }
   
    </style> --}}

<!-- add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
      <form id="my-form"> 
       
      
       <div class="modal-body" >
        {{ csrf_field() }}
       <div class="form-group mb-3">
          
        <label for="name">First name:</label><br>
    
        <input  type="text" name="name" class="form-control " placeholder="Enter your name">


       </div>
       
       <div class="form-group mb-3">
          
        <label for="Last_name">Last name:</label><br>
      
        <input type="text" name="Last_name" class="form-control"   placeholder="Enter last name">
      

       </div>


       <div class="form-group mb-3">
          
        <label for="email">Email:</label><br>
        <input type="email" class="form-control"  name="email" placeholder="Enteryour email">
      
     
       </div>


       
       <div class="form-group mb-3">
          
        <label for="address">Address:</label> <br>
        <input type="text" class="form-control"  name="address" placeholder="Enter your Address">


       </div>



      </div>
      <div class="modal-footer" id="modal-footer">
        <button type="button" class="btn btn-secondary" >Close</button>
        <button type="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
 

      </div>
    </form>
    
    </div>
  </div>
</div>


<div class="container py-5 ">
  <div class="row">
 <div class="col-md-12"> 
  <div class="card">
    <div class="card-header"> 
      <h1>
        Database Table 
       
        {{-- <button type="button" class="btn btn-primary  float-end" id="modal" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Add Data
        </button>    --}}
         
       <button type="button" class="btn btn-primary ms-1 float-end" id="modal" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Create Data
        </button>    


      </h1>
     </div>
<div class="card-body">
  <div class="container mt-5">
    <div class="table-responsive">
   
  <table id="myTable" class="table  table-striped table-sm table-bordered table-hover">        
      <thead class="table-dark " id="thead" >
          <tr>
              <th> Id   </th>
              <th>Name</th>
              <th>Last_Name</th>
              <th>Email</th>
              <th>Address</th>
              <th> Actions </th>
              
          </tr>
      </thead>
      <tbody id="tbody">
          
      
        @foreach($getuser as $user)

      <tr>
         <td> {{$user->id}}    </td>
        <td>{{$user->name}}</td>
        <td>{{$user->Last_name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->address}} </td>  
        <td ><a class="btn btn-info edit" data-bs-toggle="modal"    data-bs-target="#editmodal" href= 'edit/{{$user->id}}     ' > Edit </a>   <a  id="fetch_id"  class="btn btn-info delete  " data-bs-toggle="modal" data-bs-target="#deleteModal" data-make="{{$user->id}}"   > Delete    </a>  <a   class="btn btn-info"   href= 'preview/{{$user->id}}'> Preview  </a>  </td>  
               
  
      </tr>
      @endforeach

      </tbody>
      
  </table>
  </div>
  </div>
    


</div>
  </div>

</div>
  </div>
</div>





   
{{-- edit Modal --}}

<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Your Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
      <form id="editform"> 
      
       <div class="modal-body" >
        
        @csrf  

        @method('POST')

      

       <div class="form-group mb-3">
       
        <label for="name">First name:</label><br>
        
        <input type="hidden" name="id" id="id" >
      <input type="text" class="form-control" id="name" name="name"  placeholder='Enter your Name' >
          
       </div>
       
       <div class="form-group">
          
        <label for="Last_name">Last name:</label><br>
      
       <input type="text" id="Last_name" class="form-control" name="Last_name" placeholder="lastname">    
      

       </div>


       <div class="form-group">
          
        <label for="email">Email:</label><br>
        <input type="email" id="email" class="form-control" name="email" placeholder="email"  >
    
     
       </div>


       
       <div class="form-group">
          
        <label for="address">Address:</label> <br>
        <input type="text" id="address" class="form-control" name="address" placeholder="add your address" >
     

       </div>



      </div>
      <div class="modal-footer" id="modal-footer">
        <button type="button" class="btn btn-secondary" >Close</button>
        <button type="submit" class="btn btn-primary btn">Edit</button> 

      </div>
    </form>
    
    </div>
  </div>
</div>


   



<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form id="deleteform" method="POST">
      <div class="modal-body">
        @csrf  

         <input type="hidden" name="id" id="delete_id" value="">
         <p> Are you Sure !! you want to Delete this Data? </p>
      
      </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
        <button type="submit" class="btn btn-primary">Delete</button>
      </div>
    </div>
  </div>
</div>





    
    
    <script>
     
     $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
     });


     $(document).ready(function(){
           $(".edit").on('click',function(){
             $('#editModal').modal('show');
             $tr=$(this).closest('tr');
             var data=$tr.children('td').map(function(){

                return $(this).text();
             }).get();
           // console.log(data);
           const fieldIds=['id','name','Last_name','email','address'];
              for (let i=0; i<fieldIds.length;i++){
           
                $(`#${fieldIds[i]}`).val(data[i]);
              // console.log(`#${fieldIds[i]}`).val(data[i]);
            // console.log(`#${fieldIds[i]}`); 
            //   $('#id').val(data[0])
            //   $('#name').val(data[1])
            //   $('#Last_name').val(data[2]);
            //   $('#email').val(data[3]);
            //   $('#address').val(data[4]);
              }

             });
          

          $('#editform').on('submit',function(event){
            event.preventDefault();
            var id=$('#id').val();
           
            $.ajax({
             type:"POST",
             url:"edit",
             
             data:$('#editform').serialize(),
             success:function(response){
              console.log(response);
              $('#editmodal').modal('hide');
              $('#myTable').load (location.href + "#myTable"); 
              //location.reload();
             },
             error:function(error){
              console.log(error);
             }




            })



          })



      });

    </script>
  
     <script>

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
     });

       $(".delete").on('click',function(){
             $('#deleteModal').modal('show');
            
             $tr=$(this).closest('tr');
            
             var data=$tr.children('td').map(function(){
                 
                return $(this).text();
             }).get();
            console.log(data);
          $('#delete_id').val(data[0]);
       });
       $('#deleteform').on('submit',function(event){
        event.preventDefault();

       // var id=$('#delete_id').val();
         var datadelete=$('#fetch_id').attr('data-make');
         $('#delete_id').val(datadelete);
        $.ajax({
          type:"POST",
          url:'delete',
          data:$('#deleteform').serialize(),
          success:function(response){
           
            // console.log(response);
            $('#deleteModal').modal('hide');
            $('#myTable').load (location.href + "#myTable");
          //  alert("Data deleted");
           // location.reload();
          },
          error:function(error){
            console.log(error);
    
          }
        });


       }); 



      </script>


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
             // console.log('hello'+event);
              $.ajax({
                type:"POST",
                url:"store_data",
                data:data,
                processData:false,
                contentType:false,
                success:function(response,data){
                    if(response){
                  

                     $('#my-form')[0].reset();
                    $('#btnSubmit').prop("disabled",false);
                  
                    $('#myTable').load(location.href + "#myTable");
                   
                    $('#exampleModal').modal('hide');
                
                    // $('#myTable').reload();
                     console.log('resp'+response);
                    }
                },
                error:function(e){
                  $("#output").text(e.responseText);
                   console.log(e.responseText);
                    $('#btnSubmit').prop("disabled",false);
                    $('#my-form')[0].reset();   
                } 
              })
            /// console.log('clicked');
            });
      });
      </script>
      
   
   <script>
     
     $(document).ready(function () {
    $('#myTable').DataTable();
    
    

} );
        
    </script>
</body>
</html>





