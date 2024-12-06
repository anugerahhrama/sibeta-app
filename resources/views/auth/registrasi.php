<?php
$title = "Registrasi";
ob_start();
?>

<header>
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
</header>

<!-- Section Register -->
<section id="register" class="h-screen flex items-center justify-center bg-cover bg-no-repeat"
    style="background-image: linear-gradient(rgba(255, 255, 255, 0.97), rgba(255, 255, 255, 0.97)), url('/Public/img/topography.svg');">
    <div class="flex flex-row overflow-hidden mt-40 mb-20 gap-16  justify-center items-center">
      
            <!-- Bagian Gambar -->
            <div class="w-1/2 h-full rounded-lg bg-center bg-contain">
                <img src="public/assets/img/landingPage/GedungSipil.svg" alt="Gambar Gedung Sipil" class="w-full h-full object-cover rounded-lg ">
            </div>

        <!-- Bagian Form -->
        <div class="w-1/2 p-10 flex flex-col justify-center bg-white rounded-2xl border">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Halo, Selamat Datang ^ ^</h2>
            <p class="text-gray-600 mb-6">Silahkan daftar untuk membuat akunmu!</p>
            <form action="registrasi-proses" class="space-y-4" method="post">
                <!-- Input Nama -->
                <div class="relative">
                    <i class="fa-solid fa-circle-user absolute left-3 top-1/2 transform -translate-y-1/2 text-[#0F1F43]"></i>
                    <input type="text" id="name" placeholder="Masukkan Nama" name="nama"
                        class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FEBF10] focus:outline-none bg-[#DDDDDD] placeholder-[#0F1F43]">
                </div>


                <!-- Input nim -->
                <div class="relative">
                    <i class="fa-solid fa-id-card absolute left-3 top-1/2 transform -translate-y-1/2 text-[#0F1F43]"></i>
                    <input type="text" id="name" placeholder="Masukkan NIM" name="nim"
                        class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FEBF10] focus:outline-none bg-[#DDDDDD] placeholder-[#0F1F43]">
                </div>

                <!-- Input email -->
                <div class="relative">
                    <i class="fa-solid fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-[#0F1F43]"></i>
                    <input type="email" id="email" placeholder="Masukkan email" name="email"
                        class="w-full px-4 pl-10 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FEBF10] focus:outline-none bg-[#DDDDDD] placeholder-[#0F1F43]">
                </div>
                <!-- Input Password -->
                <div>
                    <div class="relative">
                        <i class="fa-solid fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-[#0F1F43]"></i>
                        <input type="password" id="password" placeholder="Masukkan password" name="password"
                            maxlength="20" class="w-full px-4 pl-10 py-2 pr-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FEBF10] focus:outline-none bg-[#DDDDDD] placeholder-[#0F1F43]">
                        <button type="button" id="togglePassword" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500">
                            <!-- Ikon Mata -->
                            <i id="passwordIcon" class="fa-solid fa-eye-slash"></i>
                        </button>
                    </div>
                    <small id="passwordError" class="text-red-500 hidden">Password terlalu panjang!</small>
                </div>

                <script>
                    // Ambil elemen
                    const passwordInput = document.getElementById("password");
                    const togglePasswordButton = document.getElementById("togglePassword");
                    const passwordIcon = document.getElementById("passwordIcon");
                    const passwordError = document.getElementById("passwordError");

                    // Tambahkan event listener untuk toggle
                    togglePasswordButton.addEventListener("click", () => {
                        // Pastikan password panjangnya sesuai batasan
                        if (passwordInput.value.length > 20) {
                            passwordError.classList.remove("hidden"); // Tampilkan error
                            return; // Jangan toggle password
                        } else {
                            passwordError.classList.add("hidden"); // Sembunyikan error
                        }

                        // Toggle antara "password" dan "text"
                        const currentType = passwordInput.getAttribute("type");
                        const newType = currentType === "password" ? "text" : "password";
                        passwordInput.setAttribute("type", newType);

                        // Ganti ikon mata
                        passwordIcon.classList.toggle("fa-eye");
                        passwordIcon.classList.toggle("fa-eye-slash");
                    });

                    // Tambahkan validasi untuk panjang password
                    passwordInput.addEventListener("input", () => {
                        if (passwordInput.value.length > 20) {
                            passwordError.classList.remove("hidden");
                        } else {
                            passwordError.classList.add("hidden");
                        }
                    });
                </script>


                <!-- Inpuyt Prodi -->
                <div class="relative">
                    <!-- Ikon di dalam input -->
                    <i class="fa-solid fa-graduation-cap absolute left-3 top-1/2 transform -translate-y-1/2 text-[#0F1F43]"></i>
                    <!-- Select prodi -->
                    <select name="prodi_id" id="prodi"
                        class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FEBF10] focus:outline-none bg-[#DDDDDD] placeholder-[#0F1F43]">
                        <?php foreach ($prodi as $key => $row) { ?>
                            <option value='<?= $row['id'] ?>'><?= $row['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <!-- Tombol Login -->
                <button type="submit" class="w-full bg-[#FEBF10] text-white py-2 rounded-lg font-semibold hover:bg-[#F5A500] transition">
                    Daftar
                </button>
            </form>

            <!-- Link Daftar -->
            <p class="mt-6 text-center text-gray-600 text-sm font-bold">
                Sudah punya akun?
                <a href="/src/login.html" class="text-[#FEBF10] hover:underline">Masuk</a>
            </p>
        </div>

    </div>
</section>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/../main.php";
?>