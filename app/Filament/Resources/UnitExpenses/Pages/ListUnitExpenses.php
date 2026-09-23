<?php

namespace App\Filament\Resources\UnitExpenses\Pages;

use App\Filament\Resources\UnitExpenses\UnitExpenseResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUnitExpenses extends ListRecords
{
    protected static string $resource = UnitExpenseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
