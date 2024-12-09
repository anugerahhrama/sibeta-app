<?php
$title = "Home Page";
ob_start();
?>


<nav class="fixed bg-white shadow-lg mb-12 w-screen z-10 top-0 left-0">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <div class="flex gap-5">
            <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="public/assets/img/landingPage/header-1.svg" class="h-10" alt="Flowbite Logo" />
            </a>
            <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="public/assets/img/landingPage/header-2.svg" class="h-8" alt="Flowbite Logo" />
            </a>
            <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="public/assets/img/landingPage/header-3.svg" class="h-6" alt="Flowbite Logo" />
            </a>
        </div>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="#beranda" class="block py-2 px-3 text-gray-900 rounded hover:text-white hover:bg-[#0F1F43] md:hover:bg-transparent md:border-0 md:hover:text-[#FEBF10] md:p-0" aria-current="page">Beranda</a>
                </li>
                <li>
                    <a href="#fitur" class="block py-2 px-3 text-gray-900 rounded hover:text-white hover:bg-[#0F1F43] md:hover:bg-transparent md:border-0 md:hover:text-[#FEBF10] md:p-0">Fitur</a>
                </li>
                <li>
                    <a href="#faq" class="block py-2 px-3 text-gray-900 rounded hover:text-white hover:bg-[#0F1F43] md:hover:bg-transparent md:border-0 md:hover:text-[#FEBF10] md:p-0">FAQ</a>
                </li>
                <li>
                    <a href="#tentangkami" class="block py-2 px-3 text-gray-900 rounded hover:text-white hover:bg-[#0F1F43] md:hover:bg-transparent md:border-0 md:hover:text-[#FEBF10] md:p-0">Tentang Kami</a>
                </li>
                <li class="hidden md:block">
                    <hr class="w-px h-full bg-gray-400 border-0">
                </li>
                <li>
                    <a href="registrasi" class="block py-2 px-3 text-gray-900 rounded hover:text-white hover:bg-[#0F1F43]  md:border-0 md:hover:text-[#FFFFF] md:p-0">Daftar</a>
                </li>
                <li>
                    <a href="login" class="block py-2 px-3 text-gray-900 rounded hover:text-white hover:bg-[#0F1F43]  md:border-0 md:hover:text-[#FFFFF] md:p-0">Masuk</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section id="beranda" class="bg-[url('public/assets/img/landingPage/wavePutih.svg')] pt-[calc(4rem+1px)]">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl">
                Sistem Informasi
            </h1>
            <h1 class="max-w-3xl mb-4 text-3xl font-extrabold tracking-tight leading-none md:text-4xl xl:text-5xl text-[#FEBF10]">
                Bebas Tanggungan Tugas Akhir
            </h1>
            <div class="w-fit mb-8 px-6 py-2 rounded-full bg-[#F05529]">
                <p class="font-semibold font-2xl text-white">
                    Politeknik Negeri Malang
                </p>
            </div>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                Sistem Informasi Bebas Tanggungan Tugas Akhir adalah platform digital yang memudahkan mahasiswa Politeknik Negeri Malang dalam mengurus persyaratan kelulusan terkait bebas tanggungan akademik dan administrasi secara online.
            </p>
            <a href="#" class="inline-flex items-center justify-center px-6 py-2 mr-3 text-base font-medium text-center text-white rounded-full bg-[#0F1F43] hover:bg-[#0F1F43]/80 focus:ring-4 focus:ring-primary-300">
                Masuk
                <svg class="w-5 h-5 ml-2 -mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                </svg>
            </a>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <img src="public/assets/img/landingPage/hero.svg" class="h-auto max-w-full rounded-xl" alt="mockup">
        </div>
    </div>
