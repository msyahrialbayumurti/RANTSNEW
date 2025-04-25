<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen bg-gradient-to-br from-red-500 via-orange-500 to-yellow-500 flex items-center justify-center">
    <div class="w-full max-w-5xl bg-white shadow-lg rounded-lg overflow-hidden flex">
        <!-- Left Section -->
        <div class="hidden sm:block w-1/2 bg-cover bg-center"
            style="background-image: url('https://source.unsplash.com/600x800/?technology,design');">
            <div class="flex flex-col items-center justify-center h-full bg-black bg-opacity-40 text-white p-8">
                <h2 class="text-5xl font-bold mb-4">Selamat Datang</h2>
                <p class="text-center text-lg leading-relaxed">
                    Bergabunglah dengan kami untuk menikmati berbagai layanan terbaik. Masuk sekarang dan mulailah
                    perjalanan Anda!
                </p>
            </div>
        </div>

        <!-- Right Section -->
        <div class="w-full sm:w-1/2 p-10">
            <div class="text-center mb-8">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-20 mx-auto">
                <h2 class="text-3xl font-bold text-gray-800 mt-6">Masuk ke Akun Anda</h2>
                <p class="text-gray-600 mt-2">Silakan masuk untuk melanjutkan ke layanan kami</p>
            </div>

            <!-- Form Login -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        placeholder="example@mail.com"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                    @error('email')
                    <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                    <div class="relative">
                        <input id="password" type="password" name="password" required placeholder="password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                        <button type="button" onclick="togglePassword()"
                            class="absolute inset-y-0 right-0 px-3 text-gray-500 hover:text-orange-500">
                            <svg id="toggle-password-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-.708 2.757-3.39 5-6.648 5-3.259 0-5.94-2.243-6.648-5z" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                    <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-red-500 via-orange-500 to-yellow-500 text-white py-3 rounded-lg shadow-lg font-semibold hover:from-red-600 hover:via-orange-600 hover:to-yellow-600">
                    Login
                </button>

                <!-- Links -->
                <div class="flex justify-between items-center mt-6 text-sm text-gray-500">
                    <a href="{{ route('password.request') }}" class="hover:underline">Lupa Password?</a>
                    <a href="{{ route('register') }}" class="text-orange-500 hover:underline">Daftar Akun</a>
                </div>
            </form>

            <!-- Social Login -->
            <div class="text-center mt-8">
                <p class="text-gray-600">Atau masuk dengan</p>
                <div class="flex justify-center gap-6 mt-4">
                    <a href="#" class="text-blue-600 hover:text-blue-700">
                        <i class="fab fa-facebook h-6 w-6"></i>
                    </a>
                    <a href="#" class="text-red-500 hover:text-red-600">
                        <i class="fab fa-google h-6 w-6"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
    function togglePassword() {
        const passwordField = document.getElementById('password');
        const icon = document.getElementById('toggle-password-icon');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
        } else {
            passwordField.type = 'password';
        }
    }
    </script>
</body>

</html>