<?php

use App\Controllers\BerandaController;
use App\Controllers\DataDiriController;
use App\Controllers\HomeController;

$router->get('', [HomeController::class, 'index']);
$router->get('beranda', [BerandaController::class, 'index']);
$router->get('data-diri', [DataDiriController::class, 'index']);

$router->get('test', function () {
    echo "Test route works!";
});
