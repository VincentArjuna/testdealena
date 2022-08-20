<?php

namespace App\Filament\Resources\Store;

use App\Filament\Resources\Store\RekeningResource\Pages;
use App\Filament\Resources\Store\RekeningResource\RelationManagers;
use App\Models\Bank;
use App\Models\Store\Rekening;
use App\Models\Store\Store;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RekeningResource extends Resource
{
    protected static ?string $model = Rekening::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 0;

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('store_id')
                    ->label('Store')
                    ->options(Store::all()->pluck('name', 'id'))
                    ->required()
                    ->searchable(),
                Select::make('bank_id')
                    ->label('Bank')
                    ->options(Bank::all()->pluck('name', 'id'))
                    ->required()
                    ->searchable(),
                TextInput::make('atas_nama')
                    ->required(),
                TextInput::make('no_rek')
                    ->label('Nomor Rekening')
                    ->numeric()
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('store.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('bank.name'),
                TextColumn::make('atas_nama')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('no_rek')
                    ->searchable()
                    ->label('Atas Nama')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRekenings::route('/'),
            'create' => Pages\CreateRekening::route('/create'),
            'edit' => Pages\EditRekening::route('/{record}/edit'),
        ];
    }
}
