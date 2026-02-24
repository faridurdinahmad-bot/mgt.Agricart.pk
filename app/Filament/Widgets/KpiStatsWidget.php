<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class KpiStatsWidget extends BaseWidget
{
    protected static ?int $sort = 0;

    protected int | string | array $columnSpan = 'full';

    protected ?string $heading = null;

    public function getStats(): array
    {
        return [
            Stat::make(__('Pending Approvals'), $this->getPendingApprovalsCount())
                ->description(__('Require action'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('warning'),
            Stat::make(__('Total Inventory Value'), $this->getInventoryValue())
                ->description(__('Current stock value')),
            Stat::make(__("Today's Orders"), $this->getTodaysOrdersCount())
                ->description(__('Orders today')),
            Stat::make(__('Receivables'), $this->getReceivables())
                ->description(__('Outstanding')),
            Stat::make(__('Low Stock Alerts'), $this->getLowStockCount())
                ->description(__('Below threshold'))
                ->color('danger'),
            Stat::make(__('System Traffic Today'), $this->getSystemTrafficCount())
                ->description(__('Sessions')),
            Stat::make(__('Registered Vendors'), $this->getRegisteredVendorsCount())
                ->description(__('Active suppliers')),
            Stat::make(__('Critical Alerts'), $this->getCriticalAlertsCount())
                ->description(__('Needs attention'))
                ->color('danger'),
        ];
    }

    protected function getPendingApprovalsCount(): int
    {
        return User::query()->where('is_approved', false)->count();
    }

    protected function getInventoryValue(): string
    {
        return 'PKR 48.2M'; // TODO: aggregate from inventory/items
    }

    protected function getTodaysOrdersCount(): int
    {
        return 182; // TODO: count from orders where created_at today
    }

    protected function getReceivables(): string
    {
        return 'PKR 7.4M'; // TODO: from finance/invoices
    }

    protected function getLowStockCount(): int
    {
        return 7; // TODO: count items below threshold
    }

    protected function getSystemTrafficCount(): int
    {
        return 1842; // TODO: sessions or activity log count for today
    }

    protected function getRegisteredVendorsCount(): int
    {
        return 48; // TODO: vendors/suppliers count
    }

    protected function getCriticalAlertsCount(): int
    {
        return 12; // TODO: approvals + other critical
    }
}
