<?php

namespace App\Controllers;

class PengajuanController extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            $this->redirect('/login');
        }
    }

    public function index()
    {
        $this->view('dashboard/pengajuan/index');
    }
}
