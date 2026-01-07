@use('Carbon\Carbon')

<div class="container flex flex-col items-center justify-center p-4 mx-auto mt-3">
    <div class="grid w-full grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-2 items-stretch">
        @foreach ($posts as $post)
            @if ($post->hidden)
                @continue
            @endif
            <article class="flex flex-col h-full overflow-hidden transition-colors duration-300 border shadow-md group bg-stone-800/40 rounded-2xl border-stone-800 hover:border-orange-500/30">
                <!-- Image Wrapper -->
                <a href="{{ route('posts.show', $post->slug) }}" class="relative w-full overflow-hidden aspect-[1.91/1] block">
                    <img 
                        src="{{ $post->thumbnail }}" 
                        alt="{{ $post->title }} Thumbnail"
                        class="object-cover w-full h-full"
                    >
                </a>
                
                <!-- Content -->
                <div class="flex flex-col flex-1 p-5">
                    <!-- Date -->
                    <div class="mb-2 text-xs font-medium tracking-wider text-orange-400 uppercase">
                        <abbr itemprop="datePublished">{{ Carbon::parse($post->date)->format('F d, Y') }}</abbr>
                    </div>

                    <!-- Title -->
                    <a href="{{ route('posts.show', $post->slug) }}" class="block group-hover:text-orange-400 transition-colors duration-200">
                        <h2 class="mb-3 text-xl font-bold leading-tight text-gray-100 line-clamp-2" itemprop="name">
                            {{ $post->title }}
                        </h2>
                    </a>

                    <!-- Description -->
                    <p class="mb-4 text-sm leading-relaxed text-gray-400 line-clamp-3" itemprop="headline">
                        {{ $post->description }}
                    </p>
                    
                    <!-- Footer / Action -->
                    <div class="mt-auto pt-4 border-t border-stone-700/50 flex items-center justify-between">
                         <a href="{{ route('posts.show', $post->slug) }}" itemprop="url" class="inline-flex items-center text-sm font-medium text-orange-400 transition-colors group-hover:text-orange-300">
                            Read Article
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
