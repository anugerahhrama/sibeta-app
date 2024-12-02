<?php

namespace App\Models;

use PDO;

class Users extends Model
{
    protected static $table = 'users';

    public function getAllUsers()
    {
        // return $this->all($this->table);
    }

    public function getUserById($id)
    {
        return $this->find($this->table, $id);
    }

    public function createUser($name, $email)
    {
        return $this->create($this->table, [
            'name' => $name,
            'email' => $email,
        ]);
    }

    public function updateUser($id, $data)
    {
        $this->update($this->table, $id, $data);
    }

    public function deleteUser($id)
    {
        $this->delete($this->table, $id);
    }

    public function getUserByEmail($email)
    {
        return $this->query("SELECT id, password FROM {$this->table} WHERE email = :email", ['email' => $email])->fetch(PDO::FETCH_ASSOC);
    }

    public function addUsers($name, $email, $password, $role)
    {
        // Hash password sebelum menyimpannya ke database
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
        // Menggunakan parameter binding untuk menghindari SQL injection
        $query = "INSERT INTO {$this->table} (name, email, password, role) VALUES (:name, :email, :password, :role)";
        $stmt = $this->db->prepare($query);
    
        // Mengikat parameter ke nilai yang sesuai
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role', $role);
    
        // Menjalankan query dan mengembalikan hasilnya
        if ($stmt->execute()) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

}
