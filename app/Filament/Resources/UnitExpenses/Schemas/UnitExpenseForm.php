<?php

namespace App\Filament\Resources\UnitExpenses\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class UnitExpenseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('unit_id')
                    ->label('Unit')
                    ->required()
                    ->relationship('unit', 'code_number')
                    ->searchable(),
                Select::make('expense_category_id')
                    ->required()
                    ->label('Expense Category')
                    ->relationship('expenseCategory','name')
                    ->createOptionForm([
                        TextInput::make('name')
                        ->required(),
                    ])
                    ->searchable(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                TextInput::make('currency')
                    ->required()
                    ->default('EGP'),
                Textarea::make('description')
                    ->columnSpanFull(),
                DatePicker::make('expense_date')
                    ->required(),
                DatePicker::make('due_date'),
                Toggle::make('is_paid')
                    ->required(),
            ]);
    }
}
