<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Posts;

class simple extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $today = strToLower(now()->format('l'));

        $posts = auth()->user()->posts()
            ->latest()
            ->where(function ($query) use ($today) {
                $query->where($today, '<>', 0)
                    ->orwhere('immer', '=', '1');
            })
            ->paginate(10);

        return view('simple')->with('posts', $posts);
    }
}
