<?php

namespace App\Filament\Resources\PesananMakeUpResource\Pages;

use App\Filament\Resources\PesananMakeUpResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPesananMakeUp extends EditRecord
{
    protected static string $resource = PesananMakeUpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
