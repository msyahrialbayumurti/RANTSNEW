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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/moment@2.18.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.js"></script>

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

        #calendar {
            width: 100%;
            height: auto;
            min-height: 400px;
            /* Tambahkan minimum height jika diperlukan */
            overflow-x: auto;
            /* Untuk mencegah konten meluap */
        }

        .has-event {
            background-color: #ffedd5 !important;
            /* Warna latar untuk tanggal dengan acara */
            border: 2px solid #fdba74;
            /* Warna garis */
            border-radius: 4px;
        }

        .selected-day {
            background-color: #fecaca !important;
            /* Warna latar untuk tanggal yang dipilih */
            border: 2px solid #f87171;
            /* Warna garis */
            border-radius: 4px;
        }

        .service-card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
        }

        .calendar {
            width: 100%;
            max-height: 300px;
            overflow-y: auto;
            border-radius: 8px;
        }

        /* Hover pada kartu layanan */
        .service-card {
            padding: 1.5rem;
            /* Membuat lebih besar */
        }

        .service-card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
        }

        /* Produk container */
        #produk-container {
            background: linear-gradient(145deg, #f3f4f6, #e5e7eb);
            border: 1px solid #d1d5db;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Daftar layanan */
        .daftar-layanan-container {
            flex: 1.5;
            /* Lebih besar dibandingkan jadwal layanan */
        }

        /* Pastikan kontainer kalender tidak mengecil */
        .calendar-container {
            flex-shrink: 0;
        }

        /* Gradasi latar belakang */
        .calendar {
            min-height: 300px;
            max-height: 300px;
            overflow: hidden;
            background: linear-gradient(to right, #ebf8ff, #bee3f8);
        }

    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var eventDetailsEl = document.getElementById('event-details');

            // Data dari Controller
            var eventsFromDatabase = @json($events ?? []);

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'id', // Bahasa Indonesia
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek',
                },
                events: eventsFromDatabase,
                dateClick: function (info) {
                    const eventsOnDate = eventsFromDatabase.filter(event => event.start === info.dateStr);

                    if (eventsOnDate.length > 0) {
                        let details = '';
                        eventsOnDate.forEach(event => {
                            details += `
                                <div class='mb-4'>
                                    <h3 class='text-lg font-bold text-gray-800'>${event.title}</h3>
                                    <p class='text-gray-600 mt-2'>${event.description}</p>
                                    <p class='text-gray-500 mt-2'>Tanggal: ${new Date(event.start).toLocaleDateString('id-ID')}</p>
                                </div>
                            `;
                        });
                        eventDetailsEl.innerHTML = details;

                        document.querySelectorAll('.fc-daygrid-day').forEach(day => {
                            day.classList.remove('selected-day');
                        });
                        info.dayEl.classList.add('selected-day');
                    } else {
                        eventDetailsEl.innerHTML = "<p class='text-gray-500 italic'>Tidak ada acara pada tanggal ini.</p>";
                    }
                },
                eventDidMount: function (info) {
                    const dayCell = document.querySelector(`[data-date="${info.event.startStr}"]`);
                    if (dayCell) {
                        dayCell.classList.add('has-event');
                    }
                },
            });

            calendar.render();
        });
    </script>

</head>

<body>
    <header class="bg-gray-100 shadow-md top-0 z-50 sticky w-full">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-20">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('index') }}">
                    <img class="h-12" src="{{ asset('assets/img/TransaparentRants (300 x 100 piksel).svg') }}" alt="Logo">
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
            <a href="{{ route('riwayat') }}"
                class="{{ Route::is('riwayat') ? 'text-red-700 py-2 px-3' : 'text-gray-500' }} hover:text-red-700 transition duration-300 block py-2 px-3">Riwayat</a>
            <a href="{{ route('profil') }}"
                class="{{ Route::is('profil') ? 'text-red-700 py-2 px-3' : 'text-gray-500' }} hover:text-red-700 transition duration-300 block py-2 px-3">Profil</a>
            @endauth

            <!-- Login/Logout Button in Center -->
            <div class="mt-6 text-center">

                @auth
                <a href="{{ route('riwayat') }}"
                    class="{{ Route::is('riwayat') ? 'text-red-700 py-2 px-3' : 'text-gray-500' }} hover:text-red-700 transition duration-300 block py-2 px-3">Riwayat</a>
                <a href="{{ route('profil') }}"
                    class="{{ Route::is('profil') ? 'text-red-700 py-2 px-3' : 'text-gray-500' }} hover:text-red-700 transition duration-300 block py-2 px-3">Profil</a>
                @else
                <a href="{{ route('login') }}"
                    class="block px-4 py-2 text-white rounded-md hover:bg-blue-600 transition duration-300"
                    style="background: linear-gradient(180deg, hsla(57, 99%, 50%, 1) 0%, hsla(9, 100%, 51%, 1) 100%); max-width: 200px;">Login</a>
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

