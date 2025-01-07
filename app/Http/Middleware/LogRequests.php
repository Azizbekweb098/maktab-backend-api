<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Request as RequestLog;

class LogRequests
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // So'rov ma'lumotlarini saqlash
        RequestLog::create([
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'payload' => json_encode($request->all()), // So'rovda yuborilgan ma'lumotlar
        ]);
        

        return $response;
    }
}
