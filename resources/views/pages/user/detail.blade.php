@extends('layouts.user.main')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow rounded p-6">
        <img src="{{ asset('storage/' . ($produk->image ?? 'default-image.jpg')) }}"
            alt="{{ $produk->nama_kostum ?? 'Produk Tidak Diketahui' }}" class="w-full h-60 object-cover rounded mb-4">
        <h1 class="text-2xl font-bold text-gray-800">{{ $produk->nama_kostum ?? 'Produk Tidak Diketahui' }}</h1>
        @if(isset($produk->jumlah))
            <p class="text-gray-600 mt-2">Jumlah: {{ $produk->jumlah }}</p>
        @endif
        @if(isset($produk->warna))
            <p class="text-gray-600 mt-2">Warna: {{ $produk->warna }}</p>
        @endif
        @if(isset($produk->ukuran))
            <p class="text-gray-600 mt-2">Ukuran: {{ $produk->ukuran }}</p>
        @endif
        <p class="text-lg font-semibold text-red-600 mt-4">Harga: Rp
            {{ number_format($produk->harga ?? 0, 0, ',', '.') }}
        </p>
    </div>
</div>
@endsection