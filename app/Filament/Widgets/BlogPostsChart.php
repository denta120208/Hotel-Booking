<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class BlogPostsChart extends ChartWidget
{
    protected static ?string $heading = 'Booking per Bulan';

    protected function getData(): array
    {
        // Ambil jumlah booking per bulan dalam tahun ini
        $bookingsPerMonth = Booking::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');

        // Siapkan array kosong isi 0 untuk 12 bulan
        $data = array_fill(1, 12, 0);

        // Isi dengan data dari query
        foreach ($bookingsPerMonth as $month => $count) {
            $data[$month] = $count;
        }

        // Buat label bulan
        $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        return [
            'datasets' => [
                [
                    'label' => 'Total Booking',
                    'data' => array_values($data), // urut dari Jan–Dec
                    'borderColor' => '#3B82F6', // opsional: warna biru
                    'backgroundColor' => 'rgba(59, 130, 246, 0.2)', // opsional: transparan
                    'tension' => 0.3, // buat grafik agak melengkung
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
