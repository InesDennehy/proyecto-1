<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller{
    public function home(){
        return view('home');
    }

    public function login(){
        return view('login');
    }

    public function signup(){
        return view('signup');
    }
}