<main class="bg-gray-100">
    <div class="container mx-auto p-6">
        <div class="text-center mb-6">
            <h1 class="text-4xl font-bold text-gray-800">Layanan Kami</h1>
            <p class="text-gray-500 mt-2 text-lg">Penyewaan Jasa Tari, Makeup, dan Kostum</p>
        </div>

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Kalender -->
            <div class="bg-white shadow-lg rounded-lg p-6 lg:col-span-2 flex flex-col items-center lg:items-start calendar-container">
                <h2 class="text-lg font-bold text-gray-700 mb-4">Jadwal Layanan</h2>
                <div id="calendar" class="w-full rounded-lg border border-gray-200 shadow-sm bg-gradient-to-r from-blue-100 to-blue-200 calendar">
                </div>
                <div id="event-details" class="w-full p-4 bg-gray-50 mt-4 rounded-lg shadow-inner">
                    <p class="text-gray-500 italic text-center lg:text-left">
                        Klik pada jadwal untuk melihat detail.
                    </p>
                </div>
            </div>

            <!-- Daftar Layanan -->
            <div class="lg:col-span-2">
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Daftar Layanan</h2>
                    <p class="text-gray-500 mt-2 text-lg">Klik Layanan Untuk Melihat Produk</p>

                    <div class="grid grid-cols-1 gap-4">
                        <!-- Layanan Jasa Tari -->
                        <div class="service-card bg-blue-50 border-l-4 border-blue-500 p-6 rounded-lg cursor-pointer transition-transform hover:scale-105 hover:shadow-md"
                            data-service="jasa-tari">
                            <h3 class="text-lg font-semibold text-blue-600">Jasa Tari</h3>
                            <p class="text-gray-600 mt-1">Layanan tari profesional untuk acara spesial.</p>
                        </div>
                        <!-- Layanan Makeup -->
                        <div class="service-card bg-red-50 border-l-4 border-red-500 p-6 rounded-lg cursor-pointer transition-transform hover:scale-105 hover:shadow-md"
                            data-service="makeup">
                            <h3 class="text-lg font-semibold text-red-500">Makeup</h3>
                            <p class="text-gray-600 mt-1">Layanan makeup untuk pesta dan pemotretan.</p>
                        </div>
                        <!-- Layanan Kostum -->
                        <div class="service-card bg-green-50 border-l-4 border-green-500 p-6 rounded-lg cursor-pointer transition-transform hover:scale-105 hover:shadow-md"
                            data-service="kostum">
                            <h3 class="text-lg font-semibold text-green-500">Kostum</h3>
                            <p class="text-gray-600 mt-1">Sewa kostum untuk berbagai acara.</p>
                        </div>
                    </div>
                </div>

                <!-- Produk Berdasarkan Layanan -->
                <div id="produk-container-jasa-tari" class="mt-6 p-6 bg-gray-50 rounded-lg shadow-md hidden">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Produk Jasa Tari</h3>
                    <div id="produk-list-jasa-tari" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <p class="text-gray-500 italic">Klik layanan untuk melihat produk.</p>
                    </div>
                </div>

                <div id="produk-container-makeup" class="mt-6 p-6 bg-gray-50 rounded-lg shadow-md hidden">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Produk Makeup</h3>
                    <div id="produk-list-makeup" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <p class="text-gray-500 italic">Klik layanan untuk melihat produk.</p>
                    </div>
                </div>

                <div id="produk-container-kostum" class="mt-6 p-6 bg-gray-50 rounded-lg shadow-md hidden">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Produk Kostum</h3>
                    <div id="produk-list-kostum" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <p class="text-gray-500 italic">Klik layanan untuk melihat produk.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="bg-red-800 text-white py-12" style="background-image: url('/assets/img/landingpage/jpg25.svg'); background-size: cover; background-position: center;">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <div>
            <div class="flex items-center space-x-2">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-20 w-auto">
            </div>
        </div>
        <div>
            <h4 class="text-lg font-semibold border-b-2 border-red-400 pb-2">Layanan</h4>
            <ul class="mt-4 space-y-2 text-gray-300">
                <li><a href="#" class="hover:text-white transition">Jasa Tari</a></li>
                <li><a href="#" class="hover:text-white transition">Sewa Kostum</a></li>
                <li><a href="#" class="hover:text-white transition">Jasa Make Up</a></li>
            </ul>
        </div>
        <div>
            <h4 class="text-lg font-semibold border-b-2 border-red-400 pb-2">Lebih Lanjut</h4>
            <ul class="mt-4 space-y-2 text-gray-300">
                <li><a href="#" class="hover:text-white transition">Home</a></li>
                <li><a href="#" class="hover:text-white transition">Contact</a></li>
            </ul>
        </div>
        <div>
            <h4 class="text-lg font-semibold border-b-2 border-red-400 pb-2">Lokasi</h4>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7608.522918959678!2d102.1442280167053!3d1.4582093023032396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d15f03d7b3411b%3A0x855da8ac290dbf9d!2sGedung%20Utama%20Direktorat%20Polbeng!5e0!3m2!1sid!2sid!4v1736478038303!5m2!1sid!2sid"
                width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
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

