<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- English Field -->
<div class="form-group col-sm-6">
    {!! Form::label('english', 'English:') !!}
    {!! Form::text('english', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- French Field -->
<div class="form-group col-sm-6">
    {!! Form::label('french', 'French:') !!}
    {!! Form::text('french', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contexts.index') }}" class="btn btn-light">Cancel</a>
</div>
