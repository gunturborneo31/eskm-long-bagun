<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-SKM Kecamatan Long Bagun</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    boxShadow: {
                        soft: '0 8px 30px rgba(15, 23, 42, 0.08)'
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-[#EAF6FF] text-slate-800">
    <div class="min-h-screen flex items-center justify-center p-4 sm:p-6">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-[28px] shadow-[0_20px_60px_rgba(0,141,213,0.12)] p-6 sm:p-7 border border-[#CFE8F8]">
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('assets/logo_mahulu.png') }}" alt="Lambang Kabupaten Mahakam Ulu" class="w-24 h-24 sm:w-28 sm:h-28 object-contain drop-shadow-[0_8px_20px_rgba(0,141,213,0.2)]" />
                </div>

                <div class="text-center space-y-2">
                    <h1 class="text-xl sm:text-2xl font-extrabold leading-tight text-[#137A5E]">
                        E-SKM KECAMATAN LONG BAGUN
                    </h1>
                    <p class="text-sm text-slate-500">Kabupaten Mahakam Ulu, Kalimantan Timur</p>
                    <p class="text-sm font-semibold text-slate-700">Survei Kepuasan Masyarakat</p>
                </div>

                <div class="mt-8 pt-6 border-t border-slate-200">
                    <a href="{{ url('/skm') }}"
                        class="group flex items-center justify-center w-full rounded-xl bg-[#137A5E] hover:bg-[#0077B8] active:scale-[0.99] transition-all duration-200 text-white font-semibold text-base sm:text-lg py-4 shadow-[0_12px_25px_rgba(0,141,213,0.3)]">
                        Isi Buku Tamu & Survei
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
