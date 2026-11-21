<?php

namespace App\Filament\Resources\Countries\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CountryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name_en')
                    ->required(),
                TextInput::make('name_ar')
                    ->required(),
                TextInput::make('iso2')
                    ->required(),
                TextInput::make('iso3')
                    ->required(),
                TextInput::make('numeric_code')
                    ->required(),
            ]);
    }
}
