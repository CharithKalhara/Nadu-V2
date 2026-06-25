<?php

namespace App\Filament\Resources\Samithis\Pages;

use App\Filament\Resources\Samithis\SamithiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSamithi extends EditRecord
{
    protected static string $resource = SamithiResource::class;

    public function getHeading(): string
    {
        return 'Edit';
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}