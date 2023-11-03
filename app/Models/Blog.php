<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'status',
        'image',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class,'blog_id')->orderby('id','desc');
    }
    public function user(){
        return $this->belongsTo(User::class);
       }
    public function Sluggable():array{

       return[
           'slug'=>
           [
              'source'=>'title'
           ]
       ];

    }

}
