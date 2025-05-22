<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalBooking = Booking::count();
        $todayBooking = Booking::whereDate('created_at', now())->count();
        $thisMonthBooking = Booking::whereMonth('created_at', now()->month)->count();

        return [
            Stat::make('Total Booking', number_format($totalBooking)),
            Stat::make('Booking Hari Ini', number_format($todayBooking)),
            Stat::make('Booking Bulan Ini', number_format($thisMonthBooking)),
        ];
    }
}
