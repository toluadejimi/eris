<style>
    .toggle-wrapper { display: flex; align-items: center; gap: 12px; font-family: Arial, sans-serif; }
    .toggle-label { font-size: 14px; color: #555; }
    .switch { position: relative; display: inline-block; width: 52px; height: 26px; }
    .switch input { opacity: 0; width: 0; height: 0; }
    .slider { position: absolute; cursor: pointer; background-color: #ccc; border-radius: 34px; top: 0; left: 0; right: 0; bottom: 0; transition: 0.3s; }
    .slider::before { position: absolute; content: ""; height: 20px; width: 20px; left: 3px; bottom: 3px; background-color: white; border-radius: 50%; transition: 0.3s; }
    input:checked + .slider { background-color: #28a745; }
    input:checked + .slider::before { transform: translateX(26px); }
    .exam-toggle-cell { white-space: nowrap; }
</style>

<div class="clearfix">
    <span class="pull-right tableTools-container"></span>
</div>
<div class="table-responsive">
    <table id="exam-schedule-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Year</th>
                <th>Month</th>
                <th>Term/Class</th>
                <th>Exam</th>
                <th>Parent Access</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php
                $scheduleExams = isset($data['schedule_exams']) && $data['schedule_exams']->count() > 0 ? $data['schedule_exams'] : collect();
            @endphp
            @forelse ($scheduleExams as $exam)
                @php
                    $accessKey = "{$exam->years_id}_{$exam->months_id}_{$exam->exams_id}_{$exam->faculty_id}_{$exam->semesters_id}";
                    $accessRecord = isset($data['exam_access_map'][$accessKey]) ? $data['exam_access_map'][$accessKey] : null;
                    $isVisible = $accessRecord ? (bool) $accessRecord->visible : true;
                    $studentId = isset($exam->user_id) ? $exam->user_id : (isset($data['student']->id) ? $data['student']->id : null);
                @endphp
                <tr data-exam="{{ json_encode(['student_id' => $studentId, 'year' => $exam->years_id, 'month' => $exam->months_id, 'exam' => $exam->exams_id, 'faculty' => $exam->faculty_id, 'semester' => $exam->semesters_id]) }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ ViewHelper::getYearById($exam->years_id) }}</td>
                    <td>{{ ViewHelper::getMonthById($exam->months_id) }}</td>
                    <td>{{ ViewHelper::getSemesterById($exam->semesters_id) }}</td>
                    <td>{{ ViewHelper::getExamById($exam->exams_id) }}</td>
                    <td class="exam-toggle-cell">
                        <label class="switch" title="{{ $isVisible ? 'Enabled: Parent can view' : 'Disabled: Parent must pay fees to view' }}">
                            <input type="checkbox" class="exam-visibility-toggle" {{ $isVisible ? 'checked' : '' }}>
                            <span class="slider"></span>
                        </label>
                        <small class="text-muted">{{ $isVisible ? 'Enabled' : 'Disabled' }}</small>
                    </td>
                    <td>
                        <div class="clearfix hidden-print">
                            <div class="easy-link-menu">
                                <a href="{{ route('admin-score', ['year' => $exam->years_id, 'month' => $exam->months_id, 'exam' => $exam->exams_id, 'faculty' => $exam->faculty_id, 'semester' => $exam->semesters_id, 'userid' => $studentId]) }}"
                                    title="View Result" class="btn-primary btn-sm">
                                    <i class="fa fa-line-chart" aria-hidden="true"></i> View result
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No {{ $panel }} data found. Please Filter {{ $panel }} to show.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.exam-visibility-toggle').forEach(function(toggle) {
        toggle.addEventListener('change', function() {
            var row = this.closest('tr');
            var examData = JSON.parse(row.getAttribute('data-exam'));
            var visible = this.checked ? 1 : 0;
            var statusLabel = row.querySelector('.exam-toggle-cell small');

            fetch('{{ url("exam-visibility-toggle") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    student_id: examData.student_id,
                    year: examData.year,
                    month: examData.month,
                    exam: examData.exam,
                    faculty: examData.faculty,
                    semester: examData.semester,
                    visible: visible,
                    _token: '{{ csrf_token() }}'
                })
            })
            .then(function(r) { return r.json(); })
            .then(function(data) {
                if (data.success) {
                    statusLabel.textContent = data.visible ? 'Enabled' : 'Disabled';
                }
            })
            .catch(function() {
                toggle.checked = !toggle.checked;
            });
        });
    });
});
</script>
