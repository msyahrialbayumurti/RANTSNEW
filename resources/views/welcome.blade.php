<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Beranda</title>
    <link rel="icon" href="{{ asset('assets/img/iconrants.png') }}" sizes="20x20" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    <scrip src="https://cdn.tailwindcss.com"></scrip>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>


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
        /* padding-top: 5rem; */
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    main {
        flex: 1;
    }

    footer {
        margin-top: auto;
    }

    /* Modal overlay */
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: flex-start;
        z-index: 9999;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    /* Show modal */
    .modal.active {
        opacity: 1;
        visibility: visible;
    }

    /* Modal content */
    .modal-content {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        width: 400px;
        margin: 20px;
        padding: 20px;
        animation: slideIn 0.3s ease;
    }

    /* Modal header */
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #e5e5e5;
        padding-bottom: 10px;
        margin-bottom: 15px;
    }

    .modal-header h2 {
        font-size: 18px;
        font-weight: bold;
        color: #333;
    }

    /* Close button */
    .modal-close {
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        color: #333;
    }

    /* Modal body */
    .modal-body ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .modal-body li {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .modal-body li img {
        width: 40px;
        height: 40px;
        margin-right: 15px;
    }

    .modal-body li p {
        margin: 0;
        font-size: 14px;
        color: #555;
    }

    .modal-body li strong {
        font-size: 14px;
        color: #333;
    }

    .modal-footer {
        text-align: center;
        margin-top: 20px;
    }

    .modal-footer a {
        font-size: 14px;
        color: #007bff;
        text-decoration: none;
    }

    .modal-footer a:hover {
        text-decoration: underline;
    }

    /* Animation */
    @keyframes slideIn {
        from {
            transform: translateY(-100%);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .notification-button {
        position: relative;
    }

    .notification-button .absolute {
        position: absolute;
        transform: translate(50%, -50%);
        font-weight: bold;
    }

    .calendar-card {
        background: #ffffff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
    }

    .service-card:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease-in-out;
    }

    .zoom-in {
        animation: zoomIn 1.5s ease-in-out;
    }
    </style>

</head>

<body class="bg-gray-100">


    <!-- Header -->
    <header class="bg-gray-100 shadow-md top-0 z-50 sticky w-full">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-20">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('index') }}">
                    <img class="h-12" src="{{ asset('assets/img/TransaparentRants (300 x 100 piksel).svg') }}"
                        alt="Logo">
                </a>
            </div>

            <div id="menu" class="hidden md:flex items-center justify-between w-full font-medium">
                <!-- Navigation Links (Tengah) -->
                <div class="flex space-x-4 mx-auto">
                    <a href="{{ route('index') }}"
                        class="{{ Route::is('index') ? 'text-red-700 font-semibold' : 'text-gray-500' }} hover:text-red-700 transition duration-300">Beranda</a>
                    <a href="{{ route('layanan') }}"
                        class="{{ Route::is('layanan') ? 'text-red-700 font-semibold' : 'text-gray-500' }} hover:text-red-700 transition duration-300">Layanan</a>
                    <a href="{{ route('kontak') }}"
                        class="{{ Route::is('kontak') ? 'text-red-700 font-semibold' : 'text-gray-500' }} hover:text-red-700 transition duration-300">Kontak</a>

                    @auth
                    <a href="{{ route('riwayat') }}"
                        class="{{ Route::is('riwayat') ? 'text-red-700 font-semibold' : 'text-gray-500' }} hover:text-red-700 transition duration-300">Riwayat</a>
                    <a href="{{ route('profil') }}"
                        class="{{ Route::is('profil') ? 'text-red-700 font-semibold' : 'text-gray-500' }} hover:text-red-700 transition duration-300">Profil</a>
                    @endauth
                </div>

                <!-- Notifikasi dan Login/Logout (Kanan) -->
                <div class="flex items-center space-x-4">
                    @auth
                    <!-- Notification Icon -->
                    <button id="notification-button" class="relative notification-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 hover:text-red-700"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span
                            class="absolute top-0 right-0 bg-red-600 text-white rounded-full text-xs w-4 h-4 flex items-center justify-center">3</span>
                    </button>

                    <!-- Logout Button -->
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="text-red-600 hover:underline">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>


                    <!-- <a href="{{ route('logout') }}"
                        class="block px-4 py-2 text-white rounded-md hover:bg-red-600 transition duration-300"
                        style="background: linear-gradient(180deg, hsla(57, 99%, 50%, 1) 0%, hsla(9, 100%, 51%, 1) 100%); max-width: 200px;">Logout</a> -->
                    @else
                    <!-- Login Button -->
                    {{-- <a href="{{ route('login') }}"
                        class="block px-4 py-2 text-white rounded-md hover:bg-blue-600 transition duration-300"
                        style="background: linear-gradient(180deg, hsla(57, 99%, 50%, 1) 0%, hsla(9, 100%, 51%, 1) 100%); max-width: 200px;">Login</a> --}}
                    @endauth
                </div>
            </div>


            <!-- Hamburger Menu -->
            <div class="md:hidden">
                <button id="menu-button"
                    class="text-gray-600 hover:text-red-700 focus:outline-none flex items-center justify-center">
                    <div id="icon-container" class="relative w-6 h-6">
                        <span
                            class="block w-full rounded-full h-1 bg-gray-600 transform transition duration-300 ease-in-out origin-center"></span>
                        <span
                            class="block w-full rounded-full h-1 bg-gray-600 mt-1 transform transition duration-300 ease-in-out origin-center"></span>
                        <span
                            class="block w-full rounded-full h-1 bg-gray-600 mt-1 transform transition duration-300 ease-in-out origin-center"></span>
                    </div>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu"
            class="hidden md:hidden mt-4 space-y-2 font-medium transform scale-y-0 opacity-0 origin-top transition-all duration-300 ease-in-out">
            <!-- Link Menu -->
            <a href="{{ route('index') }}"
                class="{{ Route::is('index') ? 'text-red-700 py-2 px-3' : 'text-gray-500' }} hover:text-red-700 transition duration-300 block py-2 px-3">Beranda</a>
            <a href="{{ route('layanan') }}"
                class="{{ Route::is('layanan') ? 'text-red-700 py-2 px-3' : 'text-gray-500' }} hover:text-red-700 transition duration-300 block py-2 px-3">Layanan</a>
            <a href="{{ route('kontak') }}"
                class="{{ Route::is('kontak') ? 'text-red-700 py-2 px-3' : 'text-gray-500' }} hover:text-red-700 transition duration-300 block py-2 px-3">Kontak</a>

            @auth
            {{-- <a href="{{ route('riwayat') }}"
                class="{{ Route::is('riwayat') ? 'text-red-700 py-2 px-3' : 'text-gray-500' }} hover:text-red-700 transition duration-300 block py-2 px-3">Riwayat</a> --}}
            {{-- <a href="{{ route('profil') }}"
                class="{{ Route::is('profil') ? 'text-red-700 py-2 px-3' : 'text-gray-500' }} hover:text-red-700 transition duration-300 block py-2 px-3">Profil</a> --}}
            @endauth

            <!-- Login/Logout Button in Center -->
            <div class="mt-6 text-center">
                @auth
                {{-- <a href="{{ route('logout') }}"
                    class="inline-block px-4 py-2 text-white text-sm rounded-md hover:bg-red-600 transition duration-300"
                    style="background: linear-gradient(180deg, hsla(57, 99%, 50%, 1) 0%, hsla(9, 100%, 51%, 1) 100%);">Logout</a> --}}
                @else
                {{-- <a href="{{ route('login') }}"
                    class="inline-block px-4 py-2 text-white text-sm rounded-md hover:bg-blue-600 transition duration-300"
                    style="background: linear-gradient(180deg, hsla(57, 99%, 50%, 1) 0%, hsla(9, 100%, 51%, 1) 100%);">Login</a> --}}
                @endauth
            </div>
        </div>



    </header>


    <!-- Notification Modal -->
    <div id="notification-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Notifikasi</h2>
                <button id="close-modal" class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>Notifikasi 1: Pesan baru diterima.</li>
                    <li>Notifikasi 2: Jadwal acara diperbarui.</li>
                    <li>Notifikasi 3: Penawaran baru tersedia.</li>
                </ul>
                <div class="modal-footer">
                    <a href="#">Tampilkan Semua</a>
                </div>
            </div>
        </div>
    </div>



    <script>
    // JavaScript for toggling the mobile menu and animating the hamburger icon
    const menuButton = document.getElementById('menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const iconContainer = document.getElementById('icon-container');
    const lines = iconContainer.querySelectorAll('span');

    menuButton.addEventListener('click', () => {
        // Animate mobile menu appearance/disappearance
        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden');
            setTimeout(() => {
                mobileMenu.classList.add('scale-y-100', 'opacity-100');
                mobileMenu.classList.remove('scale-y-0', 'opacity-0');
            }, 10); // Small delay to allow transition
        } else {
            mobileMenu.classList.add('scale-y-0', 'opacity-0');
            mobileMenu.classList.remove('scale-y-100', 'opacity-100');
            setTimeout(() => {
                mobileMenu.classList.add('hidden');
            }, 300); // Match the duration of the transition
        }

        // Animate hamburger icon to X and back
        lines[0].classList.toggle('rotate-45');
        lines[0].classList.toggle('translate-y-2');

        lines[1].classList.toggle('opacity-0');

        lines[2].classList.toggle('-rotate-45');
        lines[2].classList.toggle('-translate-y-2');
    });


    const modal = document.getElementById("notification-modal");
    const modalButton = document.getElementById("notification-button");
    const closeModal = document.getElementById("close-modal");

    modalButton.addEventListener("click", () => {
        modal.classList.toggle("active");
    });

    closeModal.addEventListener("click", () => {
        modal.classList.remove("active");
    });

    window.addEventListener("click", (e) => {
        if (!modal.contains(e.target) && !modalButton.contains(e.target)) {
            modal.classList.remove("active");
        }
    });
    </script>
    <button id="backToTop"
        class="fixed bottom-6 right-6 bg-red-600 w-12 h-12 text-white rounded-full p-0  shadow-md shadow-red-700 hover:bg-red-700 focus:outline-none hidden transition duration-300"><i
            class="fa-solid fa-arrow-up"></i>
    </button>

    <!-- Inline Script -->
    <script>
    // Select the Back to Top button
    const backToTopButton = document.getElementById('backToTop');

    // Show/hide button on scroll
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            backToTopButton.classList.remove('hidden');
        } else {
            backToTopButton.classList.add('hidden');
        }
    });

    // Scroll to top functionality
    backToTopButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth',
        });
    });
    </script>



    <!-- Content Section (just for demo) -->
    <div data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1000">



        <section class="relative w-full h-auto m-0 p-0">
            <!-- Container untuk Banner -->
            <div class="relative w-full" style="aspect-ratio: 957/349;">
                <!-- Background Image -->
                <img src="{{ asset('assets/img/landingpage/BannerLandingPage.png') }}" alt="Banner"
                    class="absolute top-0 left-0 w-full h-full object-cover">

                <!-- Tombol Selengkapnya -->
                <div class="absolute flex items-center z-10
                            top-[50%]
                            sm:top-[60%]
                            md:top-[65%]
                            left-[calc(50%-45px)]
                            sm:left-[calc(50%-70px)]
                            md:left-[calc(50%-90px)]
                            transform
                            translate-y-[calc(-60%+30px)]
                            sm:translate-y-[calc(-50%+35px)]
                            md:translate-y-[calc(-50%+43px)]">
                    <a href="#services" class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 md:py-3 md:px-6 lg:py-4 lg:px-8 rounded-lg shadow-lg transition text-sm md:text-base lg:text-lg">Selengkapnya</a>
                </div>
            </div>
        </section>
    </div>

    <!-- Section fitur-->

    <div data-aos="fade-up" data-aos-duration="1000">
        <section class="py-16 bg-gray-50">
            <!-- Heading Section -->
            <div class="text-center">
                <span class="bg-pink-200 text-red-600 text-sm font-medium px-4 py-1 rounded-full">Our Advantages</span>
                <h2 class="mt-4 text-3xl font-bold text-gray-900 sm:text-4xl">Kenapa pilih <br /> <span class="text-red-600"> RANTS</span></h2>
            </div>
    </div>

    <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 max-w-7xl mx-auto px-6">
        <!-- Card 1 -->
        <div class="relative bg-white rounded-lg shadow-lg p-6 text-center group overflow-hidden transition-all duration-300 hover:bg-red-800" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
            <div class="text-red-800 group-hover:text-white transition-colors duration-300 relative z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 16s1.5 2 8 2 8-2 8-2m-8-2a4 4 0 100-8 4 4 0 000 8z" />
                </svg>
            </div>
            <h3
                class="mt-4 text-xl font-bold text-gray-800 group-hover:text-white transition-colors duration-300 relative z-10">
                Layanan Terintegrasi untuk Kebutuhan Seni Pertunjukan
            </h3>
            <p
                class="mt-2 text-sm text-gray-600 group-hover:text-gray-200 transition-colors duration-300 relative z-10">
                RANTS menyediakan berbagai kebutuhan seni pertunjukan dalam satu platform, mulai dari sewa jasa tari
                profesional, kostum, hingga layanan make-up. Pengguna tidak perlu repot mencari penyedia layanan secara
                terpisah, karena semua tersedia dalam satu aplikasi.
            </p>
            <span
                class="absolute bottom-0 left-0 w-full h-1 bg-red-800 group-hover:h-full group-hover:bottom-0 transition-all duration-500 ease-out"></span>
        </div>

        <!-- Card 2 -->
        <div class="relative bg-white rounded-lg shadow-lg p-6 text-center group overflow-hidden transition-all duration-300 hover:bg-red-800"
            data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1000">
            <div class="text-red-800 group-hover:text-white transition-colors duration-300 relative z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 9V7a4 4 0 10-8 0v2m-2 0a6 6 0 0112 0v2M5 21h14m-7-4v4m4-4H8" />
                </svg>
            </div>
            <h3
                class="mt-4 text-xl font-bold text-gray-800 group-hover:text-white transition-colors duration-300 relative z-10">
                Tim Profesional dan Berpengalaman
            </h3>
            <p
                class="mt-2 text-sm text-gray-600 group-hover:text-gray-200 transition-colors duration-300 relative z-10">
                RANTS menjamin kualitas layanan dengan menghadirkan tim profesional dan berpengalaman di bidang seni
                tari, tata rias, dan penyewaan kostum. Setiap layanan dipilih secara selektif untuk memastikan kepuasan
                pelanggan.
            </p>
            <span
                class="absolute bottom-0 left-0 w-full h-1 bg-red-800 group-hover:h-full group-hover:bottom-0 transition-all duration-500 ease-out"></span>
        </div>

        <!-- Card 3 -->
        <div class="relative bg-white rounded-lg shadow-lg p-6 text-center group overflow-hidden transition-all duration-300 hover:bg-red-800"
            data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500">
            <div class="text-red-800 group-hover:text-white transition-colors duration-300 relative z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 9V7a4 4 0 10-8 0v2m-2 0a6 6 0 0112 0v2M5 21h14m-7-4v4m4-4H8" />
                </svg>
            </div>
            <h3
                class="mt-4 text-xl font-bold text-gray-800 group-hover:text-white transition-colors duration-300 relative z-10">
                Katalog Lengkap dan Mudah Diakses
            </h3>
            <p
                class="mt-2 text-sm text-gray-600 group-hover:text-gray-200 transition-colors duration-300 relative z-10">
                Aplikasi/website RANTS memiliki katalog lengkap untuk layanan sewa kostum, jenis tarian, dan gaya
                make-up. Pengguna dapat dengan mudah memilih sesuai dengan kebutuhan mereka melalui antarmuka yang
                intuitif.
            </p>
            <span
                class="absolute bottom-0 left-0 w-full h-1 bg-red-800 group-hover:h-full group-hover:bottom-0 transition-all duration-500 ease-out"></span>
        </div>

        <!-- Card 4 -->
        <div class="relative bg-white rounded-lg shadow-lg p-6 text-center group overflow-hidden transition-all duration-300 hover:bg-red-800"
            data-aos="fade-up" data-aos-easing="linear" data-aos-duration="2500">
            <div class="text-red-800 group-hover:text-white transition-colors duration-300 relative z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 16s1.5 2 8 2 8-2 8-2m-8-2a4 4 0 100-8 4 4 0 000 8z" />
                </svg>
            </div>
            <h3
                class="mt-4 text-xl font-bold text-gray-800 group-hover:text-white transition-colors duration-300 relative z-10">
                Kemudahan Booking dan Penjadwalan Online
            </h3>
            <p
                class="mt-2 text-sm text-gray-600 group-hover:text-gray-200 transition-colors duration-300 relative z-10">
                Kami menawarkan fitur pemesanan online yang fleksibel, memungkinkan pengguna untuk memesan layanan kapan
                saja dan di mana saja. Penjadwalan yang transparan dan real-time membantu pengguna mengatur kebutuhan
                mereka tanpa kendala
            </p>
            <span
                class="absolute bottom-0 left-0 w-full h-1 bg-red-800 group-hover:h-full group-hover:bottom-0 transition-all duration-500 ease-out"></span>
        </div>
    </div>

    </section>

    <div data-aos="fade-up" data-aos-duration="1000">
        <section id="services" class="py-16 bg-gray-50 mt-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 my-14">Layanan Kami</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-lg shadow-lg hover:shadow-xl p-6 group transition" data-aos="fade-up"
                        data-aos-easing="linear" data-aos-duration="500">
                        <div class="flex justify-center mb-4">
                            <i class="fas fa-drum text-red-500 text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-center group-hover:text-red-600">Penyewaan Jasa Tari</h3>
                        <p class="text-gray-600 text-center mt-2">Penari profesional untuk berbagai acara, dari
                            pernikahan hingga pertunjukan seni.</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg hover:shadow-xl p-6 group transition" data-aos="fade-up"
                        data-aos-easing="linear" data-aos-duration="700">
                        <div class="flex justify-center mb-4">
                            <i class="fas fa-tshirt text-yellow-500 text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-center group-hover:text-red-600">Penyewaan Kostum</h3>
                        <p class="text-gray-600 text-center mt-2">Kostum tradisional dan modern untuk semua kebutuhan
                            acara Anda.</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg hover:shadow-xl p-6 group transition" data-aos="fade-up"
                        data-aos-easing="linear" data-aos-duration="900">
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
    </div>

    <section class="py-16 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Galeri Kegiatan</h2>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide bg-white rounded-lg shadow-lg hover:shadow-xl overflow-hidden transition">
                        <img src="{{ asset('assets/img/landingpage/1.png') }}" alt="Gallery Image 1"
                            class="w-full h-48 object-cover">
                        <div class="p-4">
                            <p class="text-gray-600 text-center">Pertunjukan Tari Tradisional di Event Kebudayaan.
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide bg-white rounded-lg shadow-lg hover:shadow-xl overflow-hidden transition">
                        <img src="{{ asset('assets/img/landingpage/2.jpg') }}" alt="Gallery Image 2"
                            class="w-full h-48 object-cover">
                        <div class="p-4">
                            <p class="text-gray-600 text-center">Workshop Tata Rias dan Kostum untuk Generasi Muda.
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide bg-white rounded-lg shadow-lg hover:shadow-xl overflow-hidden transition">
                        <img src="{{ asset('assets/img/landingpage/5.jpg') }}" alt="Gallery Image 3" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <p class="text-gray-600 text-center">Latihan Rutin di Sanggar dengan Anggota Baru.</p>
                        </div>
                    </div>
                    <div class="swiper-slide bg-white rounded-lg shadow-lg hover:shadow-xl overflow-hidden transition">
                        <img src="{{ asset('assets/img/landingpage/4.jpg') }}" alt="Gallery Image 2"class="w-full h-48 object-cover">
                        <div class="p-4">
                            <p class="text-gray-600 text-center">Workshop Tata Rias dan Kostum untuk Generasi Muda.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Contact Info -->
    <footer class="bg-red-800 text-white py-12 mt-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Logo and Description -->
            <div>
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-20 w-auto">
                    {{-- <h3 class="text-xl font-semibold">RANTS</h3> --}}
                </div>
                <p class="mt-4 text-gray-300">
                    {{-- There are many vari of pass of lorem ipsum availab but the majority have suffered in some form by
                        injected humour or words. --}}
                </p>
                <div class="flex space-x-4 mt-6">
                    <a href="#" class="bg-red-700 p-3 rounded-full hover:bg-red-600 transition">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="#" class="bg-red-700 p-3 rounded-full hover:bg-red-600 transition">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>
                    <a href="https://www.instagram.com/rants.id?igsh=MXh4bHMzNmd2Y3Q3ag=="
                        class="bg-red-700 p-3 rounded-full hover:bg-red-600 transition">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>
            <!-- Services -->
            <div>
                <h4 class="text-lg font-semibold border-b-2 border-red-400 pb-2">Layanan</h4>
                <ul class="mt-4 space-y-2 text-gray-300">
                    <li><a href="#" class="hover:text-white transition">Jasa Tari</a></li>
                    <li><a href="#" class="hover:text-white transition">Sewa Kostum</a></li>
                    <li><a href="#" class="hover:text-white transition">Jasa Make Up</a></li>
                </ul>
            </div>
            <!-- Useful Links -->
            <div>
                <h4 class="text-lg font-semibold border-b-2 border-red-400 pb-2">Lebih Lanjut</h4>
                <ul class="mt-4 space-y-2 text-gray-300">
                    <li><a href="#" class="hover:text-white transition">Dashboard</a></li>
                    {{-- <li><a href="#" class="hover:text-white transition">Service</a></li>
                        <li><a href="#" class="hover:text-white transition">FAQ's</a></li> --}}
                    <li><a href="#" class="hover:text-white transition">Contact</a></li>
                </ul>
            </div>
            <!-- Location -->
            <div>
                <h4 class="text-lg font-semibold border-b-2 border-red-400 pb-2">Lokasi</h4>
                <div class="mt-4 rounded-lg overflow-hidden shadow-lg">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7608.522918959678!2d102.1442280167053!3d1.4582093023032396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d15f03d7b3411b%3A0x855da8ac290dbf9d!2sGedung%20Utama%20Direktorat%20Polbeng!5e0!3m2!1sid!2sid!4v1736478038303!5m2!1sid!2sid"
                        width="600" height=200" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

        <!-- Contact Info -->
        <div class="mt-12 border-t border-gray-600 pt-8">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 text-gray-300">
                <div class="flex items-center space-x-4">
                    <div class="bg-red-700 p-3 rounded-full">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div>
                        <h5 class="font-semibold">Email</h5>
                        <p>rantsrpl5b@gmail.com</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="bg-red-700 p-3 rounded-full">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div>
                        <h5 class="font-semibold">Nomor Telepon</h5>
                        <p>(+62) 852 6394 5612</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="bg-red-700 p-3 rounded-full">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div>
                        <h5 class="font-semibold">Alamat</h5>
                        <p>Jl. Bathin Alam, Sungai Alam, Bengkalis, Riau</p>
                    </div>
                </div>
            </div>
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