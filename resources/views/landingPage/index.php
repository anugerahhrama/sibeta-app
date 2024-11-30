<?php
$title = "Home Page";
ob_start();
?>

<?php require_once __DIR__ . "/layouts/navbar.php"; ?>

<section class="bg-white">
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

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#0F1F43" fill-opacity="1" d="M0,160L48,165.3C96,171,192,181,288,170.7C384,160,480,128,576,138.7C672,149,768,203,864,213.3C960,224,1056,192,1152,170.7C1248,149,1344,139,1392,133.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
</svg>
<section class="bg-[#0F1F43]">
    <div class="pb-8 px-4 mx-auto max-w-screen-xl lg:pb-28 lg:px-6 ">
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

<section class="bg-white">
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
                        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                            <span>What is Flowbite?</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
                            <p class="text-gray-500 dark:text-gray-400">Check out this guide to learn how to <a href="/docs/getting-started/introduction/" class="text-blue-600 dark:text-blue-500 hover:underline">get started</a> and start developing websites even faster with components on top of Tailwind CSS.</p>
                        </div>
                    </div>
                    <h2 id="accordion-collapse-heading-2">
                        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                            <span>Is there a Figma file available?</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
                            <p class="text-gray-500 dark:text-gray-400">Check out the <a href="https://flowbite.com/figma/" class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
                        </div>
                    </div>
                    <h2 id="accordion-collapse-heading-3">
                        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
                            <span>What are the differences between Flowbite and Tailwind UI?</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                        <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">The main difference is that the core components from Flowbite are open source under the MIT license, whereas Tailwind UI is a paid product. Another difference is that Flowbite relies on smaller and standalone components, whereas Tailwind UI offers sections of pages.</p>
                            <p class="mb-2 text-gray-500 dark:text-gray-400">However, we actually recommend using both Flowbite, Flowbite Pro, and even Tailwind UI as there is no technical reason stopping you from using the best of two worlds.</p>
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these technologies:</p>
                            <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">
                                <li><a href="https://flowbite.com/pro/" class="text-blue-600 dark:text-blue-500 hover:underline">Flowbite Pro</a></li>
                                <li><a href="https://tailwindui.com/" rel="nofollow" class="text-blue-600 dark:text-blue-500 hover:underline">Tailwind UI</a></li>
                            </ul>
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

<footer class="bg-[#0F1F43]">
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
                                support@polinema.ac.id
                            </a>
                        </li>
                        <li>
                            <a href="" class="hover:underline">
                                tugasakhir@polinema.ac.id
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
        <div class="sm:flex sm:items-center sm:justify-between">
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