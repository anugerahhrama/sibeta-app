<?php

namespace App\Controllers;

use App\Models\UserDetail;
use App\Models\Users;

class BerandaController extends Controller
{

    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            $this->redirect('login');
        }
    }

    public function index()
    {
        $userModel = new UserDetail();
        $data_id = $_SESSION['user']['id'];
        $getData = $userModel
            ->join('Users', 'Users.id', '=', 'UserDetail.user_id', 'LEFT')
            ->join('Prodi', 'Prodi.id', '=', 'UserDetail.prodi_id', 'LEFT')
            ->select('Users.id', 'Users.name', 'UserDetail.nim', 'Prodi.name AS prodi')
            ->get();
        $data = array();
        foreach ($getData as $key => $row) {
            if ($row['id'] == $data_id) {
                $data = [
                    'name' => $row['name'],
                    'nim' => $row['nim'],
                    'prodi' => $row['prodi'],
                ];
            }
        }

        $this->view('dashboard/beranda/index', compact('data'));
    }

    public function create() {}
}
