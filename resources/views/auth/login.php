<?php
$title = "Login";
ob_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Ambil input dari form dengan validasi
  $email = htmlspecialchars($_POST['email'] ?? '');
  $password = htmlspecialchars($_POST['password'] ?? '');

  // Validasi input kosong
  if (empty($email) || empty($password)) {
      echo "Email dan password wajib diisi.";
      exit;
  }

  // Query untuk mencari user berdasarkan email
  $sql = "SELECT id, password FROM Users WHERE email = ?";
  $params = array($email);
  $stmt = sqlsrv_query($conn, $sql, $params);

  // Jika query gagal
  if ($stmt === false) {
      die(print_r(sqlsrv_errors(), true));
  }

  // Jika user ditemukan
  if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
      // Verifikasi password
      if (password_verify($password, $row['password'])) {
          // Set session
          $_SESSION['user_id'] = $row['id'];
          echo "Login berhasil! Redirecting...";
          header("Location: http://localhost/src/dashboard.html"); // Ubah ke halaman setelah login
          exit;
      } else {
          echo "Password salah.";
      }
  } else {
      echo "Email tidak ditemukan.";
  }

  // Tutup statement
  sqlsrv_free_stmt($stmt);
}

// Tutup koneksi
sqlsrv_close($conn);
?>


<header>
        <nav class="navbar">
            <img src="/Public/img/lambang-polinema1 1.svg" alt="Lambang Polinema" class="logo-polinema">
            <img src="/Public/img/Jti_polinema.svg 1.svg" alt="Lambang Jurusan Teknologi Informasi" class="logo-jti">
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
                <img src="/Public/img/GarisLurus.svg" alt="garis-lurus" class="garis-lurus">
                <div class="akun">
                    <a href="/src/register.php" class="daftar">Daftar</a>
                    <a href="#login" class="masuk">Masuk</a>
                </div>
            </div>
        </nav>
    </header>

    <section id="login" class="h-screen flex items-center justify-center" style="background-image: linear-gradient(rgba(255, 255, 255, 0.97), rgba(255, 255, 255, 0.97)), url(/Public/img/topography.svg); background-size: cover; background-repeat: no-repeat;">
        <!-- Hero utama -->
        <div class="flex flex-row overflow-hidden mt-40 mb-20 gap-8  justify-center items-center">
          <!-- Bagian gambar -->
          <div class="w-1/2 h-full m-10 rounded-lg">
            <img src="/Public/img/GedungSipil.svg" alt="Gambar Gedung Sipil" class="h-full w-full object-cover">
          </div>
        
          <!-- Bagian form -->
          <div class="w-1/2 p-10 flex flex-col justify-center bg-white rounded-lg shadow-lg m-10 h-full py-20">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang Kembali ^ ^</h2>
            <p class="text-gray-600 mb-6">Silahkan masuk dengan akunmu!</p>
            <form action="/src/php/handleLogin.php" method="POST" class="space-y-4">
              <!-- Input email -->
              <div class="relative">
                    <i class="fa-solid fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-[#0F1F43]"></i>
                        <input type="email" id="email" placeholder="Masukkan email" name="email"
                        class="w-full px-4 pl-10 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FEBF10] focus:outline-none bg-[#DDDDDD] placeholder-[#0F1F43]">
                    </div>
              <!-- Input password -->
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
              <!-- Checkbox dan link -->
              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <input type="checkbox" id="remember" class="text-[#FEBF10]">
                  <label for="remember" class="ml-2 text-gray-700">Ingat saya</label>
                </div>
                <a href="#" class="text-[#FEBF10] hover:underline text-sm">Lupa kata sandi?</a>
              </div>
              <!-- Tombol login -->
              <button type="submit"
                      class="w-full bg-[#FEBF10] text-white py-2 rounded-lg font-semibold hover:bg-[#FEBF10] transition">Masuk</button>
            </form>
            <!-- Link daftar -->
            <p class="mt-6 text-center text-gray-600 text-sm mb-7 font-bold">Belum punya akun? 
              <a href="/src/register.php" class="text-[#FEBF10] hover:underline">Daftar</a>
            </p>
          </div>
          <?php  
          ?>
        </div>
      </section>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/../main.php";
?>