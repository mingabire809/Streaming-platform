<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Carbon\Carbon;


class MyVideosController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function myvideo(){
       $video = auth()->user()->video;
       //return $video;
       return view('video.myvideos', compact('video'));
    }

    public function singlevideo(\App\Models\Video $video){
        //$post = Post::find($id);
        //return $video;
        //$this->authorize('update', $user->video);

        $user = auth()->user();
        if($user->id == $video->user_id){
            $today = Carbon::now();
            $difference = $video->created_at -> diffForHumans($today);
            $videos = Video::whereNotIn('id', $video)->whereIn('user_id', $user)->latest()->get();
            $array = $user->video->pluck('id')->toArray();
            $elements = $video->id;
            $index = array_search($elements, $array);
            
            $comments = $video->comment;
            
            //$comments = Comment::whereIn('video_id', $video)->latest()->get();
            //return $array;
            return view('video.singlevideo', compact('video', 'difference', 'videos', 'comments', 'index', 'today', 'array'));
        }else{
            abort(403, 'Unauthorized');
        }
       
    }

    public function editvideo(\App\Models\Video $video){
        $user = auth()->user();
        if($user->id == $video->user_id){
            $data = request()->validate([
                'title' => 'required'
                
            ]);
            
            //To update all the items at the same time
            //auth()->user()->video->update($data);
            $video->update($data);
            return redirect('/my-video/' . $video->id);
        }else{
            abort(403, 'Unauthorized');
        }
    }


    public function deletevideo(\App\Models\Video $video){
        $user = auth()->user();
        if($user->id == $video->user_id){
            
            $video->delete();
            return redirect('/my-video');
        }else{
            abort(403, 'Unauthorized');
        }
    }


}
