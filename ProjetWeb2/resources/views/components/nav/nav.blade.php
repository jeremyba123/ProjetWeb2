<div class="nav">
    <div class="logo">
        <a href="{{ route('accueil') }}"><img src="img/Logo_logo-140-blanc.png" width="133" alt="Logo"></a>
    </div>

    <div class="menu-burger menu-croix">
        <div class="bar"></div>
    </div>


    <div class="liens-nav">
        <div class="home">
            <div class="span-home">
                <span class="material-symbols-outlined home">
                    home
                </span>
            </div>
            <a class="lien" href="{{ route('accueil') }}">
                Accueil
            </a>
        </div>

        <div class="dropdown">
            <span class="material-symbols-outlined">
                groups
            </span>
            <div class="programmation-dropdown">
                <p class="programmation">Programmation</p>
                <div class="dropdown-content">
                    <a href="{{ route('horaire') }}">Horaire</a>
                    <a href="{{ route('groupes') }}">Groupes</a>
                </div>
            </div>
        </div>

        <div class="contact">
            <span class="material-symbols-outlined">
                phone_in_talk
            </span>
            <a class="lien" href="{{ route('contact') }}">
                Contact
            </a>
        </div>

        <a class="btn btn-light " href="{{ route('forfaits') }}">
            Billets
        </a>
    </div>
</div>
