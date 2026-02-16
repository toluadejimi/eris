<div class="clearfix hidden-print">
    <div class="easy-link-menu">
        <a class="btn btn-sm {!! request()->is('student') && !request()->is('student/*/view') && !request()->is('student/*/edit') ?'btn-success':'btn-primary' !!}" href="{{ route('student') }}"><i class="fa fa-list" aria-hidden="true"></i> Detail</a>
        <a class="btn btn-sm {!! request()->is('student/registration*')?'btn-success':'btn-primary' !!}" href="{{ route('student.registration') }}"><i class="fa fa-plus" aria-hidden="true"></i> Registration</a>
        <a class="btn btn-sm {!! request()->is('student/import*')?'btn-success':'btn-primary' !!}" href="{{ route('student.import') }}"><i class="fa fa-upload" aria-hidden="true"></i> Bulk Registration</a>
        <a class="btn btn-sm {!! request()->is('student/transfer*')?'btn-success':'btn-primary' !!}" href="{{ route('student.transfer') }}"><i class="fa fa-exchange" aria-hidden="true"></i> Transfer</a>
        <a class="btn btn-sm {!! request()->is('student/document*')?'btn-success':'btn-primary' !!}" href="{{ route('student.document') }}"><i class="fa fa-files-o" aria-hidden="true"></i> Documents</a>
        <a class="btn btn-sm {!! request()->is('student/note*')?'btn-success':'btn-primary' !!}" href="{{ route('student.note') }}"><i class="fa fa-sticky-note" aria-hidden="true"></i> Notes</a>
        <a class="btn btn-sm {!! request()->is('account/fees/balance')?'btn-success':'btn-primary' !!}" href="{{ route('account.fees.balance') }}"><i class="fa fa-calculator" aria-hidden="true"></i> Balance Fees</a>
        <a class="btn btn-sm {!! request()->is('library/student*')?'btn-success':'btn-primary' !!}" href="{{ route('library.student') }}"><i class="fa fa-book" aria-hidden="true"></i> Library</a>
        <a class="btn btn-sm {!! request()->is('attendance/student*')?'btn-success':'btn-primary' !!}" href="{{ route('attendance.student') }}"><i class="fa fa-calendar" aria-hidden="true"></i> Attendance</a>
    </div>
</div>
