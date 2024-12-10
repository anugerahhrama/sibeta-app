<?php
$title = "Home Page";
ob_start();
?>

<?php require_once __DIR__ . "/../layouts/sidebar.php"; ?>

<div class="p-6 sm:ml-64">
    <div class="flex justify-between items-start mb-8">
        <div>
            <h1 class="text-2xl font-semibold">
                Pengajuan Bebas Tanggungan
            </h1>
        </div>

        <?php require_once __DIR__ . "/../layouts/profileBtn.php"; ?>
    </div>

    <div class="p-6 border-2 rounded-3xl mb-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="font-semibold text-lg">
                Berkas Pengajuan Bebas Tanggungan
            </h1>
            <a href="<?= $router->route('admin/pengajuan.create') ?>" class="text-gray-900 bg-[#FEBF10] hover:bg-[#FEBF10]/80 focus:ring-4 focus:ring-[#FEBF10] font-medium rounded-full text-sm px-10 py-2.5 focus:outline-none">
                Tambah
            </a>
        </div>
        <!-- <hr class="border sm:mx-auto lg:my-4" /> -->
        <?php foreach ($datas as $key => $row) { ?>
            <div class="p-6 border-2 rounded-2xl mb-6">
                <div class="flex items-start gap-x-8 mb-4">
                    <div class="md:max-w-3xl w-full">
                        <h5 class="font-semibold text-lg mb-4">
                            <?= htmlspecialchars($row['label']) ?> <span class="font-medium text-sm text-[#DC3545]"><?= $row['required'] == 1 ? '* Wajib diisi' : '' ?></span>
                        </h5>
                        <div class="font-normal text-base mb-4 text-gray-500">
                            <?= htmlspecialchars($row['deskripsi']) == null ? '*Tidak ada deskripsi' : htmlspecialchars($row['deskripsi']) ?>
                        </div>
                    </div>
                    <div class="flex justify-end order-last w-full">
                        <p class="font-normal text-base text-gray-500">
                            ukuran (max : <?= htmlspecialchars($row['file_size']) ?>mb) | ekstensi (.<?= htmlspecialchars($row['format']) ?>)
                        </p>
                    </div>
                </div>
                <div class="flex justify-start gap-x-2">
                    <button type="button" class="text-white bg-[#DC3545] hover:bg-[#DC3545]/80 focus:ring-4 focus:ring-[#DC3545] font-medium rounded-full text-sm px-6 py-2.5 focus:outline-none">
                        Hapus
                    </button>
                    <a href="<?= $router->route('admin/pengajuan.edit', ['id' => $row['id']]) ?>" class="text-white bg-[#0D6EFD] hover:bg-[#0D6EFD]/80 focus:ring-4 focus:ring-[#0D6EFD] font-medium rounded-full text-sm px-6 py-2.5 focus:outline-none">
                        Edit
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/../../main.php";
?>