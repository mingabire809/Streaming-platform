<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DisLikesController extends Controller
{
    use RefreshDatabase;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dislike(\App\Models\User $user){
        return auth()->user()->dislikedvideos()->toggle($user->video);
     }
}
