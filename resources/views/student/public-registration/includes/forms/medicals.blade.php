<hr class="hr-8 mt-3">

<div class="space-10"></div>

<div class="form-group center">

    <div class="col-sm-12 mt-5 mb-3">
        <h1 class="">CHILD INFORMATION</h1>
    </div>

</div>

<div class="col-sm-12 mt-5 mb-3">
    <h5 class=""> Emergency Contact :- in case we cannot contact you please list two local emergency contacts</h5>
</div>



<div class="form-group">
    {!! Form::label('emergency_name', 'NAME', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('emergency_name', null, [
            'placeholder' => 'Enter name',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'emergency_name'])
    </div>

    {!! Form::label('emergency_contact', 'Daily Telephone No', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('emergency_contact', null, [
            'placeholder' => 'Enter phone no',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'emergency_contact'])
    </div>

    {!! Form::label('emergency_relationship', 'Relationship to Pupil', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('emergency_relationship', null, [
            'placeholder' => 'e.g Aunt, Uncle, Nanny e.t.c',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'emergency_relationship'])
    </div>

</div>


<div class="form-group">
    {!! Form::label('emergency_name_2', 'NAME', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('emergency_name_2', null, [
            'placeholder' => 'Enter name',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'emergency_name_2'])
    </div>

    {!! Form::label('emergency_contact_2', 'Daily Telephone No', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('emergency_contact_2', null, [
            'placeholder' => 'Enter phone no',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'emergency_contact_2'])
    </div>

    {!! Form::label('emergency_relationship_2', 'Relationship to Pupil', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('emergency_relationship_2', null, [
            'placeholder' => 'e.g Aunt, Uncle, Nanny e.t.c',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'emergency_relationship_2'])
    </div>

</div>



<div class="form-group">
    <div class="col-sm-12 mt-5 mb-3">
        <h5 class=""> HEALTH. Please select below if there are any health issues we should be aware of, if
            necessary a letter explaining the situation so <br>that the teacher/caregiver and school medical can be
            aware of the circumstances.</h5>
    </div>


    {!! Form::label('health_issues', 'Health Issues', [
        'placeholder' => 'Choose health issues',
        'class' => 'col-sm-1 control-label',
    ]) !!}
    <div class="col-sm-3">
        {!! Form::select(
            'health_issues',
            [
                'NONE' => 'NONE',
                'HEARNING' => 'HEARING',
                'EYESIGHT' => 'EYESIGHT(DOES HE/SHE NEED GLASSES?)',
                'ASTHMA' => 'ASTHMA',
                'ALLERGIES' => 'ALLERGIES',
                'SICKLE_CELL' => 'SICKLE CELL',
                'OTHER' => 'OTHER (PLEASE SPECIFY)',
            ],
            null,
            [
                'class' => 'form-control border-form',
                'required',
            ],
        ) !!}
        @include('includes.form_fields_validation_message', ['name' => 'health_issues'])
    </div>


    {!! Form::label('other_health_issues', 'IF OTHERS PLS SPECIFY', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-5">
        {!! Form::textarea('other_health_issues', null, [
            'placeholder' => 'Type here...',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'other_health_issues'])
    </div>


</div>

<hr class="hr-8 mt-3">

<div class="space-10"></div>

<div class="form-group center">

   

</div>

<div class="form-group">
    <div class="col-sm-12 mt-5 mb-3">
        <h5 class=""> Teahers will not let children go with any person unknown to them. Therefore, of anyone apart
            from yourself is collecting your children,<br> please provide the following information and submit
            photograph of each person.</h5>
    </div>

    {!! Form::label('pick_child', 'Name', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::text('pick_child', null, [
            'placeholder' => 'Enter full name',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'pick_child'])
    </div>

    {!! Form::label('pick_phone', 'Daytime Phone No', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('pick_phone', null, [
            'placeholder' => 'Enter phone number',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'pick_phone'])
    </div>

</div>


<div class="form-group">

    {!! Form::label('pick_child_2', 'Name', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::text('pick_child_2', null, [
            'placeholder' => 'Enter full name',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'pick_child_2'])
    </div>

    {!! Form::label('pick_phone_2', 'Daytime Phone No', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::text('pick_phone_2', null, [
            'placeholder' => 'Enter phone number',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'pick_phone_2'])
    </div>



</div>


<div class="form-group center">

    <hr>
    <div class="col-sm-12 mt-5 mb-3">
        <h1 class="">WEBSITE AND PUBLICITY PHOTOGRAPH PERMISSION</h1>
    </div>

</div>


<div class="form-group">
    <div class="col-sm-12 mt-5 mb-3">
        <h5 class="">MY Child Photograph on Emerald Royal International School website or any other display.</h5>
    </div>


    {!! Form::label('photo_publicity', 'PLEASE SELECT', [
        'placeholder' => 'Select an option',
        'class' => 'col-sm-1 control-label',
    ]) !!}
    <div class="col-sm-3">
        {!! Form::select(
            'photo_publicity',
            ['YOU_CAN_USE' => 'YOU CAN USE', 'YOU_CANNOT_USE' => 'YOU CAN NOT USE'],
            null,
            [
                'class' => 'form-control border-form',
                'required',
            ],
        ) !!}
        @include('includes.form_fields_validation_message', ['name' => 'photo_publicity'])
    </div>
</div>


<div class="form-group">
    {!! Form::label('other_information', 'OTHER INFORMATION YOU WANT US TO KNOW', [
        'class' => 'col-sm-3 control-label',
    ]) !!}
    <div class="col-sm-9">
        {!! Form::textarea('other_information', null, [
            'placeholder' => 'Type here...',
            'class' => 'form-control border-form upper',
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'other_information'])
    </div>



</div>




<div class="form-group center">

    <hr class="hr-8">
    <div class="col-sm-12 mt-5 mb-3">
        <h1 class="">MEDICAL INFORMATION</h1>
        <h5 class="">Please complete all section of the form and notify the school immediately of any change of
            Phone Numbers, Address and Medical Status</h5>

    </div>

</div>


<div class="form-group">
    {!! Form::label('blood_group', 'Blood Group', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::select(
            'blood_group',
            [
                '' => '',
                'A+' => 'A+',
                'A-' => 'A-',
                'B+' => 'B+',
                'B-' => 'B-',
                'AB+' => 'AB+',
                'AB-' => 'AB-',
                'O+' => 'O+',
                'O-' => 'O-',
            ],
            null,
            ['class' => 'form-control border-form'],
        ) !!}
        @include('includes.form_fields_validation_message', ['name' => 'blood_group'])
    </div>

    {!! Form::label('genotype', 'GENOTYPE', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-1">
        {!! Form::text('genotype', null, ['class' => 'form-control border-form input-mask-mobile']) !!}
        @include('includes.form_fields_validation_message', ['name' => 'genotype'])
    </div>

    {!! Form::label('height', 'HEIGHT (INCHES)', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-1">
        {!! Form::text('height', null, ['class' => 'form-control', 'required']) !!}
        @include('includes.form_fields_validation_message', ['name' => 'height'])
    </div>


    {!! Form::label('weight', 'WEIGHT (KG)', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-1">
        {!! Form::text('weight', null, ['class' => 'form-control', 'required']) !!}
        @include('includes.form_fields_validation_message', ['name' => 'weight'])
    </div>


    {!! Form::label('body_max', 'BODY MAX INDEX', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('body_max', null, ['class' => 'form-control']) !!}
        @include('includes.form_fields_validation_message', ['name' => 'body_max'])
    </div>


</div>



<div class="form-group">


    <div class="col-sm-12 mt-5">
        <div class="label label-warning arrowed-in arrowed-right arrowed">EMERGRNCY CONTACT (In Case Parent/Guardiancs
            cannot br contacted)</div>
    </div>

</div>


<div class="form-group">


    {!! Form::label('relative_name', 'RELATIVE/FRIEND NAME', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('reletive_name', null, ['class' => 'form-control ']) !!}
        @include('includes.form_fields_validation_message', ['name' => 'reletive_name'])
    </div>


    {!! Form::label('hospital_doctor_name', 'FAMILY HOSPITAL/DOCTOR NAME', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('hospital_doctor_name', null, ['class' => 'form-control ']) !!}
        @include('includes.form_fields_validation_message', ['name' => 'hospital_doctor_name'])
    </div>


    {!! Form::label('doc_phone', 'PHONE NO', ['class' => 'col-sm-1 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::text('doc_phone', null, ['class' => 'form-control border-form input-mask-mobile']) !!}
        @include('includes.form_fields_validation_message', ['name' => 'doc_phone'])
    </div>


</div>


<div class="form-group">


    {!! Form::label('hospital_address', 'OFFICE ADDRESS', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('hospital_address', null, ['class' => 'form-control ']) !!}
        @include('includes.form_fields_validation_message', ['name' => 'hospital_address'])
    </div>

    <hr class="hr-8">
    <div class="col-sm-12 mt-5 mb-3">
        <h5 class="">When a child is sick or has sustained injuries, he/she will be attended to by the Emerald
            Royal International Schools Doctor/Nurses but if the parents prefer otherwise,<br> please provide
            alternative written instruction and attach to this document</h5>

    </div>





</div>



<div class="form-group">


    {!! Form::label('medications', 'PLEASE CHOOSE', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-2">
        {!! Form::select(
            'medications',
            [
                'None' => 'NONE',
                'allergies' => 'ALLERGIES',
                'asthma' => 'ASTHMA',
                'slight' => 'SLIGHT',
                'hearning' => 'HEARNING',
                'dental' => 'DENTAL',
                'fear_phobia' => 'FEAR/PHOBIA',
                'diabetes' => 'DIABETES',
                'bleeding_disorder' => 'BLEEDING DISORDER (EX NOSE BLEEDING)',
                'muscular_skeletal' => 'MUSCULAR/SKELETAL (BACK, KNEE, ANKLE, JOINTS ETC)',
                'constant_headaches' => 'CONSTANT HEADACHE/MIGRAINE',
                'medication' => 'IS YOUR CHILD CURRENTLY ON MEDICATION',
            ],
            null,
            ['class' => 'form-control border-form'],
        ) !!}
        @include('includes.form_fields_validation_message', ['name' => 'medications'])


    </div>


</div>


<div class="form-group">

    <hr class="hr-8">
    <div class="col-sm-12 mt-5 mb-3">

        <h5 class="">If your child suffers from a condition other than any of those listed,which you
            think may be aggravated by <br>full participation in school programmers e.g. Sport activities. Please
            provide details of condition below</h5>

    </div>

</div>

<div class="form-group">

    {!! Form::label('program_condition', 'PLEASE SPECIFY', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('program_condition', null, ['class' => 'form-control ']) !!}
        @include('includes.form_fields_validation_message', ['name' => 'program_condition'])
    </div>

    {!! Form::label('releveant_details', 'RELEVANT DETAILS OF ABOVE ILLNESS', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::textarea('releveant_details', null, ['class' => 'form-control ']) !!}
        @include('includes.form_fields_validation_message', ['name' => 'releveant_details'])
    </div>

    {!! Form::label('dietary_needs', 'SPECIAL DIETARY NEEDS', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::textarea('dietary_needs', null, ['class' => 'form-control ']) !!}
        @include('includes.form_fields_validation_message', ['name' => 'dietary_needs'])
    </div>

</div>


<div class="form-group">

    {!! Form::label(
        'physical_activities',
        'HE/SHE is physically fit to participate in all school physical atheletics and activities ',
        ['class' => 'col-sm-4 control-label'],
    ) !!}
    <div class="col-sm-2">
        {!! Form::select(
            'physical_activities',
            [
                'yes' => 'YES',
                'no' => 'NO',
            ],
            null,
            ['class' => 'form-control border-form'],
        ) !!}
        @include('includes.form_fields_validation_message', ['name' => 'physical_activities'])
    </div>


    {!! Form::label('physical_activities_reasons', 'If NO please state reason ', [
        'class' => 'col-sm-2 control-label',
    ]) !!}
    <div class="col-sm-4">
        {!! Form::textarea('physical_activities_reasons', null, ['class' => 'form-control ']) !!}
        @include('includes.form_fields_validation_message', ['name' => 'physical_activities_reasons'])
    </div>


</div>





<div class="form-group center">

    <hr class="hr-8">
    <div class="col-sm-12 mt-5 mb-3">
        <h1 class="">AGREEMENT </h1>

    </div>


</div>

<div class="form-group">


    {!! Form::label('child_name_consent', 'I/We give consent to Emerald Royal International School for my child', [
        'class' => 'col-sm-4 control-label',
    ]) !!}
    <div class="col-sm-3">
        {!! Form::text('child_name_consent', null, ['placeholder' => 'Enter Child name', 'class' => 'form-control ']) !!}
        @include('includes.form_fields_validation_message', ['name' => 'child_name_consent'])
    </div>

    <div class="col-sm-12 mt-5 mb-3">

        <h5 class="">To be treated in the school or if necessary br referred to the appropriate authorties</h5>

    </div>






</div>
