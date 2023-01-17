<span class="label label-info arrowed-in arrowed-right arrowed responsive">Red mark input are required. </span>
<hr class="hr-16">
<div class="form-group">
    {!! Form::label('reg_no', 'REG.NO.', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('reg_no', null, ["placeholder" => "", "class" => "form-control border-form input-mask-registration"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'reg_no'])
    </div>

    {!! Form::label('reg_date', 'Date of Admission', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('reg_date', null, ["class" => "form-control date-picker border-form input-mask-date"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'reg_date'])
    </div>

    {!! Form::label('state_of_origin', 'STATE OF ORIGIN.', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('state_of_origin', null, ["placeholder" => "", "class" => "form-control border-form"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'state_of_origin'])
    </div>
</div>

<div class="form-group">
    @if (!isset($data['row']))
        <label class="col-sm-2 control-label">Class</label>
        <div class="col-sm-5">
            <select name="faculty" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a Class..."  onChange ="loadSemesters(this)" >
                <option value="">  </option>
                @foreach( $data['faculties'] as $key => $faculty)
                    <option value="{{ $key }}">{{ $faculty }}</option>
                @endforeach
            </select>
        </div>

        <label class="col-sm-2 control-label">Term/Sec</label>
        <div class="col-sm-3">
            <select name="semester" class="form-control semester"  > </select>
            @include('includes.form_fields_validation_message', ['name' => 'semester'])
        </div>
    @else
        <label class="col-sm-2 control-label">Class</label>
        <div class="col-sm-5">
            {!! Form::select('faculty', $data['faculties'], null, ['class' => 'form-control chosen-select',"disabled"]) !!}
            @include('includes.form_fields_validation_message', ['name' => 'faculty'])
        </div>

        <label class="col-sm-2 control-label">Term/Sec</label>
        <div class="col-sm-3">
            {!! Form::select('semester', $data['semester'], null, ['class' => 'form-control',"disabled"]) !!}
            @include('includes.form_fields_validation_message', ['name' => 'semester'])
        </div>
    @endif
</div>

<div class="form-group">
    @if (!isset($data['row']))
        <label class="col-sm-2 control-label">Batch</label>
        <div class="col-sm-5">
            {!! Form::select('batch', $data['batch'], 1, ['class' => 'form-control']) !!}
            @include('includes.form_fields_validation_message', ['name' => 'batch'])
        </div>

        <label class="col-sm-2 control-label">Status</label>
        <div class="col-sm-3">
            {!! Form::select('academic_status', $data['academic_status'], 1, ['class' => 'form-control']) !!}
            @include('includes.form_fields_validation_message', ['name' => 'academic_status'])
        </div>
    @else
        <label class="col-sm-2 control-label">Batch</label>
        <div class="col-sm-5">
            {!! Form::select('batch', $data['batch'], null, ['class' => 'form-control']) !!}
            @include('includes.form_fields_validation_message', ['name' => 'batch'])
        </div>

        <label class="col-sm-2 control-label">Status</label>
        <div class="col-sm-3">
            {!! Form::select('academic_status', $data['academic_status'], null, ['class' => 'form-control']) !!}
            @include('includes.form_fields_validation_message', ['name' => 'academic_status'])
        </div>
    @endif
</div>

<div class="form-group">
    {!! Form::label('first_name', 'NAME OF STUDENT', ['class' => 'col-sm-3 control-label',]) !!}
    <div class="col-sm-3">
        {!! Form::text('first_name', null, ["class" => "form-control border-form upper"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'first_name'])
    </div>
    <div class="col-sm-3">
        {!! Form::text('middle_name', null, ["class" => "form-control border-form upper"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'middle_name'])
    </div>
    <div class="col-sm-3">
        {!! Form::text('last_name', null, ["class" => "form-control border-form upper"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'last_name'])
    </div>
</div>

<div class="form-group">
    {!! Form::label('date_of_birth', 'Date of Birth', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('date_of_birth', null, ["class" => "form-control border-form date-picker input-mask-date"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'date_of_birth'])
    </div>

    {!! Form::label('gender', 'Gender', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::select('gender', ['' => '','MALE' => 'MALE', 'FEMALE' => 'FEMALE', 'OTHER' => 'OTHER'], null, ['class'=>'form-control border-form']); !!}
        @include('includes.form_fields_validation_message', ['name' => 'gender'])
    </div>

    {!! Form::label('blood_group', 'Blood Group', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::select('blood_group', ['' => '','A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+','B-' => 'B-','AB+' => 'AB+', 'AB-' => 'AB-', 'O+' => 'O+','O-' => 'O-', ], null,
        [ 'class'=>'form-control border-form']); !!}
        @include('includes.form_fields_validation_message', ['name' => 'blood_group'])
    </div>
</div>

<div class="form-group">
    {!! Form::label('religion', 'Religion', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('religion', null, ["placeholder" => "", "class" => "form-control border-form upper"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'religion'])
    </div>

    {!! Form::label('caste', 'SCHOOL HOUSE', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('caste', null, ["class" => "form-control border-form upper"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'caste'])
    </div>
</div>

<div class="form-group">
    {!! Form::label('nationality', 'Nationality', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('nationality', null, ["placeholder" => "", "class" => "form-control border-form upper"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'nationality'])
    </div>

    {!! Form::label('mother_tongue', 'Mother Tongue', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('mother_tongue', null, ["class" => "form-control border-form upper"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'mother_tongue'])
    </div>

    {!! Form::label('email', 'E-mail', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('email', null, ["class" => "form-control border-form"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'email'])
    </div>
</div>

<div class="form-group">
    {!! Form::label('extra_info', 'Extra Info', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('extra_info', null, ["class" => "form-control border-form", "rows"=>"1"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'extra_info'])
    </div>
</div>









