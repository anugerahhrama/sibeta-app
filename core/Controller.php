<?php

namespace App\Controllers;

abstract class Controller
{
    protected function view($view, $data = [])
    {
        extract($data);
        include __DIR__ . '/../resources/views/' . $view . '.php';
    }
}
