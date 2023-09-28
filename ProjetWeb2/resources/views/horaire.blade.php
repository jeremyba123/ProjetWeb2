<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://use.typekit.net/duo7bjv.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('css/horaire.css') }}"> <!-- Inclure le style CSS -->
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}"> <!-- Inclure le style CSS -->
    <link rel="stylesheet" href="{{ asset('css/header.css') }}"> <!-- Inclure le style CSS -->
</head>

<body>
    <x-header titre="horaire" />
    <main>
        <div class="encadre-horaire">
            <h2>Horaire des événements</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Groupe</th>
                            <th>Nom</th>
                            <th>Ville</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($horaires as $horaire)
                            <tr>
                                <td><img src="{{ $horaire->groupe->image_url }}" width="300" height="200"
                                        alt="groupe musique"></td>
                                <td class="nom">{{ $horaire->groupe->nom }}</td>
                                <td class="ville">{{ $horaire->groupe->ville }}</td>
                                <td class="date-heure">
                                    {{ ucfirst($horaire->date->locale('fr_FR')->isoFormat('dddd D MMMM YYYY')) }} -
                                    {{ $horaire->heure }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <footer>
        <x-footer />
    </footer>

</body>

</html>
