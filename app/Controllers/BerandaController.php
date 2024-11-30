<?php

namespace App\Controllers;

class BerandaController extends Controller {
    public function index()
    {
        $this->view('dashboard/beranda/index');
    }
}