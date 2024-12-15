<?php

namespace App\Controllers;

use App\Models\Prodi;
use Exception;

class AdminProdiController extends Controller
{
    public function index()
    {
        $prodiModels = new Prodi();
        $data = $prodiModels
            ->select("Prodi.id, Prodi.name")
            ->get();

        // Gunakan compact dengan nama string variabel
        $this->view('admin/prodi/index', compact('data'));
    }
    public function create()
    {
        $this->view('admin/prodi/tambah');
    }

    public function store()
    {   
       
        $prodiModels = new Prodi();
        
        try {
            // Memulai transaksi
            $prodiModels->beginTransaction();
    
            // Validasi data
            if (empty($_POST['nama'])) {
                $this->redirect('admin/prodi/create')->with('error', 'Nama program studi tidak boleh kosong.');
                return;
            }
    
            $nama = htmlspecialchars($_POST['nama'] ?? '');
            

            // Periksa apakah nama program studi sudah ada
            $cariProdi = $prodiModels->where('name', $nama)->first();
            if ($cariProdi) {
                throw new Exception("Program studi sudah ada. Gunakan nama lain.");
            }
    
            // Simpan data program studi
             $prodiModels->create([
                'name' => $nama
            ]);
            $prodiModels->commit();
                $this->redirect('admin/prodi');
                
    
           
        } catch (Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            $prodiModels->rollback();
    
            // Tangani pengecualian dan redirect ke halaman tambah dengan pesan kesalahan
            $this->redirect('admin/prodi/create')->with('error', $e->getMessage());
            return;
        }
    }

    
    public function show($params) {
        echo "Prodi for ID: {$params['id']}";
    }
    


    public function destroy($params)
    {
        $prodi_id = (int) $params['id'];

        $prodiModels = new Prodi();
        
        $cariProdi = $prodiModels->where('id', $prodi_id)->first();
        
        try {
            $prodiModels->beginTransaction();

            // Hapus detail pengguna dan pengguna
            if ($cariProdi) {
                $prodiModels->delete($cariProdi['id']);
            }

            $prodiModels->commit();
            $this->redirect('admin/prodi');
        } catch (Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            $prodiModels->rollback();
            // Redirect dengan pesan kesalahan
            $_SESSION['error_message'] = $e->getMessage();
            $this->redirect('admin/prodi')->with('error', $e->getMessage());
        }
    }

    public function edit($params)
    {
        $prodiModel = new Prodi();
        $data_id = (int) $params['id'];
        $getData = $prodiModel
            ->select('Prodi.id, Prodi.name')
            ->get();

        $data = array();
        foreach ($getData as $key => $row) {
            if ($row['id'] == $data_id) {
                $data = [
                    'id' => $row['id'],
                    'name' => $row['name']
                ];
            }
        }

        $this->view('admin/prodi/edit', compact('data'));
    }

    public function update($params)
    {
        $prodi_id = (int) $params['id'];

        // Validasi data
        if (empty($_POST['nama'])) {
            $this->redirect('admin/prodi/' . $prodi_id . '/edit')->with('success', 'error');
            return;
        }

        $nama = htmlspecialchars($_POST['nama']);

        $prodiModel = new Prodi();
       

        // Memulai transaksi
        $prodiModel->beginTransaction();

        try {
            // Update data pengguna
            $dataProdi = [
                'name' => $nama,
            ];
            $updateUser = $prodiModel->update($prodi_id, $dataProdi);

            // Periksa hasil update
            $prodiModel->commit();
            // Jika kedua update berhasil, commit transaksi
            $this->redirect('admin/prodi');
        } catch (Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            $prodiModel->rollback();
            // Redirect dengan pesan kesalahan
            $_SESSION['error_message'] = $e->getMessage();
            $this->redirect('admin/pengguna/' . $prodi_id . '/edit')->with('success', $e->getMessage());
        }
    }

}


?>