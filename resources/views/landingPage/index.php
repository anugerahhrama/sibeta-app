<?php
$title = "Home Page";
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
      <a href="#beranda">Beranda</a>
      <a href="#fitur">Fitur</a>
      <a href="#faq">FAQ</a>
      <a href="#tentang-kami">Tentang Kami</a>
      <img src="public/assets/img/landingPage/GarisLurus.svg" alt="garis-lurus" class="garis-lurus">
      <div class="akun">
        <a href="/src/register.php#register" class="daftar">Daftar</a>
        <a href="login" class="masuk">Masuk</a>
      </div>
    </div>
  </nav>
</header>
<section class="hero-1" id="beranda">
  <div class="konten-1">
    <div class="text">
      <h2>Sistem Informasi</h2>
      <h2 class="row-2">Bebas Tanggungan Tugas Akhir</h2><br>
    </div>
    <h2 class="poltek">Politeknik Negeri Malang</h2>
    <p>Sistem Informasi Bebas Tanggungan Tugas Akhir adalah platform digital yang memudahkan mahasiswa Politeknik Negeri Malang dalam mengurus persyaratan kelulusan terkait bebas tanggungan akademik dan administrasi secara online.</p>
    <a href="/src/login.html" class="tombol-masuk">Masuk <i class="fa-solid fa-chevron-right" style="font-size: 0.7em;"></i></a>
  </div>
  <img src="public/assets/img/landingPage/GedungSipil.svg" alt="">
</section>
<img src="public/assets/img/landingPage/wave.svg" alt="" class="pembatas-wave">
<section class="hero-2" id="fitur">
  <h2 class="judul">Fitur Utama</h2>
  <div class="card-container">
    <div class="card">
      <img src="public/assets/img/landingPage/Internet.svg" alt="">
      <h2>Pengajuan dan Upload Online</h2>
      <p>Mahasiswa dapat mengajukan bebas tanggungan dan mengunggah dokumen persyaratan secara online dengan mudah.</p>
    </div>
    <div class="card">
      <img src="public/assets/img/landingPage/Timer.svg" alt="">
      <h2>Pemantauan Status Pengajuan Real-Time</h2>
      <p>Memantau status pengajuan secara langsung dan mendapatkan notifikasi pembaruan secara otomatis.</p>
    </div>
    <div class="card">
      <img src="public/assets/img/landingPage/Printer.svg" alt="">
      <h2>Pengajuan dan Upload Online</h2>
      <p>Mahasiswa dapat mencetak formulir bebas tanggungan yang telah disetujui dan mengunggah sebagai bukti persyaratan kelulusan.</p>
    </div>
  </div>
</section>
<section class="hero-3" id="faq">
  <div class="content-wrapper">
    <img src="public/assets/img/landingPage/aulaJTI.svg" alt="">
    <div class="konten-3">
      <h2>Pertanyaan Seputar</h2>
      <h2>Bebas Tanggungan TA</h2>
      <div class="qna-item">
        <div class="question">
          Apa itu Sistem Bebas Tanggungan Tugas Akhir?
          <i class="fa-solid fa-chevron-right"></i>
        </div>
        <div class="answer">
          <p>Sistem Bebas Tanggungan Tugas Akhir adalah sistem di Jurusan Teknologi Informasi, Politeknik Negeri Malang yang bertujuan untuk memudahkan proses verifikasi bebas tanggungan bagi mahasiswa yang akan menyelesaikan tugas akhir. Proyek ini bertujuan meningkatkan efisiensi operasional, akurasi data, dan mengurangi kesalahan akibat pengelolaan manual dalam proses administratif Tugas Akhir di Jurusan Teknologi Informasi Politeknik Negeri Malang.
          </p>
        </div>
      </div>
      <div class="qna-item">
        <div class="question">
          Bagaimana proses mengajukan bebas tanggungan tugas akhir?
          <i class="fa-solid fa-chevron-right"></i>
        </div>
        <div class="answer">
          <p>
            Alur Pengajuan Bebas Tanggungan Tugas Akhir
            -Mahasiswa login menggunakan akun yang sudah terdaftar atau membuat akun baru.
            - Melengkapi Data Diri. Pastikan data diri seperti NIM, program studi, dan informasi kontak telah diisi dengan benar.
            - Mahasiswa mengunggah file persyaratan melalui menu pengajuan.
            - Admin memeriksa kelengkapan dan validitas dokumen. Jika ada kekurangan, mahasiswa akan diminta melengkapi.
            - Setelah dokumen dinyatakan lengkap, admin menyetujui pengajuan sehingga bukti surat bebas tanggungan dapat diunduh kemudian diserahkan langsung oleh admin program studi.
          </p>
        </div>
      </div>
      <div class="qna-item">
        <div class="question">
          Dokumen apa saja yang perlu diunggah?
          <i class="fa-solid fa-chevron-right"></i>
        </div>
        <div class="answer">
          <p>Dokumen yang perlu diunggah yaitu :

            Laporan Tugas Akhir/Skripsi
            Program Aplikasi Tugas Akhir/Skripsi
            Surat Pernyataan Publikasi (Jurnal/Paper/Conference/HAKI/dll)
            Distribusi Buku Skripsi/Laporan Akhir
            Distribusi Laporan Magang/PKL
            Scan TOEIC</p>
        </div>
      </div>
      <div class="qna-item">
        <div class="question">
          Berapa lama waktu yang dibutuhkan untuk proses persetujuan?
          <i class="fa-solid fa-chevron-right"></i>
        </div>
        <div class="answer">
          <p>Proses persetujuan biasanya memakan waktu kurang lebih maks 2x24 jam dan tergantung pada kelengkapan dokumen yang diunggah</p>
        </div>
      </div>
    </div>
    <div class="float-element">
      <p>Ada pertanyaan lain? Kirim lewat email kami</p>
      <a href="">Email Pusat Bantuan</a>
    </div>
  </div>
