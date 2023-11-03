<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;

use App\Http\Controllers\CommentController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::post('store_data',[UserController::class,'addData']);
// Route::get('/',[UserController::class,'index']);

// Route::post('delete',[UserController::class,'deletedata']);
// Route::get('edit/{id}',[UserController::class,"editdata"]);
// Route::post('edit',[UserController::class, 'update']);
// Route::get('preview/{id}',[UserController::class,'show']);

//Route::resource('users',UserController::class);


// thjs for some group routes.
// Route::controller(UserController::class)->group(function(){
//     Route::get('/route','index');
//     Route::get('/route2','somemessage');
// });

// Route::get('/create', function () {
//     return view('create');

//  });


Route::get('/',[BlogController::class,'index']);

Route::resource('/',BlogController::class)->names([
    'index'=>'posts.indexblog',
    'create'=>'posts.createblog',

    'store'=>'posts.store',
    //'edit' => 'posts.editblog', // This is the standard 'update' route



]);
// comment system
Route::resource('comments', CommentController::class)->names([
    'store' => 'comments.store',

]);

// Route::resource('/', BlogController::class)->except([
//     'edit','update', 'destroy', 'show'
// ]);

 Route::get('editblog/{slug}',[BlogController::class,"edit"]);
 Route::post('editblog',[BlogController::class,'update'])->name('posts.editblog');
  Route::get('delete/{id}',[BlogController::class,'destroy'])->name('posts.destroy');
 Route::get('previewblog/{slug}',[BlogController::class,'show']);

//  Route::get('/register', [AuthController::class,'register'])->name('register');
Route::post('/store', [AuthController::class,'registerPost'])->name('signup');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/signout', [AuthController::class,'logout'])->name('signout');

// Route::post('/userlogin',[AuthController::class,'loginPost'])->name('login');

 //Route::post('/comments/store',[CommentController::class,'store'])->name('comments.store');




// Route::get('/phpinfo', function() {
//     phpinfo();
// });





 //  Route::get('login',[AuthController::class,'index'])->name('login');
//  Route::get('register',[AuthController::class,'register_view'])->name('register');
//Route::get('/posts/{post}/editblog', PostController::class,'edit')->name('posts.editblog');

// Route::get('/createblog',function(){
//     return view ('createblog');
// });

// Route::get('/', function () {
//     return view('hello');

//  });

//Route::view('table','/table');

// Route::get('/hello2', function () {
//     return view('hello');

// });
// one liner to route the file.
//Route::view('hello','/hello');

// Route::get('/{name}',function($name){

//     if($name==='hamd'){
//      return view('hello',['name'=>$name]);
//     }
//     else{
//         return view('welcome');
//     }
// });

// to define the dynamic array.

// Route::get('/{name}',function($name){


//          return view('hello',['name'=>$name]);
//        });
