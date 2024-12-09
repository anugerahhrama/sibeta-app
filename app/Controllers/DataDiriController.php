<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\UserDetail;



class DataDiriController extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            $this->redirect('login');
        }
    }

    public function index()
    {
        $userModel = new Users();
        $data = $userModel->where('id', $_SESSION['user']['id'])->first();

        if (isset($_SESSION['userData'])) {
            $userData = $_SESSION['userData'];
            unset($_SESSION['userData']); // Hapus data dari sesi setelah digunakan
        } else {
            $userData = []; // Data kosong jika tidak ada di sesi
        }

        $this->view('dashboard/dataDiri/index', compact('data'));
    }
    public function store(){

        var_dump($_SERVER['REQUEST_METHOD']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tLahir = htmlspecialchars($_POST['tempat_lahir'] ?? '');
            $tglLahir = htmlspecialchars($_POST['tgl_lahir'] ?? '');
            $jKelamin = htmlspecialchars($_POST['jenis_kelamin'] ?? '');
            $ntlp = htmlspecialchars($_POST['no_tlp'] ?? '');

             // Validasi input
            $errors = [];
            if (empty($tLahir)) {
                $errors[] = "Tempat lahir tidak boleh kosong.";
            }
            if (empty($tglLahir) || !preg_match('/^\d{2}-\d{2}-\d{4}$/', $tglLahir)) {
                $errors[] = "Tanggal lahir tidak valid. Gunakan format YYYY-MM-DD.";
            }
            if (empty($jKelamin) || !in_array($jKelamin, ['Laki-laki', 'Perempuan'])) {
                $errors[] = "Jenis kelamin tidak valid.";
            }
            if (empty($ntlp) || !preg_match('/^[0-9]{10,15}$/', $ntlp)) {
                $errors[] = "Nomor telepon tidak valid.";
            }

            // Jika ada error, kembalikan ke form dengan pesan error
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors; // Simpan error di sesi
                $this->redirect("/data-diri"); // Redirect ke form
                return;
            }
            
            $findUser = Users::where('id' , $_SESSION['user']['id'])->first();
            print_r($findUser);
            $userDetailModel = new UserDetail();
            // $addDetailUser = $userDetailModel->update

     
            // // Redirect sesuai hasil penyimpanan
            // if ($addDetailUser) {
            //     $_SESSION['success'] = "Data berhasil disimpan.";
            //     $_SESSION['userData'] = [
            //         'tempat_lahir' => $tLahir,
            //         'tgl_lahir' => $tglLahir,
            //         'jenis_kelamin' => $jKelamin,
            //         'no_tlp' => $ntlp
            //     ];
                
                
            //     $this->redirect("/data-diri");
            // } else {
            //     $_SESSION['errors'] = ["Gagal menyimpan data. Coba lagi."];
            //     $this->redirect("/data-diri");
            // }
            
        } else {
            // Jika bukan POST, redirect ke halaman form
            $this->redirect("/data-diri");
        }
        
    }
}
