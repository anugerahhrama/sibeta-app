<?php
$title = "Home Page";
ob_start();
?>

<?php require_once __DIR__ . "/../layouts/sidebar.php"; ?>

<div class="p-6 sm:ml-64">
    <div class="flex justify-between items-start mb-8">
        <div>
            <h1 class="text-2xl font-semibold">
                Data Diri Mahasiswa
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
                        <?= $data['name'] ?>
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

    <div class="p-6 border-2 rounded-2xl">
        <h1 class="font-semibold text-lg">
            Informasi Pribadi
        </h1>
        <hr class="border sm:mx-auto lg:my-4" />

        <form>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tempat Lahir
                    </label>
                    <input type="text" id="tempat_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Tempat Lahir" required />
                </div>
                <div>
                    <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Jenis Kelamin
                    </label>
                    <select id="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                </div>
                <div>
                    <label for="datepicker-autohide" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tanggal Lahir
                    </label>
                    <div class="relative">
                        <input id="datepicker-autohide" datepicker datepicker-autohide type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Select date">
                        <div class="absolute inset-y-0 end-0 flex items-center pe-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nomor Telepon (HP)
                    </label>
                    <input type="text" id="no_hp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nomor Hp Anda" required />
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="text-white bg-[#F05529] hover:bg-[#F05529]/80 focus:ring-4 focus:outline-none focus:ring-[#F05529] font-medium rounded-full text-sm w-full sm:w-auto px-10 py-2.5 text-center">
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