<?php
/**
 * siWibu — satu-satunya pintu masuk.
 *
 * Semua permintaan diarahkan ke sini oleh .htaccess, kecuali berkas yang
 * memang ada di disk (gambar, css, js). Tidak ada berkas PHP lain yang boleh
 * dipanggil langsung dari luar.
 */

require __DIR__ . '/app/config/config.php';

// Dipasang paling awal — sebelum ada kode lain yang berpeluang gagal.
require __DIR__ . '/app/core/Galat.php';
Galat::pasang();

require __DIR__ . '/app/core/Cache.php';
/* Dimuat sebelum apa pun menggambar halaman: aset() memanggilnya untuk setiap
   tautan skrip dan gaya, dan yang dipanggil sebelum kelasnya ada akan diam-diam
   mundur ke berkas sumber — komentar dan semuanya. */
require __DIR__ . '/app/core/Aset.php';
require __DIR__ . '/app/core/ApiClient.php';
require __DIR__ . '/app/core/Visitor.php';
require __DIR__ . '/app/core/Sesi.php';
require __DIR__ . '/app/core/Klien.php';
require __DIR__ . '/app/core/Kapca.php';
require __DIR__ . '/app/core/Controller.php';
/* Halaman statis dimuat SELALU, bukan cuma saat rutenya dibuka: footer di setiap
   halaman memanggil Halaman::daftar() untuk deret tautan hukumnya. Dimuat cuma
   saat rutenya cocok, footer di halaman mana pun yang lain melempar Error dan
   menjatuhkan seluruh halaman — persis di bagian yang paling tidak dicurigai. */
require __DIR__ . '/app/controllers/Halaman.php';
require __DIR__ . '/app/core/App.php';

(new App())->jalankan();
