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


 }
    
    
    

