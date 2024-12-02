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
                Selamat Datang di Sistem Bebas Tanggungan Admin
            </p>
        </div>

        <?php require_once __DIR__ . "/../layouts/profileBtn.php"; ?>
    </div>

    <form class="flex items-center max-w-md mb-4">
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-6 h-6 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-[#FEBF10] focus:border-[#FEBF10] block w-full ps-10 p-2.5" placeholder="Search branch name..." required />
        </div>
        <button type="submit" class="py-2.5 px-8 ms-2 text-sm font-medium text-gray-900 bg-[#FEBF10] rounded-full border border-[#FEBF10] hover:bg-[#FEBF10]/80 focus:ring-4 focus:outline-none focus:ring-[#FEBF10]">
            Cari
        </button>
    </form>

    <div>
        <ul class="flex flex-wrap text-sm font-medium text-center ms-10" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-white hover:text-white/80 bg-[#0F1F43]" data-tabs-inactive-classes="text-gray-500 bg-[#F5F5F5]" role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block py-2.5 px-5 rounded-t-2xl" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                    DIV - TI
                </button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block py-2.5 px-5 rounded-t-2xl" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">
                    DIV - SIB
                </button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block py-2.5 px-5 rounded-t-2xl" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">
                    DII - PPLS
                </button>
            </li>
        </ul>
    </div>
    <div id="default-tab-content">
        <div class="hidden" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="p-6 border-2 rounded-2xl">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right">
                        <thead class="text-sm text-gray-700 uppercase border-b">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nim
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Program Studi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal Pengajuan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white">
                                <td class="px-6 py-2">
                                    <div class="flex items-center gap-x-4">
                                        <svg class="w-6 h-6 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>

                                        Apple MacBook Pro 17"
                                    </div>
                                </td>
                                <td class="px-6 py-2">
                                    2341720174
                                </td>
                                <td class="px-6 py-2">
                                    D4 Teknik Informatika
                                </td>
                                <td class="px-6 py-2">
                                    28-03-2024
                                </td>
                                <td class="px-6 py-2">
                                    <button class="py-2 px-5 bg-blue-500 text-white rounded-full">
                                        Verifikasi
                                    </button>
                                </td>
                            </tr>
                            <tr class="bg-white">
                                <td class="px-6 py-2">
                                    <div class="flex items-center gap-x-4">
                                        <svg class="w-6 h-6 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>

                                        Apple MacBook Pro 17"
                                    </div>
                                </td>
                                <td class="px-6 py-2">
                                    2341720174
                                </td>
                                <td class="px-6 py-2">
                                    D4 Teknik Informatika
                                </td>
                                <td class="px-6 py-2">
                                    28-03-2024
                                </td>
                                <td class="px-6 py-2">
                                    <button class="py-2 px-5 bg-blue-500 text-white rounded-full">
                                        Verifikasi
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        </div>
    </div>

</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/../../main.php";
?>