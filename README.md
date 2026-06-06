# Sistem Pengaduan Fasilitas Kampus (Helpdesk CI4) 🚀

Sistem Pengaduan Fasilitas Kampus adalah aplikasi web berbasis CodeIgniter 4 yang memfasilitasi mahasiswa dalam melaporkan kerusakan fasilitas di lingkungan kampus. Proyek ini menggunakan arsitektur MVC (Model-View-Controller) dan dikembangkan sebagai tugas kolaboratif pengembangan web.


## Persyaratan Sistem

Pastikan komputer yang digunakan sudah terpasang perangkat lunak berikut sebelum mulai pengerjaan:

1. XAMPP atau Laragon untuk menjalankan server Apache dan MySQL secara lokal.
2. Composer untuk mengelola pustaka PHP CodeIgniter.
3. Git Bash atau Command Prompt untuk menjalankan perintah berbasis teks.

---

## Panduan Menjalankan Proyek Secara Lokal

Bagi anggota tim yang baru pertama kali mengunduh kode dari repositori ini, ikuti instruksi di bawah ini secara berurutan agar aplikasi dapat berjalan dengan normal di komputer masing-masing.

### 1. Mengunduh Repositori
Buka terminal aplikasi Git Bash atau Command Prompt di dalam direktori `htdocs` (jika menggunakan XAMPP) atau `www` (jika menggunakan Laragon). Ketik perintah `git clone` diikuti dengan tautan URL repositori GitHub proyek ini (bisa disalin melalui tombol hijau 'Code' di GitHub), kemudian tekan enter. Setelah proses pengunduhan selesai, masuk ke dalam direktori proyek dengan mengetik perintah `cd helpdesk-kampus`.
Atau bisa juga langsung clone dari VSCode nya

### 2. Menginstal Pustaka CodeIgniter
Pustaka inti dari CodeIgniter tidak diunggah ke GitHub untuk menghemat ruang dan mencegah repositori menjadi berat. Jalankan perintah `composer install` pada terminal untuk mengunduh seluruh berkas pustaka yang dibutuhkan secara otomatis.

### 3. Mengatur Konfigurasi Lingkungan
Cari berkas bernama `env.example` di dalam direktori utama proyek. Salin berkas tersebut dan ubah nama salinannya menjadi `.env`. Buka berkas `.env` tersebut menggunakan teks editor. Cari bagian `CI_ENVIRONMENT` dan ubah nilainya menjadi `development`. Selanjutnya, gulir ke bagian konfigurasi basis data dan sesuaikan nilainya menjadi seperti berikut:

