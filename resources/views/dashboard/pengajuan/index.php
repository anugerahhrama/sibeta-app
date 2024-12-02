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
        <form action="">
            <div class="p-6 border-2 rounded-2xl mb-6">
                <h5 class="font-semibold text-lg mb-4">
                    Laporan Tugas Akhir atau Skripsi <span class="font-medium text-sm text-[#DC3545]">* Wajib diisi</span>
                </h5>
                <div class="font-normal text-base mb-4 text-gray-500">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum necessitatibus dicta animi est laboriosam eum itaque nobis ullam quas molestiae et consequatur dolor impedit, tempore aspernatur non sed iusto repellat corrupti amet quia doloremque voluptas? Cumque, ab quidem! Reprehenderit quia nihil ex tempore velit inventore laudantium accusantium, quos error labore doloribus tempora saepe minus asperiores harum hic accusamus fugiat autem? Sed, quam! Quo voluptas eligendi dolore maiores inventore ad possimus odit rem corporis aliquid debitis iure, doloremque velit excepturi nam autem, blanditiis animi laudantium id praesentium suscipit. Eligendi tenetur laborum consequatur magni quasi voluptatum aut, quos, quod blanditiis aperiam ullam.
                </div>
                <div class="flex justify-end mb-4">
                    <p class="font-normal text-base text-gray-500">
                        ukuran (max : 10Mb) | ekstensi (.pdf)
                    </p>
                </div>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-full cursor-pointer bg-gray-50 focus:outline-none" id="file_input" type="file">
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/../../main.php";
?>