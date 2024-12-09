<?php

function getDbConnection()
{
    $dsn = "sqlsrv:Server=34.101.209.102,1433;Database=sibeta";
    $username = "sqlserver";
    $password = "admin123";

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Koneksi gagal: " . $e->getMessage();
        return null;
    }
}
