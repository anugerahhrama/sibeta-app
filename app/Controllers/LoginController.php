<?php

namespace App\Controllers;

use App\Models\Users;
use PDOException;

class LoginController extends Controller
{
    // public function __construct()
    // {
    //     if (isset($_SESSION['user'])) {
    //         if ($_SESSION['user']['role'] === "0") {
    //             $this->redirect("admin/beranda");
    //         } else {
    //             $this->redirect("beranda");
    //         }
    //     }
    // }

    public function login()
    {
        $this->view('auth/login', ['title' => 'login']);
    }

    public function login_proses()
    {
        $userModel = new Users();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil input dari form dengan validasi
            $email = htmlspecialchars($_POST['email'] ?? '');
            $password = htmlspecialchars($_POST['password'] ?? '');

            // Validasi input kosong
            if (empty($email) || empty($password)) {
                $this->redirect("login");
                // echo "Email dan password wajib diisi.";
                return;
            }

            // Mengambil data pengguna berdasarkan email
            $user = $userModel->where('email', $email)->first();

            //Jika user ditemukan
            if ($user) {
                // Verifikasi password
                if (password_verify($password, $user['password'])) {
                    // Set session
                    $_SESSION['user'] = $user;
                    if ($_SESSION['user']['role'] === "0") {
                        $this->redirect("admin/beranda");
                    }
                    $this->redirect("beranda");
                    exit;
                } else {
                    $this->redirect("login");
                    // echo "Password salah.";
                }
            } else {
                // echo "Email tidak ditemukan.";
                $this->redirect("login");
            }
        }
    }

    public function logout()
    {
        session_start(); // Pastikan sesi sudah dimulai
        session_unset(); // Menghapus semua variabel sesi
        session_destroy(); // Menghancurkan sesi

        $this->redirect('login');
    }

    public function tambah_admin()
    {
        $userModel = new Users();

        $hashedPassword = password_hash('admin123', PASSWORD_BCRYPT);

        $userModel->beginTransaction();
        try {
            $userId = $userModel->create([
                'name' => 'Admin Jurusan',
                'email' => 'admin@test.com',
                'password' => $hashedPassword,
                'role' => 0
            ]);

            $userModel->commit();
            echo "berhasil tambah admin";
            exit;
        } catch (PDOException $th) {
            throw $th;
            $userModel->rollback();
            echo "gagal tambah admin";
        }
    }
}
