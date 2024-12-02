<?php

namespace App\Controllers;

class LoginController extends Controller
{
    public function index()
    {
        $this->view('auth/login', ['title' => 'login']);
    }
}
