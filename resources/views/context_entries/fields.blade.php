<!-- Country Id Field -->
<div class="form-group col-sm-6">
	{!! Form::select('country_id', $countries, app('request')->input('country_id'), ['class' => 'form-control','placeholder' => 'Country Name']) !!}
</div>

<!-- Context Id Field -->
<div class="form-group col-sm-6">
	{!! Form::select('context_id', $contexts, app('request')->input('context_id'), ['class' => 'form-control','placeholder' => 'Select a Context']) !!}
</div>

<!-- Year Field -->
<div class="form-group col-sm-6">
    {!! Form::label('year', 'Year:') !!}
    {!! Form::text('year', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-6">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::text('content', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contextEntries.index') }}" class="btn btn-light">Cancel</a>
</div>
