<?php

namespace App\Controllers;

class AdminBerandaController extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] === 0) {
            $this->redirect('/login');
        }
    }

    public function index()
    {
        $this->view('admin/beranda/index');
    }
}
