<?php

namespace App\Http\Controllers;

use Spatie\Sheets\Facades\Sheets;
use Spatie\Sheets\Sheet;
use CreativeCrafts\Paginate\Facades\Paginate;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Sheets::all()->sortByDesc('date');
        $paginatedPosts = Paginate::collection($posts, 6);

        return view('posts.index', [
            'posts' => $paginatedPosts,
        ]);
    }

    public function show(Sheet $post)
    {
        dd($post);
        return view('posts.show', compact('post'));
    }
}
