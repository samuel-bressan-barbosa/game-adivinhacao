<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite("resources/css/index/index.css")
    @vite("resources/js/index/index.js")
</head>

<body style="background-color: #303F9F">
    <div class="terminal">
        <div class="terminal-line">
            <span>root</span>@<span>game</span>:
            <span>~</span>$<span> play --help</span>
        </div>
        <div class="terminal-output">
            Play:
            <br>
            Uso: play [modo] [dificuldade]
            <br>
            Modos:
            <br>
            -c, --classic Modo clássico
            <br>
            Opções:
            <br>
            -e, --easy Dificuldade fácil
            <br>
            -m, --medium Dificuldade média
            <br>
            -h, --hard Dificuldade difícil
        </div>
        <div class="terminal-line">
            <span>root</span>@<span>game</span>:
            <span>~</span>$
            <input id="userInput" autocomplete="off" class="terminal-input" type="text">
        </div>
    </div>
</body>

</html>
