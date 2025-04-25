<?php

namespace App\Http\Controllers;

use App\Models\Kostum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class KostumController extends Controller
{
    public function indexx()
    {
        $kostum = Kostum::all();
        return view('pages.user.layanan', compact('kostum'));
    }

    public function showKostum($id)
    {
        $kostum = kostum::findOrFail($id);
        return view('pages.user.layanan', compact('kostum'));
    }


    // Mendapatkan semua data kostum
    public function index()
    {
        $kostum = Kostum::all();
        return response()->json(['data' => $kostum], 200);
    }

    // Mendapatkan detail kostum berdasarkan ID
    public function show($id)
    {
        $kostum = Kostum::find($id);

        if (!$kostum) {
            return response()->json(['message' => 'Kostum tidak ditemukan'], 404);
        }

        return response()->json(['data' => $kostum], 200);
    }

    // Menambahkan kostum baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kostum' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'jumlah' => 'required|integer|min:1',
            'warna' => 'required|string|max:100',
            'ukuran' => 'required|string|max:50',
            'harga' => 'required|integer|min:0',
        ]);

        $imagePath = $request->file('image')->store('kosta/images', 'public');

        $kostum = Kostum::create(array_merge($validated, ['image' => $imagePath]));

        return response()->json(['data' => $kostum, 'message' => 'Kostum berhasil ditambahkan'], 201);
    }

    // Mengupdate kostum
    public function update(Request $request, $id)
    {
        $kostum = Kostum::find($id);

        if (!$kostum) {
            return response()->json(['message' => 'Kostum tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'nama_kostum' => 'sometimes|string|max:255',
            'image' => 'sometimes|image|max:2048',
            'jumlah' => 'sometimes|integer|min:1',
            'warna' => 'sometimes|string|max:100',
            'ukuran' => 'sometimes|string|max:50',
            'harga' => 'sometimes|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($kostum->image);
            $validated['image'] = $request->file('image')->store('kosta/images', 'public');
        }

        $kostum->update($validated);

        return response()->json(['data' => $kostum, 'message' => 'Kostum berhasil diperbarui'], 200);
    }

    // Menghapus kostum
    public function destroy($id)
    {
        $kostum = Kostum::find($id);

        if (!$kostum) {
            return response()->json(['message' => 'Kostum tidak ditemukan'], 404);
        }

        Storage::disk('public')->delete($kostum->image);
        $kostum->delete();

        return response()->json(['message' => 'Kostum berhasil dihapus'], 200);
    }
}