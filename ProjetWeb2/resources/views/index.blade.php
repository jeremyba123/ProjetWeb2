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
                    <a class="horraire" href="{{ route('horaire') }}">
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
                <x-alertes.succes cle="succes" />

                <a id="divClicable" onclick="window.location.href='/#main';" class="fleche" href="/#main">
                    <img src="img/arrow-down-sign-to-navigate.png" alt="fleche">
                </a>

                <div class="bas-page">
                    <img src="img/zombie-5.png" alt="zombie">
                    <div class="lieux-date">
                        <div class="lieux">
                            <span class="material-symbols-outlined lieux">
                                distance
                            </span>
                            <div>
                                <p class="lieux">Montréal,QC</p>
                                <p class="lieux2">Parc Jean-drapeau</p>
                            </div>
                        </div>

                        <div class="bordure"></div>

                        <div class="date">
                            <span class="material-symbols-outlined date">
                                calendar_month
                            </span>
                            <p>Mai 21-31, 2023</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="background">
            <div class="overlay"></div>
            <div id="main" class="h1">
                <img src="img/image-from-rawpixel-id-2394252-modifier2.png" width="118" height="118"
                    alt="rock-n-roll">

                <h1>Têtes d'affiches</h1>

                <img src="img/image-from-rawpixel-id-2394252-modifier2-inverse.png" width="118" height="118"
                    alt="rock-n-roll">
            </div>

            <div class="conteneur-groupe">
                @foreach ($groupes as $groupe)
                    <div class="groupe">
                        <img src="{{ $groupe->image_url }}" width="301" height="189" alt="groupe musique image">
                        <p class="nom">{{ $groupe->nom }}</p>
                        <p class="ville">{{ $groupe->ville }}</p>
                    </div>
                @endforeach
            </div>
            <a class="lien-groupe" href="{{ route('groupes') }}">
                Voir la liste complète des groupes
            </a>
        </div>

        <div class="conteneur-laisser-passer">
            <div class="conteneur-quote">
                <div class="quote">
                    <video id="quote" autoplay loop muted>
                        <source src="video/pexels-alena-darmel-7722231 (2160p)_1.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="overlay-image">
                    <img class="image-quote" src="img/thumbnail_video.png" alt="">
                </div>
            </div>

            <div class="acheter">
                <h4 class="laisser-passer" class="">Laissez-passer 2023</h4>
                <p>La prévente des laissez-passer 3-jours est maintenant débutée. Les passes
                    donnent accès à toutes les salles présentant des spectacles de la programmation
                    du festival pour les jours choisis.</p>
                <p>Plus tu l’achètes tôt, plus t’économises!</p>
                <a class="achat" href="{{ route('forfaits') }}">Réserver maintenant</a>
            </div>
        </div>
    </main>

    <footer>
        <x-footer />
    </footer>
</x-layout>
