<x-layout titre="Connexion" css="{{ asset('css/accueil.css') }}">
    <x-nav.nav></x-nav>


    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm text-center">
          <span class="material-icons mx-auto h-10 w-auto text-indigo-600  text-8xl">
            assignment
          </span>
          <h2 class="mt-1 text-center text-2xl font-bold leading-9 tracking-tight text-gray-800">
            Connexion
          </h2>
        </div>

        @if(session('email'))
            <p>{{ session('email') }}</p>
        @endif

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <form class="space-y-6" action="{{ route('connexion.authentifier') }}" method="POST">
            @csrf

            <div>
              <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Courriel</label>


              <div class="mt-2">
                <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ old('email') }}">
              </div>
            </div>

            <div>
              <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">
                  Mot de passe
                </label>
              </div>


              <div class="mt-2">
                <input id="password" name="password" type="password" autocomplete="current-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>

            <div>
              <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Connectez-vous!
              </button>
            </div>
          </form>

          <p class="mt-10 text-center text-sm text-gray-500">
            <a href="{{ route('enregistrement.create') }}" class="hover:text-indigo-600">
              Pas un membre?
            </a>
          </p>
        </div>
      </div>

      <footer>
        <x-footer />
    </footer>

</x-layout>
