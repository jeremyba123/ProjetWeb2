@props(['titre'])

<header>
    <div class="img">
        <div class="overlay"></div>

        <x-nav.nav />

        <div class="h1">
            <img src="img/image-from-rawpixel-id-2394252-modifier2.png" width="118" height="118" alt="rock-n-roll">
            <h1>{{ $titre }}</h1>
            <img src="img/image-from-rawpixel-id-2394252-modifier2-inverse.png" width="118" height="118"
                alt="rock-n-roll">
        </div>
        {{ $slot }}
    </div>
</header>
