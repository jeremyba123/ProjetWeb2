
<x-layout titre="modification"  css="{{ asset('css/admin.css') }}">
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
    <div class="container">
        <h1>Modifier l'utilisateur</h1>
        <form action="{{ route('admin.update', ['id' => $user->id]) }}" method="POST">
            @csrf
            @method('PUT') {{-- Utilisez la méthode PUT pour la mise à jour --}}

            {{-- Champ Nom --}}
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ $user->nom }}" required>
            </div>

            {{-- Champ Prénom --}}
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $user->prenom }}" required>
            </div>

            {{-- Champ Email --}}
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            {{-- Champ Type de compte --}}
            <div class="form-group">
                <label for="account_type">Type de compte</label>
                <select name="account_type" id="account_type" class="form-control" required>
                    <option value="admin" @if($user->account_type == 'admin') selected @endif>Admin</option>
                    <option value="client" @if($user->account_type == 'client') selected @endif>Client</option>
                    <option value="employee" @if($user->account_type == 'employee') selected @endif>Employee</option>
                </select>
            </div>

            {{-- Bouton de soumission --}}
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </form>
    </div>

</x-layout>
