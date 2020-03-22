<?php

namespace App\Http\Controllers;

use App\Post;
use Auth;
use Illuminate\Http\Request;
use Posts;
use Intervention\Image\Facades\Image;
use Storage;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $today = strToLower(now()->format('l'));
       
        // searching for day of the week in table.
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

        $rules = array(
            'title' => 'required',
            'body' => 'required',
            'image' => 'file|image|nullable|max:5000',
            'monday' => 'required_without_all:tuesday,wednesday,thursday,friday,saturday,sunday,immer',
            'tuesday' => 'required_without_all:monday,wednesday,thursday,friday,saturday,sunday,immer',
            'wednesday' => 'required_without_all:monday,tuesday,thursday,friday,saturday,sunday,immer',
            'thursday' => 'required_without_all:monday,tuesday,wednesday,friday,saturday,sunday,immer',
            'friday' => 'required_without_all:monday,tuesday,wednesday,thursday,saturday,sunday,immer',
            'saturday' => 'required_without_all:monday,tuesday,wednesday,thursday,friday,sunday,immer',
            'sunday' => 'required_without_all:monday,tuesday,wednesday,thursday,friday,saturday,immer',
            'immer' => 'required_without_all:monday,tuesday,wednesday,thursday,friday,saturday,sunday'
        );

        $message = array(
            'title.required' => 'The :attribute field is required.');
            // 'title' => 'Titel benötigt' ,
            // 'body' => 'link benötigt',
            // 'image' => '',
            // 'monday' => 'test',
            // 'tuesday' => 'test',
            // 'wednesday' => 'test',
            // 'thursday' => 'test',
            // 'friday' => 'test',
            // 'saturday' => 'test',
            // 'sunday' => 'test',
            // 'immer' => 'test');  
            
        $this->validate($request,$rules,$message);
   



      


        //Handle File Upload
        if($request->hasFile('image')){
        //Get filename with the extension
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //Get just ext
        $extension = $request->file('image')->getClientOriginalExtension();
        //Filename to store
        $fileNameToStore= $filename.'_'.time().'.'.$extension;
        //Upload Image
        $path = $request->file('image')->storeAs('public/uploads', $fileNameToStore);
        } 
        else 
        {
        $fileNameToStore = 'noimage.jpg';
        }

        /*/ convert time to int
        if (empty($request->get('timefrom')) || empty($request->get('timefrom'))) {
            $timefrom = $request->get('timefrom');
            $timeto = $request->get('timeto');
        } else{
            $timefrom = str_replace(":", ".",$request->get('timefrom'));
            $timeto = str_replace(":", ".",$request->get('timeto'));
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
        $post->timeto = $request->input('timeto');

        $post->ort =$request->input('ort');
       
        $post->user_id = auth()->user()->id;
        $post->image = $fileNameToStore;
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
        if($request->hasFile('image')){
        // Get filename with the extension
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('image')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore= $filename.'_'.time().'.'.$extension;
        // Upload Image
        $path = $request->file('image')->storeAs('public/uploads', $fileNameToStore);
        // Delete file if exists
        Storage::delete('public/uploads/'.$post->image);
        } 
        // Update Post
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
        $post->timeto = $request->input('timeto');
        if($request->hasFile('image')){
        $post->image = $fileNameToStore;
        }
        $post->save();
        
        return redirect('/posts')->with('success', 'Post Updated');
    }

    public function online(Request $request, $id)
    {
        $post = Post::find($id);
    
        $post->online = $request->input('online');
        $post->anfrage = "0";
        $post->save();
        
        return redirect('/posts')->with('success', 'Post Updated');
    }

    public function anfrage(Request $request, $id)
    {
        $post = Post::find($id);
    
        $post->anfrage = $request->input('anfrage');

        $post->save();
        
        return redirect('/posts');
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

        if($post->image != 'noimage.jpg'){
        // Delete Image
        Storage::delete('public/uploads/'.$post->image);
        }

        $post->delete();
        return redirect('/dashboard');
    }

}
