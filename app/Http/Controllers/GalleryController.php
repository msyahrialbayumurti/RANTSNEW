<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    // Menampilkan semua gambar dalam format JSON
    public function index()
    {
        $galleries = Gallery::all();
        return response()->json([
            'status' => 'success',
            'data' => $galleries
        ], 200);
    }

    // Menampilkan gambar berdasarkan ID dalam format JSON
    public function show($id)
    {
        $gallery = Gallery::find($id);
        if ($gallery) {
            return response()->json([
                'status' => 'success',
                'data' => $gallery
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Gallery not found'
        ], 404);
    }

    // Menyimpan gambar baru
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string|max:255',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $gallery = Gallery::create([
            'image' => $imageName,
            'description' => $request->description,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Gallery image uploaded successfully!',
            'data' => $gallery
        ], 201);
    }

    // Memperbarui gambar
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string|max:255',
        ]);

        $gallery = Gallery::find($id);

        if (!$gallery) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gallery not found'
            ], 404);
        }

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $gallery->image = $imageName;
        }

        $gallery->description = $request->description;
        $gallery->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Gallery updated successfully!',
            'data' => $gallery
        ], 200);
    }

    // Menghapus gambar
    public function destroy($id)
    {
        $gallery = Gallery::find($id);

        if (!$gallery) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gallery not found'
            ], 404);
        }

        $gallery->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Gallery deleted successfully!'
        ], 200);
    }
}
