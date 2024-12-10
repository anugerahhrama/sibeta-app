<?php

namespace App\Controllers;

use App\Models\Forms;
use PDOException;

class AdminPengajuanController extends Controller
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
        $datas = $formsModel->all();
        $this->view('admin/pengajuan/index', compact('datas'));
    }

    public function create()
    {
        $this->view('admin/pengajuan/tambah');
    }

    public function store()
    {
        $formsModel = new Forms();
        $formsModel->beginTransaction();

        try {
            if (empty($_POST['judul'])) {
                // throw new PDOException("Semua field harus diisi.");
                $this->redirect($this->route('admin/pengajuan.index'));
                exit;
            }

            $judul = htmlspecialchars($_POST['judul'] ?? '');
            $desc = htmlspecialchars($_POST['desc'] ?? '');
            $name_input = htmlspecialchars($_POST['name_input'] ?? '');
            $path = htmlspecialchars($_POST['path'] ?? '');
            $ukuran = htmlspecialchars($_POST['ukuran'] ?? '');
            $format = htmlspecialchars($_POST['format'] ?? '');
            $require = htmlspecialchars($_POST['require'] ?? '0');

            $formsModel->create([
                'label' => $judul,
                'deskripsi' => $desc,
                'name' => $name_input,
                'path' => $path,
                'file_size' => $ukuran,
                'format' => $format,
                'required' => $require,
            ]);

            $formsModel->commit();
            $this->redirect('admin/pengajuan');
        } catch (PDOException $e) {
            $formsModel->rollback();
            $_SESSION['error_message'] = $e->getMessage();
            // var_dump($e->getMessage());
            $this->redirect('admin/pengajuan/create');
        }
    }

    public function edit($params)
    {
        $id = (int) $params['id'];
        $formsModel = new Forms();
        $data = $formsModel->find($id);

        if (!$data) {
            $this->redirect('admin/pengajuan');
        }

        $this->view('admin/pengajuan/edit', compact('data'));
    }

    public function update($params)
    {
        $formsModel = new Forms();
        $data_id = (int) $params['id'];
        $formsModel->beginTransaction();

        try {
            if (empty($_POST['judul'])) {
                // throw new PDOException("Semua field harus diisi.");
                $this->redirect($this->route('admin/pengajuan.index'));
                exit;
            }

            $judul = htmlspecialchars($_POST['judul'] ?? '');
            $desc = htmlspecialchars($_POST['desc'] ?? '');
            $name_input = htmlspecialchars($_POST['name_input'] ?? '');
            $path = htmlspecialchars($_POST['path'] ?? '');
            $ukuran = htmlspecialchars($_POST['ukuran'] ?? '');
            $format = htmlspecialchars($_POST['format'] ?? '');
            $require = htmlspecialchars($_POST['require'] ?? '0');

            $updateForm = [
                'label' => $judul,
                'deskripsi' => $desc,
                'name' => $name_input,
                'path' => $path,
                'file_size' => $ukuran,
                'format' => $format,
                'required' => $require,
            ];
            $getData = $formsModel->find($data_id);
            $formsModel->update($getData['id'], $updateForm);

            $formsModel->commit();
            $this->redirect('admin/pengajuan');
        } catch (PDOException $e) {
            $formsModel->rollback();
            $_SESSION['error_message'] = $e->getMessage();
            var_dump($e->getMessage());
            // $this->redirect('admin/pengajuan/create');
        }
    }

    public function destroy($params)
    {
        // $formsModel = new Forms();
        // $data_id = (int) $params['id'];
        // $formsModel->beginTransaction();

        // try {
        //     $formsModel->delete($data_id);
        //     $formsModel->commit();
        //     $this->redirect('admin/pengajuan');
        // } catch (PDOException $e) {
        //     $formsModel->rollback();
        //     $_SESSION['error_message'] = $e->getMessage();
        //     var_dump($e->getMessage());
        //     // $this->redirect('admin/pengajuan/create');
        // }
    }
}
