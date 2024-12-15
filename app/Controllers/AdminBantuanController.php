<?php

namespace App\Controllers;
use App\Models\Contact;


class AdminBantuanController extends Controller
{
    public function index()
{
    $usersModel = new Contact();
    $data = $usersModel
        ->select('Prodi.name AS prodi_name, contact.name AS contact_name, contact.contact AS contact_method')
        ->join('Prodi', 'Prodi.id', '=', 'Contact.prodi_id', 'LEFT')
        ->get();

    // var_dump($data);
    $this->view('admin/bantuan/index', compact('data'));
}

    public function tambah()
    {
        $this->view('admin/bantuan/tambah');
    }

    public function edit(){
        

        $this->view('admin/bantuan/edit', compact('data'));
    }

    public function update($params){
        $data_id = (int) $params['id'];

        if (empty($_POST['name']) || empty($_POST['contact']) ) {
            $this->redirect('admin/bantuan/' . $data_id . '/edit')->with('success', 'error');
            return;
        }

        $name = htmlspecialchars($_POST ['name']);
        $kontak = htmlspecialchars($_POST ['contact']);

        $contactModel = new Contact();
        $contactModel->beginTransaction();
    }
 }
    
    
    

