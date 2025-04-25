<?php

namespace App\Filament\Resources\PenyewaanJasaTariResource\Pages;

use App\Filament\Resources\PenyewaanJasaTariResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenyewaanjasataris extends ListRecords
{
    protected static string $resource = PenyewaanjasatariResource::class;

    // Menambahkan tombol tambahan di halaman index (opsional)
    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(), // Tombol untuk membuat penyewaan jasa tari baru
        ];
    }
}
