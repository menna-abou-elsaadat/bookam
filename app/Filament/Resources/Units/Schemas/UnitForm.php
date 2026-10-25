<?php

namespace App\Filament\Resources\Units\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Support\Icons\Heroicon;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Repeater;
use Illuminate\Support\HtmlString;

class UnitForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Step::make('Unit')
                     ->icon(Heroicon::Home)
                        ->schema([
                            TextInput::make('code_number'),
                                Section::make([
                                Textarea::make('country'),
                                Textarea::make('city'),
                                Textarea::make('area'),
                                Textarea::make('address'),
                                ])->columns(2),
                                Section::make([
                                    Select::make('payment_status')
                                        ->options(['fully_paid' => 'Fully paid', 'installments' => 'Installments'])
                                        ->required(),
                                    TextInput::make('total_price')
                                        ->numeric()
                                        ->prefix('EGP'),
                                ])->columns(2)
                            ]),
                    Step::make('Owners')
                     ->icon(Heroicon::Users)
                        ->schema([
                            Repeater::make('owners')
                                ->relationship('unitOwners')
                                ->schema([
                                    Select::make('owner_id')
                                        ->label('Owner')
                                        ->required()
                                        ->options(\App\Models\Owner::all()->pluck('name', 'id'))
                                        ->searchable(),
                                    TextInput::make('share_percentage')
                                        ->required()
                                        ->numeric(),
                                ])->columns(2),
                        ]),
                    Step::make('Features')
                     ->icon(Heroicon::Tag)
                        ->schema([
                            Repeater::make('features')
                            ->relationship('features')
                                ->schema([
                                    Select::make('feature')
                                        ->required()
                                        ->options(function ($record) {
                                                $options = \App\Models\Feature::pluck('name', 'name')->toArray();

                                                if ($record?->feature && ! isset($options[$record->feature])) {
                                                    $options[$record->feature] = $record->feature ;
                                                }

                                                return $options;
                                            }),
                                    TextInput::make('value')
                                        ->required(),
                                ])
                                ->columns(2)
                                ->columnSpanFull()
                                ->reorderable(false)

                        ]),
                ])->columnSpanFull()
                ->submitAction(new HtmlString('<button type="submit">Submit</button>')),

            ]);
    }

}
