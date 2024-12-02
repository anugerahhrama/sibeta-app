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
            Berkas Pengajuan Bebas Tanggungan
        </h1>
        <hr class="border sm:mx-auto lg:my-4" />
        <form action="">
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Judul
                </label>
                <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
            </div>
            <div class="mb-6">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-2xl border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea>
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Path
                </label>
                <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
            </div>
            <div class="mb-6 flex items-center gap-x-16">
                <div class="flex items-center gap-x-4">
                    <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white">
                        Ukuran
                    </label>
                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                    <span>kb</span>
                </div>
                <div class="flex items-center gap-x-4">
                    <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white">
                        Format
                    </label>
                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected></option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>
                <div class="flex items-center gap-x-4">
                    <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white">
                        Required
                    </label>
                    <input id="default-checkbox" type="checkbox" value="" class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                </div>
            </div>
            <div class="flex justify-end gap-x-2">
                <button type="button" class="text-[#5B5B5B] border border-[#5B5B5B] hover:bg-gray-50 focus:ring-4 focus:ring-[#FEBF10] font-medium rounded-full text-sm px-5 py-2.5 focus:outline-none">
                    Kembali
                </button>
                <button type="button" class="text-gray-900 bg-[#FEBF10] hover:bg-[#FEBF10]/80 focus:ring-4 focus:ring-[#FEBF10] font-medium rounded-full text-sm px-5 py-2.5 focus:outline-none">
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