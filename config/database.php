<?php

function getDbConnection()
{
    $serverName = "34.101.209.102"; // Public IP
    $database = "sibeta";
    $username = "sqlserver";
    $password = "admin123";
    $port = 1433; // Port default SQL Server

    try {
        // Buat DSN untuk koneksi
        $dsn = "sqlsrv:Server=$serverName,$port;Database=$database";

        // Inisialisasi PDO
        $conn = new PDO($dsn, $username, $password);

        // Atur atribut error mode agar PDO melempar exception jika terjadi error
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Connected successfully!";
    } catch (PDOException $e) {
        // Tangani error dan tampilkan pesan
        die("Connection failed: " . $e->getMessage());
    }
}