```ini
database.default.hostname = localhost
database.default.database = db_helpdesk
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi

### 4. Menyiapkan Basis Data Kosong
Buka panel kontrol XAMPP atau Laragon dan jalankan layanan MySQL. Buka peramban web dan akses halaman localhost/phpmyadmin. Buat sebuah basis data baru dengan nama persis seperti yang tertulis di konfigurasi sebelumnya, yaitu db_helpdesk. Biarkan basis data tersebut kosong tanpa membuat tabel apa pun secara manual.

**5. Mengeksekusi Migrasi Basis Data**
Kembali ke terminal yang masih berada di dalam direktori proyek. Jalankan perintah php spark migrate untuk mengeksekusi skrip pembuat tabel. Perintah ini akan secara otomatis membuatkan seluruh struktur tabel beserta relasinya di dalam basis data lokal.

**6. Menjalankan Server Lokal**
Jalankan perintah php spark serve pada terminal untuk menghidupkan server pengembangan CodeIgniter. Buka peramban web dan ketikkan alamat http://localhost:8080 untuk melihat tampilan aplikasi yang sudah berjalan.

**### Panduan Membuat Ruang Kerja (Branch) Baru di Git**
Sebelum mulai mengetik baris kode apa pun untuk proyek sistem pengaduan kita, Kita harus selalu membuat ruang kerja terpisah yang disebut dengan branch agar kode utama tidak rusak jika terjadi kesalahan. Langkah pertama yang paling krusial sebelum membuat ruang kerja baru adalah memastikan komputer kalian memiliki versi kode yang paling baru. Silakan buka terminal dan ketik perintah "git checkout main" untuk kembali ke jalur utama, lalu segera lanjutkan dengan mengetik "git pull origin main" untuk mengunduh semua pembaruan terakhir dari internet ke komputer kalian.

Setelah proses pengunduhan pembaruan tersebut selesai tanpa pesan kesalahan, sekarang saatnya kalian membuat ruang kerja milik kalian sendiri. Kalian cukup mengetikkan perintah "git checkout -b nama-fitur-kalian" di dalam terminal. Harap pastikan untuk mengganti bagian akhir perintah tersebut dengan nama tugas spesifik yang sedang kalian kerjakan agar mudah dikenali oleh tim, contohnya seperti mengetik "git checkout -b frontend-halaman-lapor" atau "git checkout -b backend-login-admin". Penggunaan tanda hubung sangat disarankan untuk menggantikan spasi pada penamaan cabang kalian.

Begitu kalian menekan tombol enter setelah perintah pembuat cabang tadi, Git akan secara otomatis merakit ruang kerja baru tersebut dan langsung memindahkan posisi kalian ke dalamnya. Kalian bisa langsung membuka teks editor, mendesain antarmuka, atau meracik logika CodeIgniter dengan perasaan tenang. Segala bentuk perubahan kode, penambahan berkas, atau eksperimen eror yang kalian lakukan di ruang kerja baru ini akan sepenuhnya terisolasi dan sama sekali tidak akan mengganggu hasil kerja anggota tim lainnya.

**### Panduan Mengirim Kode (Push) ke Repositori Tim**
Langkah pertama sebelum mengirim hasil kerja keras kalian ke repositori GitHub adalah memastikan bahwa kalian benar-benar sedang berada di dalam cabang kerja kalian sendiri dan bukan di cabang utama. Silakan ketik perintah "git status" di terminal untuk memverifikasi posisi cabang saat ini serta melihat daftar berkas apa saja yang sudah kalian ubah. Pastikan juga aplikasi CodeIgniter kita sudah berjalan tanpa kendala di komputer lokal kalian sebelum kode tersebut dikirim agar tidak error.

Setelah semua kode dipastikan aman, kalian harus memasukkan seluruh berkas yang mengalami perubahan tersebut ke dalam area persiapan Git. Eksekusi perintah "git add ." di dalam terminal kalian. Ingat bahwa tanda titik pada perintah tersebut sangat krusial karena ia bertugas menyapu bersih seluruh pembaruan kode, baik itu penambahan, pengubahan, maupun penghapusan berkas, untuk dimasukkan ke dalam satu paket pengiriman secara otomatis.

Tahapan selanjutnya adalah memberikan identitas pada paket pengiriman tersebut agar rekan tim lain paham bagian apa yang baru saja diselesaikan. Jalankan perintah "git commit -m 'Isi pesan kalian di sini'". Pastikan kalian menuliskan pesan yang padat dan informatif di antara tanda kutip tersebut, misalnya dengan menulis "Menyelesaikan tampilan halaman riwayat pengaduan" atau "Memperbaiki celah keamanan pada fitur otentikasi login".

Puncak dari proses ini adalah meluncurkan paket kode yang sudah dilabeli tadi ke internet. Kalian hanya perlu menjalankan perintah "git push origin nama-cabang-kalian" pada terminal. Sangat penting untuk menyesuaikan bagian akhir perintah tersebut dengan nama cabang tempat kalian berada saat ini. Begitu kalian menekan enter dan terminal menunjukkan proses unggah telah rampung seratus persen, hasil kerja kalian sudah terjamin keamanannya di server GitHub. 

**Aturan Kolaborasi Git**
- Selalu jalankan perintah git pull origin main setiap kali akan  mulai menulis kode agar mendapatkan pembaruan terbaru dari anggota tim lain dan mencegah bentrok kode.
- Jangan pernah melakukan commit pada berkas .env untuk menjaga keamanan kata sandi basis data masing-masing anggota.
- Berikan pesan commit yang jelas dan mendeskripsikan perubahan yang dibuat, contohnya: git commit -m "Membuat halaman login admin".
