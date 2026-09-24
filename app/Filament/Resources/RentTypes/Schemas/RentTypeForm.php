<?php

namespace App\Filament\Resources\RentTypes\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class RentTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
