<?php
$title = "Home Page";
ob_start();
?>

<?php require_once __DIR__ . "/../layouts/sidebar.php"; ?>


<div class="p-6 sm:ml-64">
    <div class="flex justify-between items-start mb-8">
        <div>
            <h1 class="text-2xl font-semibold">
                Verifikasi Berkas 
            </h1>
        </div>
    </div>

    
    <div class="p-6 border-2 rounded-3xl mb-8">
        <h1 class="font-semibold text-lg">
            Profil Mahasiswa
        </h1>
        <hr class="border sm:mx-auto lg:my-4" />
        <div class="flex flex-col md:flex-row gap-x-24">
            <div class="flex flex-col justify-center items-center gap-4">
                <img src="public/assets/img/user/profile.svg" class="h-auto max-w-full" alt="">
                <button type="button" class="w-full text-white bg-[#0F1F43] hover:bg-[#0F1F43]/80 focus:ring-4 focus:ring-[#0F1F43] font-medium rounded-full text-sm px-5 py-2.5 mb-2 focus:outline-none">
                    Ubah Foto
                </button>
            </div>
            <div class="xl:w-1/3 grid grid-cols-2 gap-8 content-center">
                <div>
                    <p class="font-normal text-sm text-gray-500">
                        Nama
                    </p>
                    <h6 class="font-semibold text-base">
                        Ayleen
                    </h6>
                </div>
                <div>
                    <p class="font-normal text-sm text-gray-500">
                        Program Studi
                    </p>
                    <h6 class="font-semibold text-base">
                        D4 Teknik Informatika
                    </h6>
                </div>
                <div>
                    <p class="font-normal text-sm text-gray-500">
                        NIM
                    </p>
                    <h6 class="font-semibold text-base">
                        2341720012
                    </h6>
                </div>
                <div>
                    <p class="font-normal text-sm text-gray-500">
                        Jurusan
                    </p>
                    <h6 class="font-semibold text-base">
                        Teknologi Informasi
                    </h6>
                </div>
            </div>
        </div>
    </div>
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
                            -
                        </td>
                        <td class="px-6 py-2 border">
                        <div class="flex justify-center">
                            <select id="statusSelect" class="px-5 p-2.5 rounded-full w-full text-center bg-white text-black appearance-none cursor-pointer" onchange="updateBackgroundColor()">
                                <option value="Menunggu" class="bg-white text-black">Menunggu</option>
                                <option value="Diterima" class="bg-white text-black">Diterima</option>
                                <option value="Ditolak" class="bg-white text-black">Ditolak</option>
                            </select>
                        </div>

                        <script>
                            function updateBackgroundColor() {
                                const selectElement = document.getElementById('statusSelect');
                                const selectedValue = selectElement.value;

                                // Set background color based on selected value
                                if (selectedValue === 'Diterima') {
                                    selectElement.style.backgroundColor = '#198754'; // Hijau
                                    selectElement.style.color = 'white';
                                } else if (selectedValue === 'Ditolak') {
                                    selectElement.style.backgroundColor = '#DC3545'; // Merah
                                    selectElement.style.color = 'white';
                                } else if (selectedValue === 'Menunggu') {
                                    selectElement.style.backgroundColor = 'white'; // Putih
                                    selectElement.style.color = '#6c757d'; // Abu-abu
                                    selectElement.style.borderColor = '#6c757d'; // Border abu-abu
                                }
                            }
                        </script>
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
                            -
                        </td>
                        <td class="px-6 py-2 border">
                        <div class="flex justify-center">
                        <select id="statusSelect" class="px-5 p-2.5 rounded-full w-full text-center bg-white text-black appearance-none cursor-pointer" onchange="updateBackgroundColor()">
                                <option value="Menunggu" class="bg-white text-black">Menunggu</option>
                                <option value="Diterima" class="bg-white text-black">Diterima</option>
                                <option value="Ditolak" class="bg-white text-black">Ditolak</option>
                            </select>
                        </div>

                        <script>
                            function updateBackgroundColor() {
                                const selectElement = document.getElementById('statusSelect');
                                const selectedValue = selectElement.value;

                                // Set background color based on selected value
                                if (selectedValue === 'Diterima') {
                                    selectElement.style.backgroundColor = '#198754'; // Hijau
                                    selectElement.style.color = 'white';
                                } else if (selectedValue === 'Ditolak') {
                                    selectElement.style.backgroundColor = '#DC3545'; // Merah
                                    selectElement.style.color = 'white';
                                } else if (selectedValue === 'Menunggu') {
                                    selectElement.style.backgroundColor = 'white'; // Putih
                                    selectElement.style.color = '#6c757d'; // Abu-abu
                                    selectElement.style.borderColor = '#6c757d'; // Border abu-abu
                                }
                            }
                        </script>
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
                            -
                        </td>
                        <td class="px-6 py-2 border">
                        <div class="flex justify-center">
                        <select id="statusSelect" class="px-5 p-2.5 rounded-full w-full text-center bg-white text-black appearance-none cursor-pointer" onchange="updateBackgroundColor()">
                                <option value="Menunggu" class="bg-white text-black">Menunggu</option>
                                <option value="Diterima" class="bg-white text-black">Diterima</option>
                                <option value="Ditolak" class="bg-white text-black">Ditolak</option>
                            </select>
                        </div>

                        <script>
                            function updateBackgroundColor() {
                                const selectElement = document.getElementById('statusSelect');
                                const selectedValue = selectElement.value;

                                // Set background color based on selected value
                                if (selectedValue === 'Diterima') {
                                    selectElement.style.backgroundColor = '#198754'; // Hijau
                                    selectElement.style.color = 'white';
                                } else if (selectedValue === 'Ditolak') {
                                    selectElement.style.backgroundColor = '#DC3545'; // Merah
                                    selectElement.style.color = 'white';
                                } else if (selectedValue === 'Menunggu') {
                                    selectElement.style.backgroundColor = 'white'; // Putih
                                    selectElement.style.color = '#6c757d'; // Abu-abu
                                    selectElement.style.borderColor = '#6c757d'; // Border abu-abu
                                }
                            }
                        </script>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h1 class="font-semibold text-lg mb-4">
            Catatan
        </h1>
        <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-2xl border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Catatan ditampilkan disini..."></textarea>
        <div class="flex justify-end space-x-2 mt-16">
        <a href="#" class="font-medium text-base text-grey px-6 py-2.5 bg-transparent border border-[#5B5B5B] rounded-2xl">
            kembali
        </a>

        <a href="#" class="font-medium text-base text-white px-6 py-2.5 bg-[#FEBF10] hover:bg-[#F5A500] rounded-2xl focus:ring-4 focus:ring-[#FEBF10]">
            Simpan
        </a>
    </div>
    </div>

    <div class="p-6 border-2 rounded-3xl mb-8">
    <div class="wrap">
        <h1 class="font-semibold text-lg">
            Bebas Tanggungan
        </h1>
        <hr class="border sm:mx-auto lg:my-4" />
        <div class="flex justify-between items-center">
            <div>
                <p class="font-medium text-base mb-2">
                    Surat Pernyataan Bebas Tanggungan
                </p>
                <a href="" class="font-medium text-base text-blue-400 hover:underline">
                    Unduh Surat Bebas Tanggungan
                </a>
            </div>
            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" value="" class="sr-only peer">
                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
            </label>
        </div>
    </div>
</div>


    
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/../../main.php";
?>