@use('Carbon\Carbon')

<div class="container flex flex-col justify-center items-center p-4 mx-auto mt-3">
    <div class="grid grid-cols-1 gap-8 items-stretch w-full md:grid-cols-2 lg:grid-cols-2">
        @foreach ($posts as $post)
            @if ($post->hidden)
                @continue
            @endif
            <article class="flex overflow-hidden flex-col h-full rounded-2xl border shadow-md transition-colors duration-300 group bg-stone-800/40 border-stone-800 hover:border-orange-500/30">
                <a href="{{ route('posts.show', $post->slug) }}" class="relative w-full overflow-hidden aspect-[1.91/1] block">
                    <img
                        src="{{ $post->thumbnail }}"
                        alt="{{ $post->title }} Thumbnail"
                        class="object-cover w-full h-full"
                        width="1200"
                        height="630"
                    >
                </a>

                <div class="flex flex-col flex-1 p-5">
                    <div class="mb-2 text-xs font-medium tracking-wider text-orange-400 uppercase">
                        <abbr itemprop="datePublished">{{ Carbon::parse($post->date)->format('F d, Y') }}</abbr>
                    </div>

                    <a href="{{ route('posts.show', $post->slug) }}" class="block transition-colors duration-200 group-hover:text-orange-400">
                        <h2 class="mb-3 text-xl font-bold leading-tight text-stone-100 line-clamp-2" itemprop="name">
                            {{ $post->title }}
                        </h2>
                    </a>

                    <p class="my-auto mb-4 text-sm leading-relaxed text-stone-400 line-clamp-3" itemprop="headline">
                        {{ $post->description }}
                    </p>

                    <div class="flex justify-between items-center pt-4 mt-auto border-t border-stone-700/50">
                         <a href="{{ route('posts.show', $post->slug) }}" itemprop="url" class="inline-flex items-center text-sm font-medium text-orange-400 transition-colors group-hover:text-orange-300">
                            Read Article
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
    <div class="mt-8">
        {{ $posts->links() }}
    </div>
</div>
