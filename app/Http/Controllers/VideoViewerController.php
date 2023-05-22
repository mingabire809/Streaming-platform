<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VideoViewerController extends Controller
{
    //

    public function index(){
        
        $video = Video::all();
        //return $video;
        return view('video.index', compact('video'));
    }

    public function search(Request $request){
        $videos = Video::all();
        

        $title = $request->input(('title'));

        $video = collect($videos)->filter(function ($item) use ($title) {
            return stripos($item->title, $title) !== false;
        });

        //return $video;
        return view('video.search', compact('video'));
    }


    public function show(\App\Models\Video $video){
        //$post = Post::find($id);
        //return $video;
        $today = Carbon::now();
        $difference = $video->created_at -> diffForHumans($today);
        $videos = Video::whereNotIn('id', $video)->latest()->get();
        $items = Video::pluck('id')->toArray();
        $elements = $video->id;
        $index = array_search($elements, $items);

        $comments = Comment::whereIn('video_id', $video)->latest()->get();
        //return $index;
        return view('video.show', compact('video', 'difference', 'videos', 'comments', 'index'));
    }
}
