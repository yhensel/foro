<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'   => 'required',
            'content' => 'required',
        ]);

        $post = Auth::user()->posts()->create([
            'title'   => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return 'POST:'.$post->title;
    }

    public function show(Request $request, Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
