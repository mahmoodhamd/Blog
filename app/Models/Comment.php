<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
   // public $timestamps = true;

    use HasFactory;
    protected $table='comments';
    protected $fillable=[
     'blog_id',
     'user_id',
     'comment_body'
    ];



   public function user(){
    return $this->belongsTo(User::class);
   }

}