</section>
<img src="public/assets/img/landingPage/wave.svg" alt="" class="relative -bottom-2">
<section id="fitur" class="bg-[url('public/assets/img/landingPage/waveBiru.svg')] pt-[calc(6rem+1px)]">
    <div class="pb-18 px-4 mx-auto max-w-screen-xl lg:pb-28 lg:px-6 ">
        <div class="mx-auto max-w-screen-full text-center mb-8 lg:mb-16">
            <div class="w-full rounded-full px-5 py-3 bg-[#FEBF10]">
                <p class="text-3xl font-extrabold tracking-tight leading-none md:text-4xl xl:text-5xl">
                    Fitur Utama
                </p>
            </div>
        </div>
        <div class="grid md:grid-cols-3 gap-12">
            <div class="flex flex-col p-10 rounded-3xl gap-6 bg-white">
                <img src="public/assets/img/landingPage/icon/fitur-1.svg" class="h-auto max-w-fit" alt="">
                <h5 class="font-semibold text-2xl">
                    Pengajuan dan Upload Online
                </h5>
                <p class="font-medium text-lg text-gray-500">
                    Mahasiswa dapat mengajukan bebas tanggungan dan mengunggah dokumen persyaratan secara online dengan mudah.
                </p>
            </div>
            <div class="flex flex-col p-10 rounded-3xl gap-6 bg-white">
                <img src="public/assets/img/landingPage/icon/fitur-2.svg" class="h-auto max-w-fit" alt="">
                <h5 class="font-semibold text-2xl">
                    Pemantauan Status Pengajuan Real-Time
                </h5>
                <p class="font-medium text-lg text-gray-500">
                    Memantau status pengajuan secara langsung dan mendapatkan notifikasi pembaruan secara otomatis.
                </p>
            </div>
            <div class="flex flex-col p-10 rounded-3xl gap-6 bg-white">
                <img src="public/assets/img/landingPage/icon/fitur-3.svg" class="h-auto max-w-fit" alt="">
                <h5 class="font-semibold text-2xl">
                    Cetak & Unggah Formulir Digital
                </h5>
                <p class="font-medium text-lg text-gray-500">
                    Mahasiswa dapat mencetak formulir bebas tanggungan yang telah disetujui dan mengunggah sebagai bukti persyaratan kelulusan.
                </p>
            </div>
        </div>
    </div>
