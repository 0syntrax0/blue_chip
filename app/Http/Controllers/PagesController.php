<?php

namespace Blue_Chip_Marketing\Http\Controllers;

use Illuminate\Http\Request;
use Blue_Chip_Marketing\Post;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => [
                'index', 'show', 'about', 'services'
            ]
        ]);
    }


    /**
    * Home Page
    *
    * @return void
    */
    public function index()
    {
        // paginate
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        //
        return view('posts.index')->with('posts', $posts);
    }
}