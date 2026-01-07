<?php

namespace App\Http\Controllers;

use CreativeCrafts\Paginate\Facades\Paginate;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Spatie\Sheets\Facades\Sheets;
use Spatie\Sheets\Sheet;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Sheets::all()->filter(fn($post) => ! $post->hidden)->sortByDesc('date');
        $paginatedPosts = Paginate::collection($posts, 6);

        return view('posts.index', [
            'posts' => $paginatedPosts,
        ]);
    }

    public function show(Sheet $post)
    {
        $data = Cache::remember("post_context_{$post->slug}", now()->addHours(24), function () use ($post) {
            $allPosts = Sheets::all()
                ->filter(fn($p) => ! $p->hidden)
                ->sortByDesc('date')
                ->values();

            $index = $allPosts->search(fn($p) => $p->slug === $post->slug);

            $next = $index !== false && $index > 0 ? $allPosts[$index - 1] : null;
            $previous = $index !== false && $index < $allPosts->count() - 1 ? $allPosts[$index + 1] : null;

            $related = $allPosts
                ->reject(fn($p) => $p->slug === $post->slug)
                ->map(function ($p) use ($post) {
                    $commonTags = array_intersect($post->tags ?? [], $p->tags ?? []);
                    $p->relevance = count($commonTags);
                    return $p;
                })
                ->filter(fn($p) => $p->relevance > 0)
                ->sortBy([
                    ['relevance', 'desc'],
                    ['date', 'desc'],
                ])
                ->take(3);

            if ($related->count() < 3) {
                $needed = 3 - $related->count();
                $recent = $allPosts
                    ->reject(fn($p) => $p->slug === $post->slug || $related->contains('slug', $p->slug))
                    ->take($needed);
                $related = $related->merge($recent);
            }

            return [
                'previous' => $previous,
                'next' => $next,
                'related' => $related,
            ];
        });

        return view('posts.show', array_merge(['post' => $post], $data));
    }
}
