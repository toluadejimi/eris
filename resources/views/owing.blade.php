{{--<h4 class="header large lighter blue"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;{{ $panel }} List</h4>--}}









@extends('user-student.layouts.master')

@section('css')


@endsection

@section('content')

    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">

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
                            
                        </div>
                    </div>


                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <main role="main" class="container">
                            <div class="jumbotron">
                                <a class="btn btn-lg btn-danger"  role="button">Result Error</a><br><br>
                              <p>You cannot view scholar's result at the moment, <br>Please pay your oustanding fee to have access to result.</p>
                        
                              <a class="btn btn-lg btn-primary" href="/public/user-student/fees#bank" role="button">Click here to pay &raquo;</a>
                            </div>
                          </main>
                    </div>
                </div><!-- /.row -->

            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->



@endsection

@section('js')
    <!-- page specific plugin scripts -->
@endsection


