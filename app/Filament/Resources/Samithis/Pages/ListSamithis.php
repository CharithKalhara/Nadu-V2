<?php

namespace App\Filament\Resources\Samithis\Pages;

use App\Filament\Resources\Samithis\SamithiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSamithis extends ListRecords
{
    protected static string $resource = SamithiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
