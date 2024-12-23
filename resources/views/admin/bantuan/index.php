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
    <a href="<?= $router->route('admin/bantuan.create')?>"  class="font-medium text-base text-white px-6 py-2.5 bg-[#FEBF10] hover:bg-[#F5A500] rounded-2xl focus:ring-4 focus:ring-[#FEBF10]">
        Tambah
    </a>
    <?php
    // Langkah 1: Kelompokkan data berdasarkan prodi_name
    $groupedData = [];
    foreach ($data as $item) {
        $groupedData[$item['prodi_name']][] = $item;
    }

// Langkah 2: Iterasi melalui data yang telah dikelompokkan
    foreach ($groupedData as $prodiName => $items) { ?>
        <div class="p-6 border-2 rounded-3xl mb-4 mt-4">
            <div class="flex items-center justify-between mb-4">
                <h1 class="font-semibold text-lg">
                    <?= htmlspecialchars($prodiName) ?>
                </h1>
            </div>

        <hr class="border sm:mx-auto lg:my-4" />
        <div class="grid md:grid-cols-2 gap-2">
            <?php foreach ($items as $row): ?>
                <div>
                    <div class="flex items-center mb-4">
                        <p class="font-medium text-base">
                        <?= htmlspecialchars($row['contact_name']) ?></br>(<?= htmlspecialchars($row['contact_method']) ?>)
                        </p>
                    </div>
                    <a href="<?= $router->route('admin/bantuan.edit', ['id' => $row['contact_id']]) ?>" id="editButton" class="font-medium text-base text-white px-6 py-2.5 bg-[#0D6EFD] hover:bg-[#0C5CCA] rounded-2xl focus:ring-4 focus:ring-[#0D6EFD]">
                        Edit
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php } ?>




<?php
$content = ob_get_clean();
require_once __DIR__ . "/../../main.php";
?>
