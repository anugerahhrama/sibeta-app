<?php

namespace App\Controllers;

class PengajuanController extends Controller
{
    public function index()
    {
        $this->view('dashboard/pengajuan/index');
    }
}
