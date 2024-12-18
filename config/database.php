<?php

function getDbConnection()
{
    $dsn = "sqlsrv:Server=localhost,1433;Database=sibeta";
    $username = "sa";
    $password = "YourStrong!Passw0rd";

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Koneksi gagal: " . $e->getMessage();
        return null;
    }
}
