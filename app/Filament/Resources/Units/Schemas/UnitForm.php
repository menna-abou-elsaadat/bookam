<?php

namespace App\Filament\Resources\Units\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class UnitForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code_number'),

                Textarea::make('country')
                    ->columnSpanFull(),
                Textarea::make('city')
                    ->columnSpanFull(),
                Textarea::make('area')
                    ->columnSpanFull(),
                Textarea::make('address')
                    ->columnSpanFull(),
                Select::make('payment_status')
                    ->options(['fully_paid' => 'Fully paid', 'installments' => 'Installments'])
                    ->required(),
                TextInput::make('total_price')
                    ->numeric()
                    ->prefix('$'),
            ]);
    }
}
