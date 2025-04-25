<?php


use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\KostumController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\MakeUpController;
use App\Http\Controllers\PenyewaanJasaTariController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;



Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/kontak', [HomeController::class, 'showKontak'])->name('kontak');

// Route::get('/layanan', [HomeController::class, 'showLayanan'])->name('layanan');

Route::get('/home', [HomeController::class, 'showHome'])->name('home');

Route::get('/tentang-kami', [HomeController::class, 'showAboutme'])->name('tentangkami');

Route::get('/riwayat', [HomeController::class, 'showRiwayat'])->name('riwayat');

Route::get('/profil', [HomeController::class, 'showProfil'])->name('profil');

Route::get('/notifikasi', [HomeController::class, 'showNotifikasi'])->name('notifikasi');



// Route untuk halaman register
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');

// Route untuk proses register
Route::post('/post-register', [AuthController::class, 'post_register'])->name('post.register');

// Route untuk proses login
Route::post('/post-login', [AuthController::class, 'login'])->name('post.login');

Route::get('/password/reset', [AuthController::class, 'showResetPassword'])->name('password.request');

// Route::get('/kostum', [KostumController::class, 'indexx']);
// Route::get('/kostum/{id}', [KostumController::class, 'showKostum']);
// Route::get('/layanan', [HomeController::class, 'showlayanan']);

// Route untuk halaman layanan yang menampilkan semua layanan termasuk kostum
Route::get('/layanan', [HomeController::class, 'showlayanan'])->name('layanan');

Route::get('/layanan/acara/{tanggal}', [CalendarController::class, 'schedule']);

Route::get('/event-details', [CalendarController::class, 'getEventDetails']);
Route::get('/layanan', [CalendarController::class, 'index'])->name('layanan');

Route::get('/api/calendar-events', [CalendarController::class, 'getCalendarEvents']);

// Route::get('/api/produk/{layanan}', [Product Controller::class, 'getProduk']);

// // Route untuk layanan kostum
// Route::get('/api/produk/kostum', [KostumController::class, 'getKostumProduk']);

// // Route untuk kostum
// Route::get('/produk/kostum', [KostumController::class, 'getKostum']);

// // Route untuk makeup
// Route::get('/produk/makeup', [MakeUpController::class, 'getMakeUp']);


// Route untuk mendapatkan data kostum
Route::get('/produk/kostum', [KostumController::class, 'index']);

// Route untuk mendapatkan data makeup
Route::get('/produk/makeup', [MakeUpController::class, 'index']);

// Route untuk mendapatkan data jasa tari
Route::get('/produk/jasa-tari', [PenyewaanJasaTariController::class, 'index']);

Route::post('/create_midtrans_transaction', function (Request $request) {
    $productName = $request->product_name;
    $quantity = $request->quantity;
    $customerName = $request->customer_name;
    $customerEmail = $request->customer_email;

    $price = 100000; // Harga per item
    $total = $price * $quantity;

    Config::$serverKey = 'YOUR_SERVER_KEY';
    Config::$isProduction = false;
    Config::$isSanitized = true;
    Config::$is3ds = true;

    $transactionDetails = [
        'order_id' => uniqid(),
        'gross_amount' => $total
    ];

    $customerDetails = [
        'first_name' => $customerName,
        'email' => $customerEmail
    ];

    $transaction = [
        'transaction_details' => $transactionDetails,
        'customer_details' => $customerDetails
    ];

    try {
        $snapToken = Snap::createTransaction($transaction)->redirect_url;
        return response()->json(['redirect_url' => $snapToken]);
    } catch (Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
    }

    // Route::get('/produk/jasa-tari/{id}', [ProductController::class, 'showJasaTari'])->name('produk.jasa-tari.detail');
    // Route::get('/produk/kostum/{id}', [ProductController::class, 'showKostum'])->name('produk.kostum.detail');
    // Route::get('/produk/makeup/{id}', [ProductController::class, 'showMakeup'])->name('produk.makeup.detail');
    // Route::get('/layanan/detail/{id}', [ProductController::class, 'detailProduk'])->name('layanan.detail');

    // Route::get('/routes', function () {
    //     return response()->json(\Illuminate\Support\Facades\Route::getRoutes());
    // });


    // Route untuk menampilkan detail produk
});
Route::get(uri: '/produk/kostum/detail/{id}', action: [ProductController::class, 'detail'])->name('produk.detail');