{{-- Flash messages: Bootstrap alerts as fallback. Global toast in master.blade.php is primary display. --}}

@if (session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="ace-icon fa fa-check"></i> {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="ace-icon fa fa-exclamation-triangle"></i> {{ session('error') }}
    </div>
@endif

@if (session('alert') && !session('message_warning'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="ace-icon fa fa-warning"></i> {{ session('alert') }}
    </div>
@endif

@if (session()->has('message_warning'))

    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <i class="ace-icon fa fa-warning"></i>
        {{ session()->get('message_warning') }}
    </div>

@endif

@if (session()->has('message_success'))

    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <i class="ace-icon fa fa-hand-o-right"></i>
        {{ session()->get('message_success') }}
    </div>

@endif

@if (session()->has('message_danger'))

    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <i class="ace-icon fa fa-hand-o-right"></i>
        {{ session()->get('message_danger') }}
        
    </div>

@endif