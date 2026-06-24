<?php

namespace App\Filament\Resources\Nadus;

use App\Filament\Resources\Nadus\Pages\CreateNadu;
use App\Filament\Resources\Nadus\Pages\EditNadu;
use App\Filament\Resources\Nadus\Pages\ListNadus;
use App\Filament\Resources\Nadus\Schemas\NaduForm;
use App\Filament\Resources\Nadus\Tables\NadusTable;
use App\Models\Nadu;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class NaduResource extends Resource
{
    protected static ?string $model = Nadu::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'samithiya';

    public static function form(Schema $schema): Schema
    {
        return NaduForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NadusTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListNadus::route('/'),
            'create' => CreateNadu::route('/create'),
            'edit' => EditNadu::route('/{record}/edit'),
        ];
    }
}
