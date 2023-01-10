<h4 class="header large lighter blue"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;{{ $panel }} List</h4>
<div class="clearfix">
    <span class="pull-right tableTools-container"></span>
</div>
<div class="table-header">
    {{ $panel }}  Record list on table. Filter {{ $panel }} using the filter.
</div>
<!-- div.table-responsive -->
<div class="table-responsive">
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Sort</th>
                    <th>REG NO</th>
                    <th>STUDENT NAME</th>
                    <th>1ST CA <br>(15 MKS)</th>
                    <th>2ND CA <br>(15 MKS)</th>
                    <th>ASSIGNMENT<br>(4 MKS)</th>
                    <th>CLASS EXERCISE<br> (6 MKS)</th>
                    <th>AFFECTIVE <br>(10 MKS)</th>
                    <th>PSYCHOMOTOR <br>(10 MKS)</th>
                    <th>EXAM <br>(40 MKS)</th>
                    {{-- <th>Obtain Mark (Theory)</th>
                    <th>Obtain Mark (Practical)</th>
                    <th>Absent</th> --}}
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if (isset($data['ledger_exist']) && $data['ledger_exist']->count() > 0)
                    @php($i=1)
                    @foreach($data['ledger_exist'] as $student)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $student->reg_no }}</td>
                            <td>{{ $student->first_name.' '.$student->middle_name.' '.$student->last_name }}</td>
                            <td>{{ $student->ca_test1 }}</td>
                            <td>{{ $student->ca_test2 }}</td>
                            <td>{{ $student->assign }}</td>
                            <td>{{ $student->class_exe }}</td>
                            <td>{{ $student->affective }}</td>
                            <td>{{ $student->physc }}</td>


                            <td>
                                @if($student->absent_theory=='0')
                                    {{ $student->obtain_mark_theory }}
                                @else
                                    <span class="label label-danger">
                                        A
                                    </span>
                                @endif
                            </td>

                            <td>{{ $student->total }}</td>

                            {{-- <td>
                                @if($student->absent_practical=='0')
                                    {{ $student->obtain_mark_practical }}
                                @else
                                    <span class="label label-danger">
                                        A
                                    </span>
                                @endif
                            </td> --}}
                            {{-- <td>
                                @if($student->absent_theory=='0')
                                    <span class="label label-primary">
                                        TH-Present
                                    </span>
                                @else
                                    <span class="label label-danger">
                                        TH-Absent
                                    </span>
                                @endif

                                @if($student->absent_practical=='0')
                                    <span class="label label-primary">
                                        PR-Present
                                    </span>
                                @else
                                    <span class="label label-danger">
                                        PR-Absent
                                    </span>
                                @endif
                            </td> --}}
                            <td>
                                <div class="hidden-sm hidden-xs action-buttons">
                                   <a href="{{ route($base_route.'.delete', ['exam_id' => $student->exam_schedule_id,
                                        'student_id' => $student->student_id]) }}" class="red bootbox-confirm">
                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                    </a>
                                </div>
                                <div class="hidden-md hidden-lg">
                                    <div class="inline pos-rel">
                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                            <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                            <li>
                                                <a href="{{ route($base_route.'.delete', ['exam_id' => $student->exam_schedule_id,
                                        'student_id' => $student->student_id]) }}" class="tooltip-error bootbox-confirm" data-rel="tooltip" title="Delete">
                                                    <span class="red ">
                                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @php($i++)
                    @endforeach
                @else
                    <tr>
                        <td colspan="8">No {{ $panel }} data found. Please Filter {{ $panel }} to show. </td>
                    </tr>
                @endif
            </tbody>
        </table>
</div>
</div>
