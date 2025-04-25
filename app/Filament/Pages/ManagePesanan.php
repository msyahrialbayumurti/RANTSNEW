<?php

namespace App\Filament\Resources\KelolaPesananResource\Pages;

use App\Filament\Resources\KelolaPesananResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ManagePesanan extends ListRecords
{
    protected static string $resource = KelolaPesananResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}