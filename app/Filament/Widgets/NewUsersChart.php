<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\LineChartWidget;

class NewUsersChart extends LineChartWidget
{
    protected static ?string $heading = 'Monthly New User';

    //protected static ?string $pollingInterval = '400ms';

    protected static ?int $sort = 1;

    protected int|string|array $columnSpan = 1;

    protected function getData(): array
    {
        $users = User::whereYear('created_at', now()->year)->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('m');
            });
        $usermcount = [];
        $userArr = [];

        foreach ($users as $key => $value) {
            $usermcount[(int)$key] = count($value);
        }

        for ($i = 1; $i <= 12; $i++) {
            $month_name = date("F", mktime(0, 0, 0, $i, 10));
            if (!empty($usermcount[$i])) {
                $userArr[$month_name] = $usermcount[$i];
            } else {
                $userArr[$month_name] = 0;
            }
        }
        return [
            'datasets' => [
                [
                    'label' => 'User Registered',
                    'data' => $userArr,
                    'backgroundColor' => 'blue'
                ],
            ],
        ];
    }
}
