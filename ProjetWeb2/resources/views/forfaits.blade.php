<x-layout titre="Forfaits" css="{{ asset('css/forfaits.css') }}">

    <header>
        <div class="img">
            <div class="overlay"></div>

            <x-nav.nav />

            <div class="h1">

                <img src="img/image-from-rawpixel-id-2394252-modifier2.png" width="118" height="118" alt="rock-n-roll">

                <h1>Forfaits</h1>

                <img src="img/image-from-rawpixel-id-2394252-modifier2.png" width="118" height="118"
                    alt="rock-n-roll">

            </div>
        </div>
    </header>

    <main>
        <div>
            <h2>Laisser Passer</h2>
            <p>Admission générale</p>
            <p>3 blocs de billets sont disponibles. Plus vous achetez tôt, plus vous économisez!</p>
        </div>

        @foreach ($forfaits as $forfait)
            <div class="forfaits">
                <div class="info">
                    <p>{{ $forfait->nom }}</p>
                    <p>{{ $forfait->jour }}</p>
                    <p>{{ $forfait->prix }}</p>
                </div>
                <div class="contenue">
                    @foreach ($forfait->caracteristiques as $caracteristique)
                        <p>{{ $caracteristique->nom }}</p>
                    @endforeach

                </div>
            </div>
        @endforeach

        <a href="#" class="reservation">Réserver maintenant</a>

    </main>

    <footer>
        <x-footer />
    </footer>

</x-layout>
