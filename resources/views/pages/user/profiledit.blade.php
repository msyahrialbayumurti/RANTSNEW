@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-2xl font-bold text-gray-700 mb-6">Edit Profil</h1>

    <!-- Pesan sukses -->
    @if (session('status') === 'profile-updated')
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">Profil berhasil diperbarui!</strong>
        </div>
    @endif

    <!-- Form Edit Profil -->
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="mb-4">
            <label for="name" class="block text-gray-600 font-semibold">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                class="w-full mt-2 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-600 font-semibold">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                class="w-full mt-2 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Nomor HP -->
        <div class="mb-4">
            <label for="nohp" class="block text-gray-600 font-semibold">Nomor HP</label>
            <input type="text" name="nohp" id="nohp" value="{{ old('nohp', $user->nohp) }}"
                class="w-full mt-2 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('nohp')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Alamat -->
        <div class="mb-4">
            <label for="alamat" class="block text-gray-600 font-semibold">Alamat</label>
            <input type="text" name="alamat" id="alamat" value="{{ old('alamat', $user->alamat) }}"
                class="w-full mt-2 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('alamat')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Gambar Profil -->
        <div class="mb-6">
            <label for="image" class="block text-gray-600 font-semibold">Gambar Profil</label>
            <input type="file" name="image" id="image"
                class="w-full mt-2 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <p class="text-sm text-gray-500 mt-1">Format: jpeg, png, jpg, gif | Maksimal: 2MB</p>
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            @if ($user->image)
                <img src="{{ asset('uploads/images/' . $user->image) }}" alt="Profile Image" class="mt-4 w-32 h-32 rounded-full shadow-md">
            @endif
        </div>

        <!-- Tombol Simpan -->
        <div class="flex justify-end gap-4">
            <a href="{{ route('dashboard') }}"
                class="px-6 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 transition">
                Batal
            </a>
            <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                Simpan Perubahan
            </button>
        </div>
    </form>

    <!-- Hapus Akun -->
    <div class="mt-12">
        <h2 class="text-xl font-bold text-red-600 mb-4">Hapus Akun</h2>
        <p class="text-gray-600 mb-6">Menghapus akun akan menghapus semua data Anda secara permanen. Tindakan ini tidak dapat dibatalkan.</p>
        <form action="{{ route('profile.destroy') }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex items-center gap-4">
                <input type="password" name="password" placeholder="Masukkan password Anda"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                <button type="submit"
                    class="px-6 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                    Hapus Akun
                </button>
            </div>
            @error('password', 'userDeletion')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </form>
    </div>
</div>
@endsection
