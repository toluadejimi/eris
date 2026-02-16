@extends('layouts.master')

@section('css')
    <!-- page specific plugin styles -->
@endsection

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                @include('layouts.includes.template_setting')

                <div class="page-header">
                    <h1>
                        @include($view_path.'.includes.breadcrumb-primary')
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            Bulk Upload
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    @include('examination.includes.buttons')
                    @include($view_path.'.includes.buttons')
                    @include('includes.flash_messages')
                    @include('includes.validation_error_messages')
                    <div class="col-xs-12">
                        <div class="widget-box">
                            <div class="widget-header widget-header-flat">
                                <h4 class="widget-title lighter">
                                    <i class="ace-icon fa fa-upload blue"></i>
                                    Bulk Upload Exam Results (CSV)
                                </h4>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    {!! Form::open(['route' => $base_route.'.bulk.import', 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">CSV Template</label>
                                        <div class="col-sm-10">
                                            <a href="{{ asset('assets/csv-template/result-import.csv') }}" download="result-import-template.csv" class="btn btn-sm btn-info">
                                                <i class="fa fa-download"></i> Download CSV Template
                                            </a>
                                            <p class="help-block text-muted">Template contains: reg_no, ca_test1, ca_test2, assign, class_exe, affective, physc, obtain_mark_theory, total, obtain_mark_practical, absent_theory, absent_practical</p>
                                        </div>
                                    </div>

                                    <hr class="hr-8">

                                    <div class="form-group">
                                        {!! Form::label('years_id', 'Year', ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-2">
                                            {!! Form::select('years_id', $data['years'], null, ['class' => 'form-control border-form', 'required']) !!}
                                        </div>
                                        {!! Form::label('months_id', 'Month', ['class' => 'col-sm-1 control-label']) !!}
                                        <div class="col-sm-2">
                                            {!! Form::select('months_id', $data['months'], null, ['class' => 'form-control border-form', 'required']) !!}
                                        </div>
                                        {!! Form::label('exams_id', 'Exam', ['class' => 'col-sm-1 control-label']) !!}
                                        <div class="col-sm-4">
                                            {!! Form::select('exams_id', $data['exams'], null, ['class' => 'form-control border-form', 'required']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Class</label>
                                        <div class="col-sm-3">
                                            {!! Form::select('faculty', $data['faculties'], null, ['class' => 'form-control', 'id' => 'import_faculty', 'onChange' => 'loadImportSemesters(this)']) !!}
                                        </div>
                                        <label class="col-sm-1 control-label">Term/Sec</label>
                                        <div class="col-sm-2">
                                            <select name="semester_select" id="import_semester" class="form-control" onChange="loadImportSubject(this)" required>
                                                <option value="">Select Term/Sec</option>
                                            </select>
                                        </div>
                                        <label class="col-sm-1 control-label">Subject</label>
                                        <div class="col-sm-3">
                                            <select name="schedule_subject" id="import_subject" class="form-control" required>
                                                <option value="">Select Subject</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('file', 'CSV File', ['class' => 'col-sm-2 control-label']) !!}
                                        <div class="col-sm-6">
                                            {!! Form::file('file', ['class' => 'form-control', 'accept' => '.csv,.txt', 'required']) !!}
                                            <p class="help-block">Upload a CSV file with student Reg.No. and marks. Max 2MB.</p>
                                        </div>
                                    </div>

                                    <div class="clearfix form-actions">
                                        <div class="col-md-12 align-right">
                                            <a href="{{ route($base_route) }}" class="btn btn-default">
                                                <i class="fa fa-arrow-left"></i> Cancel
                                            </a>
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fa fa-upload"></i> Import Results
                                            </button>
                                        </div>
                                    </div>

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->
@endsection

@section('js')
<script>
function loadImportSemesters(el) {
    var year = $('select[name="years_id"]').val();
    var month = $('select[name="months_id"]').val();
    var exam = $('select[name="exams_id"]').val();
    var faculty = el.value;
    if (!year || !month || !exam || !faculty) return;
    $.ajax({
        type: 'POST',
        url: '{{ route("student.find-semester") }}',
        data: { _token: '{{ csrf_token() }}', faculty_id: faculty },
        success: function(r) {
            var data = $.parseJSON(r);
            $('#import_semester').html('<option value="">Select Term/Sec</option>');
            $('#import_subject').html('<option value="">Select Subject</option>');
            if (!data.error && data.semester) {
                $.each(data.semester, function(k, v) {
                    $('#import_semester').append('<option value="'+v.id+'">'+v.semester+'</option>');
                });
            }
        }
    });
}

function loadImportSubject(el) {
    var year = $('select[name="years_id"]').val();
    var month = $('select[name="months_id"]').val();
    var exam = $('select[name="exams_id"]').val();
    var faculty = $('#import_faculty').val();
    var semester = el.value;
    if (!year || !month || !exam || !faculty || !semester) return;
    $.ajax({
        type: 'POST',
        url: '{{ route("exam.mark-ledger.find-subject") }}',
        data: { _token: '{{ csrf_token() }}', years_id: year, months_id: month, exams_id: exam, faculty_id: faculty, semester_id: semester },
        success: function(r) {
            var data = $.parseJSON(r);
            $('#import_subject').html('<option value="">Select Subject</option>');
            if (!data.error && data.subjects) {
                $.each(data.subjects, function(k, v) {
                    $('#import_subject').append('<option value="'+v.id+'">'+v.title+'</option>');
                });
            }
        }
    });
}
</script>
@endsection
