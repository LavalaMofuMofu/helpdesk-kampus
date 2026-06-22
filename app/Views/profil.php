<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-600 min-h-screen flex flex-col font-sans relative overflow-x-hidden">

    <div class="fixed -top-16 -right-16 w-80 h-80 border-[30px] border-blue-500 rounded-full opacity-30 z-0 pointer-events-none"></div>
    <div class="fixed -bottom-20 -left-20 w-96 h-96 bg-blue-700 rounded-full opacity-40 blur-3xl z-0 pointer-events-none"></div>

    <nav class="bg-blue-700 sticky top-0 z-50 w-full shadow-lg border-b border-blue-500 flex items-center justify-between px-10 py-5 text-white">
        <div class="flex items-center space-x-3">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
            </svg>
            <h1 class="text-sm font-bold leading-tight tracking-wider">
                <?= ($role == 'admin') ? 'PANEL<br>ADMINISTRATOR' : 'HELPDESK<br>KAMPUS' ?>
            </h1>
        </div>

        <?php if ($role == 'admin'): ?>
            <div class="flex space-x-6 text-sm font-medium items-center">
                <a href="/admin_dashboard" class="hover:text-blue-200 transition-colors">Data Pengaduan</a>
                <a href="/data_tanggapan" class="hover:text-blue-200 transition-colors">Data Tanggapan</a>
                <a href="/data_pengguna" class="hover:text-blue-200 transition-colors">Data Pengguna</a>
                
                <div class="border-l border-blue-400 pl-6 flex">
                    <a href="/profil/admin" class="font-bold border-b-2 border-white pb-1 transition-colors">Profil Admin</a>
                </div>
                
                <a href="/logout" class="hover:text-blue-200 transition-colors">Log Out</a>
            </div>
        <?php else: ?>
            <div class="flex space-x-6 text-sm font-medium items-center">
                <a href="/dashboard" class="hover:text-blue-200 transition-colors">Dashboard</a>
                <a href="/riwayat_laporan" class="hover:text-blue-200 transition-colors">Riwayat Laporan</a>
                
                <a href="/profil/mahasiswa" class="font-bold border-b-2 border-white pb-1 transition-colors">Profil</a>
                
                <a href="/logout" class="hover:text-blue-200 transition-colors">Log Out</a>
            </div>
        <?php endif; ?>
    </nav>

    <main class="flex-grow flex items-center justify-center p-6 z-10 w-full">
        <div class="bg-white/95 backdrop-blur-sm rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.2)] w-full max-w-lg p-8 md:p-10 text-center border border-white/50 relative">
            
            <div class="relative inline-block">
                <div class="w-28 h-28 bg-gradient-to-tr from-blue-500 to-blue-600 rounded-full mx-auto mb-6 flex items-center justify-center text-white text-4xl font-bold shadow-lg ring-4 ring-blue-50">
                    <?= substr($nama, 0, 1) ?>
                </div>
                <div class="absolute bottom-6 right-0 w-6 h-6 bg-green-500 border-4 border-white rounded-full"></div>
            </div>
            
            <h2 class="text-2xl font-extrabold text-gray-800"><?= $nama ?></h2>
            <p class="text-blue-600 font-bold uppercase text-[10px] tracking-[0.2em] mt-1 mb-6"><?= $role ?></p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left">
                <div class="bg-gray-50 p-4 rounded-2xl border border-gray-100">
                    <p class="text-gray-400 text-[10px] uppercase tracking-widest font-bold">NIM / NIP</p>
                    <p class="text-gray-800 font-semibold mt-1 tracking-wide"><?= $nomor_induk ?></p>
                </div>
                <div class="bg-gray-50 p-4 rounded-2xl border border-gray-100">
                    <p class="text-gray-400 text-[10px] uppercase tracking-widest font-bold">Email</p>
                    <p class="text-gray-800 font-semibold mt-1 tracking-wide line-clamp-1"><?= $email ?></p>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-100">
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-4 text-left">
                    <?= ($role == 'admin') ? 'Tinjauan Kinerja Sistem' : 'Statistik Laporan Saya' ?>
                </h3>
                
                <div class="grid grid-cols-3 gap-3 md:gap-4 text-center">
                    <div class="bg-blue-50 p-3 md:p-4 rounded-2xl border border-blue-100">
                        <p class="text-2xl font-bold text-blue-600"><?= $statistik['total'] ?></p>
                        <p class="text-[9px] md:text-[10px] text-gray-500 uppercase tracking-wide font-semibold mt-1">Total</p>
                    </div>
                    <div class="bg-yellow-50 p-3 md:p-4 rounded-2xl border border-yellow-100">
                        <p class="text-2xl font-bold text-yellow-600"><?= $statistik['proses'] ?></p>
                        <p class="text-[9px] md:text-[10px] text-gray-500 uppercase tracking-wide font-semibold mt-1">Proses</p>
                    </div>
                    <div class="bg-green-50 p-3 md:p-4 rounded-2xl border border-green-100">
                        <p class="text-2xl font-bold text-green-600"><?= $statistik['selesai'] ?></p>
                        <p class="text-[9px] md:text-[10px] text-gray-500 uppercase tracking-wide font-semibold mt-1">Selesai</p>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="<?= ($role == 'admin') ? '/admin_dashboard' : '/riwayat_laporan' ?>" class="block w-full bg-gray-800 hover:bg-gray-900 text-white text-sm font-semibold py-3.5 rounded-xl transition shadow-md">
                        <?= ($role == 'admin') ? 'Kelola Pengaduan Masuk' : 'Lihat Detail Riwayat' ?>
                    </a>
                </div>
            </div>

        </div>
    </main>

    <footer class="relative z-10 w-full bg-gray-800 text-gray-300 py-6 px-10 flex justify-between items-center text-sm mt-auto">
        <p>Helpdesk Kampus by "Tim Pengembang Web"</p>
        <p class="text-xs text-gray-500">Versi 1.0 (Prototipe)</p>
    </footer>

</body>
</html>