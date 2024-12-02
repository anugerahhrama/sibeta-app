<?php

namespace App\Controllers;

class AdminBantuanController extends Controller
{
    public function index()
    {
        $this->view('admin/bantuan/index');
    }
    public function tambah()
    {
        $this->view('admin/bantuan/tambah');
    }
}
