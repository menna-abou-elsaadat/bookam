<?php

namespace App\Filament\Resources\RentTypes\Pages;

use App\Filament\Resources\RentTypes\RentTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRentTypes extends ListRecords
{
    protected static string $resource = RentTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
