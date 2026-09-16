<?php

namespace App\Filament\Resources\UnitOwners\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Filament\Resources\Owners\OwnerResource;

class UnitOwnersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('unit.code_number')
                    ->label('Unit')
                    ->sortable(),
                TextColumn::make('owner.name')
                    ->label('Owner')
                    ->sortable()
                    ->url(fn ($record) => OwnerResource::getUrl('edit', ['record' => $record->owner_id])),
                TextColumn::make('share_percentage')
                    ->numeric()
                    ->sortable(),
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
