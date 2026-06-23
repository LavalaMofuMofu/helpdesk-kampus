# Sistem Pengaduan Fasilitas Kampus (Helpdesk CI4) 🚀

Sistem Pengaduan Fasilitas Kampus adalah aplikasi web berbasis **CodeIgniter 4** yang memfasilitasi mahasiswa dalam melaporkan kerusakan atau permasalahan fasilitas di lingkungan kampus secara digital. Sebelum sistem ini ada, pengaduan hanya bisa dilakukan secara lisan atau manual — proses yang lambat, tidak terdokumentasi, dan sulit dipantau statusnya.

Dengan aplikasi ini, mahasiswa dapat mengajukan laporan pengaduan lengkap dengan foto bukti kapan saja, sementara pihak admin kampus dapat merespons, memberikan tanggapan, dan memperbarui status penanganan secara real-time melalui panel yang terpusat.

Proyek ini dikembangkan sebagai tugas kolaboratif mata kuliah Pemrograman Web II menggunakan arsitektur **MVC (Model-View-Controller)** dan dikelola bersama menggunakan **Git** sebagai Version Control System.

---

## 🌐 Demo Aplikasi

Aplikasi dapat diakses secara online di:
**http://helpdesk-kampus.mydiscussion.net/**

| Role | NIM / Username | Password |
|------|---------------|----------|
| Admin | 198012345678 | admin123 |
| Mahasiswa | 2410817210005 | mahasiswa123 |

---

## Fitur Utama

### Untuk Mahasiswa
- **Registrasi & Login** — Membuat akun baru menggunakan NIM dan password
- **Dashboard Kategori** — Memilih kategori pengaduan dari 7 kategori yang tersedia (Fasilitas Gedung, Lab Komputer, Wi-Fi, Kebersihan, dll.)
- **Form Laporan** — Mengajukan laporan lengkap berisi tanggal kejadian, deskripsi detail, dan unggah foto bukti (JPG/PNG/PDF, maks. 2MB)
- **Riwayat Laporan** — Memantau seluruh laporan yang pernah diajukan beserta status terkininya (Menunggu / Proses / Selesai)
- **Profil** — Melihat data akun dan statistik ringkasan laporan pribadi

### Untuk Admin
- **Dashboard Pengaduan** — Memantau semua laporan masuk, dipisah antara yang sedang berjalan dan yang sudah selesai
- **Tanggapan** — Memberikan respons tertulis atas laporan mahasiswa sekaligus memperbarui status penanganan
- **Data Tanggapan** — Mengelola seluruh riwayat tanggapan yang pernah dikirim (edit & hapus)
- **Data Pengguna** — Manajemen akun mahasiswa dan admin (tambah, edit, hapus) dengan proteksi agar admin tidak bisa menghapus akunnya sendiri


---

## Teknologi yang Digunakan

| Teknologi | Kegunaan |
|-----------|----------|
| PHP 8.3 | Bahasa pemrograman utama |
| CodeIgniter 4.7 | Framework MVC backend |
| MySQL | Database utama |
| Tailwind CSS (CDN) | Styling antarmuka |
| SweetAlert2 | Notifikasi interaktif |
| Git & GitHub | Version control & kolaborasi |

---

## Tim Pengembang & Pembagian Peran

Proyek ini dikerjakan oleh 3 mahasiswa dengan pembagian peran yang jelas berdasarkan lapisan arsitektur MVC:

---

### Frontend

**Tanggung jawab utama:**
Merancang dan membangun seluruh antarmuka pengguna (UI) yang dapat dilihat dan diinteraksikan oleh pengguna, serta membangun fondasi struktur database proyek.

**Yang dikerjakan (Frontend):**
- Membangun 10 halaman View menggunakan Tailwind CSS:
  - `login.php` — Halaman login dengan form autentikasi
  - `registrasi.php` — Halaman pendaftaran akun baru
  - `dashboard.php` — Halaman pilihan kategori laporan untuk mahasiswa
  - `form_laporan.php` — Form pengajuan laporan dengan fitur preview foto sebelum upload
  - `riwayat_laporan.php` — Halaman riwayat laporan mahasiswa dengan indikator status berwarna
  - `profil.php` — Halaman profil pengguna dengan statistik laporan
  - `admin_dashboard.php` — Panel admin untuk memantau laporan masuk
  - `admin_tanggapan.php` — Form pemberian tanggapan oleh admin
  - `data_tanggapan.php` — Tabel manajemen seluruh tanggapan
  - `data_pengguna.php` — Tabel manajemen akun pengguna dengan modal tambah/edit

---

### Backend (Controllers, Filters, Routing)

**Tanggung jawab utama:**
Membangun seluruh logika bisnis aplikasi — mulai dari proses autentikasi, penanganan request form, hingga pengaturan akses halaman berdasarkan role pengguna.

**Yang dikerjakan:**

**Controllers (4 file):**
- `Auth.php` — Menangani proses login (verifikasi NIM + password hash), registrasi akun baru, dan logout (menghancurkan session)
- `Home.php` — Menampilkan dashboard kategori (mahasiswa) dan halaman profil dengan data statistik real dari database
- `Pengaduan.php` — Menangani submit form laporan termasuk proses upload dan penyimpanan foto bukti ke server, serta menampilkan riwayat laporan per mahasiswa
- `Admin.php` — Menangani seluruh operasi panel admin: kelola pengaduan, kirim tanggapan, update status laporan, dan CRUD data pengguna

