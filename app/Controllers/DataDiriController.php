<?php

namespace App\Controllers;

use App\Models\Users;

class DataDiriController extends Controller
{
    public function index()
    {
        $userModel = new Users();
        $datas = $userModel->getAllUsers();
        $data = $datas[0];
        $this->view('dashboard/dataDiri/index', compact('data'));
    }
}
