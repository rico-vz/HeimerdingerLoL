<?php

namespace App\Http\Controllers;

use CreativeCrafts\Paginate\Facades\Paginate;
use Spatie\Sheets\Facades\Sheets;
use Spatie\Sheets\Sheet;

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
        return view('posts.show', ['post' => $post]);
    }
}
