<?php

namespace App\Filament\Resources\Countries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CountriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name_en')
                    ->searchable(),
                TextColumn::make('name_ar')
                    ->searchable(),
                TextColumn::make('iso2')
                    ->searchable(),
                TextColumn::make('iso3')
                    ->searchable(),
                TextColumn::make('numeric_code')
                    ->searchable(),
                TextColumn::make('cities_count')
                ->label('Cities Count')
                    ->counts('cities')
                    ->label('Cities Count'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
