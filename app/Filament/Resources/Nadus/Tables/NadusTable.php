<?php

namespace App\Filament\Resources\Nadus\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;

class NadusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('year')->sortable()->searchable(),

                TextColumn::make('thiraka_no')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('samithiya')
                    ->searchable(),

                TextColumn::make('recieved_date')
                    ->date(),

                TextColumn::make('nadu_no')
                    ->sortable()
                    ->searchable(),
    
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