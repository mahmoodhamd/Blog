<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
  public function store(Request $request)
  {

    $validator=Validator::make($request->all(),[
     'comment_body'=>'required|string'
    ]);
    if($validator->fails()){
        return redirect()->back()->with('success','comment area is mandatory');
    }

        Comment::create([
          'blog_id' => $request->blog_id,
          'user_id' => Auth::user()->id, // Set to null for unauthenticated users
          'comment_body' =>$request->comment_body
      ]);
        //dd($comments);
      return back()->with('success','created successfully');

    }

}

