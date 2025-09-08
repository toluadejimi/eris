<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel Logs</title>
    <style>
        body { font-family: monospace; background: #1e1e1e; color: #f5f5f5; padding: 20px; }
        .logs-container { max-height: 70vh; overflow-y: scroll; background: #2e2e2e; padding: 10px; border-radius: 8px; }
        .log-line { padding: 2px 0; border-bottom: 1px solid #444; }
        .buttons { margin-bottom: 15px; }
        button { background: #e74c3c; color: white; border: none; padding: 8px 16px; cursor: pointer; border-radius: 4px; }
        button:hover { background: #c0392b; }
        .success { color: #2ecc71; margin-bottom: 10px; }
    </style>
</head>
<body>
<h1>Laravel Logs</h1>

<div class="buttons">
    <form method="POST" action="{{ route('logs.clear') }}" onsubmit="return confirm('Are you sure you want to clear the logs?')">
        @csrf
        <button type="submit">Clear Logs</button>
    </form>
</div>

@if(session('success'))
    <div class="success">{{ session('success') }}</div>
@endif

<div class="logs-container">
    @forelse($logs as $line)
        <div class="log-line">{{ $line }}</div>
    @empty
        <div>No logs found.</div>
    @endforelse
</div>
</body>
</html>
