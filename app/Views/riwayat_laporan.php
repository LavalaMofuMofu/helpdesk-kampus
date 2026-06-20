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
            <a href="/" class="hover:text-blue-200 transition-colors">Log Out</a>
        </div>
    </nav>

    <main class="relative z-10 flex-grow flex flex-col items-center pt-8 pb-12 px-4 w-full">
        
        <h2 class="text-white text-3xl font-bold mb-8 tracking-wide drop-shadow-md">RIWAYAT LAPORAN SAYA</h2>

        <div class="w-full max-w-4xl space-y-6">
            
            <div class="bg-white rounded-lg shadow-lg flex overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="w-32 md:w-48 flex-shrink-0">
                    <img src="https://placehold.co/300x300/EFF6FF/1E3A8A?text=Foto+Bukti" alt="Bukti Laporan" class="w-full h-full object-cover">
                </div>
                <div class="flex-grow p-5 md:p-6 flex flex-col justify-center">
                    <p class="text-sm text-gray-500 mb-1">Tanggal: <span class="font-medium text-gray-700">17 Juni 2026</span></p>
                    <p class="text-sm text-gray-500 mb-2">Kategori: <span class="font-bold text-gray-800">Fasilitas Gedung & Kelas</span></p>
                    <p class="text-gray-700 text-sm md:text-base line-clamp-2">Isi Laporan: Proyektor di ruang kelas lantai 2 mati total, padahal besok ada presentasi tugas akhir.</p>
                </div>
                <div class="bg-yellow-400 w-16 md:w-20 flex items-center justify-center flex-shrink-0">
                    <span class="transform -rotate-90 text-white font-extrabold tracking-widest text-sm md:text-base">PROSES</span>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg flex overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="w-32 md:w-48 flex-shrink-0">
                    <img src="https://placehold.co/300x300/EFF6FF/1E3A8A?text=Foto+Bukti" alt="Bukti Laporan" class="w-full h-full object-cover">
                </div>
                <div class="flex-grow p-5 md:p-6 flex flex-col justify-center">
                    <p class="text-sm text-gray-500 mb-1">Tanggal: <span class="font-medium text-gray-700">10 Juni 2026</span></p>
                    <p class="text-sm text-gray-500 mb-2">Kategori: <span class="font-bold text-gray-800">Jaringan & Akses Wi-Fi</span></p>
                    <p class="text-gray-700 text-sm md:text-base line-clamp-2">Isi Laporan: Sinyal Wi-Fi di area kantin sangat lemah dan sering terputus sejak dua hari lalu.</p>
                </div>
                <div class="bg-green-500 w-16 md:w-20 flex items-center justify-center flex-shrink-0">
                    <span class="transform -rotate-90 text-white font-extrabold tracking-widest text-sm md:text-base">SELESAI</span>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg flex overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="w-32 md:w-48 flex-shrink-0">
                    <img src="https://placehold.co/300x300/EFF6FF/1E3A8A?text=Foto+Bukti" alt="Bukti Laporan" class="w-full h-full object-cover">
                </div>
                <div class="flex-grow p-5 md:p-6 flex flex-col justify-center">
                    <p class="text-sm text-gray-500 mb-1">Tanggal: <span class="font-medium text-gray-700">17 Juni 2026</span></p>
                    <p class="text-sm text-gray-500 mb-2">Kategori: <span class="font-bold text-gray-800">Layanan Akademik & KRS</span></p>
                    <p class="text-gray-700 text-sm md:text-base line-clamp-2">Isi Laporan: Nilai mata kuliah Jaringan Komputer belum keluar di portal akademik.</p>
                </div>
                <div class="bg-gray-400 w-16 md:w-20 flex items-center justify-center flex-shrink-0">
                    <span class="transform -rotate-90 text-white font-extrabold tracking-widest text-sm md:text-base">MENUNGGU</span>
                </div>
            </div>

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

</body>
</html>