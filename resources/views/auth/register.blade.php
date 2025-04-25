<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    .fade-in {
        animation: fadeIn 1.5s ease-in-out;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(-20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .slide-right {
        animation: slideRight 1.5s ease-in-out;
    }

    @keyframes slideRight {
        0% {
            opacity: 0;
            transform: translateX(-50px);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .slide-left {
        animation: slideLeft 1.5s ease-in-out;
    }

    @keyframes slideLeft {
        0% {
            opacity: 0;
            transform: translateX(50px);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }
    </style>
</head>

<body class="h-screen bg-gray-50 flex items-center justify-center">
    <div class="w-full max-w-5xl bg-white shadow-2xl rounded-lg overflow-hidden grid grid-cols-1 md:grid-cols-2">
        <!-- Left Section -->
        <div class="p-10 slide-right">
            <div class="text-center mb-8">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-20 mx-auto">
                <h2 class="text-3xl font-bold text-gray-800 mt-4">Daftar Akun Baru</h2>
                <p class="text-gray-600">Silakan isi data Anda untuk mendaftar</p>
            </div>

            <!-- Form Register -->
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name -->
                <div class="mb-6 fade-in">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                    <input id="name" type="text" name="name" :value="old('name')" required
                        class="w-full px-4 py-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-orange-500">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mb-6 fade-in">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input id="email" type="email" name="email" :value="old('email')" required
                        class="w-full px-4 py-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-orange-500">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-6 fade-in">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input id="password" type="password" name="password" required
                        class="w-full px-4 py-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-orange-500">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-6 fade-in">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi
                        Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="w-full px-4 py-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-orange-500">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full py-3 bg-gradient-to-r from-orange-500 via-red-500 to-pink-500 text-white rounded-lg shadow-lg hover:from-orange-600 hover:to-pink-600 transition font-semibold fade-in">
                    Daftar
                </button>

                <!-- Links -->
                <div class="text-center mt-6 text-sm text-gray-500 fade-in">
                    Sudah punya akun? <a href="{{ route('login') }}" class="text-orange-500 hover:underline">Login di
                        sini</a>
                </div>
            </form>
        </div>

        <!-- Right Section -->
        <div
            class="bg-gradient-to-br from-red-500 via-orange-500 to-yellow-500 flex flex-col justify-center items-center p-8 text-white slide-left">
            <h1 class="text-4xl font-bold mb-4">Selamat Datang</h1>
            <p class="text-center text-lg leading-relaxed">
                Daftar sekarang dan mulailah perjalanan Anda dengan kami untuk menikmati berbagai layanan terbaik!
            </p>
        </div>
    </div>
</body>

</html>
