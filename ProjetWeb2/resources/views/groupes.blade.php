<x-layout titre="Groupes" css="{{ asset('css/groupes.css') }}">
    <header>
        <div class="img">
            <div class="overlay"></div>

            <x-nav.nav />

            <div class="h1">

                <img src="img/image-from-rawpixel-id-2394252-modifier2.png" width="118" height="118" alt="rock-n-roll">

                <h1>Groupes</h1>

                <img src="img/image-from-rawpixel-id-2394252-modifier2.png" width="118" height="118"
                    alt="rock-n-roll">

            </div>
        </div>
    </header>

    <main>

        <form id="search-form">
            <input type="text" id="search-input" placeholder="Rechercher par nom de groupe">

        </form>
        <div class="conteneur-groupe">
            @foreach ($groupes as $groupe)
                <div class="groupe">
                    <img src="{{ $groupe->image_url }}" width="668" height="444" alt="groupe musique">
                    <p class="nom">{{ $groupe->nom }}</p>
                    <p class="ville">{{ $groupe->ville }}</p>
                </div>
            @endforeach
        </div>

    </main>


    <footer>
        <x-footer />
    </footer>
    <script src="js/filtre.js"></script>
</x-layout>
