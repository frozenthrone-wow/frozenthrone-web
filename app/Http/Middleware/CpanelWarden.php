<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CpanelWarden
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    private readonly array $allowRoutes;

    function __construct() {
        $this->allowRoutes = [
            "cpanelAuthenticate",
        ];
    }

    public function handle(Request $request, Closure $next): Response
    {

        if($this->validateSession() || in_array(Route::currentRouteName(), $this->allowRoutes))
        {
            return $next($request);
        } else
        {
            return redirect(route('home'));
        }
    }


    private function validateSession() : bool
    {
        $cPanelAccess = Session::get('cpanel');

        if($cPanelAccess == null || $cPanelAccess['level'] < 0) {
            return false;
        }

        return true;
    }
}
