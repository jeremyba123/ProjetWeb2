<x-layout titre="Enregistrement"  css="{{ asset('css/accueil.css') }}">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm text-center">
            <span class="material-icons mx-auto h-10 w-auto text-indigo-600 text-8xl">
                assignment
            </span>
            <h2 class="mt-1 text-center text-2xl font-bold leading-9 tracking-tight text-gray-800">
                Enregistrez-vous
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            {{-- FORMULAIRE D'ENREGISTREMENT --}}
            <form class="space-y-6" action="{{ route('enregistrement.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- PRÉNOM --}}
                <!-- ... (votre code existant) ... -->
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Prenom</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text" value="{{ old('name') }}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">


                    </div>
                </div>


                {{-- NOM --}}
                <!-- ... (votre code existant) ... -->
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nom</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text" value="{{ old('name') }}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">


                    </div>
                </div>


                {{-- EMAIL --}}
                <!-- ... (votre code existant) ... -->
                <div>
                    <label for="Email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="text" value="{{ old('name') }}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">


                    </div>
                </div>


                <div>
                    <label for="Email" class="block text-sm font-medium leading-6 text-gray-900">Mots de passe</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="text" value="{{ old('name') }}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">


                    </div>
                </div>

                {{-- CONFIRMATION DU MOT DE PASSE --}}
                <!-- ... (votre code existant) ... -->
                <div>
                    <label for="Email" class="block text-sm font-medium leading-6 text-gray-900">Confirmation de mots de passe</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="text" value="{{ old('name') }}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">


                    </div>
                </div>

                {{-- TYPE DE COMPTE (account_type) --}}
                <div>
                    <label for="account_type" class="block text-sm font-medium leading-6 text-gray-900">Type de compte</label>
                    <div class="mt-2">
                        <select id="account_type" name="account_type"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                            <option value="client">Client</option>

                        </select>


                    </div>
                </div>





                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Créez votre compte!
                    </button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                <a href="{{ route('connexion.create') }}" class="hover:text-indigo-600">
                    Déjà un membre?
                </a>
            </p>
        </div>
    </div>
</x-layout>

