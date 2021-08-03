@extends('layouts.app')
@section('title')
    Country Details 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>Country Details</h1>
        <div class="section-header-breadcrumb">
			<a href="{{ route('countrySponsors.create',['country_id' => $country->id]) }}"  class="btn btn-primary mr-2">Sponsor <i class="fa fa-plus fa-lg"></i></a>
            <a href="{{ route('countries.index') }}"
                 class="btn btn-primary form-btn float-right">Back</a>
        </div>
      </div>
   @include('stisla-templates::common.errors')
    <div class="section-body">
           <div class="card">
            <div class="card-body">
                    @include('countries.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection
