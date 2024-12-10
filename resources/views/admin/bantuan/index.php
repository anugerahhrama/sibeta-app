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

    <?php foreach ($data as $item): ?>
    <div class="p-6 border-2 rounded-3xl mb-4">
        <div class="flex items-center justify-between mb-4">
            <h1 class="font-semibold text-lg">
                <?= htmlspecialchars($item['prodi_name']) ?>
            </h1>
            <a href="<?= $router->route('bantuan-tambah') ?>" class="font-medium text-base text-white px-6 py-2.5 bg-[#FEBF10] hover:bg-[#F5A500] rounded-2xl focus:ring-4 focus:ring-[#FEBF10]">
                Tambah
            </a>
        </div>

        <hr class="border sm:mx-auto lg:my-4" />
        <div class="grid md:grid-cols-2 gap-6">
                <?php foreach ($data as $row){ ?>
                    <div>
                        <div class="flex items-center mb-4">
                            <input type="checkbox" class="mr-2">
                            <p class="font-medium text-base">
                                <?= htmlspecialchars($row['contact_name']) ?>
                            </p>
                        </div>
                        <a href="#" class="font-medium text-base text-white px-6 py-2.5 bg-blue-500 hover:bg-blue-400 rounded-2xl focus:ring-4 focus:ring-blue-500">
                            Hubungi
                        </a>
                    </div>
                    <div class="flex justify-end space-x-2 mt-16">
                        <a href="#" class="font-medium text-base text-white px-6 py-2.5 bg-[#DC3545] hover:bg-[#B02A37] rounded-2xl focus:ring-4 focus:ring-[#DC3545]">
                            Hapus
                        </a>
                        <a href="#" class="font-medium text-base text-white px-6 py-2.5 bg-[#0D6EFD] hover:bg-[#0C5CCA] rounded-2xl focus:ring-4 focus:ring-[#0D6EFD]">
                            Edit
                        </a>
                    </div>
                <?php } ?>
        </div>
    </div>
<?php endforeach; ?>




<?php
$content = ob_get_clean();
require_once __DIR__ . "/../../main.php";
?>
