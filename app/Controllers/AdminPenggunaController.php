<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\UserDetail;

class AdminPenggunaController extends Controller
{
    public function index()
    {
        $this->view('admin/pengguna/index');
    }

    public function create()
    {
        $this->view('admin/pengguna/tambah');
    }

    public function store()
    {
        $userModel = new Users();

        // Validasi data
        if (!isset($_POST['nama']) || empty($_POST['nim']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['role'])) {
            exit;
        }

        $nama = htmlspecialchars($_POST['nama'] ?? '');
        $nim = htmlspecialchars($_POST['nim'] ?? '');
        $email = htmlspecialchars($_POST['email'] ?? '');
        $password = htmlspecialchars($_POST['password'] ?? '');
        $no_tlp = htmlspecialchars($_POST['no_tlp'] ?? '');
        $role = htmlspecialchars($_POST['role'] ?? '');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Email tidak valid.");
        }

        $userEmail = $userModel->where('email', $email)->first();
        if ($userEmail) {
            die("Email sudah terdaftar. Gunakan email lain.");
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $storeUser = $userModel->create([
            'name' => $nama,
            'email' => $email,
            'password' => $hashedPassword,
            'role' => $role,
        ]);

        if ($storeUser) {
            // Periksa apakah create mengembalikan ID secara langsung
            $insertedUserId = is_array($storeUser) ? $storeUser['id'] : $storeUser;

            // Tambahkan detail pengguna
            $userDetailModel = new UserDetail();
            $DetailUser = $userDetailModel->create([
                'user_id' => $insertedUserId,
                'prodi_id' => 1,
                'nim' => $nim
            ]);

            if ($DetailUser) {
                $this->redirect($this->route('pengguna'));
            } else {
                $this->redirect($this->route('pengguna-tambah'));
            }
        } else {
            $this->redirect($this->router->route('pengguna-tambah'));
        }
    }


    public function permintaan()
    {
        $this->view('admin/pengguna/permintaan');
    }
}
