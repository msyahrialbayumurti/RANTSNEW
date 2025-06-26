<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Sanggar Tari</title>
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" sizes="20x20" type="image/x-icon">

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f8fafc;
        }

        header {
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 50;
            background-color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        main {
            flex: 1;
            padding-top: 5rem;
        }

        footer {
            margin-top: auto;
            background-color: #334155;
            color: #e2e8f0;
            background-image: url('{{ asset('assets/img/landingpage/jpg25.svg') }}');
            background-size: cover;
            background-position: center;
        }

        /* General Animations */
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

        /* Modal Overlay */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .modal.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 500px;
            padding: 30px;
            animation: popIn 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform: scale(0.9);
        }

        @keyframes popIn {
            0% {
                transform: scale(0.7);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .modal-header h2 {
            font-size: 24px;
            font-weight: 600;
            color: #1a202c;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 2rem;
            cursor: pointer;
            color: #6b7280;
            transition: color 0.2s ease;
        }

        .modal-close:hover {
            color: #ef4444;
        }

        .modal-body ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .modal-body li {
            padding: 10px 0;
            border-bottom: 1px dashed #e5e7eb;
            color: #4a5568;
        }

        .modal-body li:last-child {
            border-bottom: none;
        }

        .modal-footer {
            text-align: center;
            margin-top: 30px;
        }

        .modal-footer a {
            font-size: 16px;
            color: #3b82f6;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .modal-footer a:hover {
            color: #2563eb;
            text-decoration: underline;
        }

        .notification-button {
            position: relative;
        }

        .notification-button .absolute {
            position: absolute;
            transform: translate(50%, -50%);
            font-weight: bold;
            background-color: #ef4444;
            color: white;
            border-radius: 9999px;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
        }

        /* General Card Styles */
        .calendar-card,
        .service-card-container {
            background: #ffffff;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
            border-radius: 16px;
            padding: 2.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .calendar-card:hover,
        .service-card-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }

        /* Calendar specific styles */
        #calendar {
            width: 100%;
            min-height: 400px;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.05);
            background: linear-gradient(to bottom right, #f0f9ff, #e0f2fe);
            border: 1px solid #bfdbfe;
        }

        .has-event {
            background-color: #fffbeb !important;
            border: 2px solid #fcd34d;
            border-radius: 6px;
        }

        .selected-day {
            background-color: #fee2e2 !important;
            border: 2px solid #ef4444;
            border-radius: 6px;
        }

        /* FullCalendar Customizations */
        .fc-header-toolbar {
            margin-bottom: 1.5em !important;
            font-size: 1.1rem;
            color: #334155;
        }

        .fc-button-primary {
            background-color: #3b82f6 !important;
            border-color: #3b82f6 !important;
            color: white !important;
            transition: background-color 0.2s ease, border-color 0.2s ease;
        }

        .fc-button-primary:hover {
            background-color: #2563eb !important;
            border-color: #2563eb !important;
        }

        .fc-daygrid-day-number {
            font-size: 1.1rem;
            font-weight: 600;
            padding: 8px;
        }

        /* Service Cards specific styles */
        .service-card {
            padding: 2rem;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .service-card.bg-blue-50 {
            border-left: 6px solid #3b82f6;
            background-color: #eff6ff;
        }

        .service-card.bg-blue-50:hover {
            background-color: #dbeafe;
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 6px 15px rgba(59, 130, 246, 0.2);
        }

        .service-card.bg-red-50 {
            border-left: 6px solid #ef4444;
            background-color: #fef2f2;
        }

        .service-card.bg-red-50:hover {
            background-color: #fee7e7;
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 6px 15px rgba(239, 68, 68, 0.2);
        }

        .service-card.bg-green-50 {
            border-left: 6px solid #22c55e;
            background-color: #f0fdf4;
        }

        .service-card.bg-green-50:hover {
            background-color: #dcfce7;
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 6px 15px rgba(34, 197, 94, 0.2);
        }

        .service-card h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .service-card p {
            font-size: 1rem;
            color: #555;
        }

        /* Produk Container Styles */
        #produk-container-jasa-tari,
        #produk-container-makeup,
        #produk-container-kostum {
            background: #f0f9ff;
            border: 1px solid #bfdbfe;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            border-radius: 12px;
            padding: 2rem;
        }

        #produk-container-jasa-tari h3,
        #produk-container-makeup h3,
        #produk-container-kostum h3 {
            color: #334155;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .produk-list-item {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .produk-list-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .produk-list-item img {
            border-radius: 6px;
            margin-bottom: 1rem;
        }

        .produk-list-item h3 {
            font-weight: 600;
            font-size: 1.15rem;
            color: #1a202c;
            margin-bottom: 0.5rem;
        }

        .produk-list-item p {
            font-size: 0.95rem;
            color: #4a5568;
            margin-bottom: 0.3rem;
        }

        .produk-list-item p:last-of-type {
            font-weight: 600;
            color: #3b82f6;
        }

        /* Mobile Menu Animation */
        #mobile-menu.active {
            transform: scale-y(1);
            opacity: 1;
        }

        #menu-button.open #icon-container span:nth-child(1) {
            transform: translateY(8px) rotate(45deg);
        }

        #menu-button.open #icon-container span:nth-child(2) {
            opacity: 0;
        }

        #menu-button.open #icon-container span:nth-child(3) {
            transform: translateY(-8px) rotate(-45deg);
        }

        /* Responsive adjustments */
        @media (max-width: 1023px) {
            .calendar-container,
            .service-card-container {
                padding: 1.5rem;
            }

            .modal-content {
                margin: 15px;
                padding: 20px;
            }

            .modal-header h2 {
                font-size: 20px;
            }

            .modal-close {
                font-size: 1.8rem;
            }
        }
    </style>
