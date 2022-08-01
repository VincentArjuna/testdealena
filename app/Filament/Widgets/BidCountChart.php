<?php

namespace App\Filament\Widgets;

use App\Models\Product\ProductBidder;
use Carbon\Carbon;
use Filament\Widgets\BarChartWidget;

class BidCountChart extends BarChartWidget
{
    protected static ?string $heading = 'Monthy Bid Count';

    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 1;

    protected function getData(): array
    {
        $bids = ProductBidder::whereYear('created_at', now()->year)->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('m');
            });
        $bidCount = [];
        $bidArr = [];

        foreach ($bids as $key => $value) {
            $bidCount[(int)$key] = count($value);
        }

        for ($i = 1; $i <= 12; $i++) {
            $month_name = date("F", mktime(0, 0, 0, $i, 10));
            if (!empty($bidCount[$i])) {
                $bidArr[$month_name] = $bidCount[$i];
            } else {
                $bidArr[$month_name] = 0;
            }
        }
        return [
            'datasets' => [
                [
                    'label' => 'Bid Count',
                    'data' => $bidArr,
                    'backgroundColor' => ["red", "blue", "green", "blue", "red", "blue"],
                ],
            ],
        ];
    }
}
