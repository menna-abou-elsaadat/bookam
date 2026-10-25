<?php

namespace App\Filament\Resources\Furnitures\Pages;

use App\Filament\Resources\Furnitures\FurnitureResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFurniture extends CreateRecord
{
    protected static string $resource = FurnitureResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
