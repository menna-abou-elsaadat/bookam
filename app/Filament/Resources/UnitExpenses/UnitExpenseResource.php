<?php

namespace App\Filament\Resources\UnitExpenses;

use App\Filament\Resources\UnitExpenses\Pages\CreateUnitExpense;
use App\Filament\Resources\UnitExpenses\Pages\EditUnitExpense;
use App\Filament\Resources\UnitExpenses\Pages\ListUnitExpenses;
use App\Filament\Resources\UnitExpenses\Schemas\UnitExpenseForm;
use App\Filament\Resources\UnitExpenses\Tables\UnitExpensesTable;
use App\Models\UnitExpense;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class UnitExpenseResource extends Resource
{
    protected static ?string $model = UnitExpense::class;
    protected static string | UnitEnum | null $navigationGroup = 'Units';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCurrencyDollar;

    protected static ?string $recordTitleAttribute = 'UnitExpense';

    public static function form(Schema $schema): Schema
    {
        return UnitExpenseForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UnitExpensesTable::configure($table);
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
            'index' => ListUnitExpenses::route('/'),
            'create' => CreateUnitExpense::route('/create'),
            'edit' => EditUnitExpense::route('/{record}/edit'),
        ];
    }
}
