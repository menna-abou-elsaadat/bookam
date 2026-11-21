<?php

namespace App\Filament\Resources\Countries\Resources\Cities\Resources\Areas\Pages;

use App\Filament\Resources\Countries\Resources\Cities\Resources\Areas\AreaResource;
use App\Filament\Resources\Countries\Resources\Cities\Resources\Areas\Resources\Villages\VillageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables\Table;

class ManageAreaVillages extends ManageRelatedRecords
{
    protected static string $resource = AreaResource::class;

    protected static string $relationship = 'villages';

    protected static ?string $relatedResource = VillageResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
