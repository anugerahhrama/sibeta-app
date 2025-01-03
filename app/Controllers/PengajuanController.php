<?php

namespace App\Controllers;

use App\Models\Forms;
use App\Models\Submission;
use App\Models\UserDetail;
use PDOException;

class PengajuanController extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            $this->redirect('/login');
        }
    }

    public function index()
    {
        $formsModel = new Forms();
        $submissionModel = new Submission();

        $getSubmission = $submissionModel->where('user_id', $_SESSION['user']['id'])->get();
        $getForms = $formsModel->all();

        $datas = array();
        foreach ($getForms as $row) {
            $submission = array_filter($getSubmission, function ($item) use ($row) {
                return $item['form_id'] == $row['id'];
            });

            $firstSubmission = !empty($submission) ? reset($submission) : null;

            $datas[] = [
                'form_id' => $row['id'],
                'label' => $row['label'],
                'required' => $row['required'],
                'deskripsi' => $row['deskripsi'],
                'file_size' => $row['file_size'],
                'format' => $row['format'],
                'path' => $row['path'],
                'submission' => $firstSubmission,
            ];
        }

        // header('Content-Type: application/json'); // Mengatur header untuk JSON
        // echo json_encode($datas); // Mengirim data sebagai JSON
        // exit; // Menghentikan script

        $this->view('dashboard/pengajuan/index', compact('datas'));
    }

    public function store($params)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['file_submission']) && $_FILES['file_submission']['error'] === 0) {
                try {
                    // Mulai transaksi
                    $submissionModel = new Submission();
                    $submissionModel->beginTransaction();

                    // Dapatkan data user dari database
                    $dataId = $_SESSION['user']['id'];
                    $userDetailModel = new UserDetail();
                    $getDataUser = $userDetailModel->where('user_id', $dataId)->first();

                    // Cek apakah data user ditemukan
                    if (!$getDataUser) {
                        throw new PDOException("Data user tidak ditemukan.");
                    }

                    // Informasi file
                    $fileTmpPath = $_FILES['file_submission']['tmp_name'];
                    $fileName = $_FILES['file_submission']['name'];
                    $fileSize = $_FILES['file_submission']['size'];

                    // Dapatkan ID form
                    $getFormId = $_POST['form_id'];
                    $formsModel = new Forms();
                    $formId = $formsModel->find($getFormId);

                    // Cek apakah data form ditemukan
                    if (!$formId) {
                        throw new PDOException("Data form tidak ditemukan.");
                    }

                    $cekFileSize = (int) $formId['file_size'] * 10000;

                    // Validasi ukuran file
                    if ($fileSize >= $cekFileSize) {
                        throw new PDOException("Ukuran file terlalu besar.");
                    }

                    // Tentukan folder penyimpanan
                    $uploadDir = __DIR__ . '/../../public/assets/submission/';

                    // Buat folder jika belum ada
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true); // Buat folder dengan izin full akses
                    }

                    // Tentukan path file secara fisik
                    $newFileName = $getDataUser['nim'] . '_' . time() . '_' . basename($fileName); // Rename file agar unik
                    $uploadPath = $uploadDir . $newFileName;

                    // Simpan data pengajuan ke database
                    $submission = $submissionModel->create([
                        'user_id' => $dataId,
                        'form_id' => $getFormId,
                        'path' => $newFileName,
                        'status' => 0,
                        'tgl_pengajuan' => date('Y-m-d'),
                    ]);

                    // Pindahkan file
                    if (!move_uploaded_file($fileTmpPath, $uploadPath)) {
                        throw new PDOException("Terjadi kesalahan saat memindahkan file.");
                    }

                    // Commit transaksi jika semua berhasil
                    $submissionModel->commit();
                    $this->redirect('pengajuan');
                } catch (PDOException $e) {
                    // Rollback transaksi jika terjadi kesalahan
                    if (isset($submissionModel)) {
                        $submissionModel->rollback();
                    }
                    echo $e->getMessage();
                }
            } else {
                echo "Tidak terdapat inputan file atau terjadi kesalahan saat mengunggah file.";
            }
        }
    }

    public function update($params)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['file_submission']) && $_FILES['file_submission']['error'] === 0) {
                try {
                    // Mulai transaksi
                    $submissionModel = new Submission();
                    $submissionModel->beginTransaction();

                    // Dapatkan data user dari database
                    $dataId = $_SESSION['user']['id'];
                    $userDetailModel = new UserDetail();
                    $getDataUser = $userDetailModel->where('user_id', $dataId)->first();

                    // Cek apakah data user ditemukan
                    if (!$getDataUser) {
                        throw new PDOException("Data user tidak ditemukan.");
                    }

                    // Ambil ID pengajuan
                    $submissionId = $params['id'];
                    $submissionData = $submissionModel->find($submissionId);

                    // Cek apakah pengajuan ditemukan
                    if (!$submissionData) {
                        throw new PDOException("Data pengajuan tidak ditemukan.");
                    }

                    // Informasi file
                    $fileTmpPath = $_FILES['file_submission']['tmp_name'];
                    $fileName = $_FILES['file_submission']['name'];
                    $fileSize = $_FILES['file_submission']['size'];

                    // Dapatkan ID form
                    $getFormId = $submissionData['form_id'];
                    $formsModel = new Forms();
                    $formId = $formsModel->find($getFormId);

                    // Cek apakah data form ditemukan
                    if (!$formId) {
                        throw new PDOException("Data form tidak ditemukan.");
                    }

                    $cekFileSize = (int) $formId['file_size'] * 10000;

                    // Validasi ukuran file
                    if ($fileSize >= $cekFileSize) {
                        throw new PDOException("Ukuran file terlalu besar.");
                    }

                    // Tentukan folder penyimpanan
                    $uploadDir = __DIR__ . '/../../public/assets/submission/';

                    // Buat folder jika belum ada
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true); // Buat folder dengan izin full akses
                    }

                    // Hapus file lama
                    $oldFilePath = $uploadDir . $submissionData['path'];
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath); // Hapus file lama
                    }

                    // Tentukan path file secara fisik
                    $newFileName = $getDataUser['nim'] . '_' . time() . '_' . basename($fileName); // Rename file agar unik
                    $uploadPath = $uploadDir . $newFileName;

                    // Update data pengajuan di database
                    $submissionModel->update($submissionId, [
                        'user_id' => $dataId,
                        'form_id' => $getFormId,
                        'path' => $newFileName,
                        'status' => 0,
                        'tgl_pengajuan' => date('Y-m-d'),
                    ]);

                    // Pindahkan file
                    if (!move_uploaded_file($fileTmpPath, $uploadPath)) {
                        throw new PDOException("Terjadi kesalahan saat memindahkan file.");
                    }

                    // Commit transaksi jika semua berhasil
                    $submissionModel->commit();
                    $this->redirect('pengajuan');
                } catch (PDOException $e) {
                    // Rollback transaksi jika terjadi kesalahan
                    if (isset($submissionModel)) {
                        $submissionModel->rollback();
                    }
                    echo $e->getMessage();
                }
            } else {
                echo "Tidak terdapat inputan file atau terjadi kesalahan saat mengunggah file.";
            }
        }
    }
}
