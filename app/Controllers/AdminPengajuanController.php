<?php

namespace App\Controllers;

class AdminPengajuanController extends Controller
{
    public function index()
    {
        $this->view('admin/pengajuan/index');
    }
}
