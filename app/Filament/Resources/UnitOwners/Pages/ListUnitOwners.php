<?php

namespace App\Filament\Resources\UnitOwners\Pages;

use App\Filament\Resources\UnitOwners\UnitOwnerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUnitOwners extends ListRecords
{
    protected static string $resource = UnitOwnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
