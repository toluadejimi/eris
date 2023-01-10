<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="icon" href="https://editor.bragndrop.com/assets/images/icons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="https://editor.bragndrop.com/assets/images/icons/favicon-16x16.png" type="image/png"
        sizes="16x16">
    <link rel="icon" href="https://editor.bragndrop.com/assets/images/icons/favicon-32x32.png" type="image/png"
        sizes="32x32">
    <link rel="icon" href="https://editor.bragndrop.com/assets/images/icons/favicon-96x96.png" type="image/png"
        sizes="96x96">
    <link rel="icon" href="https://editor.bragndrop.com/assets/images/icons/favicon-192x192.png" type="image/png"
        sizes="192x192">
    <meta name="theme-color" content="#cccccc" />
    <link rel='manifest'
        href='data:application/manifest+json,{"name":"A%20BragnDrop%20App","background_color":"%23ffffff","theme_color":"%23cccccc","icons":[{"src":"https://editor.bragndrop.com/assets/images/icons/android-chrome-36x36.png","type":"image/png","sizes":"36x36"},{"src":"https://editor.bragndrop.com/assets/images/icons/android-chrome-48x48.png","type":"image/png","sizes":"48x48"},{"src":"https://editor.bragndrop.com/assets/images/icons/android-chrome-72x72.png","type":"image/png","sizes":"72x72"},{"src":"https://editor.bragndrop.com/assets/images/icons/android-chrome-96x96.png","type":"image/png","sizes":"96x96"},{"src":"https://editor.bragndrop.com/assets/images/icons/android-chrome-144x144.png","type":"image/png","sizes":"144x144"},{"src":"https://editor.bragndrop.com/assets/images/icons/android-chrome-192x192.png","type":"image/png","sizes":"192x192"},{"src":"https://editor.bragndrop.com/assets/images/icons/android-chrome-256x256.png","type":"image/png","sizes":"256x256"},{"src":"https://editor.bragndrop.com/assets/images/icons/android-chrome-384x384.png","type":"image/png","sizes":"384x384"},{"src":"https://editor.bragndrop.com/assets/images/icons/android-chrome-512x512.png","type":"image/png","sizes":"512x512"}],"display":"standalone","orientation":"any","start_url":"https://-nonreg_bootstrap4.bragndrop.com/","scope":"https://-nonreg_bootstrap4.bragndrop.com/"}'>
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link rel="apple-touch-icon" href="https://editor.bragndrop.com/assets/images/icons/apple-touch-icon.png">
    <link rel="apple-touch-icon" href="https://editor.bragndrop.com/assets/images/icons/apple-touch-icon-57x57.png"
        sizes="57x57">
    <link rel="apple-touch-icon" href="https://editor.bragndrop.com/assets/images/icons/apple-touch-icon-60x60.png"
        sizes="60x60">
    <link rel="apple-touch-icon" href="https://editor.bragndrop.com/assets/images/icons/apple-touch-icon-72x72.png"
        sizes="72x72">
    <link rel="apple-touch-icon" href="https://editor.bragndrop.com/assets/images/icons/apple-touch-icon-76x76.png"
        sizes="76x76">
    <link rel="apple-touch-icon" href="https://editor.bragndrop.com/assets/images/icons/apple-touch-icon-114x114.png"
        sizes="114x114">
    <link rel="apple-touch-icon" href="https://editor.bragndrop.com/assets/images/icons/apple-touch-icon-120x120.png"
        sizes="120x120">
    <link rel="apple-touch-icon" href="https://editor.bragndrop.com/assets/images/icons/apple-touch-icon-144x144.png"
        sizes="144x144">
    <link rel="apple-touch-icon" href="https://editor.bragndrop.com/assets/images/icons/apple-touch-icon-152x152.png"
        sizes="152x152">
    <link rel="apple-touch-icon" href="https://editor.bragndrop.com/assets/images/icons/apple-touch-icon-180x180.png"
        sizes="180x180">
    <meta name="msapplication-TileColor" content="#007bff" />
    <meta name="msapplication-square70x70logo"
        content="https://editor.bragndrop.com/assets/images/icons/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo"
        content="https://editor.bragndrop.com/assets/images/icons/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo"
        content="https://editor.bragndrop.com/assets/images/icons/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo"
        content="https://editor.bragndrop.com/assets/images/icons/mstile-310x310.png" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108415987-1"></script>
    <script>
        function gtag() {
            dataLayer.push(arguments)
        }
        window.dataLayer = window.dataLayer || [], gtag("js", new Date), gtag("config", "UA-108415987-1");
    </script>
</head>




@if($data['student'] && $data['student']->count() > 0)

