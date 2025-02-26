@use('Carbon\Carbon')

<div class="container flex flex-col items-center justify-center p-4 mx-auto mt-3">
    <div class="grid w-full grid-cols-1 gap-12 md:grid-cols-2 auto-cols-max">
        @foreach ($posts as $post)
            @if ($post->hidden)
                @continue
            @endif
            <article
                class="relative items-center inline-block text-gray-200 border shadow-md bg-stone-800/40 rounded-2xl border-stone-800 hover:border-orange-500/10 hover:shadow-orange-500/10 h-80">
                <span class="absolute px-1 py-1 text-sm font-medium text-gray-100 rounded-lg top-4 left-4 bg-black/60">
                    <abbr itemprop="datePublished">{{ Carbon::parse($post->date)->format('F d, Y') }}</abbr>
                </span>
                <img src="{{ $post->thumbnail }}" alt="Post Thumbnail"
                    class="object-cover w-full h-48 aspect-video rounded-t-2xl">
                <div class="p-4">
                    <h2 class="mb-2 text-xl font-bold line-clamp-1" itemprop="name">{{ $post->title }}</h2>
                    <p class="text-sm line-clamp-3" itemprop="headline">{{ $post->description }}</p>
                </div>
                <a href="{{ route('posts.show', $post->slug) }}" itemprop="url"
                    class="absolute text-sm text-orange-400 bottom-4 right-4 hover:text-orange-600">Read more</a>
            </article>
        @endforeach
    </div>
    <div class="flex justify-center my-4">
        <x-ads.horizontal-banner />
    </div>
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>
