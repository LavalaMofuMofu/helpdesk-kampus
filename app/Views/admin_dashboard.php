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
            <a href="/" class="hover:text-blue-200 transition-colors">Log Out</a>
        </div>
    </nav>

    <main class="relative z-10 flex-grow flex flex-col items-center pt-8 pb-12 px-4 w-full">
        
        <h2 class="text-white text-3xl font-bold mb-8 tracking-wide drop-shadow-md">DATA PENGADUAN MASUK</h2>

        <div class="w-full max-w-5xl space-y-6 mb-12">
            
            <div class="bg-white rounded-lg shadow-lg flex overflow-hidden hover:shadow-xl transition-all duration-300">
                <div class="w-32 md:w-48 flex-shrink-0">
                    <img src="https://placehold.co/300x300/EFF6FF/1E3A8A?text=Foto+Aduan" alt="Bukti" class="w-full h-full object-cover">
                </div>
                <div class="flex-grow p-5 flex flex-col justify-between">
                    <div>
                        <p class="text-xs text-gray-400 mb-1">Tanggal: <span class="font-medium text-gray-600">17 Juni 2026</span></p>
                        <p class="text-sm font-bold text-blue-800 uppercase tracking-wide mb-2">Kategori: Laboratorium Komputer</p>
                        <p class="text-gray-700 text-sm md:text-base line-clamp-3"><span class="font-semibold">Isi Laporan:</span> PC Komputer di Lab C nomor 12 mengalami bluescreen berulang kali saat praktikum basis data berlangsung.</p>
                    </div>
                    <div class="flex space-x-3 mt-4">
                        <a href="/admin_tanggapan?id=1" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-4 py-2 rounded transition shadow">Tanggapi</a>
                        <button class="bg-red-500 hover:bg-red-600 text-white text-xs font-bold px-4 py-2 rounded transition shadow">Cetak</button>
                    </div>
                </div>
                <div class="bg-yellow-400 w-16 md:w-20 flex items-center justify-center flex-shrink-0">
                    <span class="transform -rotate-90 text-white font-extrabold tracking-widest text-sm md:text-base">PROSES</span>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg flex overflow-hidden hover:shadow-xl transition-all duration-300">
                <div class="w-32 md:w-48 flex-shrink-0">
                    <img src="https://placehold.co/300x300/EFF6FF/1E3A8A?text=Foto+Aduan" alt="Bukti" class="w-full h-full object-cover">
                </div>
                <div class="flex-grow p-5 flex flex-col justify-between">
                    <div>
                        <p class="text-xs text-gray-400 mb-1">Tanggal: <span class="font-medium text-gray-600">16 Juni 2026</span></p>
                        <p class="text-sm font-bold text-blue-800 uppercase tracking-wide mb-2">Kategori: Jaringan & Akses Wi-Fi</p>
                        <p class="text-gray-700 text-sm md:text-base line-clamp-3"><span class="font-semibold">Isi Laporan:</span> Akses Wi-Fi Gedung Utama tidak bisa terhubung sejak pagi, muncul keterangan IP Configuration Failure.</p>
                    </div>
                    <div class="flex space-x-3 mt-4">
                        <a href="/admin_tanggapan?id=2" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-4 py-2 rounded transition shadow">Tanggapi</a>
                        <button class="bg-red-500 hover:bg-red-600 text-white text-xs font-bold px-4 py-2 rounded transition shadow">Cetak</button>
                    </div>
                </div>
                <div class="bg-yellow-400 w-16 md:w-20 flex items-center justify-center flex-shrink-0">
                    <span class="transform -rotate-90 text-white font-extrabold tracking-widest text-sm md:text-base">PROSES</span>
                </div>
            </div>

        </div>

        <h3 class="text-white text-xl font-bold mb-6 tracking-wide drop-shadow-md text-center uppercase">Data Selesai Tertanggapi</h3>
        
        <div class="w-full max-w-5xl space-y-6">
            <div class="bg-white/90 rounded-lg shadow-lg flex overflow-hidden opacity-90">
                <div class="w-32 md:w-48 flex-shrink-0 bg-gray-200">
                    <img src="https://placehold.co/300x300/EFF6FF/1E3A8A?text=Selesai" alt="Bukti" class="w-full h-full object-cover grayscale">
                </div>
                <div class="flex-grow p-5 flex flex-col justify-between">
                    <div>
                        <p class="text-xs text-gray-400 mb-1">Tanggal: <span class="font-medium text-gray-600">10 Juni 2026</span></p>
                        <p class="text-sm font-bold text-gray-500 uppercase tracking-wide mb-2">Kategori: Kebersihan Lingkungan</p>
                        <p class="text-gray-500 text-sm line-clamp-2"><span class="font-semibold">Isi Laporan:</span> Sampah di area taman parkir belakang menumpuk dan menimbulkan bau tidak sedap.</p>
                    </div>
                    <div class="mt-4">
                        <button class="bg-red-400 hover:bg-red-500 text-white text-xs font-bold px-4 py-2 rounded transition shadow">Cetak Arsip</button>
                    </div>
                </div>
                <div class="bg-green-500 w-16 md:w-20 flex items-center justify-center flex-shrink-0">
                    <span class="transform -rotate-90 text-white font-extrabold tracking-widest text-sm md:text-base">SELESAI</span>
                </div>
            </div>
        </div>

    </main>

    <footer class="relative z-10 w-full bg-gray-800 text-gray-300 py-6 px-10 flex justify-between items-center text-sm mt-auto">
        <p>Helpdesk Kampus Panel Admin v1.0</p>
        <p class="text-xs text-gray-500">Loged in as Admin</p>
    </footer>

</body>
</html>