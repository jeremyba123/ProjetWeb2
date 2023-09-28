<x-layout titre="Connexion" css="{{ asset('css/connexion.css') }}">
    <x-nav.nav></x-nav>
        <h1 class="titre">Connexion</h1>
        @if (session('email'))
            <p>{{ session('email') }}</p>
        @endif
        <form action="{{ route('connexion.authentifier') }}" method="POST">
            @csrf
            {{-- courriel --}}
            <div>
                <div>
                    <input name="email" type="email" placeholder="Courriel" autocomplete="email"
                        value="{{ old('email') }}">
                </div>
                <x-forms.erreur champ="email" />
            </div>
            {{-- password --}}
            <div>
                <div>
                    <input name="password" type="password" placeholder="Mot de passe" autocomplete="current-password">
                </div>
                <x-forms.erreur champ="password" />
            </div>
            {{-- submit --}}
            <div>
                <input class="submit" type="submit" value="Connectez-vous!">
            </div>
        </form>
        <a class="lien-form" href="{{ route('enregistrement.create') }}">Enregistrement!</a>
        <script src="js/accueil.js"></script>
</x-layout>
