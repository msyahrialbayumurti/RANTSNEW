<?php

namespace App\Filament\Resources\PesananPenyewaanJasaTariResource\Pages;

use App\Filament\Resources\PesananPenyewaanJasaTariResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPesananPenyewaanJasaTaris extends ListRecords
{
    protected static string $resource = PesananPenyewaanJasaTariResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
