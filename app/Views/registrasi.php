<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Helpdesk Kampus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-600 min-h-screen flex items-center justify-center relative overflow-hidden">
    
    <div class="fixed -bottom-16 -left-16 w-64 h-64 border-[20px] border-blue-500 rounded-full opacity-50 z-0"></div>
    <div class="fixed top-1/3 right-24 w-0 h-0 border-l-[30px] border-l-transparent border-b-[50px] border-b-blue-500 border-r-[30px] border-r-transparent opacity-30 transform rotate-45 z-0"></div>

    <div class="bg-white rounded-lg shadow-2xl p-8 w-full max-w-md relative z-10 my-8">
        
        <div class="absolute top-4 right-4 text-blue-200 text-2xl leading-none tracking-widest"><p>::::</p><p>::::</p></div>
        <div class="absolute bottom-4 left-4 text-blue-200 text-2xl leading-none tracking-widest"><p>::::</p><p>::::</p></div>

        <div class="flex flex-col items-center justify-center mb-6 mt-2">
            <div class="flex items-center space-x-3">
                <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                </svg>
                <h1 class="text-lg font-extrabold text-blue-800 leading-tight">HELPDESK<br>KAMPUS</h1>
            </div>
            <h2 class="mt-4 text-gray-600 font-bold">Daftar Akun Baru</h2>
        </div>

        <form action="/" method="GET">
            <div class="mb-4">
                <input type="text" required placeholder="Nama Lengkap" class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-700 placeholder-gray-400">
            </div>
            <div class="mb-4">
                <input type="text" required placeholder="NIM / NIP" class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-700 placeholder-gray-400">
            </div>
            <div class="mb-6">
                <input type="password" required placeholder="Buat Password" class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-700 placeholder-gray-400">
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-md transition duration-300">
                Buat Akun
            </button>
        </form>

        <div class="text-center mt-6 mb-2">
            <p class="text-gray-500 text-sm">Sudah punya akun? <a href="/" class="text-blue-700 font-semibold hover:underline">Log In di sini</a></p>
        </div>
    </div>
</body>
</html>