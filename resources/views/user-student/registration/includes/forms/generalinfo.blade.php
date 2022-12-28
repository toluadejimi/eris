<span class="label label-info arrowed-in arrowed-right arrowed responsive">Red mark input are required. </span>
<div class="label label-warning arrowed-in arrowed-right arrowed">Scholar's Information</div>

<hr class="hr-16">
<div class="form-group">
    {!! Form::label('reg_no', 'REG.NO.', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-1">
        {!! Form::text('reg_no', null, ["placeholder" => "", "class" => "form-control border-form input-mask-registration", "disabled"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'reg_no'])
    </div>

    {!! Form::label('reg_date', 'Date of Admission', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-1">
        {!! Form::text('reg_date', null, ["class" => "form-control date-picker border-form input-mask-date", "disabled"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'reg_date'])
    </div>

    {!! Form::label('state_of_origin', 'STATE OF ORIGIN', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-1">
        {!! Form::text('state_of_origin', null, ["placeholder" => "", "class" => "form-control border-form", "disabled"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'state_of_origin'])
    </div>

    <label class="col-sm-1 control-label">LGA</label>
    <div class="col-sm-1">
        {!! Form::text('lga', null, ["placeholder" => "", "class" => "form-control border-form", "disabled"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'lga'])
    </div>

    <label class="col-sm-1 control-label">Gender</label>
    <div class="col-sm-1">
        {!! Form::text('gender', null, ["placeholder" => "", "class" => "form-control border-form", "disabled"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'gender'])
    </div>
</div>



<div class="form-group">
    {!! Form::label('first_name', 'NAME OF STUDENT', ['class' => 'col-sm-3 control-label',]) !!}
    <div class="col-sm-3">
        {!! Form::text('first_name', null, ["class" => "form-control border-form upper","required"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'first_name'])
    </div>
    <div class="col-sm-3">
        {!! Form::text('middle_name', null, ["class" => "form-control border-form upper"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'middle_name'])
    </div>
    <div class="col-sm-3">
        {!! Form::text('last_name', null, ["class" => "form-control border-form upper","required"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'last_name'])
    </div>
</div>



<div class="form-group">
    {!! Form::label('date_of_birth', 'Date of Birth', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('date_of_birth', null, ["class" => "form-control border-form date-picker input-mask-date","required"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'date_of_birth'])
    </div>

    {!! Form::label('nationality', 'Nationality', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('nationality', null, ["placeholder" => "", "class" => "form-control border-form upper","required"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'nationality'])
    </div>

    {!! Form::label('religion', 'Religion', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-1">
        {!! Form::text('religion', null, ["placeholder" => "", "class" => "form-control border-form upper"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'religion'])
    </div>

    {!! Form::label('mother_tongue', 'Language spoken', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('mother_tongue', null, ["class" => "form-control border-form upper"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'mother_tongue'])
    </div>

    
</div>







<div class="form-group">
   

    
</div>

<div class="form-group">
   

   

</div>

{{-- <div class="form-group">
    {!! Form::label('extra_info', 'Extra Info', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('extra_info', null, ["class" => "form-control border-form", "rows"=>"1"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'extra_info'])
    </div>
</div> --}}





<div class="label label-warning arrowed-in arrowed-right arrowed">Medical Information</div>
<hr class="hr-8">
<div class="form-group">

    {!! Form::label('blood_group', 'Blood Group', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::select('blood_group', ['' => '','A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+','B-' => 'B-','AB+' => 'AB+', 'AB-' => 'AB-', 'O+' => 'O+','O-' => 'O-', ], null,
        [ 'class'=>'form-control border-form']); !!}
        @include('includes.form_fields_validation_message', ['name' => 'blood_group'])
    </div>



</div>


<div class="label label-warning arrowed-in arrowed-right arrowed">Education Information</div>
<hr class="hr-8">
<div class="form-group">

        <label class="col-sm-2 control-label">Class</label>
        <div class="col-sm-5">
            {!! Form::select('faculty', $data['faculties'], null, ['class' => 'form-control',"disabled"]) !!}
            @include('includes.form_fields_validation_message', ['name' => 'faculty'])
        </div>
    
        <label class="col-sm-2 control-label">Term/Sec</label>
        <div class="col-sm-3">
            {!! Form::select('semester', $data['semester'], null, ['class' => 'form-control',"disabled"]) !!}
            @include('includes.form_fields_validation_message', ['name' => 'semester'])
        </div>



</div>






















<div class="label label-warning arrowed-in arrowed-right arrowed">Permanent Address</div>
<hr class="hr-8">
<div class="form-group">
    {!! Form::label('address', 'Address', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('address', null, ["class" => "form-control border-form upper","required"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'address'])
    </div>

    {!! Form::label('state', 'State', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('state', null, ["class" => "form-control border-form upper","required"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'state'])
    </div>

    {!! Form::label('country', 'Country', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('country', null, ["class" => "form-control border-form upper","required"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'country'])
    </div>
</div>


<div class="label label-warning arrowed-in arrowed-right arrowed">Temporary Address</div>

<div class="control-group col-sm-12">
    <div class="radio">
        <label>
            {!! Form::checkbox('permanent_address_copier', '', false, ['class' => 'ace', "onclick"=>"CopyAddress(this.form)"]) !!}
            <span class="lbl"> Temporary Address Same As Permanent Address</span>
        </label>
    </div>
</div>

<hr>
<hr class="hr-8">

<div class="form-group">
    {!! Form::label('temp_address', 'Address', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('temp_address', null, ["class" => "form-control border-form upper"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'temp_address'])
    </div>

    {!! Form::label('temp_state', 'State', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('temp_state', null, ["class" => "form-control border-form upper"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'temp_state'])
    </div>

    {!! Form::label('temp_country', 'Country', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('temp_country', null, ["class" => "form-control border-form upper"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'temp_country'])
    </div>
</div>


