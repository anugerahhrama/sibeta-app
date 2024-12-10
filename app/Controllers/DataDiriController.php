<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\UserDetail;
use PDOException;

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
        $userModel = new UserDetail();
        $data_id = $_SESSION['user']['id'];
        $getData = $userModel
            ->join('Users', 'Users.id', '=', 'UserDetail.user_id', 'LEFT')
            ->join('Prodi', 'Prodi.id', '=', 'UserDetail.prodi_id', 'LEFT')
            ->select('Users.id', 'Users.name', 'UserDetail.nim', 'Prodi.name AS prodi', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin', 'no_tlp')
            ->get();
        $data = array();
        foreach ($getData as $key => $row) {
            if ($row['id'] == $data_id) {
                $data = [
                    'name' => $row['name'],
                    'nim' => $row['nim'],
                    'prodi' => $row['prodi'],
                    'tempat_lahir' => $row['tempat_lahir'],
                    'tgl_lahir' => $row['tgl_lahir'],
                    'jenis_kelamin' => $row['jenis_kelamin'],
                    'no_tlp' => $row['no_tlp']
                ];
            }
        }

        $this->view('dashboard/dataDiri/index', compact('data'));
    }
    public function store()
    {
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
                var_dump($errors);
                // $this->redirect("data-diri"); // Redirect ke form
                return;
            }

            $userDetailModel = new UserDetail();

            try {
                // Mulai transaksi
                $userDetailModel->beginTransaction();

                // Temukan detail pengguna
                $findUser = $userDetailModel->where('user_id', $_SESSION['user']['id'])->first();
                if (!$findUser) {
                    throw new PDOException("Data pengguna tidak ditemukan.");
                }

                $dataUpdate = [
                    'tempat_lahir' => $tLahir,
                    'tgl_lahir' => $tglLahir,
                    'jenis_kelamin' => $jKelamin,
                    'no_tlp' => $ntlp,
                ];

                // Update data pengguna
                $userDetailModel->update($findUser['id'], $dataUpdate);

                // Commit transaksi
                $userDetailModel->commit();

                // Redirect setelah berhasil
                $this->redirect("data-diri");
            } catch (PDOException $e) {
                // Rollback transaksi jika terjadi kesalahan
                $userDetailModel->rollback();
                $_SESSION['error_message'] = $e->getMessage();
                $this->redirect("/data-diri");
            }
        } else {
            // Jika bukan POST, redirect ke halaman form
            $this->redirect("data-diri");
        }
    }
}
