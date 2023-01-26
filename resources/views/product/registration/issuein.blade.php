@extends('layouts.master')

@section('css')
    <!-- page specific plugin styles -->

    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}" />
    @endsection

@section('content')

    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                @include('layouts.includes.template_setting')

                <div class="page-header">
                    <h1>
                        @include($view_path.'.registration.includes.breadcrumb-primary')
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            Add More Product / Assets
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12 ">
                    @include($view_path.'.includes.buttons')
                    <!-- PAGE CONTENT BEGINS -->


                        {{-- @include('includes.validation_error_messages') --}}


                    

                        


                        <div class="align-right">
                        </div>
                        {!! Form::open(['route' => $base_route.'.issue-in', 'method' => 'POST', 'class' => 'form-horizontal',
                        'id' => 'validation-form', "enctype" => "multipart/form-data"]) !!}


                        <span class="label label-info arrowed-in arrowed-right arrowed responsive">Red mark input field are required. </span>
                        <hr class="hr-16">

                        <div class="form-group">
                            
                            <label class="col-sm-2 control-label">Product / Assets </label>
                            <div class="col-sm-2">
                                {!! Form::select('product_id', $data['product'], null, ['class' => 'form-control chosen-select', "required"]) !!}
                                @include('includes.form_fields_validation_message', ['name' => 'product_id'])
                            </div>


                           
                        </div>

                        @isset($message)
                        <div class="alert alert-success">
                        <strong>{{$message}}</strong>
                        </div>
                        @endif



                        <div class="form-group">
                        
                        </div>


                        


                        <div class="form-group">
                            {!! Form::label('qty_in', 'Quantity IN', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-2">
                                {!! Form::number('qty_in', isset($data['qty_out'])?$data['qty_out']:null, ["class" => "form-control border-form", "required"]) !!}
                                @include('includes.form_fields_validation_message', ['name' => 'qty_in'])
                            </div>

                        </div>

                        <div class="form-group">

                            {!! Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('description', null, ["class" => "form-control border-form", "rows"=>"3"]) !!}
                                @include('includes.form_fields_validation_message', ['name' => 'description'])
                            </div>
                        </div>







                        <div class="clearfix form-actions">
                            <div class="col-md-12 col-xs-12 align-right">
                                <button class="btn" type="reset">
                                    <i class="icon-undo bigger-110"></i>
                                    Reset
                                </button>

                                <button class="btn btn-info" type="submit">
                                    <i class="icon-ok bigger-110"></i>
                                    SAVE ENTRY
                                </button>
                            </div>
                        </div>

                        <div class="hr hr-24"></div>

                        {!! Form::close() !!}

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->


@endsection

@section('js')
    <!-- page specific plugin scripts -->
    @include('includes.scripts.jquery_validation_scripts')
    @include('product.registration.includes.product-comman-script')
    @include('includes.scripts.inputMask_script')
    @include('includes.scripts.datepicker_script')
@endsection

