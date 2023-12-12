@php use Carbon\Carbon; @endphp
<div class="container mx-auto p-4 flex flex-col items-center justify-center mt-3">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 auto-cols-max w-full">
        @foreach($posts as $post)
            <article class="inline-block text-gray-200 bg-stone-800/40 shadow-md rounded-2xl border border-stone-800
                hover:border-orange-500/10 hover:shadow-orange-500/10 items-center h-80 relative">
                <span
                    class="absolute top-4 left-4 text-sm text-gray-100 font-medium bg-black/60 px-1 py-1 rounded-lg">
                    <abbr itemprop="datePublished">{{ Carbon::parse($post->date)->format('F d, Y') }}</abbr>
                </span>
                <img src="{{ $post->thumbnail }}" alt="Post Thumbnail" class="w-full h-48 object-cover rounded-t-2xl">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-2 line-clamp-1" itemprop="name">{{ $post->title }}</h2>
                    <p class="text-sm line-clamp-3" itemprop="headline">{{ $post->description }}</p>
                </div>
                <a href="{{ route('posts.show', $post->slug)}}" itemprop="url"
                   class="absolute bottom-4 right-4 text-sm text-orange-400 hover:text-orange-600">Read more</a>
            </article>
        @endforeach
    </div>
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>
