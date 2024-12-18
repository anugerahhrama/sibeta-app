<?php

namespace App\Controllers;

use App\Models\Forms;
use App\Models\Submission;

class TanggunganController extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            $this->redirect('/login');
        }
    }

    public function index()
    {
        $submissionModel = new Submission();
        $formModel = new Forms();
        $datas = $submissionModel->where('user_id', $_SESSION['user']['id'])->get();

        $notes = array();
        foreach ($datas as $key => $row) {
            if (isset($row['notes'])) {
                $notes[] = $row['notes'];
            }
        }
        $mergedNotes = implode(", ", $notes);

        $getForm = $formModel->all();
        $jumlahForm = count($getForm);
        $jumlahAcc = $submissionModel->where('user_id', $_SESSION['user']['id'])->where('status', 1)->get();
        $lengkap = count($jumlahAcc) === $jumlahForm;

        // var_dump($lengkap);
        $this->view('dashboard/tanggungan/index', compact('datas', 'mergedNotes', 'lengkap'));
    }
}
