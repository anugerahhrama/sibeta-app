<?php

namespace App\Controllers;

class TanggunganController extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            $this->redirect('/login');
        }
    }

    public function index()
    {
        $this->view('dashboard/tanggungan/index');
    }
}
