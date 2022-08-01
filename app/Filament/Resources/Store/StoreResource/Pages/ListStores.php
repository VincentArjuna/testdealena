<?php

namespace App\Filament\Resources\Store\StoreResource\Pages;

use App\Filament\Resources\Store\StoreResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStores extends ListRecords
{
    protected static string $resource = StoreResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
