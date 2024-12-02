<?php

namespace App\Controllers;

class AdminPenggunaController extends Controller
{
    public function index()
    {
        $this->view('admin/pengguna/index');
    }

    public function tambah()
    {
        $this->view('admin/pengguna/tambah');
    }

    public function permintaan()
    {
        $this->view('admin/pengguna/permintaan');
    }
}
