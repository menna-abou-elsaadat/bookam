<?php

namespace App\Filament\Resources\Countries\Resources\Cities;

use App\Filament\Resources\Countries\CountryResource;
use App\Filament\Resources\Countries\Resources\Cities\Pages\CreateCity;
use App\Filament\Resources\Countries\Resources\Cities\Pages\EditCity;
use App\Filament\Resources\Countries\Resources\Cities\Schemas\CityForm;
use App\Filament\Resources\Countries\Resources\Cities\Tables\CitiesTable;
use App\Models\City;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Resources\Pages\Page;
use Filament\Pages\Enums\SubNavigationPosition;

class CityResource extends Resource
{
    protected static ?SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;
    protected static ?string $model = City::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static ?string $parentResource = CountryResource::class;

    protected static ?string $recordTitleAttribute = 'City';

    public static function form(Schema $schema): Schema
    {
        return CityForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CitiesTable::configure($table);
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
            'create' => CreateCity::route('/create'),
            'edit' => EditCity::route('/{record}/edit'),
            'areas' => Pages\ManageCityAreas::route('/{record}/areas'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            Pages\EditCity::class,
            Pages\ManageCityAreas::class,
        ]);
    }

}
