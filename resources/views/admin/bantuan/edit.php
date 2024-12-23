<?php
$title = "Home Page";
ob_start();
?>

<?php require_once __DIR__ . "/../layouts/sidebar.php"; ?>

<div class="p-6 sm:ml-64">
    <div class="flex justify-between items-start mb-8">
        <div>
            <h1 class="text-2xl font-semibold">
                Bantuan
            </h1>
        </div>
        <?php require_once __DIR__ . "/../layouts/profileBtn.php"; ?>
</div>
    

    <div class="p-6 border-2 rounded-3xl mb-8 space-y-8"> <!-- Tambahkan wrapper dengan jarak antar kotak -->
    <?php if (!empty($_SESSION['flash'])): ?>
            <?php foreach ($_SESSION['flash'] as $key => $message): ?>
                <div class="alert alert-<?= $key; ?>">
                    <?= $message; ?>
                </div>
            <?php endforeach; ?>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>
        <div class="flex items-center justify-between mb-4">
            <h1 class="font-semibold text-lg">
                Edit Contact
            </h1>
        </div>
        <hr class="border sm:mx-auto lg:my-4" />
        <div>
        <form action="<?= BASE_URL ?>admin/bantuan/update/<?= htmlspecialchars($data['id'] ?? '') ?>" method="POST" >
        <div class="space-y-4"> <!-- Tambahkan jarak vertikal antar elemen -->
            <!-- Kolom pertama -->
            <div class="flex flex-col">
                <label for="nama" class="mb-1">Nama</label>
                <input type="text" placeholder="Masukkan Nama" id="nama" name="nama" value="<?= htmlspecialchars($data['name'] ?? '') ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-8">
            </div>

            <!-- Kolom kedua -->
            <div class="flex flex-col">
                <label for="path" class="mb-1">Nomor</label>
                <input type="link" placeholder="Masukkan Nomor" id="notelp" name="nomor" value="<?= htmlspecialchars($data['contact'] ?? '') ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-8">
            </div>
        </div>
        
    <div class="flex justify-end space-x-2 mt-16">
    
    <a href="<?= $router->route('admin/bantuan.index') ?>" class="font-medium text-base text-grey px-6 py-2.5 bg-transparent border border-[#5B5B5B] rounded-2xl">
            Kembali
        </a>
        <button type="submit" class="font-medium text-base text-white px-6 py-2.5 bg-[#FEBF10] hover:bg-[#F5A500] rounded-2xl focus:ring-4 focus:ring-[#FEBF10]">
            Simpan
        </button>
        </form>
        <form action="<?= BASE_URL ?>admin/bantuan/delete/<?= $data['id'] ?>" method="POST">
        <button type="submit" class="font-medium text-base text-white px-6 py-2.5 bg-[#DC3545] hover:bg-[#DC3545]/80 rounded-2xl focus:ring-4 focus:ring-[#FEBF10]">
            Hapus
        </button>
    </form>
    </div>
        </div>







<?php
$content = ob_get_clean();
require_once __DIR__ . "/../../main.php";
?>