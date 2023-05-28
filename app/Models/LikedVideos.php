<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikedVideos extends Model
{
    //use HasFactory;

    //use HasFactory;
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
      }

      public function video(){
        return $this->belongsTo(Video::class);
      }
}
