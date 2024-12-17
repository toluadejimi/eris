<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Registration</title>

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
                SCHOOL
            </div>
            <div class="text-center" style="font-family: 'futura', normal; font-size: 18px"> Plot 437, Cadastral
                Zone. 08-04, Mpape 2. Jikoko Layout by New Standard Hotel, Abuja. <br> 08111111964, 08111111965 <br>
                info@eris.com.ng
            </div>


            <hr>


            <div class="text-center mt" style="font-family: 'futura', bold; font-size: 22px"> UPDATE
                APPLICATION FOR ADMISSION
            </div>

            <hr>


        </div>




        <div class="row g-5">
            <div class="col-md-7 col-lg-12">
                <form enctype="multipart/form-data" method="POST" action="/update-reg-info">
                    @csrf

                    <h4 class="mb-3">SCHOLAR'S
                        INFORMATION</h4>

                    <div class="row g-3">


                        <div class="col-sm-3">
                            <label for="first_name" class="form-label">Surname</label>
                            <input type="text" class="form-control" name="first_name" placeholder=""
                                   value="{{$student->first_name}}" disabled>
                            <div class="invalid-feedback">
                                Valid Surname name is required.
                            </div>
                        </div>


                        <div class="col-sm-3">
                            <label for="middle_name" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" name="middle_name" placeholder=""
                                   value="{{$student->middle_name}}" disabled>

                        </div>

                        <div class="col-sm-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder=""
                                   value="{{$student->last_name}}" disabled>
                            <div class="invalid-feedback">
                                Valid Last name is required.
                            </div>
                        </div>



                    </div>



                    <hr>
                    <h4 class="mb-3 mt-3">EDUCATION
                        INFORMATION</h4>


                    <div class="row g-3 mt-3">

                        <div class="col-sm-3">
                            <label for="reg_date" class="form-label">Reg Date</label>
                            <input type="text" class="form-control"
                                   placeholder="" value="{{$student->created_at}}" disabled>
                            <div class="invalid-feedback">
                                REG Date is required.
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label for="reg_no" class="form-label">Reg No</label>
                            <input type="text" class="form-control" name="reg_no" placeholder=""
                                   value="{{$student->reg_no}}" disabled>
                            <div class="invalid-feedback">
                                REG NO is required.
                            </div>
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

                        <input name="id" value="{{$student->id}}" hidden>


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


                    <div class="row g-3 mt-3 center">
                        <div class="col-sm-6 center">
                            <button class="w-10 btn btn-success btn-lg btn-block" type="submit">Update
                                Scholar Information
                            </button>
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
        $(document).ready(function () {
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
        $(function () {
            $('.upper').keyup(function () {
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
                success: function (response) {
                    var data = $.parseJSON(response);
                    if (data.error) {
                        $.notify(data.message, "warning");
                    } else {
                        //$('.semester').html('').append('<option value="0">Select Term/Sec</option>');
                        $.each(data.semester, function (key, valueObj) {
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
                .on('resize.chosen', function () {
                    $('.chosen-select').each(function () {
                        var $this = $(this);
                        $this.next().css({
                            'width': $this.parent().width()
                        });
                    })
                }).trigger('resize.chosen');
            //resize chosen on sidebar collapse/expand
            $(document).on('settings.ace.chosen', function (e, event_name, event_val) {
                if (event_name != 'sidebar_collapsed') return;
                $('.chosen-select').each(function () {
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
    $(document).ready(function () {
        jQuery('#overlay').fadeOut("fast");


        $('#add-student').click(function () {
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


