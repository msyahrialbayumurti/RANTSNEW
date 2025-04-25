<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Selamat Datang di Sanggar Tari</title>
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" sizes="20x20" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <style>
    .fade-in {
        animation: fadeIn 1.5s ease-in;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .zoom-in {
        animation: zoomIn 1.5s ease-in-out;
    }

    @keyframes zoomIn {
        0% {
            transform: scale(0.8);
            opacity: 0;
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    .slide-up {
        animation: slideUp 1.5s ease-in-out;
    }

    @keyframes slideUp {
        0% {
            transform: translateY(100%);
            opacity: 0;
        }

        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    header {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 50;
        background-color: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    body {
        padding-top: 5rem;
    }
    </style>
</head>

<body class="bg-gray-50 font-sans">
    <header class="bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('index') }} ">
                        <img class="h-12" src="{{ asset('assets/img/TransaparentRants (300 x 100 piksel).svg') }}"
                            alt="Logo">
                    </a>
                </div>

                <!-- Navigation Menu -->
                <div id="menu" class="hidden md:flex space-x-4 mx-auto font-medium">
                    <a href="{{ route('index') }}"
                        class="{{ Route::is('index') ? 'text-red-700 font-semibold' : 'text-gray-500' }} hover:text-red-700 transition duration-300">Beranda</a>
                    <a href="{{ route('home') }}"
                        class="{{ Route::is('home') ? 'text-red-700 font-semibold' : 'text-gray-500' }} hover:text-red-700 transition duration-300">Pesan</a>
                    <a href="{{ route('layanan') }}"
                        class="{{ Route::is('layanan') ? 'text-red-700 font-semibold' : 'text-gray-500' }} hover:text-red-700 transition duration-300">Layanan</a>
                    <a href="{{ route('tentangkami') }}"
                        class="{{ Route::is('tentangkami') ? 'text-red-700 font-semibold' : 'text-gray-500' }} hover:text-red-700 transition duration-300">Tentang
                        Kami</a>
                    <a href="{{ route('kontak') }}"
                        class="{{ Route::is('kontak') ? 'text-red-700 font-semibold' : 'text-gray-500' }} hover:text-red-700 transition duration-300">Kontak</a>
                </div>

                <!-- Hamburger Menu (for screens <= 768px) -->
                <div class="md:hidden">
                    <button id="menu-button" class="text-gray-600 hover:text-red-700 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden mt-4 space-y-2 font-medium">
                <a href="{{ route('index') }}"
                    class="{{ Route::is('index') ? 'text-red-700 font-bold' : 'text-gray-500' }} hover:text-red-700 transition duration-300 block">Beranda</a>
                <a href="{{ route('home') }}"
                    class="{{ Route::is('home') ? 'text-red-700 font-bold' : 'text-gray-500' }} hover:text-red-700 transition duration-300 block">Pesan</a>
                <a href="{{ route('layanan') }}"
                    class="{{ Route::is('layanan') ? 'text-red-700 font-bold' : 'text-gray-500' }} hover:text-red-700 transition duration-300 block">Layanan</a>
                <a href="{{ route('tentangkami') }}"
                    class="{{ Route::is('tentangkami') ? 'text-red-700 font-bold' : 'text-gray-500' }} hover:text-red-700 transition duration-300 block">Tentang
                    Kami</a>
                <a href="{{ route('kontak') }}"
                    class="{{ Route::is('kontak') ? 'text-red-700 font-bold' : 'text-gray-500' }} hover:text-red-700 transition duration-300 block">Kontak</a>
            </div>
        </div>
    </header>

    <script>
    // JavaScript for toggling the mobile menu
    const menuButton = document.getElementById('menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    menuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
    </script>

    <main class="pt-20">
        <section class="relative bg-cover bg-center fade-in"
            style="background-image: url('{{ asset('assets/img/taripersembahan.png') }}'); height: 600px;">
            <div class="flex items-center justify-center h-full bg-black bg-opacity-50 text-center">
                <div class="text-white px-6">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6">Selamat Datang di Sanggar Tari</h1>
                    <p class="text-lg md:text-xl mb-6">RANTS (Ray Entertainments) menyediakan layanan penyewaan jasa
                        tari, makeup, dan kostum. Semua dikerjakan oleh ahli.</p>
                    <a href="#services"
                        class="bg-red-600 hover:bg-red-700 text-white py-3 px-6 rounded-md transition">Jelajahi Layanan
                        Kami</a>
                </div>
            </div>
        </section>

        <section id="services" class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Layanan Kami</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-lg shadow-lg hover:shadow-xl p-6 group transition">
                        <div class="flex justify-center mb-4">
                            <i class="fas fa-drum text-red-500 text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-center group-hover:text-red-600">Penyewaan Jasa Tari</h3>
                        <p class="text-gray-600 text-center mt-2">Penari profesional untuk berbagai acara, dari
                            pernikahan hingga pertunjukan seni.</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg hover:shadow-xl p-6 group transition">
                        <div class="flex justify-center mb-4">
                            <i class="fas fa-tshirt text-yellow-500 text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-center group-hover:text-red-600">Penyewaan Kostum</h3>
                        <p class="text-gray-600 text-center mt-2">Kostum tradisional dan modern untuk semua kebutuhan
                            acara Anda.</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg hover:shadow-xl p-6 group transition">
                        <div class="flex justify-center mb-4">
                            <i class="fas fa-paint-brush text-pink-500 text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-center group-hover:text-red-600">Make Up</h3>
                        <p class="text-gray-600 text-center mt-2">Tata rias profesional untuk meningkatkan penampilan
                            Anda.</p>
                    </div>
                </div>
            </div>
        </section>


        <section class="py-16 bg-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Galeri Kegiatan</h2>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div
                            class="swiper-slide bg-white rounded-lg shadow-lg hover:shadow-xl overflow-hidden transition">
                            <img src="{{ asset('assets/img/1.png') }}" alt="Gallery Image 1" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <p class="text-gray-600 text-center">Pertunjukan Tari Tradisional di Event Kebudayaan.
                                </p>
                            </div>
                        </div>
                        <div
                            class="swiper-slide bg-white rounded-lg shadow-lg hover:shadow-xl overflow-hidden transition">
                            <img src="{{ asset('assets/img/2.jpg') }}" alt="Gallery Image 2" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <p class="text-gray-600 text-center">Workshop Tata Rias dan Kostum untuk Generasi Muda.
                                </p>
                            </div>
                        </div>
                        <div
                            class="swiper-slide bg-white rounded-lg shadow-lg hover:shadow-xl overflow-hidden transition">
                            <img src="{{ asset('assets/img/5.jpg') }}" alt="Gallery Image 3" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <p class="text-gray-600 text-center">Latihan Rutin di Sanggar dengan Anggota Baru.</p>
                            </div>
                        </div>
                        <div
                            class="swiper-slide bg-white rounded-lg shadow-lg hover:shadow-xl overflow-hidden transition">
                            <img src="{{ asset('assets/img/4.jpg') }}" alt="Gallery Image 2" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <p class="text-gray-600 text-center">Workshop Tata Rias dan Kostum untuk Generasi Muda.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-prev"></div>

                </div>
            </div>
        </section>
    </main>

    <section class="py-16 bg-gradient-to-r from-red-500 via-pink-500 to-yellow-500">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center text-white">
            <h2 class="text-4xl font-bold mb-6">Bergabunglah Bersama Kami</h2>
            <p class="text-lg mb-8">Mari kita bersama-sama melestarikan budaya Indonesia melalui seni tari.</p>
        </div>
    </section>

    <footer class="bg-gray-900 text-white py-8">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <p>&copy; {{ date('Y') }} Sanggar Tari. Semua Hak Dilindungi.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
    const swiper = new Swiper('.mySwiper', {
        loop: true,
        spaceBetween: 30,

        slidesPerView: 1,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        },
    });
    </script>
</body>

</html>
