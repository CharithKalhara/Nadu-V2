<?php

namespace App\Filament\Resources\Samithis\Pages;

use App\Filament\Resources\Samithis\SamithiResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateSamithi extends CreateRecord
{
    protected static string $resource = SamithiResource::class;

    protected function getCreateAnotherFormAction(): Action
    {
        return parent::getCreateAnotherFormAction()
            ->label('Next');
    }
}