</head>

<body>
    <header class="bg-gray-100 shadow-md top-0 z-50 sticky w-full">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-20">
            <div class="flex-shrink-0">
                <a href="{{ route('index') }}">
                    <img class="h-12" src="{{ asset('assets/img/TransaparentRants (300 x 100 piksel).svg') }}"
                        alt="Logo">
                </a>
            </div>

            <div id="menu" class="hidden md:flex items-center justify-between w-full font-medium">
                <div class="flex space-x-4 mx-auto">
                    <a href="{{ route('index') }}"
                        class="{{ Route::is('index') ? 'text-rose-700 font-semibold' : 'text-gray-600' }} hover:text-rose-700 transition duration-300">Beranda</a>
                    <a href="{{ route('layanan') }}"
                        class="{{ Route::is('layanan') ? 'text-rose-700 font-semibold' : 'text-gray-600' }} hover:text-rose-700 transition duration-300">Layanan</a>
                    <a href="{{ route('kontak') }}"
                        class="{{ Route::is('kontak') ? 'text-rose-700 font-semibold' : 'text-gray-600' }} hover:text-rose-700 transition duration-300">Kontak</a>

                    @auth
                        <a href="{{ route('riwayat') }}"
                            class="{{ Route::is('riwayat') ? 'text-rose-700 font-semibold' : 'text-gray-600' }} hover:text-rose-700 transition duration-300">Riwayat</a>
                        <a href="{{ route('profil') }}"
                            class="{{ Route::is('profil') ? 'text-rose-700 font-semibold' : 'text-gray-600' }} hover:text-rose-700 transition duration-300">Profil</a>
                    @endauth
                </div>

                <div class="flex items-center space-x-4">
                    @auth
                        <button id="notification-button" class="relative notification-button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 hover:text-rose-700"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span
                                class="absolute top-0 right-0 bg-red-600 text-white rounded-full text-xs w-4 h-4 flex items-center justify-center">3</span>
                        </button>
                    @else
                        <a href="{{ route('login') }}"
                            class="block px-6 py-2 text-white rounded-full shadow-lg hover:shadow-xl transition duration-300 ease-in-out"
                            style="background: linear-gradient(180deg, hsla(57, 99%, 50%, 1) 0%, hsla(9, 100%, 51%, 1) 100%);">Login</a>
                    @endauth
                </div>
            </div>

            <div class="md:hidden">
                <button id="menu-button"
                    class="text-gray-600 hover:text-rose-700 focus:outline-none flex items-center justify-center">
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

        <div id="mobile-menu"
            class="hidden md:hidden mt-4 space-y-2 font-medium transform scale-y-0 opacity-0 origin-top transition-all duration-300 ease-in-out">
            <a href="{{ route('index') }}"
                class="{{ Route::is('index') ? 'text-rose-700 py-2 px-3' : 'text-gray-600' }} hover:text-rose-700 transition duration-300 block py-2 px-3 text-center">Beranda</a>
            <a href="{{ route('layanan') }}"
                class="{{ Route::is('layanan') ? 'text-rose-700 py-2 px-3' : 'text-gray-600' }} hover:text-rose-700 transition duration-300 block py-2 px-3 text-center">Layanan</a>
            <a href="{{ route('kontak') }}"
                class="{{ Route::is('kontak') ? 'text-rose-700 py-2 px-3' : 'text-gray-600' }} hover:text-rose-700 transition duration-300 block py-2 px-3 text-center">Kontak</a>

            @auth
                <a href="{{ route('riwayat') }}"
                    class="{{ Route::is('riwayat') ? 'text-rose-700 py-2 px-3' : 'text-gray-600' }} hover:text-rose-700 transition duration-300 block py-2 px-3 text-center">Riwayat</a>
                <a href="{{ route('profil') }}"
                    class="{{ Route::is('profil') ? 'text-rose-700 py-2 px-3' : 'text-gray-600' }} hover:text-rose-700 transition duration-300 block py-2 px-3 text-center">Profil</a>
            @endauth

            <div class="mt-6 text-center pb-4">
                @auth
                @else
                    <a href="{{ route('login') }}"
                        class="inline-block px-6 py-2 text-white rounded-full shadow-lg hover:shadow-xl transition duration-300 ease-in-out"
                        style="background: linear-gradient(180deg, hsla(57, 99%, 50%, 1) 0%, hsla(9, 100%, 51%, 1) 100%);">Login</a>
                @endauth
            </div>
        </div>
    </header>

    <div id="notification-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Notifikasi</h2>
                <button id="close-modal" class="modal-close">×</button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>Notifikasi 1: Pesan baru diterima.</li>
                    <li>Notifikasi 2: Jadwal acara diperbarui.</li>
                    <li>Notifikasi 3: Penawaran baru tersedia.</li>
                </ul>
                <div class="modal-footer">
                    <a href="{{ route('riwayat') }}">Tampilkan Semua</a>
                </div>
            </div>
        </div>
    </div>

    <main class="bg-gray-100">
        <div class="container mx-auto p-6">
            <div class="text-center mb-10">
                <h1 class="text-5xl font-extrabold text-gray-800 tracking-tight zoom-in">Layanan Kami yang Luar Biasa
                </h1>
                <p class="text-gray-600 mt-4 text-xl fade-in">Penyewaan Jasa Tari, Makeup, dan Kostum Terbaik untuk
                    Acara Anda.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="service-card-container">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6 slide-up">Pilih Layanan Kami</h2>
                    <p class="text-gray-600 mt-2 text-lg mb-6 slide-up">Klik pada layanan di bawah untuk melihat pilihan
                        produk kami yang tersedia.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="service-card bg-blue-50" data-service="jasa-tari">
                            <h3 class="font-semibold text-blue-700">Jasa Tari</h3>
                            <p class="text-gray-600 mt-1">Layanan tari profesional untuk acara spesial Anda, dari
                                tradisional hingga modern.</p>
                        </div>
                        <div class="service-card bg-green-50" data-service="makeup">
                            <h3 class="font-semibold text-green-600">Makeup</h3>
                            <p class="text-gray-600 mt-1">Sentuhan makeup profesional untuk pesta, pemotretan, dan
                                acara istimewa lainnya.</p>
                        </div>
                        <div class="service-card bg-green-50" data-service="kostum">
                            <h3 class="font-semibold text-green-700">Kostum</h3>
                            <p class="text-gray-600 mt-1">Sewa kostum berkualitas tinggi untuk berbagai tema acara,
                                pertunjukan, atau pesta.</p>
                        </div>
                    </div>

                    <div id="produk-container-jasa-tari" class="mt-8 p-6 bg-blue-50 rounded-lg shadow-md hidden">
                        <h3 class="text-2xl font-bold text-blue-800 mb-4">Produk Jasa Tari</h3>
                        <div id="produk-list-jasa-tari" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <p class="text-gray-600 italic col-span-full">Pilih layanan di atas untuk menampilkan
                                produk.</p>
                        </div>
                    </div>

                    <div id="produk-container-makeup" class="mt-8 p-6 bg-red-50 rounded-lg shadow-md hidden">
                        <h3 class="text-2xl font-bold text-red-800 mb-4">Produk Makeup</h3>
                        <div id="produk-list-makeup" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <p class="text-gray-600 italic col-span-full">Pilih layanan di atas untuk menampilkan
                                produk.</p>
                        </div>
                    </div>

                    <div id="produk-container-kostum" class="mt-8 p-6 bg-green-50 rounded-lg shadow-md hidden">
                        <h3 class="text-2xl font-bold text-green-800 mb-4">Produk Kostum</h3>
                        <div id="produk-list-kostum" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <p class="text-gray-600 italic col-span-full">Pilih layanan di atas untuk menampilkan
                                produk.</p>
                        </div>
                    </div>
                </div>

                <div class="calendar-card flex flex-col items-center lg:items-start">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6 slide-up">Jadwal Layanan Kami</h2>
                    <div id="calendar"
                        class="w-full rounded-lg border border-gray-200 shadow-inner bg-gradient-to-r from-blue-50 to-blue-100 calendar">
                    </div>
                    <div id="event-details"
                        class="w-full p-6 bg-gray-50 mt-6 rounded-lg shadow-inner border border-gray-100">
                        <p class="text-gray-500 italic text-center lg:text-left">
                            Klik pada tanggal yang ditandai untuk melihat detail acara.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-white py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div>
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo"
                        class="h-20 w-auto filter grayscale opacity-80">
                </div>
                <p class="text-gray-300 mt-4 text-sm">Rants - Mempersembahkan keindahan seni tari, makeup, dan kostum
                    untuk setiap momen berharga Anda.</p>
            </div>
            <div>
                <h4 class="text-xl font-semibold border-b-2 border-yellow-400 pb-3 mb-4">Layanan</h4>
                <ul class="space-y-3 text-gray-300 text-base">
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Jasa Tari
                            Profesional</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Sewa Kostum Premium</a>
                    </li>
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Jasa Make Up Artist</a>
                    </li>
                </ul>
            </div>
            <div>
                <h4 class="text-xl font-semibold border-b-2 border-yellow-400 pb-3 mb-4">Informasi</h4>
                <ul class="space-y-3 text-gray-300 text-base">
                    <li><a href="{{ route('index') }}"
                            class="hover:text-white transition-colors duration-300">Beranda</a></li>
                    <li><a href="{{ route('layanan') }}"
                            class="hover:text-white transition-colors duration-300">Layanan</a></li>
                    <li><a href="{{ route('kontak') }}"
                            class="hover:text-white transition-colors duration-300">Kontak</a></li>
                    @auth
                        <li><a href="{{ route('riwayat') }}" class="hover:text-white transition-colors duration-300">Riwayat
                                Pesanan</a></li>
                        <li><a href="{{ route('profil') }}" class="hover:text-white transition-colors duration-300">Profil
                                Saya</a></li>
                    @endauth
                </ul>
            </div>
            <div>
                <h4 class="text-xl font-semibold border-b-2 border-yellow-400 pb-3 mb-4">Temukan Kami</h4>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.1764789886367!2d102.10260487532395!3d1.4789512985141075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d4d12a9c3b8893%3A0x867c4d51b3c9b7e7!2sJl.%20Batin%20Alam%2C%20Sungai%20Alam%2C%20Kec.%20Bengkalis%2C%20Kabupaten%20Bengkalis%2C%20Riau!5e0!3m2!1sen!2sid!4v1719417855013!5m2!1sen!2sid"
                    width="100%" height="200" style="border:0; border-radius: 8px;" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="mt-12 border-t border-gray-700 pt-8">
            <div
                class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 text-gray-400 text-sm">
                <div class="flex items-center space-x-4">
                    <div class="bg-gray-700 p-3 rounded-full flex-shrink-0">
                        <i class="fa-solid fa-envelope text-yellow-300"></i>
                    </div>
                    <div>
                        <h5 class="font-semibold text-gray-200">Email</h5>
                        <p>rantsrpl5b@gmail.com</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="bg-gray-700 p-3 rounded-full flex-shrink-0">
                        <i class="fa-solid fa-phone text-yellow-300"></i>
                    </div>
                    <div>
                        <h5 class="font-semibold text-gray-200">Nomor Telepon</h5>
                        <p>(+62) 852 6394 5612</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="bg-gray-700 p-3 rounded-full flex-shrink-0">
                        <i class="fa-solid fa-location-dot text-yellow-300"></i>
                    </div>
                    <div>
                        <h5 class="font-semibold text-gray-200">Alamat</h5>
                        <p>Jl. Bathin Alam, Sungai Alam, Bengkalis, Riau</p>
                    </div>
                </div>
            </div>
            <div class="text-center text-gray-500 mt-10">
                © 2025 Rants. All rights reserved.
            </div>
        </div>
    </footer>

    <div id="order-modal" class="modal hidden">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Formulir Pemesanan</h2>
                <button id="close-order-modal" class="modal-close">×</button>
            </div>
            <div class="modal-body">
                <form id="order-form">
                    <input type="hidden" id="product-id" name="product-id">
                    <div class="mb-4">
                        <label for="product-name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                        <input type="text" id="product-name" name="product-name"
                            class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            readonly>
                    </div>
                    <div class="mb-4">
                        <label for="quantity" class="block text-sm font-medium text-gray-700">Jumlah</label>
                        <input type="number" id="quantity" name="quantity"
                            class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            min="1" required>
                    </div>
                    <div class="mb-4">
                        <label for="customer-name" class="block text-sm font-medium text-gray-700">Nama Pemesan</label>
                        <input type="text" id="customer-name" name="customer-name"
                            class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="customer-email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="customer-email" name="customer-email"
                            class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button type="button" id="cancel-order"
                            class="px-5 py-2 rounded-lg text-gray-700 bg-gray-200 hover:bg-gray-300 transition duration-200 ease-in-out">Batal</button>
                        <button type="submit"
                            class="px-5 py-2 rounded-lg text-white bg-blue-600 hover:bg-blue-700 transition duration-200 ease-in-out">Lanjutkan
                            ke Pembayaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.18.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var eventDetailsEl = document.getElementById('event-details');

            // Data from Controller (ensure $events variable is defined in Laravel)
            var eventsFromDatabase = @json($events ?? []);

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'id', // Indonesian language
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek',
                },
                events: eventsFromDatabase,
                dateClick: function(info) {
                    // Remove 'selected-day' class from all day cells
                    document.querySelectorAll('.fc-daygrid-day').forEach(day => {
                        day.classList.remove('selected-day');
                    });
                    // Add 'selected-day' class to the clicked day cell
                    info.dayEl.classList.add('selected-day');

                    const eventsOnDate = eventsFromDatabase.filter(event => event.start === info.dateStr);

                    if (eventsOnDate.length > 0) {
                        let details = '';
                        eventsOnDate.forEach(event => {
                            details += `
                                <div class='mb-4 p-3 bg-white rounded-lg shadow-sm border border-gray-200'>
                                    <h3 class='text-lg font-bold text-gray-800'>${event.title}</h3>
                                    <p class='text-gray-600 mt-2 text-sm'>${event.description}</p>
                                    <p class='text-gray-500 mt-2 text-xs'>Tanggal: ${new Date(event.start).toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}</p>
                                </div>
                            `;
                        });
                        eventDetailsEl.innerHTML = details;
                    } else {
                        eventDetailsEl.innerHTML =
                            "<p class='text-gray-500 italic text-center lg:text-left p-2'>Tidak ada acara pada tanggal ini.</p>";
                    }
                },
                eventDidMount: function(info) {
                    const dayCell = document.querySelector(`[data-date="${info.event.startStr}"]`);
                    if (dayCell) {
                        dayCell.classList.add('has-event');
                    }
                },
            });

            calendar.render();

            // --- Modal & Mobile Menu Logic ---
            const notificationButton = document.getElementById('notification-button');
            const notificationModal = document.getElementById('notification-modal');
            const closeModalButton = document.getElementById('close-modal');

            if (notificationButton && notificationModal && closeModalButton) {
                notificationButton.addEventListener('click', () => {
                    notificationModal.classList.add('active');
                });

                closeModalButton.addEventListener('click', () => {
                    notificationModal.classList.remove('active');
                });

                notificationModal.addEventListener('click', (e) => {
                    if (e.target === notificationModal) {
                        notificationModal.classList.remove('active');
                    }
                });
            }

            const menuButton = document.getElementById('menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            if (menuButton && mobileMenu) {
                menuButton.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                    mobileMenu.classList.toggle('active'); // Trigger animation
                    menuButton.classList.toggle('open'); // For hamburger icon animation
                });
            }

            // Script for loading products based on service selection
            const services = document.querySelectorAll('.service-card');
            const produkContainers = {
                'jasa-tari': document.getElementById('produk-container-jasa-tari'),
                'makeup': document.getElementById('produk-container-makeup'),
                'kostum': document.getElementById('produk-container-kostum')
            };
            const produkLists = {
                'jasa-tari': document.getElementById('produk-list-jasa-tari'),
                'makeup': document.getElementById('produk-list-makeup'),
                'kostum': document.getElementById('produk-list-kostum')
            };
            const orderModal = document.getElementById('order-modal');
            const closeOrderModal = document.getElementById('close-order-modal');
            const cancelOrder = document.getElementById('cancel-order');
            const orderForm = document.getElementById('order-form');
            let activeService = null;

            // Event listener for each service card
            services.forEach(service => {
                service.addEventListener('click', function() {
                    const layanan = this.getAttribute('data-service');
                    let url;

                    // Determine URL based on service
                    if (layanan === 'kostum') {
                        url = '/produk/kostum';
                    } else if (layanan === 'makeup') {
                        url = '/produk/makeup';
                    } else if (layanan === 'jasa-tari') {
                        url = '/produk/jasa-tari';
                    }

                    // If the same service is not clicked twice
                    if (activeService !== layanan) {
                        activeService = layanan;

                        // Hide all product containers
                        Object.values(produkContainers).forEach(container => {
                            container.classList.add('hidden');
                        });

                        // Fetch product data
                        fetch(url)
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Gagal mengambil data produk');
                                }
                                return response.json();
                            })
                            .then(data => {
                                produkLists[layanan].innerHTML = ''; // Clear previous content

                                // If product data exists
                                if (data.data && data.data.length > 0) {
                                    data.data.forEach(item => {
                                        const imageUrl = `/storage/${item.image || 'default-image.jpg'}`;
                                        produkLists[layanan].innerHTML += `
                                            <div class="bg-white shadow rounded p-4 produk-list-item">
                                                <img src="${imageUrl}" alt="${item.name || item.nama_kostum || item.Kategory || item.jenis_tarian || 'Produk Tidak Diketahui'}" class="w-full h-40 object-cover rounded mb-2">
                                                <h3 class="font-bold text-lg">${item.name || item.nama_kostum || item.Kategory || item.jenis_tarian || 'Produk Tidak Diketahui'}</h3>
                                                ${item.jumlah ? `<p>Jumlah: ${item.jumlah}</p>` : ''}
                                                ${item.warna ? `<p>Warna: ${item.warna}</p>` : ''}
                                                ${item.ukuran ? `<p>Ukuran: ${item.ukuran}</p>` : ''}
                                                ${item.jumlah_penari ? `<p>Jumlah Penari: ${item.jumlah_penari}</p>` : ''}
                                                ${item.deskripsi_acara ? `<p>Deskripsi Acara: ${item.deskripsi_acara}</p>` : ''}
                                                <p class="mt-2 text-blue-600 font-semibold">Harga: Rp ${item.harga || 'Tidak Tersedia'}</p>
                                            </div>
                                        `;
                                    });
                                } else {
                                    produkLists[layanan].innerHTML =
                                        '<p class="text-gray-500 italic col-span-full">Tidak ada produk untuk layanan ini.</p>';
                                }

                                // Show the corresponding product container
                                produkContainers[layanan].classList.remove('hidden');
                            })
                            .catch(error => {
                                produkLists[layanan].innerHTML =
                                    '<p class="text-red-500 italic col-span-full">Terjadi kesalahan saat memuat produk.</p>';
                                console.error(error);
                            });
                    }
                });
            });

            // Event delegation for dynamically added product items to open the order modal
            Object.values(produkLists).forEach(listContainer => {
                listContainer.addEventListener('click', function(event) {
                    const productItem = event.target.closest('.produk-list-item');
                    if (productItem) {
                        const productName = productItem.querySelector('h3').textContent;
                        // You'll need to add a data-product-id attribute to your product HTML for the ID
                        // Example: <div class="produk-list-item" data-product-id="${item.id}">
                        const productId = productItem.getAttribute('data-product-id'); 

                        document.getElementById('product-name').value = productName;
                        document.getElementById('quantity').value = 1; // Default quantity
                        document.getElementById('product-id').value = productId; // Set the product ID

                        orderModal.classList.remove('hidden');
                        orderModal.classList.add('active'); // Use 'active' class for modal animation
                    }
                });
            });

            // Close order modal events
            if (closeOrderModal) {
                closeOrderModal.addEventListener('click', () => {
                    orderModal.classList.remove('active');
                    setTimeout(() => orderModal.classList.add('hidden'), 300); // Hide after animation
                });
            }
            if (cancelOrder) {
                cancelOrder.addEventListener('click', () => {
                    orderModal.classList.remove('active');
                    setTimeout(() => orderModal.classList.add('hidden'), 300); // Hide after animation
                });
            }
            // Close modal when clicking outside
            if (orderModal) {
                orderModal.addEventListener('click', (e) => {
                    if (e.target === orderModal) {
                        orderModal.classList.remove('active');
                        setTimeout(() => orderModal.classList.add('hidden'), 300);
                    }
                });
            }

            // Order form submission
            orderForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const productId = document.getElementById('product-id').value;
                const productName = document.getElementById('product-name').value;
                const quantity = document.getElementById('quantity').value;
                const customerName = document.getElementById('customer-name').value;
                const customerEmail = document.getElementById('customer-email').value;

                // Send data to server to create Midtrans transaction
                fetch('/create_midtrans_transaction', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            // Add CSRF token if using Laravel: 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            product_id: productId,
                            product_name: productName,
                            quantity: quantity,
                            customer_name: customerName,
                            customer_email: customerEmail
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.redirect_url) {
                            // Redirect to Midtrans payment gateway
                            window.location.href = data.redirect_url;
                        } else {
                            alert('Terjadi kesalahan saat membuat transaksi.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat memproses pembayaran.');
                    });
            });
        });
    </script>
</body>

</html>