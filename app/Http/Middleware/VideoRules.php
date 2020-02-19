<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use DB;
use Posts;
Use Auth;
use Closure;

/**class VideoRules
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     
    public function handle($request, Closure $id)
    {
        
    
    $time = (now()->format('H:i'));
    $day = date("Y-m-d");
    $number = date('N', strtotime($day));

    $post = Post::find($id);

    /**if($post->monday = $number){
        do nothing
    }
    else{
        deny acces to table $post->body;
    }        
        return $next($request);
    }
}
