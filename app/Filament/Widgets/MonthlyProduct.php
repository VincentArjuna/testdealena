<?php

namespace App\Filament\Widgets;

use App\Models\Product\Product;
use Carbon\Carbon;
use Filament\Widgets\LineChartWidget;

class MonthlyProduct extends LineChartWidget
{
    protected static ?string $heading = 'Product Auctioned By Month';

    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 1;

    protected function getData(): array
    {

        $products = Product::whereYear('bid_start', now()->year)->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('m');
            });
        $productMCount = [];
        $productArr = [];

        foreach ($products as $key => $value) {
            $productMCount[(int)$key] = count($value);
        }

        for ($i = 1; $i <= 12; $i++) {
            $month_name = date("F", mktime(0, 0, 0, $i, 10));
            if (!empty($productMCount[$i])) {
                $productArr[$month_name] = $productMCount[$i];
            } else {
                $productArr[$month_name] = 0;
            }
        }

        return [
            'datasets' => [
                [
                    'label' => 'User Registered',
                    'data' => $productArr,
                    'backgroundColor' => 'blue'
                ],
            ],
        ];
    }
}
