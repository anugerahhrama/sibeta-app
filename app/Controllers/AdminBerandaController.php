<?php

namespace App\Controllers;

use App\Models\Prodi;
use App\Models\Submission;
use App\Models\UserDetail;
use App\Models\Users;

class AdminBerandaController extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] === 0) {
            $this->redirect('/login');
        }
    }

    public function index1()
    {
        $this->view('admin/beranda/index');
    }

    public function index()
    {
        $submissionModel = new Submission();
        $userDetailModel = new UserDetail();
        $userModel = new Users();
        $prodiModel = new Prodi();

        $getProdi = $prodiModel->all();
        $getSubmission = $submissionModel->all();
        $getUser = $userModel
            ->join('UserDetail', 'UserDetail.user_id', '=', 'Users.id', 'left')
            ->select('users.id as user_id', 'UserDetail.prodi_id as prodi_id', 'users.role as role', 'users.name as username', 'UserDetail.nim')
            ->get();

        $userNoAdmin = [];
        foreach ($getUser as $row) {
            if ($row['role'] == 1) {
                // Ambil satu submission untuk user ini
                $submission = array_filter($getSubmission, function ($item) use ($row) {
                    return $item['user_id'] == $row['user_id'];
                });

                // Jika ada submission, ambil yang pertama; jika tidak, null
                $firstSubmission = !empty($submission) ? reset($submission) : null;

                $userNoAdmin[] = [
                    'id' => $row['user_id'],
                    'name' => $row['username'],
                    'prodi_id' => $row['prodi_id'],
                    'nim' => $row['nim'],
                    'submission_id' => $firstSubmission ? true : false, // true jika ada submission, false jika tidak
                    'submission_data' => $firstSubmission // Menyimpan data submission jika ada
                ];
            }
        }

        $datas = [];
        foreach ($getProdi as $value) {
            $datas[] = [
                'prodi' => $value['name'],
                'users' => array_filter($userNoAdmin, function ($item) use ($value) {
                    return $item['prodi_id'] == $value['id'];
                }),
            ];
        }

        // header('Content-Type: application/json'); // Mengatur header untuk JSON
        // echo json_encode($datas); // Mengirim data sebagai JSON
        // exit; // Menghentikan script

        $this->view('admin/beranda/index', compact('datas'));
    }
}
