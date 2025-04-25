<?php

namespace App\Filament\Resources\PesananPenyewaanJasaTariResource\Pages;

use App\Filament\Resources\PesananPenyewaanJasaTariResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPesananPenyewaanJasaTari extends EditRecord
{
    protected static string $resource = PesananPenyewaanJasaTariResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
