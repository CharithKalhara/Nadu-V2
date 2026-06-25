<?php

namespace App\Filament\Resources\UsaviGathaKirimataAthiNadus\Pages;

use App\Filament\Resources\UsaviGathaKirimataAthiNadus\UsaviGathaKirimataAthiNaduResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsaviGathaKirimataAthiNadus extends ListRecords
{
    protected static string $resource = UsaviGathaKirimataAthiNaduResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('report')
                ->label('වාර්තාව')
                ->icon('heroicon-o-document-text')
                ->url(route('report.usavi-gatha'))
                ->openUrlInNewTab(),

            Actions\CreateAction::make(),
        ];
    }
}