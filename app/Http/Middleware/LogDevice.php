<?php

namespace App\Http\Middleware;

use App\Models\Device;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LogDevice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()) {
            Device::firstOrCreate(
                [
              'user_id' => Auth::id(),
              'device_ip' => $request->ip()
                ],
                [
                    'divice_name' => $request->header('User-Agent'),
                     'device_type' => 'web'
                ]
                );
        }
        return $next($request);
    }
}
