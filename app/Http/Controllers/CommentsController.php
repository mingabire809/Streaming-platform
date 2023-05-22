<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        $comment = Comment::all();
        return $comment;
        //return view('video.index', compact('video'));
    }

    public function store(Video $video){
        
        $data = request()->validate([
            'comment' => 'required'
        ]);

        auth()->user()->comment()->create([
            'comment' => $data['comment'],
            'video_id'=> $video->id
        ]);
        

        return redirect('/video/' . $video->id);
    }
}
