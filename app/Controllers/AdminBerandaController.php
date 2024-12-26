<?php

namespace App\Controllers;

use App\Models\Prodi;
use App\Models\Status;
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

    public function show($params)
    {
        $submissionModel = new Submission();
        $userModel = new Users();
        $statusModel = new Status();

        $idUser = (int) $params['id'];

        $getSubmission = $submissionModel->all();
        $getUser = $userModel
            ->join('UserDetail', 'UserDetail.user_id', '=', 'Users.id', 'left')
            ->join('Prodi', 'UserDetail.prodi_id', '=', 'Prodi.id', 'left')
            ->select('users.id as user_id', 'UserDetail.prodi_id as prodi_id', 'Prodi.name as prodi', 'users.role as role', 'users.name as username', 'UserDetail.nim', 'UserDetail.path')
            ->get();

        $getStatus = $statusModel->where('user_id', $idUser)->first();

        $data = null;
        foreach ($getUser as $row) {
            if ($row['user_id'] == $idUser) {
                // Ambil satu submission untuk user ini
                $submission = array_filter($getSubmission, function ($item) use ($row) {
                    return $item['user_id'] == $row['user_id'];
                });

                // Jika ada submission, ambil yang pertama; jika tidak, null
                $firstSubmission = !empty($submission) ? reset($submission) : null;

                $notes = !empty($getStatus['notes']) ? $getStatus['notes'] : '';
                $status =  !empty($getStatus['bebas_tanggungan']) ? $getStatus['bebas_tanggungan'] : '';

                $data = [
                    'id' => $row['user_id'],
                    'name' => $row['username'],
                    'prodi' => $row['prodi'],
                    'prodi_id' => $row['prodi_id'],
                    'nim' => $row['nim'],
                    'path' => $row['path'],
                    'notes' => $notes,
                    'status' => $status,
                    'submission_id' => $firstSubmission ? true : false, // true jika ada submission, false jika tidak
                    'submission_data' => $submission // Menyimpan data submission jika ada
                ];
            }
        }

        // header('Content-Type: application/json'); // Mengatur header untuk JSON
        // echo json_encode($data); // Mengirim data sebagai JSON
        // exit; // Menghentikan script

        $this->view('admin/beranda/show', compact('data'));
    }

    public function update_detail($params)
    {
        // Ambil data dari POST
        $statuses = $_POST['status'];
        $submission_ids = $_POST['sub_id'];
        $user_id = $params['id']; // Ambil user_id dari parameter

        // Validasi jumlah status dan sub_id
        if (count($statuses) !== count($submission_ids)) {
            echo json_encode(['error' => 'Jumlah status dan ID tidak cocok.']);
            exit;
        }

        // Koneksi ke database
        $modelSubmission = new Submission(); // Gantilah dengan instansiasi database Anda

        // Ambil data submissions berdasarkan user_id
        $submissions = $modelSubmission->where('user_id', $user_id)->get();

        // Buat array untuk menyimpan status yang diperbarui
        $updatedStatus = [];

        foreach ($submission_ids as $index => $sub_id) {
            // Cek apakah form_id ada di hasil query
            foreach ($submissions as $submission) {
                if ($submission['form_id'] == $sub_id) {
                    // Update status
                    $statusUpdate = [
                        'tgl_verifikasi' => date('Y-m-d'),
                        'status' => $statuses[$index],
                    ];

                    // Panggil fungsi update model
                    $modelSubmission->update($submission['id'], $statusUpdate);

                    // Simpan status yang diperbarui
                    $updatedStatus[] = $statusUpdate;
                    break; // Keluar dari loop setelah menemukan kecocokan
                }
            }
        }

        $modelStatus = new Status();
        $getStatus = $modelStatus->where('user_id', $user_id)->first();

        // Memeriksa apakah ada input notes
        if (!empty($_POST['notes'])) {
            // Jika status ditemukan, perbarui catatan
            if (!empty($getStatus)) {
                $updateStatus = [
                    'notes' => $_POST['notes'], // Memperbarui dengan catatan baru
                ];
                $modelStatus->update($getStatus['id'], $updateStatus);
            } else {
                // Jika status tidak ditemukan, buat status baru
                $modelStatus->create([
                    'user_id' => $user_id,
                    'notes' => $_POST['notes'],
                ]);
            }
        } else {
            // Jika tidak ada input notes dan status ditemukan, atur notes menjadi null
            if (!empty($getStatus)) {
                $updateStatus = [
                    'notes' => null,
                ];
                $modelStatus->update($getStatus['id'], $updateStatus);
            }
        }

        $this->redirect('admin/beranda/' . $user_id);
        // // Kirim response sukses
        // header('Content-Type: application/json'); // Mengatur header untuk JSON
        // echo json_encode(['success' => 'Status berhasil diperbarui.', 'updated' => $updatedStatus]); // Mengirim data sebagai JSON
        // exit;
    }

    public function update_status()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $checked = $_POST['checked'] === 'true' ? 1 : 0; // Mengubah ke format yang sesuai untuk database

            $modelStatus = new Status();
            $getStatus = $modelStatus->where('user_id', $id)->first();

            if (empty($getStatus)) {
                $modelStatus->create([
                    'user_id' => $id,
                    'bebas_tanggungan' => $checked,
                ]);
            } else {
                $updateStatus = [
                    'bebas_tanggungan' => $checked,
                ];
                $modelStatus->update($getStatus['id'], $updateStatus);
            }

            echo json_encode(['success' => true]);
        }
    }
}
