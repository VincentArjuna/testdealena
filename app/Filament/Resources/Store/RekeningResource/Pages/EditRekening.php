<?php

namespace App\Filament\Resources\Store\RekeningResource\Pages;

use App\Filament\Resources\Store\RekeningResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRekening extends EditRecord
{
    protected static string $resource = RekeningResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
