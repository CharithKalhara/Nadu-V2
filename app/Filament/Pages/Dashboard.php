<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Actions\Action;

class Dashboard extends BaseDashboard
{
    protected function getHeaderActions(): array
    {
        return [
            Action::make('report')
                ->label('Generate Report')
                ->url(route('report.generate'))
                ->icon('heroicon-o-document-arrow-down'),
        ];
    }
}