<?php

use App\Controllers\AdminPengajuanController;
use App\Controllers\BantuanController;
use App\Controllers\BerandaController;
use App\Controllers\DataDiriController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\PengajuanController;
use App\Controllers\TanggunganController;

$router->get('', [HomeController::class, 'index']);

//Login Route
$router->get('login', [LoginController::class, 'index']);

// User Route
$router->get('beranda', [BerandaController::class, 'index']);
$router->get('data-diri', [DataDiriController::class, 'index']);
$router->get('pengajuan', [PengajuanController::class, 'index']);
$router->get('tanggungan', [TanggunganController::class, 'index']);
$router->get('bantuan', [BantuanController::class, 'index']);

// Admin Route
$router->get('admin/pengajuan', [AdminPengajuanController::class, 'index']);

//error
$router->get('404', function(){
    $this->view('errors/404');
});


$router->get('test', function () {
    echo "Test route works!";
});
