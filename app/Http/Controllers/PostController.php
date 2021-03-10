<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::with(['author'])->orderBy('id', 'desc')->get()
        ]);
    }

    public function show($post)
    {
        return view('posts.show', [
            'post' => Post::with(['author'])->find($post)->append(['newer', 'older'])
        ]);
    }
}
