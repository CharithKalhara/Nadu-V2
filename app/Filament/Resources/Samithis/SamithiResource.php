<?php

namespace App\Filament\Resources\Samithis;

use App\Filament\Resources\Samithis\Pages\CreateSamithi;
use App\Filament\Resources\Samithis\Pages\EditSamithi;
use App\Filament\Resources\Samithis\Pages\ListSamithis;
use App\Filament\Resources\Samithis\Schemas\SamithiForm;
use App\Filament\Resources\Samithis\Tables\SamithisTable;
use App\Models\Samithi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SamithiResource extends Resource
{
    protected static ?string $model = Samithi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'samithiya';

    // Sinhala labels
    protected static ?string $navigationLabel = 'සමිති';
    protected static ?string $modelLabel = 'Record';
    protected static ?string $pluralModelLabel = 'සමිති';

    public static function form(Schema $schema): Schema
    {
        return SamithiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SamithisTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSamithis::route('/'),
            'create' => CreateSamithi::route('/create'),
            'edit' => EditSamithi::route('/{record}/edit'),
        ];
    }
}