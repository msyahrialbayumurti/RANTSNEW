<?php

namespace App\Http\Controllers;

use App\Models\Kostum;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Menampilkan detail produk dari tabel Kostum berdasarkan ID.
     *
     * @param int $id
     * @return \Illuminate\View\View|\Illuminate\Http\Response
     */
    public function detail($id)
    {
        // Cari produk berdasarkan ID
        $produk = Kostum::find($id);

        // Jika produk tidak ditemukan, tampilkan error 404
        if (!$produk) {
            abort(404, 'Produk tidak ditemukan.');
        }

        // Tampilkan view dengan data produk
        return view('pages.user.detail', compact('produk'));
    }
}