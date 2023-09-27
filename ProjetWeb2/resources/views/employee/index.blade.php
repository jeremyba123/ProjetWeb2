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
                        <th scope="col">Numéro</th>
                        <th scope="col">Type de forfait</th>
                        <th scope="col">Arriver</th>
                        <th scope="col">Nom</th>
                    </tr>
                </thead>

                @foreach ($forfaits_client as $un_forfait)
                    <tbody class="scroll">
                        <tr>
                            <th scope="row">{{ $un_forfait->id }}</th>
                            <th scope="row">{{ $un_forfait->forfait_id }}</th>
                            <td>{{ $un_forfait->date_darriver }}</td>
                            <td>{{ $un_forfait->user->nom }}</td>

                        </tr>
                    </tbody>
                @endforeach

            </table>

        </div>
    </x-layout>
