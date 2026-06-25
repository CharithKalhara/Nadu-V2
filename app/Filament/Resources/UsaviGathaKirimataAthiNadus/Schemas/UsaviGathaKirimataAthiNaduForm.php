<?php

namespace App\Filament\Resources\UsaviGathaKirimataAthiNadus\Schemas;

use App\Models\Samithi;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UsaviGathaKirimataAthiNaduForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('year')
                    ->disabled(),

                TextInput::make('thiraka_no')
                    ->disabled(),

                Select::make('samithiya')
                    ->options(
                        Samithi::orderBy('samithiya')
                            ->pluck('samithiya', 'samithiya')
                            ->toArray()
                    )
                    ->disabled(),

                DatePicker::make('recieved_date')
                    ->disabled(),

                TextInput::make('nadu_no')
                    ->label('නඩු අංකය')
                    ->required(),
            ]);
    }
}