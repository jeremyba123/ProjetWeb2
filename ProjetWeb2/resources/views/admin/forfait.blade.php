

<x-layout titre="Dashboard Admin"  css="{{ asset('css/admin.css') }}">
    <div class="navbar">
        <div class="navbar-left">
            {{ $admin->prenom }}  {{ $admin->nom }}
        </div>
        <div class="navbar-right">
            <div class="button-group">
                <button class="btn btn-light2">
                    <a href="{{ route('admin.forfait') }}">Liste de réservation</a>
                </button>
                <button class="btn btn-light2">
                    <a href="{{ route('admin.index') }}">Liste de compte</a>
                </button>
                <button class="btn btn-light2">
                    <a href="{{ route('admin.groupe') }}">Liste de groupe</a>
                </button>
            </div>
            <a  class="btn btn-light" href="{{ route('deconnexion') }}">Déconnexion</a>
        </div>
    </div>
<h2 class="liste-reservation">Liste des réservations</h2>

        <div class="table">

            <table class="table table-striped table-light custom-table">

                <thead class="thead-dark">

                    <tr>



                        <th scope="col">Nom</th>

                        <th scope="col">Prenom</th>

                        <th scope="col">Email</th>



                    </tr>

                </thead>

                <tbody class="scroll">
                    <div>
                        @foreach ($forfaits as $forfait)
                        @foreach ($forfait->users as $user)
                            <tr>

                                <td>{{ $forfait->nom }}</td>
                                <td>{{ $user->nom }}</td>
                                <td>{{ $user->prenom }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <button class="btn btn-light">
                                        <a href="{{ route('admin.destroyForfaitUser', ['forfait_id' => $forfait->id, 'user_id' => $user->id]) }}">SUPPRIMER</a>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach



                </tbody>

            </table>

        </div>
    </x-layout>
