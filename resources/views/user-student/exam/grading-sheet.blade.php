<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exam Report — {{ isset($generalSetting->institute) ? $generalSetting->institute : 'Report Card' }}</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif; font-size: 13px; color: #1a1a1a; }
        .no-print { display: block; }
        @media print {
            .no-print { display: none !important; }
            body { margin: 0; padding: 0; font-size: 11px; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
            .report-card { padding: 0 !important; margin: 0 !important; page-break-inside: avoid; }
            .report-header, .student-info, .principal-comment, .report-footer { page-break-inside: avoid; }
            .marks-table { font-size: 10px; }
            .marks-table th, .marks-table td { padding: 4px 3px; }
            .report-header { padding: 6px 0 10px; }
            .student-info .student-name-row { padding: 10px 14px; font-size: 12px; }
            .student-info .details-table td { padding: 8px 12px; font-size: 11px; }
            .principal-comment { padding: 8px 10px; margin-bottom: 8px; font-size: 11px; }
            .report-footer { padding: 6px 0; margin-top: 6px; font-size: 10px; }
        }
        @page { size: A4; margin: 10mm; }

        .report-card { max-width: 210mm; margin: 0 auto; padding: 16px; }
        .report-header { display: flex; align-items: center; justify-content: space-between; padding: 10px 0 14px; border-bottom: 2px solid #0f766e; margin-bottom: 12px; }
        .report-logo { flex-shrink: 0; }
        .report-logo img { width: 72px; height: 72px; object-fit: contain; }
        .report-school { flex: 1; text-align: center; padding: 0 16px; }
        .report-school h1 { margin: 0; font-size: 16px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.02em; }
        .report-school .tagline { margin: 3px 0; font-size: 12px; color: #555; }
        .report-school .contact { font-size: 11px; color: #666; }
        .report-photo { flex-shrink: 0; }
        .report-photo img { width: 68px; height: 68px; object-fit: cover; border-radius: 6px; border: 1px solid #ddd; }

        .student-info { border: 1px solid #cbd5e1; margin-bottom: 14px; border-radius: 6px; overflow: hidden; }
        .student-info .student-name-row { background: #0f766e; color: white; padding: 12px 16px; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.03em; }
        .student-info .details-table { width: 100%; border-collapse: collapse; font-size: 12px; }
        .student-info .details-table tr { border-bottom: 1px solid #e2e8f0; }
        .student-info .details-table tr:last-child { border-bottom: none; }
        .student-info .details-table td { padding: 10px 16px; vertical-align: middle; }
        .student-info .details-table td:first-child { width: 140px; font-weight: 600; color: #0f766e; background: #f0fdfa; }
        .student-info .details-table td:last-child { font-weight: 500; }

        .marks-table { width: 100%; border-collapse: collapse; font-size: 11px; margin-bottom: 10px; }
        .marks-table th, .marks-table td { border: 1px solid #cbd5e1; padding: 6px 4px; text-align: center; }
        .marks-table th { background: #0f766e; color: white; font-weight: 600; font-size: 10px; }
        .marks-table td:nth-child(2) { text-align: left; padding-left: 8px; font-size: 11px; }
        .marks-table tbody tr:nth-child(even) { background: #f8fafc; }
        .marks-table tfoot td { background: #e2e8f0; font-weight: 600; padding: 8px 10px; font-size: 11px; }

        .principal-comment { padding: 10px 14px; border: 1px solid #e2e8f0; border-radius: 6px; background: #f8fafc; font-size: 12px; margin-bottom: 12px; }
        .principal-comment strong { color: #0f766e; }

        .report-footer { display: flex; align-items: center; justify-content: space-between; padding: 10px 0; margin-top: 10px; border-top: 1px solid #e2e8f0; }
        .vacation-box { font-size: 11px; font-weight: 600; color: #0f766e; }
        .stamp-box { text-align: center; }
        .stamp-box img { width: 60px; height: 60px; opacity: 0.9; }

        .print-btn { position: fixed; top: 12px; right: 12px; z-index: 9999; padding: 8px 16px; background: #0f766e; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 13px; font-weight: 500; box-shadow: 0 2px 8px rgba(0,0,0,0.15); }
        .print-btn:hover { background: #0d5c56; }
        .print-btn i { margin-right: 6px; }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}">
</head>
<body>
@if($data['student'] && $data['student']->count() > 0)
    <button type="button" class="print-btn no-print" onclick="window.print();">
        <i class="fa fa-print"></i> Print Report
    </button>

    @foreach($data['student'] as $student)
    <div class="report-card">
        {{-- Header --}}
        <div class="report-header">
            <div class="report-logo">
                @if(isset($generalSetting->logo))
                    <img src="{{ asset('images'.DIRECTORY_SEPARATOR.'setting'.DIRECTORY_SEPARATOR.'general'.DIRECTORY_SEPARATOR.$generalSetting->logo) }}" alt="">
                @endif
            </div>
            <div class="report-school">
                @if(isset($generalSetting->salogan))
                    <div class="tagline">{{ $generalSetting->salogan }}</div>
                @endif
                <h1>{{ isset($generalSetting->institute) ? $generalSetting->institute : 'School' }}</h1>
                @if(isset($generalSetting->address) || isset($generalSetting->phone))
                    <div class="contact">
                        {{ $generalSetting->address ?? '' }}
                        @if(isset($generalSetting->phone)) | {{ $generalSetting->phone }} @endif
                    </div>
                @endif
                @if(isset($generalSetting->email))
                    <div class="contact">{{ $generalSetting->email }}</div>
                @endif
            </div>
            <div class="report-photo">
                @if($student_image != '')
                    <img src="{{ asset('images'.DIRECTORY_SEPARATOR.$folder_name.DIRECTORY_SEPARATOR.$student_image) }}" alt="">
                @else
                    <img src="{{ asset('assets/images/avatars/profile-pic.jpg') }}" alt="">
                @endif
            </div>
        </div>

        {{-- Student Info --}}
        <div class="student-info">
            <div class="student-name-row">{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</div>
            <table class="details-table">
                <tr><td>Reg. No.</td><td>{{ $student->reg_no }}</td></tr>
                <tr><td>Class</td><td>{{ $class }}</td></tr>
                <tr><td>Term</td><td>{{ $term }}</td></tr>
                <tr><td>Academic Session</td><td>{{ $get_year }}</td></tr>
            </table>
        </div>

        {{-- Marks Table --}}
        <table class="marks-table">
            <thead>
                <tr>
                    <th style="width:24px">SN</th>
                    <th>SUBJECT</th>
                    <th style="width:42px">1ST CA<br>(15)</th>
                    <th style="width:42px">2ND CA<br>(15)</th>
                    <th style="width:38px">ASSIGN<br>(4)</th>
                    <th style="width:44px">CLASS EX<br>(6)</th>
                    <th style="width:40px">AFFECT<br>(10)</th>
                    <th style="width:42px">PSYCH<br>(10)</th>
                    <th style="width:38px">EXAM<br>(40)</th>
                    <th style="width:42px">TOTAL<br>(100)</th>
                    <th style="width:60px">REMARKS</th>
                </tr>
            </thead>
            <tbody>
            @if($student->subjects && $student->subjects->count() > 0)
                @php($i=1)
                @foreach($student->subjects as $subject)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ ViewHelper::getSubjectById($subject->subjects_id) }}</td>
                    <td>{{ $subject->ca_test1 ?? 0 }}</td>
                    <td>{{ $subject->ca_test2 ?? 0 }}</td>
                    <td>{{ $subject->assign ?? 0 }}</td>
                    <td>{{ $subject->class_exe ?? 0 }}</td>
                    <td>{{ $subject->affective ?? 0 }}</td>
                    <td>{{ $subject->physc ?? 0 }}</td>
                    <td>{{ $subject->obtain_mark_theory ?? $subject->obtain_score_theory ?? 0 }}</td>
                    <td>{{ $subject->total ?? 0 }}</td>
                    <td>
                        @if($subject->total >= 90) EXCELLENT
                        @elseif($subject->total >= 80) VERY GOOD
                        @elseif($subject->total >= 70) GOOD
                        @elseif($subject->total >= 60) AVERAGE
                        @elseif($subject->total >= 50) FAIR
                        @else FAIL
                        @endif
                    </td>
                </tr>
                @php($i++)
                @endforeach
            @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align:right">AVERAGE: <strong>{{ $average }}</strong></td>
                    <td colspan="6" style="text-align:right">TOTAL SCORED: <strong>{{ $totalmarks }}</strong></td>
                </tr>
            </tfoot>
        </table>

        {{-- Principal's Comment --}}
        <div class="principal-comment">
            <strong>PRINCIPAL'S COMMENT:</strong>
            @if($average >= 90)
                Excellent. Excellent result. Keep it up.
            @elseif($average >= 81)
                Very Good. A very good academic performance.
            @elseif($average >= 71)
                Good. A good result, more room for improvement.
            @elseif($average >= 61)
                Average. An average academic performance, work harder.
            @elseif($average >= 51)
                Fair. A fairly good performance. Work harder.
            @elseif($average >= 41)
                Pass. Fair academic performance. There is need for academic re-awakening.
            @else
                Fail. A poor academic performance. There is need for extra attention.
            @endif
        </div>

        {{-- Footer: Vacation / Stamp / Resumption --}}
        <div class="report-footer">
            <div class="vacation-box">
                VACATION: {{ $vacation->vacation_day ?? '—' }}
            </div>
            <div class="stamp-box">
                <img src="{{ asset('assets/images/avatars/stamp.png') }}" alt="">
            </div>
            <div class="vacation-box" style="text-align:right">
                RESUMPTION: {{ $vacation->resumption_day ?? '—' }}
            </div>
        </div>
    </div>
    @endforeach
@endif
</body>
</html>
