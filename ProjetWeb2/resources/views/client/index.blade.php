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

                <h1>{{ auth()->user()->prenom }} {{ auth()->user()->nom }}</h1>
                <img src="img/image-from-rawpixel-id-2394252-modifier2.png" width="118" height="118"
                    alt="rock-n-roll">
            </div>

            <h2>Réservation</h2>
        </div>
    </header>

    <main>

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

            <div class="form">

                <h4 class="forfait">RÉSERVATION</h4>
                {{-- formulaire --}}
                <form action="{{ route('client.store') }}" method="post">
                    @csrf
                    <select class="form-select" name="forfait_id">
                        @foreach ($forfaits as $forfait)
                            <option value="{{ $forfait->id }}">
                                {{ $forfait->nom }}
                            </option>
                        @endforeach
                    </select>
                    <input id="datepicker" type="date" name="date_darriver" min="2023-05-21" max="2023-05-31">
                    <input class="submit" type="submit" value="Réserver">
                </form>
            </div>

        </div>

        <h2 class="liste-reservation">Liste des réservations</h2>
        <div class="table">
            <table class="table table-striped table-light custom-table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Forfait</th>
                        <th scope="col">Arriver</th>
                        <th scope="col">Départ</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody class="scroll">
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td><button class="btn btn-light">Supprimer</button></td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td><button class="btn btn-light">Supprimer</button></td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td><button class="btn btn-light">Supprimer</button></td>
                    </tr>
                </tbody>
            </table>
        </div>


    </main>




</x-layout>
