<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .fade-in {
        animation: fadeIn 1s ease-in-out;
    }

    .slide-in {
        animation: slideIn 1s ease-in-out;
    }
    </style>
</head>

<body class="h-screen bg-white flex items-center justify-center">
    <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden grid grid-cols-1 md:grid-cols-2 fade-in">
        <!-- Left Section -->
        <div
            class="bg-gradient-to-br from-red-500 via-orange-500 to-yellow-500 flex flex-col justify-center items-center p-8 slide-in">
            <h1 class="text-4xl font-bold mb-4 text-white">Selamat Datang</h1>
            <p class="text-center text-lg leading-relaxed text-white">
                Bergabunglah dengan kami untuk menikmati berbagai layanan terbaik. Masuk sekarang dan mulailah
                perjalanan Anda!
            </p>
        </div>

        <!-- Right Section -->
        <div class="p-10 fade-in">
            <div class="text-center mb-8">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-40 mx-auto">
                <h2 class="text-2xl font-bold text-gray-800 mt-4">Masuk ke Akun Anda</h2>
                <p class="text-gray-600">Silakan masuk untuk melanjutkan ke layanan kami</p>
            </div>

            <!-- Form Login -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input id="email" type="email" name="email" :value="old('email')" required
                        class="w-full px-4 py-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-orange-500">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <input id="password" type="password" name="password" required
                            class="w-full px-4 py-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-orange-500">
                        <button type="button"
                            class="absolute inset-y-0 right-0 px-3 text-gray-500 hover:text-orange-500">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-4">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="text-orange-500 rounded focus:ring-orange-500">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600">Ingat Saya</label>
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full py-3 bg-gradient-to-r from-orange-500 via-red-500 to-pink-500 text-white rounded-lg shadow-lg hover:from-orange-600 hover:to-pink-600 transition font-semibold">
                    Login
                </button>

                <!-- Links -->
                <div class="text-center mt-6 text-sm text-gray-500">
                    Belum punya akun? <a href="{{ route('register') }}" class="text-orange-500 hover:underline">Daftar
                        di
                        sini</a>
                </div>
            </form>

            <!-- Social Login -->
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