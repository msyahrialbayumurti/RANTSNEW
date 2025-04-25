<?php

namespace App\Filament\Resources\DaftarPenggunaResource\Pages;

use App\Filament\Resources\DaftarPenggunaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDaftarPengguna extends EditRecord
{
    protected static string $resource = DaftarPenggunaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
