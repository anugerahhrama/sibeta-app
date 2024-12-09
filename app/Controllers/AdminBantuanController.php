<?php

namespace App\Controllers;
use App\Models\Contact;
use PDO;

class AdminBantuanController extends Controller
{
    public function index()
    {
        $this->view('admin/bantuan/index');
    }
    public function tambah()
    {
        $this->view('admin/bantuan/tambah');
    }

    public function bantuan_proses() {
        // Membuat instance dari model Contact
        $contactModel = new Contact();
        
        // Memanggil metode getData() untuk mengambil data
        $data = $contactModel->getData();
            var_dump($data);
        // Mengelompokkan data berdasarkan nama prodi
        $groupedData = [];
        foreach ($data as $item) {
            $prodiName = $item['prodi_name'];
            if (!isset($groupedData[$prodiName])) {
                $groupedData[$prodiName] = [];
            }
            $groupedData[$prodiName][] = [
                'contact_name' => $item['contact_name'],
                'contact_method' => $item['contact_method']
            ];
        }

        // Mengirim data ke view 'bantuan/index'
        $this->view('bantuan/index', ['groupedData' => $groupedData]);
    }
 }
    
    
    

