<?php
return [
    'paths' => ['api/*'], // Izinkan akses API
    'allowed_methods' => ['*'], // Izinkan semua metode (GET, POST, PUT, DELETE, dll.)
    'allowed_origins' => ['*'], // Izinkan akses dari semua domain
    'allowed_headers' => ['*'], // Izinkan semua header
    'exposed_headers' => [], // Header yang diizinkan untuk dilihat oleh klien
    'max_age' => 0, // Waktu cache preflight dalam detik
    'supports_credentials' => false, // Apakah kredensial (cookie) didukung
];
