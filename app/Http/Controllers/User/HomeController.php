<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kostum;
use App\Models\MakeUp;
use App\Models\PenyewaanJasaTari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function showHome()
    {
        return view('pages.user.home'); // Pastikan file ada di resources/views/auth/login.blade.php
    }

    public function showAboutme()
    {
        return view('pages.user.tentangkami');
    }

    public function showRiwayat(){
        return view('pages.user.riwayat');
    }
    public function showProfil(){
        return view('pages.user.profil');
    }

    // public function showLayanan()
    // {
    //     return view('pages.user.layanan');
    // }

    public function showKontak(){
        return view('pages.user.kontak');
    }

    public function showNotifikasi()
    {
        return view('pages.user.notifikasi');
    }

    public function showlayanan()
    {
        try {
            $services = [
                [
                    'name' => 'Penyewaan Jasa Tari',
                    'description' => 'Penari profesional untuk berbagai acara.',
                    'icon' => 'fa fa-drum',
                    'products' => PenyewaanJasaTari::all(),
                ],
                [
                    'name' => 'Penyewaan Makeup',
                    'description' => 'Tata rias untuk berbagai kebutuhan.',
                    'icon' => 'fa fa-paint-brush',
                    'products' => MakeUp::all(),
                ],
                [
                    'name' => 'Penyewaan Kostum',
                    'description' => 'Kostum tradisional dan modern.',
                    'icon' => 'fa fa-tshirt',
                    'products' => Kostum::all(),
                ],
            ];
            return view('pages.user.layanan', compact('services'));
        } catch (\Exception $e) {
            return $e->getMessage(); // Menampilkan error jika ada
        }
    }

    public function showDescription()
    {
        
    }
}