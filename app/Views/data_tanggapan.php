<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tanggapan - Panel Admin</title>
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
            <a href="/data_tanggapan" class="font-bold border-b-2 border-white pb-1 transition-colors">Data Tanggapan</a>
            <a href="/data_pengguna" class="hover:text-blue-200 transition-colors">Data Pengguna</a>
            <!-- Link Profil Admin -->
            <a href="/profil/admin" class="hover:text-blue-200 transition-colors border-l border-blue-400 pl-6">Profil Admin</a>
            <a href="/logout" class="hover:text-blue-200 transition-colors">Log Out</a>
        </div>
    </nav>

    <main class="relative z-10 flex-grow flex flex-col items-center pt-8 pb-12 px-4 w-full">

        <h2 class="text-white text-3xl font-bold mb-8 tracking-wide drop-shadow-md">REKAP DATA TANGGAPAN</h2>

        <div class="w-full max-w-6xl bg-white rounded-xl shadow-2xl overflow-hidden p-6 md:p-8">

            <div class="flex justify-between items-center mb-6">
                <div class="relative w-72">
                    <input type="text" placeholder="Cari berdasarkan kategori..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>

            <div class="overflow-x-auto border border-gray-200 rounded-lg">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-600 text-sm uppercase tracking-wider border-b border-gray-200">
                            <th class="p-4 font-bold w-12 text-center">No</th>
                            <th class="p-4 font-bold w-40">Tanggal Laporan</th>
                            <th class="p-4 font-bold w-48">Kategori / Aduan</th>
                            <th class="p-4 font-bold">Isi Tanggapan Admin</th>
                            <th class="p-4 font-bold w-32 text-center">Status Akhir</th>
                            <th class="p-4 font-bold w-32 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-700 divide-y divide-gray-200" id="tabelBodyTanggapan">
                        <?php if (empty($daftarTanggapan)): ?>
                        <tr><td colspan="6" class="p-8 text-center text-gray-400">Belum ada tanggapan yang dikirim.</td></tr>
                        <?php endif; ?>
                        <?php foreach ($daftarTanggapan as $i => $row): ?>
                        <?php
                            $warnaStatus = $row['status'] === 'selesai'
                                ? 'bg-green-100 text-green-700 border-green-200'
                                : 'bg-yellow-100 text-yellow-700 border-yellow-200';
                        ?>
                        <tr class="hover:bg-blue-50/50 transition baris-tanggapan" data-kategori="<?= esc(strtolower($row['kategori']), 'attr') ?>">
                            <td class="p-4 text-center text-gray-500 font-medium"><?= $i + 1 ?></td>
                            <td class="p-4"><?= esc(date('d M Y', strtotime($row['tanggal_laporan']))) ?><br><span class="text-xs text-gray-400"><?= esc(date('H:i', strtotime($row['created_at']))) ?> WITA</span></td>
                            <td class="p-4">
                                <span class="block font-semibold text-blue-700"><?= esc($row['kategori']) ?></span>
                                <span class="text-xs text-gray-500 line-clamp-1"><?= esc($row['deskripsi']) ?></span>
                            </td>
                            <td class="p-4 text-gray-600">
                                <p class="line-clamp-2"><?= esc($row['isi_tanggapan']) ?></p>
                            </td>
                            <td class="p-4 text-center">
                                <span class="<?= $warnaStatus ?> border text-xs font-bold px-3 py-1 rounded-full"><?= esc(strtoupper($row['status'])) ?></span>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex justify-center space-x-2">
                                    <button type="button"
                                        class="btn-edit-tanggapan bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded transition shadow-sm"
                                        title="Edit Data"
                                        data-id="<?= $row['id'] ?>"
                                        data-status="<?= esc($row['status'], 'attr') ?>"
                                        data-isi="<?= esc($row['isi_tanggapan'], 'attr') ?>">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </button>
                                    <form action="/data_tanggapan/hapus/<?= $row['id'] ?>" method="POST" class="form-hapus-tanggapan">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded transition shadow-sm" title="Hapus Data">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>

        <div id="modalEditTanggapan" class="fixed inset-0 z-[100] flex items-center justify-center hidden bg-black/50 backdrop-blur-sm transition-opacity duration-300 opacity-0">
            <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg mx-4 overflow-hidden transform scale-95 transition-transform duration-300 relative">
                
                <div class="bg-yellow-500 px-6 py-4 flex justify-between items-center text-white">
                    <h3 class="font-bold text-lg tracking-wide">Edit Tanggapan</h3>
                    <button id="closeModalEdit" type="button" class="text-white hover:text-yellow-100 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
                
                <form id="formEditTanggapan" class="p-6" method="POST" action="/data_tanggapan/update/0">
                    <?= csrf_field() ?>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Ubah Status Akhir</label>
                            <select name="status" id="editStatus" required class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 text-sm bg-white text-gray-700 cursor-pointer">
                                <option value="proses">PROSES (Sedang Ditangani)</option>
                                <option value="selesai">SELESAI (Berhasil Diatasi)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Revisi Isi Tanggapan</label>
                            <textarea name="isi_tanggapan" id="editIsiTanggapan" rows="4" required class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 text-sm text-gray-700 resize-y"></textarea>
                        </div>
                    </div>
                    
                    <div class="mt-8 flex justify-end space-x-3">
                        <button type="button" id="batalModalEdit" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-md transition text-sm">Batal</button>
                        <button type="submit" class="px-5 py-2.5 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded-md transition text-sm shadow-md">Simpan Perubahan</button>
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
        // ================= LOGIKA MODAL EDIT =================
        const modalEdit = document.getElementById('modalEditTanggapan');
        const btnsEdit = document.querySelectorAll('.btn-edit-tanggapan');
        const closeBtnEdit = document.getElementById('closeModalEdit');
        const batalBtnEdit = document.getElementById('batalModalEdit');
        const formEdit = document.getElementById('formEditTanggapan');
        const editStatus = document.getElementById('editStatus');
        const editIsiTanggapan = document.getElementById('editIsiTanggapan');

        const closeModalFunc = () => {
            modalEdit.classList.add('opacity-0');
            modalEdit.querySelector('div').classList.remove('scale-100');
            modalEdit.querySelector('div').classList.add('scale-95');
            setTimeout(() => { modalEdit.classList.add('hidden'); }, 300);
        };

        // Buka modal saat tombol kuning diklik, isi form dengan data baris yang dipilih
        btnsEdit.forEach(btn => {
            btn.addEventListener('click', () => {
                formEdit.action = '/data_tanggapan/update/' + btn.dataset.id;
                editStatus.value = btn.dataset.status;
                editIsiTanggapan.value = btn.dataset.isi;

                modalEdit.classList.remove('hidden');
                setTimeout(() => {
                    modalEdit.classList.remove('opacity-0');
                    modalEdit.querySelector('div').classList.remove('scale-95');
                    modalEdit.querySelector('div').classList.add('scale-100');
                }, 10);
            });
        });

        closeBtnEdit.addEventListener('click', closeModalFunc);
        batalBtnEdit.addEventListener('click', closeModalFunc);

        // Mencegah form tertutup saat area dalam form diklik
        modalEdit.addEventListener('click', (e) => {
            if (e.target === modalEdit) {
                closeModalFunc();
            }
        });

        // ================= LOGIKA TOMBOL HAPUS =================
        // Tombol hapus ada di dalam <form>; SweetAlert cuma konfirmasi,
        // begitu user setuju, form-nya betulan di-submit ke server.
        document.querySelectorAll('.form-hapus-tanggapan').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Hapus Tanggapan?',
                    text: "Data tanggapan ini akan dihapus dari riwayat secara permanen!",
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
        Swal.fire({ title: 'Berhasil!', text: '<?= esc(session()->getFlashdata('sukses'), 'js') ?>', icon: 'success', confirmButtonColor: '#EAB308' });
    </script>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
    <script>
        Swal.fire({ title: 'Gagal', text: '<?= esc(session()->getFlashdata('error'), 'js') ?>', icon: 'error', confirmButtonColor: '#2563EB' });
    </script>
    <?php endif; ?>

</body>
</html>