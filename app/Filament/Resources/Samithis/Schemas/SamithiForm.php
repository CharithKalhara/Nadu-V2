<?php

namespace App\Filament\Resources\Samithis\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SamithiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('samithiya')
                    ->label('සමිතිය')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}