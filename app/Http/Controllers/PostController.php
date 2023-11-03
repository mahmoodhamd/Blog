<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
         // this is getting the data from db user.
    // we can use get and all according to our requirment.
    $getuser=User::get();
    //dd($getuser);
    return view('index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        $req->validate([
            'name' => 'required|string',
            'Last_name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
        ]);
             //  $member= new Member;
              // $member->name=$req->name;
              // $member->Last_name=$req->Last_name;
              // $member->email=$req->email;
              // $member->address=$req->address;
              // $member->save();
              // $data=[
                
              //   'name'=>$req->name,
              //   'Last_name'=>$req->Last_name,
              //   'email'=>$req->email,
              //   'address'=>$req->address,
                 
              // ];
              //dd($req->name);
      
      
              $users=User::create($req->all());
              
               //dd($users);
              //users->save($data);
             // dd($users);
                //  return response()->json($users,['users=>users created successfully']);
                return response()->json([
                  'data' => [
                      'users' => $users,
                      
                  ]
              ]); 
              // $response =['success'=>'ok'];
              //  return response()->json($response);
               // return redirect('/');
       
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users=User::find($id);
        //dd($users);
         return view('preview',['users'=>$users]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
          // it is for the single data fetch
     // $users=User::where('id',$id)->first();
      $users=User::find($id);
      // dd($users);
       
        return view('edit',['users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        User::where('id', $req->id)->update($req->only(['name', 'Last_name', 'email', 'address']));

        return redirect('/');
  
          // $users = User::find($req->id);
          // $users->name = $req->name;
          // $users->Last_name = $req->Last_name;
          // $users->email = $req->email;
          // $users->address=$req->address;
          // $users->save();
          // return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $req,string $id)
    {
        $users=User::where('id',$req->id)->delete();
        //$users->delete();
       
        return redirect('/');
         // dd($users);
    }
}
