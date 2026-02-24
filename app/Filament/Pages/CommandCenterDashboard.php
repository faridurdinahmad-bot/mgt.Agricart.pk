<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class CommandCenterDashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-command-line';

    protected static ?string $title = 'Command Center';

    protected static ?string $navigationLabel = 'Command Center';

    public static function getNavigationLabel(): string
    {
        return static::$navigationLabel ?? 'Command Center';
    }

    public function getTitle(): string | \Illuminate\Contracts\Support\Htmlable
    {
        return static::$title ?? 'Command Center';
    }
}
