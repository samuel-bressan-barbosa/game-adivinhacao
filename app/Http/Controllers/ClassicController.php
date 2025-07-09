<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassicController extends Controller
{
    //php artisan make:controller ClassicController
    function index(Request $request){
        $prompt = "Qual é o melhor time de futebol brasileiro?";
        $model = "llama3:8b";

        ini_set("max_execution_time", 0);


        $data = [
            'model' => $model,
            'prompt' => $prompt,
            'stream' => false,
        ];

        $ch = curl_init("http://localhost:11434/api/generate");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER,
        ['Content-Type: application/json']);

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS,
        json_encode($data));

        $response = curl_exec($ch);
        dd($response);



        die;
    }
}
