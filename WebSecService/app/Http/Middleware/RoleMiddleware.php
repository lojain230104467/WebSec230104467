<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $roles  // Accepts single or multiple roles separated by "|"
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        // Ensure user is authenticated
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'You must be logged in to access this page.');
        }

        // Retrieve the authenticated user's role
        $userRole = Auth::user()->role->name ?? null;

        // Convert role string to an array (for multiple roles)
        $allowedRoles = explode('|', $roles);

        // Check if the user's role is in the allowed roles list
        if (!in_array($userRole, $allowedRoles)) {
            return abort(403, 'Unauthorized access.'); // Returns a 403 Forbidden response
        }

        return $next($request);
    }
}
