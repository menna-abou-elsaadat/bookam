<?php

namespace App\Filament\Resources\Units\Pages;

use App\Filament\Resources\Units\UnitResource;
use App\Scopes\ActiveScope;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use App\Enums\RentType;
use Filament\Schemas\Components\Utilities\Get;

class ManageUnitRentType extends ManageRelatedRecords
{
    protected static string $resource = UnitResource::class;

    protected static string $relationship = "rentTypes";

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClock;

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Toggle::make("is_active")
                ->required()
                ->default(true)
                ->columnSpanFull(),
            Select::make("rent_type")
                ->options([
                    RentType::Daily->value => RentType::Daily->value,
                    RentType::Monthly->value => RentType::Monthly->value,
                ])
                ->required()
                ->live(),
            Select::make("maintenance_deposit")
                ->options(function ($record) {
                    $options = [
                        "1 month" => "1 month",
                        "2 months" => "2 months",
                    ];
                    if (
                        $record->maintenance_deposit &&
                        !isset($options[$record->maintenance_deposit])
                    ) {
                        $options[$record->maintenance_deposit] =
                            $record->maintenance_deposit;
                    }
                    $options["other"] = "Other";
                    return $options;
                })
                ->live()
                ->visible(
                    fn(Get $get): bool => $get("rent_type") ===
                        RentType::Monthly->value,
                ),
            TextInput::make("maintenance_deposit_custom")
                ->label("Custom maintenance deposit")
                ->required(
                    fn(Get $get): bool => $get("maintenance_deposit") ===
                        "other",
                )
                ->visible(
                    fn(Get $get): bool => $get("maintenance_deposit") ===
                        "other",
                ),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->withoutGlobalScope(ActiveScope::class))
            ->recordTitleAttribute("UnitRentType")
            ->columns([
                TextColumn::make("rent_type")->badge(),
                TextColumn::make("maintenance_deposit")->searchable(),
                IconColumn::make("is_active")->boolean(),
                TextColumn::make("created_at")
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make("updated_at")
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([CreateAction::make()])
            ->recordActions([EditAction::make(), DeleteAction::make()])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ]);
    }
}
