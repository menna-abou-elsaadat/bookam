<?php

namespace App\Filament\Resources\Countries;

use App\Filament\Resources\Countries\Pages\CreateCountry;
use App\Filament\Resources\Countries\Pages\EditCountry;
use App\Filament\Resources\Countries\Pages\ListCountries;
use App\Filament\Resources\Countries\Schemas\CountryForm;
use App\Filament\Resources\Countries\Tables\CountriesTable;
use App\Models\Country;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;
use Filament\Resources\Pages\Page;
use Filament\Pages\Enums\SubNavigationPosition;

class CountryResource extends Resource
{
    protected static ?SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;
    protected static ?string $model = Country::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedGlobeAmericas;

    protected static ?string $recordTitleAttribute = 'Country';
    protected static string|UnitEnum|null $navigationGroup = 'Settings';

    public static function form(Schema $schema): Schema
    {
        return CountryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CountriesTable::configure($table);
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::count();
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
            'index' => ListCountries::route('/'),
            'create' => CreateCountry::route('/create'),
            'edit' => EditCountry::route('/{record}/edit'),
            'manage-cities' => Pages\ManageCountryCities::route('/{record}/manage-cities'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            // ...
            Pages\EditCountry::class,
            Pages\ManageCountryCities::class,
        ]);
    }
}
