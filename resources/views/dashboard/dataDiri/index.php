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

        <?php require_once __DIR__ . "/../layouts/profileBtn.php"; ?>
    </div>

    <div class="p-6 border-2 rounded-3xl mb-8">
        <h1 class="font-semibold text-lg">
            Profil Mahasiswa
        </h1>
        <hr class="border sm:mx-auto lg:my-4" />
        <div class="flex flex-col md:flex-row gap-x-24">
            <div class="flex flex-col justify-center items-center gap-4">
                <img src="<?= BASE_URL ?>public/assets/profile/<?= empty($data['path']) ? 'blank-user.png' : $data['path'] ?>" class="h-32 max-w-32 rounded-full object-cover object-center" alt="">
                <button id="flow-1" type="button" class="w-full text-white bg-[#0F1F43] hover:bg-[#0F1F43]/80 focus:ring-4 focus:ring-[#0F1F43] font-medium rounded-full text-sm px-5 py-2.5 mb-2 focus:outline-none text-center block">
                    Ubah Foto
                </button>
                <form id="flow-2" class="hidden" action="<?= BASE_URL ?>data-diri-profile" method="post" enctype="multipart/form-data">
                    <input type="file" id="file_input" name="profile" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-full cursor-pointer bg-gray-50 mb-2" required>
                    <div class="flex gap-2">
                        <button type="submit" class="focus:outline-none w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-3 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">
                            Simpan
                        </button>
                        <button type="button" id="btnCencel" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-3 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
            <div class="xl:w-1/3 grid grid-cols-2 gap-8 content-center">
                <div>
                    <p class="font-normal text-sm text-gray-500">
                        Nama
                    </p>
                    <h6 class="font-semibold text-base">
                        <?= htmlspecialchars($data['name']) ?>
                    </h6>
                </div>
                <div>
                    <p class="font-normal text-sm text-gray-500">
                        Program Studi
                    </p>
                    <h6 class="font-semibold text-base">
                        <?= htmlspecialchars($data['prodi']) ?>
                    </h6>
                </div>
                <div>
                    <p class="font-normal text-sm text-gray-500">
                        NIM
                    </p>
                    <h6 class="font-semibold text-base">
                        <?= htmlspecialchars($data['nim']) ?>
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

        <form action="data-diri-proses" method="POST">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tempat Lahir
                    </label>
                    <input name="tempat_lahir" value="<?php echo htmlspecialchars($data['tempat_lahir'] ?? ''); ?>" type="text" id="tempat_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Tempat Lahir" required />
                </div>
                <div>
                    <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Jenis Kelamin
                    </label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" <?= htmlspecialchars($data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '') ?>>Laki-laki</option>
                        <option value="Perempuan" <?= htmlspecialchars($data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '') ?>>Perempuan</option>
                    </select>
                </div>
                <div>
                    <label for="datepicker-autohide" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tanggal Lahir
                    </label>
                    <div class="relative">
                        <input value="<?php echo htmlspecialchars($data['tgl_lahir'] ?? ''); ?>" name="tgl_lahir" id="datepicker-autohide" datepicker datepicker-format="dd-mm-yyyy" datepicker-autohide type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Select date">
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
                    <input name="no_tlp" value="<?php echo htmlspecialchars($data['no_tlp'] ?? ''); ?>" type="text" id="no_hp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nomor Hp Anda" required />
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#flow-1').click(function() {
            $('#flow-1').addClass('hidden');
            $('#flow-2').removeClass('hidden');
        });

        $('#btnCencel').click(function() {
            $('#flow-2').addClass('hidden');
            $('#flow-1').removeClass('hidden');
        });
    });
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/../../main.php";
?>