<?php

namespace App\Controllers;

abstract class Controller
{
    protected function view($view, $data = [])
    {
        extract($data);
        include __DIR__ . '/../resources/views/' . $view . '.php';
    }

    protected function redirect($url)
    {
        header("Location: " . BASE_URL . $url); // Hanya menggunakan header untuk redirect
        exit; // Hentikan eksekusi skrip setelah redirect
    }
}
