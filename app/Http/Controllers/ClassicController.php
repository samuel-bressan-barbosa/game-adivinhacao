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
}
