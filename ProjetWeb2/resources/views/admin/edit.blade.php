<x-layout titre="modification" css="{{ asset('css/admin.css') }}">
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


    <div class="container">

        <h1>Modification</h1>
        <form action="{{ route('admin.update', ['id' => $user->id]) }}" method="POST">
            @csrf
            @method('PUT') {{-- Utilisez la méthode PUT pour la mise à jour --}}

            {{-- Champ Nom --}}
            <div>
                <label for="nom">Nom</label><br>
                <input type="text" name="nom" id="nom" value="{{ $user->nom }}" required>
            </div>

            {{-- Champ Prénom --}}
            <div>
                <label for="prenom">Prénom</label><br>
                <input type="text" name="prenom" id="prenom" value="{{ $user->prenom }}" required>
            </div>

            {{-- Champ Email --}}
            <div>
                <label for="email">Adresse courriel</label><br>
                <input type="email" name="email" id="email" value="{{ $user->email }}" required>
            </div>

            {{-- Champ Type de compte --}}
            <div>
                <label for="account_type">Type de compte</label><br>
                <select name="account_type" class="form-select" id="account_type" required>
                    <option value="admin" @if ($user->account_type == 'admin') selected @endif>Admin</option>
                    <option value="client" @if ($user->account_type == 'client') selected @endif>Client</option>
                    <option value="employee" @if ($user->account_type == 'employee') selected @endif>Employee</option>
                </select>
            </div>

            {{-- Bouton de soumission --}}
            <div>
                <input class="submit" type="submit" value="Modifier">
            </div>
        </form>
    </div>

</x-layout>
