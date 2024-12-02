<?php
$title = "Registrasi";
ob_start();
?>

<header>
  <nav class="navbar">
    <img src="public/assets/img/landingPage/lambang-polinema1 1.svg" alt="Lambang Polinema" class="logo-polinema">
    <img src="public/assets/img/landingPage/Jti_polinema.svg 1.svg" alt="Lambang Jurusan Teknologi Informasi" class="logo-jti">
    <a href="#" class="logo">
      <span class="si">SI</span>
      <span class="minus">-</span>
      <span class="beta">BETA</span>
    </a>
    <div class="right">
      <a href="/src/landing-page.html#beranda">Beranda</a>
      <a href="/src/landing-page.html#fitur">Fitur</a>
      <a href="/src/landing-page.html#faq">FAQ</a>
      <a href="/src/landing-page.htmll#tentang-kami">Tentang Kami</a>
      <img src="public/assets/img/landingPage/GarisLurus.svg" alt="garis-lurus" class="garis-lurus">
      <div class="akun">
        <a href="registrasi" class="daftar">Daftar</a>
        <a href="login" class="masuk">Masuk</a>
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
                <img src="/Public/img/GedungSipil.svg" alt="Gambar Gedung Sipil" class="w-full h-full object-cover rounded-lg ">
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
                                <option value='<?= $row['id']?>'><?= $row['name']?></option>
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