<div class="form-group">
    <table id="subjectsTable" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>Sort</th>
            <th width="30%">SUBJECT</th>
            <th>DATE</th>
            <th>1ST CA FM</th>
            <th>1ST CA PM</th>
            <th>2ND CA FM</th>
            <th>2ND CA PM</th>
            <th>ASS FM</th>
            <th>ASS PM</th>
            <th>CLASS EXE FM</th>
            <th>CLASS EXE  PM</th>
            <th>AFFECTIVE FM</th>
            <th>AFFECTIVE PM</th>

            <th>PSYCHO FM</th>
            <th>PSYCHO PM</th>

            <th>EXAM FM</th>
            <th>EXAM PM</th>

            <th></th>
        </tr>
        </thead>

        <tbody id="subject_wrapper">
        {{--@if($schedule)
        @include('examination.schedule.includes.subject_tr_rows')
        @endif--}}
        {{--@if (isset($data['schedule']))

            {!! $data['schedule'] !!}

        @endif--}}

        </tbody>

    </table>
</div>
@include('includes.scripts.inputMask_script')