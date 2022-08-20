<?php

namespace App\Filament\Resources\Store\RekeningResource\Pages;

use App\Filament\Resources\Store\RekeningResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRekenings extends ListRecords
{
    protected static string $resource = RekeningResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