</section>


<section class="hero-4" id="tentang-kami">
  <div class="konten-4">
    <div class="left">
      <div class="image">
        <img src="public/assets/img/landingPage/lambang-polinema1 1.svg" alt="">
        <img src="public/assets/img/landingPage/Jti_polinema.svg 1.svg" alt="">
        <a href="#" class="logo">
          <span class="si">SI</span>
          <span class="minus">-</span>
          <span class="beta">BETA</span>
        </a>
      </div>
      <div class="text">
        <p>Politeknik Negeri Malang,</p>
        <p>Jalan Soekarno-Hatta No.9</p>
        <p>Jatimulyo, Kecamatan Lowokwaru, Malang,</p>
        <p>Kode Poss : 65141,</p>
        <p>Jawa Timur - Indonesia</p>
      </div>
      <div class="sosmed">
        <h2>Media Sosial</h2>
        <div class="sosmed-img">
          <img src="public/assets/img/landingPage/skill-icons_instagram.svg" alt="">
          <img src="public/assets/img/landingPage/logos_facebook.svg" alt="">
          <img src="public/assets/img/landingPage/logos_twitter.svg" alt="">
          <img src="public/assets/img/landingPage/logos_youtube-icon.svg" alt="">
        </div>
      </div>
    </div>
    <img src="public/assets/img/landingPage/Line 2.svg" alt="" class="vertical-row">
    <div class="footer-right">
      <div class="r-row-1">
        <div class="kontenke-1">
          <h2>Layanan Bebas Tanggungan</h2>
          <p>Alur Pengajuan</p>
          <p>Cek Status</p>
          <p>Unduh Template</p>
        </div>
        <div class="kontenke-3">
          <h2>Informasi Kontak</h2>
          <p>support@polinema.ac.id</p>
          <p>tugasakhir@polinema.ac.id</p>
          <p>(+62) 341-404424</p>
        </div>
      </div>
      <div class="r-row-2">
        <div class="kontenke-2">
          <h2>Jadwal Layanan</h2>
          <p>Senin - Jumat: 08:00 - 16:00 WIB</p>
          <p>Sabtu - Minggu: Tutup</p>
        </div>
      </div>
    </div>
  </div>
</section>
<footer class="footer">
  <p><i class="fa-regular fa-copyright"></i> 2024 Kelompok 2. All rights reserved.</p>
  <div class="mini-konten">
    <p>Kebijakan Privasi</p>
    <img src="public/assets/img/landingPage/Line 3.svg" alt="">
    <p>Syarat & Ketentuan</p>
    <img src="public/assets/img/landingPage/Line 3.svg" alt="">
    <p>Versi 1.0.0</p>
  </div>
</footer>

<script src="/src/js/navbar.js"></script>


<?php
$content = ob_get_clean();
require_once __DIR__ . "/../mainLandingPage.php";
?>