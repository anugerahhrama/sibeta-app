<?php

use App\Controllers\AdminBerandaController;
use App\Controllers\AdminPengajuanController;
use App\Controllers\AdminBantuanController;
use App\Controllers\AdminPenggunaController;
use App\Controllers\BantuanController;
use App\Controllers\BerandaController;
use App\Controllers\DataDiriController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\PengajuanController;
use App\Controllers\RegistrasiController;
use App\Controllers\TanggunganController;
use App\Controllers\AdminStatusController;

$router->get('', [HomeController::class, 'index']);

// Registrasi Route
$router->get('registrasi', [RegistrasiController::class, 'index']);
$router->post('registrasi-proses', [RegistrasiController::class, 'registrasi_proses']);

// Login Route
$router->get('login', [LoginController::class, 'login']);
$router->post('login-proses', [LoginController::class, 'login_proses']);
$router->get('logout', [LoginController::class, 'logout']);

// User Route
$router->get('beranda', [BerandaController::class, 'index']);
$router->get('data-diri', [DataDiriController::class, 'index']);
$router->get('pengajuan', [PengajuanController::class, 'index']);
$router->get('tanggungan', [TanggunganController::class, 'index']);
$router->get('bantuan', [BantuanController::class, 'index']);

// Admin Route
$router->get('admin/beranda', [AdminBerandaController::class, 'index'])->name('admin-beranda');

// AdminPengguna
$router->get('admin/pengguna', [AdminPenggunaController::class, 'index'])->name('pengguna');
$router->get('admin/pengguna/tambah', [AdminPenggunaController::class, 'create'])->name('pengguna-tambah');
$router->post('admin/pengguna/simpan', [AdminPenggunaController::class, 'store'])->name('pengguna-simpan');
$router->get('admin/pengguna/permintaan', [AdminPenggunaController::class, 'permintaan'])->name('pengguna-permintaan');

// Admin Pengajuan
$router->get('admin/pengajuan', [AdminPengajuanController::class, 'index'])->name('pengajuan');
$router->get('admin/pengajuan/tambah', [AdminPengajuanController::class, 'tambah'])->name('pengajuan-tambah');

$router->get('admin/bantuan', [AdminBantuanController::class, 'index'])->name('bantuan');
$router->get('admin/bantuan/tambah', [AdminBantuanController::class, 'tambah'])->name('bantuan-tambah');
$router->get('admin/status', [AdminStatusController::class, 'index'])->name('status');

// Error Route
$router->get('404', function () {
    include __DIR__ . '/../views/errors/404.php';
});

$router->dispatch();


// use App\Controllers\AdminBerandaController;
// use App\Controllers\AdminPengajuanController;
// use App\Controllers\AdminBantuanController;
// use App\Controllers\AdminPenggunaController;
// use App\Controllers\BantuanController;
// use App\Controllers\BerandaController;
// use App\Controllers\DataDiriController;
// use App\Controllers\HomeController;
// use App\Controllers\LoginController;
// use App\Controllers\PengajuanController;
// use App\Controllers\RegistrasiController;
// use App\Controllers\TanggunganController;
// use App\Controllers\AdminStatusController;

// $router->get('', [HomeController::class, 'index']);

// //Registrasi Route
// $router->get('registrasi', [RegistrasiController::class, 'index']);
// $router->post('registrasi-proses', [RegistrasiController::class, 'registrasi_proses']);


// //Login Route
// $router->get('login', [LoginController::class, 'login']);
// $router->post('login-proses', [LoginController::class, 'login_proses']);
// $router->get('logout', [LoginController::class, 'logout']);

// // User Route
// $router->get('beranda', [BerandaController::class, 'index']);
// $router->get('data-diri', [DataDiriController::class, 'index']);
// $router->get('pengajuan', [PengajuanController::class, 'index']);
// $router->get('tanggungan', [TanggunganController::class, 'index']);
// $router->get('bantuan', [BantuanController::class, 'index']);

// // Admin Route
// $router->get('admin/beranda', [AdminBerandaController::class, 'index'])->name('admin-beranda');

// // AdminPengguna
// $router->get('admin/pengguna', [AdminPenggunaController::class, 'index'])->name('pengguna');
// $router->get('admin/pengguna/tambaha', [AdminPenggunaController::class, 'tambah'])->name('pengguna-tambah');
// $router->post('admin/pengguna/simpan', [AdminPenggunaController::class, 'simpan'])->name('pengguna-simpan');
// $router->get('admin/pengguna/permintaan', [AdminPenggunaController::class, 'permintaan'])->name('pengguna-permintaan');

// // Admin Pengajuan
// $router->get('admin/pengajuan', [AdminPengajuanController::class, 'index'])->name('pengajuan');
// $router->get('admin/pengajuan/tambah', [AdminPengajuanController::class, 'tambah'])->name('pengajuan-tambah');

// $router->get('admin/bantuan', [AdminBantuanController::class, 'index'])->name('bantuan');
// $router->get('admin/bantuan/tambah', [AdminBantuanController::class, 'tambah'])->name('bantuan-tambah');
// $router->get('admin/status', [AdminStatusController::class, 'index'])->name('status');

// //error
// $router->get('404', function () {
//     $this->view('errors/404');
// });


// $router->get('test', function () {
//     echo "Test route works!";
// });

// $router->dispatch();