<x-layout titre="Groupes" css="{{ asset('css/groupes.css') }}">

    <x-header titre="groupes">
        <form id="search-form">
            <input type="text" id="search-input" placeholder="Rechercher par nom de groupe">
        </form>
    </x-header>

    <main>
        <div class="conteneur-groupe">
            @foreach ($groupes as $groupe)
                <div class="groupe">
                    <img src="{{ $groupe->image_url }}" width="668" height="444" alt="groupe musique">
                    <div class="card">
                        <div class="nom-ville">
                            <div class="nv">
                                <p class="nom">{{ $groupe->nom }}</p>
                                <p class="ville">{{ $groupe->ville }}</p>
                            </div>
                            <div></div>
                        </div>

                        <div class="date-heure">
                            <div class="date">
                                <p>
                                    {{ ucfirst($groupe->horaire->date->locale('fr_FR')->isoFormat('dddd D MMMM YYYY')) }}
                                </p>
                            </div>
                            <div class="heure">
                                <p>{{ $groupe->horaire->heure }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </main>
    <footer>
        <x-footer />
    </footer>
    <script src="js/filtre.js"></script>
</x-layout>
