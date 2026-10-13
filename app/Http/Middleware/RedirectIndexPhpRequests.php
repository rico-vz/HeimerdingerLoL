<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIndexPhpRequests
{
    public function handle(Request $request, Closure $next): Response
    {
        $uri = $request->getRequestUri();

        if ($uri === '/index.php' || str_starts_with($uri, '/index.php/') || str_starts_with($uri, '/index.php?')) {
            $path = '/'.ltrim(substr(strtok($uri, '?'), strlen('/index.php')), '/');
            $query = $request->getQueryString();

            return redirect()->away($request->getSchemeAndHttpHost().$path.($query === null ? '' : '?'.$query), 301);
        }

        return $next($request);
    }
}
