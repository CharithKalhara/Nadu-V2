<?php

namespace App\Filament\Resources\UsaviGathaKirimataAthiNadus;

use App\Filament\Resources\Nadus\Schemas\NaduForm;
use App\Filament\Resources\Nadus\Tables\NadusTable;
use App\Filament\Resources\UsaviGathaKirimataAthiNadus\Pages\CreateUsaviGathaKirimataAthiNadu;
use App\Filament\Resources\UsaviGathaKirimataAthiNadus\Pages\EditUsaviGathaKirimataAthiNadu;
use App\Filament\Resources\UsaviGathaKirimataAthiNadus\Pages\ListUsaviGathaKirimataAthiNadus;
use App\Models\Nadu;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UsaviGathaKirimataAthiNadus\Schemas\UsaviGathaKirimataAthiNaduForm;

class UsaviGathaKirimataAthiNaduResource extends Resource
{
    protected static ?string $model = Nadu::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'උසාවි ගත කිරීමට ඇති නඩු';

    protected static ?string $modelLabel = 'උසාවි ගත කිරීමට ඇති නඩුව';

    protected static ?string $pluralModelLabel = 'උසාවි ගත කිරීමට ඇති නඩු';

    protected static ?string $recordTitleAttribute = 'thiraka_no';

    public static function form(Schema $schema): Schema
    {
        return UsaviGathaKirimataAthiNaduForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NadusTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where(function (Builder $query) {
                $query->whereNull('nadu_no')
                    ->orWhere('nadu_no', '');
            });
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsaviGathaKirimataAthiNadus::route('/'),
            'create' => CreateUsaviGathaKirimataAthiNadu::route('/create'),
            'edit' => EditUsaviGathaKirimataAthiNadu::route('/{record}/edit'),
        ];
    }
}