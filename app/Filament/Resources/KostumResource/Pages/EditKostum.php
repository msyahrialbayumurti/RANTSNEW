<?php

namespace App\Filament\Resources\KostumResource\Pages;

use App\Filament\Resources\KostumResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKostum extends EditRecord
{
    protected static string $resource = KostumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
