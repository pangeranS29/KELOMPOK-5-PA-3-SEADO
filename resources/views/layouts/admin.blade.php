<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - {{ config('app.name', 'Laravel') }}</title>

    <!-- Tailwind CSS (opsional jika belum ada) -->
    @vite('resources/css/app.css') {{-- Atau link CDN Tailwind jika tidak menggunakan Vite --}}

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900 antialiased">

    <!-- Navbar atau Sidebar bisa ditaruh di sini -->
    <div class="">
        <!-- Konten Utama -->
        <main class="flex-1 p-6">
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
    @stack('scripts')
</body>
</html>
