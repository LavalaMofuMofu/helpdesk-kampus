<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Laporan - Helpdesk Kampus</title>
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
            <h1 class="text-sm font-bold leading-tight tracking-wider">HELPDESK<br>KAMPUS</h1>
        </div>
        <div class="flex space-x-6 text-sm font-medium">
            <a href="/dashboard" class="hover:text-blue-200 transition-colors">Dashboard</a>
            <a href="/riwayat_laporan" class="font-bold border-b-2 border-white pb-1 transition-colors">Riwayat Laporan</a>
            <!-- Link Profil Mahasiswa -->
            <a href="/profil/mahasiswa" class="hover:text-blue-200 transition-colors">Profil</a>
            <a href="/logout" class="hover:text-blue-200 transition-colors">Log Out</a>
        </div>
    </nav>

    <main class="relative z-10 flex-grow flex flex-col items-center pt-8 pb-12 px-4 w-full">
        
        <h2 class="text-white text-3xl font-bold mb-8 tracking-wide drop-shadow-md">RIWAYAT LAPORAN SAYA</h2>

        <div class="w-full max-w-4xl space-y-6">

            <?php if (empty($daftarLaporan)): ?>
                <div class="bg-white/90 rounded-lg shadow-lg p-10 text-center text-gray-500">
                    Anda belum pernah membuat laporan pengaduan. <a href="/dashboard" class="text-blue-600 font-semibold hover:underline">Buat laporan baru</a>.
                </div>
            <?php endif; ?>

            <?php foreach ($daftarLaporan as $laporan): ?>
                <?php
                    $warnaStatus = match ($laporan['status']) {
                        'selesai' => 'bg-green-500',
                        'proses'  => 'bg-yellow-400',
                        default   => 'bg-gray-400',
                    };
                    $fotoUrl = $laporan['foto']
                        ? base_url('uploads/pengaduan/' . $laporan['foto'])
                        : 'https://placehold.co/300x300/EFF6FF/1E3A8A?text=Tanpa+Foto';
                ?>
                <div class="bg-white rounded-lg shadow-lg flex overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="w-32 md:w-48 flex-shrink-0">
                        <img src="<?= esc($fotoUrl, 'attr') ?>" alt="Bukti Laporan" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow p-5 md:p-6 flex flex-col justify-center">
                        <p class="text-sm text-gray-500 mb-1">Tanggal: <span class="font-medium text-gray-700"><?= esc(date('d F Y', strtotime($laporan['tanggal_kejadian']))) ?></span></p>
                        <p class="text-sm text-gray-500 mb-2">Kategori: <span class="font-bold text-gray-800"><?= esc($laporan['kategori']) ?></span></p>
                        <p class="text-gray-700 text-sm md:text-base line-clamp-2">Isi Laporan: <?= esc($laporan['deskripsi']) ?></p>
                    </div>
                    <div class="<?= $warnaStatus ?> w-16 md:w-20 flex items-center justify-center flex-shrink-0">
                        <span class="transform -rotate-90 text-white font-extrabold tracking-widest text-sm md:text-base"><?= esc(strtoupper($laporan['status'])) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </main>

    <footer class="relative z-10 w-full bg-gray-800 text-gray-300 py-6 px-10 flex justify-between items-center text-sm mt-auto">
        <p>Helpdesk Kampus by "Tim Pengembang Web"</p>
        <button class="bg-blue-600 hover:bg-blue-500 p-2 rounded text-white transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
            </svg>
        </button>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if (session()->getFlashdata('sukses')): ?>
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: '<?= esc(session()->getFlashdata('sukses'), 'js') ?>',
            icon: 'success',
            confirmButtonColor: '#2563EB'
        });
    </script>
    <?php endif; ?>

</body>
</html>