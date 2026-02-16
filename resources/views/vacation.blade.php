@extends('layouts.master')

@section('content')
<div class="main-content">
    <div class="main-content-inner">
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Vacation / Resumption
                    <small><i class="ace-icon fa fa-angle-double-right"></i> Set term break dates for report cards</small>
                </h1>
            </div>

            @include('includes.flash_messages')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Add Vacation Form --}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="ace-icon fa fa-calendar-plus-o bigger-110"></i>
                        Add vacation &amp; resumption dates
                    </h4>
                </div>
                <div class="panel-body">
                    <form action="{{ url('set-vacation') }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Academic Year</label>
                            <div class="col-sm-3">
                                <select name="year" class="form-control" required>
                                    <option value="">Select Year</option>
                                    @foreach($years as $y)
                                        <option value="{{ $y->title }}">{{ $y->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Month / Term</label>
                            <div class="col-sm-3">
                                <select name="month" class="form-control" required>
                                    <option value="">Select Month</option>
                                    @foreach($months as $m)
                                        <option value="{{ $m->title }}">{{ $m->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Vacation Day</label>
                            <div class="col-sm-3">
                                <input name="vacation_day" type="text" class="form-control" placeholder="e.g. 15th July 2025" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Resumption Day</label>
                            <div class="col-sm-3">
                                <input name="resumption_day" type="text" class="form-control" placeholder="e.g. 8th September 2025" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-3">
                                <button type="submit" class="btn btn-success">
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Existing Vacations Table --}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">
                        <i class="ace-icon fa fa-list bigger-110"></i>
                        Scheduled vacations
                    </span>
                    @if(!$vacations->isEmpty())
                    <span class="pull-right">
                        <input type="text" id="vacation-search" class="input-sm" placeholder="Search..." style="width: 180px; padding: 5px 10px;">
                    </span>
                    @endif
                </div>
                <div class="panel-body">
                    @if($vacations->isEmpty())
                        <p class="text-muted">No vacation dates set yet. Add one above.</p>
                    @else
                        <table class="table table-striped table-bordered table-hover" id="vacation-table">
                            <thead>
                                <tr>
                                    <th>Academic Year</th>
                                    <th>Month / Term</th>
                                    <th>Vacation Day</th>
                                    <th>Resumption Day</th>
                                    <th width="100" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vacations as $vac)
                                    <tr>
                                        <td>{{ $vac->session }}</td>
                                        <td>{{ $vac->month }}</td>
                                        <td>{{ $vac->vacation_day }}</td>
                                        <td>{{ $vac->resumption_day }}</td>
                                        <td class="text-center">
                                            <form method="POST" action="{{ url('delete-vacation') }}?id={{ $vac->id }}" style="display:inline;" onsubmit="return confirm('Delete this vacation record?');">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete">
                                                    <i class="ace-icon fa fa-trash-o"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
$(document).ready(function() {
    $("#vacation-search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        var $rows = $("#vacation-table tbody tr");
        if ($rows.length) {
            $rows.filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        }
    });
});
</script>
@endsection
