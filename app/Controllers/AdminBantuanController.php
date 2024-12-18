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
        $prodiModel = new Prodi();
        $data = $prodiModel
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
                'path' => $nomor,
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
    

 }
    
    
    

