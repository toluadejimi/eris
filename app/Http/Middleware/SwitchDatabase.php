<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class SwitchDatabase
{
    public function handle($request, Closure $next)
    {
        if (session()->has('db_connection')) {
            $connection = session('db_connection');

            // Dynamically change default DB connection
            Config::set('database.default', $connection);

            // Reconnect with new connection
            DB::purge($connection);
            DB::reconnect($connection);

            logger("✅ Switched to DB connection: " . $connection);
        }

        return $next($request);
    }
}
