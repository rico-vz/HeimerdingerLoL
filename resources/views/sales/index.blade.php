@extends('layouts.app')

@section('title', 'Heimerdinger • Sale Rotation')
@section('description',
    'Explore the current LoL Sale on Heimerdinger.LoL. Find detailed information on what champions
    and skins are currently on sale and grab a good deal!')

    @push('top_scripts')
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4505764048662657"
            crossorigin="anonymous"></script>
    @endpush

@section('content')
    <x-sales.current_sales :sales="$sales" />
    <x-buymeacoffee.floating />
@endsection

@push('bottom_scripts')
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
</script>
@endpush