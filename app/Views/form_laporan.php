<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Laporan - Helpdesk Kampus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-600 min-h-screen flex flex-col font-sans relative overflow-x-hidden">

    <!-- Dekorasi Background (Diubah menjadi 'fixed' agar tidak mendorong footer ke atas) -->
    <div class="fixed -bottom-16 -left-16 w-64 h-64 border-[20px] border-blue-500 rounded-full opacity-50 pointer-events-none z-0"></div>
    <div class="fixed top-1/4 right-24 w-0 h-0 border-l-[30px] border-l-transparent border-b-[50px] border-b-blue-500 border-r-[30px] border-r-transparent opacity-30 transform rotate-45 pointer-events-none z-0"></div>

    <!-- Navbar -->
    <nav class="sticky top-0 z-50 w-full bg-blue-700 shadow-md border-b border-blue-500 flex items-center justify-between px-10 py-5 text-white">
        <div class="flex items-center space-x-3">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
            </svg>
            <h1 class="text-sm font-bold leading-tight tracking-wider">HELPDESK<br>KAMPUS</h1>
        </div>
        <div class="flex space-x-6 text-sm font-medium">
            <a href="/dashboard" class="hover:text-blue-200 transition-colors">Dashboard</a>
            <a href="/riwayat_laporan" class="hover:text-blue-200 transition-colors">Riwayat Laporan</a>
            <!-- Link Profil Mahasiswa -->
            <a href="/profil/mahasiswa" class="hover:text-blue-200 transition-colors">Profil</a>
            <a href="/" class="hover:text-blue-200 transition-colors">Log Out</a>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="relative z-10 flex-grow flex flex-col items-center pt-8 pb-12 px-4 w-full">
        
        <h2 class="text-white text-3xl font-bold mb-8 tracking-wide drop-shadow-md">BUAT LAPORAN PENGADUAN</h2>

        <!-- Card Form -->
        <div class="bg-white w-full max-w-3xl rounded-xl shadow-2xl p-8 md:p-10">
            
            <form id="formLaporan" action="" method="POST" enctype="multipart/form-data">
                
                <div class="mb-6 border-b pb-6 text-center">
                    <label class="block text-sm font-bold text-gray-800 mb-2 uppercase tracking-wide">Kategori Terpilih</label>
                    <div class="bg-blue-50 text-blue-800 font-semibold py-3 px-4 rounded-md border border-blue-200 inline-block min-w-[200px]">
                        <?= esc($kategori) ?>
                    </div>
                    <input type="hidden" name="kategori_laporan" value="<?= esc($kategori) ?>">
                    <p class="text-xs text-gray-400 mt-2">*Kategori dipilih dari halaman dashboard</p>
                </div>

                <div class="mb-5">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Kejadian / Pengaduan</label>
                    <input type="date" required class="w-full px-4 py-3 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow">
                </div>

                <div class="mb-5">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Laporan</label>
                    <textarea rows="5" required placeholder="Jelaskan secara detail masalah yang terjadi..." class="w-full px-4 py-3 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow resize-y"></textarea>
                </div>

                <div class="mb-8">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Unggah Bukti (Foto/Dokumen)</label>
                    <div class="flex items-center justify-center w-full">
                        <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6 text-gray-500">
                                <svg class="w-8 h-8 mb-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                <p class="mb-2 text-sm"><span class="font-semibold">Klik untuk unggah</span> atau seret file ke sini</p>
                                <p class="text-xs">PNG, JPG, atau PDF (Maks. 2MB)</p>
                            </div>
                            <input type="file" class="hidden" accept=".jpg, .jpeg, .png, .pdf" />
                        </label>
                    </div>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 rounded-md transition duration-300 shadow-md text-lg">
                    Kirim Laporan
                </button>
            </form>
        </div>
    </main>

    <!-- Footer (Ditambahkan w-full) -->
    <footer class="relative z-10 w-full bg-gray-800 text-gray-300 py-6 px-10 flex justify-between items-center text-sm mt-auto">
        <p>Helpdesk Kampus by "Tim Pengembang Web"</p>
        <button class="bg-blue-600 hover:bg-blue-500 p-2 rounded text-white transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
            </svg>
        </button>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('formLaporan').addEventListener('submit', function(e) {
            // Mencegah form memuat ulang halaman secara otomatis (karena masih prototipe UI)
            e.preventDefault(); 

            // Memunculkan Pop-up SweetAlert
            Swal.fire({
                title: 'Laporan Terkirim!',
                text: 'Terima kasih, laporan pengaduan Anda telah berhasil masuk ke sistem Helpdesk.',
                icon: 'success',
                confirmButtonColor: '#2563EB', // Warna senada dengan bg-blue-600 Tailwind
                confirmButtonText: 'Lihat Riwayat Laporan',
                allowOutsideClick: false // Mencegah pop-up tertutup jika user klik di luar area
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika tombol diklik, arahkan mahasiswa ke halaman riwayat laporan
                    window.location.href = '/riwayat_laporan';
                }
            });
        });
    </script>

</body>
</html>