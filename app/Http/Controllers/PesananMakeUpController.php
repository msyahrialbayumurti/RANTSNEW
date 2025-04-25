<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\PesananMakeUpResource; // Resource untuk API
use App\Models\PesananMakeUp;
use App\Models\Order;
use Illuminate\Http\Request;

class PesananMakeUpController extends Controller
{

    public function createOrder(Request $request)
    {
        $validatedData = $request->validate([
            'make_ups_id' => 'required|exists:make_ups,id',
            'Users_id' => 'required|exists:users,id',
            'tanggal_pesanan' => 'required|date',
            'lokasi_pemesanan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'total_harga' => 'required|numeric',
            'status_pesanan' => 'required|string',
        ]);

        $PesananMakeUp = PesananMakeUp::create([
            'make_ups_id' => $validatedData['make_ups_id'],
            'Users_id' => $validatedData['Users_id'],
            'tanggal_pesanan' => $validatedData['tanggal_pesanan'],
            'lokasi_pemesanan' => $validatedData['lokasi_pemesanan'],
            'alamat' => $validatedData['alamat'],
            'latitude' => $validatedData['latitude'] ?? 00,
            'longitude' => $validatedData['longitude'] ?? 00,
            'total_harga' => $validatedData['total_harga'],
            'status_pesanan' => $validatedData['status_pesanan'],
        ]);

        return response()->json([
            'message' => 'Pesanan berhasil dibuat',
            'order' => $PesananMakeUp,
        ], 201);
    }


    //Menampilkan semua pesanan Makeup
    public function index(Request $request)
    {
        $pesananKostums = PesananMakeUp::all(); // Ambil semua pesanan kostum
        // Gunakan PesananKostumResource untuk API
        return PesananMakeUpResource::collection($pesananKostums);
    }

    /**
     * Menampilkan detail pesanan kostum berdasarkan ID.
     */
    public function show($id)
    {
        $pesananKostum = PesananMakeUp::findOrFail($id); // Cari berdasarkan ID
        return new PesananMakeUpResource($pesananKostum); // Gunakan resource yang sesuai
    }
}
