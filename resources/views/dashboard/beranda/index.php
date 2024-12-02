<?php
$title = "Home Page";
ob_start();
?>

<?php require_once __DIR__ . "/../layouts/sidebar.php"; ?>

<div class="p-6 sm:ml-64">
    <div class="flex justify-between items-start mb-8">
        <div>
            <h1 class="text-2xl font-semibold text-[#F05529]">
                Halo, Asu!
            </h1>
            <p class="text-base font-medium">
                Selamat Datang di Sistem Bebas Tanggungan
            </p>
        </div>

        <?php require_once __DIR__ . "/../layouts/profileBtn.php"; ?>
    </div>

    <div class="p-6 border-2 rounded-2xl">
        <h1 class="font-semibold text-lg">
            Data Mahasiswa
        </h1>
        <hr class="border sm:mx-auto lg:my-4" />
        <table class="w-full">
            <tr>
                <td class="text-start font-medium text-base w-40">
                    Nama
                </td>
                <td>
                    <input type="text" id="first_name" value="Ayleen Ruhul Qisthy" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly disabled />
                </td>
            </tr>
            <tr>
                <td class="text-start font-medium text-base w-fit">
                    Nim
                </td>
                <td>
                    <input type="text" id="first_name" value="2341720012" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly disabled />
                </td>
            </tr>
            <tr>
                <td class="text-start font-medium text-base w-fit">
                    Program Studi
                </td>
                <td>
                    <input type="text" id="first_name" value="D4 Teknik Informatika" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly disabled />
                </td>
            </tr>
            <tr>
                <td class="text-start font-medium text-base w-fit">
                    Jurusan
                </td>
                <td>
                    <input type="text" id="first_name" value="Teknologi Informasi" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly disabled />
                </td>
            </tr>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/../../main.php";
?>