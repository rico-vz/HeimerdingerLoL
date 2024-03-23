@push('top_scripts')
    <script src="https://cdn.jsdelivr.net/npm/gridjs/dist/gridjs.umd.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
@endpush
<div class="w-10/12 mx-auto">
    <div id="streamers-wrapper"></div>
</div>



@push('bottom_scripts')
    <script>
        new gridjs.Grid({
            columns: [
                "Champion",
                "Streamer Name",
                {
                    name: "URL",
                    formatter: (_, row) => gridjs.html(
                        `<a href="${row.cells[2].data}" target="_blank">${row.cells[2].data}</a>`)
                },
                {
                    name: "Actions",
                    formatter: (_, row) => gridjs.html(row.cells[3].data)
                }
            ],
            data: [
                @foreach ($streamers as $streamer)
                    ["{{ $streamer->champion->name }}", "{{ $streamer->displayname }}",
                        "{{ $streamer->streamer_url }}", `<a href="/streamerpanel/edit/{{ $streamer->id }}">✏️</a> <a href="/streamerpanel/delete/{{ $streamer->id }}" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this streamer?')) { document.getElementById('delete-form-{{ $streamer->id }}').submit(); }">❌</a>
                            <form id="delete-form-{{ $streamer->id }}" action="/streamerpanel/delete/{{ $streamer->id }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>`
                    ],
                @endforeach
            ],
            search: true,
            pagination: {
                limit: 20
            },
            language: {
                'search': {
                    'placeholder': '🔍 Search streamers...'
                }
            }
        }).render(document.getElementById("streamers-wrapper"));
    </script>
@endpush
