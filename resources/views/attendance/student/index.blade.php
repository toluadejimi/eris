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
                            Detail
                        </small>
                    </h1>
                </div><!-- /.page-header -->


            {{-- <form action="get-weekper" method="POST">
                @csrf

                <div class="col">
                    <div class="col-sm-2">
                        <label>Choose From Date</label>
                        <input type="text"  name="from_date" class="input-sm form-control border-form input-mask-date date-picker" placeholder="YYYY-MM-DD" required>
                    </div>

                    <div class="col-sm-2">
                        <label>Choose To Date</label>
                        <input type="text"  name="to_date" class="input-sm form-control border-form input-mask-date date-picker" placeholder="YYYY-MM-DD" required>
                    </div>


                    <div class="col-sm-2 mt-3">
                    <button class="btn btn-success" type="submit" id="">
                        Get Weekly Percentage
                    </button>
                </div> --}}




                </div>


            
            </form>




                <div class="row">
                    @include('attendance.includes.buttons')
                    <div class="col-xs-12 ">
                        @include($view_path.'.includes.buttons')
                        @include('includes.flash_messages')
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="form-horizontal">
                            @include($view_path.'.includes.search_form')
                            <div class="hr hr-18 dotted hr-double"></div>
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                @include($view_path.'.includes.table')
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->
@endsection


@section('js')

    <script>
        function loadSemesters($this) {
            var faculty = $('select[name="faculty"]').val();
            if (faculty == 0) {
                toastr.info("Please, Select Class", "Info:");
                return false;
            }

            $.ajax({
                type: 'POST',
                url: '{{ route('student.find-semester') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    faculty_id: $this.value
                },
                success: function (response) {
                    var data = $.parseJSON(response);
                    if (data.error) {
                        toastr.warning(data.error, "Warning");
                    } else {
                        $('.semester_select').html('').append('<option value="0">Select Term/Sec</option>');
                        $.each(data.semester, function(key,valueObj){
                            $('.semester_select').append('<option value="'+valueObj.id+'">'+valueObj.semester+'</option>');
                        });
                        // toastr.success(data.success, "Success:");
                    }
                }
            });

        }

        $(document).ready(function () {

            $('#filter-btn').click(function () {
                        @include('student.includes.common-script.student_filter_common_script')

                var year = $('select[name="year"]').val();
                var month = $('select[name="month"]').val();

                if (year !== '' &  year > 0) {

                    if (flag) {
                        url += '&year=' + year;
                    } else {
                        url += '?year=' + year;
                        flag = true;
                    }
                }

                if (month !== '' &  month > 0) {

                    if (flag) {
                        url += '&month=' + month;
                    } else {
                        url += '?month=' + month;
                        flag = true;
                    }
                }

                location.href = url;
            });
        });

    </script>
    @include('includes.scripts.inputMask_script')
    @include('includes.scripts.delete_confirm')
    @include('includes.scripts.bulkaction_confirm')
    @include('includes.scripts.dataTable_scripts')
    @include('includes.scripts.datepicker_script')

@endsection