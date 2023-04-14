@extends('user-student.layouts.master')

@section('css')


@endsection

@section('content')

    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                @include('layouts.includes.template_setting')

                <div class="page-header">
                    <h1>
                        Exams
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                             Detail
                        </small>

                    </h1>

                    <hr class="hr-9">

                    <div class="clearfix hidden-print ">
                        <div class="easy-link-menu align-left">
                            <a class="{!! request()->is('user-student/exams')?'btn-success':'btn-primary' !!} btn-sm" href="exams"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;All Result</a>
                            <a class="{!! request()->is('user-student/current-result')?'btn-success':'btn-primary' !!} btn-sm" href="current-result"><i class="fa fa-list" aria-hidden="true"></i>&nbsp; Current Result</a>
                        </div>
                    </div>


                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        @include('includes.flash_messages')
                        @include($view_path.'.exam.includes.table')
                    </div>
                </div><!-- /.row -->

            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->



@endsection

@section('js')
    <!-- page specific plugin scripts -->
    @include('includes.scripts.dataTable_scripts')
@endsection