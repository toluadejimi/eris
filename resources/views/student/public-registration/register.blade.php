<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Checkout example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">



    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ url('') }}/public/assets/dist/css/bootstrap.min.css" rel="stylesheet">



    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">






    <div class="container">
        <main>




            <div class="py-5 text-center">


                <img class="d-block mx-auto mb-4" src="https://portal.eris.com.ng/images/setting/general/6835.png"
                    alt="" width="90" height="80">

                <div class="text-center" style="font-family: 'futura', strong; font-size: 40px"> EMERALD ROYAL INT'L
                    SCHOOL </div>
                <div class="text-center" style="font-family: 'futura', normal; font-size: 18px"> Plot 437, Cadastral
                    Zone. 08-04, Mpape 2. Jikoko Layout by New Standard Hotel, Abuja. <br> 08111111964, 08111111965 <br>
                    info@eris.com.ng
                </div>


                <hr>


                <div class="text-center mt" style="font-family: 'futura', bold; font-size: 22px"> ONLINE
                    APPLICATION FOR ADMISSION
                </div>

                <hr>


            </div>


            <div class="text-center" style="font-family: 'futura', normal; font-size: 12px">

                <div class="col-sm-12 mt-3 mb-3">
                    <h6 class="">APPLICATION REQUIRMENTS</h6>
                </div>


                <ul>

                    <p>A Completed Application Form<br>
                        A Copy of report from previous school<br>
                        2 passport size photographs<br>
                        A Copy of birth cerificate or international<br>
                        Immunization Record<br>
                        A Completed Emerald Royal International School Medical Form<br>
                    </p>



                </ul>

                <div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif


                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif


                    @if ($message = Session::get('warning'))
                        <div class="alert alert-warning alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif


                    @if ($message = Session::get('info'))
                        <div class="alert alert-info alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            Please check the form below for errors
                        </div>
                    @endif
                </div>




            </div>


            <div class="row g-5">
                <div class="col-md-7 col-lg-12">
                    <hr>
                    <form enctype="multipart/form-data" method="POST" action="/register-now">
                        @csrf

                        <h4 class="mb-3">SCHOLAR'S
                            INFORMATION</h4>

                        <div class="row g-3">


                            <div class="col-sm-3">
                                <label for="first_name" class="form-label">Surname</label>
                                <input type="text" class="form-control" name="first_name" placeholder=""
                                    value="" required>
                                <div class="invalid-feedback">
                                    Valid Surname name is required.
                                </div>
                            </div>


                            <div class="col-sm-3">
                                <label for="middle_name" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" name="middle_name" placeholder=""
                                    value="">

                            </div>

                            <div class="col-sm-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" placeholder=""
                                    value="" required>
                                <div class="invalid-feedback">
                                    Valid Last name is required.
                                </div>
                            </div>




                            <div class="col-sm-3">
                                <label for="date_of_birth" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" name="date_of_birth" placeholder=""
                                    value="" required>
                                <div class="invalid-feedback">
                                    Date of Birth is required.
                                </div>
                            </div>

                        </div>

                        <div class="row g-3 mt-3">


                            <div class="col-sm-3">
                                <label for="nationality" class="form-label">Nationality</label>
                                <input type="text" class="form-control" name="nationality" placeholder=""
                                    value="" required>
                                <div class="invalid-feedback">
                                    Valid Nationality is required.
                                </div>
                            </div>





                            <div class="col-sm-3">
                                <label for="state_of_origin" class="form-label">State of Origin</label>
                                <input type="text" class="form-control" name="state_of_origin" placeholder=""
                                    value="">

                            </div>

                            <div class="col-sm-3">
                                <label for="lga" class="form-label">LGA</label>
                                <input type="text" class="form-control" name="lga" placeholder=""
                                    value="" required>
                                <div class="invalid-feedback">
                                    LGA is required.
                                </div>
                            </div>




                            <div class="col-sm-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" name="gender"required
                                    aria-label="Default select example">
                                    <option selected>choose gender</option>
                                    <option value="MALE">Male</option>
                                    <option value="FEMALE">Female</option>
                                </select>

                            </div>

                        </div>


                        <div class="row g-3 mt-3">


                            <div class="col-sm-4">
                                <label for="religion" class="form-label">Religion</label>
                                <input type="text" class="form-control" name="religion" placeholder=""
                                    value="" required>
                                <div class="invalid-feedback">
                                    Valid Religion is required.
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <label for="student_main_image" class="form-label">Scholar's Profile Picture</label>
                                <input type="file" class="form-control" name="student_main_image" placeholder=""
                                    value="">

                            </div>



                        </div>





                        <hr>
                        <h4 class="mb-3 mt-3">EDUCATION
                            INFORMATION</h4>



                        <div class="row g-3 mt-3">

                            <div class="col-sm-3">
                                <label for="reg_date" class="form-label">Reg Date</label>
                                <input type="date" class="form-control" id="reg_date" name="reg_date"
                                    placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    REG Date is required.
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label for="reg_no" class="form-label">Reg No</label>
                                <input type="text" class="form-control" name="reg_no" placeholder=""
                                    value="" required>
                                <div class="invalid-feedback">
                                    REG NO is required.
                                </div>
                            </div>





                            <div class="col-sm-6">

                                @if (!isset($data['row']))
                                    <label for="student_main_image" class="form-label">Class</label>
                                    <div class="col-sm-4">
                                        <select name="faculty" class="form-select" id="form-field-select-3"
                                            data-placeholder="Choose a Class..." onChange="loadSemesters(this)">
                                            <option value=""> Select Class</option>
                                            @foreach ($data['faculties'] as $key => $faculty)
                                                <option value="{{ $key }}">{{ $faculty }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @else
                                    <label class="col-sm-2 control-label">Class</label>
                                    <div class="col-sm-4">
                                        {!! Form::select('faculty', $data['faculties'], null, ['class' => 'form-control', 'disabled']) !!}
                                        @include('includes.form_fields_validation_message', [
                                            'name' => 'faculty',
                                        ])
                                    </div>

                                    <label class="col-sm-1 control-label">Term/Sec</label>
                                    <div class="col-sm-2">
                                        {!! Form::select('semester', $data['semester'], null, ['class' => 'form-control', 'disabled']) !!}
                                        @include('includes.form_fields_validation_message', [
                                            'name' => 'semester',
                                        ])
                                    </div>
                                @endif

                            </div>
                        </div>






                        <hr class="my-4">

                        <h4 class="">LAST SCHOOL ATTENDED</h4>


                        <div class="row">


                            <div class="col-sm-6">
                                <label for="name_of_school" class="form-label">No (1) Name Of School</label>
                                <input type="text" class="form-control" name="name_of_school_1" placeholder=""
                                    value="">
                            </div>


                            <div class="col-sm-3">
                                <label for="from_date" class="form-label">From</label>
                                <input type="date" class="form-control" name="from_date" placeholder=""
                                    value="">
                            </div>

                            <div class="col-sm-3">
                                <label for="to_date" class="form-label">To</label>
                                <input type="date" class="form-control" name="to_date" placeholder=""
                                    value="">
                            </div>


                        </div>



                        <div class="row g-3 mt-3">


                            <div class="col-sm-6">
                                <label for="name_of_school_2" class="form-label"> No(2) Name Of School </label>
                                <input type="text" class="form-control" name="name_of_school_2" placeholder=""
                                    value="">
                            </div>


                            <div class="col-sm-3">
                                <label for="from_date" class="form-label">From</label>
                                <input type="date" class="form-control" name="from_date_2" placeholder=""
                                    value="">
                            </div>

                            <div class="col-sm-3">
                                <label for="to_date" class="form-label">To</label>
                                <input type="date" class="form-control" name="to_date_2" placeholder=""
                                    value="">
                            </div>


                        </div>

                        <hr class="my-4">


                        <h4 class="">SIBLINGS ATTTENDING EMERALD ROYAL INT. SCHOOL</h4>




                        <div class="row g-3 mt-3">


                            <div class="col-sm-6">
                                <label for="name_of_scholar" class="form-label"> Name of Scholar</label>
                                <input type="text" class="form-control" name="name_of_scholar" placeholder=""
                                    value="">
                            </div>


                            <div class="col-sm-3">
                                <label for="date_of_scholar_birth" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" name="date_of_scholar_birth"
                                    placeholder="" value="">
                            </div>

                            <div class="col-sm-3">
                                <label for="year_group" class="form-label">Year Group</label>
                                <input type="text" class="form-control" name="year_group" placeholder=""
                                    value="">
                            </div>


                        </div>

                        <div class="row g-3 mt-3">


                            <div class="col-sm-6">
                                <label for="name_of_scholar" class="form-label">Name of Scholar</label>
                                <input type="text" class="form-control" name="name_of_scholar_2" placeholder=""
                                    value="">
                            </div>


                            <div class="col-sm-3">
                                <label for="date_of_scholar_birth" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" name="date_of_scholar_birth_2"
                                    placeholder="" value="">
                            </div>

                            <div class="col-sm-3">
                                <label for="year_group" class="form-label">Year Group</label>
                                <input type="text" class="form-control" name="year_group_2" placeholder=""
                                    value="">
                            </div>


                        </div>


                        <div class="row g-3 mt-3">


                            <div class="col-sm-6">
                                <label for="name_of_scholar" class="form-label">Name of Scholar</label>
                                <input type="text" class="form-control" name="name_of_scholar_3" placeholder=""
                                    value="">
                            </div>


                            <div class="col-sm-3">
                                <label for="date_of_scholar_birth" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" name="date_of_scholar_birth_3"
                                    placeholder="" value="">
                            </div>

                            <div class="col-sm-3">
                                <label for="year_group" class="form-label">Year Group</label>
                                <input type="text" class="form-control" name="year_group_3" placeholder=""
                                    value="">
                            </div>


                        </div>

                        <hr class="my-4">

                        <h4 class=""> OTHER DETAILS</h4>

                        <div class="row g-3 mt-3">


                            <div class="col-sm-3">
                                <label for="mother_tongue" class="form-label">Language Spoken by the child</label>
                                <input type="text" class="form-control" name="mother_tongue" placeholder=""
                                    value="">
                            </div>




                            <div class="col-sm-9">
                                <label for="challenges" class="form-label">Does this chlid have any learning
                                    challenges? if
                                    so. Please specify</label>
                                <textarea class="form-control" placeholder="Leave a comment here" name="challenges" placeholder="Type here"
                                    value="" style="height: 100px"></textarea>

                            </div>




                        </div>


                        <div class="row g-3 mt-3">

                            <div class="col-sm-9">
                                <label for="challenges" class="form-label">How did you hear about us?</label>
                                <textarea class="form-control" placeholder="Leave a comment here" name="hear_about_us" placeholder="Type here"
                                    value="" style="height: 100px"></textarea>

                            </div>




                        </div>



                        <hr class="my-4">


                        <h4 class=""> FATHER'S DETAIL</h4>

                        <div class="row g-3 mt-3">


                            <div class="col-sm-4">
                                <label for="father_first_name" class="form-label">Father's Surname</label>
                                <input type="text" class="form-control" id="father_first_name"
                                    name="father_first_name" placeholder="" value="">
                            </div>


                            <div class="col-sm-4">
                                <label for="father_middle_name" class="form-label">Father's Middle Name</label>
                                <input type="text" class="form-control" id="father_middle_name"
                                    name="father_middle_name" placeholder="" value="">
                            </div>


                            <div class="col-sm-4">
                                <label for="father_last_name" class="form-label">Father's Last Name</label>
                                <input type="text" class="form-control" id="father_last_name"
                                    name="father_last_name" placeholder="" value="">
                            </div>


                            <div class="col-sm-4">
                                <label for="father_residence_number" class="form-label">Residential Address</label>
                                <input type="text" class="form-control" name="father_residence_number"
                                    placeholder="" value="">
                            </div>


                            <div class="col-sm-4">
                                <label for="father_email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="father_email" name="father_email"
                                    placeholder="" value="">
                            </div>


                            <div class="col-sm-4">
                                <label for="father_mobile_1" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="father_mobile_1"
                                    name="father_mobile_1" placeholder="" value="">
                            </div>


                            <div class="col-sm-4">
                                <label for="father_occupation" class="form-label">Father's Occupation</label>
                                <input type="text" class="form-control" name="father_occupation" placeholder=""
                                    value="">
                            </div>

                            <div class="col-sm-4">
                                <label for="father_office_number" class="form-label">Employer's Phone</label>
                                <input type="text" class="form-control" name="father_office_number"
                                    placeholder="" value="">
                            </div>


                            <div class="col-sm-4">
                                <label for="father_office" class="form-label">Employer's Address</label>
                                <input type="text" class="form-control" name="father_office" placeholder=""
                                    value="">
                            </div>


                            <div class="col-sm-4">
                                <label for="father_main_image" class="form-label">Father's Image</label>
                                <input type="file" class="form-control" name="father_main_image" placeholder=""
                                    value="">
                            </div>


















                        </div>



                        <hr class="my-4">


                        <h4 class=""> MOTHER'S DETAIL</h4>

                        <div class="row g-3 mt-3">


                            <div class="col-sm-4">
                                <label for="mother_first_name" class="form-label">Mother's Surname</label>
                                <input type="text" class="form-control" id="mother_first_name"
                                    name="mother_first_name" placeholder="" value="">
                            </div>


                            <div class="col-sm-4">
                                <label for="mother_middle_name" class="form-label">Mother's Middle Name</label>
                                <input type="text" class="form-control" id="mother_middle_name"
                                    name="mother_middle_name" placeholder="" value="">
                            </div>


                            <div class="col-sm-4">
                                <label for="mother_last_name" class="form-label">Mother's Last Name</label>
                                <input type="text" class="form-control" id="mother_last_name"
                                    name="mother_last_name" placeholder="" value="">
                            </div>


                            <div class="col-sm-4">
                                <label for="mother_residence_number" class="form-label">Mother's Address</label>
                                <input type="text" class="form-control" name="mother_residence_number"
                                    placeholder="" value="">
                            </div>


                            <div class="col-sm-4">
                                <label for="mother_email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="mother_email" placeholder=""
                                    value="">
                            </div>


                            <div class="col-sm-4">
                                <label for="mother_mobile_1" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="mother_mobile_1" placeholder=""
                                    value="">
                            </div>


                            <div class="col-sm-4">
                                <label for="mother_occupation" class="form-label">Mother's Occupation</label>
                                <input type="text" class="form-control" name="mother_occupation" placeholder=""
                                    value="">
                            </div>

                            <div class="col-sm-4">
                                <label for="mother_office_number" class="form-label">Employer's Phone</label>
                                <input type="text" class="form-control" name="mother_office_number" placeholder=""
                                    value="">
                            </div>


                            <div class="col-sm-4">
                                <label for="mother_office" class="form-label">Employer's Address</label>
                                <input type="text" class="form-control" name="mother_office"
                                    placeholder="" value="">
                            </div>


                            <div class="col-sm-4">
                                <label for="mother_main_image" class="form-label">Mother's Image</label>
                                <input type="file" class="form-control" name="mother_main_image" placeholder=""
                                    value="">
                            </div>



                        </div>




                        <hr class="my-4">


                        <h4 class=""> GUARDIAN'S DETAIL</h4>

                        <div class="control-group col-sm-12 mb-3">
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

                            </div>
                        </div>
                        <div id="guardian-detail">


                            <div class="row g-3 mt-3">
                                {!! Form::label('guardian_name', 'NAME OF GUARDIAN', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-3">
                                    {!! Form::text('guardian_first_name', null, [
                                        'placeholder' => 'Surname',
                                        'class' => 'form-control border-form upper',
                                        'required',
                                    ]) !!}
                                    @include('includes.form_fields_validation_message', [
                                        'name' => 'guardian_first_name',
                                    ])
                                </div>
                                <div class="col-sm-3">
                                    {!! Form::text('guardian_middle_name', null, [
                                        'placeholder' => 'Middle Name',
                                        'class' => 'form-control border-form upper',
                                    ]) !!}
                                    @include('includes.form_fields_validation_message', [
                                        'name' => 'guardian_first_name',
                                    ])
                                </div>
                                <div class="col-sm-3">
                                    {!! Form::text('guardian_last_name', null, [
                                        'placeholder' => 'Last Name',
                                        'class' => 'form-control border-form upper',
                                        'required',
                                    ]) !!}
                                    @include('includes.form_fields_validation_message', [
                                        'name' => 'guardian_last_name',
                                    ])
                                </div>
                            </div>






                            <div class="row g-3 mt-3">
                                {!! Form::label('guardian_mobile_1', 'Phone', ['class' => 'col-sm-1 control-label']) !!}
                                <div class="col-sm-2">
                                    {!! Form::text('guardian_mobile_1', null, ['class' => 'form-control border-form input-mask-mobile']) !!}
                                    @include('includes.form_fields_validation_message', [
                                        'name' => 'guardian_mobile_1',
                                    ])
                                </div>

                                {!! Form::label('guardian_email', 'E-mail', ['placeholder' => 'Email', 'class' => 'col-sm-1 control-label']) !!}
                                <div class="col-sm-4">
                                    {!! Form::text('guardian_email', null, ['class' => 'form-control border-form']) !!}
                                    @include('includes.form_fields_validation_message', [
                                        'name' => 'guardian_email',
                                    ])
                                </div>

                                {!! Form::label('guardian_relation', 'Relation', ['class' => 'col-sm-1 control-label']) !!}
                                <div class="col-sm-3">
                                    {!! Form::text('guardian_relation', null, ['class' => 'form-control border-form upper', 'required']) !!}
                                    @include('includes.form_fields_validation_message', [
                                        'name' => 'guardian_relation',
                                    ])
                                </div>
                            </div>

                            <div class="form-group">
                            </div>

                            <div class="row g-3 mt-3">
                                {!! Form::label('guardian_main_image', 'Other Guardian Picture', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-6">
                                    {!! Form::file('guardian_main_image', ['class' => 'form-control border-form']) !!}
                                    @include('includes.form_fields_validation_message', [
                                        'name' => 'guardian_main_image',
                                    ])
                                </div>
                            </div>
                        </div>






                        <hr class="my-4">


                        <h4 class=""> CHILD'S INFORMATION</h4>


                        <div class="col-sm-12 mt-2 mb-3">
                            <h6 class=""> Emergency Contact :- in case we cannot contact you please list two
                                local emergency contacts</h6>
                        </div>



                        <div class="row g-3 mt-3">

                            {!! Form::label('emergency_name', 'NAME', ['class' => 'col-sm-1 control-label']) !!}
                            <div class="col-sm-2">
                                {!! Form::text('emergency_name', null, [
                                    'placeholder' => 'Enter name',
                                    'class' => 'form-control border-form upper',
                                ]) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'emergency_name',
                                ])
                            </div>

                            {!! Form::label('emergency_contact', 'Daily Telephone No', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-2">
                                {!! Form::text('emergency_contact', null, [
                                    'placeholder' => 'Enter phone no',
                                    'class' => 'form-control border-form upper',
                                ]) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'emergency_contact',
                                ])
                            </div>

                            {!! Form::label('emergency_relationship', 'Relationship to Pupil', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-3">
                                {!! Form::text('emergency_relationship', null, [
                                    'placeholder' => 'e.g Aunt, Uncle, Nanny e.t.c',
                                    'class' => 'form-control border-form upper',
                                ]) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'emergency_relationship',
                                ])
                            </div>

                        </div>


                        <div class="row g-3 mt-3">

                            {!! Form::label('emergency_name_2', 'NAME', ['class' => 'col-sm-1 control-label']) !!}
                            <div class="col-sm-2">
                                {!! Form::text('emergency_name_2', null, [
                                    'placeholder' => 'Enter name',
                                    'class' => 'form-control border-form upper',
                                ]) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'emergency_name_2',
                                ])
                            </div>

                            {!! Form::label('emergency_contact_2', 'Daily Telephone No', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-2">
                                {!! Form::text('emergency_contact_2', null, [
                                    'placeholder' => 'Enter phone no',
                                    'class' => 'form-control border-form upper',
                                ]) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'emergency_contact_2',
                                ])
                            </div>

                            {!! Form::label('emergency_relationship_2', 'Relationship to Pupil', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-3">
                                {!! Form::text('emergency_relationship_2', null, [
                                    'placeholder' => 'e.g Aunt, Uncle, Nanny e.t.c',
                                    'class' => 'form-control border-form upper',
                                ]) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'emergency_relationship_2',
                                ])
                            </div>

                        </div>



                        <div class="row g-3 mt-3">
                            <div class="col-sm-12 mt-5 mb-3">
                                <h6 class=""> HEALTH. Please select below if there are any health issues we
                                    should be aware of, if
                                    necessary a letter explaining the situation so that the teacher/caregiver and
                                    school medical can be
                                    aware of the circumstances.</h6>
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
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'health_issues',
                                ])
                            </div>


                            {!! Form::label('other_health_issues', 'IF OTHERS PLS SPECIFY', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::textarea('other_health_issues', null, [
                                    'placeholder' => 'Type here...',
                                    'class' => 'form-control border-form upper',
                                ]) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'other_health_issues',
                                ])
                            </div>


                        </div>

                        <hr class="my-4">


                        <div class="row g-3 mt-3">
                            <div class="col-sm-12 mt-2 mb-3">
                                <h6 class=""> Teahers will not let children go with any person unknown to them.
                                    Therefore, of anyone apart
                                    from yourself is collecting your children, please provide the following
                                    information and submit
                                    photograph of each person.</h6>
                            </div>

                            {!! Form::label('pick_child', 'Name', ['class' => 'col-sm-1 control-label']) !!}
                            <div class="col-sm-5">
                                {!! Form::text('pick_child', null, [
                                    'placeholder' => 'Enter full name',
                                    'class' => 'form-control border-form upper',
                                ]) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'pick_child',
                                ])
                            </div>

                            {!! Form::label('pick_phone', 'Phone', ['class' => 'col-sm-1 control-label']) !!}
                            <div class="col-sm-5">
                                {!! Form::text('pick_phone', null, [
                                    'placeholder' => 'Enter phone number',
                                    'class' => 'form-control border-form upper',
                                ]) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'pick_phone',
                                ])
                            </div>

                            <div class="col-sm-5">
                                <label for="student_main_image" class="form-label">Choose Image of the person</label>
                                <input type="file" class="form-control" name="pick_main_image" placeholder=""
                                    value="">

                            </div>

                        </div>


                        <div class="row g-3 mt-3">

                            {!! Form::label('pick_child_2', 'Name', ['class' => 'col-sm-1 control-label']) !!}
                            <div class="col-sm-5">
                                {!! Form::text('pick_child_2', null, [
                                    'placeholder' => 'Enter full name',
                                    'class' => 'form-control border-form upper',
                                ]) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'pick_child_2',
                                ])
                            </div>

                            {!! Form::label('pick_phone_2', 'Phone', ['class' => 'col-sm-1 control-label']) !!}
                            <div class="col-sm-5">
                                {!! Form::text('pick_phone_2', null, [
                                    'placeholder' => 'Enter phone number',
                                    'class' => 'form-control border-form upper',
                                ]) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'pick_phone_2',
                                ])
                            </div>

                            <div class="col-sm-5">
                                <label for="student_main_image" class="form-label">Choose Image of the person</label>
                                <input type="file" class="form-control" name="pick2_main_image" placeholder=""
                                    value="">

                            </div>



                        </div>



                        <hr>
                        <div class="col-sm-12 mt-2 mb-3">
                            <h4 class="">WEBSITE AND PUBLICITY PHOTOGRAPH PERMISSION</h4>
                        </div>




                        <div class="col-sm-12 mt-5 mb-3">
                            <h6 class="">MY Child Photograph on Emerald Royal International School website or
                                any other display.</h6>
                        </div>


                        <div class="row g-3 mt-3">

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
                                        'class' => 'form-control form-select',
                                        'required',
                                    ],
                                ) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'photo_publicity',
                                ])
                            </div>

                            {!! Form::label('other_information', 'OTHER INFORMATION YOU WANT US TO KNOW', [
                                'class' => 'col-sm-3 control-label',
                            ]) !!}
                            <div class="col-sm-5">
                                {!! Form::textarea('other_information', null, [
                                    'placeholder' => 'Type here...',
                                    'class' => 'form-control border-form upper',
                                ]) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'other_information',
                                ])
                            </div>



                        </div>





                        <hr class="hr-8">
                        <div class="col-sm-12 mt-2 mb-3">
                            <h4 class="">MEDICAL INFORMATION</h4>
                            <h6 class="">Please complete all section of the form and notify the school
                                immediately of any change of
                                Phone Numbers, Address and Medical Status</h6>

                        </div>



                        <div class="row g-3 mt-3">
                            {!! Form::label('blood_group', 'Blood Group', ['class' => 'col-sm-2 control-label']) !!}
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
                                    ['class' => 'form-control form-select'],
                                ) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'blood_group',
                                ])
                            </div>

                            {!! Form::label('genotype', 'GENOTYPE', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-2">
                                {!! Form::text('genotype', null, ['class' => 'form-control']) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'genotype',
                                ])
                            </div>

                            {!! Form::label('height', 'HEIGHT', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-2">
                                {!! Form::text('height', null, ['class' => 'form-control']) !!}
                                @include('includes.form_fields_validation_message', ['name' => 'height'])
                            </div>

                        </div>

                        <div class="row g-3 mt-3">


                            {!! Form::label('weight', 'WEIGHT', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-2">
                                {!! Form::text('weight', null, ['class' => 'form-control']) !!}
                                @include('includes.form_fields_validation_message', ['name' => 'weight'])
                            </div>


                            {!! Form::label('body_max', 'BODY MAX INDEX', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-2">
                                {!! Form::text('body_max', null, ['class' => 'form-control']) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'body_max',
                                ])
                            </div>


                        </div>










                        <hr class="hr-8">
                        <div class="col-sm-12 mt-2 mb-3">
                            <h4 class="">EMERGRNCY CONTACT</h4>
                            <h6 class=""> In
                                Case Parent/Guardiancs
                                cannot be contacted</h6>

                        </div>


                        <div class="row g-3 mt-3">


                            {!! Form::label('relative_name', 'RELATIVE/FRIEND NAME', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-2">
                                {!! Form::text('relative_name', null, ['class' => 'form-control ']) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'relative_name',
                                ])
                            </div>

                            {!! Form::label('relative_no', 'RELATIVE PHONE NUMBER', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-2">
                                {!! Form::text('relative_no', null, ['class' => 'form-control ']) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'relative_no',
                                ])
                            </div>





                            {!! Form::label('doc_phone', 'DOCTOR PHONE NO', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-2">
                                {!! Form::text('doc_phone', null, ['class' => 'form-control border-form input-mask-mobile']) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'doc_phone',
                                ])
                            </div>


                        </div>


                        <div class="row g-3 mt-3">


                            {!! Form::label('hospital_address', 'OFFICE ADDRESS', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-4">
                                {!! Form::text('hospital_address', null, ['class' => 'form-control ']) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'hospital_address',
                                ])
                            </div>

                            {!! Form::label('hospital_doctor_name', 'FAMILY HOSPITAL/DOCTOR NAME', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-3">
                                {!! Form::text('hospital_doctor_name', null, ['class' => 'form-control ']) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'hospital_doctor_name',
                                ])
                            </div>

                            <hr class="hr-8">
                            <div class="col-sm-12 mt-2 mb-3">
                                <h6 class="">When a child is sick or has sustained injuries, he/she will be
                                    attended to by the Emerald
                                    Royal International Schools Doctor/Nurses but if the parents prefer otherwise,
                                    please provide
                                    alternative written instruction</h6>

                            </div>

                            <div class="col-sm-9">
                                <label for="written_instructions" class="form-label">Does this chlid have any learning
                                    challenges? if
                                    so. Please specify</label>
                                <textarea class="form-control" placeholder="Type Here" name="written_instructions" placeholder="Type here"
                                    value="" style="height: 100px"></textarea>

                            </div>



                        </div>


                        <hr class="hr-8">
                        <h4 class="">CHILD CONDITIONS</h4>

                        <div class="row g-3 mt-3">


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
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'medications',
                                ])


                            </div>




                            <div class="row g-3 mt-3">

                                <div class="col-sm-12 mt-2 mb-3">

                                    <h6 class="">If your child suffers from a condition other than any of those
                                        listed,which you
                                        think may be aggravated by full participation in school programmers e.g. Sport
                                        activities. Please
                                        provide details of condition below</h6>

                                </div>

                            </div>

                            <div class="row g-3 mt-3">

                                {!! Form::label('program_condition', 'PLEASE SPECIFY', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::textarea('program_condition', null, ['class' => 'form-control ']) !!}
                                    @include('includes.form_fields_validation_message', [
                                        'name' => 'program_condition',
                                    ])
                                </div>

                                {!! Form::label('releveant_details', 'RELEVANT DETAILS OF ABOVE ILLNESS', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::textarea('releveant_details', null, ['class' => 'form-control ']) !!}
                                    @include('includes.form_fields_validation_message', [
                                        'name' => 'releveant_details',
                                    ])
                                </div>

                                {!! Form::label('dietary_needs', 'SPECIAL DIETARY NEEDS', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::textarea('dietary_needs', null, ['class' => 'form-control ']) !!}
                                    @include('includes.form_fields_validation_message', [
                                        'name' => 'dietary_needs',
                                    ])
                                </div>

                            </div>


                            <div class="row g-3 mt-3">

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
                                    @include('includes.form_fields_validation_message', [
                                        'name' => 'physical_activities',
                                    ])
                                </div>


                                {!! Form::label('physical_activities_reasons', 'If NO please state reason ', [
                                    'class' => 'col-sm-2 control-label',
                                ]) !!}
                                <div class="col-sm-4">
                                    {!! Form::textarea('physical_activities_reasons', null, ['class' => 'form-control ']) !!}
                                    @include('includes.form_fields_validation_message', [
                                        'name' => 'physical_activities_reasons',
                                    ])
                                </div>


                            </div>



                            <div class="row g-3 mt-3">
                                <hr>
                                <h4>Portal Login
                                    Information</h4>

                            </div>

                        </div>


                        <div class="row g-3 mt-3">
                            {!! Form::label('email', 'E-mail', ['class' => 'col-sm-1 control-label']) !!}
                            <div class="col-sm-3">
                                {!! Form::text('email', null, ['class' => 'form-control border-form', 'required']) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'email',
                                ])
                            </div>

                            {!! Form::label('password', 'Password', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-2">
                                {!! Form::password('password', ['placeholder' => '', 'class' => 'form-control border-form', 'required']) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'password',
                                ])
                            </div>

                            {!! Form::label('confirmPassword', 'Confirm Password', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-2">
                                {!! Form::password('confirmPassword', [
                                    'placeholder' => '',
                                    'class' => 'form-control border-form' /*,"onkeyup"=>"passCheck()"*/,
                                    'required',
                                ]) !!}
                                @include('includes.form_fields_validation_message', [
                                    'name' => 'confirmPassword',
                                ])
                            </div>
                        </div>


                        <hr>

                        <div class="row g-3 mt-3 center">
                            <div class="col-sm-6 center">
                                <button class="w-10 btn btn-success btn-lg btn-block" type="submit">Register
                                    Scholar</button>
                            </div>

                            <div class="col-sm-6 center">
                                <a class="btn btn-primary w-10 btn btn-secondary btn-lg btn-block" href="login"
                                    role="button">Login to portal</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>


        </main>


        <script src="{{ asset('assets/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                //date
                var today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth() + 1; //January is 0!

                var yyyy = today.getFullYear();
                if (dd < 10) {
                    dd = '0' + dd;
                }
                if (mm < 10) {
                    mm = '0' + mm;
                }
                var today = yyyy + '-' + mm + '-' + dd;
                $("#reg_date").val(today);
                $(".reg_date").val(today);
                /*enddate*/



                document.getElementById('guardian-detail').style.display = 'block';



            });


            /*Change Field Value on Capital Letter When Keyup*/
            $(function() {
                $('.upper').keyup(function() {
                    this.value = this.value.toUpperCase();
                });
            });
            /*end capital function*/





            function loadSemesters($this) {

                $.ajax({
                    type: 'POST',
                    url: '{{ route('student.find-semester') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        faculty_id: $this.value
                    },
                    success: function(response) {
                        var data = $.parseJSON(response);
                        if (data.error) {
                            $.notify(data.message, "warning");
                        } else {
                            //$('.semester').html('').append('<option value="0">Select Term/Sec</option>');
                            $.each(data.semester, function(key, valueObj) {
                                $('.semester').append('<option value="' + valueObj.id + '">' + valueObj
                                    .semester + '</option>');
                            });
                        }
                    }
                });

            }


            /*copy Father Detail on Guardian Detail*/
            /*guardian_is*/
            function FatherAsGuardian(f) {
                document.getElementById('guardian-detail').style.display = 'block';
                if (f.guardian_is.value == 'father_as_guardian') {
                    f.guardian_first_name.value = f.father_first_name.value;
                    f.guardian_middle_name.value = f.father_middle_name.value;
                    f.guardian_last_name.value = f.father_last_name.value;
                    f.guardian_email.value = f.father_email.value;
                    f.guardian_mobile_1.value = f.father_mobile_1.value;
                    f.guardian_relation.value = "FATHER";
                    f.mother_as_guardian.checked == false;
                    f.other_guardian.checked == false;
                }
            }

            /*copy Mother Detail on Guardian Detail*/
            function MotherAsGuardian(f) {
                document.getElementById('guardian-detail').style.display = 'block';
                if (f.guardian_is.value == 'mother_as_guardian') {
                    f.guardian_first_name.value = f.mother_first_name.value;
                    f.guardian_middle_name.value = f.mother_middle_name.value;
                    f.guardian_email.value = f.father_email.value;
                    f.guardian_mobile_1.value = f.mother_mobile_1.value;
                    f.guardian_last_name.value = f.mother_last_name.value;
                    f.guardian_relation.value = "MOTHER";
                    f.father_as_guardian.checked == false;
                    f.other_guardian.checked == false;
                }
            }

            /*Blank Guardian Detail to Enter New*/
            function OtherGuardian(f) {
                document.getElementById('guardian-detail').style.display = 'block';
                if (f.guardian_is.value == 'other_guardian') {
                    f.guardian_first_name.value = "";
                    f.guardian_middle_name.value = "";
                    f.guardian_last_name.value = "";
                    f.guardian_mobile_1.value = "";
                    f.guardian_relation.value = "";
                    f.father_as_guardian.checked == false;
                    f.mother_as_guardian.checked == false;
                }
            }

            if (!ace.vars['touch']) {
                $('.chosen-select').chosen({
                    allow_single_deselect: true
                });
                //resize the chosen on window resize

                $(window)
                    .off('resize.chosen')
                    .on('resize.chosen', function() {
                        $('.chosen-select').each(function() {
                            var $this = $(this);
                            $this.next().css({
                                'width': $this.parent().width()
                            });
                        })
                    }).trigger('resize.chosen');
                //resize chosen on sidebar collapse/expand
                $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
                    if (event_name != 'sidebar_collapsed') return;
                    $('.chosen-select').each(function() {
                        var $this = $(this);
                        $this.next().css({
                            'width': $this.parent().width()
                        });
                    })
                });
            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <script src="form-validation.js"></script>

        <!-- basic scripts -->
            <!--[if !IE]> -->
            <script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
            {{-- <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script> --}}
            <!-- <![endif]-->

            <!--[if IE]>
            <script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
            <![endif]-->

            <script type="text/javascript">
                if ('ontouchstart' in document.documentElement) document.write(
                    "<script src='{{ asset('assets/js/jquery.mobile.custom.min.js') }}'>" + "<" + "/script>");
            </script>

            <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

            {{-- <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> --}}

            <script src="{{ asset('assets/js/toastr.min.js') }}"></script>



            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
    </div><!-- /.main-container -->

    <!-- page specific plugin scripts -->
    <!-- ace scripts -->
    <script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
    <script src="{{ asset('assets/js/ace.min.js') }}"></script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript"></script>


    {{-- PReloader JS --}}
    <script>
        $(document).ready(function() {
            jQuery('#overlay').fadeOut("fast");



            $('#add-student').click(function() {
                var password = $('input[name="password"]').val();
                var confirmPassword = $('input[name="confirmPassword"]').val();

                if (password != confirmPassword) {
                    toastr.warning('Password & Confirm Password Must be Same.');
                    return false;
                }

            });
        });
    </script>
    @include('student.public-registration.includes.student-comman-script')
    @include('includes.scripts.inputMask_script')
    @include('includes.scripts.datepicker_script')

</body>

</html>

</body>

</html>
