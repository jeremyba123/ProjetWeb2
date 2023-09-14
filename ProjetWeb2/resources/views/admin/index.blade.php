<x-layout titre="Dashboard Admin" css="{{ asset('css/admin.css') }}">
    BONJOUR VOICI LA PAGE ADMIN
    <button class="btn btn-light"> <a href="#">Liste de forfaits</a></button>
    <button class="btn btn-light"> <a href="#">Liste de compte</a></button>
    <button class="btn btn-light"><a href="#">Liste de groupe</a></button>


    <a class="btn btn-light" href="{{ route('deconnexion') }}">deconnexion</a>

    <h2 class="liste-reservation">Liste des client</h2>

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
                    @foreach ($clients as $client)
                        <tr>



                            <td>{{ $client->nom }} </td>

                            <td>{{ $client->prenom }}</td>

                            <td>{{ $client->email }}</td>

                            <td><button class="btn btn-light"><a
                                        href="{{ route('admin.edit', ['id' => $client->id]) }}">Modifier</a></button>
                            </td>
                            <td><button class="btn btn-light"><a
                                        href="{{ route('admin.destroy', ['id' => $client->id]) }}">SUPPRIMER</a></button>
                            </td>

                        </tr>
                    @endforeach
            </tbody>

        </table>

    </div>

    <h2 class="liste-reservation">Liste des employés</h2>

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
                    @foreach ($employes as $employe)
                        <tr>



                            <td>{{ $employe->nom }} </td>

                            <td>{{ $employe->prenom }}</td>

                            <td>{{ $employe->email }}</td>

                            <td><button class="btn btn-light"><a
                                        href="{{ route('admin.edit', ['id' => $employe->id]) }}">Modifier</a></td>
                            </button>
                            <td><button class="btn btn-light"><a
                                        href="{{ route('admin.destroy', ['id' => $employe->id]) }}">SUPPRIMER</a></td>
                            </button>

                        </tr>
                    @endforeach
            </tbody>

        </table>
        <h2>AJOUT D'EMPLOYÉS</h2>
        <button class="btn btn-light"><a href="{{ route('admin.create') }}">AJOUTER</a></button>
    </div>


    <h2 class="liste-reservation">Liste des admin</h2>

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
                    @foreach ($admins as $admin)
                        <tr>



                            <td>{{ $admin->nom }} </td>

                            <td>{{ $admin->prenom }}</td>

                            <td>{{ $admin->email }}</td>

                            <td><button class="btn btn-light"><a
                                        href="{{ route('admin.edit', ['id' => $admin->id]) }}">Modifier</a></button>
                            </td>
                            <td><button class="btn btn-light"><a
                                        href="{{ route('admin.destroy', ['id' => $admin->id]) }}">SUPPRIMER</a></button>
                            </td>

                        </tr>
                    @endforeach
            </tbody>

        </table>
        <h2>AJOUT D'ADMIN</h2>
        <button class="btn btn-light"><a href="{{ route('admin.ajout') }}">AJOUTER</a></button>
    </div>



    </div>
</x-layout>
