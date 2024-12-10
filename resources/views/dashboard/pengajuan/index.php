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
        <h1 class="font-semibold text-lg mb-8">
            Unggah File
        </h1>
        <!-- <hr class="border sm:mx-auto lg:my-4" /> -->
        <?php foreach ($datas as $key => $row) { ?>
            <form action="<?= BASE_URL ?>pengajuan/upload" method="post" enctype="multipart/form-data">
                <input type="text" class="hidden" name="form_id" value="<?= htmlspecialchars($row['form_id']) ?>">
                <div class="p-6 border-2 rounded-2xl mb-6">
                    <h5 class="font-semibold text-lg mb-4">
                        <?= htmlspecialchars($row['label']) ?> <span class="font-medium text-sm text-[#DC3545]"><?= $row['required'] == 1 ? '* Wajib diisi' : '' ?></span>
                    </h5>
                    <div class="font-normal text-base mb-4 text-gray-500">
                        <?= htmlspecialchars($row['deskripsi']) == null ? '*Tidak ada deskripsi' : htmlspecialchars($row['deskripsi']) ?>
                    </div>
                    <div class="flex justify-end mb-4">
                        <p class="font-normal text-base text-gray-500">
                            ukuran (max : <?= htmlspecialchars($row['file_size']) ?>mb) | ekstensi (.<?= htmlspecialchars($row['format']) ?>)
                        </p>
                    </div>
                    <div class="flex gap-6">
                        <?php if ($row['path'] == null) { ?>
                            <input id="file_input" type="file" name="file_submission" accept="application/<?= $row['format'] ?? '' ?>" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-full cursor-pointer bg-gray-50 focus:outline-none" required>
                            <button type="submit" class="text-white bg-[#0D6EFD] hover:bg-[#0D6EFD]/80 focus:ring-4 focus:ring-[#0D6EFD] font-medium rounded-full text-sm px-6 py-2.5 focus:outline-none">
                                Simpan
                            </button>
                        <?php } else { ?>
                            <a href="<?= BASE_URL ?>/public/assets/submission/<?= $row['path'] ?>" class="text-white bg-green-500 hover:bg-green-500/80 focus:ring-4 focus:ring-green-500 font-medium rounded-full text-sm px-6 py-2.5 focus:outline-none">
                                Lihat File
                            </a>
                            <button type="submit" class="text-white bg-[#0D6EFD] hover:bg-[#0D6EFD]/80 focus:ring-4 focus:ring-[#0D6EFD] font-medium rounded-full text-sm px-10 py-2.5 focus:outline-none">
                                Edit
                            </button>
                        <?php } ?>
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/../../main.php";
?>