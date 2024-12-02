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

        <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="text-black bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-full shadow-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">
            <svg class="w-6 h-6 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd" />
            </svg>
            User Name
            <svg class="w-2.5 h-2.5 ms-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>
        </button>

        <!-- Dropdown menu -->
        <div id="dropdownInformation" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                <div>Bonnie Green</div>
                <div class="font-medium truncate">name@flowbite.com</div>
            </div>
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                </li>
            </ul>
            <div class="py-2">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
            </div>
        </div>

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