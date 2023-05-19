<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoViewerController extends Controller
{
    //

    public function index(){
        
        $video = Video::all();
        //return $video;
        return view('video.index', compact('video'));
    }


    public function show(\App\Models\Video $video){
        //$post = Post::find($id);
        //return $video;
        return view('video.show', compact('video'));
    }
}
