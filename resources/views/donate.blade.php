@extends('layouts.app')

@section('title', 'Heimerdinger • Support the Project')
@section('description', 'Support the Heimerdinger.LoL project by donating through Buy Me a Coffee or GitHub Sponsors.
    Your donations help keep the project running!')

@section('content')
    <section class="text-white bg-stone-900">
        <div class="max-w-screen-xl px-4 py-8 mx-auto sm:py-12 sm:px-6 lg:py-16 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <h1
                    class="text-3xl font-bold text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
                    Donate to Heimerdinger</h1>

                <h2 class="mt-4 text-stone-300">
                    Heimerdinger.lol is ran and maintained by a single developer. If you enjoy the content and would like to
                    support the project, you can do so by donating through Buy Me a Coffee or GitHub Sponsors.

                </h2>
                <p class="mt-4 mb-8">
                    I am accepting donations through Buy Me a Coffee and GitHub Sponsors. If you enjoy the
                    content that Heimerdinger.lol provides and would like to support the project, you can do so by donating
                    through the following
                    platforms. All donations are greatly appreciated and will help keep the project running.
                    Donations will be used to cover the costs of hosting, domain, and other expenses related to the project.
                </p>
            </div>
            <div class="mx-auto max-w-fit">
                <div class="mx-auto mt-4 max-w-fit">
                    <script type="text/javascript" src="https://cdnjs.buymeacoffee.com/1.0.0/button.prod.min.js" data-name="bmc-button"
                        data-slug="ricodev" data-color="#ef8349" data-emoji="" data-font="Lato" data-text="Buy me a coffee"
                        data-outline-color="#000000" data-font-color="#000000" data-coffee-color="#FFDD00"></script>
                </div>
                <div class="mx-auto mt-3 max-w-fit">
                    <iframe src="https://github.com/sponsors/rico-vz/button" title="Sponsor rico-vz" height="32"
                        width="114" style="border: 0; border-radius: 6px;"></iframe>
                </div>

                <div class="mt-4">
                    <img src="https://cdn.heimerdinger.lol/cat_excited.gif" alt="Excited Cat Emote" class="mx-auto w-28">
                </div>
            </div>
        </div>
    </section>


@endsection
