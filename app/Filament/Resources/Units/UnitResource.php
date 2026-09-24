<?php

namespace App\Filament\Resources\Units;

use App\Filament\Resources\Units\Pages\CreateUnit;
use App\Filament\Resources\Units\Pages\EditUnit;
use App\Filament\Resources\Units\Pages\ListUnits;
use App\Filament\Resources\Units\Schemas\UnitForm;
use App\Filament\Resources\Units\Tables\UnitsTable;
use App\Models\Unit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Filament\Resources\Units\Pages\ManageUnitInstallments;
use App\Filament\Resources\Units\Pages\ManageUnitFurniture;
use App\Filament\Resources\Units\Pages\ManageUnitExpense;
use App\Filament\Resources\Units\Pages\ManageUnitMaintenanceDeposit;
use App\Filament\Resources\Units\Pages\ManageRentUnit;
use Filament\Resources\Pages\Page;
use Filament\Pages\Enums\SubNavigationPosition;

class UnitResource extends Resource
{
    protected static ?SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;
    protected static ?string $model = Unit::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHome;

    protected static ?string $recordTitleAttribute = 'Unit';

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function form(Schema $schema): Schema
    {
        return UnitForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UnitsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUnits::route('/'),
            'create' => CreateUnit::route('/create'),
            'edit' => EditUnit::route('/{record}/edit'),
            'installement' => Pages\ManageUnitInstallments::route('/{record}/installement'),
            'furniture' => Pages\ManageUnitFurniture::route('/{record}/furniture'),
            'expenses' => Pages\ManageUnitExpense::route('/{record}/expenses'),
            'maintenance' => Pages\ManageUnitMaintenanceDeposit::route('/{record}/maintenance'),
            'rent' => Pages\ManageRentUnit::route('/{record}/rent'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            // ...
            Pages\EditUnit::class,
            Pages\ManageUnitInstallments::class,
            Pages\ManageUnitFurniture::class,
            Pages\ManageUnitExpense::class,
            Pages\ManageUnitMaintenanceDeposit::class,
            Pages\ManageRentUnit::class,
        ]);
    }
}
