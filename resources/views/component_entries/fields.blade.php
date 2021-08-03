<!-- Country Id Field -->
<div class="form-group col-sm-6">
    {!! Form::select('country_id', $countries, app('request')->input('country_id'), ['class' => 'form-control','placeholder' => 'Select Country']) !!}
</div>

<!-- Component Id Field -->
<div class="form-group col-sm-6">
    {!! Form::select('component_id', $components, app('request')->input('component_id'), ['class' => 'form-control','placeholder' => 'Select a Component']) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-6">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::text('content', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('componentEntries.index') }}" class="btn btn-light">Cancel</a>
</div>
