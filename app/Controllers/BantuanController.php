<?php

namespace App\Controllers;

class BantuanController extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            $this->redirect('/login');
        }
    }

    public function index()
    {
        $this->view('dashboard/bantuan/index');
    }
}
