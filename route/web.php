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
use App\Controllers\AdminProdiController;


$router->get('', [HomeController::class, 'index']);

// Registrasi Route
$router->get('registrasi', [RegistrasiController::class, 'index']);
$router->post('registrasi-proses', [RegistrasiController::class, 'registrasi_proses']);

// Login Route
$router->get('login', [LoginController::class, 'login'])->name('login');
$router->post('login-proses', [LoginController::class, 'login_proses']);
$router->get('logout', [LoginController::class, 'logout']);
$router->get('tambah-admin', [LoginController::class, 'tambah_admin']);

// User Route Beranda
$router->resource('beranda', BerandaController::class);

// User Data Diri
$router->get('data-diri', [DataDiriController::class, 'index']);
$router->post('data-diri-proses', [DataDiriController::class, 'store']);

// User Pengajuan
$router->get('pengajuan', [PengajuanController::class, 'index']);
$router->post('pengajuan/upload', [PengajuanController::class, 'store']);

// User Status Tanggungan
$router->get('tanggungan', [TanggunganController::class, 'index']);


$router->get('bantuan', [BantuanController::class, 'index']);

// Admin Route
$router->get('admin/beranda', [AdminBerandaController::class, 'index'])->name('admin-beranda');

// AdminPengguna
$router->resource('admin/pengguna', AdminPenggunaController::class);
// $router->get('admin/pengguna', [AdminPenggunaController::class, 'index'])->name('admin/pengguna.index');
// $router->get('admin/pengguna/tambah', [AdminPenggunaController::class, 'create'])->name('admin/pengguna.create');
// $router->post('admin/pengguna/simpan', [AdminPenggunaController::class, 'store'])->name('admin/pengguna.store');
// $router->get('admin/pengguna/{id}', [AdminPenggunaController::class, 'edit'])->name('admin/pengguna.edit');
$router->get('admin/pengguna/permintaan', [AdminPenggunaController::class, 'permintaan'])->name('pengguna-permintaan');

// Admin Pengajuan
$router->resource('admin/pengajuan', AdminPengajuanController::class);

//Admin Bantuan
$router->resource('admin/bantuan', AdminBantuanController::class);
// $router->get('admin/bantuan', [AdminBantuanController::class, 'index'])->name('bantuan');
// $router->get('admin/bantuan/tambah', [AdminBantuanController::class, 'tambah'])->name('bantuan-tambah');
// $router->get('admin/bantuan/edit', [AdminBantuanController::class, 'edit'])->name('bantuan-edit');
$router->get('admin/status', [AdminStatusController::class, 'index'])->name('status');

//Admin Prodi
$router->resource('admin/prodi', AdminProdiController::class);
// $router->get('admin/prodi', [AdminProdiController::class, 'index'])->name('prodi');
// $router->get('admin/prodi/tambah', [AdminProdiController::class, 'tambah'])->name('prodi-tambah');
// $router->post('admin/prodi/store', [AdminProdiController::class, 'store'])->name('prodi-store');
$router->get('404', function () {
    include __DIR__ . '/../views/errors/404.php';
});

$router->dispatch();
