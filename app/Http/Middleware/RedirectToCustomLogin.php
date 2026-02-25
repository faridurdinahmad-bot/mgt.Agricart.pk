<?php

namespace App\Http\Middleware;

use Filament\Http\Middleware\Authenticate as FilamentAuthenticate;

class RedirectToCustomLogin extends FilamentAuthenticate
{
    /**
     * Redirect unauthenticated users to our custom login page (/login).
     * Filament's login page is disabled; we use our own UI.
     */
    protected function redirectTo($request): ?string
    {
        return route('login');
    }
}