**Filters (2 file):**
- `AuthFilter.php` — Mencegah akses ke halaman yang membutuhkan login; otomatis redirect ke halaman login jika session belum ada
- `AdminFilter.php` — Mencegah mahasiswa mengakses halaman admin; redirect ke dashboard mahasiswa jika role bukan admin

**Konfigurasi:**
- `Config/Filters.php` — Mendaftarkan filter `auth` dan `adminOnly`, serta mengaktifkan proteksi CSRF global
- `Config/Routes.php` — Mendefinisikan seluruh routing aplikasi (GET & POST) dengan pengelompokan berdasarkan filter akses

---

### Database (Migrations & Models)

**Tanggung jawab utama:**
Merancang struktur database secara lengkap dan membangun lapisan Model sebagai jembatan antara Controller dan database.

**Yang dikerjakan:**

**Migrations (skema tabel):**
- `2026-06-19-151922_Users` — Tabel `users`: id, nama, nomor_induk (unique), email, password (hash), role (admin/mahasiswa), timestamps
- `2026-06-19-153339_Pengaduan` — Tabel `pengaduan`: id, user_id (FK ke users), kategori, tanggal_kejadian, deskripsi, foto, status (menunggu/proses/selesai), timestamps
- `2026-06-19-153518_Tanggapan` — Tabel `tanggapan`: id, pengaduan_id (FK ke pengaduan), admin_id (FK ke users), isi_tanggapan, timestamps
- `2026-06-22-000001_AlterPengaduanFotoToText` — Migrasi tambahan untuk mengubah kolom foto menjadi TEXT
- Merancang dan mengimplementasikan Migration tabel `users` beserta `UserSeeder` (2 akun demo bawaan: admin & mahasiswa)
- Membangun migrasi awal struktur tabel `pengaduan` dan `tanggapan` (dilengkapi oleh bagian Database)


**Models (3 file):**
- `UserModel.php` — Akses tabel users, validasi NIM unik saat insert/update (dengan placeholder `{id}` untuk update), fungsi pencarian user saat login, dan kalkulasi statistik pengaduan per mahasiswa
- `PengaduanModel.php` — Akses tabel pengaduan, query join dengan nama pelapor untuk dashboard admin, filter riwayat per mahasiswa
- `TanggapanModel.php` — Akses tabel tanggapan, query join dengan data pengaduan untuk halaman Data Tanggapan

---

## Struktur Direktori

```
helpdesk-kampus/
├── app/
│   ├── Config/
│   │   ├── App.php          # Konfigurasi base URL
│   │   ├── Filters.php      # Registrasi filter auth & adminOnly
│   │   └── Routes.php       # Definisi seluruh routing aplikasi
│   ├── Controllers/
│   │   ├── Auth.php         # Login, registrasi, logout
│   │   ├── Home.php         # Dashboard & profil
│   │   ├── Pengaduan.php    # Form laporan & riwayat
│   │   └── Admin.php        # Panel admin (CRUD)
│   ├── Filters/
│   │   ├── AuthFilter.php   # Proteksi halaman butuh login
│   │   └── AdminFilter.php  # Proteksi halaman admin
│   ├── Models/
│   │   ├── UserModel.php
│   │   ├── PengaduanModel.php
│   │   └── TanggapanModel.php
│   ├── Views/               # 10 halaman UI (Tailwind CSS)
│   └── Database/
│       ├── Migrations/      # 4 file migrasi tabel
│       └── Seeds/
│           └── UserSeeder.php
├── public/
│   ├── index.php            # Entry point aplikasi
│   ├── .htaccess            # URL rewriting
│   └── uploads/pengaduan/   # Folder penyimpanan foto bukti
└── writable/                # Cache, log, session (auto-generated)
```

---

## Cara Menjalankan Proyek Secara Lokal

### Persyaratan
- PHP >= 8.2
- Composer
- MySQL (via XAMPP atau Laragon)
- Git

### Langkah-langkah

**1. Clone repositori**
```bash
git clone <URL_REPOSITORI_GITHUB>
cd helpdesk-kampus
```

**2. Install dependensi**
```bash
composer install
```

**3. Konfigurasi environment**

Salin file `env.example` menjadi `.env`:
```bash
cp env.example .env
```

Edit file `.env`:
```ini
CI_ENVIRONMENT = development

database.default.hostname = localhost
database.default.database = db_helpdesk
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```

**4. Buat database**

Buka `localhost/phpmyadmin` → buat database baru bernama `db_helpdesk` (kosong, tanpa tabel).

**5. Jalankan migrasi & seeder**
```bash
php spark migrate
php spark db:seed UserSeeder
```

**6. Jalankan server**
```bash
php spark serve
```

Buka browser → `http://localhost:8080`

---

## Panduan Git untuk Anggota Tim

### Sebelum mulai coding
```bash
git checkout main
git pull origin main
git checkout -b nama-fitur-kamu
```

### Setelah selesai coding
```bash
git status
git add .
git commit -m "Deskripsi singkat perubahan yang dibuat"
git push origin nama-fitur-kamu
```

Buat **Pull Request** di GitHub dari branch kamu ke `main`.

### Aturan penting
- Selalu `git pull origin main` sebelum mulai kerja
- **Jangan pernah commit file `.env`** — berisi kredensial database pribadi
- Tulis pesan commit yang jelas dan deskriptif
- Jangan push langsung ke branch `main`

---

## 📝 Lisensi

Proyek ini dikembangkan untuk keperluan akademik mata kuliah Pemrograman Web II.
