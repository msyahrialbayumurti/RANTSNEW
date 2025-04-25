<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\PesananKostumResource; 
use App\Models\PesananKostum;
use Illuminate\Http\Request;

class PesananKostumController extends Controller
{

    public function createOrder(Request $request)
    {
        $validatedData = $request->validate([
            'kosta_id' => 'required|exists:kosta,id',
            'Users_id' => 'required|exists:users,id',
            'tanggal_pemakaian_mulai' => 'required|date|date_format:Y-m-d',
            'tanggal_pemakaian_selesai' => 'required|date|date_format:Y-m-d',
            'total_harga' => 'required|numeric',
            'status_pesanan' => 'required|string',
        ]);

    
        
        // Sesuaikan dengan nama field yang ada di model Anda
        $PesananKostum = PesananKostum::create([
            'kosta_id' => $validatedData['kosta_id'],  // Sesuaikan dengan 'kostums_id'
            'Users_id' => $validatedData['Users_id'], // Sesuaikan dengan 'Users_id'
            'tanggal_pemakaian_mulai' => $validatedData['tanggal_pemakaian_mulai'], // Menggunakan 'waktu_pemakaian_mulai' di model
            'tanggal_pemakaian_selesai' => $validatedData['tanggal_pemakaian_selesai'], // Anda bisa menyesuaikan jika ada waktu selesai atau lainnya
            'total_harga' => $validatedData['total_harga'],
            'status_pesanan' => $validatedData['status_pesanan'],
        ]);
        
        

        return response()->json([
            'message' => 'Pesanan berhasil dibuat',
            'order' => $PesananKostum,
        ], 201);
    }

    /**
     * Menampilkan semua pesanan kostum.
     */
    public function index(Request $request)
    {
        $pesananKostums = PesananKostum::all(); // Ambil semua pesanan kostum
        // Gunakan PesananKostumResource untuk API
        return PesananKostumResource::collection($pesananKostums);
    }

    /**
     * Menampilkan detail pesanan kostum berdasarkan ID.
     */
    public function show($id)
    {
        $pesananKostum = PesananKostum::findOrFail($id); // Cari berdasarkan ID
        return new PesananKostumResource($pesananKostum); // Gunakan resource yang sesuai
    }
}