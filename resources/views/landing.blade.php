<x-front-layout>
    <!-- Tambahkan link ke Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">

    <!-- Tambahkan style untuk mengatur font -->
    <style>
        body, h1, h2, h3, h4, h5, h6, p, a, span, strong {
            font-family: 'Source Serif 4', serif !important;
        }
    </style>

    <!-- Video Banner Section -->
    <section class="relative h-screen overflow-hidden">
        <!-- Video Background -->
        <div class="absolute inset-0 bg-black/30 z-10"></div>
        <video class="absolute inset-0 w-full h-full object-cover" autoplay muted loop playsinline>
            <source src="https://seadoosafarisamosir.com/header.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Banner Content -->
        <div class="container relative z-20 h-full flex flex-col justify-center items-center text-center px-4">
            <div data-aos="fade-up" data-aos-duration="1000" class="max-w-3xl">
                <h2 class="text-4xl md:text-6xl font-bold uppercase text-white mb-4">
                    <strong>MOMENT SERU DIMULAI </strong>
                </h2>
                <h3 class="text-2xl md:text-4xl font-semibold text-yellow-400 mb-6">SEADOO SAFARI SAMOSIR</h3>
                <p class="text-lg md:text-xl text-white mb-8">
                    Rasakan petualangan air yang beda dari biasanya.<br>
                    LANGKAH BARU,CERITA BARU !
                </p>
                <a href="#packages" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 px-8 rounded-full text-lg transition duration-300 transform hover:scale-105">
                    Yuk Mulai !
                </a>
            </div>
        </div>
    </section>

    <!-- Popular Cars -->
    <section id="packages" class="bg-black py-5">
        <div class="container">
            <header class="mb-5 text-center">
                <h1 class="text-lg font-semibold text-white">DESTINASI</h1>
                <h2 class="text-4xl font-bold text-warning">TUJUAN WISATA</h2>
            </header>

            <!-- Carousel -->
            <div id="destinationCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @php
                        $chunks = $detail_pakets->chunk(4); // 4 cards per slide for desktop
                    @endphp

                    @foreach ($chunks as $index => $chunk)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                @foreach ($chunk as $detail_paket)
                                    <div class="col-span-1">
                                        <!-- Card -->
                                        <div
                                            class="bg-dark text-white rounded-3xl overflow-hidden shadow-lg h-full flex flex-col">
                                            <!-- Gambar -->
                                            <img src="{{ $detail_paket->thumbnail }}"
                                                alt="{{ $detail_paket->pilihpaket ? $detail_paket->pilihpaket->nama_paket : 'Jetski' }}"
                                                class="w-full h-[150px] object-cover">

                                            <!-- Konten -->
                                            <div class="p-4 flex flex-col flex-grow">
                                                <!-- Nama Paket -->
                                                <h5 class="text-white text-lg font-bold mb-1">
                                                    {{ $detail_paket->pilihpaket ? $detail_paket->pilihpaket->nama_paket : '-' }}
                                                </h5>

                                                <!-- Durasi -->
                                                <div class="flex justify-between items-center mb-2">
                                                    <span class="text-sm text-gray-400">
                                                      Durasi Paket  {{ $detail_paket->pilihpaket ? $detail_paket->pilihpaket->durasi : '-' }}
                                                        Menit
                                                    </span>
                                                </div>

                                                <!-- Harga & Tombol -->
                                                <div class="flex justify-between items-center mt-auto pt-2">
                                                    <!-- Harga -->
                                                    <span class="text-yellow-500 font-bold text-base">
                                                        Rp.
                                                        {{ $detail_paket->pilihpaket ? number_format($detail_paket->pilihpaket->harga, 0, ',', '.') : '-' }}
                                                    </span>

                                                    <!-- Tombol Book Now -->
                                                    <a href="{{ route('front.detail', $detail_paket->id) }}"
                                                        class="bg-yellow-500 hover:bg-yellow-600 text-black text-sm font-semibold px-6 py-1 rounded-md transition">
                                                        Pesan
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Custom Carousel Controls (Bootstrap tetap digunakan untuk fungsionalitas) -->
                <button class="carousel-control-prev position-absolute start-1 top-50 translate-middle-y"
                    type="button" data-bs-target="#destinationCarousel" data-bs-slide="prev" style="left: -50px;">
                    <span class="carousel-control-prev-icon bg-warning rounded-circle p-3"
                        aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next position-absolute end-1 top-50 translate-middle-y"
                    type="button" data-bs-target="#destinationCarousel" data-bs-slide="next" style="right: -50px;">
                    <span class="carousel-control-next-icon bg-warning rounded-circle p-3"
                        aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
    </section>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</x-front-layout>
