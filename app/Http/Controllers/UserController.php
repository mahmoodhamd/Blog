<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  
  public function showRegistrationForm()
  {
      return view('register'); // Create a view for your registration form
  }

  public function registerPost(Request $req)
  {
      
      dd($req->all());
      $req->validate([
          'firstname' => 'required|string',
          'lastname' => 'required|string',
          'email' => 'required|email|unique:users',
          'password' => 'required|confirmed', // Make sure you have a password_confirmation field in your form
      ]);
      
      // Create a new user
      User::create([
          'firstname' => $req->input('firstname'),
          'lastname' => $req->input('lastname'),
          'email' => $req->input('email'),
          'password' => Hash::make($req->input('password')),
      ]);

      // Redirect to a success page or perform a login operation here

      return redirect('posts.indexblog')->with('success', 'User registered successfully. Please log in.');
  }


}










































































































// public function index(Request $req){
//   // this is getting the data from db user.
//   // we can use get and all according to our requirment.
//   $getuser=User::get();
//   //dd($getuser);
//   return view('index',get_defined_vars());
// }
  


// public function addData(Request $req){

//   $req->validate([
//     'name' => 'required|string',
//     'Last_name' => 'required|string',
//     'email' => 'required|email',
//     'address' => 'required|string',
// ]);
//      //  $member= new Member;
//       // $member->name=$req->name;
//       // $member->Last_name=$req->Last_name;
//       // $member->email=$req->email;
//       // $member->address=$req->address;
//       // $member->save();
//       // $data=[
        
//       //   'name'=>$req->name,
//       //   'Last_name'=>$req->Last_name,
//       //   'email'=>$req->email,
//       //   'address'=>$req->address,
         
//       // ];
//       //dd($req->name);


//       $users=User::create($req->all());
      
//        //dd($users);
//       //users->save($data);
//      // dd($users);
//         //  return response()->json($users,['users=>users created successfully']);
//         return response()->json([
//           'data' => [
//               'users' => $users,
              
//           ]
//       ]); 
//       // $response =['success'=>'ok'];
//       //  return response()->json($response);
//        // return redirect('/');

//    }


//   public function deletedata(Request $req){
//      $users=User::where('id',$req->id)->delete();
//      //$users->delete();
    
//      return redirect('/');
//       // dd($users);
//    }

//   public function editdata($id){
//     // it is for the single data fetch
//    // $users=User::where('id',$id)->first();
//     $users=User::find($id);
//   // dd($users);
   
//     return view('edit',['users'=>$users]);
  
//   }

//   public function update(Request $req)
//   {

//     User::where('id', $req->id)->update($req->only(['name', 'Last_name', 'email', 'address']));

//     return redirect('/');

//       // $users = User::find($req->id);
//       // $users->name = $req->name;
//       // $users->Last_name = $req->Last_name;
//       // $users->email = $req->email;
//       // $users->address=$req->address;
//       // $users->save();
//       // return redirect('/');
//   }
//   public function show($id){
     
//     $users=User::find($id);
//      //dd($users);
//       return view('preview',['users'=>$users]);
//   }