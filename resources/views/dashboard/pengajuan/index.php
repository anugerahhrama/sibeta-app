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
                <div>
                    <?php if (empty($row['submission'])) { ?>
                        <form id="form-1" action="<?= BASE_URL ?>pengajuan/upload" method="post" enctype="multipart/form-data">
                            <div class="flex gap-4">
                                <input id="file_input1" type="file" name="file_submission" accept="application/<?= $row['format'] ?? '' ?>" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-full cursor-pointer bg-gray-50 focus:outline-none" required>
                                <button id="btnSimpan" type="submit" class="text-white bg-[#0D6EFD] hover:bg-[#0D6EFD]/80 focus:ring-4 focus:ring-[#0D6EFD] font-medium rounded-full text-sm px-6 py-2.5 focus:outline-none">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    <?php } else { ?>
                        <div id="flow-1-<?= $row['form_id'] ?>" class="inline-flex gap-4">
                            <a href="<?= BASE_URL ?>public/assets/submission/<?= $row['submission']['path'] ?>" class="text-white bg-green-500 hover:bg-green-500/80 focus:ring-4 focus:ring-green-500 font-medium rounded-full text-sm px-6 py-2.5 focus:outline-none" target="_blank">
                                Lihat File
                            </a>
                            <button type="button" id="btnEdit<?= $row['form_id'] ?>" class="text-white bg-[#0D6EFD] hover:bg-[#0D6EFD]/80 focus:ring-4 focus:ring-[#0D6EFD] font-medium rounded-full text-sm px-10 py-2.5 focus:outline-none">
                                Edit
                            </button>
                        </div>
                        <form id="form-2" action="<?= BASE_URL ?>pengajuan/update/<?= $row['submission']['id'] ?>" method="post" enctype="multipart/form-data">
                            <div id="flow-2-<?= $row['form_id'] ?>" class="inline-flex gap-4 w-full hidden">
                                <input id="file_input2" type="file" name="file_submission" accept="application/<?= $row['format'] ?? '' ?>" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-full cursor-pointer bg-gray-50 focus:outline-none" required>
                                <button id="btnPerbarui<?= $row['form_id'] ?>" type="submit" class="text-white bg-[#0D6EFD] hover:bg-[#0D6EFD]/80 focus:ring-4 focus:ring-[#0D6EFD] font-medium rounded-full text-sm px-6 py-2.5 focus:outline-none">
                                    Perbarui
                                </button>
                                <button type="button" id="btnBatal<?= $row['form_id'] ?>" class="text-white bg-red-600 hover:bg-red-600/80 focus:ring-4 focus:ring-red-600 font-medium rounded-full text-sm px-6 py-2.5 focus:outline-none">
                                    Batal
                                </button>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Menggunakan event delegation untuk menangani tombol edit dan batal
        $(document).on('click', '[id^="btnEdit"]', function() {
            const formId = $(this).attr('id').replace('btnEdit', ''); // Ambil form_id dari ID tombol
            $('#flow-1-' + formId).addClass('hidden'); // Sembunyikan flow-1
            $('#flow-2-' + formId).removeClass('hidden'); // Tampilkan flow-2
        });

        $(document).on('click', '[id^="btnBatal"]', function() {
            const formId = $(this).attr('id').replace('btnBatal', ''); // Ambil form_id dari ID tombol
            $('#flow-1-' + formId).removeClass('hidden'); // Tampilkan flow-1
            $('#flow-2-' + formId).addClass('hidden'); // Sembunyikan flow-2
        });
    });
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/../../main.php";
?>