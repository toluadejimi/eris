<div class="form-group center">

    <div class="col-sm-12 mt-3 mb-3">
        <h2 class="">APPLICATION REQUIRMENTS</h2>
    </div>


    <ul>

        <b>A Completed Application Form<br>
        A Copy of report from previous school<br>
        2 passport size photographs<br>
        A Copy of birth cerificate or international<br>
        Immunization Record<br>
        A Completed Emerald Royal International School Medical Form<br>
        </b>



    </ul>

    

</div>


<div class="form-group">

  
    <div class="col-sm-12 mt-5">
        <div class="label label-warning arrowed-in arrowed-right arrowed">SCHOLAR'S INFORMATION</div>
    </div>

</div>


<div class="form-group">
    {!! Form::label('reg_date', 'Date', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('reg_date', null, [
            'class' => 'form-control date-picker border-form input-mask-date',
            'readonly',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'reg_date'])
    </div>



    @if (!isset($data['row']))
        <label class="col-sm-1 control-label">Class</label>
        <div class="col-sm-3">
            <select name="faculty" class="chosen-select form-control" id="form-field-select-3"
                data-placeholder="Choose a Class..." onChange="loadSemesters(this)">
                <option value=""> </option>
                @foreach ($data['faculties'] as $key => $faculty)
                    <option value="{{ $key }}">{{ $faculty }}</option>
                @endforeach
            </select>
        </div>

        {{-- <label class="col-sm-1 control-label">Term/Sec</label>
        <div class="col-sm-2">
            <select name="semester" class="form-control semester" required > </select>
            @include('includes.form_fields_validation_message', ['name' => 'semester'])
        </div> --}}
    @else
        <label class="col-sm-2 control-label">Class</label>
        <div class="col-sm-4">
            {!! Form::select('faculty', $data['faculties'], null, ['class' => 'form-control', 'disabled']) !!}
            @include('includes.form_fields_validation_message', ['name' => 'faculty'])
        </div>

        <label class="col-sm-1 control-label">Term/Sec</label>
        <div class="col-sm-2">
            {!! Form::select('semester', $data['semester'], null, ['class' => 'form-control', 'disabled']) !!}
            @include('includes.form_fields_validation_message', ['name' => 'semester'])
        </div>
    @endif


    {!! Form::label('gender', 'Gender', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::select('gender', ['' => '', 'MALE' => 'MALE', 'FEMALE' => 'FEMALE', 'OTHER' => 'OTHER'], null, [
            'class' => 'form-control border-form',
            'required',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'gender'])
    </div>


</div>






<div class="form-group">
    {!! Form::label('first_name', 'NAME OF SCHOLAR', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('first_name', null, [
            'placeholder' => 'First Name',
            'class' => 'form-control border-form upper',
            'required',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'first_name'])
    </div>

    <div class="col-sm-3">
        {!! Form::text('middle_name', null, [
            'placeholder' => 'Middle Name',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'middle_name'])
    </div>


    <div class="col-sm-3">
        {!! Form::text('last_name', null, [
            'placeholder' => 'Last Name',
            'class' => 'form-control border-form upper',
            'required',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'last_name'])
    </div>
</div>

<div class="form-group">
    {!! Form::label('date_of_birth', 'Date of Birth', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('date_of_birth', null, [
            'placeholder' => 'DOB',
            'class' => 'form-control border-form date-picker input-mask-date',
            'required',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'date_of_birth'])
    </div>




    {!! Form::label('nationality', 'Nationality', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('nationality', null, [
            'placeholder' => 'eg. Nigerian',
            'class' => 'form-control border-form input-mask-mobile',
            'required',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'nationality'])
    </div>


    {!! Form::label('state_of_origin', 'State of Origin', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('state_of_origin', null, [
            'placeholder' => 'State of Origin',
            'class' => 'form-control border-form input-mask-mobile',
            'required',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'state_of_origin'])
    </div>


    {!! Form::label('lga', 'LGA', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('lga', null, [
            'placeholder' => 'LGA',
            'class' => 'form-control border-form input-mask-mobile',
            'required',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'lga'])
    </div>


</div>




<div class="form-group">

    <div class="col-sm-12 mt-3">
        <hr>
        <div class="label label-warning arrowed-in arrowed-right arrowed">Last School Attended</div>

    </div>

</div>


<div class="form-group">
    {!! Form::label('name_of_school', 'Name of School', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('name_of_school', null, [
            'placeholder' => 'Enter name of school',
            'class' => 'form-control border-form',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'name_of_school'])
    </div>

    {!! Form::label('from_date', 'From', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('from_date', null, [
            'placeholder' => 'From',
            'class' => 'form-control border-form date-picker input-mask-date',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'from_date'])
    </div>


    {!! Form::label('to_date', 'To', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('to_date', null, [
            'placeholder' => 'To',
            'class' => 'form-control border-form date-picker input-mask-date',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'to_date'])
    </div>
</div>

<div class="form-group">
    {!! Form::label('name_of_school_2', 'Name of School (No 2)', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('name_of_school_2', null, [
            'placeholder' => 'Enter name of school',
            'class' => 'form-control border-form',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'name_of_school_2'])
    </div>

    {!! Form::label('from_date_2', 'From', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('from_date_2', null, [
            'placeholder' => 'From',
            'class' => 'form-control border-form date-picker input-mask-date',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'from_date_2'])
    </div>


    {!! Form::label('to_date_2', 'To', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('to_date_2', null, [
            'placeholder' => 'To',
            'class' => 'form-control border-form date-picker input-mask-date',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'to_date_2'])
    </div>
</div>




<div class="form-group">

    <div class="col-sm-12 mt-3">
        <hr>
        <div class="label label-warning arrowed-in arrowed-right arrowed">Siblings Atttending Emerald Royal INT. School
        </div>

    </div>

</div>


<div class="form-group">
    {!! Form::label('name_of_scholar', 'Name', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('name_of_scholar', null, [
            'placeholder' => 'Enter name',
            'class' => 'form-control border-form',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'name_of_scholar'])
    </div>

    {!! Form::label('date_of_scholar_birth', 'Date of Birth', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('date_of_scholar_birth', null, [
            'placeholder' => 'Date of Birth',
            'class' => 'form-control border-form date-picker input-mask-date',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'date_of_scholar_birth'])
    </div>


    {!! Form::label('year_group', 'Year Group', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('year_group', null, [
            'placeholder' => 'Year Group',
            'class' => 'form-control',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'year_group'])
    </div>
</div>



<div class="form-group">
    {!! Form::label('name_of_scholar_2', 'Name', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('name_of_scholar_2', null, [
            'placeholder' => 'Enter name',
            'class' => 'form-control border-form',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'name_of_scholar_2'])
    </div>

    {!! Form::label('date_of_scholar_birth', 'Date of Birth', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('date_of_scholar_birth_2', null, [
            'placeholder' => 'Date of Birth',
            'class' => 'form-control border-form date-picker input-mask-date',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'date_of_scholar_birth_2'])
    </div>


    {!! Form::label('year_group_2', 'Year Group', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('year_group_2', null, [
            'placeholder' => 'Year Group',
            'class' => 'form-control border-form',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'year_group_2'])
    </div>
</div>



<div class="form-group">
    {!! Form::label('name_of_scholar_3', 'Name', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('name_of_scholar_3', null, [
            'placeholder' => 'Enter name',
            'class' => 'form-control border-form',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'name_of_scholar_3'])
    </div>

    {!! Form::label('date_of_scholar_birth_3', 'Date of Birth', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('date_of_scholar_birth_3', null, [
            'placeholder' => 'Date of Birth',
            'class' => 'form-control border-form date-picker input-mask-date',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'date_of_scholar_birth_3'])
    </div>


    {!! Form::label('year_group_3', 'Year Group', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('year_group_3', null, [
            'placeholder' => 'Year Group',
            'class' => 'form-control',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'year_group_3'])
    </div>
</div>


<div class="form-group">

    <div class="col-sm-12 mt-3">
        <hr>
        <div class="label label-warning arrowed-in arrowed-right arrowed">Other Details
        </div>
    </div>

</div>


<div class="form-group">
    {!! Form::label('mother_tongue', 'Language Spoken by the child', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('name_of_scholar_3', null, [
            'placeholder' => 'e.g: English, Igbo',
            'class' => 'form-control border-form',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'mother_tongue'])
    </div>



    {!! Form::label('challenges', 'Does this chlid have any learning challenges? if so. Please specify', [
        'class' => 'col-sm-3 control-label',
    ]) !!}
    <div class="col-sm-4">
        {!! Form::textarea('challanges', null, [
            'placeholder' => 'Type here...',
            'class' => 'form-control border-form',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'challenges'])
    </div>
</div>

<div class="form-group">

    {!! Form::label('hear_about_us', 'How did you hear about us? (Emerald Royal International School)', [
        'class' => 'col-sm-4 control-label',
    ]) !!}
    <div class="col-sm-8">
        {!! Form::textarea('hear_about_us', null, [
            'placeholder' => 'Type here...',
            'class' => 'form-control border-form',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'hear_about_us'])
    </div>
</div>





<div class="form-group">

    <div class="col-sm-12 mt-3">
        <hr>
        <div class="label label-warning arrowed-in arrowed-right arrowed">Portal Login Information</div>

    </div>

</div>


<div class="form-group">
    {!! Form::label('email', 'E-mail', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('email', null, ['class' => 'form-control border-form', 'required']) !!}
        @include('includes.form_fields_validation_message', ['name' => 'email'])
    </div>

    {!! Form::label('password', 'Password', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::password('password', ['placeholder' => '', 'class' => 'form-control border-form', 'required']) !!}
        @include('includes.form_fields_validation_message', ['name' => 'password'])
    </div>

    {!! Form::label('confirmPassword', 'Confirm Password', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::password('confirmPassword', [
            'placeholder' => '',
            'class' => 'form-control border-form' /*,"onkeyup"=>"passCheck()"*/,
            'required',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'confirmPassword'])
    </div>
</div>


<div class="form-group">

    <div class="col-sm-12 mt-3">
    </div>

</div>

</div>
