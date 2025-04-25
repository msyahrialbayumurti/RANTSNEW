<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-red-500 via-orange-500 to-yellow-500 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-5xl bg-white shadow-lg rounded-lg overflow-hidden flex flex-col sm:flex-row">
        <!-- Left Section (Form Register) -->
        <div class="w-full sm:w-1/2 p-8">
            <div class="text-center mb-6">
                <!-- Logo yang sudah diresize -->
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-16 mx-auto mb-3">
                <h2 class="text-2xl font-bold text-gray-800 mt-4">Daftar Akun Baru</h2>
                <p class="text-gray-600 mt-1">Isi form berikut untuk membuat akun baru</p>
            </div>

            <!-- Form Register -->
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name -->
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 text-sm font-medium mb-2">Nama</label>
                    <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus
                        placeholder="Nama lengkap"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                    @error('username')
                    <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        placeholder="example@mail.com"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                    @error('email')
                    <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- No HP -->
                <div class="mb-4">
                    <label for="no_hp" class="block text-gray-700 text-sm font-medium mb-2">No HP</label>
                    <input id="no_hp" type="text" name="no_hp" value="{{ old('no_hp') }}" required
                        placeholder="081234567890"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                    @error('no_hp')
                    <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password, Confirm Password -->
                <div class="mb-4 flex flex-col sm:flex-row sm:space-x-4">
                    <!-- Password -->
                    <div class="w-full sm:w-1/2 relative">
                        <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                        <input id="password" type="password" name="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                        <button type="button" onclick="togglePassword('password', 'password-icon')"
                            class="absolute inset-y-0 right-2 px-2 text-gray-500 hover:text-orange-500">
                            <svg id="password-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-.708 2.757-3.39 5-6.648 5-3.259 0-5.94-2.243-6.648-5z" />
                            </svg>
                        </button>
                        @error('password')
                        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="w-full sm:w-1/2">
                        <label for="password_confirmation"
                            class="block text-gray-700 text-sm font-medium mb-2">Konfirmasi Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                        @error('password_confirmation')
                        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-red-500 via-orange-500 to-yellow-500 text-white py-2 rounded-lg shadow-lg font-semibold hover:from-red-600 hover:via-orange-600 hover:to-yellow-600">
                    Daftar
                </button>

                <!-- Links -->
                <div class="flex justify-between items-center mt-4 text-sm text-gray-500">
                    <a href="{{ route('login') }}" class="text-orange-500 hover:underline">Sudah punya akun? Masuk</a>
                </div>
            </form>
        </div>

        <!-- Right Section (Image) -->
        <div class="hidden sm:block w-1/2 bg-cover bg-center"
            style="background-image: url('https://source.unsplash.com/600x800/?technology,design');">
            <div class="flex flex-col items-center justify-center h-full bg-black bg-opacity-40 text-white p-4">
                <h2 class="text-4xl font-bold mb-3">Selamat Datang</h2>
                <p class="text-center text-base leading-relaxed">
                    Bergabunglah dengan kami untuk menikmati berbagai layanan terbaik. Daftar sekarang dan mulailah
                    perjalanan Anda!
                </p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(fieldId, iconId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById(iconId);

            if (field.type === 'password') {
                field.type = 'text';
            } else {
                field.type = 'password';
            }
        }
    }
    </script>
</body>

</html>
