<?php

namespace App\Http\Controllers;

use App\Post;
use Auth;
use Illuminate\Http\Request;
use Posts;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        //return Post::where('title', 'Post Two')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('title','desc')->take(1)->get();
        //$posts = Post::orderBy('title','desc')->get();
        // Returns nur eigene Posts:
        //  $posts = auth()->user()->posts()->latest()->paginate(10);
        //return view('posts.index')->with('posts', $posts);
        // gibt alle post wieder:
        //$posts = Post::orderBy('created_at','desc')->paginate(10);
        //return view('posts.index')->with('posts', $posts);
        //$posts = auth()->user()->posts()->latest()->paginate(10);

        /* $today = strToLower(now()->format('l'));
        $posts = auth()->user()->posts()->latest()->where($today,'<>',0)->paginate(10);
        return view('posts.index')->with('posts', $posts);*/

        $today = strToLower(now()->format('l'));

        $posts = auth()->user()->posts()
            ->latest()
            ->where(function ($query) use ($today) {
                $query->where($today, '<>', 0)
                    ->orwhere('immer', '=', '1');
            })
            ->paginate(10);

        return view('posts.index')->with('posts', $posts);

    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            //'cover_image' => 'image|nullable|max:1999'
        ]);

        /* Handle File Upload
        if($request->hasFile('cover_image')){
        Get filename with the extension
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        Get just ext
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        Filename to store
        $fileNameToStore= $filename.'_'.time().'.'.$extension;
        Upload Image
        $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
        $fileNameToStore = 'noimage.jpg';
        }*/

        // Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->monday = $request->has('monday') ? 1 : 0;
        $post->tuesday = $request->has('tuesday') ? 2 : 0;
        $post->wednesday = $request->has('wednesday') ? 3 : 0;
        $post->thursday = $request->has('thursday') ? 4 : 0;
        $post->friday = $request->has('friday') ? 5 : 0;
        $post->saturday = $request->has('saturday') ? 6 : 0;
        $post->sunday = $request->has('sunday') ? 7 : 0;
        $post->immer = $request->has('immer') ? true : false;
        $post->timefrom = $request->input('timefrom');
        $post->timeto = $request->input('timeto'); // oder $request->timeto; ?
        $post->user_id = auth()->user()->id;
        //$post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    public function edit($id)
    {
        $post = Post::find($id);

        //Check if post exists before edit
        if (!isset($post)) {
            return redirect('/posts')->with('error', 'No Post Found');
        }

        // Check for correct user
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);
        $post = Post::find($id);
        // Handle File Upload
        /*if($request->hasFile('cover_image')){
        // Get filename with the extension
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore= $filename.'_'.time().'.'.$extension;
        // Upload Image
        $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        // Delete file if exists
        Storage::delete('public/cover_images/'.$post->cover_image);
        } */

        // Update Post
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        /*if($request->hasFile('cover_image')){
        $post->cover_image = $fileNameToStore;
        }*/
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        //Check if post exists before deleting
        if (!isset($post)) {
            return redirect('/dashboard')->with('error', 'No Post Found');
        }

        // Check for correct user
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }

        /*if($post->cover_image != 'noimage.jpg'){
        // Delete Image
        Storage::delete('public/cover_images/'.$post->cover_image);
        }*/

        $post->delete();
        return redirect('/dashboard');
    }

}
