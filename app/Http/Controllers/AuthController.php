<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
   public function register(){
    return view ('register');
   }

   public function registerPost(StoreAuthRequest $req)
   {

    $fileName = time() . '.' . $req->user_image->extension();
    $req->user_image->storeAs('public/user_images', $fileName);
    //dd($fileName);


    $user=new User();
    $user->firstname = $req->firstname;
    $user->lastname = $req->lastname;
    $user->email = $req->email;
    $user->password = Hash::make($req->password);
    $user->user_image=$fileName;
    $user->save();

       return back()->with('success', 'Register successfully');
   }

        public function login(Request $request) {

            $credentials = $request->only('email', 'password');
            // $credentials = $request->validate([
            //     'email' => 'required|email',
            //     'password' => 'required'
            // ]);
            if (Auth::attempt($credentials)) {
                // Authentication was successful

                if ($request->ajax()) {
                    // Return a JSON response for Ajax requests

                    return response()->json(['success' => true ,'user'=>Auth::user()]);
                } else {
                    // Redirect to your preview or home page for regular form submissions
                    return redirect('/indexblog');
                }
            }

            // Authentication failed
            if ($request->ajax()) {
                // Return a JSON response for Ajax requests
               // Session::flash('success', 'Logged in successfully.');
                return response()->json(['success' => false, 'error' => 'Login failed. Please check your email and password.']);
            } else {
                // Redirect back with an error message for regular form submissions
                return back()
                    ->withInput($request->only('email'))
                    ->with('error', 'Login failed. Please check your email and password.');
            }
        }


  public function logout()
  {
      Auth::logout();
      return redirect('/'); // Redirect to the login page after logout
  }





}
