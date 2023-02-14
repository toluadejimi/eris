<div class="form-group">
    {!! Form::label('reg_no', 'Staff Reg. No.', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('reg_no', null, ["placeholder" => "", "class" => "form-control border-form input-mask-registration","required"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'reg_no'])
    </div>

</div>
<div class="form-group">
    {!! Form::label('subject', 'Subject', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('subject', null, ["placeholder" => "", "class" => "form-control border-form","required"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'subject'])
    </div>
</div>
<div class="form-group">
    {!! Form::label('note', 'Note', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('note', null, ["placeholder" => "", "class" => "form-control border-form", "rows"=>"3"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'note'])
    </div>
</div>
{!! Form::label('in_time', 'In Time', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('in_time', null, ["placeholder" => "", "class" => "form-control border-form", "required"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'in_time'])
    </div>

    {!! Form::label('out_time', 'Out Time', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('out_time', null, ["placeholder" => "", "class" => "form-control border-form"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'out_time'])
    </div>

