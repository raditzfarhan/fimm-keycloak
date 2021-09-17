<?php

namespace RaditzFarhan\FimmKeycloak\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeycloakRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $roles = is_array($role)
            ? $role
            : explode('|', $role);


        foreach ($roles as $item) {

            $userRole = explode('@', $item);

            if (!isset($userRole[0])) {
                abort(403, __('Unauthorized Access'));
            }

            $client = isset($userRole[1]) ? $userRole[1] : config('fimmkeycloak.client_id');

            if (Auth::hasRole($client, $userRole[0])) {
                return $next($request);
            }
        }

        abort(403, __('Unauthorized Access'));
    }
}
