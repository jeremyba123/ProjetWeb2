<x-layout titre="Réservation de {{ auth()->user()->name }}" css="{{ asset('css/reservation-client.css') }}">
    <header>
        <div class="img">
            <div class="overlay"></div>
            <div class="nav">
                <div class="logo">
                    <a href="#"><img src="img/Logo_logo-140-blanc.png" width="133" alt="Logo"></a>
                </div>

                <div class="liens-nav">
                    <a class="btn btn-light deconnexion" href="{{ route('deconnexion') }}">Déconnexion</a>
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
        <x-alertes.succes cle="succes" />
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
                    <input id="datepicker" type="date" name="date_darriver" min="2023-05-21" max="2023-05-31"
                        value="2023-05-21">
                    <input class="submit" type="submit" value="Réserver">
                </form>
            </div>
        </div>
        <h2 class="liste-reservation">Liste des réservations</h2>

        @php
            $sousTotal = 0; // Initialisez la variable sousTotal à zéro avant la boucle
        @endphp

        <div class="table">
            <table class="table table-striped table-light custom-table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Forfait</th>
                        <th scope="col">Arriver</th>
                        <th scope="col">Départ</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>

                @foreach ($forfaits_client as $un_forfait)
                    <tbody class="scroll">
                        <tr>
                            <th scope="row">{{ $un_forfait->forfait->nom }}</th>
                            <td>{{ $un_forfait->date_darriver }}</td>
                            <td class="date-depart">
                                @if ($un_forfait->forfait_id === 1)
                                    @php
                                        $dateDepart = Carbon\Carbon::parse($un_forfait->date_darriver)->addDays(2);
                                        if ($dateDepart->greaterThan('2023-05-31')) {
                                            $dateDepart = Carbon\Carbon::create(2023, 5, 31);
                                        }
                                    @endphp
                                    <p>{{ $dateDepart->format('Y-m-d') }}</p>
                                @elseif ($un_forfait->forfait_id === 2)
                                    @php
                                        $dateDepart = Carbon\Carbon::parse($un_forfait->date_darriver)->addDays(5);
                                        if ($dateDepart->greaterThan('2023-05-31')) {
                                            $dateDepart = Carbon\Carbon::create(2023, 5, 31);
                                        }
                                    @endphp
                                    <p>{{ $dateDepart->format('Y-m-d') }}</p>
                                @elseif ($un_forfait->forfait_id === 3)
                                    @php
                                        $dateDepart = Carbon\Carbon::parse($un_forfait->date_darriver)->addDays(10);
                                        if ($dateDepart->greaterThan('2023-05-31')) {
                                            $dateDepart = Carbon\Carbon::create(2023, 5, 31);
                                        }
                                    @endphp
                                    <p>{{ $dateDepart->format('Y-m-d') }}</p>
                                @endif
                            </td>
                            <td>
                                <p>{{ $un_forfait->forfait->prix }}</p>
                            </td>
                            <td>
                                <a href="{{ route('reservation.destroy', ['id' => $un_forfait->id]) }}"
                                    class="btn btn-light supprimer">Supprimer</a>
                            </td>
                            @php
                                $sousTotal += $un_forfait->forfait->prix;
                            @endphp
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
        @php
            $taxe = $sousTotal * 0.15;
            $total = $sousTotal + $taxe;
        @endphp

        <div class="total">
            <p class="sous-total">Sous-total : {{ $sousTotal }}$</p>
            <p class="sous-total">Taxe (15 %) : {{ $taxe }}$</p>
            <p class="sous-total">Total : {{ $total }}$</p>
        </div>
    </main>
</x-layout>
