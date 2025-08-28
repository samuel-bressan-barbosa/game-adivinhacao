<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">

    @vite('resources/js/classic/index.js')
    @vite('resources/css/classic/index.css')

    <script src="https://unpkg.com/slim-select@latest/dist/slimselect.min.js"></script>
    <link href="https://unpkg.com/slim-select@latest/dist/slimselect.css" rel="stylesheet">
    </link>
</head>
</head>

<body style="background-color: #303F9F">
    <div id="app" data-dificuldade="{{ $dificuldade }}"></div>
    <div id="image" data-image="{{ $tecnologia }}"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="game-mode">CODLE</h1>
                <p class="game-difficulty">{{ $dificuldade }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="game-board">
                    <div class="game-grid">
                        <img id="guess-image" class="img-portrait" alt="Guess Image" />
                    </div>
                </div>
            </div>
            <div class="vidas">
                <span>☕︎</span>
                <span>☕︎</span>
                <span>☕︎</span>
                <span>☕︎</span>
                <span>☕︎</span>
            </div>
            <div class="flex-center">
                <div class="container-select">
                    <select id="slim-select">
                        @foreach ($tecnologias as $tec)
                            <option value="{{ $tec->codigo }}">{{ $tec->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <button id="guess-button" class="btn-tech">Adivinhar</button>
            </div>

        </div>
    </div>
</body>

<script>
    new SlimSelect({
        select: '#slim-select'
    });
</script>

</html>
