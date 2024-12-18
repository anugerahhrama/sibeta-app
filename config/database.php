<?php

function getDbConnection()
{
    $serverName = "MSI"; 
    $databaseName = "sibetapp"; // Nama database
    $dsn = "sqlsrv:Server=$serverName;Database=$databaseName";

    try {
        
        $pdo = new PDO($dsn);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Koneksi gagal: " . $e->getMessage();
        return null;
    }
}