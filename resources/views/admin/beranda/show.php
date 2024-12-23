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

        <?php require_once __DIR__ . "/../layouts/profileBtn.php"; ?>
    </div>


    <div class="p-6 border-2 rounded-3xl mb-8">
        <h1 class="font-semibold text-lg">
            Profil Mahasiswa
        </h1>
        <hr class="border sm:mx-auto lg:my-4" />
        <div class="flex flex-col md:flex-row gap-x-24">
            <div class="flex flex-col justify-center items-center gap-4">
                <img src="<?= BASE_URL ?>public/assets/img/user/profile.svg" class="h-auto max-w-full" alt="">
                <button type="button" class="w-full text-white bg-[#0F1F43] hover:bg-[#0F1F43]/80 focus:ring-4 focus:ring-[#0F1F43] font-medium rounded-full text-sm px-5 py-2.5 mb-2 focus:outline-none">
                    Ubah Foto
                </button>
            </div>
            <div class="xl:w-1/2 grid grid-cols-2 gap-8 content-center">
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

    <div class="p-6 border-2 rounded-3xl mb-8">
        <h1 class="font-semibold text-lg mb-4">
            Proses Verifikasi
        </h1>

        <form action="<?= BASE_URL ?>admin/beranda/<?= $data['id'] ?>/update" method="post">
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
                        <?php foreach ($data['submission_data'] as $key => $row) { ?>
                            <tr class="bg-white">
                                <td class="px-6 py-2 border">
                                    <div class="flex items-center gap-x-4">
                                        <svg class="w-6 h-6 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m4 8h6m-6-4h6m4-8v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                                        </svg>
                                        <a href="<?= htmlspecialchars(BASE_URL . 'public/assets/submission/' . $row['path']) ?>" class="text-blue-400 hover:underline" target="_blank">
                                            <?= htmlspecialchars($row['path']) ?>
                                        </a>
                                    </div>
                                </td>
                                <td class="px-6 py-2 border text-center">
                                    <?= date('d-m-Y', strtotime(htmlspecialchars($row['tgl_pengajuan']))) ?>
                                </td>
                                <td class="px-6 py-2 border text-center">
                                    <?= !empty($row['tgl_verifikasi']) ? date('d-m-Y', strtotime(htmlspecialchars($row['tgl_verifikasi']))) : '-' ?>
                                </td>
                                <td class="px-6 py-2 border">
                                    <div class="flex justify-center">
                                        <select id="statusSelect<?= htmlspecialchars($row['id']) ?>" name="status[]" class="px-5 p-2.5 rounded-full w-full text-center bg-white text-black appearance-none cursor-pointer" onchange="updateBackgroundColor(<?= htmlspecialchars($row['id']) ?>)">
                                            <option value="0" <?= $row['status'] == '0' ? 'selected' : '' ?> class="bg-white text-black">Menunggu</option>
                                            <option value="1" <?= $row['status'] == '1' ? 'selected' : '' ?> class="bg-white text-black">Diterima</option>
                                            <option value="2" <?= $row['status'] == '2' ? 'selected' : '' ?> class="bg-white text-black">Ditolak</option>
                                        </select>
                                        <input type="text" name="sub_id[]" value="<?= $row['form_id'] ?>" class="hidden">
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <h1 class="font-semibold text-lg mb-4">
                Catatan
            </h1>
            <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-2xl border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Catatan ditampilkan disini..."></textarea>
            <div class="flex justify-end space-x-2 mt-16">
                <a href="<?= $router->route('admin/beranda.index') ?>" class="font-medium text-base text-grey px-6 py-2.5 bg-transparent border border-[#5B5B5B] rounded-2xl">
                    kembali
                </a>

                <button type="submit" class="font-medium text-base text-white px-6 py-2.5 bg-[#FEBF10] hover:bg-[#F5A500] rounded-2xl focus:ring-4 focus:ring-[#FEBF10]">
                    Simpan
                </button>
            </div>
        </form>
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

<script>
    function updateBackgroundColor(id) {
        const selectElement = document.getElementById('statusSelect' + id);
        const selectedValue = selectElement.value;

        // Reset styles
        selectElement.style.backgroundColor = 'white';
        selectElement.style.color = 'black';
        selectElement.style.borderColor = 'transparent';

        // Set background color based on selected value
        if (selectedValue === '1') {
            selectElement.style.backgroundColor = '#198754'; // Hijau
            selectElement.style.color = 'white';
        } else if (selectedValue === '2') {
            selectElement.style.backgroundColor = '#DC3545'; // Merah
            selectElement.style.color = 'white';
        } else if (selectedValue === '0') {
            selectElement.style.backgroundColor = 'white'; // Putih
            selectElement.style.color = '#6c757d'; // Abu-abu
            selectElement.style.borderColor = '#6c757d'; // Border abu-abu
        }
    }

    // Call updateBackgroundColor for each select element on page load
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('[id^="statusSelect"]').forEach(selectElement => {
            const id = selectElement.id.replace('statusSelect', '');
            updateBackgroundColor(id);
        });
    });
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/../../main.php";
?>