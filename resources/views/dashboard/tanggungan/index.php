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

        <?php require_once __DIR__ . "/../layouts/profileBtn.php"; ?>
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