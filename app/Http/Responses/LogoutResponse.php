<?php

namespace App\Http\Responses;

use Filament\Http\Responses\Auth\Contracts\LogoutResponse as LogoutResponseContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LogoutResponse implements LogoutResponseContract
{
    /**
     * After logout from Filament panel, redirect to home (not Filament login).
     */
    public function toResponse(Request $request): RedirectResponse
    {
        return redirect('/');
    }
}
