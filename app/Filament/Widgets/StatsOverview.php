<?php

namespace App\Filament\Widgets;

use App\Models\CustomRequest;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Products', Product::count())
                ->description(Product::where('is_active', true)->count() . ' active')
                ->descriptionIcon('heroicon-m-cube')
                ->color('primary'),

            Stat::make('Custom Requests', CustomRequest::count())
                ->description(CustomRequest::where('status', 'new')->count() . ' new')
                ->descriptionIcon('heroicon-m-pencil-square')
                ->color('warning'),

            Stat::make('Registered Users', User::count())
                ->description('Total accounts')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),

            Stat::make('Featured Products', Product::where('is_featured', true)->count())
                ->description('Shown on homepage')
                ->descriptionIcon('heroicon-m-star')
                ->color('info'),
        ];
    }
}
