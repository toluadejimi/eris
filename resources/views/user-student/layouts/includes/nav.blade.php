<div id="navbar" class="navbar navbar-default navbar-collapse h-navbar ace-save-state user-student-navbar">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <div class="navbar-header pull-left">

            @php
                use App\Models\Year;
                $current_session = Year::where('status', 1)->first();
                $logoUrl = isset($generalSetting->logo) ? asset('images/setting/general/'.$generalSetting->logo) : null;
            @endphp

            <a href="{{ route('home') }}" class="navbar-brand navbar-brand-with-logo">
                @if($logoUrl)
                    <img src="{{ $logoUrl }}" alt="{{ isset($generalSetting->institute) ? $generalSetting->institute : 'School' }}" class="navbar-logo" onerror="this.style.display='none'; var s=this.nextElementSibling; if(s) s.classList.remove('d-none');">
                    <i class="fa fa-graduation-cap d-none navbar-fallback-icon" aria-hidden="true"></i>
                @else
                    <i class="fa fa-graduation-cap navbar-fallback-icon" aria-hidden="true"></i>
                @endif
                <span class="navbar-brand-text">
                    @if(isset($generalSetting->institute))
                        <span class="navbar-institute">{{ $generalSetting->institute }}</span>
                        <span class="navbar-divider">|</span>
                    @endif
                    <strong class="navbar-session">ERIS IMS · Session {{ $current_session ? $current_session->title : '—' }}</strong>
                </span>
            </a>

            <button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse"
                    data-target=".navbar-buttons,.navbar-menu">
                <span class="sr-only">Toggle user menu</span>
                @if($logoUrl)
                    <img class="nav-user-photo" alt="" src="{{ $logoUrl }}" style="width:36px;height:36px;object-fit:contain;"/>
                @else
                    <i class="fa fa-graduation-cap fa-2x" style="color:var(--eris-primary,#0f766e);"></i>
                @endif
            </button>

            <button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse"
                    data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="navbar-buttons navbar-header pull-right collapse navbar-collapse" role="navigation">
            <ul class="nav ace-nav">
                <li class="light-blue dropdown-modal user-min">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle user-dropdown-btn">
                        @php
                            $avatarSrc = (isset($profileImageSrc) && $profileImageSrc) ? asset($profileImageSrc) : (auth()->user()->profile_image ? asset('images/user/'.auth()->user()->profile_image) : asset('assets/images/avatars/avatar2.png'));
                        @endphp
                        <img id="avatar" class="nav-user-photo" alt="{{ auth()->user()->name ?? 'User' }}"
                             src="{{ $avatarSrc }}"/>
                        <span class="user-info">
                            <small>Welcome,</small>
                            {{ auth()->user()->name ?? 'Student' }}
                        </span>
                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li class="dropdown-user-info">
                            <img class="img-responsive dropdown-avatar" alt="" src="{{ $avatarSrc }}"/>
                            <div class="dropdown-user-name">{{ auth()->user()->name ?? 'Student' }}</div>
                        </li>
                        @if(session('impersonate_from'))
                        <li>
                            <a href="{{ route('user-student.switch-back') }}">
                                <i class="ace-icon fa fa-arrow-left"></i>
                                Switch back to admin
                            </a>
                        </li>
                        <li class="divider"></li>
                        @endif
                        <li>
                            <a href="{{ route('user-student.profile') }}">
                                <i class="ace-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ace-icon fa fa-power-off"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.navbar-container -->
</div>