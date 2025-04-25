<?php

namespace App\Http\Controllers;

use App\Models\Makeup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class MakeUpController extends Controller
{
    // Mendapatkan semua makeup
    public function index()
    {
        $makeup = Makeup::all();
        return response()->json(['data' => $makeup], 200);
    }

    // Mendapatkan detail makeup berdasarkan ID
    public function show($id)
    {
        $makeup = Makeup::find($id);
        if (!$makeup) {
            return response()->json(['message' => 'Makeup tidak ditemukan'], 404);
        }
        return response()->json(['data' => $makeup], 200);
    }

    // Menambahkan makeup baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Kategory' => 'required|in:SD,SMP,SMA,Umum',
            'image' => 'required|image|max:2048',
            'harga' => 'required|numeric|min:0',
        ]);

        $imagePath = $request->file('image')->store('make_ups/images', 'public');

        $makeup = Makeup::create(array_merge($validated, ['image' => $imagePath]));

        return response()->json(['data' => $makeup, 'message' => 'Makeup berhasil ditambahkan'], 201);
    }

    // Mengupdate makeup
    public function update(Request $request, $id)
    {
        $makeup = Makeup::find($id);

        if (!$makeup) {
            return response()->json(['message' => 'Makeup tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'Kategory' => 'sometimes|in:SD,SMP,SMA,Umum',
            'image' => 'sometimes|image|max:2048',
            'harga' => 'sometimes|numeric|min:0',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($makeup->image);
            $validated['image'] = $request->file('image')->store('make_ups/images', 'public');
        }

        $makeup->update($validated);

        return response()->json(['data' => $makeup, 'message' => 'Makeup berhasil diperbarui'], 200);
    }

    // Menghapus makeup
    public function destroy($id)
    {
        $makeup = Makeup::find($id);

        if (!$makeup) {
            return response()->json(['message' => 'Makeup tidak ditemukan'], 404);
        }

        Storage::disk('public')->delete($makeup->image);
        $makeup->delete();

        return response()->json(['message' => 'Makeup berhasil dihapus'], 200);
    }

    
}