<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateWithToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
         $recievedCookie = $request->header('token');
         $storedCookieValue = Cookie::get('token');
         if ($recievedCookie === $storedCookieValue){
            
         }
         return $next($request);
    }

}
