<!-- Cc Field -->
<div class="form-group">
    {!! Form::label('cc', 'Cc:') !!}
    <p>{{ $country->cc }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $country->name }}</p>
</div>

<!-- Language Field -->
<div class="form-group">
    {!! Form::label('language', 'Language:') !!}
    <p>{{ $country->language }}</p>
</div>

<!-- Flag Field -->
<div class="form-group">
    {!! Form::label('flag', 'Flag:') !!}
    <p><img src='{{ asset("img/flags/$country->flag") }}' style='width: 50px;'></p>
</div>

<!-- Notes Field -->
<div class="form-group">
    {!! Form::label('notes', 'Notes:') !!}
    <p>{{ $country->notes }}</p>
</div>

<!-- External Img Field -->
<div class="form-group">
    {!! Form::label('external_img', 'External Image:') !!}
    <p>{{ $country->external_img }}</p>
</div>


<!-- Sponsor -->
<div class="form-group">
    {!! Form::label('sponsor', 'Sponsor(s):') !!}
	   <a href="{!! route('countrySponsors.create', ['country_id' => $country->id]) !!}" class='btn btn-white action-btn'><i class="fa fa-plus fa-lg"></i></a>
	@foreach ($country->sponsors as $sponsor)
	   {!! Form::open(['route' => ['countrySponsors.destroy', $sponsor->pivot->id], 'method' => 'delete']) !!}
	   <div class='btn-group'>
			<div class="mr-2">{{ $sponsor->name }}</div>
		   <a href="{!! route('countrySponsors.edit', [$sponsor->pivot->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
		   {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
	   </div>
	   {!! Form::close() !!}
	@endforeach
</div>

