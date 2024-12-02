<?php

namespace App\Models;

use PDO;

abstract class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = getDbConnection(); // Mengambil koneksi dari fungsi global
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function all($table)
    {
        return $this->query("SELECT * FROM {$table}")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($table, $id)
    {
        return $this->query("SELECT * FROM {$table} WHERE id = :id", ['id' => $id])->fetch(PDO::FETCH_ASSOC);
    }

    public function create($table, $data)
    {
        $fields = implode(',', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        $this->query("INSERT INTO {$table} ({$fields}) VALUES ({$placeholders})", $data);
        return $this->db->lastInsertId(); // Mengembalikan ID terakhir yang disisipkan
    }

    public function update($table, $id, $data)
    {
        $set = '';
        foreach ($data as $key => $value) {
            $set .= "{$key} = :{$key}, ";
        }
        $set = rtrim($set, ', ');
        $data['id'] = $id; // Tambahkan ID ke data untuk diikat
        $this->query("UPDATE {$table} SET {$set} WHERE id = :id", $data);
    }

    public function delete($table, $id)
    {
        $this->query("DELETE FROM {$table} WHERE id = :id", ['id' => $id]);
    }
}
