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
        <!-- Kotak Prodi 1 -->
        <div class="p-6 border-2 rounded-3xl">
            <div class="flex items-center justify-between mb-4">
                <h1 class="font-semibold text-lg">
                    DIV - Teknik Informatika
                </h1>
                <a href="<?= $router->route('bantuan-tambah') ?>" class="font-medium text-base text-white px-6 py-2.5 bg-[#FEBF10] hover:bg-[#F5A500] rounded-2xl focus:ring-4 focus:ring-[#FEBF10]">
                    Tambah
                </a>
            </div>

            <hr class="border sm:mx-auto lg:my-4" />
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <div class="flex items-center mb-4">
                        <input type="checkbox" class="mr-2">
                        <p class="font-medium text-base">
                            Mas Anggi (Chat Only)
                        </p>
                    </div>
                    <a href="#" class="font-medium text-base text-white px-6 py-2.5 bg-blue-500 hover:bg-blue-400 rounded-2xl focus:ring-4 focus:ring-blue-500">
                        Hubungi
                    </a>
                </div>
                <div>
                    <div class="flex items-center mb-4">
                        <input type="checkbox" class="mr-2">
                        <p class="font-medium text-base">
                            Bu Yanti (Chat Only)
                        </p>
                    </div>
                    <a href="#" class="font-medium text-base text-white px-6 py-2.5 bg-blue-500 hover:bg-blue-400 rounded-2xl focus:ring-4 focus:ring-blue-500">
                        Hubungi
                    </a>
                    <div class="flex justify-end space-x-2 mt-16">
                        <a href="#" class="font-medium text-base text-white px-6 py-2.5 bg-[#DC3545] hover:bg-[#B02A37] rounded-2xl focus:ring-4 focus:ring-[#DC3545]">
                            Hapus
                        </a>
                        <a href="#" class="font-medium text-base text-white px-6 py-2.5 bg-[#0D6EFD] hover:bg-[#0C5CCA] rounded-2xl focus:ring-4 focus:ring-[#0D6EFD]">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kotak Prodi 2 -->
        <div class="p-6 border-2 rounded-3xl">
            <div class="flex items-center justify-between mb-4">
                <h1 class="font-semibold text-lg">
                    DIV - Sistem Informasi Bisnis
                </h1>
                <a href="#" class="font-medium text-base text-white px-6 py-2.5 bg-[#FEBF10] hover:bg-[#F5A500] rounded-2xl focus:ring-4 focus:ring-[#FEBF10]">
                    Tambah
                </a>
            </div>

            <hr class="border sm:mx-auto lg:my-4" />
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <div class="flex items-center mb-4">
                        <input type="checkbox" class="mr-2">
                        <p class="font-medium text-base">
                            Bu Widya Novy (Chat Only)
                        </p>
                    </div>
                    <a href="#" class="font-medium text-base text-white px-6 py-2.5 bg-blue-500 hover:bg-blue-400 rounded-2xl focus:ring-4 focus:ring-blue-500">
                        Hubungi
                    </a>
                </div>
                <div>
                    <div class="flex items-center mb-4">
                        <input type="checkbox" class="mr-2">
                        <p class="font-medium text-base">
                            Bu Ila (Chat Only)
                        </p>
                    </div>
                    <a href="#" class="font-medium text-base text-white px-6 py-2.5 bg-blue-500 hover:bg-blue-400 rounded-2xl focus:ring-4 focus:ring-blue-500">
                        Hubungi
                    </a>
                    <div class="flex justify-end space-x-2 mt-16">
                        <a href="#" class="font-medium text-base text-white px-6 py-2.5 bg-[#DC3545] hover:bg-[#B02A37] rounded-2xl focus:ring-4 focus:ring-[#DC3545]">
                            Hapus
                        </a>
                        <a href="#" class="font-medium text-base text-white px-6 py-2.5 bg-[#0D6EFD] hover:bg-[#0C5CCA] rounded-2xl focus:ring-4 focus:ring-[#0D6EFD]">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kotak Prodi 1 -->
        <div class="p-6 border-2 rounded-3xl">
            <div class="flex items-center justify-between mb-4">
                <h1 class="font-semibold text-lg">
                    DII - Pengembangan Piranti Lunak Situs
                </h1>
                <a href="#" class="font-medium text-base text-white px-6 py-2.5 bg-[#FEBF10] hover:bg-[#F5A500] rounded-2xl focus:ring-4 focus:ring-[#FEBF10]">
                    Tambah
                </a>
            </div>

            <hr class="border sm:mx-auto lg:my-4" />
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <div class="flex items-center mb-4">
                        <input type="checkbox" class="mr-2">
                        <p class="font-medium text-base">
                            Bu Titis (Chat Only)
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
            </div>
        </div>
    </div>
</div>






<?php
$content = ob_get_clean();
require_once __DIR__ . "/../../main.php";
?>