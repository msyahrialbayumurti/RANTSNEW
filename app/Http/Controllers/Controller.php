<?php

namespace App\Http\Controllers;
use App\Http\Resources\PesananKostumResource;
use App\Http\Resources\PesananMakeUpResource;
use App\Http\Resources\PesananPenyewaanJasaTariResource; 
use App\Models\PesananPenyewaanJasaTari;
use App\Models\PesananKostum;
use App\Models\PesananMakeUp;


abstract class Controller
{
    protected $middlewareGroups = [
        'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    // public function showPesananKostum($id)
    // {
    //     $pesananKosta = PesananKostum::with(['kosta', 'user'])->findOrFail($id);
    //     return new PesananKostumResource($pesananKosta);
    // }
    // public function showPesananMakeUp($id) // Mengubah nama metode
    // {
    //     $pesananMakeUp = PesananMakeUp::with(['makeUp', 'user'])->findOrFail($id);
    //     return new PesananMakeUpResource($pesananMakeUp);
    // }


    // public function showPesananPenyewaanJasaTari($id)
    // {
    //     $pesananPenyewaanJasaTaris = PesananPenyewaanJasaTari::with(['penyewaanJasaTaris', 'user'])->findOrFail($id);
    //     return new PesananPenyewaanJasaTariResource($pesananPenyewaanJasaTaris);
    // }

    }
