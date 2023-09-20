<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://use.typekit.net/duo7bjv.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}"> <!-- Inclure le style CSS -->
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}"> <!-- Inclure le style CSS -->
    <link rel="stylesheet" href="{{ asset('css/header.css') }}"> <!-- Inclure le style CSS -->

</head>
<body>
    <x-header titre="contact"/>
    <main class="background-contact">

            <div class="plan">
                <div class="adresse">
                    <div class="titre">
                        <h2>Plan du site</h2>
                    </div>
                    <div class="texte-adresse">
                        <p>Parc Jean Drapeau,</p>
                        <p>Circuit Gilles Villeneuve,</p>
                        <p>Montréal, QC</p>
                    </div>
                    <div class="bottom-adresse">
                        <div class="adresse-container">
                            <div class="lieu">
                                <span class="material-icons">
                                    location_on
                                </span>
                                <div class="adresse-info">
                                    <p>Montréal, Qc</p>
                                    <p>Parc Jean Drapeau</p>
                                </div>
                            </div>
                            <div class="separator"></div>
                            <div class="calendrier">
                                <span class="material-icons">
                                    calendar_month
                                </span>
                                <p>31 Mai 2023</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carte">
                    <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2795.805247885378!2d-73.5364001596304!3d45.513998930235545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc91b03473b92c9%3A0x46e7ac7562cb8303!2sParc%20Jean-Drapeau!5e0!3m2!1sfr!2sca!4v1694186023493!5m2!1sfr!2sca"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                  ></iframe>
                </div>
            </div>

        <div class="vignettes">
        <div class="vignette vignette-info">
            <div class="vignette-top mauve">
                <h3>Informations générales</h3>
            </div>
            <div class="vignette-bottom">
                <p>Merci de lire toute la section Programmation avant de nous contacter. Le plus de temps nous sauvons à répondre à des questions déjà répondues, le plus de temps nous avons pour préparer le festival!</p>
                <span class="material-icons">
                    email <!-- Icône d'enveloppe -->
                </span>
                <span class="email-address">info@metalfest.com</span> <!-- Remplacez par votre adresse e-mail -->
            </div>
        </div>

        <div class="vignette vignette-commandite">
            <div class="vignette-top mauve">
                <h3>Commanditaires</h3>
            </div>
            <div class="vignette-bottom">
                <p>Vous aimeriez commanditer notre événement? Contactez-nous et un membre de notre équipe communiquera avec vous pour en discuter.</p>
                <span class="material-icons">
                    email <!-- Icône d'enveloppe -->
                </span>
                <span class="email-address">commandites@metalfest.com</span> <!-- Remplacez par votre adresse e-mail -->
            </div>
        </div>

        <div class="vignette vignette-presse">
            <div class="vignette-top mauve">
                <h3>Relations de Presse</h3>
            </div>
            <div class="vignette-bottom">
                <p>Français</p>
                <span class="material-icons">
                    email <!-- Icône d'enveloppe -->
                </span>
                <span class="email-address">presse@metalfest.com</span> <!-- Remplacez par votre adresse e-mail -->
                <p>
                    <p>Anglais</p>
                    <span class="material-icons">
                        email <!-- Icône d'enveloppe -->
                    </span>
                    <span class="email-address">press@metalfest.com</span> <!-- Remplacez par votre adresse e-mail -->
                </p>
            </div>
            </div>
        </div>
    </main>
</body>
<footer>
    <x-footer />
</footer>
</html>
