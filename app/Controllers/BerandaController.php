<?php

namespace App\Controllers;

use App\Models\Users;

class BerandaController extends Controller
{

    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            $this->redirect('/login');
        }
    }

    public function index()
    {
        $this->view('dashboard/beranda/index');
    }
}
