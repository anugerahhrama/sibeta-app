<?php

namespace App\Controllers;

class AdminStatusController extends Controller
{
    public function index()
    {
        $this->view('admin/status/index');
    }
}
