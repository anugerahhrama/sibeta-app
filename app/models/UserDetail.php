<?php

namespace App\Models;

use PDO;

class UserDetail extends Model
{
    protected static $table = 'userDetail';

    public function addUserDetail($userId, $prodiId, $nim, $tempatLahir, $tglLahir, $jenisKelamin, $noTlp, $path) {
        // Query untuk menambahkan data ke tabel UserDetail
        $query = "INSERT INTO UserDetail (user_id, prodi_id, nim, tempat_lahir, tgl_lahir, jenis_kelamin, no_tlp, path) 
                  VALUES (:user_id, :prodi_id, :nim, :tempat_lahir, :tgl_lahir, :jenis_kelamin, :no_tlp, :path)";
        $stmt = $this->db->prepare($query);
    
        // Mengikat parameter ke nilai yang sesuai
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':prodi_id', $prodiId);
        $stmt->bindParam(':nim', $nim);
        $stmt->bindParam(':tempat_lahir', $tempatLahir);
        $stmt->bindParam(':tgl_lahir', $tglLahir);
        $stmt->bindParam(':jenis_kelamin', $jenisKelamin);
        $stmt->bindParam(':no_tlp', $noTlp);
        $stmt->bindParam(':path', $path);
    
        // Menjalankan query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
}