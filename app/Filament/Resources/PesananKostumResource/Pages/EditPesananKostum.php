<?php

namespace App\Filament\Resources\PesananKostumResource\Pages;

use App\Filament\Resources\PesananKostumResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPesananKostum extends EditRecord
{
    protected static string $resource = PesananKostumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
