<?php

namespace App\Filament\Resources\UnitOwners\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UnitOwnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('unit_id')
                    ->label('Unit')
                    ->required()
                    ->options(\App\Models\Unit::all()->pluck('code_number', 'id'))
                    ->searchable(),
                Select::make('owner_id')
                    ->label('Owner')
                    ->required()
                    ->options(\App\Models\Owner::all()->pluck('name', 'id'))
                    ->searchable(),
                TextInput::make('share_percentage')
                    ->required()
                    ->numeric(),
            ]);
    }
}
