<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class UserController extends Controller
{
    public function showProfile()
    {
        try {
            $user = Auth::user();
            if (!$user instanceof User) {
                throw new \Exception('Authenticated user is not an instance of User model');
            }
            $user = Auth::user();

            if (!$user) {
                Log::error('User not found');
                return response()->json([
                    'status' => 'error',
                    'message' => 'Pengguna tidak ditemukan.',
                ], 404);
            }

            Log::info('User profile retrieved successfully', ['user' => $user]);

            // Kembalikan data profil
            return response()->json([
                'status' => 'success',
                'message' => 'Data profil berhasil diambil.',
                'data' => new UserResource($user),
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching profile', ['error' => $e->getMessage()]);
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengambil data profil.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }




    public function updateProfile(Request $request)
{
    DB::beginTransaction();
    try {
        $user = $request->user();

        Log::info('Update profile request data:', $request->all());

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'nohp' => 'sometimes|string|max:15',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|nullable|string|min:6',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg|max:2048', // Menambahkan validasi gambar
        ]);

        // Update data selain gambar
        if (isset($validated['name'])) {
            $user->name = $validated['name'];
        }
        if (isset($validated['nohp'])) {
            $user->nohp = $validated['nohp'];
        }
        if (isset($validated['email'])) {
            $user->email = $validated['email'];
        }
        if (isset($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        // Memeriksa apakah ada gambar yang diupload
        if ($request->hasFile('image')) {
            // Menghapus gambar lama jika ada
            if ($user->image_url && file_exists(public_path('storage/' . $user->image_url))) {
                unlink(public_path('storage/' . $user->image_url));
            }

            // Menyimpan gambar yang baru
            $image = $request->file('image');
            $imagePath = $image->store('profiles', 'public');  // Menyimpan gambar di folder 'profiles' dalam storage

            // Menyimpan path gambar ke database
            $user->image_url = $imagePath;
        }

        $user->save();

        DB::commit();
        return response()->json([
            'status' => 'success',
            'message' => 'Profil berhasil diperbarui.',
            'data' => new UserResource($user),
        ], 200);
    } catch (ValidationException $e) {
        DB::rollBack();
        return response()->json([
            'status' => 'error',
            'message' => 'Validasi gagal.',
            'errors' => $e->errors(),
        ], 422);
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Error updating profile:', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        return response()->json([
            'status' => 'error',
            'message' => 'Gagal memperbarui profil.',
            'error' => $e->getMessage(),
        ], 500);
    }
}


}
