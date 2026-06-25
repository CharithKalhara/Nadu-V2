<?php

namespace App\Filament\Resources\UsaviGathaKirimataAthiNadus\Pages;

use App\Filament\Resources\UsaviGathaKirimataAthiNadus\UsaviGathaKirimataAthiNaduResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUsaviGathaKirimataAthiNadu extends EditRecord
{
    protected static string $resource = UsaviGathaKirimataAthiNaduResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
