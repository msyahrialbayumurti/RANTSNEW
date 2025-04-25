<?php

namespace App\Http\Controllers;

use App\Models\PenyewaanJasaTari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class PenyewaanJasaTariController extends Controller
{
    public function index()
    {
        $data = PenyewaanJasaTari::all();
        return response()->json(['data' => $data], 200);
    }

    public function show($id)
    {
        $data = PenyewaanJasaTari::find($id);
        if (!$data) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json(['data' => $data], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jumlah_penari' => 'required|integer|min:1',
            'jenis_tarian' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'deskripsi_acara' => 'required|string|max:500',
            'harga' => 'required|numeric|min:0',
        ]);

        $imagePath = $request->file('image')->store('penyewaan_jasa_taris/images', 'public');

        $data = PenyewaanJasaTari::create(array_merge($validated, ['image' => $imagePath]));

        return response()->json(['data' => $data, 'message' => 'Data berhasil ditambahkan'], 201);
    }

    public function update(Request $request, $id)
    {
        $data = PenyewaanJasaTari::find($id);

        if (!$data) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'jumlah_penari' => 'sometimes|integer|min:1',
            'jenis_tarian' => 'sometimes|string|max:255',
            'image' => 'sometimes|image|max:2048',
            'deskripsi_acara' => 'sometimes|string|max:500',
            'harga' => 'sometimes|numeric|min:0',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($data->image);
            $validated['image'] = $request->file('image')->store('penyewaan_jasa_taris/images', 'public');
        }

        $data->update($validated);

        return response()->json(['data' => $data, 'message' => 'Data berhasil diperbarui'], 200);
    }

    public function destroy($id)
    {
        $data = PenyewaanJasaTari::find($id);

        if (!$data) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        Storage::disk('public')->delete($data->image);
        $data->delete();

        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}