<script>
document.addEventListener('DOMContentLoaded', function () {
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
    const orderModal = document.getElementById('order-modal'); // Modal elemen
    const closeModal = document.getElementById('close-order-modal'); // Tombol tutup modal
    const cancelOrder = document.getElementById('cancel-order'); // Tombol batal
    let activeService = null;

    // Event listener untuk setiap layanan
    services.forEach(service => {
        service.addEventListener('click', function () {
            const layanan = this.getAttribute('data-service');
            let url;

            // Tentukan URL berdasarkan layanan
            if (layanan === 'kostum') {
                url = '/produk/kostum';
            } else if (layanan === 'makeup') {
                url = '/produk/makeup';
            } else if (layanan === 'jasa-tari') {
                url = '/produk/jasa-tari';
            }

            // Jika layanan yang sama tidak diklik dua kali
            if (activeService !== layanan) {
                activeService = layanan;

                // Sembunyikan semua kontainer produk
                Object.values(produkContainers).forEach(container => {
                    container.classList.add('hidden');
                });

                // Fetch data produk
                fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Gagal mengambil data produk');
                        }
                        return response.json();
                    })
                    .then(data => {
                        produkLists[layanan].innerHTML = ''; // Kosongkan konten sebelumnya

                        // Jika ada data produk
                        if (data.data && data.data.length > 0) {
                            data.data.forEach(item => {
                                const imageUrl = `/storage/${item.image || 'default-image.jpg'}`;
                                produkLists[layanan].innerHTML += `
                                    <div class="bg-white shadow rounded p-4">
                                        <img src="${imageUrl}" alt="${item.name || item.nama_kostum || item.Kategory || item.jenis_tarian || 'Produk Tidak Diketahui'}" class="w-full h-40 object-cover rounded mb-2">
                                        <h3 class="font-bold text-lg">${item.name || item.nama_kostum || item.Kategory || item.jenis_tarian || 'Produk Tidak Diketahui'}</h3>
                                        ${item.jumlah ? `<p>Jumlah: ${item.jumlah}</p>` : ''}
                                        ${item.warna ? `<p>Warna: ${item.warna}</p>` : ''}
                                        ${item.ukuran ? `<p>Ukuran: ${item.ukuran}</p>` : ''}
                                        ${item.jumlah_penari ? `<p>Jumlah Penari: ${item.jumlah_penari}</p>` : ''}
                                        ${item.deskripsi_acara ? `<p>Deskripsi Acara: ${item.deskripsi_acara}</p>` : ''}
                                        <p>Harga: Rp ${item.harga || 'Tidak Tersedia'}</p>
                                    </div>
                                `;
                            });
                        } else {
                            produkLists[layanan].innerHTML = '<p class="text-gray-500 italic">Tidak ada produk untuk layanan ini.</p>';
                        }

                        // Tampilkan produk container yang sesuai
                        produkContainers[layanan].classList.remove('hidden');
                    })
                    .catch(error => {
                        produkLists[layanan].innerHTML = '<p class="text-red-500 italic">Terjadi kesalahan saat memuat produk.</p>';
                        console.error(error);
                    });
            }
        });
    });

    // Event listener untuk tombol "Pesan"
    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('order-button')) {
            const productName = e.target.getAttribute('data-name');
            const productId = e.target.getAttribute('data-id');

            // Isi form modal dengan data produk
            document.getElementById('product-name').value = productName;
            document.getElementById('product-id').value = productId;

            // Tampilkan modal
            orderModal.classList.remove('hidden');
        }
    });

    // Event listener untuk tombol close modal
    closeModal.addEventListener('click', function () {
        orderModal.classList.add('hidden');
    });

    // Event listener untuk tombol batal
    cancelOrder.addEventListener('click', function () {
        orderModal.classList.add('hidden');
    });

    // Event listener untuk klik di luar modal
    window.addEventListener('click', function (e) {
        if (e.target === orderModal) {
            orderModal.classList.add('hidden');
        }
    });
});


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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const orderModal = document.getElementById('order-modal');
        const closeModal = document.getElementById('close-order-modal');
        const cancelOrder = document.getElementById('cancel-order');
        const orderForm = document.getElementById('order-form');

        // Event listener untuk tombol "Pesan"
        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('order-button')) {
                // Ambil data produk dari elemen yang diklik
                const productCard = e.target.closest('.bg-white');
                const productName = productCard.querySelector('h3').innerText;
                const productId = e.target.getAttribute('data-id');

                // Isi form modal
                document.getElementById('product-name').value = productName;
                document.getElementById('product-id').value = productId;

                // Tampilkan modal
                orderModal.classList.remove('hidden');
            }
        });

        // Event listener untuk tombol close modal
        closeModal.addEventListener('click', function () {
            orderModal.classList.add('hidden');
        });

        // Event listener untuk tombol batal
        cancelOrder.addEventListener('click', function () {
            orderModal.classList.add('hidden');
        });

        // Event listener untuk submit form pemesanan
        orderForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // Ambil data dari form
            const productId = document.getElementById('product-id').value;
            const productName = document.getElementById('product-name').value;
            const quantity = document.getElementById('quantity').value;
            const customerName = document.getElementById('customer-name').value;
            const customerEmail = document.getElementById('customer-email').value;

            // Kirim data ke server untuk membuat transaksi Midtrans
            fetch('/create_midtrans_transaction', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
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
                    // Redirect ke Midtrans payment gateway
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

<!-- Modal Pemesanan -->
<div id="order-modal" class="modal hidden">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Formulir Pemesanan</h2>
            <button id="close-order-modal" class="modal-close">&times;</button>
        </div>
        <div class="modal-body">
            <form id="order-form">
                <input type="hidden" id="product-id" name="product-id">
                <div class="mb-4">
                    <label for="product-name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                    <input type="text" id="product-name" name="product-name" class="w-full mt-1 p-2 border rounded-lg" readonly>
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Jumlah</label>
                    <input type="number" id="quantity" name="quantity" class="w-full mt-1 p-2 border rounded-lg" min="1" required>
                </div>
                <div class="mb-4">
                    <label for="customer-name" class="block text-sm font-medium text-gray-700">Nama Pemesan</label>
                    <input type="text" id="customer-name" name="customer-name" class="w-full mt-1 p-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="customer-email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="customer-email" name="customer-email" class="w-full mt-1 p-2 border rounded-lg" required>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" id="cancel-order" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">Batal</button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Lanjutkan ke Pembayaran</button>
                </div>
            </form>
        </div>
    </div>
</div>


</html>
