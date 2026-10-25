<?php

namespace App\Filament\Resources\Furnitures\Pages;

use App\Filament\Resources\Furnitures\FurnitureResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFurnitures extends ListRecords
{
    protected static string $resource = FurnitureResource::class;

    protected function getHeaderActions(): array
    {
        return [CreateAction::make()];
    }
}
