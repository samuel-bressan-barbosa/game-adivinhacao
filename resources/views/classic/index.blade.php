<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech&display=swap" rel="stylesheet">

    @vite('resources/css/classic/index.css')
    @vite('resources/js/classic/index.js')
</head>

<body style="background-color: #303F9F">
    <div class="container">
        <div class="row">
            <h1 class="game-name">CODLE</h1>
            <p class="game-difficulty">{{ $dificuldade }}</p>
        </div>
    </div>
</body>

</html>
