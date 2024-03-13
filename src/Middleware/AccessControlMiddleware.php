<?php

namespace Negarst\TaskManager\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class AccessControlMiddleware
{
    public function handle(Request $request, Closure $next, $permission)
    {
        $role = $request->user_role;

        $permissions = Config::get("task-manager.roles.{$role}", []);

        // If the key permission does not exist, also forbidden is the response.
        if (!$permissions[$permission]) {
            return response()->json(['message' => 
            'User with role ' . $role . 'cannot ' . str_replace('_', ' ', $permission) . '.'], 403);
        }

        return $next($request);
    }
}
