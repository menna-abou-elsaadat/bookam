<?php

namespace App\Filament\Resources\Countries\Resources\Cities\Pages;

use App\Filament\Resources\Countries\Resources\Cities\CityResource;
use App\Filament\Resources\Countries\Resources\Cities\Resources\Areas\AreaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables\Table;

class ManageCityAreas extends ManageRelatedRecords
{
    protected static string $resource = CityResource::class;

    protected static string $relationship = 'areas';

    protected static ?string $relatedResource = AreaResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