@foreach($data['student'] as $student)
<div class="col-sm-12 col-sm-offset-2">

    <body class="mb-5 mr-5 ml-5 mt-0">
        <nav class="navbar navbar-expand-md navbar-light bg-light border mt-5 mb-5 ml-5 mr-5"><a href="#"
                class="navbar-brand">EMERALD ROYAL INTERNATIONAL SCHOOL&nbsp;</a><button id="button1"
                aria-label="Toggle navigation" aria-expanded="false" aria-controls="bs-navbar-collapse-1"
                data-target="#bs-navbar-collapse-1" data-toggle="collapse" type="button" class="navbar-toggler"><span
                    class="navbar-toggler-icon"></span></button>
            <div id="bs-navbar-collapse-1" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    {{-- <li class="nav-item"><a href="#" class="nav-link active onclick=" window.print();">P</a></li>
                    --}}

                    <a href="#" class="btn btn-primary" onclick="window.print();">
                        <i class="ace-icon fa fa-print bigger-200"></i> Print Exam Report
                    </a>
                </ul>
            </div>
        </nav>



        <div class="container">
            <div class="row">
                <div class="col-md-2 offset-xl- align-self-end">
                    @if(isset($generalSetting->logo))
                    <img class="editable img-responsive"
                        src="{{ asset('images'.DIRECTORY_SEPARATOR.'setting'.DIRECTORY_SEPARATOR.'general'.DIRECTORY_SEPARATOR.$generalSetting->logo) }}"
                        alt="HTML5 Icon" style="width:125px;height:125px;">
                    @endif
                </div>
                <div class="col-md-8 text-center">
                    <h6 class="no-margin-top" style="font-size: 14px">
                        {{isset($generalSetting->salogan)?$generalSetting->salogan:""}}
                    </h6>
                    <h2 class="no-margin-top text-uppercase"
                        style="font-family: 'Bowlby+One+SC'; font-size: 30px; font-weight: 600">
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
                </div>
                <div class="col-md-2 offset-xl-0 align-self-end">
                    @if($student_image != '')
                    <img class="editable img-responsive"
                        src="{{ asset('images'.DIRECTORY_SEPARATOR.$folder_name.DIRECTORY_SEPARATOR.$student_image) }}"
                        alt="HTML5 Icon" style="width:125px;height:125px;">
                    @else
                    <img id="avatar" class="editable img-responsive" alt="image"
                        src="{{ asset('assets/images/avatars/profile-pic.jpg') }}" />
                    @endif
                </div>

            </div>
        </div>


        <br>
        <br>
        <div class="row mt-8">
           
            <div class="col-sm-12 text-center">
                <h3 class="mt-6 text-uppercase" style="font-family: 'Bowlby+One+SC'; font-size: 30px; font-weight: 600">
                    <strong>ACADEMIC DATA</strong>
                </h3>

            </div>

        </div>

        <br>
        <br>

        <div class="space-6"></div>
        @include('print.includes.studentinfo')
        <div class="space-6"></div>

        <br>
        <br>


        <div class="row">
            <table width="100%" class="table table-bordered">
                <thead>

                    <tr class="text-center">
                        <th>SN</th>
                        <th>SUBJECT</th>
                        <th>1ST CA <br>(15 Marks)</th>
                        <th>2ND CA <br>(15 Marks)</th>
                        <th>ASSIGNMENT<br>(4 Marks)</th>
                        <th>CLASS EXERCISE<br> (6 Marks)</th>
                        <th>AFFECTIVE <br>(10 Marks)</th>
                        <th>PSYCHOMOTOR <br>(10 Marks)</th>
                        <th>EXAM <br>(40 MARKS)</th>
                        <th>TOTAL<br> (100 MARKS)</th>
                        <th>REPORT REMARKS</th>


                    </tr>
                </thead>
                <tbody>
                    @if($student->subjects && $student->subjects->count() > 0)
                    @php($i=1)
                    @foreach($student->subjects as $subject)
                    <tr>

                        <td>{{ $i }}</td>
                        {{-- <td>
                            {{ViewHelper::getSubjectCodeById($subject->subjects_id)}}
                        </td>
                        --}}
                        <td>{{ViewHelper::getSubjectById($subject->subjects_id)}}</td>
                        <td class="text-center">{{$subject->ca_test1 ?? 0}}</td>
                        <td class="text-center">{{$subject->ca_test2 ?? 0}}</td>
                        <td class="text-center">{{$subject->assign ?? 0}}</td>
                        <td class="text-center">{{$subject->class_exe ?? 0}}</td>
                        <td class="text-center">{{$subject->affective ?? 0}}</td>
                        <td class="text-center">{{$subject->physc ?? 0}}</td>
                        <td class="text-center">{{$subject->obtain_score_theory ?? 0}}
                        </td>
                        <td class="text-center">{{$subject->total ?? 0}}</td>
                        <td> @if ($subject->total >= 90)
                            EXECELLENT
                            @elseif (($subject->total >= 80 && $subject->total <= 89)) GOOD @elseif(($subject->total >=
                                70
                                && $subject->total<= 79)) VERY GOOD @elseif (($subject->total >= 60 && $subject->total
                                    <= 69)) AVERAGE @elseif (($subject->total <= 50)) FAIL @endif </td>
                                            {{--
                        <td class="text-center">
                            {{ViewHelper::getSubCreditById($subject->subjects_id)}}</td>
                        --}}
                        {{-- <td class="text-center">
                            {{$subject->final_grade?$subject->final_grade:'-'}}</td>
                        --}}
                        {{-- <td>{{$subject->remark?$subject->remark:'-'}}</td> --}}

                    </tr>
                    @php($i++)
                    @endforeach
                    @endif
                </tbody>
                <tfoot>


                    <td colspan="5" class="text-right">AVERAGE MARK : {{$average}}</td>
                    <td colspan="8" class="text-right">TOTAL MARK : {{ $totalmarks }}
                    </td>





                </tfoot>
            </table>
        </div>





        <div class="smaller-100">
            @if ($average < 50) <strong>PRINCIPAL'S COMMENT: | Poor
                Academic
                Perfomance. More Room for Improvment.
                @elseif ($average < 70) <strong>PRINCIPAL'S COMMENT: |
                    Good
                    Academic Perfomance. More Room for Improvment.
                    @else
                    <strong>PRINCIPAL'S COMMENT: | Excellent Academic Perfomance. Keep
                        It Up.
                        @endif
        </div>



        <hr class="">

    <br>
    <br>
    <br>
    <div class="space-32"></div>




    <div class="row text-uppercase">
        <table width="100%">
            <tr>
                <td class="text-left">
                    <strong style="border-top:1px black solid;">HEAD INSTRUCTOR {{
                        \Carbon\Carbon::parse(now())->format('Y-m-d')}} </strong>
                    {{--<br>
                    <strong>Date of Issue : {{
                        \Carbon\Carbon::parse(now())->format('Y-m-d')}}</strong>--}}
                </td>
                <img id="avatar" class="nav-user-photo" alt="" src="{{ asset('assets/images/avatars/stamp.png') }}"
                    width="100px" />


                <td class="text-center"><strong style="border-top:1px black solid;"></strong>
                </td>
                <td class="text-center"><strong style="border-top:1px black solid;"></strong>
                </td>
                <td class="text-right"><strong style="border-top:1px rgb(255, 255, 255) solid;">Date of
                        Result
                        Publication : {{
                        \Carbon\Carbon::parse(now())->format('Y-m-d')}}</strong>
                </td>


            </tr>
        </table>
        <h6 class="text-center center"> </h6>


    </div>

    
    <br>
    <br>
    <div class="row mt-8">
       
        <div class="col-sm-12 text-center">
            <h4 class="mt-6 text-uppercase" style="font-family: 'Bowlby+One+SC'; font-size: 30px; font-weight: 600">
                <strong>NOTE ALL FEES SHOULD BE PAID ON OR BEFORE RESUMPTION</strong>
            </h4>

        </div>

    </div>


