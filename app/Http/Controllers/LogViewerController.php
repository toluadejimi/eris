<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class LogViewerController extends Controller
{
    public function index()
    {
        $logPath = storage_path('logs/laravel.log');

        if (!File::exists($logPath)) {
            $logs = [];
        } else {
            $logsContent = File::get($logPath);
            $logs = array_reverse(explode("\n", $logsContent)); // latest lines first
            $logs = array_slice($logs, 0, 500); // limit to last 500 lines
        }

        return view('logs.index', compact('logs'));
    }

    public function clear(Request $request)
    {
        $logPath = storage_path('logs/laravel.log');

        if (File::exists($logPath)) {
            File::put($logPath, ''); // clear the log
        }

        return redirect()->route('logs.index')->with('success', 'Logs cleared successfully!');
    }
}
