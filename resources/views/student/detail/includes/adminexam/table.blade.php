
<div class="table-responsive">
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Year</th>
                <th>Month</th>
                <th>Term/Class</th>
                <th>Exam</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if (isset($data['schedule_exams']) && $data['schedule_exams']->count() > 0)
                @php($i = 1)
                @foreach ($data['schedule_exams'] as $exam)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ ViewHelper::getYearById($exam->years_id) }}</td>
                        <td>{{ ViewHelper::getMonthById($exam->months_id) }}</td>
                        <td>{{ ViewHelper::getSemesterById($exam->semesters_id) }}</td>
                        <td>{{ ViewHelper::getExamById($exam->exams_id) }}</td>

                        <td>
                            <div class="clearfix hidden-print ">
                                <div class="easy-link-menu">
                                    {{-- <a href="{{ route('user-student.exam-schedule', ['year' => $exam->years_id,
                                        'month' => $exam->months_id, 'exam' => $exam->exams_id,'faculty' => $exam->faculty_id,
                                         'semester' => $exam->semesters_id]) }}" title="AdmitCard" class="btn-primary btn-sm">
                                            <i class="fa fa-list-alt" aria-hidden="true"></i> Schedule
                                        </a> --}}
                                    {{-- &nbsp;&nbsp;&nbsp;
                                        <a href="{{ route('user-student.exam-admit-card', ['year' => $exam->years_id,
                                        'month' => $exam->months_id, 'exam' => $exam->exams_id,'faculty' => $exam->faculty_id,
                                         'semester' => $exam->semesters_id]) }}" title="AdmitCard" class="btn-primary btn-sm">
                                            <i class="fa fa-user" aria-hidden="true"></i> Admit Card
                                        </a> --}}
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="/eris/public/admin-score/{{$exam->years_id}}/{{$exam->months_id}}/{{$exam->exams_id}}/{{$exam->faculty_id}}/{{$exam->semesters_id}}/{{$exam->user_id}}"
                                        title="AdmitCard" class="btn-primary btn-sm">
                                        <i class="fa fa-line-chart" aria-hidden="true"></i> Click here to view result
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @php($i++)
                @endforeach
            @else
                <tr>
                    <td colspan="8">No {{ $panel }} data found. Please Filter {{ $panel }} to show.
                    </td>
                </tr>
            @endif
        </tbody>
    </table>

</div>
