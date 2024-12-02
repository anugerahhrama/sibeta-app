<?php

function getDbConnection()
{
    $dsn = "sqlsrv:Server=mssql-188180-0.cloudclusters.net,19659;Database=sibeta";
    $username = "sibeta";
    $password = "Sibeta123";

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Koneksi gagal: " . $e->getMessage();
        return null;
    }
}
