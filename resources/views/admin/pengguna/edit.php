<?php
$title = "Home Page";
ob_start();
?>

<?php require_once __DIR__ . "/../layouts/sidebar.php"; ?>


<div class="p-6 sm:ml-64">
    <div class="flex justify-between items-start mb-8">
        <div>
            <h1 class="text-2xl font-semibold">
                Pengguna
            </h1>
        </div>

        <?php require_once __DIR__ . "/../layouts/profileBtn.php"; ?>
    </div>

    <div class="p-6 border-2 rounded-2xl">
        <h1 class="font-semibold text-lg">
            Edit Pengguna
        </h1>
        <hr class="border sm:mx-auto lg:my-4" />
        <?php if (!empty($_SESSION['flash'])): ?>
            <?php foreach ($_SESSION['flash'] as $key => $message): ?>
                <div class="alert alert-<?= $key; ?>">
                    <?= $message; ?>
                </div>
            <?php endforeach; ?>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>
        <form action="<?= BASE_URL ?>admin/pengguna/update/<?= htmlspecialchars($data['user_id'] ?? '') ?>" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <table class="w-full mb-4">
                <tr>
                    <td class="text-start font-medium text-base w-40">
                        Nama
                    </td>
                    <td>
                        <input type="text" id="" name="nama" value="<?= htmlspecialchars($data['name'] ?? '') ?>" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2" required />
                    </td>
                </tr>
                <tr>
                    <td class="text-start font-medium text-base w-fit">
                        Nim
                    </td>
                    <td>
                        <input type="text" id="" name="nim" value="<?= htmlspecialchars($data['nim'] ?? '') ?>" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2" required />
                    </td>
                </tr>
                <tr>
                    <td class="text-start font-medium text-base w-fit">
                        Email
                    </td>
                    <td>
                        <input type="email" id="" name="email" value="<?= htmlspecialchars($data['email'] ?? '') ?>" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2" required />
                    </td>
                </tr>
                <!-- <tr>
                    <td class="text-start font-medium text-base w-fit">
                        Password
                    </td>
                    <td>
                        <input type="password" id="" name="password" value="" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2" required />
                    </td>
                </tr> -->
                <tr>
                    <td class="text-start font-medium text-base w-fit">
                        Nomor Telepone
                    </td>
                    <td>
                        <input type="text" id="" name="no_tlp" value="<?= htmlspecialchars($data['no_tlp'] ?? '') ?>" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2" />
                    </td>
                </tr>
                <tr>
                    <td class="text-start font-medium text-base w-fit">
                        Peran
                    </td>
                    <td>
                        <select id="" name="role" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full max-w-md p-2" required>
                            <option selected disabled>Pilih Peran</option>
                            <option value="0" <?= htmlspecialchars($data['role']) === '0' ? 'selected' : '' ?>>Admin</option>
                            <option value="1" <?= htmlspecialchars($data['role']) === '1' ? 'selected' : '' ?>>Mahasiswa</option>
                        </select>
                    </td>
                </tr>
            </table>
            <div class="flex justify-end gap-x-2">
                <a href="<?= $router->route('admin/pengguna.index') ?>" class="text-[#5B5B5B] border border-[#5B5B5B] hover:bg-gray-50 focus:ring-4 focus:ring-[#5B5B5B] font-medium rounded-full text-sm px-5 py-2.5 focus:outline-none">
                    Kembali
                </a>
                <button type="submit" class="text-gray-900 bg-[#FEBF10] hover:bg-[#FEBF10]/80 focus:ring-4 focus:ring-[#FEBF10] font-medium rounded-full text-sm px-5 py-2.5 focus:outline-none">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/../../main.php";
?>