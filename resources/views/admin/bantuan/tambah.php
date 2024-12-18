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
        <div class="flex items-center justify-between mb-4">
            <h1 class="font-semibold text-lg">
                Tambah Kontak 
            </h1>
        </div>
        <hr class="border sm:mx-auto lg:my-4" />
        <div>
        <form action="<?= $router->route('admin/bantuan.index') ?>/store" method="POST">
        <div class="space-y-4"> <!-- Tambahkan jarak vertikal antar elemen -->
            <!-- Kolom pertama -->
            <div class="flex flex-col">
                <label for="nama" class="mb-1">Nama</label>
                <input type="text" placeholder="Masukkan Nama" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-8">
            </div>

            <!-- Kolom kedua -->
            <div class="flex flex-col">
                <label for="path" class="mb-1">Nomor Telepon</label>
                <input type="text" placeholder="Masukkan Nomor Telepon" id="notelp" name="notelp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-8">
            </div>

            <div class="flex flex-col">
            <label for="prodi" class="mb-1">Pilih Prodi</label>
                    <!-- Select prodi -->
                    <select name="prodi_id" id="prodi"
                        class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FEBF10] focus:outline-none bg-[#DDDDDD] placeholder-[#0F1F43]">
                        <?php foreach ($data as $key => $row) { ?>
                            <option value='<?= $row['prodi_id'] ?>'><?= $row['prodi_name'] ?></option>
                        <?php } ?>
                    </select>
            </div>
        </div>
    
    <div class="flex justify-end space-x-2 mt-16">
        <a href="<?= $router->route('admin/bantuan.index') ?>" class="font-medium text-base text-grey px-6 py-2.5 bg-transparent border border-[#5B5B5B] rounded-2xl">
            Kembali
        </a>
        <button type="submit" class="font-medium text-base text-white px-6 py-2.5 bg-[#FEBF10] hover:bg-[#F5A500] rounded-2xl focus:ring-4 focus:ring-[#FEBF10]">
            Tambah
        </button>
    </form>
    </div>
            
        </div>







<?php
$content = ob_get_clean();
require_once __DIR__ . "/../../main.php";
?>