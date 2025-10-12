<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIPEPO - Sistem Pendataan Posyandu')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Quicksand:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Quicksand', 'Poppins', sans-serif;
            background-color: #f8fafc;
        }
        .btn-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .btn-hover {
            transition: all 0.3s ease;
        }
        .sipepo-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            letter-spacing: 1px;
        }
    </style>
    @stack('styles')
</head>
<body class="min-h-screen flex flex-col">
    @yield('content')
    
    <footer class="py-6 text-center text-white text-sm mobile-style-footer" style="border-radius: 20px 20px 0 0; background-color: #f784c5;">
        © 2025 <span class="sipepo-title" style="color: white;">SIPEPO</span> - Sistem Pendataan Posyandu 
    </footer>

    <script>
        // Initialize AOS and Feather Icons
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
        feather.replace();
    </script>
    @stack('scripts')
</body>
</html>
