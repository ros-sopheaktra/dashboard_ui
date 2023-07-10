<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // get url after the name of website
        $prefix = trim($request->route()->getPrefix(), '/');
        if (! $request->expectsJson()) {
            if ($prefix == 'dashboard') {
                return route('login');
            } else {
                return route('customers-login');
            }
        }
    }
}
