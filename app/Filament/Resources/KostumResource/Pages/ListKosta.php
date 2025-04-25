<?php

namespace App\Filament\Resources\KostumResource\Pages;

use App\Filament\Resources\KostumResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKosta extends ListRecords
{
    protected static string $resource = KostumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
