<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beri Tanggapan - Panel Admin</title>
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
            <a href="/admin_dashboard" class="font-bold border-b-2 border-white pb-1">Data Pengaduan</a>
            <a href="/data_tanggapan" class="hover:text-blue-200 transition-colors">Data Tanggapan</a>
            <a href="/data_pengguna" class="hover:text-blue-200 transition-colors">Data Pengguna</a>
            <a href="/logout" class="hover:text-blue-200 transition-colors">Log Out</a>
        </div>
    </nav>

    <main class="relative z-10 flex-grow flex flex-col items-center pt-8 pb-12 px-4 w-full">
        
        <h2 class="text-white text-3xl font-bold mb-8 tracking-wide drop-shadow-md">PROSES TANGGAPAN ADUAN</h2>

        <div class="w-full max-w-4xl bg-white rounded-xl shadow-2xl overflow-hidden p-8 md:p-10">
            
            <div class="mb-8 bg-blue-50 p-6 rounded-lg border border-blue-100 flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/3 flex-shrink-0">
                    <?php $fotoUrl = $pengaduan['foto'] ? base_url('uploads/pengaduan/' . $pengaduan['foto']) : 'https://placehold.co/300x300/EFF6FF/1E3A8A?text=Bukti+Aduan'; ?>
                    <img src="<?= esc($fotoUrl, 'attr') ?>" alt="Foto Bukti" class="w-full h-48 object-cover rounded-md border shadow-sm">
                </div>
                <div class="flex-grow">
                    <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide"><?= esc($pengaduan['kategori']) ?></span>
                    <p class="text-xs text-gray-400 mt-3">Dilaporkan oleh <span class="text-gray-600 font-medium"><?= esc($pengaduan['nama_pelapor']) ?></span> pada: <span class="text-gray-600 font-medium"><?= esc(date('d F Y', strtotime($pengaduan['tanggal_kejadian']))) ?></span></p>
                    <p class="text-gray-700 text-sm mt-3 leading-relaxed">
                        <span class="font-bold text-gray-800">Detail Keluhan:</span><br>
                        <?= esc($pengaduan['deskripsi']) ?>
                    </p>
                </div>
            </div>

            <form id="formTanggapan" action="/admin_tanggapan" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="pengaduan_id" value="<?= $pengaduan['id'] ?>">

                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Ubah Status Laporan</label>
                    <select name="status" class="w-full px-4 py-3 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent cursor-pointer">
                        <option value="proses" <?= $pengaduan['status'] !== 'selesai' ? 'selected' : '' ?>>PROSES (Sedang Ditangani)</option>
                        <option value="selesai" <?= $pengaduan['status'] === 'selesai' ? 'selected' : '' ?>>SELESAI (Masalah Berhasil Diatasi)</option>
                    </select>
                </div>

                <div class="mb-8">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Isi Tanggapan / Solusi</label>
                    <textarea name="isi_tanggapan" rows="5" required placeholder="Tuliskan tindakan perbaikan atau pesan balasan ke mahasiswa di sini..." class="w-full px-4 py-3 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow resize-y"><?= old('isi_tanggapan') ?></textarea>
                </div>

                <div class="flex gap-4">
                    <a href="/admin_dashboard" class="w-1/3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-3.5 rounded-md transition duration-300 text-center shadow-sm">
                        Kembali
                    </a>
                    <button type="submit" class="w-2/3 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 rounded-md transition duration-300 shadow-md">
                        Simpan & Kirim Tanggapan
                    </button>
                </div>

            </form>
        </div>
    </main>

    <footer class="relative z-10 w-full bg-gray-800 text-gray-300 py-6 px-10 flex justify-between items-center text-sm mt-auto">
        <p>Helpdesk Kampus Panel Admin v1.0</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if (session()->getFlashdata('error')): ?>
    <script>
        Swal.fire({
            title: 'Gagal Menyimpan',
            text: '<?= esc(session()->getFlashdata('error'), 'js') ?>',
            icon: 'error',
            confirmButtonColor: '#2563EB'
        });
    </script>
    <?php endif; ?>

</body>
</html>