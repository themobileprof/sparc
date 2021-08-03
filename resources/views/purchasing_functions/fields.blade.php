<!-- Country Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_id', 'Country Id:') !!}
	{!! Form::select('country_id', $countries, app('request')->input('country_id'), ['class' => 'form-control','placeholder' => 'Country Name']) !!}
</div>

<!-- Column Field -->
<div class="form-group col-sm-6">
    {!! Form::label('column', 'Column:') !!}
    {!! Form::text('column', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Financial Mgmt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('financial_mgmt', 'Financial Mgmt:') !!}
    {!! Form::text('financial_mgmt', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Benefits Spec Field -->
<div class="form-group col-sm-6">
    {!! Form::label('benefits_spec', 'Benefits Spec:') !!}
    {!! Form::text('benefits_spec', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Contracting Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contracting', 'Contracting:') !!}
    {!! Form::text('contracting', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Provider Payment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('provider_payment', 'Provider Payment:') !!}
    {!! Form::text('provider_payment', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Monitoring Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monitoring', 'Monitoring:') !!}
    {!! Form::text('monitoring', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Notes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('notes', 'Notes:') !!}
    {!! Form::text('notes', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('purchasingFunctions.index') }}" class="btn btn-light">Cancel</a>
</div>
