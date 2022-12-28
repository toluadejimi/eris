<hr class="hr-8">
<div class="label label-warning arrowed-in arrowed-right arrowed">Father's Detail</div>
<div class="space-8"></div>
<div class="form-group">
    {!! Form::label('father_name', 'NAME OF FATHER', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('father_first_name', null, [
            'placeholder' => 'Enter Father First Name',
            'class' => 'form-control border-form upper',
            'required',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'father_first_name'])
    </div>
    <div class="col-sm-3">
        {!! Form::text('father_middle_name', null, [
            'placeholder' => 'Enter Father Middle Name',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'father_middle_name'])
    </div>
    <div class="col-sm-3">
        {!! Form::text('father_last_name', null, [
            'placeholder' => 'Enter Father Last Name',
            'class' => 'form-control border-form upper',
            'required',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'father_last_name'])
    </div>
</div>


<div class="form-group">
    {!! Form::label('father_address', 'RESIDENTIAL ADDRESS', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('father_address', null, [
            'placeholder' => 'Enter Residential Address',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'father_address'])
    </div>

    {!! Form::label('father_occupation', 'FATHER OCCUPATION', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('father_occupation', null, [
            'placeholder' => 'Enter father occupation',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'father_occupation'])
    </div>
   
</div>

<div class="form-group">
   

    {!! Form::label('father_office', 'EMPLOYER ADDRESS', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('father_office', null, [
            'placeholder' => 'Enter employer address',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'father_residence_number'])
    </div>

    {!! Form::label('father_email', 'EMAIL', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('father_email', null, [
            'placeholder' => 'Enter email',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'father_email'])
    </div>


    {!! Form::label('father_mobile_1', 'PHONE', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('father_mobile_1', null, [
            'placeholder' => 'Enter phone',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'father_mobile_1'])
    </div>
   
</div>

<div class="form-group">
    {!! Form::label('father_main_image', 'Father Picture', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::file('father_main_image', ["class" => "form-control border-form"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'father_main_image'])
    </div>
</div>



<div class="form-group">

    <div class="col-sm-12 mt-3">
        <hr>
        <div class="label label-warning arrowed-in arrowed-right arrowed">Mother's Details</div>

    </div>

</div>





<div class="form-group">
    {!! Form::label('mother_name', 'NAME OF MOTHER', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('mother_first_name', null, [
            'placeholder' => 'Enter Mother First Name',
            'class' => 'form-control border-form upper',
            'required',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'mother_first_name'])
    </div>
    <div class="col-sm-3">
        {!! Form::text('mother_middle_name', null, [
            'placeholder' => 'Enter Mother Middle Name',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'mother_middle_name'])
    </div>
    <div class="col-sm-3">
        {!! Form::text('mother_last_name', null, [
            'placeholder' => 'Enter Mother Last Name',
            'class' => 'form-control border-form upper',
            'required',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'mother_last_name'])
    </div>
</div>


<div class="form-group">
    {!! Form::label('mother_address', 'RESIDENTIAL ADDRESS', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('mother_address', null, [
            'placeholder' => 'Enter Residential Address',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'mother_address'])
    </div>

    {!! Form::label('mother_occupation', 'MOTHER OCCUPATION', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('mother_occupation', null, [
            'placeholder' => 'Enter mother occupation',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'mother_occupation'])
    </div>
   
</div>



<div class="form-group">
   

    {!! Form::label('father_office', 'EMPLOYER ADDRESS', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('father_office', null, [
            'placeholder' => 'Enter employer address',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'father_residence_number'])
    </div>

    {!! Form::label('father_email', 'EMAIL', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('father_email', null, [
            'placeholder' => 'Enter email',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'father_email'])
    </div>


    {!! Form::label('father_mobile_1', 'PHONE', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('father_mobile_1', null, [
            'placeholder' => 'Enter phone',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'father_mobile_1'])
    </div>
   
</div>

<div class="form-group">
    {!! Form::label('mother_main_image', 'Mother Picture', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::file('mother_main_image', ["class" => "form-control border-form"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'mother_main_image'])
    </div>
</div>






<hr class="hr-8">
<div class="label label-warning arrowed-in arrowed-right arrowed">Guardian's Detail</div>

<div class="control-group col-sm-12">
    <div class="radio">
        <label>
            {!! Form::radio('guardian_is', 'father_as_guardian', false, [
                'class' => 'ace',
                'onclick' => 'FatherAsGuardian(this.form)',
            ]) !!}
            <span class="lbl">Choose Father as Guardian</span>
        </label>
        <label>
            {!! Form::radio('guardian_is', 'mother_as_guardian', false, [
                'class' => 'ace',
                'onclick' => 'MotherAsGuardian(this.form)',
            ]) !!}
            <span class="lbl">Chose Mother as Guardian</span>
        </label>
        <label>
            {!! Form::radio('guardian_is', 'other_guardian', true, [
                'class' => 'ace',
                'onclick' => 'OtherGuardian(this.form)',
            ]) !!}
            <span class="lbl"> Other's</span>
        </label>
        {{-- <label>
            {!! Form::radio('guardian_is', 'link_guardian', false, ['class' => 'ace', "onclick"=>"linkGuardian(this.form)"]) !!}
            <span class="lbl"> Link Guardian</span>
        </label> --}}
    </div>
</div>
<hr>
<div id="guardian-detail">
    <hr class="hr-8">
    <div class="form-group">
        {!! Form::label('guardian_name', 'NAME OF GUARDIAN', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('guardian_first_name', null, ['class' => 'form-control border-form upper', 'required']) !!}
            @include('includes.form_fields_validation_message', ['name' => 'guardian_first_name'])
        </div>
        <div class="col-sm-3">
            {!! Form::text('guardian_middle_name', null, ['class' => 'form-control border-form upper']) !!}
            @include('includes.form_fields_validation_message', ['name' => 'guardian_first_name'])
        </div>
        <div class="col-sm-3">
            {!! Form::text('guardian_last_name', null, ['class' => 'form-control border-form upper', 'required']) !!}
            @include('includes.form_fields_validation_message', ['name' => 'guardian_last_name'])
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('guardian_mobile_1', 'Mobile 1', ['class' => 'col-sm-1 control-label']) !!}
        <div class="col-sm-2">
            {!! Form::text('guardian_mobile_1', null, ['class' => 'form-control border-form input-mask-mobile']) !!}
            @include('includes.form_fields_validation_message', ['name' => 'guardian_mobile_1'])
        </div>

        {!! Form::label('guardian_email', 'E-mail', ['class' => 'col-sm-1 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('guardian_email', null, ['class' => 'form-control border-form']) !!}
            @include('includes.form_fields_validation_message', ['name' => 'guardian_email'])
        </div>

        {!! Form::label('guardian_relation', 'Relation', ['class' => 'col-sm-1 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('guardian_relation', null, ['class' => 'form-control border-form upper', 'required']) !!}
            @include('includes.form_fields_validation_message', ['name' => 'guardian_relation'])
        </div>
    </div>

    <div class="form-group">


        {{-- {!! Form::label('guardian_address', 'Guardian Address', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::text('guardian_address', null, ["class" => "form-control border-form upper", "required"]) !!}
            @include('includes.form_fields_validation_message', ['name' => 'guardian_address'])
        </div> --}}
    </div>

    <div class="form-group">
        {!! Form::label('guardian_main_image', 'Other Guardian Picture', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::file('guardian_main_image', ["class" => "form-control border-form"]) !!}
            @include('includes.form_fields_validation_message', ['name' => 'guardian_main_image'])
        </div>
    </div>
</div>
