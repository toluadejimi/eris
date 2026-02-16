@include('layouts.includes.header')
@section('top-script')

@endsection
    <body class="no-skin">
        {{--<div id="overlay">
            <i class="ace-icon fa fa-spinner fa-spin blue bigger-125"></i>
        </div>--}}
        @include('layouts.includes.nav')
        <div class="main-container ace-save-state" id="main-container">
                <script type="text/javascript">
                    try{ace.settings.loadState('main-container')}catch(e){}
                </script>
               @include('layouts.includes.menu')
                 @yield('content')
                @include('layouts.includes.footer')
                <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse" title="Back to top">
                    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
                </a>
            </div><!-- /.main-container -->

        @yield('js')


        <div id="globalToast"
             style="position: fixed; top: 70px; left: 50%; transform: translateX(-50%);
                    min-width: 340px; max-width: 560px; padding: 16px 24px; border-radius: 12px;
                    color: white; font-size: 15px; display: none; z-index: 999999;
                    box-shadow: 0 8px 32px rgba(0,0,0,0.25); backdrop-filter: blur(8px); pointer-events: auto;">
        </div>


        <script>
            (function() {
                function showToast(type, message) {
                    var toast = document.getElementById("globalToast");
                    if (!toast) return;
                    var msg = (typeof message === 'string') ? message : (message || '');
                    var bg = "#4CAF50", title = "Success!", icon = '<svg width="22" height="22" viewBox="0 0 24 24" fill="white"><path d="M9.5 16.2l-3.7-3.7L4 14.3l5.5 5.5 11-11-1.8-1.8-9.2 9.2z"/></svg>';
                    if (type === "error" || type === "danger") {
                        bg = "#e53935"; title = "Error!"; icon = '<svg width="22" height="22" viewBox="0 0 24 24" fill="white"><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>';
                    } else if (type === "warning") {
                        bg = "#f57c00"; title = "Warning"; icon = '<svg width="22" height="22" viewBox="0 0 24 24" fill="white"><path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/></svg>';
                    }
                    toast.style.background = bg;
                    toast.innerHTML = '<div style="display:flex; align-items:center; gap:10px;"><div>' + icon + '</div><div><strong>' + title + '</strong><br>' + msg + '</div></div>';
                    toast.style.display = "block";
                    toast.style.opacity = "0";
                    toast.style.transition = "opacity 0.4s ease, transform 0.4s ease";
                    setTimeout(function() { toast.style.opacity = "1"; toast.style.transform = "translateX(-50%) translateY(0)"; }, 10);
                    var hideDelay = (type === "warning" || type === "error" || type === "danger") ? 7000 : 4000;
                    setTimeout(function() { toast.style.opacity = "0"; toast.style.transform = "translateX(-50%) translateY(-20px)"; }, hideDelay - 500);
                    setTimeout(function() { toast.style.display = "none"; }, hideDelay);
                }
                function runFlash() {
                    @if(session('success'))
                    showToast("success", {!! json_encode(session('success')) !!});
                    @elseif(session('message_success'))
                    showToast("success", {!! json_encode(session('message_success')) !!});
                    @elseif(session('error'))
                    showToast("error", {!! json_encode(session('error')) !!});
                    @elseif(session('message_danger'))
                    showToast("error", {!! json_encode(session('message_danger')) !!});
                    @elseif(session('message_warning'))
                    showToast("warning", {!! json_encode(session('message_warning')) !!});
                    @elseif(session('alert'))
                    showToast("warning", {!! json_encode(session('alert')) !!});
                    @elseif(session('message'))
                    showToast("warning", {!! json_encode(session('message')) !!});
                    @endif
                }
                if (document.readyState === "loading") {
                    document.addEventListener("DOMContentLoaded", runFlash);
                } else {
                    setTimeout(runFlash, 50);
                }
            })();
        </script>


    </body>
