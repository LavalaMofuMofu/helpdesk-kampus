<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Jenis Pelaporan - Helpdesk Kampus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-600 min-h-screen flex flex-col font-sans relative overflow-x-hidden">

    <!-- Dekorasi Background -->
    <!-- Lingkaran (Kiri Bawah) -->
    <div class="fixed -bottom-16 -left-16 w-64 h-64 border-[20px] border-blue-500 rounded-full opacity-50 pointer-events-none z-0"></div>
    <!-- Segitiga (Kanan Atas) -->
    <div class="fixed top-1/4 right-24 w-0 h-0 border-l-[30px] border-l-transparent border-b-[50px] border-b-blue-500 border-r-[30px] border-r-transparent opacity-30 transform rotate-45 pointer-events-none z-0"></div>

    <!-- Navbar (Warna blue-700 sebagai pembeda yang senada) -->
    <nav class="sticky top-0 z-50 w-full bg-blue-700 shadow-md border-b border-blue-500 flex items-center justify-between px-10 py-5 text-white">
        <div class="flex items-center space-x-3">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
            </svg>
            <h1 class="text-sm font-bold leading-tight tracking-wider">HELPDESK<br>KAMPUS</h1>
        </div>
        <div class="flex space-x-6 text-sm font-medium">
            <a href="/dashboard" class="font-bold border-b-2 border-white pb-1 transition-colors">Dashboard</a>
            <a href="/riwayat_laporan" class="hover:text-blue-200 transition-colors">Riwayat Laporan</a>
            <a href="/profil/mahasiswa" class="hover:text-blue-200 transition-colors">Profil</a>
            <a href="/" class="hover:text-blue-200 transition-colors">Log Out</a>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="relative z-10 flex-grow flex flex-col items-center pt-10 pb-20 px-4 w-full">
        
        <h2 class="text-white text-3xl font-bold mb-10 tracking-wide text-center drop-shadow-md">Pilih Kategori Pelaporan:</h2>

        <!-- Grid Kategori Kampus -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-5xl">
            
            <a href="/form_laporan?kategori=Fasilitas Gedung %26 Kelas" class="bg-white rounded-lg p-4 flex items-center space-x-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <img src="https://placehold.co/100x100/EFF6FF/1E3A8A?text=Gedung+%26%0AKelas" alt="Fasilitas Gedung" class="w-20 h-20 object-cover rounded-md border border-blue-100 shadow-sm">
                <span class="font-bold text-gray-800 text-lg uppercase tracking-wide">Fasilitas Gedung & Kelas</span>
            </a>

            <a href="/form_laporan?kategori=Laboratorium Komputer" class="bg-white rounded-lg p-4 flex items-center space-x-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <img src="https://placehold.co/100x100/EFF6FF/1E3A8A?text=Lab%0AKomputer" alt="Laboratorium Komputer" class="w-20 h-20 object-cover rounded-md border border-blue-100 shadow-sm">
                <span class="font-bold text-gray-800 text-lg uppercase tracking-wide">Laboratorium Komputer</span>
            </a>

            <a href="/form_laporan?kategori=Jaringan %26 Akses Wi-Fi" class="bg-white rounded-lg p-4 flex items-center space-x-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <img src="https://placehold.co/100x100/EFF6FF/1E3A8A?text=Jaringan%0A%26+Wi-Fi" alt="Jaringan dan Wi-Fi" class="w-20 h-20 object-cover rounded-md border border-blue-100 shadow-sm">
                <span class="font-bold text-gray-800 text-lg uppercase tracking-wide">Jaringan & Akses Wi-Fi</span>
            </a>

            <a href="/form_laporan?kategori=Layanan Akademik %26 KRS" class="bg-white rounded-lg p-4 flex items-center space-x-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <img src="https://placehold.co/100x100/EFF6FF/1E3A8A?text=Layanan%0AAkademik" alt="Layanan Akademik" class="w-20 h-20 object-cover rounded-md border border-blue-100 shadow-sm">
                <span class="font-bold text-gray-800 text-lg uppercase tracking-wide">Layanan Akademik & KRS</span>
            </a>

            <a href="/form_laporan?kategori=Kebersihan Lingkungan" class="bg-white rounded-lg p-4 flex items-center space-x-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <img src="https://placehold.co/100x100/EFF6FF/1E3A8A?text=Area%0AKampus" alt="Kebersihan Lingkungan" class="w-20 h-20 object-cover rounded-md border border-blue-100 shadow-sm">
                <span class="font-bold text-gray-800 text-lg uppercase tracking-wide">Kebersihan Lingkungan</span>
            </a>

            <a href="/form_laporan?kategori=Keamanan %26 Fasilitas Parkir" class="bg-white rounded-lg p-4 flex items-center space-x-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <img src="https://placehold.co/100x100/EFF6FF/1E3A8A?text=Area%0AParkir" alt="Keamanan dan Parkir" class="w-20 h-20 object-cover rounded-md border border-blue-100 shadow-sm">
                <span class="font-bold text-gray-800 text-lg uppercase tracking-wide">Keamanan & Fasilitas Parkir</span>
            </a>

            <a href="/form_laporan?kategori=Lainnya" class="bg-white rounded-lg p-4 flex items-center space-x-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 md:col-span-2 md:w-1/2 md:mx-auto">
                <img src="https://placehold.co/100x100/EFF6FF/1E3A8A?text=Lainnya" alt="Lainnya" class="w-20 h-20 object-cover rounded-md border border-blue-100 shadow-sm">
                <span class="font-bold text-gray-800 text-lg uppercase tracking-wide">Lainnya</span>
            </a>

        </div>
    </main>

    <!-- Footer -->
    <footer class="relative z-10 bg-gray-800 text-gray-300 py-6 px-10 flex justify-between items-center text-sm mt-auto">
        <p>Helpdesk Kampus by "Tim Pengembang Web"</p>
        <button class="bg-blue-600 hover:bg-blue-500 p-2 rounded text-white transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
            </svg>
        </button>
    </footer>

</body>
</html>