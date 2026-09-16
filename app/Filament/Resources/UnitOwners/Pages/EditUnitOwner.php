<?php

namespace App\Filament\Resources\UnitOwners\Pages;

use App\Filament\Resources\UnitOwners\UnitOwnerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUnitOwner extends EditRecord
{
    protected static string $resource = UnitOwnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
