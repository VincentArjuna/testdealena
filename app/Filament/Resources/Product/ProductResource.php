<?php

namespace App\Filament\Resources\Product;

use App\Filament\Resources\Product\ProductResource\Pages;
use App\Filament\Resources\Product\ProductResource\RelationManagers;
use App\Models\Product\Product;
use App\Models\Product\ProductCategory;
use App\Models\Setting\Entity;
use App\Models\Store\Store;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
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

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    protected static ?int $navigationSort = 3;

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('bid_start', '<=', now())
            ->where('bid_end', '>=', now())->count();
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
                Select::make('store_id')
                    ->label('Store')
                    ->options(Store::all()->pluck('name', 'id'))
                    ->required()
                    ->searchable()
                    ->required(),
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Select::make('product_category_id')
                    ->label('Category')
                    ->options(ProductCategory::all()->pluck('name', 'id'))
                    ->required()
                    ->searchable()
                    ->required(),
                Fieldset::make('Image')
                    ->schema([
                        FileUpload::make('image_front')
                            ->label('Front Image')
                            ->columnSpan(1)
                            ->required(),
                        FileUpload::make('image_back')
                            ->label('Back Image'),
                        FileUpload::make('image_left')
                            ->label('Left Image'),
                        FileUpload::make('image_right')
                            ->label('Right Image')
                    ]),
                Textarea::make('description')
                    ->maxLength(65535),
                Fieldset::make('Dimension')
                    ->schema([
                        TextInput::make('weight')->numeric()
                            ->suffix('Gram')
                            ->required(),
                        TextInput::make('length')->numeric()
                            ->suffix('Cm'),
                        TextInput::make('width')->numeric()
                            ->suffix('Cm'),
                        TextInput::make('height')->numeric()
                            ->suffix('Cm')
                    ]),
                TextInput::make('start_bid')->numeric()
                    ->required(),
                TextInput::make('bid_multiplier')->numeric()
                    ->required(),
                DateTimePicker::make('bid_start'),
                DateTimePicker::make('bid_end'),
                Select::make('bid_end_range')
                    ->label('Bid End Range')
                    ->options(Entity::where('name', 'bid_end')->pluck('text', 'value'))
                    ->required()
                    ->searchable(),
                TextInput::make('bid_bin')->numeric()
                    ->required(),
                TextInput::make('min_deposit')->numeric()
                    ->required(),
                TextInput::make('qty')->numeric()
                    ->required(),
                TextInput::make('condition')
                    ->maxLength(255),
                TextInput::make('quality')
                    ->maxLength(255),
                Toggle::make('is_show')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('store.name'),
                TextColumn::make('name'),
                TextColumn::make('category.name'),
                TextColumn::make('view_count'),
                BooleanColumn::make('is_show'),
                TextColumn::make('winner_id'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
