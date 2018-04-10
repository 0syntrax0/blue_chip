<?php

namespace Blue_Chip_Marketing\Http\Controllers;

use Illuminate\Http\Request;
use Blue_Chip_Marketing\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

// use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // paginate
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        //
        return view('posts.index')->with('posts', $posts);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'message' => 'required',
            'email' => 'required|email|max:190'
        ]);


        // Create post
        $post = new Post;

        // set form variables
        $post->name = $request->input('name');
        $post->message  = $request->input('message');
        $post->email = $request->input('email');

        // check if is logged in
        if(Auth::user())
        {
            $post->user_id = auth()->user()->id;
        }
        else
        {
            // assign anon user
            $post->user_id = 0;
        }


        // save data
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        // Check for correct user
        if (auth()->user()->id !== $post->user_id)
        {
            return redirect('posts')->with('error', 'Unauthorized page.');
        }

        //
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'name' => 'required',
            'message' => 'required',
            'email' => 'required|email|max:190'
        ]);

        // Create post
        $post = Post::find($id);

        // set form variables
        $post->name = $request->input('name');
        $post->message  = $request->input('message');
        $post->email  = $request->input('email');


        //
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // Check for correct user deleting it's own stuff
        if (auth()->user()->id !== $post->user_id)
        {
            return redirect('posts')->with('error', 'Unauthorized page.');
        }

        // delete from DB
        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
}