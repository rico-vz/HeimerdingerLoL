<div class="flex items-center justify-center mt-8">
    <form action="{{ route('assets.icons.index') }}" method="GET" class="flex" id="searchForm">
        <div class="relative">
            <input type="text" name="filter[title]" placeholder="Search by icon title"
                   value="{{ request('filter.title') }}"
                   class="border border-transparent focus:border-transparent focus:ring-0 border-stone-700 rounded-l px-4 py-2 bg-stone-800 text-white ring-orange-500 pr-10">
            @if (request('filter.title'))
                <button type="button" onclick="clearSearchAndSubmit()"
                        class="absolute inset-y-0 right-0 flex items-center px-3 bg-stone-800 text-white cursor-pointer">
                    <x-iconsax-lin-clipboard-close class="w-6 text-white"/>
                </button>
            @endif
        </div>
        <button type="submit"
                class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-4 py-2 rounded-r focus:outline-none ring-orange-500">
            Search
        </button>
    </form>
</div>
<script>
    function clearSearchAndSubmit() {
        document.querySelector('input[name="filter[title]"]').value = '';
        document.getElementById('searchForm').submit();
    }
</script>
