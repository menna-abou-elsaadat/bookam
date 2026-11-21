<?php

namespace App\Filament\Resources\Countries\Resources\Cities\Resources\Areas\Resources\Villages;

use App\Filament\Resources\Countries\Resources\Cities\Resources\Areas\AreaResource;
use App\Filament\Resources\Countries\Resources\Cities\Resources\Areas\Resources\Villages\Pages\CreateVillage;
use App\Filament\Resources\Countries\Resources\Cities\Resources\Areas\Resources\Villages\Pages\EditVillage;
use App\Filament\Resources\Countries\Resources\Cities\Resources\Areas\Resources\Villages\Schemas\VillageForm;
use App\Filament\Resources\Countries\Resources\Cities\Resources\Areas\Resources\Villages\Tables\VillagesTable;
use App\Models\Village;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VillageResource extends Resource
{
    protected static ?string $model = Village::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $parentResource = AreaResource::class;

    protected static ?string $recordTitleAttribute = 'Village';

    public static function form(Schema $schema): Schema
    {
        return VillageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VillagesTable::configure($table);
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
            'create' => CreateVillage::route('/create'),
            'edit' => EditVillage::route('/{record}/edit'),
        ];
    }
}
