<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\GalleryController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KostumController;
use App\Http\Controllers\MakeUpController;
use App\Http\Controllers\PenyewaanJasaTariController;
use App\Http\Controllers\PesananKostumController;
use App\Http\Controllers\PesananMakeUpController;
use App\Http\Controllers\PesananPenyewaanJasaTariController;
use App\Http\Controllers\PesananTariController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;

// 1. Login & Register
Route::post('/login', [AuthController::class, 'login']);
Route::get('/login', function () {
    return response()->json(['status' => 'error', 'message' => 'Unauthorized. Silakan login untuk melanjutkan.'], 401);
})->name('login');
Route::post('/register', [RegisterController::class, 'register']);

// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/register', [RegisterController::class, 'register']);
Route::middleware('auth:sanctum')->post('/payment/createTransaction', [PaymentController::class, 'createTransaction']);
Route::middleware('auth:sanctum')->post('/payment/makeup/succes', [PaymentController::class, 'verifyPaymentMakeup']);
// 2. Jadwal Acara
Route::get('/acara/{tanggal}', [CalendarController::class, 'schedule']);
Route::get('/acara', [CalendarController::class, 'getAllCalenders']);

// 3. Gallery
Route::get('/galleries', [GalleryController::class, 'index']);

// 4. Kostum
Route::prefix('kostum')->group(function () {
    Route::get('/all', [KostumController::class, 'index']); // Mendapatkan semua kostum
    // Route::post('/', [KostumController::class, 'store']); // Menambahkan kostum
    Route::get('/{id}', [KostumController::class, 'show']); // Mendapatkan detail kostum
//     Route::put('/{id}', [KostumController::class, 'update']); // Mengupdate kostum
//     Route::delete('/{id}', [KostumController::class, 'destroy']); // Menghapus kostum
});

// 5. MakeUp
Route::prefix('makeup')->group(function () {
    Route::get('/all', [MakeupController::class, 'index']); // Mendapatkan semua makeup
    Route::get('/{id}', [MakeupController::class, 'show']); // Mendapatkan detail makeup
    // Route::post('/', [MakeupController::class, 'store']); // Menambahkan makeup baru
    // Route::put('/{id}', [MakeupController::class, 'update']); // Mengupdate makeup
    // Route::delete('/{id}', [MakeupController::class, 'destroy']); // Menghapus makeup
});


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/profile', [UserController::class, 'showProfile']);
    Route::put('/profile/update', [UserController::class, 'updateProfile']);
    Route::post('/logout', [AuthController::class, 'logout']);

});

// Route::middleware('auth:api')->get('profil/{id}', [UserController::class, 'showProfile']);
// Route::get('profil/{id}', [UserController::class, 'showProfile']);

//PenyewaanJasaTari
Route::prefix('tari')->group(function () {
    Route::get('/all', [PenyewaanJasaTariController::class, 'index']); // Mendapatkan semua data
    Route::get('/{id}', [PenyewaanJasaTariController::class, 'show']); // Mendapatkan detail data
    // Route::post('/', [PenyewaanJasaTariController::class, 'store']); // Menambahkan data baru
    // Route::put('/{id}', [PenyewaanJasaTariController::class, 'update']); // Mengupdate data
    // Route::delete('/{id}', [PenyewaanJasaTariController::class, 'destroy']); // Menghapus data
});

//PesananKostum
Route::post('pesanan-kostum', [PesananKostumController::class, 'createOrder']);
Route::get('pesanan-kostum', [PesananKostumController::class, 'index']);
Route::get('pesanan-kostum/{id}', [PesananKostumController::class, 'show']);

//PesananMakeUp

Route::post('pesanan-makeup', [PesananMakeUpController::class, 'createOrder']);
Route::get('pesanan-makeup', [PesananMakeupController::class, 'index']);
Route::get('pesanan-makeup/{id}', [PesananKostumController::class, 'show']);

//PesananPenyewaanJasaTari
Route::post('pesanan-tari', [PesananPenyewaanJasaTariController::class, 'createOrder']);
Route::get('pesanan-penyewaanjasatari', [PesananPenyewaanJasaTariController::class, 'index']);
Route::get('pesanan-penyewaanjasatari/{id}', [PesananPenyewaanJasaTariController::class, 'show']);