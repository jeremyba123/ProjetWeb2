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

                        <th scope="col">Depart</th>

                    </tr>

                </thead>

                <tbody class="scroll">
                    <div>
                        @foreach ($forfaits_client as $un_forfait)
                        @foreach ($forfaits as $forfait)
                        @foreach ($forfait->users as $user)
                            <tr>
                                <td>{{ $user->nom }}</td>
                                <td>{{ $user->prenom }}</td>

                                <td>{{ $forfait->nom }}</td>
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

                            </tr>
                        @endforeach
                    @endforeach
                    @endforeach


                </tbody>

            </table>

        </div>
    </x-layout>
