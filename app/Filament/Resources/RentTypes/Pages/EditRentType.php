<?php

namespace App\Filament\Resources\RentTypes\Pages;

use App\Filament\Resources\RentTypes\RentTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRentType extends EditRecord
{
    protected static string $resource = RentTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
