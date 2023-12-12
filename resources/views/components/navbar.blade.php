<nav class="drop-shadow-md border-stone-200 bg-stone-800">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
        <a href="/" class="flex items-center transition-transform hover:scale-105">
            <x-logo class="w-auto mr-2 transition-transform h-9 hover:scale-125" alt="Heimerdinger Logo"/>
            <span class="self-center text-2xl font-semibold text-orange-400 whitespace-nowrap">Heimerdinger.LoL</span>
            <span class="sr-only">Home</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm rounded-lg text-stone-500
                md:hidden hover:bg-stone-100 focus:outline-none focus:ring-2 focus:ring-stone-200 dark:text-stone-400
                dark:hover:bg-stone-700 dark:focus:ring-stone-600"
                aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div id="navbar-default" class="hidden w-full md:block md:w-auto">
            <ul
                class="flex flex-col p-2 items-center
                md:flex-row md:space-x-6 md:mt-0 md:border-0 md:bg-white dark:bg-stone-800 md:dark:bg-stone-800
                dark:border-stone-700">
                <li>
                    <a href="{{route('champions.index')}}"
                       class="flex py-2 pl-3 pr-2 rounded hover:bg-stone-100 md:hover:bg-transparent
                       md:border-0 md:p-0 md:dark:hover:text-orange-400
                       dark:hover:bg-stone-700 dark:hover:text-white md:dark:hover:bg-transparent
                       {{ request()->routeIs('champions.*') ? 'text-orange-400 font-medium' : 'text-white' }}">

                        <x-iconsax-bul-people class="w-6 h-6 mr-1"/>
                        Champions</a>
                </li>
                <li>
                    <a href="{{route('skins.index')}}"
                       class="flex py-2 pl-3 pr-2 rounded hover:bg-stone-100 md:hover:bg-transparent
                        md:border-0 md:hover:text-orange-500 md:p-0 md:dark:hover:text-orange-400
                         dark:hover:bg-stone-700 dark:hover:text-white md:dark:hover:bg-transparent
                         {{ request()->routeIs('skins.*') ? 'text-orange-400 font-medium' : 'text-white' }}">

                        <x-iconsax-bul-brush-2 class="w-6 h-6 mr-1"/>
                        Skins</a>
                </li>
                <li>
                    <a href="{{route('assets.index')}}"
                       class="flex py-2 pl-3 pr-2 rounded hover:bg-stone-100 md:hover:bg-transparent
                        md:border-0 md:hover:text-orange-500 md:p-0 md:dark:hover:text-orange-400
                        dark:hover:bg-stone-700 dark:hover:text-white md:dark:hover:bg-transparent
                        {{ request()->routeIs('assets.*') ? 'text-orange-400 font-medium' : 'text-white' }}">
                        <x-iconsax-bul-3dcube class="w-6 h-6 mr-1"/>
                        Assets</a>
                </li>
                <li>
                    <a href="{{route('sales.index')}}"
                       class="flex py-2 pl-3 pr-2 rounded hover:bg-stone-100 md:hover:bg-transparent
                       md:border-0 md:hover:text-orange-500 md:p-0 md:dark:hover:text-orange-400
                        dark:hover:bg-stone-700 dark:hover:text-white md:dark:hover:bg-transparent
                        {{ request()->routeIs('sales.*') ? 'text-orange-400 font-medium' : 'text-white' }}">
                        <x-iconsax-bul-card class="w-6 h-6 mr-1"/>
                        Sale Rotation</a>
                </li>
                <li>
                    <a href="{{route('posts.index')}}"
                       class="flex py-2 pl-3 pr-2 rounded hover:bg-stone-100 md:hover:bg-transparent
                        md:border-0 md:hover:text-orange-500 md:p-0 md:dark:hover:text-orange-400
                        dark:hover:bg-stone-700 dark:hover:text-white md:dark:hover:bg-transparent
                        {{ request()->routeIs('posts.*') ? 'text-orange-400 font-medium' : 'text-white' }}">
                        <x-iconsax-bul-receipt-search class="w-6 h-6 mr-1"/>
                        Posts</a>
                </li>
                <li>
                    <a href="{{route('about.index')}}"
                       class="flex py-2 pl-3 pr-2 rounded hover:bg-stone-100 md:hover:bg-transparent
                       md:border-0 md:hover:text-orange-500 md:p-0 md:dark:hover:text-orange-400
                        dark:hover:bg-stone-700 dark:hover:text-white md:dark:hover:bg-transparent
                        {{ request()->routeIs('about.*') ? 'text-orange-400 font-medium' : 'text-white' }}">
                        <x-iconsax-bul-info-circle class="w-6 h-6 mr-1"/>
                        About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
