<?php

namespace App\Filament\Resources\UnitExpenses\Pages;

use App\Filament\Resources\UnitExpenses\UnitExpenseResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUnitExpense extends EditRecord
{
    protected static string $resource = UnitExpenseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
