<?php

namespace App\Filament\Widgets;

use App\Models\Product\ProductBidder;
use App\Models\Store\Store;
use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 0;

    protected function getCards(): array
    {
        return [
            Card::make('User', User::query()->count())
                ->description('Total User')
                ->descriptionIcon('heroicon-s-user'),
            Card::make(
                'Active Store',
                Store::query()
                    ->where('is_active', 1)->count()
            )
                ->description('Total Active Store')
                ->descriptionIcon('heroicon-s-shopping-cart'),
            Card::make(
                'Monthly Bidder',
                ProductBidder::query()
                    ->whereYear('created_at', now()->year)
                    ->whereMonth('created_at', now()->month)
                    ->get()->groupBy('member_id')->count()
            )
                ->description('Total Active Bidder')
                ->descriptionIcon('heroicon-s-users'),
        ];
    }
}
