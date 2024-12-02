<?php

function getDbConnection()
{
    $host = "mssql-188180-0.cloudclusters.net,19659"; 
    $db = "sibeta";
    $user = "sibeta";
    $pass = "Sibeta123";
    $charset = "utf8mb4";

    $dsn = "sqlsrv:Server=$host;Database=$db";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        return $pdo;
    } catch (PDOException $e) {
        die("Koneksi gagal: " . $e->getMessage());
    }
}
?>
