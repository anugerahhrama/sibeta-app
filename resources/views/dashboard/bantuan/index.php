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

    <div class="p-6 border-2 rounded-3xl mb-8">
        <h1 class="font-semibold text-lg">
            DIV - Teknik Informatika
        </h1>
        <hr class="border sm:mx-auto lg:my-4" />
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <p class="font-medium text-base mb-4">
                    Mas Anggi (Chat Only)
                </p>
                <a href="#" class="font-medium text-base text-white px-6 py-2.5 bg-blue-500 hover:bg-blue-400 rounded-2xl focus:ring-4 focus:ring-blue-500">
                    Hubungi
                </a>
            </div>
            <div>
                <p class="font-medium text-base mb-4">
                    Mas Anggi (Chat Only)
                </p>
                <a href="#" class="font-medium text-base text-white px-6 py-2.5 bg-blue-500 hover:bg-blue-400 rounded-2xl focus:ring-4 focus:ring-blue-500">
                    Hubungi
                </a>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/../../main.php";
?>