</section>
<section id="faq" class="bg-[url('public/assets/img/landingPage/wavePutih.svg')] min-h-screen pb-16">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-28 lg:px-6 ">
        <div class="flex flex-col md:flex-row gap-16 mb-16">
            <div class="md:w-1/2">
                <img src="public/assets/img/landingPage/faq.svg" class="h-auto max-w-full" alt="">
            </div>
            <div class="md:w-1/2">
                <h1 class="max-w-lg mb-4 text-3xl font-extrabold tracking-tight leading-none md:text-4xl xl:text-5xl">
                    Pertanyaan seputar
                </h1>
                <h1 class="max-w-lg mb-14 text-3xl font-extrabold tracking-tight leading-none md:text-4xl xl:text-5xl text-[#FEBF10]">
                    Bebas Tanggungan TA
                </h1>
                <div id="accordion-collapse" data-accordion="collapse">
                    <h2 id="accordion-collapse-heading-1">
                        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 bg-white rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                            <span>Apa itu Sistem Bebas Tanggungan Tugas Akhir?</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                        <div class="p-5 border border-b-0 border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-900">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">
                                Sistem Bebas Tanggungan Tugas Akhir adalah sistem di Jurusan Teknologi Informasi, Politeknik Negeri Malang yang bertujuan untuk memudahkan proses verifikasi bebas tanggungan bagi mahasiswa yang akan menyelesaikan tugas akhir. Proyek ini bertujuan meningkatkan efisiensi operasional, akurasi data, dan mengurangi kesalahan akibat pengelolaan manual dalam proses administratif Tugas Akhir di Jurusan Teknologi Informasi Politeknik Negeri Malang.
                            </p>
                        </div>
                    </div>
                    <h2 id="accordion-collapse-heading-2">
                        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 bg-white focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                            <span>Bagaimana proses mengajukan bebas tanggungan tugas akhir?</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                        <div class="p-5 border border-b-0 border-gray-200 bg-white dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">
                                Alur Pengajuan Bebas Tanggungan Tugas Akhir:
                            </p>
                            <li class="mb-2 text-gray-500 dark:text-gray-400">
                                Mahasiswa login menggunakan akun yang sudah terdaftar atau membuat akun baru.
                            </li>
                            <li class="mb-2 text-gray-500 dark:text-gray-400">
                                Melengkapi Data Diri. Pastikan data diri seperti NIM, program studi, dan informasi kontak telah diisi dengan benar.
                            </li>
                            <li class="mb-2 text-gray-500 dark:text-gray-400">
                                Mahasiswa mengunggah file persyaratan melalui menu pengajuan.
                            </li>
                            <li class="mb-2 text-gray-500 dark:text-gray-400">
                                Admin memeriksa kelengkapan dan validitas dokumen. Jika ada kekurangan, mahasiswa akan diminta melengkapi.
                            </li>
                            <li class="mb-2 text-gray-500 dark:text-gray-400">
                                Setelah dokumen dinyatakan lengkap, admin menyetujui pengajuan sehingga bukti surat bebas tanggungan dapat diunduh kemudian diserahkan langsung oleh admin program studi.
                            </li>
                        </div>
                    </div>
                    <h2 id="accordion-collapse-heading-3">
                        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 bg-white focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
                            <span>Dokumen apa saja yang perlu diunggah?</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                        <div class="p-5 border border-t-0 border-gray-200 bg-white dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">
                                Dokumen yang perlu diunggah yaitu :
                            </p>
                            <li class="mb-2 text-gray-500 dark:text-gray-400">
                                Program Aplikasi Tugas Akhir/Skripsi.
                            </li>
                            <li class="mb-2 text-gray-500 dark:text-gray-400">
                                Surat Pernyataan Publikasi (Jurnal/Paper/Conference/HAKI/dll).
                            </li>
                            <li class="mb-2 text-gray-500 dark:text-gray-400">
                                Distribusi Buku Skripsi/Laporan Akhir.
                            </li>
                            <li class="mb-2 text-gray-500 dark:text-gray-400">
                                Scan TOEIC.
                            </li>
                        </div>
                    </div>
                    <h2 id="accordion-collapse-heading-4">
                        <button type="button" class="flex items-center justify-between w-full p-5 font-medium bg-white rtl:text-right text-gray-500 border border-b border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-4" aria-expanded="false" aria-controls="accordion-collapse-body-4">
                            <span>Berapa lama waktu yang dibutuhkan untuk proses persetujuan?</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-4" class="hidden" aria-labelledby="accordion-collapse-heading-4">
                        <div class="p-5 border border-b-0 border-gray-200 bg-white dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">
                                Proses persetujuan biasanya memakan waktu kurang lebih maks 2x24 jam dan tergantung pada kelengkapan dokumen yang diunggah
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row justify-center items-center gap-4 md:gap-8 w-full py-5 px-3 rounded-xl md:rounded-full bg-[#FEBF10]">
            <p class="font-medium text-lg text-center">
                Ada pertanyaan lain? Kirim lewat email kami
            </p>
            <a href="#" class="inline-flex items-center justify-center px-16 py-2 mr-3 text-base font-medium text-center text-white rounded-full bg-[#0F1F43] hover:bg-[#0F1F43]/80 focus:ring-4 focus:ring-primary-300">
                Email Pusat Bantuan
            </a>
        </div>
    </div>
</section>
<footer id="tentangkami" class="bg-[url('public/assets/img/landingPage/waveBiru.svg')]  mt-auto">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between gap-8 md:gap-16">
            <div class="mb-6 md:mb-0">
                <div class="flex gap-5 w-fit rounded-full px-10 py-4 bg-white mb-8">
                    <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <img src="public/assets/img/landingPage/header-1.svg" class="h-8" alt="Flowbite Logo" />
                    </a>
                    <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <img src="public/assets/img/landingPage/header-2.svg" class="h-6" alt="Flowbite Logo" />
                    </a>
                    <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <img src="public/assets/img/landingPage/header-3.svg" class="h-4" alt="Flowbite Logo" />
                    </a>
                </div>
                <p class="max-w-md font-medium text-base text-white">
                    Politeknik Negeri Malang,
                    Jalan Soekarno-Hatta No.9,Jatimulyo, Kecamatan Lowokwaru, Malang,
                    Kode Poss : 65141,Jawa Timur - Indonesia
                </p>
            </div>
            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                <div>
                    <h2 class="mb-6 text-base font-semibold text-white">
                        Bebas Tanggungan
                    </h2>
                    <ul class="text-white/80 text-sm font-medium">
                        <li class="mb-4">
                            <a href="" class="hover:underline">
                                Alur Pengajuan
                            </a>
                        </li>
                        <li>
                            <a href="" class="hover:underline">
                                Cek Status
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-base font-semibold text-white">
                        Informasi Kontak
                    </h2>
                    <ul class="text-white/80 text-sm font-medium">
                        <li class="mb-4">
                            <a href="" class="hover:underline ">
                                jti@polinema.ac.id
                            </a>
                        </li>
                        <li>
                            <a href="" class="hover:underline">
                                (0341) 404424404425
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-base font-semibold text-white">
                        Jadwal Layanan
                    </h2>
                    <ul class="text-white/80 text-sm font-medium">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">
                                Senin - Jumat: 08:00 - 16:00 WIB
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">
                                Sabtu - Minggu: Tutup
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <div id="tentangkami" class="sm:flex sm:items-center sm:justify-between">
            <span class="text-sm text-white/50 sm:text-center">
                © 2024 <a href="" class="hover:underline">SI-BETA™</a>. All Rights Reserved.
            </span>
            <div class="flex mt-4 sm:justify-center sm:mt-0">
                <a href="#" class="text-white/50 hover:text-white">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd" d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Instagram page</span>
                </a>
                <a href="#" class="text-white/50 hover:text-white ms-5">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Facebook page</span>
                </a>
                <a href="#" class="text-white/50 hover:text-white ms-5">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M22 5.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.343 8.343 0 0 1-2.605.981A4.13 4.13 0 0 0 15.85 4a4.068 4.068 0 0 0-4.1 4.038c0 .31.035.618.105.919A11.705 11.705 0 0 1 3.4 4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 6.1 13.635a4.192 4.192 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 2 18.184 11.732 11.732 0 0 0 8.291 20 11.502 11.502 0 0 0 19.964 8.5c0-.177 0-.349-.012-.523A8.143 8.143 0 0 0 22 5.892Z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Twitter page</span>
                </a>
                <a href="#" class="text-white/50 hover:text-white ms-5">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M21.7 8.037a4.26 4.26 0 0 0-.789-1.964 2.84 2.84 0 0 0-1.984-.839c-2.767-.2-6.926-.2-6.926-.2s-4.157 0-6.928.2a2.836 2.836 0 0 0-1.983.839 4.225 4.225 0 0 0-.79 1.965 30.146 30.146 0 0 0-.2 3.206v1.5a30.12 30.12 0 0 0 .2 3.206c.094.712.364 1.39.784 1.972.604.536 1.38.837 2.187.848 1.583.151 6.731.2 6.731.2s4.161 0 6.928-.2a2.844 2.844 0 0 0 1.985-.84 4.27 4.27 0 0 0 .787-1.965 30.12 30.12 0 0 0 .2-3.206v-1.516a30.672 30.672 0 0 0-.202-3.206Zm-11.692 6.554v-5.62l5.4 2.819-5.4 2.801Z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Youtube page</span>
                </a>
            </div>
        </div>
    </div>
</footer>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/../main.php";
?>