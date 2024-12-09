<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\UserDetail;
use Exception;

class AdminPenggunaController extends Controller
{
    public function permintaan()
    {
        $this->view('admin/pengguna/permintaan');
    }


    public function index()
    {
        $usersModel = new Users();
        $datas = $usersModel
            ->select('Users.id AS user_id', 'Users.name', 'Users.email', 'Users.role', 'UserDetail.nim', 'UserDetail.no_tlp')
            ->join('UserDetail', 'Users.id', '=', 'UserDetail.user_id', 'LEFT')
            ->get();
        $this->view('admin/pengguna/index', compact('datas'));
    }

    public function show($id)
    {
        echo "User Detail for ID: {$id}";
    }

    public function create()
    {
        $this->view('admin/pengguna/tambah');
    }

    public function store($params)
    {
        $data_id = (int) $params['id'];
        $userModel = new Users();

        try {
            // Memulai transaksi
            $userModel->beginTransaction();

            // Validasi data
            if (empty($_POST['nama']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['role'])) {
                $this->redirect('admin/pengguna/' . $data_id . '/edit')->with('success', 'error');
                return;
            }

            $nama = htmlspecialchars($_POST['nama'] ?? '');
            $nim = htmlspecialchars($_POST['nim'] ?? '');
            $email = htmlspecialchars($_POST['email'] ?? '');
            $password = htmlspecialchars($_POST['password'] ?? '');
            $no_tlp = htmlspecialchars($_POST['no_tlp'] ?? '');
            $role = htmlspecialchars($_POST['role'] ?? '');

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Email tidak valid.");
            }

            $cariUser = $userModel->where('id', $data_id)->first();
            if ($cariUser) {
                throw new Exception("Email sudah terdaftar. Gunakan email lain.");
            }

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $storeUser = $userModel->create([
                'name' => $nama,
                'email' => $email,
                'password' => $hashedPassword,
                'role' => $role,
            ]);

            if ($storeUser) {
                // Periksa apakah create mengembalikan ID secara langsung
                $insertedUserId = is_array($storeUser) ? $storeUser['id'] : $storeUser;

                // Tambahkan detail pengguna
                $userDetailModel = new UserDetail();
                $DetailUser = $userDetailModel->create([
                    'user_id' => $insertedUserId,
                    'prodi_id' => 1,
                    'nim' => $nim,
                    'no_tlp' => $no_tlp,
                ]);

                if ($DetailUser) {
                    // Jika semuanya berhasil, commit transaksi
                    $userModel->commit();
                    $this->redirect('admin/pengguna');
                } else {
                    throw new Exception("Gagal menambahkan detail pengguna.");
                }
            } else {
                throw new Exception("Gagal menyimpan pengguna.");
            }
        } catch (Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            $userModel->rollback();

            // Tangani pengecualian dan redirect ke halaman create dengan pesan kesalahan
            $_SESSION['error_message'] = $e->getMessage();
            $this->redirect('admin/pengguna/' . $data_id . '/edit')->with('success', $e->getMessage());
        }
    }

    public function edit($params)
    {
        $userModel = new Users();
        $data_id = (int) $params['id'];
        $getData = $userModel
            ->select('Users.id AS user_id', 'Users.name', 'Users.email', 'Users.role', 'UserDetail.nim', 'UserDetail.no_tlp')
            ->join('UserDetail', 'Users.id', '=', 'UserDetail.user_id', 'LEFT')
            ->get();

        $data = array();
        foreach ($getData as $key => $row) {
            if ($row['user_id'] == $data_id) {
                $data = [
                    'user_id' => $row['user_id'],
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'role' => $row['role'],
                    'nim' => $row['nim'],
                    'no_tlp' => $row['no_tlp']
                ];
            }
        }

        $this->view('admin/pengguna/edit', compact('data'));
    }

    public function update($params)
    {
        $data_id = (int) $params['id'];

        // Validasi data
        if (empty($_POST['nama']) || empty($_POST['nim']) || empty($_POST['email']) || empty($_POST['role'])) {
            $this->redirect('admin/pengguna/' . $data_id . '/edit')->with('success', 'error');
            return;
        }

        $nama = htmlspecialchars($_POST['nama']);
        $nim = htmlspecialchars($_POST['nim']);
        $email = htmlspecialchars($_POST['email']);
        $no_tlp = htmlspecialchars($_POST['no_tlp'] ?? '');
        $role = htmlspecialchars($_POST['role']);

        // Validasi email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->redirect('admin/pengguna/' . $data_id . '/edit');
            return;
        }

        $userModel = new Users();
        $userDetailModel = new UserDetail();

        // Memulai transaksi
        $userModel->beginTransaction();

        try {
            // Update data pengguna
            $dataUser = [
                'name' => $nama,
                'email' => $email,
                'role' => $role,
            ];
            $updateUser = $userModel->update($data_id, $dataUser);

            // Update detail pengguna
            $cariUserDetail = $userDetailModel->where('user_id', $data_id)->first();
            $dataUserDetail = [
                'prodi_id' => 1, // Sesuaikan jika diperlukan
                'nim' => $nim,
                'no_tlp' => $no_tlp,
            ];
            $updateUserDetail = $userDetailModel->update($cariUserDetail['id'], $dataUserDetail);

            // Periksa hasil update
            $userModel->commit();
            // Jika kedua update berhasil, commit transaksi
            $this->redirect('admin/pengguna');
        } catch (Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            $userModel->rollback();
            // Redirect dengan pesan kesalahan
            $_SESSION['error_message'] = $e->getMessage();
            $this->redirect('admin/pengguna/' . $data_id . '/edit')->with('success', $e->getMessage());
        }
    }

    public function destroy($params)
    {
        $data_id = (int) $params['id'];
        $userModel = new Users();
        $userDetailModel = new UserDetail();

        $cariUser = $userModel->where('id', $data_id)->first();
        $cariUserDetail = $userDetailModel->where('user_id', $data_id)->first();

        try {
            $userModel->beginTransaction();

            // Hapus detail pengguna dan pengguna
            if ($cariUserDetail) {
                $userDetailModel->delete($cariUserDetail['id']);
            }

            if ($cariUser) {
                $userModel->delete($cariUser['id']);
            }

            $userModel->commit();
            $this->redirect('admin/pengguna');
        } catch (Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            $userModel->rollback();
            // Redirect dengan pesan kesalahan
            $_SESSION['error_message'] = $e->getMessage();
            $this->redirect('admin/pengguna')->with('error', $e->getMessage());
        }
    }
}
