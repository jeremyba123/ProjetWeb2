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
        <h1>Modifier le groupe</h1>
        <form action="{{ route('admin.updateGroupe', ['id' => $groupe->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- Utilisez la méthode PUT pour la mise à jour --}}

            {{-- Champ Nom du groupe --}}
            <div class="form-group">
                <label for="nom">Nom du groupe</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ $groupe->nom }}" required>
            </div>

            {{-- Champ Ville --}}
            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" name="ville" id="ville" class="form-control" value="{{ $groupe->ville }}" required>
            </div>

            {{-- Champ Image du groupe --}}
            <div class="form-group">
                <label for="image">Image du groupe</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            {{-- Affichage de l'image actuelle --}}
            @if ($groupe->image)
            <div class="form-group">
                <label>Image actuelle du groupe</label>
                <img src="{{ asset($groupe->image) }}" alt="Image du groupe" class="img-fluid">
            </div>
            @endif

            {{-- Bouton de soumission --}}
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </form>
    </div>

</x-layout>
