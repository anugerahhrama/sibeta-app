<?php

namespace App\Controllers;
use App\Models\Contact;
use App\Models\Prodi;
use Exception;


class AdminBantuanController extends Controller
{
    public function index()
{
    $usersModel = new Contact();
    $data = $usersModel
        ->select('Contact.id AS contact_id,Prodi.id AS prodi_id, Prodi.name AS prodi_name, contact.name AS contact_name, contact.contact AS contact_method')
        ->join('Prodi', 'Prodi.id', '=', 'Contact.prodi_id', 'LEFT')
        ->get();

    // var_dump($data);
    $this->view('admin/bantuan/index', compact('data'));
}

    public function create()
    {
        $contactModel = new Prodi();
        $data = $contactModel
            ->select('Prodi.id AS prodi_id, Prodi.name AS prodi_name')
            ->get();
        $this->view('admin/bantuan/tambah', compact('data'));
    }

    public function store()
    {
        $contactModels = new Contact();
        
        try {
            
            // Memulai transaksi
            $contactModels->beginTransaction();
            
            $nama = htmlspecialchars($_POST['nama'] ?? '');
            $nomor = htmlspecialchars($_POST['notelp'] ?? '');
            $prodiId = htmlspecialchars($_POST['prodi_id'] ?? '');

            // Validasi data
            if (empty($nama) || empty($nomor)|| empty($prodiId)) {
                $this->redirect('admin/bantuan/create')->with('error', 'Data tidak boleh kosong.');
                return;
            }
            

            // Periksa apakah nama program studi sudah ada
            $cariContact = $contactModels->where('name', $nama)->first();
            if ($cariContact) {
                throw new Exception("Kontak sudah ada. Coba gunakan nama lain.");
            }
    
            // Simpan data program studi
             $contactModels->create([
                'name' => $nama,
                'contact' => $nomor,
                'prodi_id' => $prodiId 
            ]);
            $contactModels->commit();
                $this->redirect('admin/bantuan');
                
    
           
        } catch (Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            $contactModels->rollback();
    
            // Tangani pengecualian dan redirect ke halaman tambah dengan pesan kesalahan
            $this->redirect('admin/bantuan/create')->with('error', $e->getMessage());
            return;
        }
    }

    public function show($params) {
        echo "Contact for ID: {$params['id']}";
    }
    


    public function destroy($params)
    {
        $contact_id = (int) $params['id'];

       $contactModels = new Contact();
        
        $cariContact =$contactModels->where('id', $contact_id)->first();
        
        try {
           $contactModels->beginTransaction();

            // Hapus detail pengguna dan pengguna
            if ($cariContact) {
               $contactModels->delete($cariContact['id']);
            }

           $contactModels->commit();
            $this->redirect('admin/bantuan');
        } catch (Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
           $contactModels->rollback();
            // Redirect dengan pesan kesalahan
            $_SESSION['error_message'] = $e->getMessage();
            $this->redirect('admin/bantuan')->with('error', $e->getMessage());
        }
    }
    public function edit($params)
    {
        $contactModel = new Contact();
        $data_id = (int) $params['id'];
        $getData = $contactModel
            ->select('Contact.id, Contact.name, Contact.contact')
            ->get();

        $data = array();
        foreach ($getData as $key => $row) {
            if ($row['id'] == $data_id) {
                $data = [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'contact' => $row['contact']
                ];
            }
        }

        $this->view('admin/bantuan/edit', compact('data'));
    }

    public function update($params)
    {
        $contact_id = (int) $params['id'];

        // Validasi data
        if (empty($_POST['nama'])) {
            $this->redirect('admin/bantuan/' . $contact_id . '/edit')->with('success', 'error');
            return;
        }

        $nama = htmlspecialchars($_POST['nama']);
        $nomor = htmlspecialchars($_POST['nomor']);

        $contactModel = new Contact();
       

        // Memulai transaksi
        $contactModel->beginTransaction();

        try {
            // Update data pengguna
            $dataContact = [
                'name' => $nama,
                'contact' => $nomor
            ];
            $updateUser = $contactModel->update($contact_id, $dataContact);

            // Periksa hasil update
            $contactModel->commit();
            // Jika kedua update berhasil, commit transaksi
            $this->redirect('admin/bantuan');
        } catch (Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            $contactModel->rollback();
            // Redirect dengan pesan kesalahan
            $_SESSION['error_message'] = $e->getMessage();
            $this->redirect('admin/pengguna/' . $contact_id . '/edit')->with('success', $e->getMessage());
        }
    }

    

 }
    
    
    

