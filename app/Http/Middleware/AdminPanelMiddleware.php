<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminPanelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        if(!$user){
            return redirect()->route('login');
//            throw new UnauthorizedHttpException("not logged in", "not logged in", null, 401); //TODO: remove comment
        }
        if ($user->role !== 'admin'){
            throw new AuthorizationException("insufficient permissions for user : {$user->name} : email : {$user->email} with role {$user->role}");
        }
        return $next($request);
    }
}
