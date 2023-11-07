<?php

namespace App\Http\Controllers;

// Heredamos de la clase Controller, que es el único requisito para ser un "Controller" en Laravel.
class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function nosotros()
    {
        return view('nosotros');
    }
}
