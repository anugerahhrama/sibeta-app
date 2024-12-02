<?php
$currentUrl = $_SERVER['REQUEST_URI'];
?>

<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
</button>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-[#0F1F43] dark:bg-gray-800">
        <div class="flex gap-5 w-fit rounded-full px-5 py-3 bg-white">
            <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="<?= BASE_URL ?>/public/assets/img/landingPage/header-3.svg" class="h-4" alt="Flowbite Logo" />
            </a>
        </div>
        <hr class="border-white sm:mx-auto lg:my-4" />
        <ul class="space-y-2 font-medium">
            <li>
                <a href="beranda" class="<?php echo str_contains($currentUrl, 'admin/beranda') ? 'text-[#0F1F43] bg-[#FEBF10]' : 'text-white hover:text-[#0F1F43] hover:bg-[#FEBF10]'; ?> flex rounded-lg items-center p-2 group">
                    <svg class="w-6 h-6 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M4.857 3A1.857 1.857 0 0 0 3 4.857v4.286C3 10.169 3.831 11 4.857 11h4.286A1.857 1.857 0 0 0 11 9.143V4.857A1.857 1.857 0 0 0 9.143 3H4.857Zm10 0A1.857 1.857 0 0 0 13 4.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 21 9.143V4.857A1.857 1.857 0 0 0 19.143 3h-4.286Zm-10 10A1.857 1.857 0 0 0 3 14.857v4.286C3 20.169 3.831 21 4.857 21h4.286A1.857 1.857 0 0 0 11 19.143v-4.286A1.857 1.857 0 0 0 9.143 13H4.857Zm10 0A1.857 1.857 0 0 0 13 14.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 21 19.143v-4.286A1.857 1.857 0 0 0 19.143 13h-4.286Z" clip-rule="evenodd" />
                    </svg>
                    <span class="ms-3">
                        Beranda
                    </span>
                </a>
            </li>
            <li>
                <a href="<?= $router->route('pengguna') ?>" class="<?php echo str_contains($currentUrl, 'admin/pengguna') ? 'text-[#0F1F43] bg-[#FEBF10]' : 'text-white hover:text-[#0F1F43] hover:bg-[#FEBF10]' ?> flex rounded-lg items-center p-2 group">
                    <svg class="w-6 h-6 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z" clip-rule="evenodd" />
                    </svg>
                    <span class="ms-3">
                        Pengguna
                    </span>
                </a>
            </li>
            <li>
                <a href="<?= $router->route('pengajuan') ?>" class="<?php echo str_contains($currentUrl, 'admin/pengajuan') ? 'text-[#0F1F43] bg-[#FEBF10]' : 'text-white hover:text-[#0F1F43] hover:bg-[#FEBF10]' ?> flex rounded-lg items-center p-2 group">
                    <svg class="w-6 h-6 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v6.41A7.5 7.5 0 1 0 10.5 22H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M9 16a6 6 0 1 1 12 0 6 6 0 0 1-12 0Zm6-3a1 1 0 0 1 1 1v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 1 1 0-2h1v-1a1 1 0 0 1 1-1Z" clip-rule="evenodd" />
                    </svg>
                    <span class="ms-3">
                        Pengajuan
                    </span>
                </a>
            </li>
            <li>
                <a href="tanggungan" class="<?php echo $currentUrl === '/sibeta-app/tanggungan' ? 'text-[#0F1F43] bg-[#FEBF10]' : 'text-white hover:text-[#0F1F43] hover:bg-[#FEBF10]' ?> flex rounded-lg items-center p-2 group">
                    <svg class="w-6 h-6 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd" />
                    </svg>
                    <span class="ms-3">
                        Status Tanggungan
                    </span>
                </a>
            </li>
            <li>
                <a href="bantuan" class="<?php echo $currentUrl === '/sibeta-app/bantuan' ? 'text-[#0F1F43] bg-[#FEBF10]' : 'text-white hover:text-[#0F1F43] hover:bg-[#FEBF10]' ?> flex rounded-lg items-center p-2 group">
                    <svg class="w-6 h-6 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.008-3.018a1.502 1.502 0 0 1 2.522 1.159v.024a1.44 1.44 0 0 1-1.493 1.418 1 1 0 0 0-1.037.999V14a1 1 0 1 0 2 0v-.539a3.44 3.44 0 0 0 2.529-3.256 3.502 3.502 0 0 0-7-.255 1 1 0 0 0 2 .076c.014-.398.187-.774.48-1.044Zm.982 7.026a1 1 0 1 0 0 2H12a1 1 0 1 0 0-2h-.01Z" clip-rule="evenodd" />
                    </svg>
                    <span class="ms-3">
                        Bantuan
                    </span>
                </a>
            </li>
        </ul>
    </div>
</aside>