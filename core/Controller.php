<?php

namespace App\Controllers;

abstract class Controller
{
    protected function view($view, $data = [])
    {
        global $router;
        extract($data);
        include __DIR__ . '/../resources/views/' . $view . '.php';
    }

    protected function redirect($url)
    {
        header("Location: " . BASE_URL . $url); // Hanya menggunakan header untuk redirect
        exit; // Hentikan eksekusi skrip setelah redirect
    }

    function back($fallbackUrl = '/login')
    {
        // Menggunakan null coalescing untuk mendapatkan referer
        $referer = $_SERVER['HTTP_REFERER'] ?? null;

        // Memeriksa apakah referer tidak kosong dan valid
        if (!empty($referer) && filter_var($referer, FILTER_VALIDATE_URL)) {
            // Jika referer ada dan valid, arahkan ke halaman sebelumnya
            header("Location: " . BASE_URL . $referer);
        } else {
            // Jika tidak ada referer atau tidak valid, arahkan ke fallback URL
            header("Location: " . BASE_URL . $fallbackUrl);
        }
        exit; // Hentikan eksekusi skrip
    }
}

