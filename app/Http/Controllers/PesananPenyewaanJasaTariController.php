<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\PesananPenyewaanJasaTariResource; // Resource untuk API
use App\Models\PesananPenyewaanJasaTari; // Model untuk query database
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Exception;

class PesananPenyewaanJasaTariController extends Controller
{

    public function createOrder(Request $request)
{
    try {
        // Log request data
        Log::info('Request Data:', $request->all());
        
        $validatedData = $request->validate([ 
            'penyewaan_jasa_taris_id' => 'required|exists:penyewaan_jasa_taris,id',
            'Users_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'jam_pemakaian' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'total_harga' => 'required|numeric',
            'status_pesanan' => 'required|string',
        ]);
        
        // Log validated data
        Log::info('Validated Data:', $validatedData);
        
        // Cek keberadaan tabel jasa_tari secara manual
        if (!Schema::hasTable('pesanan_penyewaan_jasa_taris')) {
            throw new \Exception('Tabel jasa_tari tidak ditemukan.');
        }
        
        // Membuat pesanan baru sesuai dengan validasi dan model yang sudah disesuaikan
        $PesananPenyewaanJasaTari = PesananPenyewaanJasaTari::create([
            'penyewaan_jasa_taris_id' => $validatedData['penyewaan_jasa_taris_id'],
            'Users_id' => $validatedData['Users_id'],
            'tanggal' => $validatedData['tanggal'],
            'jam_pemakaian' => $validatedData['jam_pemakaian'],
            'alamat' => $validatedData['alamat'],
            'latitude' => $validatedData['latitude'] ?? 00,
            'longitude' => $validatedData['longitude'] ?? 00,
            'total_harga' => $validatedData['total_harga'],
            'status_pesanan' => $validatedData['status_pesanan'],
        ]);
        
        // Log sukses pembuatan pesanan
        Log::info('Pesanan Berhasil Dibuat:', $PesananPenyewaanJasaTari->toArray());

        return response()->json([
            'message' => 'Pesanan berhasil dibuat',
            'order' => $PesananPenyewaanJasaTari,
        ], 201);
    } catch (ValidationException $e) {
        Log::error('Validasi Gagal:', $e->errors());
        return response()->json(['message' => 'Validasi gagal', 'errors' => $e->errors()], 422);
    } catch (Exception $e) {
        Log::error('Error saat membuat pesanan:', ['error' => $e->getMessage()]);
        return response()->json(['message' => 'Terjadi kesalahan saat membuat pesanan'], 500);
    }
}


    /**
     * Menampilkan semua pesanan penyewaan jasa tari.
     */
    public function index(Request $request)
    {
        // Mengambil data dari model
        $pesananPenyewaanJasaTari = PesananPenyewaanJasaTari::all();

        // Memformat data menggunakan resource
        return PesananPenyewaanJasaTariResource::collection($pesananPenyewaanJasaTari);
    }

    /**
     * Menampilkan detail pesanan penyewaan jasa tari berdasarkan ID.
     */
    public function show($id)
    {
        // Mencari data berdasarkan ID
        $pesananPenyewaanJasaTari = PesananPenyewaanJasaTari::findOrFail($id);

        // Memformat data menggunakan resource
        return new PesananPenyewaanJasaTariResource($pesananPenyewaanJasaTari);
    }
}
