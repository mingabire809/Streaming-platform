<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //use HasFactory;

    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class)->orderBy('created_at', 'DESC');
      }

    public function likes(){
        return $this->hasMany(LikedVideos::class);
    }

    public function dislikes(){
        return $this->hasMany(LikedVideos::class);
    }
}
