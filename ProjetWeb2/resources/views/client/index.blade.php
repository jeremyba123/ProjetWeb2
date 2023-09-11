<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>client</h1>
    <ul>
        <form action="{{ route('deconnexion') }}" method="POST">
            @csrf

            <input type="submit" value="Déconnexion" class="bg-indigo-500 text-white rounded-sm px-3 py-2 inline-block font-bold hover:bg-indigo-700">
        </form>
    </ul>
</body>
</html>
