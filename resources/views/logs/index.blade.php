@extends('layouts.master')

@section('css')
<style>
    .logs-panel { background: #2d2d2d; color: #e0e0e0; border-radius: 8px; padding: 1rem; }
    .logs-container { max-height: 65vh; overflow-y: auto; font-family: 'Monaco', 'Menlo', monospace; font-size: 12px; line-height: 1.5; }
    .log-line { padding: 4px 8px; border-bottom: 1px solid #3d3d3d; word-break: break-all; }
    .log-line:hover { background: #383838; }
    .log-error { color: #f44336; }
    .log-warning { color: #ff9800; }
    .log-info { color: #4caf50; }
</style>
@endsection

@section('content')
<div class="main-content">
    <div class="main-content-inner">
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Log Viewer
                    <small><i class="ace-icon fa fa-angle-double-right"></i> Application logs</small>
                </h1>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="clearfix" style="margin-bottom: 1rem;">
                {!! Form::open(['route' => 'logs.clear', 'method' => 'POST', 'style' => 'display:inline']) !!}
                    {!! Form::token() !!}
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Clear all logs? This cannot be undone.')">
                        <i class="fa fa-trash"></i> Clear Logs
                    </button>
                {!! Form::close() !!}
            </div>

            <div class="logs-panel">
                <div class="logs-container">
                    @forelse($logs as $line)
                        @php
                            $line = htmlspecialchars($line);
                            $class = '';
                            if (stripos($line, 'ERROR') !== false || stripos($line, 'exception') !== false) $class = 'log-error';
                            elseif (stripos($line, 'WARNING') !== false) $class = 'log-warning';
                            elseif (stripos($line, 'INFO') !== false) $class = 'log-info';
                        @endphp
                        <div class="log-line {{ $class }}">{{ $line ?: '&nbsp;' }}</div>
                    @empty
                        <div class="log-line">No logs found. Log file may be empty or not yet created.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
