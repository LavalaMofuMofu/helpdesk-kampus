<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Helpdesk Kampus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-600 min-h-screen flex flex-col font-sans relative overflow-x-hidden">

    <div class="fixed -bottom-16 -left-16 w-64 h-64 border-[20px] border-blue-500 rounded-full opacity-50 pointer-events-none z-0"></div>
    <div class="fixed top-1/4 right-24 w-0 h-0 border-l-[30px] border-l-transparent border-b-[50px] border-b-blue-500 border-r-[30px] border-r-transparent opacity-30 transform rotate-45 pointer-events-none z-0"></div>

    <nav class="sticky top-0 z-50 w-full bg-blue-700 shadow-md border-b border-blue-500 flex items-center justify-between px-10 py-5 text-white">
        <div class="flex items-center space-x-3">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
            </svg>
            <h1 class="text-sm font-bold leading-tight tracking-wider">PANEL<br>ADMINISTRATOR</h1>
        </div>
        <div class="flex space-x-6 text-sm font-medium">
            <a href="/admin_dashboard" class="font-bold border-b-2 border-white pb-1 transition-colors">Data Pengaduan</a>
            <a href="/data_tanggapan" class="hover:text-blue-200 transition-colors">Data Tanggapan</a>
            <a href="/data_pengguna" class="hover:text-blue-200 transition-colors">Data Pengguna</a>
            <!-- Link Profil Admin -->
            <a href="/profil/admin" class="hover:text-blue-200 transition-colors border-l border-blue-400 pl-6">Profil Admin</a>
            <a href="/logout" class="hover:text-blue-200 transition-colors">Log Out</a>
        </div>
    </nav>

    <main class="relative z-10 flex-grow flex flex-col items-center pt-8 pb-12 px-4 w-full">
        <h2 class="text-white text-3xl font-bold mb-6 tracking-wide drop-shadow-md text-center">MANAJEMEN PENGADUAN</h2>
        
        <div class="flex justify-center w-full max-w-5xl mb-8">
            <div class="bg-blue-800/50 p-1.5 rounded-xl inline-flex backdrop-blur-sm border border-blue-400/30 shadow-inner">
                <button id="btnTabProses" class="px-6 py-2.5 rounded-lg bg-white text-blue-700 font-bold shadow-md transition-all text-sm md:text-base">
                    Laporan Masuk (Proses)
                </button>
                <button id="btnTabSelesai" class="px-6 py-2.5 rounded-lg text-blue-100 hover:text-white font-medium transition-all text-sm md:text-base">
                    Riwayat Laporan (Selesai)
                </button>
            </div>
        </div>

        <div id="kontenProses" class="w-full max-w-5xl space-y-6 block transition-opacity duration-300">
            <?php if (empty($daftarProses)): ?>
                <div class="bg-white/90 rounded-lg shadow-lg p-10 text-center text-gray-500">Tidak ada laporan yang sedang berjalan saat ini.</div>
            <?php endif; ?>

            <?php foreach ($daftarProses as $row): ?>
                <?php
                    $warnaStatus = $row['status'] === 'proses' ? 'bg-yellow-400' : 'bg-gray-400';
                    $fotoUrl = $row['foto']
                        ? base_url('uploads/pengaduan/' . $row['foto'])
                        : 'https://placehold.co/300x300/EFF6FF/1E3A8A?text=Foto+Aduan';
                ?>
                <div class="bg-white rounded-lg shadow-lg flex overflow-hidden hover:shadow-xl transition-all duration-300">
                    <div class="w-32 md:w-48 flex-shrink-0">
                        <img src="<?= esc($fotoUrl, 'attr') ?>" alt="Bukti" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow p-5 flex flex-col justify-between">
                        <div>
                            <p class="text-xs text-gray-400 mb-1">Tanggal: <span class="font-medium text-gray-600"><?= esc(date('d F Y', strtotime($row['tanggal_kejadian']))) ?></span> &middot; Pelapor: <span class="font-medium text-gray-600"><?= esc($row['nama_pelapor']) ?></span></p>
                            <p class="text-sm font-bold text-blue-800 uppercase tracking-wide mb-2">Kategori: <?= esc($row['kategori']) ?></p>
                            <p class="text-gray-700 text-sm md:text-base line-clamp-3"><span class="font-semibold">Isi Laporan:</span> <?= esc($row['deskripsi']) ?></p>
                        </div>
                        <div class="flex flex-wrap gap-2 mt-4">
                            <a href="/admin_tanggapan?id=<?= $row['id'] ?>" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-4 py-2 rounded transition shadow">Tanggapi</a>
                            <form action="/admin_dashboard/hapus/<?= $row['id'] ?>" method="POST" class="form-hapus-pengaduan">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn-hapus bg-red-500 hover:bg-red-600 text-white text-xs font-bold px-4 py-2 rounded transition shadow">Hapus</button>
                            </form>
                        </div>
                    </div>
                    <div class="<?= $warnaStatus ?> w-16 md:w-20 flex items-center justify-center flex-shrink-0">
                        <span class="transform -rotate-90 text-white font-extrabold tracking-widest text-sm md:text-base"><?= esc(strtoupper($row['status'])) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div id="kontenSelesai" class="w-full max-w-5xl space-y-6 hidden transition-opacity duration-300">
            <?php if (empty($daftarSelesai)): ?>
                <div class="bg-white/90 rounded-lg shadow-lg p-10 text-center text-gray-500">Belum ada riwayat laporan yang selesai.</div>
            <?php endif; ?>

            <?php foreach ($daftarSelesai as $row): ?>
                <?php
                    $fotoUrl = $row['foto']
                        ? base_url('uploads/pengaduan/' . $row['foto'])
                        : 'https://placehold.co/300x300/EFF6FF/1E3A8A?text=Selesai';
                ?>
                <div class="bg-white/90 rounded-lg shadow-lg flex overflow-hidden opacity-90">
                    <div class="w-32 md:w-48 flex-shrink-0 bg-gray-200">
                        <img src="<?= esc($fotoUrl, 'attr') ?>" alt="Bukti" class="w-full h-full object-cover grayscale">
                    </div>
                    <div class="flex-grow p-5 flex flex-col justify-between">
                        <div>
                            <p class="text-xs text-gray-400 mb-1">Diperbarui: <span class="font-medium text-gray-600"><?= esc(date('d F Y', strtotime($row['updated_at']))) ?></span> &middot; Pelapor: <span class="font-medium text-gray-600"><?= esc($row['nama_pelapor']) ?></span></p>
                            <p class="text-sm font-bold text-gray-500 uppercase tracking-wide mb-2">Kategori: <?= esc($row['kategori']) ?></p>
                            <p class="text-gray-500 text-sm line-clamp-2"><span class="font-semibold">Isi Laporan:</span> <?= esc($row['deskripsi']) ?></p>
                        </div>
                        <div class="flex flex-wrap gap-2 mt-4">
                            <form action="/admin_dashboard/hapus/<?= $row['id'] ?>" method="POST" class="form-hapus-pengaduan">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn-hapus bg-red-400 hover:bg-red-500 text-white text-xs font-bold px-4 py-2 rounded transition shadow">Hapus Riwayat</button>
                            </form>
                        </div>
                    </div>
                    <div class="bg-green-500 w-16 md:w-20 flex items-center justify-center flex-shrink-0">
                        <span class="transform -rotate-90 text-white font-extrabold tracking-widest text-sm md:text-base">SELESAI</span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </main>

    <footer class="relative z-10 w-full bg-gray-800 text-gray-300 py-6 px-10 flex justify-between items-center text-sm mt-auto">
        <p>Helpdesk Kampus Panel Admin v1.0</p>
        <p class="text-xs text-gray-500">Loged in as Admin</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Tombol hapus sekarang ada di dalam <form> masing-masing.
        // SweetAlert cuma dipakai sebagai konfirmasi; begitu user klik "Ya, Hapus!",
        // form-nya betulan di-submit ke server (bukan cuma dihilangkan dari layar).
        document.querySelectorAll('.form-hapus-pengaduan').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Hapus Laporan Ini?',
                    text: "Tindakan ini tidak dapat dibatalkan. Laporan akan dihapus permanen dari sistem!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#EF4444',
                    cancelButtonColor: '#6B7280',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

    <?php if (session()->getFlashdata('sukses')): ?>
    <script>
        Swal.fire({ title: 'Berhasil!', text: '<?= esc(session()->getFlashdata('sukses'), 'js') ?>', icon: 'success', confirmButtonColor: '#2563EB' });
    </script>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
    <script>
        Swal.fire({ title: 'Gagal', text: '<?= esc(session()->getFlashdata('error'), 'js') ?>', icon: 'error', confirmButtonColor: '#2563EB' });
    </script>
    <?php endif; ?>

    <script>
        const btnProses = document.getElementById('btnTabProses');
        const btnSelesai = document.getElementById('btnTabSelesai');
        const kontenProses = document.getElementById('kontenProses');
        const kontenSelesai = document.getElementById('kontenSelesai');

        // Fungsi saat Tab Proses diklik
        btnProses.addEventListener('click', () => {
            // Tampilkan konten Proses, Sembunyikan Selesai
            kontenProses.classList.remove('hidden');
            kontenSelesai.classList.add('hidden');
            
            // Ubah gaya tombol menjadi Aktif
            btnProses.className = "px-6 py-2.5 rounded-lg bg-white text-blue-700 font-bold shadow-md transition-all text-sm md:text-base";
            // Ubah gaya tombol Selesai menjadi Pasif
            btnSelesai.className = "px-6 py-2.5 rounded-lg text-blue-100 hover:text-white font-medium transition-all text-sm md:text-base";
        });

        // Fungsi saat Tab Selesai diklik
        btnSelesai.addEventListener('click', () => {
            // Tampilkan konten Selesai, Sembunyikan Proses
            kontenSelesai.classList.remove('hidden');
            kontenProses.classList.add('hidden');
            
            // Ubah gaya tombol menjadi Aktif
            btnSelesai.className = "px-6 py-2.5 rounded-lg bg-white text-blue-700 font-bold shadow-md transition-all text-sm md:text-base";
            // Ubah gaya tombol Proses menjadi Pasif
            btnProses.className = "px-6 py-2.5 rounded-lg text-blue-100 hover:text-white font-medium transition-all text-sm md:text-base";
        });
    </script>

</body>
</html>