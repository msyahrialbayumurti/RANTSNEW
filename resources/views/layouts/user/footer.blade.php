<footer class="bg-red-800 text-white py-12 mt-10">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Logo and Description -->
        <div>
            <div class="flex items-center space-x-2">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-20 w-auto">
                {{-- <h3 class="text-xl font-semibold">RANTS</h3> --}}
            </div>
            <p class="mt-4 text-gray-300">
                Menghidupkan Keindahan Seni Tari Tradisional Dan Modern Indonesia
            </p>
            <div class="flex space-x-4 mt-6">
                <a href="#" class="bg-red-700 py-2 px-3 h-10 w-10 rounded-full hover:bg-red-600 transition">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a href="#" class="bg-red-700 py-2 px-3 h-10 w-10 rounded-full hover:bg-red-600 transition">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>
                <a href="https://www.instagram.com/rants.id?igsh=MXh4bHMzNmd2Y3Q3ag=="
                   class="bg-red-700 py-2 px-3 h-10 w-10 rounded-full hover:bg-red-600 transition">
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
                <li><a href="#" class="hover:text-white transition">Home</a></li>
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
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d249.2827871688276!2d102.15074398080701!3d1.4591297056229404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d15f03d7b3411b%3A0x855da8ac290dbf9d!2sGedung%20Utama%20Direktorat%20Polbeng!5e0!3m2!1sid!2sid!4v1736450839905!5m2!1sid!2sid" 
                    width="100%" 
                    height="200" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>

    <!-- Contact Info -->
    <div class="mt-12 border-t border-gray-600 pt-8">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 text-gray-300">
            <div class="flex items-center space-x-4">
                <div class="bg-red-700 py-2 px-3 h-10 w-10 rounded-full">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div>
                    <h5 class="font-semibold">Email</h5>
                    <p>rantsrpl5b@gmail.com</p>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="bg-red-700 py-2 px-3 h-10 w-10 rounded-full">
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div>
                    <h5 class="font-semibold">Nomor Telepon</h5>
                    <p>(+62) 852 6394 5612</p>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="bg-red-700 py-2 px-3 h-10 w-10 rounded-full">
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
