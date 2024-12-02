<?php
$title = "Home Page";
ob_start();
?>

<?php require_once __DIR__ . "/../layouts/sidebar.php"; ?>

<div class="p-6 sm:ml-64">
    <div class="flex justify-between items-start mb-8">
        <div>
            <h1 class="text-2xl font-semibold">
                Status Bebas Tanggungan
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
        <h1 class="font-semibold text-lg mb-4">
            Proses Verifikasi
        </h1>

        <div class="relative overflow-x-auto mb-8">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-[#FEBF10]">
                    <tr>
                        <th scope="col" class="px-6 py-4 border">
                            Berkas Pengajuan
                        </th>
                        <th scope="col" class="px-6 py-4 border">
                            Tgl Pengajuan
                        </th>
                        <th scope="col" class="px-6 py-4 border">
                            Tgl Persetujuan
                        </th>
                        <th scope="col" class="px-6 py-4 border">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white">
                        <td class="px-6 py-2 border">
                            <div class="flex items-center gap-x-4">
                                <svg class="w-6 h-6 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m4 8h6m-6-4h6m4-8v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                                </svg>

                                <a href="" class="text-blue-400 hover:underline">
                                    Ayleen_Laporan Skripsi.pdf
                                </a>
                            </div>
                        </td>
                        <td class="px-6 py-2 border text-center">
                            03-10-2024
                        </td>
                        <td class="px-6 py-2 border text-center">
                            05-10-2024
                        </td>
                        <td class="px-6 py-2 border">
                            <div class="flex justify-center">
                                <div class="px-5 p-2.5 rounded-full w-full text-white text-center bg-[#198754]">
                                    Diterima
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-white">
                        <td class="px-6 py-2 border">
                            <div class="flex items-center gap-x-4">
                                <svg class="w-6 h-6 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m4 8h6m-6-4h6m4-8v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                                </svg>

                                <a href="" class="text-blue-400 hover:underline">
                                    Ayleen_Laporan Skripsi.pdf
                                </a>
                            </div>
                        </td>
                        <td class="px-6 py-2 border text-center">
                            03-10-2024
                        </td>
                        <td class="px-6 py-2 border text-center">
                            05-10-2024
                        </td>
                        <td class="px-6 py-2 border">
                            <div class="flex justify-center">
                                <div class="px-5 p-2.5 rounded-full w-full text-[#7D7D7D] text-center border border-[#7D7D7D]">
                                    Menunggu
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-white">
                        <td class="px-6 py-2 border">
                            <div class="flex items-center gap-x-4">
                                <svg class="w-6 h-6 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m4 8h6m-6-4h6m4-8v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                                </svg>

                                <a href="" class="text-blue-400 hover:underline">
                                    Apple MacBook Pro 17"
                                </a>
                            </div>
                        </td>
                        <td class="px-6 py-2 border text-center">
                            03-10-2024
                        </td>
                        <td class="px-6 py-2 border text-center">
                            05-10-2024
                        </td>
                        <td class="px-6 py-2 border">
                            <div class="flex justify-center">
                                <div class="px-5 p-2.5 rounded-full w-full text-white text-center bg-[#DC3545]">
                                    Ditolak
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h1 class="font-semibold text-lg mb-4">
            Catatan
        </h1>
        <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-2xl border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Catatan ditampilkan disini..."></textarea>
    </div>

    <div class="p-6 border-2 rounded-3xl mb-8">
        <h1 class="font-semibold text-lg">
            Bebas Tanggungan
        </h1>
        <hr class="border sm:mx-auto lg:my-4" />
        <p class="font-medium text-base mb-2">
            Surat Pernyataan Bebas Tanggungan
        </p>
        <a href="" class="font-medium text-base text-blue-400 hover:underline">
            Unduh Surat Bebas Tanggungan
        </a>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/../../main.php";
?>