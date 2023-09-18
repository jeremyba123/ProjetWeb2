<x-layout titre="Dashboard Employee"  css="{{ asset('css/admin.css') }}">

    <div class="navbar">
        <div class="navbar-left">
            {{ $admin->prenom }}  {{ $admin->nom }}
        </div>
        <div class="navbar-right">

            <a  class="btn btn-light" href="{{ route('deconnexion') }}">Déconnexion</a>
        </div>
    </div>
    <x-alertes.succes cle="succes" />
<h2 class="liste-reservation">Liste des réservations</h2>

        <div class="table">
            <table class="table table-striped table-light custom-table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Forfait</th>
                        <th scope="col">Arriver</th>
                        <th scope="col">Depart</th> <!-- Add a column for Depart -->
                    </tr>
                </thead>
                <tbody class="scroll">
                    @foreach ($reservations as $reservation)
                    <tr>
                        <td>
                            @php
                                $user = App\Models\User::find($reservation->user_id);
                            @endphp
                            @if ($user)
                                {{ $user->nom }}
                            @else
                                User not found
                            @endif
                        </td>
                        <td>
                            @if ($user)
                                {{ $user->prenom }}
                            @else
                                User not found
                            @endif
                        </td>
                        <td>{{ $reservation->forfait->nom }}</td> <!-- Assuming you have a 'forfait' relationship in ForfaitUser -->
                        <td>{{ $reservation->date_darriver }}</td>
                       <td class="date-depart">
                                @if ($reservation->forfait_id === 1)
                                    @php
                                        $dateDepart = Carbon\Carbon::parse($reservation->date_darriver)->addDays(2);
                                        if ($dateDepart->greaterThan('2023-05-31')) {
                                            $dateDepart = Carbon\Carbon::create(2023, 5, 31);
                                        }
                                    @endphp
                                    <p>{{ $dateDepart->format('Y-m-d') }}</p>
                                @elseif ($reservation->forfait_id === 2)
                                    @php
                                        $dateDepart = Carbon\Carbon::parse($reservation->date_darriver)->addDays(5);
                                        if ($dateDepart->greaterThan('2023-05-31')) {
                                            $dateDepart = Carbon\Carbon::create(2023, 5, 31);
                                        }
                                    @endphp
                                    <p>{{ $dateDepart->format('Y-m-d') }}</p>
                                @elseif ($reservation->forfait_id === 3)
                                    @php
                                        $dateDepart = Carbon\Carbon::parse($reservation->date_darriver)->addDays(10);
                                        if ($dateDepart->greaterThan('2023-05-31')) {
                                            $dateDepart = Carbon\Carbon::create(2023, 5, 31);
                                        }
                                    @endphp
                                    <p>{{ $dateDepart->format('Y-m-d') }}</p>
                                @endif
                            </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </x-layout>

