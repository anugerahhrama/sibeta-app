<?php 

namespace App\Models;

use PDO;

class Contact extends Model
{
    protected static $table = 'contact';

    public function getAllContacts()
    {
        return $this->all(self::$table);
    }

    public function getData() {
        $sql = "
            SELECT prodi.name AS prodi_name, 
                   contact.name AS contact_name,
                   contact.contact AS contact_method
            FROM contact
            JOIN prodi ON contact.prodi_id = prodi.id
            ORDER BY prodi.name, contact.name;
        ";
    
        try {
            return $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error executing query: " . $e->getMessage();
            return [];
        }
    }
    
    
}

