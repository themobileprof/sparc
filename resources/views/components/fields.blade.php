<!-- Component Field -->
<div class="form-group col-sm-6">
    {!! Form::label('component', 'Component:') !!}
    {!! Form::text('component', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Headerenglish Field -->
<div class="form-group col-sm-6">
    {!! Form::label('headerEnglish', 'Headerenglish:') !!}
    {!! Form::text('headerEnglish', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Headerfrench Field -->
<div class="form-group col-sm-6">
    {!! Form::label('headerFrench', 'Headerfrench:') !!}
    {!! Form::text('headerFrench', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('components.index') }}" class="btn btn-light">Cancel</a>
</div>
