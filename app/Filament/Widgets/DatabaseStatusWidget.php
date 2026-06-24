<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Facades\DB;
use App\Models\Nadu;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DatabaseStatusWidget extends BaseWidget
{
    protected function getStats(): array
    {
        // DB connection check
        try {
            DB::connection()->getPdo();
            $status = 'Connected';
            $color = 'success';
        } catch (\Exception $e) {
            $status = 'Disconnected';
            $color = 'danger';
        }

        // MySQL uptime
        $uptimeSeconds = DB::select("SHOW STATUS LIKE 'Uptime'")[0]->Value ?? 0;
        $uptime = $this->formatUptime($uptimeSeconds);

        return [
            Stat::make('Database Status', $status)
                ->color($color),

            Stat::make('MySQL Uptime', $uptime)
                ->description('Server running time'),

            Stat::make('Total Nadu Records', Nadu::count()),
        ];
    }

    private function formatUptime(int $seconds): string
    {
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds % 3600) / 60);

        return "{$hours}h {$minutes}m";
    }
}