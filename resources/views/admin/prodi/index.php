<?php
$title = "Home Page";
ob_start();
?>

<?php require_once __DIR__ . "/../layouts/sidebar.php"; ?>

<div class="p-6 sm:ml-64">
    <div class="flex justify-between items-start mb-8">
        <div>
            <h1 class="text-2xl font-semibold">
                Berkas Bebas Tanggungan
            </h1>
        </div>
        <?php require_once __DIR__ . "/../layouts/profileBtn.php"; ?>
    </div>
    <div class="p-6 border-2 rounded-3xl mb-4">
            <div class="flex items-center justify-between mb-4">
                <h1 class="font-semibold text-lg">
                    Program Studi
                </h1>
                <a href="<?= $router->route('admin/prodi.create') ?>" class="font-medium text-base text-white px-6 py-2.5 bg-[#FEBF10] hover:bg-[#F5A500] rounded-2xl focus:ring-4 focus:ring-[#FEBF10]">
                    Tambah
                </a>
            </div>

        <hr class="border sm:mx-auto lg:my-4" />
        <?php foreach( $data as $row) { ?>
            <div class="relative">
                <!-- Tambahkan relative ke p agar svg dapat diposisikan di dalamnya -->
                <div class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FEBF10] focus:outline-none bg-[#DDDDDD] placeholder-[#0F1F43] mb-2 relative">
                    <?= $row['name']; ?>
                        <div class="absolute top-1/2 right-4 transform -translate-y-1/2 flex space-x-2">
                            <a href="<?= $router->route('admin/prodi.edit', ['id' => $row['id']]) ?>" class="p-2.5 rounded-xl hover:bg-gray-200">
                                <!-- Ikon Edit -->
                            <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                            </svg>
                            </a>
                            
                            <form action="<?= BASE_URL ?>admin/prodi/delete/<?= $row['id'] ?>" method="POST">
                                <button type="submit" class="p-2.5 rounded-xl hover:bg-gray-200">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                </div>
            </div>
        <?php } ?>

        </div>
    </div>






<?php
$content = ob_get_clean();
require_once __DIR__ . "/../../main.php";
?>
