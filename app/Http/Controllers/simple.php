<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Storage;
use App\Post;
use DB;
use Posts;
Use Auth;

use Illuminate\Http\Request;

class simple extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function index()
    {
        $today = strToLower(now()->format('l'));
        
        $posts = auth()->user()->posts()->latest()->where($today,'<>',0)->paginate(10);
        return view('simple')->with('posts', $posts);
    }
}
