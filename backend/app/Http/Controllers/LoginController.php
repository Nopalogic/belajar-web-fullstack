<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login_view()
    {
        return view("login.index");
    }
    public function register_view()
    {
        return view("login.register");
    }
}
