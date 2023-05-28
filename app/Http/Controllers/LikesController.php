<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LikesController extends Controller
{
    use RefreshDatabase;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function like(\App\Models\User $user){
        return auth()->user()->likedvideos()->toggle($user->video);
     }
}
