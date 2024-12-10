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

    <div class="p-6 border-2 rounded-2xl">
        <h1 class="font-semibold text-lg">
            Edit Berkas Pengajuan Bebas Tanggungan
        </h1>
        <hr class="border sm:mx-auto lg:my-4" />
        <form action="<?= BASE_URL ?>admin/pengajuan/update/<?= htmlspecialchars($data['id']) ?>" method="post">
            <div class="mb-6">
                <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Judul
                </label>
                <input type="judul" id="judul" name="judul" value="<?= htmlspecialchars($data['label']) ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
            </div>
            <div class="mb-6">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                <textarea id="message" name="desc" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-2xl border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">
                    <?= htmlspecialchars($data['deskripsi']) ?>
                </textarea>
            </div>
            <!-- <div class="mb-6">
                <label for="name_input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nama Inputan
                </label>
                <input type="name_input" id="name_input" name="name_input" value="<?= htmlspecialchars($data['name']) ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" />
            </div> -->
            <div class="mb-6">
                <label for="path" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Path
                </label>
                <input type="path" id="path" name="path" value="<?= htmlspecialchars($data['path']) ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" />
            </div>
            <div class="mb-6 flex flex-col md:flex-row justify-start items-start gap-8 md:gap-16">
                <div class="flex items-center gap-x-4">
                    <label for="ukuran" class="block text-sm font-medium text-gray-900 dark:text-white">
                        Ukuran
                    </label>
                    <input type="ukuran" id="ukuran" name="ukuran" value="<?= htmlspecialchars($data['file_size']) ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" />
                    <span>mb</span>
                </div>
                <div class="flex items-center gap-x-4">
                    <label for="format" class="block text-sm font-medium text-gray-900 dark:text-white">
                        Format
                    </label>
                    <select id="format" name="format" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected></option>
                        <option value="pdf" <?= htmlspecialchars($data['format']) == 'pdf' ? 'selected' : '' ?>>pdf</option>
                        <option value="docx" <?= htmlspecialchars($data['format']) == 'docx' ? 'selected' : '' ?>>docx</option>
                        <option value="zip" <?= htmlspecialchars($data['format']) == 'zip' ? 'selected' : '' ?>>zip</option>
                    </select>
                </div>
                <div class="flex items-center gap-x-4">
                    <label for="required" class="block text-sm font-medium text-gray-900 dark:text-white">
                        Required
                    </label>
                    <input <?= htmlspecialchars($data['required']) === '1' ? 'checked' : '' ?> id="default-checkbox" type="checkbox" name="require" value="1" class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                </div>
            </div>
            <div class="flex justify-end gap-x-2">
                <a href="<?= $router->route('admin/pengajuan.index') ?>" class="text-[#5B5B5B] border border-[#5B5B5B] hover:bg-gray-50 focus:ring-4 focus:ring-[#FEBF10] font-medium rounded-full text-sm px-5 py-2.5 focus:outline-none">
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