<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = getDbConnection();
    }

    public function getAllUsers()
    {
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt->fetchAll();
    }

    public function createUser($name, $email)
    {
        $stmt = $this->db->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $stmt->execute(['name' => $name, 'email' => $email]);
    }
}
