<x-layout titre="Réservation de {{ auth()->user()->name }}" css="{{ asset('css/reservation-client.css') }}">
    <header>
        <div class="img">

            <div class="overlay"></div>

            <div class="nav">

                <div class="logo">
                    <a href="#"><img src="img/Logo_logo-140-blanc.png" width="133" alt="Logo"></a>
                </div>

                <div class="liens-nav">
                    <a class="btn btn-light" href="{{ route('deconnexion') }}">Déconnexion</a>
                </div>
            </div>

            <div class="h1">

                <img src="img/image-from-rawpixel-id-2394252-modifier2.png" width="118" height="118"
                    alt="rock-n-roll">

                <h1>{{ auth()->user()->name }}</h1>
                <img src="img/image-from-rawpixel-id-2394252-modifier2.png" width="118" height="118"
                    alt="rock-n-roll">
            </div>

            <h2>Réservation</h2>
        </div>
    </header>

    <main>

        <h3>Laissez-passer</h3>

        <p>Admission générale</p>
        <p>3 blocs de billets sont disponibles. Plus vous achetez tôt, plus vous économisez!</p>

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

        {{-- formulaire --}}
        <h2>Forfait</h2>

        {{-- formulaire --}}
        <form action="{{ route('client.store') }}" method="post">
            @csrf

            <select name="forfait_id">
                @foreach ($forfaits as $forfait)
                    <option value="{{ $forfait->id }}">
                        {{ $forfait->nom }}
                    </option>
                @endforeach
            </select>

            <input type="date" name="date_darriver">

            <input type="submit" value="Réserver">
        </form>


    </main>




</x-layout>
