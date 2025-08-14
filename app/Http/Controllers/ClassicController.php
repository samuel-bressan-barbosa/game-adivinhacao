<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassicController extends Controller
{
    function index(string $dificuldade)
    {
        return view("classic/index", [
            "dificuldade" => $dificuldade
        ]);
    }

    function image(Request $request){
        $dificuldade = $request->dificuldade;
        $tentativas = $request->attempts ?? 0;

        $caminho = storage_path("app/public/teste3.png");

        if (!file_exists(filename: $caminho)) {
            abort(404, "Imagem não encontrada.");
        }

        $extensao = strtolower(
        pathinfo(
            $caminho,
            PATHINFO_EXTENSION
        ));

        if(!in_array($extensao, ['jpg', 'png', 'jpeg'])){
            abort(415, "Formato de imagem não suportado.");
        }

        $imagemOriginal = match ($extensao){
            'png' => imagecreatefrompng($caminho),
            default => imagecreatefromjpeg($caminho),
        };

        //PIXELIZAÇÃO -  NÍVEL 1
        $largura = imagesx($imagemOriginal);
        $altura = imagesy($imagemOriginal);

        $fatorPixelizacao = ((5 + $tentativas) / 100) - 0.02;

        $novaLargura = max(1, intval($largura * $fatorPixelizacao));
        $novaAltura = max(1, intval($altura * $fatorPixelizacao));

        $imagemPequena = imagecreatetruecolor($novaLargura, $novaAltura);
        imagecopyresized(
            $imagemPequena,
            $imagemOriginal,
            0, 0, 0, 0,
            $novaLargura,
            $novaAltura,
            $largura,
            $altura
        );

        $imagemFinal = imagecreatetruecolor($largura, $altura);
        imagecopyresized(
            $imagemFinal,
            $imagemPequena,
            0, 0, 0, 0,
            $largura,
            $altura,
            $novaAltura,
            $novaLargura
        );

        // RUIDO - NÍVEL 2
        $tamanhoRuido = ((5 - $tentativas) * 10) / 2;
        for($i = 0; $i < rand(1, 3); $i++){
            $x = rand(0, $largura - $tamanhoRuido);
            $y = rand(0, $altura - $tamanhoRuido);
            $cor = imagecolorallocate(
                $imagemFinal,
                rand(0, 255),
                rand(0, 255),
                rand(0, 255)
            );

            imagefilledrectangle(
                $imagemFinal,
                $x,
                $y,
                $x + $tamanhoRuido,
                $y + $tamanhoRuido,
                $cor
            );
        }

        //PRETO E BRANCO - NÍVEL 3
        imagefilter($imagemFinal, IMG_FILTER_GRAYSCALE);

        ob_start();

        if($extensao === "png"){
            imagepng($imagemFinal);
            $contentType = "image/png";
        } else {
            imagejpeg($imagemFinal);
            $contentType = "image/jpeg";
        }

        $conteudoImagem = ob_get_clean();
        imagedestroy($imagemFinal);

        $base64 = 'data:' . $contentType . ';base64,' . base64_encode($conteudoImagem);
        return response()->json([
            "image" => $base64,
            "dificuldade" => "teste",
            "resposta" => "a",
            "vidas" => "a"
        ]);
    }
}
