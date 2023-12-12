<?php

namespace App\Http\Controllers;

use Spatie\Sheets\Facades\Sheets;
use Spatie\Sheets\Sheet;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Sheets::all();
        
        return view('posts.index', compact('posts'));
    }

    public function show(Sheet $post)
    {
        dd($post);
        return view('posts.show', compact('post'));
    }
}
