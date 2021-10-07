<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('Home');
    }

    public function adminIndex(){
        return view('Home-admin');
    }
}
