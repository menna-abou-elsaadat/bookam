<?php

namespace App\Filament\Resources\RentTypes;

use App\Filament\Resources\RentTypes\Pages\CreateRentType;
use App\Filament\Resources\RentTypes\Pages\EditRentType;
use App\Filament\Resources\RentTypes\Pages\ListRentTypes;
use App\Filament\Resources\RentTypes\Schemas\RentTypeForm;
use App\Filament\Resources\RentTypes\Tables\RentTypesTable;
use App\Models\RentType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RentTypeResource extends Resource
{
    protected static ?string $model = RentType::class;
    protected static string | UnitEnum | null $navigationGroup = 'Settings';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocument;

    protected static ?string $recordTitleAttribute = 'RentType';

    public static function form(Schema $schema): Schema
    {
        return RentTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RentTypesTable::configure($table);
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
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
            'index' => ListRentTypes::route('/'),
            'create' => CreateRentType::route('/create'),
            'edit' => EditRentType::route('/{record}/edit'),
        ];
    }
}
