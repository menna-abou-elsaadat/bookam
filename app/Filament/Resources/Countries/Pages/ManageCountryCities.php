<?php

namespace App\Filament\Resources\Countries\Pages;

use App\Filament\Resources\Countries\CountryResource;
use App\Filament\Resources\Countries\Resources\Cities\CityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables\Table;

class ManageCountryCities extends ManageRelatedRecords
{
    protected static string $resource = CountryResource::class;

    protected static string $relationship = 'cities';

    protected static ?string $relatedResource = CityResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