</div>
@endforeach
@endif




















<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js').then(function(registration) {
                    if (!navigator.serviceWorker.controller) {
                        return;
                    }
                    var preventDevToolsReloadLoop;
                    navigator.serviceWorker.addEventListener('controllerchange', function(event) {
                        if (preventDevToolsReloadLoop) return;
                        preventDevToolsReloadLoop = true;
                        try {
                            window.parent.postMessage('reload', 'https://editor.bragndrop.com');
                        } catch (e) {}
                    });
                }).catch(function(err) {
                    console.log('Service Worker registration failed: ', err);
                });
            });
        };
</script>
<script>
    $(function() {
            function scrollToPos(elm, offSets) {
                var link = elm.attr('href');
                if (link) {
                    if ($(link).length > 0) {
                        var p = $(link).offset().top - offSets;
                        $('body,html').animate({
                            scrollTop: p
                        }, 700);
                    }
                }
            }

            if ($(".navbar.fixed-top").length > 0) {
                var h = $(".navbar.fixed-top").outerHeight(true);
                $('body').scrollspy({
                    target: '.navbar.fixed-top',
                    offset: h
                });
                $('.navbar.fixed-top .nav-link').click(function(e) {
                    if ($(this).attr("href").substring(0, 1) == "#") {
                        e.preventDefault();
                        scrollToPos($(this), h);
                    }
                });
            } else if ($(".navbar.sticky-top").length > 0) {
                var h = $(".navbar.sticky-top").outerHeight(true);
                $('body').scrollspy({
                    target: '.navbar.sticky-top',
                    offset: h
                });
                $('.navbar.sticky-top .nav-link').click(function(e) {
                    if ($(this).attr("href").substring(0, 1) == "#") {
                        e.preventDefault();
                        scrollToPos($(this), h);
                    }
                });
            } else if ($(".navbar.fixed-bottom").length > 0) {
                var h = $(".navbar.fixed-bottom").outerHeight(true);
                $('body').css("padding-bottom", h);
                $('body').scrollspy({
                    target: '.navbar.fixed-bottom'
                });
                $('.navbar.fixed-bottom .nav-link').click(function(e) {
                    if ($(this).attr("href").substring(0, 1) == "#") {
                        e.preventDefault();
                        scrollToPos($(this), 0);
                    }
                });
            } else if ($(".navbar").length > 0) {
                $('.navbar .nav-link').click(function(e) {
                    if ($(this).attr("href").substring(0, 1) == "#") {
                        e.preventDefault();
                        scrollToPos($(this), 0);
                    }
                });
            }
        });
</script>

</body>

</html>