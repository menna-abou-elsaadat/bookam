<?php

namespace App\Filament\Resources\UnitOwners;

use App\Filament\Resources\UnitOwners\Pages\CreateUnitOwner;
use App\Filament\Resources\UnitOwners\Pages\EditUnitOwner;
use App\Filament\Resources\UnitOwners\Pages\ListUnitOwners;
use App\Filament\Resources\UnitOwners\Schemas\UnitOwnerForm;
use App\Filament\Resources\UnitOwners\Tables\UnitOwnersTable;
use App\Models\UnitOwner;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Filament\Clusters\Units\UnitsCluster;

class UnitOwnerResource extends Resource
{
    protected static ?string $model = UnitOwner::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static ?string $recordTitleAttribute = 'UnitOwner';
     protected static ?string $cluster = UnitsCluster::class;
    public static function form(Schema $schema): Schema
    {
        return UnitOwnerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UnitOwnersTable::configure($table);
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
            'index' => ListUnitOwners::route('/'),
            'create' => CreateUnitOwner::route('/create'),
            'edit' => EditUnitOwner::route('/{record}/edit'),
        ];
    }
}
