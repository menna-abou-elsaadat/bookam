<?php

namespace App\Filament\Resources\Furnitures;

use App\Filament\Resources\Furnitures\Pages\CreateFurniture;
use App\Filament\Resources\Furnitures\Pages\EditFurniture;
use App\Filament\Resources\Furnitures\Pages\ListFurnitures;
use App\Filament\Resources\Furnitures\Schemas\FurnitureForm;
use App\Filament\Resources\Furnitures\Tables\FurnituresTable;
use App\Models\Furniture;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class FurnitureResource extends Resource
{
    protected static ?string $model = Furniture::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    protected static string|UnitEnum|null $navigationGroup = 'Settings';

    public static function form(Schema $schema): Schema
    {
        return FurnitureForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FurnituresTable::configure($table);
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::count();
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFurnitures::route('/'),
            'create' => CreateFurniture::route('/create'),
            'edit' => EditFurniture::route('/{record}/edit'),
        ];
    }
}
