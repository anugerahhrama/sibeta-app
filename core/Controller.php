<?php

namespace App\Controllers;

use Router;

abstract class Controller extends Router
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Pastikan session dimulai
        }
    }

    /**
     * Menampilkan view dan mengirimkan data ke dalamnya
     */
    protected function view($view, $data = [])
    {
        global $router;
        extract($data);
        include __DIR__ . '/../resources/views/' . $view . '.php';
    }

    /**
     * Redirect ke URL tertentu
     */
    protected function redirect($url)
    {
        header("Location: " . BASE_URL . $url);
        exit;
    }

    /**
     * Redirect ke halaman sebelumnya atau ke URL fallback
     */
    public function back($fallbackUrl = '/login')
    {
        $referer = $_SERVER['HTTP_REFERER'] ?? null;

        if (!empty($referer) && filter_var($referer, FILTER_VALIDATE_URL)) {
            header("Location: " . BASE_URL . $referer);
        } else {
            header("Location: " . BASE_URL . $fallbackUrl);
        }
        exit;
    }

    /**
     * Menyimpan flash message di session sebelum redirect
     */
    protected function with($key, $message)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['flash'][$key] = $message;
        return $this; // Agar chaining method memungkinkan
    }
}
