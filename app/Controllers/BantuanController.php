<?php

namespace App\Controllers;
use App\Models\Contact;
use App\Models\UserDetail;
use App\Models\Users;
use App\Models\Prodi;
use PDOException;

class BantuanController extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            $this->redirect('/login');
        }
    }

    public function index($params)
{
    $userModel = new UserDetail();
    $data_id = $_SESSION['user']['id'];
    $getProdi = $userModel
        ->join('Users', 'Users.id', '=', 'UserDetail.user_id', 'LEFT')
        ->join('Prodi', 'Prodi.id', '=', 'UserDetail.prodi_id', 'LEFT')
        ->select(
            'Users.id AS user_id',
            'Users.name AS user_name',
            'UserDetail.nim',
            'Prodi.name AS prodi_name' // Gunakan prodi_name untuk mencocokkan
        )
        ->get();

    $userProdi = null; // Prodi dari mahasiswa yang login
    foreach ($getProdi as $row) {
        if ($row['user_id'] == $data_id) {
            $userProdi = $row['prodi_name']; // Ambil prodi mahasiswa
        }
    }

    $contactModel = new Contact();
    $getContact = $contactModel
        ->select(
            'Contact.id AS contact_id',
            'Prodi.name AS prodi_name',
            'Contact.name AS contact_name',
            'Contact.contact AS contact_method'
        )
        ->join('Prodi', 'Prodi.id', '=', 'Contact.prodi_id', 'LEFT')
        ->get();

    $filteredContacts = []; // Hanya data bantuan yang sesuai prodi
    foreach ($getContact as $row) {
        if ($row['prodi_name'] === $userProdi) {
            $filteredContacts[] = $row;
        }
    }

    // Kirim data ke view
    $this->view('dashboard/bantuan/index', [
        'userProdi' => $userProdi,
        'contacts' => $filteredContacts,
    ]);
}




}
