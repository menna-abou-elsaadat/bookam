<?php

namespace App\Filament\Resources\Units\Pages;

use App\Filament\Resources\Units\UnitResource;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Group;
use Filament\Actions\Action;
use App\Models\UnitDeposit;

class ManageRentUnit extends ManageRelatedRecords
{
    protected static string $resource = UnitResource::class;

    protected static string $relationship = 'rentUnits';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('rent_type')
                    ->options(['daily' => 'Daily', 'monthly' => 'Monthly', 'yearly' => 'Yearly'])
                    ->required(),
                TextInput::make('tenant_phone')
                    ->tel(),
                FileUpload::make('tenant_id_card_front')
                    ->label('ID Card Front')
                    ->image()
                    ->imageEditor(),
                FileUpload::make('tenant_id_card_back')
                    ->label('ID Card Back')
                    ->image()
                    ->imageEditor(),
                TextInput::make('rent_amount')
                    ->required()
                    ->numeric(),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date'),
                Select::make('payment_status')
                    ->options(['pending' => 'Pending', 'paid' => 'Paid', 'late' => 'Late'])
                    ->default('pending')
                    ->required(),
                TextInput::make('number_of_adults')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('number_of_children')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('total_amount')
                    ->required()
                    ->numeric(),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('RentUnit')
            ->columns([
                TextColumn::make('rent_type')
                    ->badge(),
                TextColumn::make('tenant_phone')
                    ->searchable(),
                TextColumn::make('rent_amount')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('payment_status')
                    ->badge(),
                TextColumn::make('number_of_adults')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('number_of_children')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('total_amount')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
