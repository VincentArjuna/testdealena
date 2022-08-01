<?php

namespace App\Filament\Resources\Store;

use App\Filament\Resources\Store\StoreResource\Pages;
use App\Filament\Resources\Store\StoreResource\Pages\EditStore;
use App\Filament\Resources\Store\StoreResource\RelationManagers;
use App\Models\Location\City;
use App\Models\Location\Province;
use App\Models\Location\Subdistrict;
use App\Models\Store\Store;
use App\Models\User;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Str;

class StoreResource extends Resource
{
    protected static ?string $model = Store::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?int $navigationSort = 2;

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('User')
                    ->options(User::all()->pluck('name', 'id'))
                    ->required()
                    ->searchable()
                    ->required(),
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->reactive()
                    ->afterStateUpdated(function (Closure $set, $state) {
                        $set('slug', function ($state) {
                            $slug = Str::slug($state);
                            $same = Store::where('slug', $slug)->get();
                            if ($same->count() > 0) {
                                $increment = $same->count() + 1;
                                $slug .= '-' . $increment;
                            }
                            return $slug;
                        });
                    }),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->disabled(true),
                Select::make('province_id')
                    ->label('Province')
                    ->options(Province::all()->pluck('province_name', 'province_id'))
                    ->required()
                    ->searchable()
                    ->required(),
                Select::make('city_id')
                    ->label('City')
                    ->options(City::all()->pluck('city_name', 'city_id'))
                    ->required()
                    ->searchable()
                    ->required(),
                Select::make('district_id')
                    ->label('District')
                    ->options(Subdistrict::all()->pluck('subdistrict_name', 'subdistrict_id'))
                    ->required()
                    ->searchable(),
                TextInput::make('postal_code')
                    ->required()
                    ->maxLength(255),
                TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                Toggle::make('is_active')
                    ->inline(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('city.city_name'),
                BooleanColumn::make('is_active'),
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
            'index' => Pages\ListStores::route('/'),
            'create' => Pages\CreateStore::route('/create'),
            'edit' => Pages\EditStore::route('/{record}/edit'),
        ];
    }
}
