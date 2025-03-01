<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function daftar()
    {
        return view('daftar');
    }

    public function form()
    {
        return view('form');
    }

    public function profil()
    {
        return view('profil');
    }
}
