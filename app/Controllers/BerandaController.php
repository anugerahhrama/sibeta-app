<?php

namespace App\Controllers;

use App\Models\Users;

class BerandaController extends Controller {
    public function index()
    {
        $this->view('dashboard/beranda/index');
    }
}