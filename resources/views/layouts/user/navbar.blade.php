<header class="bg-gray-100 shadow-md top-0 z-50 sticky w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">
        <!-- Logo -->
        <div class="flex-shrink-0">
          <a href="{{ route('index') }}">
            <img class="h-12" src="{{ asset('assets/img/TransaparentRants (300 x 100 piksel).svg') }}" alt="Logo">
          </a>
        </div>
  
        <!-- Navigation Menu -->
        <div id="menu" class="hidden md:flex space-x-4 mx-auto font-medium">
          <a href="{{ route('index') }}" class="{{ Route::is('index') ? 'text-red-700 font-semibold' : 'text-gray-500' }} hover:text-red-700 transition duration-300">Beranda</a>
          <a href="{{ route('home') }}" class="{{ Route::is('home') ? 'text-red-700 font-semibold' : 'text-gray-500' }} hover:text-red-700 transition duration-300">Layanan</a>
          <a href="{{ route('kontak') }}" class="{{ Route::is('kontak') ? 'text-red-700 font-semibold' : 'text-gray-500' }} hover:text-red-700 transition duration-300">Kontak</a>
        </div>
  
        <!-- Hamburger Menu (for screens <= 768px) -->
        <div class="md:hidden">
          <button id="menu-button" class="text-gray-600 hover:text-red-700 focus:outline-none flex items-center justify-center">
            <!-- Hamburger Icon -->
            <div id="icon-container" class="relative w-6 h-6">
              <span class="block w-full rounded-full h-1 bg-gray-600 transform transition duration-300 ease-in-out origin-center"></span>
              <span class="block w-full rounded-full h-1 bg-gray-600 mt-1 transform transition duration-300 ease-in-out origin-center"></span>
              <span class="block w-full rounded-full h-1 bg-gray-600 mt-1 transform transition duration-300 ease-in-out origin-center"></span>
            </div>
          </button>
        </div>
      </div>
  
      <!-- Mobile Menu -->
      <div id="mobile-menu" class="hidden md:hidden mt-4 space-y-2 font-medium transform scale-y-0 opacity-0 origin-top transition-all duration-300 ease-in-out">
            <a href="{{ route('index') }}" class="{{ Route::is('index') ? 'text-red-700 ' : 'text-gray-500' }} hover:text-red-700 transition duration-300 block py-2 px-3">Beranda</a>
            <a href="{{ route('home') }}" class="{{ Route::is('home') ? 'text-red-700 py-2 px-3' : 'text-gray-500' }} hover:text-red-700 transition duration-300 block py-2 px-3">Layanan</a>
            <a href="{{ route('kontak') }}" class="{{ Route::is('kontak') ? 'text-red-700 py-2 px-3' : 'text-gray-500' }} hover:text-red-700 transition duration-300 block pt-2 pb-6 px-3">Kontak</a>
      </div>

    </div>
  </header>
  
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
  </script>