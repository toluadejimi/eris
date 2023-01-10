{{-- <div class="col-md-2 align-left">

</div> --}}

{{-- <div class="col-md-2 text-center">
    Anton|Archivo+Black|Josefin+Sans|Poppins|Russo+One|
    <h6 class="no-margin-top" style="font-size: 14px">
        {{isset($generalSetting->salogan)?$generalSetting->salogan:""}}
    </h6>
    <h2 class="no-margin-top text-uppercase" style="font-family: 'Bowlby+One+SC'; font-size: 30px; font-weight: 600">
        <strong>{{isset($generalSetting->institute)?$generalSetting->institute:""}}</strong>
    </h2>
    <h5 class="no-margin-top" style="">
        {{isset($generalSetting->address)?$generalSetting->address:""}},
        {{isset($generalSetting->phone)?$generalSetting->phone:""}}
    </h5>
    <h5 class="no-margin-top" style="font-size: 16px;">
        {{isset($generalSetting->email)?$generalSetting->email:""}},
        {{isset($generalSetting->website)?$generalSetting->website:""}}
    </h5>

</div> --}}
{{-- 
<div class="container text-center">
    <div class="row">

        <div class="flex-md-column">
            @if(isset($generalSetting->logo))
            <img src="{{ asset('images'.DIRECTORY_SEPARATOR.'setting'.DIRECTORY_SEPARATOR.'general'.DIRECTORY_SEPARATOR.$generalSetting->logo) }}"
                width="80px">
            @endif
      


        </div>


        <div class="col-md-2 float-md-end">
            @if($student_image != '')
            <img src="{{ asset('images'.DIRECTORY_SEPARATOR.$folder_name.DIRECTORY_SEPARATOR.$student_image) }}"
                alt="HTML5 Icon" style="width:128px;height:128px;">

            {{-- <img id="avatar" class="editable img-responsive" alt="image"
                src="{{ asset('images'.DIRECTORY_SEPARATOR.$folder_name.DIRECTORY_SEPARATOR.$student_image) }}"
                width="50px" /> --}}
            {{-- @else
            <img id="avatar" class="editable img-responsive" alt="image"
                src="{{ asset('assets/images/avatars/profile-pic.jpg') }}" />
            @endif
        </div>
    </div>
</div> --}}










{{--
<div class="row">
    <div class="col-md-1 align-left">
        @if(isset($generalSetting->logo))
        <img src="{{ asset('images'.DIRECTORY_SEPARATOR.'setting'.DIRECTORY_SEPARATOR.'general'.DIRECTORY_SEPARATOR.$generalSetting->logo) }}"
            width="150px">
        @endif
    </div>
    <div class="col-md-11 text-center">
        <h6 class="no-margin-top" style="font-family: 'Merienda', cursive; font-size: 14px">
            {{isset($generalSetting->salogan)?$generalSetting->salogan:""}}
        </h6>
        <h2 class="no-margin-top" style="font-family: 'Merienda', cursive; font-size: 30px">
            <strong>{{isset($generalSetting->institute)?$generalSetting->institute:""}}</strong>
        </h2>
        <h5 class="no-margin-top" style="font-family: 'Merienda', cursive; font-size: 16px">
            {{isset($generalSetting->address)?$generalSetting->address:""}}
        </h5>
        <h5 class="no-margin-top" style="font-family: 'Merienda', cursive; font-size: 14px">
            {{isset($generalSetting->phone)?$generalSetting->phone:""}},
            {{isset($generalSetting->email)?$generalSetting->email:""}}
        </h5>
        <h5 class="no-margin-top" style="font-family: 'Merienda', cursive; font-size: 14px">
            {{isset($generalSetting->website)?$generalSetting->website:""}}
        </h5>
        --}}
        {{--<h3 class="text-uppercase no-margin-top" style="font-family: 'Merienda', cursive; font-size: 22px">
            REGISTRATION DETAIL</h3>--}}{{--

    </div>
</div>--}}