<?php

namespace App\Filament\Resources\Owners\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OwnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                    TextInput::make('password')
                        ->password()
                        ->dehydrateStateUsing(fn ($state) => filled($state) ? bcrypt($state) : null)
                        ->dehydrated(fn ($state) => filled($state)) // Only save if not empty
                    ->required(fn ($context) => $context === 'create')
                    ->afterStateHydrated(fn ($set) => $set('password', '')),
                TextInput::make('phone')
                    ->tel(),
            ]);
    }
}
