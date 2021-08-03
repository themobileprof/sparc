<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $sponsor->name }}</p>
</div>

<!-- Logo Field -->
<div class="form-group">
    <p>
		<img src="{{ asset('storage/'.$sponsor->logo) }}" alt="{{ $sponsor->name }}"> 
		<br>
		{{ $sponsor->logo }}
	</p>
</div>

