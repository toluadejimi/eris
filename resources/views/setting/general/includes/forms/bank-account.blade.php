<div class="form-group">
    {!! Form::label('bank_account_details', 'School Bank Account Details', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('bank_account_details', null, ['class' => 'form-control border-form', 'rows' => 8, 'placeholder' => 'e.g. Bank Name: XXX Bank Ltd' . "\n" . 'Account Name: School Name' . "\n" . 'Account Number: 1234567890' . "\n" . 'Sort Code: 12-34-56']) !!}
        <p class="help-block text-muted">This will be shown to parents/students when exam result access is disabled (fee payment required).</p>
        @include('includes.form_fields_validation_message', ['name' => 'bank_account_details'])
    </div>
</div>
