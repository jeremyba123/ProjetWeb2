<x-layout titre="Accueil" css="{{ asset('css/accueil.css') }}">

    <header>

        <div class="hero">
            <video id="background-video" autoplay loop muted>
                <source src="video/pexels-alena-darmel-7722231 (2160p)_1.mp4" type="video/mp4">
            </video>
            <div class="hero-content">

                <x-nav.nav />

                <div class="appel-action">
                    <img src="img/Logo_logo-200-blanc.png" alt="Logo 200px">
                    <a class="horraire" href="#">
                        <div class="horraire">
                            <div class="calendrier">
                                <span class="material-symbols-outlined white">
                                    calendar_today
                                </span>
                                <p> Voir l'Horaire</p>
                            </div>
                        </div>
                    </a>
                </div>

                <span class="material-symbols-outlined arrow">
                    arrow_forward_ios
                </span>
                <div class="bas-page">
                    <img src="img/zombie-5.png" alt="zombie">
                    <div class="lieux-date">
                        <div>
                            <span class="material-symbols-outlined">
                                distance
                            </span>
                            <div>
                                <p>Montréal,QC</p>
                                <p>Parc Jean-drapeau</p>
                            </div>
                        </div>
                        <div>
                            <span class="material-symbols-outlined">
                                calendar_month
                            </span>
                            <p>Montréal,QC</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        {{-- background --}}
        <div class="background">

            <div class="overlay"></div>
            {{-- titre --}}
            <img src="img/image-from-rawpixel-id-2394252-modifier2.png" width="118" height="118" alt="rock-n-roll">
            <h1>Têtes d'affiches</h1>
            <img src="img/image-from-rawpixel-id-2394252-modifier2.png" width="118" height="118" alt="rock-n-roll">

            {{-- image groupe --}}
            @foreach ($groupes as $groupe)
                <div class="conteneur-groupe">
                    <img src="{{ $groupe->image_url }}" width="301" height="189" alt="groupe musique image">
                    <p>{{ $groupe->nom }}</p>
                    <p>{{ $groupe->ville }}</p>
                </div>
            @endforeach

            <a href="#">
                <div class="appel-action">
                    <p>Voir la liste complète</p>
                </div>
            </a>

        </div>

        {{-- conteneur laissez-passer --}}
        <div class="conteneur-laisser-passer">
            <div>
                <p>Un seul festival metal</p>
                <p>Une experience unique</p>
                <p>Du son plein les oreilles</p>
                <p>Artiste à couper le souffle</p>
            </div>

            <div>
                <p>Laissez-passer 2023</p>

                <p>La prévente des laissez-passer 3-jours est maintenant débutée. Les passes
                    donnent accès à toutes les salles présentant des spectacles de la programmation
                    du festival pour les jours choisis.</p>

                <p>Plus tu l’achètes tôt, plus t’économises!</p>

                <div>
                    <p>Acheter maintenant</p>
                </div>

            </div>
        </div>
    </main>

    <footer>
        <x-footer />
    </footer>




</x-layout>
