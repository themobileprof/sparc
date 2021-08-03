<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', 'Country Id:') !!}
    <p>{{ $contextEntry->country_id }}</p>
</div>

<!-- Context Id Field -->
<div class="form-group">
    {!! Form::label('context_id', 'Context Id:') !!}
    <p>{{ $contextEntry->context_id }}</p>
</div>

<!-- Year Field -->
<div class="form-group">
    {!! Form::label('year', 'Year:') !!}
    <p>{{ $contextEntry->year }}</p>
</div>

<!-- Content Field -->
<div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    <p>{{ $contextEntry->content }}</p>
</div>

