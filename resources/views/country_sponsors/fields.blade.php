<!-- Country Id Field -->
<div class="form-group col-sm-6">
    {!! Form::select('country_id', $countries, app('request')->input('country_id'), ['class' => 'form-control','placeholder' => 'Select Country']) !!}
</div>

<!-- Sponsor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::select('sponsor_id', $sponsors, app('request')->input('sponsor_id'), ['class' => 'form-control','placeholder' => 'Add Sponsor']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('countrySponsors.index') }}" class="btn btn-light">Cancel</a>
</div>
