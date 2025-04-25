<?php

namespace App\Http\Controllers;

use App\Models\PesananMakeUp;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Ensure Log facade is included
use App\Models\User; // Import the User model

class PaymentController extends Controller
{


    public function createTransaction(Request $request)
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$clientKey = config('services.midtrans.client_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Cek jika pengguna sudah terautentikasi
        if (!Auth::check()) {
            return response()->json([
                'status' => 'error',
                'message' => 'User is not authenticated. Please log in to continue.',
            ], 401); // Unauthorized
        }

        // Ambil informasi pengguna yang sedang login
        $user = Auth::user(); // Mengambil data pengguna yang sedang login
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User data could not be found.',
            ], 500);
        }

        $name = $user->name;
        $email = $user->email;

        // Log untuk debugging
        Log::info("Authenticated User - Name: {$name}, Email: {$email}");

        // Validasi input
        $request->validate([
            'amount' => 'required|numeric',
        ]);

        // Detail transaksi
        $orderId = 'order-' . uniqid();
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $request->input('amount'),
            ],
            'customer_details' => [
                'first_name' => $name,
                'email' => $email,
            ],
        ];

        try {
            // Generate Snap Token
            $snapToken = Snap::getSnapToken($params);

            // Kembalikan Snap Token sebagai respons
            return response()->json([
                'status' => 'success',
                'snap_token' => $snapToken,
                'order_id' => $orderId,
            ]);
        } catch (Exception $e) {
            // Menangani kesalahan API Midtrans
            Log::error('Midtrans API Error: ' . $e->getMessage()); // Log error untuk debugging
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menghubungi Midtrans: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function verifyPaymentMakeup(Request $request)
    {
        // Dapatkan transaction ID dari notifikasi
        $transactionId = $request->input('id');

        try {
            // Verifikasi status transaksi
            $transactionStatus = PesananMakeUp::status($transactionId);

            // Cek status transaksi
            if ($transactionStatus->transaction_status == 'settlement') {
                // Pembayaran berhasil
                Log::info('Transaksi berhasil dengan ID: ' . $transactionId);
                // Proses transaksi lebih lanjut seperti mengupdate status di database, dll.
            } else {
                // Pembayaran gagal atau belum selesai
                Log::warning('Transaksi gagal atau belum selesai dengan ID: ' . $transactionId);
            }

            return response()->json(['status' => 'success']);
        } catch (Exception $e) {
            Log::error('Error verifikasi transaksi: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Error verifikasi transaksi']);
        }
    }
}
