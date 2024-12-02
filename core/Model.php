<?php

namespace App\Models;

use PDO;

abstract class Model
{
    protected $db;
    protected static $table; // Properti untuk menyimpan nama tabel
    protected $query;  // Menyimpan query untuk chaining
    protected $params; // Menyimpan parameter untuk binding

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

    public function all()
    {
        return $this->query("SELECT * FROM " . static::$table)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        return $this->query("SELECT * FROM " . static::$table . " WHERE id = :id", ['id' => $id])->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $fields = implode(',', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        $this->query("INSERT INTO " . static::$table . " ({$fields}) VALUES ({$placeholders})", $data);
        return $this->db->lastInsertId(); // Mengembalikan ID terakhir yang disisipkan
    }

    public function update($id, $data)
    {
        $set = '';
        foreach ($data as $key => $value) {
            $set .= "{$key} = :{$key}, ";
        }
        $set = rtrim($set, ', ');
        $data['id'] = $id; // Tambahkan ID ke data untuk diikat
        $this->query("UPDATE " . static::$table . " SET {$set} WHERE id = :id", $data);
    }

    public function delete($id)
    {
        $this->query("DELETE FROM " . static::$table . " WHERE id = :id", ['id' => $id]);
    }

    public static function where($field, $value)
    {
        $instance = new static(); // Membuat instance dari kelas yang memanggil
        $instance->query = "SELECT * FROM " . static::$table . " WHERE $field = :value";
        $instance->params = [':value' => $value];
        return $instance; // Mengembalikan instance untuk chaining
    }

    public function first()
    {
        $stmt = $this->db->prepare($this->query);
        $stmt->execute($this->params);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Mengembalikan satu hasil pertama
    }

    public function get()
    {
        $stmt = $this->db->prepare($this->query);
        $stmt->execute($this->params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Mengembalikan semua hasil
    }
}
