@extends('user-student.layouts.master')

@section('css')
    @include('print.includes.print-layout')
@endsection

@section('content')
    @if($data['student'] && $data['student']->count() > 0)

        @foreach($data['student'] as $student)
            <div class="main-content " >
                <div class="col-sm-12 align-right hidden-print">
                    <a href="#" class="btn btn-primary" onclick="window.print();">
                        <i class="ace-icon fa fa-print bigger-200"></i> Print
                    </a>
                </div>
                <div class="main-content-inner">
                    <div class="page-content">
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="space-6"></div>
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="widget-box transparent">
                                            @include('print.includes.institution-detail')
                                            <div class="row">
                                                <div class="col-md-2 col-print-2 align-left">

                                                </div>
                                                <div class="col-md-10 col-print-10 align-right">
                                                    <div class="text-center">
                                                        <h3 class="no-margin-top text-uppercase" style="font-family: 'Bowlby+One+SC'; font-size: 30px; font-weight: 600">
                                                            <strong>Department of Examination</strong>
                                                        </h3>
                                                        <div class="space-4"></div>
                                                        <h2 class="no-margin-top text-uppercase" style="font-family: 'Bowlby+One+SC'; font-size: 30px; font-weight: 600">
                                                            <strong>GRADE - SHEET</strong>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=row">
                                                <div class="space-6"></div>
                                                @include('print.includes.studentinfo')
                                                <div class="space-6"></div>
                                            </div>
                                            <div class=row">
                                                <table width="100%" class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th rowspan="2" class="text-center">SN</th>
                                                        <th colspan="2" class="text-center">SUBJECT / COURSE</th>
                                                        {{-- <th rowspan="2" class="text-center">CREDIT</th> --}}
                                                        <th colspan="4" class="text-center">OBTAINED GRADE</th>
                                                        {{-- <th rowspan="2"  class="text-center">TOTAL GRADE</th> --}}
                                                        {{--<th rowspan="2"  class="text-center">REMARK</th>--}}
                                                    </tr>
                                                    <tr>
                                                        <th>CODE</th>
                                                        <th>TITLE</th>
                                                        <th>THEORY</th>
                                                        <th>PRACTICAL</th>
                                                        <th>TOTAL GRADE</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if($student->subjects && $student->subjects->count() > 0)
                                                        @php($i=1)
                                                        @foreach($student->subjects as $subject)
                                                            <tr>
                                                                
                                                                <td>{{ $i }}</td>
                                                                <td>{{ViewHelper::getSubjectCodeById($subject->subjects_id)}}</td>
                                                                <td>{{ViewHelper::getSubjectById($subject->subjects_id)}}</td>
                                                                <td class="text-center">{{$subject->obtain_score_theory ?? 0}}</td>
                                                                <td class="text-center">{{$subject->obtain_score_practical?$subject->obtain_score_practical:'-'}}</td>

                                                                {{-- <td class="text-center">{{ViewHelper::getSubCreditById($subject->subjects_id)}}</td> --}}
                                                                {{-- <td class="text-center">{{$subject->final_grade?$subject->final_grade:'-'}}</td> --}}
                                                                {{-- <td>{{$subject->remark?$subject->remark:'-'}}</td> --}}
                                                                <td class="text-center">{{$subject->grade_point?$subject->grade_point:'-'}}</td>

                                                            </tr>
                                                            @php($i++)
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                    <tfoot>

                                                      
                                                        <td colspan="3" class="text-right">AVERAGE MARK : {{isset($student->average_point)?$student->average_point:''}}</td>
                                                        <td colspan="5" class="text-right">TOTAL MARK : {{$student->gpa_point}}</td>
      
                                                      

                                                   

                                                    </tfoot>
                                                </table>
                                            </div>


                                            <div class="smaller-100">
                                                @if ($student->average_point < 50)
                                                <strong>PRINCIPAL'S COMMENT: | Poor Academic Perfomance. More Room for Improvment.
                                                @elseif ($student->average_point < 70)
                                                <strong>PRINCIPAL'S COMMENT: | Good Academic Perfomance. More Room for Improvment.
                                                @else
                                                <strong>PRINCIPAL'S COMMENT: | Excellent Academic Perfomance. Keep It Up.
                                                @endif
                                            </div>
                                            <div class="space-32"></div>
                                            <div class="space-32"></div>
                                            <div class="row text-uppercase">
                                                <table width="100%">
                                                    <tr>
                                                        <td class="text-left">
                                                            <strong style="border-top:1px black solid;">HEAD INSTRUCTOR  {{ \Carbon\Carbon::parse(now())->format('Y-m-d')}} </strong>
                                                            {{--<br>
                                                            <strong>Date of Issue : {{ \Carbon\Carbon::parse(now())->format('Y-m-d')}}</strong>--}}
                                                        </td>
                                                        <img id="avatar" class="nav-user-photo" alt="" src="{{ asset('assets/images/avatars/stamp.png') }}" width="100px" />


                                                        <td class="text-center"><strong style="border-top:1px black solid;"></strong></td>
                                                        <td class="text-center"><strong style="border-top:1px black solid;"></strong></td>
                                                        <td  class="text-right"><strong style="border-top:1px rgb(255, 255, 255) solid;">Date of Result Publication : {{ \Carbon\Carbon::parse(now())->format('Y-m-d')}}</strong></td>

                                                       
                                                    </tr>
                                                </table>
                                            </div>

                                        </div>
                                        <!-- PAGE CONTENT ENDS -->
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </div><!-- /.page-content -->
                        </div>
                    </div>
                </div>
            </div><!-- /.main-content -->
            <div style="page-break-after:always;"></div>
        @endforeach
    @endif
@endsection

@section('js')
    <!-- inline scripts related to this page -->
    @include('includes.scripts.print_script')
@endsection