<?php

namespace App\Models;

use PDO;

abstract class Model
{
    protected $db;
    protected static $table; // Properti untuk menyimpan nama tabel
    protected $query;  // Menyimpan query untuk chaining
    protected $params = []; // Menyimpan parameter untuk binding

    public function __construct()
    {
        $this->db = getDbConnection(); // Mengambil koneksi dari fungsi global
    }

    public function beginTransaction()
    {
        $this->db->beginTransaction();
    }

    public function commit()
    {
        $this->db->commit();
    }

    public function rollback()
    {
        $this->db->rollBack();
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

    public function where($field, $value)
    {
        $instance = new static(); // Membuat instance dari kelas yang memanggil
        if (empty($instance->query)) {
            $instance->query = "SELECT * FROM " . static::$table;
        }
        // Pastikan tetap menggunakan kolom yang telah dipilih
        if (strpos($instance->query, 'SELECT') !== false) {
            // Mengambil kolom yang sudah dipilih sebelumnya
            preg_match('/SELECT (.*?) FROM/', $instance->query, $matches);
            $columns = isset($matches[1]) ? $matches[1] : '*';
            $instance->query .= " WHERE $field = :value";
            $instance->query = preg_replace('/SELECT .*? FROM/', "SELECT $columns FROM", $instance->query);
        }
        $instance->params[':value'] = $value;
        return $instance; // Mengembalikan instance untuk chaining
    }

    public function select($columns)
    {
        if (!is_array($columns)) {
            $columns = func_get_args(); // Mengambil argumen jika bukan array
        }

        $columnsList = implode(', ', $columns);
        // Atur query untuk SELECT jika belum diatur
        if (empty($this->query) || strpos($this->query, 'SELECT') === false) {
            $this->query = "SELECT $columnsList FROM " . static::$table; // Atur query untuk SELECT
        } else {
            // Jika sudah ada query SELECT, ganti kolom yang dipilih
            $this->query = preg_replace('/SELECT .*? FROM/', "SELECT $columnsList FROM", $this->query);
        }

        return $this; // Kembalikan instance untuk chaining
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

    public function join($table, $first, $operator, $second, $type = 'INNER')
    {
        // Jika belum ada query, mulai dengan SELECT *
        if (empty($this->query)) {
            $this->query = "SELECT * FROM " . static::$table;
        }

        // Tambahkan JOIN ke query
        $this->query .= " $type JOIN $table ON $first $operator $second";

        return $this; // Kembalikan instance untuk chaining
    }

    public function groupBy($columns)
    {
        if (!is_array($columns)) {
            $columns = func_get_args(); // Mengambil argumen jika bukan array
        }

        $columnsList = implode(', ', $columns);

        // Jika sudah ada query SELECT, tambahkan GROUP BY
        if (strpos($this->query, 'SELECT') !== false) {
            $this->query .= " GROUP BY $columnsList";
        } else {
            // Jika belum ada query SELECT, mulai dengan SELECT * dan tambahkan GROUP BY
            $this->query = "SELECT * FROM " . static::$table . " GROUP BY $columnsList";
        }

        return $this; // Kembalikan instance untuk chaining
    }
}
