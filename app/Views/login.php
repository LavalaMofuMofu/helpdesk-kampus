<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pengaduan Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-600 min-h-screen flex items-center justify-center relative overflow-hidden">
    
    <!-- Lingkaran Dekorasi Background (Kiri Bawah) -->
    <div class="absolute -bottom-16 -left-16 w-64 h-64 border-[20px] border-blue-500 rounded-full opacity-50"></div>
    
    <!-- Segitiga Dekorasi Background (Kanan) -->
    <div class="absolute top-1/3 right-24 w-0 h-0 border-l-[30px] border-l-transparent border-b-[50px] border-b-blue-500 border-r-[30px] border-r-transparent opacity-30 transform rotate-45"></div>

    <!-- Card Login -->
    <div class="bg-white rounded-lg shadow-2xl p-8 w-full max-w-md relative z-10">
        
        <!-- Ornamen Titik-titik Pojok (Simulasi) -->
        <div class="absolute top-4 right-4 text-blue-200 text-2xl leading-none tracking-widest">
            <p>::::</p>
            <p>::::</p>
        </div>
        <div class="absolute bottom-4 left-4 text-blue-200 text-2xl leading-none tracking-widest">
            <p>::::</p>
            <p>::::</p>
        </div>

        <!-- Bagian Logo & Judul -->
        <div class="flex flex-col items-center justify-center mb-10 mt-4">
            <div class="flex items-center space-x-3">
                <!-- Icon Toa (Megaphone) menggunakan SVG -->
                <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                </svg>
                <h1 class="text-lg font-extrabold text-blue-800 leading-tight">HELPDESK<br>KAMPUS</h1>
            </div>
        </div>

        <!-- Form Input -->
        <form id="loginForm" action="/login" method="POST">
            <?= csrf_field() ?>
            <div class="mb-5">
                <input id="username" name="nomor_induk" type="text" required value="<?= old('nomor_induk') ?>" placeholder="Username / NIM" class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-700 placeholder-gray-400">
            </div>
            <div class="mb-6">
                <input name="password" type="password" required placeholder="Password" class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-700 placeholder-gray-400">
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-md transition duration-300">
                Log In
            </button>
        </form>

        <p class="text-center text-xs text-gray-400 mt-3">Akun demo: NIM <b>198012345678</b> / password <b>admin123</b> (admin), atau NIM <b>2410817210005</b> / password <b>mahasiswa123</b> (mahasiswa).</p>

        <div class="text-center mt-8 mb-2">
            <p class="text-gray-500 text-sm">Belum punya akun? <a href="/registrasi" class="text-blue-700 font-semibold hover:underline">Registrasi</a></p>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if (session()->getFlashdata('error')): ?>
    <script>
        Swal.fire({
            title: 'Gagal',
            text: '<?= esc(session()->getFlashdata('error'), 'js') ?>',
            icon: 'error',
            confirmButtonColor: '#2563EB'
        });
    </script>
    <?php endif; ?>
    <?php if (session()->getFlashdata('sukses')): ?>
    <script>
        Swal.fire({
            title: 'Berhasil',
            text: '<?= esc(session()->getFlashdata('sukses'), 'js') ?>',
            icon: 'success',
            confirmButtonColor: '#2563EB'
        });
    </script>
    <?php endif; ?>
</body>
</html>