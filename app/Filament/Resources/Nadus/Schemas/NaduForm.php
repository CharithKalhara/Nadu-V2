<?php

namespace App\Filament\Resources\Nadus\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;

class NaduForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('year')
                    ->required(),

                TextInput::make('thiraka_no')
                    ->required(),

                TextInput::make('samithiya')
                    ->required()
                    ->maxLength(200),

                DatePicker::make('recieved_date')
                    ->required(),

                TextInput::make('nadu_no'),
            ]);
    }
}