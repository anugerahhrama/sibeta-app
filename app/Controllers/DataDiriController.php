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
            ->select('Users.id', 'Users.name', 'UserDetail.nim', 'Prodi.name AS prodi', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin', 'no_tlp', 'UserDetail.path')
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
                    'no_tlp' => $row['no_tlp'],
                    'path' => $row['path'],
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
                $this->redirect("data-diri");
            }
        } else {
            // Jika bukan POST, redirect ke halaman form
            $this->redirect("data-diri");
        }
    }

    public function edit_profile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['profile']) && $_FILES['profile']['error'] === 0) {
                try {
                    $userDetailModel = new UserDetail();
                    $userDetailModel->beginTransaction();

                    $fileTmpPath = $_FILES['profile']['tmp_name'];
                    $fileName = $_FILES['profile']['name'];
                    $fileSize = $_FILES['profile']['size'];

                    // Temukan detail pengguna
                    $findUser = $userDetailModel->where('user_id', $_SESSION['user']['id'])->first();
                    if (!$findUser) {
                        throw new PDOException("Data pengguna tidak ditemukan.");
                    }

                    $uploadDir = __DIR__ . '/../../public/assets/profile/';

                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true); // Buat folder dengan izin full akses
                    }

                    $oldFilePath = $uploadDir . $findUser['path'];
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath); // Hapus file lama
                    }

                    $newFileName = time() . '_' . basename($findUser['nim']); // Rename file agar unik
                    $uploadPath = $uploadDir . $newFileName;

                    $userDetailModel->update($findUser['id'], [
                        'path' => $newFileName,
                    ]);

                    if (!move_uploaded_file($fileTmpPath, $uploadPath)) {
                        throw new PDOException("Terjadi kesalahan saat memindahkan file.");
                    }

                    $userDetailModel->commit();
                    $this->redirect('data-diri');
                } catch (PDOException $th) {
                    //throw $th;
                    $userDetailModel->rollback();
                    $this->redirect('data-diri');
                }
            } else {
                echo "Tidak terdapat inputan file atau terjadi kesalahan saat mengunggah file.";
            };
        };
    }
}
