<?php

namespace App\Filament\Resources\Countries\Resources\Cities\Resources\Areas;

use App\Filament\Resources\Countries\Resources\Cities\CityResource;
use App\Filament\Resources\Countries\Resources\Cities\Resources\Areas\Pages\CreateArea;
use App\Filament\Resources\Countries\Resources\Cities\Resources\Areas\Pages\EditArea;
use App\Filament\Resources\Countries\Resources\Cities\Resources\Areas\Schemas\AreaForm;
use App\Filament\Resources\Countries\Resources\Cities\Resources\Areas\Tables\AreasTable;
use App\Models\Area;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Resources\Pages\Page;
use Filament\Pages\Enums\SubNavigationPosition;

class AreaResource extends Resource
{
    protected static ?SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;
    protected static ?string $model = Area::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $parentResource = CityResource::class;

    protected static ?string $recordTitleAttribute = 'Area';

    public static function form(Schema $schema): Schema
    {
        return AreaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AreasTable::configure($table);
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
            'create' => CreateArea::route('/create'),
            'edit' => EditArea::route('/{record}/edit'),
            'villages' => Pages\ManageAreaVillages::route('/{record}/villages'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            Pages\EditArea::class,
            Pages\ManageAreaVillages::class,
        ]);
    }
}
