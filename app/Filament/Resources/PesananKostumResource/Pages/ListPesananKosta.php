<?php

namespace App\Filament\Resources\PesananKostumResource\Pages;

use App\Filament\Resources\PesananKostumResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPesananKosta extends ListRecords
{
    protected static string $resource = PesananKostumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
