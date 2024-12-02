<?php

namespace App\Controllers;

class AdminPengajuanController extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            $this->redirect('/login');
        }
    }

    public function index()
    {
        $this->view('admin/pengajuan/index');
    }

    public function tambah()
    {
        $this->view('admin/pengajuan/tambah');
    }
}
