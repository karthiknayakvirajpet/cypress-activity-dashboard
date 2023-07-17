<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //\Log::debug($request->user()->is_super_admin);

        if($request->user()->is_super_admin == 1)
        {
            return $next($request);
        }

        //Sanctum Unauthorized rendering for APIs
        if ($request->is('api/*')) {
            return response()->json([
                'status' => 401, 
                'message' => 'Unauthorized - Note: Please use "user-login" API with Super Admin credentials and set the "Authorization" header with the value "Bearer {access_token}" received during the login process.',
            ])->setStatusCode(401);
        }
        
        //Unauthorized rendering for web pages
        abort(403, 'Unauthorized.');
    }
}
