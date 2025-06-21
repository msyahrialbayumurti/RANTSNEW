<?php

namespace App\Filament\Resources\StatusResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\PesananKostum;
use App\Models\PesananMakeUp;
use App\Models\PesananPenyewaanJasaTari;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('Jumlah semua pengguna')
                ->color('success'),

            Stat::make('Pesanan Kostum', PesananKostum::count())
                ->description('Jumlah pesanan kostum')
                ->color('info'),

            Stat::make('Pesanan MakeUp', PesananMakeUp::count())
                ->description('Jumlah pesanan makeup')
                ->color('warning'),

            Stat::make('Pesanan Tari', PesananPenyewaanJasaTari::count())
                ->description('Jumlah pesanan tari')
                ->color('danger'),
        ];
    }
}
