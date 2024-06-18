<script src="https://unpkg.com/htmx.org@2.0.0"></script>
<div class="flex items-center justify-center mt-8">
    <form  method="GET" class="flex" id="searchForm">
        <div class="relative">
            <input hx-get="{{ route('skins.index') }}" hx-trigger="keyup changed delay:100ms" hx-target="#skin-list" hx-swap-oob="true" type="text" name="filter[name]" placeholder="Search by skin name" value="{{ request('filter.name') }}"
                class="px-4 py-2 pr-10 text-white border border-transparent rounded shadow-md focus:border-transparent focus:ring-0 border-stone-700 bg-stone-800 ring-orange-500">
            @if (request('filter.name'))
                <button type="button" onclick="clearSearchAndSubmit()"
                    class="absolute inset-y-0 right-0 flex items-center px-3 text-white cursor-pointer bg-stone-800">
                    <x-iconsax-lin-clipboard-close class="w-6 text-white" />
                </button>
            @endif
        </div>
    </form>
</div>
<script>
    function clearSearchAndSubmit() {
        document.querySelector('input[name="filter[name]"]').value = '';
        document.getElementById('searchForm').submit();
    }
</script>
