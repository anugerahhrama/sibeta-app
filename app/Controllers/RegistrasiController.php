<?php

namespace App\Controllers;

use App\Models\Prodi;
use App\Models\UserDetail;
use App\Models\Users;

class RegistrasiController extends Controller {
    public function index()
    {
        $data = new Prodi();
        $prodi = $data->all();
        $this->view('auth/registrasi', compact('prodi'));
    }

    public function registrasi_proses()
    {
    $userModel = new Users();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil data dari form dan sanitasi
        $nama = htmlspecialchars($_POST['nama'] ?? '');
        $nim = htmlspecialchars($_POST['nim'] ?? '');
        $email = htmlspecialchars($_POST['email'] ?? '');
        $password = htmlspecialchars($_POST['password'] ?? '');
        $prodi = htmlspecialchars($_POST['prodi_id'] ?? '');
        $role = 1;

        // Validasi data
        if (empty($nama) || empty($nim) || empty($email) || empty($password) || empty($prodi)) {
            die("Pastikan semua data terisi.");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Email tidak valid.");
        }
        if (!is_numeric($prodi)) {
            die("Prodi ID harus berupa angka.");
        }

        // Validasi email
        $userEmail = $userModel->where('email', $email)->first();
        if ($userEmail) { // Sesuaikan dengan cara kerja model Anda
            die("Email sudah terdaftar. Gunakan email lain.");
        }

        // Hash password sebelum menyimpannya
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Tambahkan pengguna
        $userId = $userModel->create([
            'name' => $nama,
            'email' => $email,
            'password' => $hashedPassword,
            'role' => $role
        ]);

        // Periksa apakah pengguna berhasil dibuat
        if ($userId) {
            // Periksa apakah create mengembalikan ID secara langsung
            $insertedUserId = is_array($userId) ? $userId['id'] : $userId;

            // Tambahkan detail pengguna
            $userDetailModel = new UserDetail();
            $DetailUser = $userDetailModel->create([
                'user_id' => $insertedUserId,
                'prodi_id' => $prodi,
                'nim' => $nim
            ]);

            if ($DetailUser) {
                $this->redirect("/data-diri");
            } else {
                $this->redirect("/register");
            }
        } else {
            echo "Gagal menambahkan pengguna.";
        }
    }
    }
}


?>