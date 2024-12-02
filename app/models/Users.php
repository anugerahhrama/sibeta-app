<?php

namespace App\Models;

class Users extends Model
{
    protected $table = 'users';

    public function getAllUsers()
    {
        return $this->all($this->table);
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
}
