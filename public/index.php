<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../core/Autoloader.php';
Autoloader::register();

require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../core/Model.php';
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../core/App.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/config.php';

// Inisialisasi router
$router = new Router();
require_once __DIR__ . '/../route/web.php'; // Pastikan file web.php ada dan berisi rute yang valid

// Jalankan aplikasi
$app = new App($router);
$app->run();
