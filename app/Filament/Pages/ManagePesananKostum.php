<?php

namespace App\Filament\Resources\PesananKostumResource\Pages;

use App\Filament\Resources\PesananKostumResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ManagePesananKostum extends ListRecords
{
    protected static string $resource = PesananKostumResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}