<x-layout titre="Forfaits" css="{{ asset('css/forfaits.css') }}">

    <x-header titre="forfaits" />

    <main>
        <div class="conteneur-forfait">
            <h3>Laissez-passer</h3>
            <p class="admission">Admission générale</p>
            <p class="admission2">3 blocs de billets sont disponibles. Plus vous achetez tôt, plus vous économisez!</p>
            <div class="conteneur-forfait-reservation">
                @foreach ($forfaits as $forfait)
                    <div class="forfaits">
                        <div class="info">
                            <p class="nom">{{ $forfait->nom }}</p>
                            <p class="jour"> Accès {{ $forfait->jour . ' ' . 'jours' }} </p>
                            <p class="prix">{{ $forfait->prix }} $</p>
                        </div>
                        <div class="contenue">
                            @foreach ($forfait->caracteristiques as $caracteristique)
                                <p>{{ $caracteristique->nom }}</p>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <a href="{{ route('connexion.create') }}" class="reservation">Réserver maintenant</a>

    </main>

    <footer>
        <x-footer />
    </footer>

</x-layout>
