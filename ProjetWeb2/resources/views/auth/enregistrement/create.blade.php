<x-layout titre="Enregistrement" css="{{ asset('css/enregistrement.css') }}">
    <x-nav.nav />

    <h1>
        Enregistrez-vous
    </h1>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        {{-- FORMULAIRE D'ENREGISTREMENT --}}
        <form action="{{ route('enregistrement.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- PRÉNOM --}}
            <div>
                <div>
                    <input id="prenom" name="prenom" type="text" placeholder="Prénom" autocomplete="given-name"
                        autofocus value="{{ old('prenom') }}">
                    <x-forms.erreur champ="prenom" />
                </div>
            </div>

            {{-- NOM --}}
            <div>
                <div>
                    <input id="nom" name="nom" placeholder="Nom" type="text" value="{{ old('nom') }}"
                        autocomplete="family-name">
                    <x-forms.erreur champ="nom" />
                </div>
            </div>

            {{-- EMAIL --}}
            <div>
                <div>
                    <input id="email" name="email" type="email" placeholder="Courriel"
                        value="{{ old('email') }}" autocomplete="email">
                    <x-forms.erreur champ="email" />
                </div>
            </div>



            {{-- PASSWORD --}}
            <div>
                <div>
                    <input id="password" name="password" type="password" placeholder="Mot de passe"
                        autocomplete="current-password">
                    <x-forms.erreur champ="password" />
                </div>
            </div>

            {{-- CONFIRM PASSWORD --}}
            <div>
                <div>
                    <input id="confirm-password" name="confirmation_password" placeholder="Confirmer mot de passe"
                        type="password">
                    <x-forms.erreur champ="confirmation_password" />
                </div>
            </div>

            <input type="hidden" id="account_type" name="account_type" value="client">

            <div>
                <input class="submit" type="submit" value="Soumettre">
            </div>
        </form>

        <p>
            <a class="lien-form" href="{{ route('connexion.create') }}" class="hover:text-indigo-600">
                Déjà un membre?
            </a>
        </p>
    </div>

</x-layout>
