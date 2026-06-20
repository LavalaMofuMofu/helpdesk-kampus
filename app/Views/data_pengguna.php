<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna - Panel Admin</title>
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
            <a href="/admin_dashboard" class="hover:text-blue-200 transition-colors">Data Pengaduan</a>
            <a href="/data_tanggapan" class="hover:text-blue-200 transition-colors">Data Tanggapan</a>
            <a href="/data_pengguna" class="font-bold border-b-2 border-white pb-1 transition-colors">Data Pengguna</a>
            <!-- Link Profil Admin -->
            <a href="/profil/admin" class="hover:text-blue-200 transition-colors border-l border-blue-400 pl-6">Profil Admin</a>
            <a href="/" class="hover:text-blue-200 transition-colors">Log Out</a>
        </div>
    </nav>

    <main class="relative z-10 flex-grow flex flex-col items-center pt-8 pb-12 px-4 w-full">

        <h2 class="text-white text-3xl font-bold mb-8 tracking-wide drop-shadow-md">KELOLA DATA PENGGUNA</h2>

        <div class="w-full max-w-6xl bg-white rounded-xl shadow-2xl overflow-hidden p-6 md:p-8">

            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                <div class="relative w-full md:w-80">
                    <input type="text" placeholder="Cari Nama atau NIM/NIP..." class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <button id="btnTambahPengguna" class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-md font-semibold text-sm transition shadow-md flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    <span>Tambah Pengguna Baru</span>
                </button>
            </div>

            <div class="overflow-x-auto border border-gray-200 rounded-lg">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-600 text-sm uppercase tracking-wider border-b border-gray-200">
                            <th class="p-4 font-bold w-12 text-center">No</th>
                            <th class="p-4 font-bold">Nama Lengkap</th>
                            <th class="p-4 font-bold">NIM / NIP</th>
                            <th class="p-4 font-bold text-center">Peran (Role)</th>
                            <th class="p-4 font-bold text-center">Tanggal Daftar</th>
                            <th class="p-4 font-bold w-32 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-700 divide-y divide-gray-200">
                        
                        <tr class="hover:bg-blue-50/50 transition">
                            <td class="p-4 text-center text-gray-500 font-medium">1</td>
                            <td class="p-4 font-bold text-gray-800">Administrator Kampus</td>
                            <td class="p-4 text-gray-600 font-mono">198012345678</td>
                            <td class="p-4 text-center">
                                <span class="bg-purple-100 text-purple-700 border border-purple-200 text-xs font-bold px-3 py-1 rounded-full uppercase">Admin</span>
                            </td>
                            <td class="p-4 text-center text-gray-500">01 Jan 2026</td>
                            <td class="p-4 text-center">
                                <div class="flex justify-center space-x-2">
                                    <button class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded transition shadow-sm" title="Edit Data">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </button>
                                    <button class="bg-gray-300 text-white p-2 rounded cursor-not-allowed" title="Admin Utama Tidak Bisa Dihapus" disabled>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-blue-50/50 transition">
                            <td class="p-4 text-center text-gray-500 font-medium">2</td>
                            <td class="p-4 font-bold text-gray-800">Ahmad Budi Santoso</td>
                            <td class="p-4 text-gray-600 font-mono">2410817210001</td>
                            <td class="p-4 text-center">
                                <span class="bg-blue-100 text-blue-700 border border-blue-200 text-xs font-bold px-3 py-1 rounded-full uppercase">Mahasiswa</span>
                            </td>
                            <td class="p-4 text-center text-gray-500">15 Jun 2026</td>
                            <td class="p-4 text-center">
                                <div class="flex justify-center space-x-2">
                                    <button class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded transition shadow-sm" title="Edit Data">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white p-2 rounded transition shadow-sm" title="Hapus Data">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>

        </div>

        <div id="modalTambah" class="fixed inset-0 z-[100] flex items-center justify-center hidden bg-black/50 backdrop-blur-sm transition-opacity duration-300 opacity-0">
            <div class="bg-white rounded-xl shadow-2xl w-full max-w-md mx-4 overflow-hidden transform scale-95 transition-transform duration-300 relative">
                
                <div class="bg-blue-600 px-6 py-4 flex justify-between items-center text-white">
                    <h3 class="font-bold text-lg tracking-wide">Tambah Pengguna</h3>
                    <button id="closeModal" type="button" class="text-white hover:text-blue-200 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
                
                <form id="formTambahPengguna" class="p-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" required placeholder="Masukkan nama lengkap" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm text-gray-700">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">NIM / NIP</label>
                            <input type="text" required placeholder="Masukkan nomor induk" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm text-gray-700">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Peran (Role)</label>
                            <select required class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm bg-white text-gray-700 cursor-pointer">
                                <option value="" disabled selected>Pilih hak akses...</option>
                                <option value="mahasiswa">Mahasiswa</option>
                                <option value="admin">Administrator</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Password Sementara</label>
                            <input type="password" required placeholder="Buat password awal" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm text-gray-700">
                        </div>
                    </div>
                    
                    <div class="mt-8 flex justify-end space-x-3">
                        <button type="button" id="batalModal" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-md transition text-sm">Batal</button>
                        <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-md transition text-sm shadow-md">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer class="relative z-10 w-full bg-gray-800 text-gray-300 py-6 px-10 flex justify-between items-center text-sm mt-auto">
        <p>Helpdesk Kampus Panel Admin v1.0</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const modal = document.getElementById('modalTambah');
        const btnTambah = document.getElementById('btnTambahPengguna');
        const closeBtn = document.getElementById('closeModal');
        const batalBtn = document.getElementById('batalModal');
        const formTambah = document.getElementById('formTambahPengguna');

        // Fungsi Membuka Modal dengan Animasi
        btnTambah.addEventListener('click', () => {
            modal.classList.remove('hidden');
            // Sedikit delay agar transisi CSS terbaca
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modal.querySelector('div').classList.remove('scale-95');
                modal.querySelector('div').classList.add('scale-100');
            }, 10);
        });

        // Fungsi Menutup Modal dengan Animasi
        const closeModalFunc = () => {
            modal.classList.add('opacity-0');
            modal.querySelector('div').classList.remove('scale-100');
            modal.querySelector('div').classList.add('scale-95');
            
            // Tunggu animasi selesai baru sembunyikan elemennya
            setTimeout(() => {
                modal.classList.add('hidden');
                formTambah.reset(); // Mengosongkan form kembali
            }, 300);
        };

        // Pasang trigger tutup ke tombol silang (X) dan tombol Batal
        closeBtn.addEventListener('click', closeModalFunc);
        batalBtn.addEventListener('click', closeModalFunc);

        // Mencegah form tertutup saat area dalam form diklik, 
        // tapi menutup jika area background luar/blur diklik
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModalFunc();
            }
        });

        // Logika saat tombol "Simpan Data" ditekan
        formTambah.addEventListener('submit', function(e) {
            e.preventDefault(); // Tahan reload halaman
            
            closeModalFunc(); // Tutup pop-up form
            
            // Tampilkan notifikasi sukses
            Swal.fire({
                title: 'Berhasil Disimpan!',
                text: 'Data pengguna baru telah berhasil ditambahkan ke dalam database.',
                icon: 'success',
                confirmButtonColor: '#2563EB',
                confirmButtonText: 'Tutup'
            });
        });
    </script>

</body>
</html>