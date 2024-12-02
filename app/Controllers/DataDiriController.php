<?php

namespace App\Controllers;

use App\Models\Users;

class DataDiriController extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            $this->redirect('/login');
        }
    }

    public function index()
    {
        $userModel = new Users();
        $data = $userModel->where('id', $_SESSION['user']['id'])->first();
        $this->view('dashboard/dataDiri/index', compact('data'));
    }
}
