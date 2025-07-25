<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // buat agar setelah login akan ada session
    public function show_login() {
        if(!Session::has('username')) {
            return view('login');
        } else {
            return view('home');
        }
    }

    public function show_register() {

    }

    public function login() {
        // buat session
    }
}
