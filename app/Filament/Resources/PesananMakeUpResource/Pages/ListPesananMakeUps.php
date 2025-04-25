<?php

namespace App\Filament\Resources\PesananMakeUpResource\Pages;

use App\Filament\Resources\PesananMakeUpResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPesananMakeUps extends ListRecords
{
    protected static string $resource = PesananMakeUpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
