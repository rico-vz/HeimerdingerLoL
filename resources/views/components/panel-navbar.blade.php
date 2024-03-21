<nav class="drop-shadow-md border-stone-200 bg-stone-800">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
        <a href="/streamerpanel" class="flex items-center transition-transform hover:scale-105">
            <x-logo class="w-auto mr-2 transition-transform h-9 hover:scale-125" alt="Heimerdinger Logo" />
            <span class="self-center text-2xl font-semibold text-orange-400 whitespace-nowrap">Streamer Panel</span>
            <span class="sr-only">Streamer Panel</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm rounded-lg text-stone-500 md:hidden hover:bg-stone-100 focus:outline-none focus:ring-2 focus:ring-stone-200 dark:text-stone-400 dark:hover:bg-stone-700 dark:focus:ring-stone-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div id="navbar-default" class="hidden w-full md:block md:w-auto">
            <ul
                class="flex flex-col items-center p-2 md:flex-row md:space-x-6 md:mt-0 md:border-0 md:bg-white dark:bg-stone-800 md:dark:bg-stone-800 dark:border-stone-700">
                <li>
                    <a href="{{ route('champions.index') }}"
                        class="flex py-2 pl-3 pr-2 rounded hover:bg-stone-100 md:hover:bg-transparent md:border-0 md:p-0 md:dark:hover:text-orange-400 dark:hover:bg-stone-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        Streamers</a>
                </li>
                <li>
                    <a href="{{ route('skins.index') }}"
                        class="flex py-2 pl-3 pr-2 rounded hover:bg-stone-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 md:dark:hover:text-orange-400 dark:hover:bg-stone-700 dark:hover:text-white md:dark:hover:bg-transparent ">
                        Streamer Requests</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
