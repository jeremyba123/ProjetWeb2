<x-layout titre="Dashboard Admin" css="{{ asset('css/admin.css') }}">
    <div class="navbar">
        <div class="navbar-left">
            {{ $admin->prenom }} {{ $admin->nom }}

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

            <a class="btn btn-light" href="{{ route('deconnexion') }}">Déconnexion</a>
        </div>
    </div>
    <div class="h2-employer">
        <h2 class="liste-reservation-officiel">Liste des groupes</h2>
        <div></div>
    </div>
    <x-alertes.succes cle="succes" />
    <div class="table">
        <table class="table table-striped table-light custom-table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Cover</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody class="scroll">
                <div>
                    @foreach ($groupes as $groupe)
                        <tr>
                            <td>{{ $groupe->nom }} </td>
                            <td>{{ $groupe->ville }}</td>
                            <td class="img"><img class="image_groupe" src="{{ asset($groupe->image_url) }}" alt=""
                                    srcset="">
                            </td>
                            <td><button class="btn btn-light mauve"><a
                                        href="{{ route('admin.editGroupe', ['id' => $groupe->id]) }}">Modifier</a></button>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>

</x-layout>
