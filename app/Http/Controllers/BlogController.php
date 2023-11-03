<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Str;
use App\Models\Blog;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    public function index(){
             $posts=Blog::with(['user', 'comments'])->orderBy('created_at', 'desc')->get();
             //dd($posts);
           return view('posts.indexblog',get_defined_vars());


   }


   public function store(StoreBlogRequest $req)
   {
    $imagePath = null;
    if ($req->hasFile('image')) {
        $uniqueFileName = time() . '_' . $req->id . '.' . $req->file('image')->getClientOriginalExtension();
        $req->image->storeAs('public/images', $uniqueFileName);
        $imagePath = $uniqueFileName;
    }

    Blog::create([
        'title' => $req->title,
        'description' => $req->description ?? '',
        'short_description' => $req->short_description ?? '',
        'image' => 'images/'.$imagePath, // Set to null if no image is provided
        'slug' => Str::slug($req->slug),
    ]);
    return redirect()->route('posts.indexblog')->with('success', 'Post created successfully.');

 }

    public function create() {
    return view('posts.createblog');
    }

     public function destroy($id){
      $posts=Blog::find($id);
      $posts->delete();
      return redirect()->route('posts.indexblog')->with('success','Post deleted successfully.');

    }




     public function edit($id){

      $posts=Blog::find($id);
      //dd($posts);
         return view('posts.editblog',get_defined_vars());
     }



     public function update(UpdateBlogRequest $req)
     {

    $data = $req->updateBlogData();
    Blog::where('id', $req->id)->update($data);
     return redirect()->route('posts.indexblog')->with('success', "Successfully edit the post");

   }


     public function show($slug){
          $posts=Blog::where('slug',$slug)->first();
         // dd($slug);
            return view('posts.previewblog',get_defined_vars());
        }
}
