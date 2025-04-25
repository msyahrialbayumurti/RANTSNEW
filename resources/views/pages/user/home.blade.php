<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novalie - Winter Sale</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <header class="bg-gray-100 shadow-md top-0 z-50">
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
                        class="{{ Route::is('index') ? 'text-red-700 font-semibold' : 'text-gray-500' }} hover:text-red-700 transition duration-300"
                        text-gray-500 hover:text-red-700 transition duration-300">Beranda</a>
                    <a href="{{ route('home') }}"
                        class="{{ Route::is('home') ? 'text-red-700 font-semibold' : 'text-gray-500' }} hover:text-red-700 transition duration-300"
                        text-gray-500 hover:text-red-700 transition duration-300">Pesan</a>
                    <!-- <a href="{{ route('layanan') }}"
                        class="{{ Route::is('layanan') ? 'text-red-700 font-semibold' : 'text-gray-500' }} hover:text-red-700 transition duration-300"
                        text-gray-500 hover:text-red-700 transition duration-300">Layanan</a>
                    <a href="{{ route('tentangkami') }}"
                        class="{{ Route::is('tentangkami') ? 'text-red-700 font-semibold' : 'text-gray-500' }} hover:text-red-700 transition duration-300"
                        text-gray-500 hover:text-red-700 transition duration-300">Tentang Kami</a> -->
                    <a href="{{ route('kontak') }}"
                        class="{{ Route::is('kontak') ? 'text-red-700 font-semibold' : 'text-gray-500' }} hover:text-red-700 transition duration-300"
                        text-gray-500 hover:text-red-700 transition duration-300">Kontak</a>
                    {{-- <a href="{{ route('login') }}" class="block px-4 py-2 text-white rounded-md hover:bg-blue-600
                    transition duration-300" style="background: hsla(57, 99%, 50%, 1);background:
                    linear-gradient(180deg, hsla(57, 99%, 50%, 1) 0%, hsla(9, 100%, 51%, 1) 100%);background:
                    -moz-linear-gradient(180deg, hsla(57, 99%, 50%, 1) 0%, hsla(9, 100%, 51%, 1) 100%);background:
                    -webkit-linear-gradient(180deg, hsla(57, 99%, 50%, 1) 0%, hsla(9, 100%, 51%, 1) 100%);filter:
                    progid: DXImageTransform.Microsoft.gradient(startColorstr='#FEF001', endColorstr='#FF2C05',
                    GradientType=1);max-width: 200px;margin: 0 auto;">Login</a> --}}
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
                    class="{{ Route::is('index') ? 'text-red-700 font-bold' : 'text-gray-500' }} hover:text-red-700 transition duration-300 block text-gray-500 hover:text-red-700 transition duration-300">Beranda</a>
                <a href="{{ route('home') }}"
                    class="{{ Route::is('home') ? 'text-red-700 font-bold' : 'text-gray-500' }} hover:text-red-700 transition duration-300 block text-gray-500 hover:text-red-700 transition duration-300">Pesan</a>
                <a href="{{ route('layanan') }}"
                    class="{{ Route::is('layanan') ? 'text-red-700 font-bold' : 'text-gray-500' }} hover:text-red-700 transition duration-300 block text-gray-500 hover:text-red-700 transition duration-300">Layanan</a>
                <a href="{{ route('tentangkami') }}"
                    class="{{ Route::is('layanan') ? 'text-red-700 font-bold' : 'text-gray-500' }} hover:text-red-700 transition duration-300 block text-gray-500 hover:text-red-700 transition duration-300">Tentang
                    Kami</a>
                <a href="{{ route('kontak') }}"
                    class="{{ Route::is('layanan') ? 'text-red-700 font-bold' : 'text-gray-500' }} hover:text-red-700 transition duration-300 block text-gray-500 hover:text-red-700 transition duration-300">Kontak</a>
                <a href="{{ route('login') }}"
                    class="block px-4 py-2 text-white rounded-md hover:bg-blue-600 transition duration-300"
                    style="background: hsla(57, 99%, 50%, 1);background: linear-gradient(180deg, hsla(57, 99%, 50%, 1) 0%, hsla(9, 100%, 51%, 1) 100%);background: -moz-linear-gradient(180deg, hsla(57, 99%, 50%, 1) 0%, hsla(9, 100%, 51%, 1) 100%);background: -webkit-linear-gradient(180deg, hsla(57, 99%, 50%, 1) 0%, hsla(9, 100%, 51%, 1) 100%);filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#FEF001', endColorstr='#FF2C05', GradientType=1);max-width: 200px;margin: 0 auto;">Login</a>
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

    <!-- Hero Section -->
    <section class="relative bg-gray-50 px-8 h-screen flex items-start">
        <div class="flex flex-wrap w-full md:flex-nowrap items-center">
            <div class="w-full md:w-1/2 mt-12 md:mt-12">
                <img src="{{ asset('assets/img/tariLandingpage.jpg') }}" alt="Winter Sale" class="rounded-lg shadow-lg">
            </div>
            <div class="w-full md:w-1/2 ml-10">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Pesan Sekarang</h2>
                <p class="text-gray-600 text-lg mb-6">Tari Saman</p>
                <button class="bg-gray-800 text-white px-6 py-2 rounded-lg hover:bg-gray-700">Pesan</button>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="container mx-auto mt-12 px-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Layanan Jasa Unggulan</h2>
    
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-white rounded-lg shadow-lg text-center relative overflow-hidden group">
                <div class="w-full h-64">
                    <img src="{{ asset('assets/img/landingpage/1.png') }}" alt="Gallery Image 1" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500 ease-in-out">
                </div>
                <div class="absolute bottom-0 left-0 right-0 bg-gray-800 bg-opacity-75 text-white py-3 transition-opacity duration-500 group-hover:bg-opacity-90">
                    <p class="text-lg font-medium">Penyewaan Jasa Tari</p>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="bg-white rounded-lg shadow-lg text-center relative overflow-hidden group">
                <div class="w-full h-64">
                    <img src="{{ asset('assets/img/landingpage/4.jpg') }}" alt="Gallery Image 2" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500 ease-in-out">
                </div>
                <div class="absolute bottom-0 left-0 right-0 bg-gray-800 bg-opacity-75 text-white py-3 transition-opacity duration-500 group-hover:bg-opacity-90">
                    <p class="text-lg font-medium">MakeUp</p>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="bg-white rounded-lg shadow-lg text-center relative overflow-hidden group">
                <div class="w-full h-64">
                    <img src="{{ asset('assets/img/landingpage/5.jpg') }}" alt="Gallery Image 3" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500 ease-in-out">
                </div>
                <div class="absolute bottom-0 left-0 right-0 bg-gray-800 bg-opacity-75 text-white py-3 transition-opacity duration-500 group-hover:bg-opacity-90">
                    <p class="text-lg font-medium">Kostum</p>
                </div>
            </div>
        </div>
    </section>
    

    <!-- Banner Section -->
    {{-- <section class="bg-gray-800 text-white mt-2 py-12 px-6 text-center">
        <h1 class="text-2xl font-semibold mb-2">Join the email list</h1>
        <p class="text-sm mb-6">Be the first to know about new collections and exclusive offers.</p>
        <form action="#" class="flex justify-center items-center gap-2">
            <input type="email" placeholder="Email"
                class="w-80 px-4 py-2 text-gray-800 rounded-md focus:ring focus:ring-gray-400 outline-none" required>
            <button type="submit"
                class="bg-white text-gray-800 px-4 py-2 rounded-md font-medium hover:bg-gray-200 transition">
                →
            </button>
        </form>
    </section> --}}

    <!-- Categories Section -->
    <section class="container mx-auto mt-12 px-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Layanan Jasa Unggulan</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-white rounded-lg shadow-lg text-center relative overflow-hidden group">
                <div class="w-full h-64">
                    <img src="{{ asset('assets/img/1.png') }}" alt="Gallery Image 1"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500 ease-in-out">
                </div>
                <div
                    class="absolute bottom-0 left-0 right-0 bg-gray-800 bg-opacity-75 text-white py-3 transition-opacity duration-500 group-hover:bg-opacity-90">
                    <p class="text-lg font-medium">Penyewaan Jasa Tari</p>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="bg-white rounded-lg shadow-lg text-center relative overflow-hidden group">
                <div class="w-full h-64">
                    <img src="{{ asset('assets/img/4.jpg') }}" alt="Gallery Image 2"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500 ease-in-out">
                </div>
                <div
                    class="absolute bottom-0 left-0 right-0 bg-gray-800 bg-opacity-75 text-white py-3 transition-opacity duration-500 group-hover:bg-opacity-90">
                    <p class="text-lg font-medium">MakeUp</p>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="bg-white rounded-lg shadow-lg text-center relative overflow-hidden group">
                <div class="w-full h-64">
                    <img src="{{ asset('assets/img/5.jpg') }}" alt="Gallery Image 3"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500 ease-in-out">
                </div>
                <div
                    class="absolute bottom-0 left-0 right-0 bg-gray-800 bg-opacity-75 text-white py-3 transition-opacity duration-500 group-hover:bg-opacity-90">
                    <p class="text-lg font-medium">Kostum</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Banner Section -->
    {{-- <section class="bg-gray-800 text-white mt-2 py-12 px-6 text-center">
        <h1 class="text-2xl font-semibold mb-2">Join the email list</h1>
        <p class="text-sm mb-6">Be the first to know about new collections and exclusive offers.</p>
        <form action="#" class="flex justify-center items-center gap-2">
            <input
                type="email"
                placeholder="Email"
                class="w-80 px-4 py-2 text-gray-800 rounded-md focus:ring focus:ring-gray-400 outline-none"
                required
            >
            <button
                type="submit"
                class="bg-white text-gray-800 px-4 py-2 rounded-md font-medium hover:bg-gray-200 transition">
                →
            </button>
        </form>
    </section> --}}

    <!-- Categories Section -->
    <section class="container mx-auto mt-12 px-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Layanan Jasa Unggulan</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div
                class="bg-white rounded-lg shadow-md p-4 text-center group hover:shadow-lg transition-shadow duration-300">
                <div class="relative overflow-hidden rounded-lg">
                    <img src="{{ asset('assets/img/4.jpg') }}" alt="Gallery Image 2"
                        class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                </div>
                <h3
                    class="font-bold text-lg text-gray-800 mt-4 group-hover:text-indigo-600 transition-colors duration-300">
                    Makeup Soft Glam</h3>
                <p class="text-gray-600 group-hover:text-gray-800 transition-colors duration-300">Rp 100.000</p>
            </div>
            <!-- Card 2 -->
            <div
                class="bg-white rounded-lg shadow-md p-4 text-center group hover:shadow-lg transition-shadow duration-300">
                <div class="relative overflow-hidden rounded-lg">
                    <img src="{{ asset('assets/img/5.jpg') }}" alt="Gallery Image 3"
                        class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                </div>
                <h3
                    class="font-bold text-lg text-gray-800 mt-4 group-hover:text-indigo-600 transition-colors duration-300">
                    Tari Persembahan</h3>
                <p class="text-gray-600 group-hover:text-gray-800 transition-colors duration-300">Rp 1.500.000</p>
            </div>
            <!-- Card 3 -->
            <div
                class="bg-white rounded-lg shadow-md p-4 text-center group hover:shadow-lg transition-shadow duration-300">
                <div class="relative overflow-hidden rounded-lg">
                    <img src="{{ asset('assets/img/1.png') }}" alt="Gallery Image 1"
                        class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                </div>
                <h3
                    class="font-bold text-lg text-gray-800 mt-4 group-hover:text-indigo-600 transition-colors duration-300">
                    Kostum Tari Persembahan</h3>
                <p class="text-gray-600 group-hover:text-gray-800 transition-colors duration-300">Rp 600.000</p>
            </div>
            <!-- Card 4 -->
            <div
                class="bg-white rounded-lg shadow-md p-4 text-center group hover:shadow-lg transition-shadow duration-300">
                <div class="relative overflow-hidden rounded-lg">
                    <img src="{{ asset('assets/img/2.jpg') }}" alt="Gallery Image 2"
                        class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                </div>
                <h3
                    class="font-bold text-lg text-gray-800 mt-4 group-hover:text-indigo-600 transition-colors duration-300">
                    Tari Kreasi Modern</h3>
                <p class="text-gray-600 group-hover:text-gray-800 transition-colors duration-300">Rp 1.500.000</p>
            </div>
            {{-- <div class="bg-white rounded-lg shadow-md p-4 text-center">
                <img src="path-to-image.jpg" alt="Antique Gilded Mirror" class="rounded-md mb-4">
                <h3 class="font-bold text-lg text-gray-800">Antique Gilded Mirror</h3>
                <p class="text-gray-600">$999.00 USD</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-4 text-center">
                <img src="path-to-image.jpg" alt="Round Mirror" class="rounded-md mb-4">
                <h3 class="font-bold text-lg text-gray-800">Round Mirror</h3>
                <p class="text-gray-600">$48.00 USD</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-4 text-center">
                <img src="path-to-image.jpg" alt="Ceramic Candlestick" class="rounded-md mb-4">
                <h3 class="font-bold text-lg text-gray-800">Ceramic Candlestick</h3>
                <p class="text-gray-600">$12.00 USD</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-4 text-center">
                <img src="path-to-image.jpg" alt="Gold Lamp" class="rounded-md mb-4">
                <h3 class="font-bold text-lg text-gray-800">Gold Lamp</h3>
                <p class="text-gray-600">$48.00 USD</p>
            </div> --}}
        </div>
    </section>

    <!-- Reviews Section -->
<!-- Reviews Section -->
{{-- <section class="container mx-auto mt-12 px-6">
    <h2 class="text-2xl font-bold text-[#4a586e] text-center mb-8">What Our Customers Are Saying</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Review Card 1 -->
        <div class="bg-[#e9eef5] border border-[#d6dce6] rounded-lg shadow-md p-6 relative">
            <!-- Garis Putih di Dalam Card -->
            <div class="absolute inset-x-0 top-0 h-1 w-full bg-white rounded-t-lg"></div>
            <!-- Avatar -->
            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2">
                <img src="path-to-jess.jpg" alt="Jess L." class="w-16 h-16 rounded-full border-4 border-white shadow-md">
            </div>
            <!-- Content -->
            <div class="mt-10">
                <h3 class="font-semibold text-[#4a586e]">Jess L.</h3>
                <p class="text-[#6c7a89] text-sm mt-2 mb-4">"Superb customer service! The team communicated with me to pick unique pieces. The support was kind and pleased the order out!"</p>
                <div class="text-[#f3c623] text-lg font-bold">
                    ★★★★★
                </div>
            </div>
        </div>

        <!-- Review Card 2 -->
        <div class="bg-[#e9eef5] border border-[#d6dce6] rounded-lg shadow-md p-6 relative">
            <!-- Garis Putih di Dalam Card -->
            <div class="absolute inset-x-0 top-0 h-1 w-full bg-white rounded-t-lg"></div>
            <!-- Avatar -->
            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2">
                <img src="path-to-maeve.jpg" alt="Maeve K." class="w-16 h-16 rounded-full border-4 border-white shadow-md">
            </div>
            <!-- Content -->
            <div class="mt-10">
                <h3 class="font-semibold text-[#4a586e]">Maeve K.</h3>
                <p class="text-[#6c7a89] text-sm mt-2 mb-4">"This boutique is seriously one of a kind and hands down my favorite! They have the most unique finds. Fantastic and you can’t get it anywhere else."</p>
                <div class="text-[#f3c623] text-lg font-bold">
                    ★★★★★
                </div>
            </div>
        </div>

        <!-- Review Card 3 -->
        <div class="bg-[#e9eef5] border border-[#d6dce6] rounded-lg shadow-md p-6 relative">
            <!-- Garis Putih di Dalam Card -->
            <div class="absolute inset-x-0 top-0 h-1 w-full bg-white rounded-t-lg"></div>
            <!-- Avatar -->
            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2">
                <img src="path-to-kara.jpg" alt="Kara S." class="w-16 h-16 rounded-full border-4 border-white shadow-md">
            </div>
            <!-- Content -->
            <div class="mt-10">
                <h3 class="font-semibold text-[#4a586e]">Kara S.</h3>
                <p class="text-[#6c7a89] text-sm mt-2 mb-4">"Amazing store. I tend to shop at the very last minute when shopping for special occasions. Novalie never fails. Items are unique and timeless."</p>
                <div class="text-[#f3c623] text-lg font-bold">
                    ★★★★★
                </div>
            </div>
        </div>

        <!-- Review Card 4 -->
        <div class="bg-[#e9eef5] border border-[#d6dce6] rounded-lg shadow-md p-6 relative">
            <!-- Garis Putih di Dalam Card -->
            <div class="absolute inset-x-0 top-0 h-1 w-full bg-white rounded-t-lg"></div>
            <!-- Avatar -->
            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2">
                <img src="path-to-julie.jpg" alt="Julie R." class="w-16 h-16 rounded-full border-4 border-white shadow-md">
            </div>
            <!-- Content -->
            <div class="mt-10">
                <h3 class="font-semibold text-[#4a586e]">Julie R.</h3>
                <p class="text-[#6c7a89] text-sm mt-2 mb-4">"There’s no where out there for affordable chic home decor. I always suggest Novalie to all my friends."</p>
                <div class="text-[#f3c623] text-lg font-bold">
                    ★★★★★
                </div>
            </div>
        </div>


        <div class="bg-[#e9eef5] border border-[#d6dce6] rounded-lg shadow-md p-6 relative">
            <!-- Garis Putih di Dalam Card -->
            <div class="absolute inset-x-0 top-0 h-1 w-full bg-white rounded-t-lg"></div>
            <!-- Avatar -->
            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2">
                <img src="path-to-julie.jpg" alt="Julie R." class="w-16 h-16 rounded-full border-4 border-white shadow-md">
            </div>
            <!-- Content -->
            <div class="mt-10">
                <h3 class="font-semibold text-[#4a586e]">Julie R.</h3>
                <p class="text-[#6c7a89] text-sm mt-2 mb-4">"There’s no where out there for affordable chic home decor. I always suggest Novalie to all my friends."</p>
                <div class="text-[#f3c623] text-lg font-bold">
                    ★★★★★
                </div>
            </div>
        </div>
    </div>
</section> --}}


<!-- Features Section -->
{{-- <section class="bg-[#4a586e] text-white mt-12 py-12 px-6">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
        <div>
            <div class="text-4xl mb-4">🌍</div>
            <h3 class="font-bold text-lg mb-2">Ethically-Sourced</h3>
            <p class="text-sm text-gray-300">All of our clothing is carefully curated from ethical manufacturers around the globe.</p>
        </div>
        <div>
            <div class="text-4xl mb-4">↩️</div>
            <h3 class="font-bold text-lg mb-2">Easy Returns & Exchanges</h3>
            <p class="text-sm text-gray-300">Easily return or exchange your item within 30 days of purchase.</p>
        </div>
        <div>
            <div class="text-4xl mb-4">🌱</div>
            <h3 class="font-bold text-lg mb-2">One Tree for Every $10</h3>
            <p class="text-sm text-gray-300">To help our planet, we are planting one tree for every $10 you spend.</p>
        </div>
    </div>
</section> --}}

    <!-- Mission Section -->
    <section class="bg-[#f4f5f7] text-center py-12 px-6">
        <div class="container mx-auto">
            <p class="text-gray-800 text-lg mb-6">
                Rants Menyediakan Layanan Jasa Yang Berkualitas Dan Di Kerjakan Oleh Orang-orang profesional dan
                berpengalaman. </p>
            <button class="bg-[#4a586e] text-white px-6 py-2 rounded-lg font-medium hover:bg-gray-700 transition">
                Selengkapnya
            </button>
        </div>
    </section>

    <!-- Additional Banner Section -->
    {{-- <section class="bg-gray-800 text-white mt-12 py-12 px-6">
        <div class="container mx-auto flex flex-col md:flex-row items-center gap-6">
            <div class="md:w-1/2 text-center md:text-left">
                <h2 class="text-3xl font-bold mb-4">Introducing NOVALIE X Joy Shop</h2>
                <p class="text-gray-300 mb-6">A limited edition collection, where fashion meets creativity.</p>
                <button class="bg-white text-gray-800 px-6 py-2 rounded-lg font-medium hover:bg-gray-200 transition">
                    Shop Now
                </button>
            </div>
            <div class="md:w-1/2">
                <img src="path-to-banner-image.jpg" alt="Novalie Banner" class="rounded-lg shadow-lg">
            </div> --}}
    </div>
    </section>
    <script>
    // Mengambil referensi tombol hamburger dan menu mobile
    const hamburgerButton = document.getElementById("hamburgerButton");
    const mobileMenu = document.getElementById("mobileMenu");

    // Menambahkan event listener ke tombol hamburger
    hamburgerButton.addEventListener("click", () => {
        // Toggle visibility menu mobile
        mobileMenu.classList.toggle("hidden");
    });
    </script>

</body>

</html>
