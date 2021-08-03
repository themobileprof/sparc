@extends('layouts.app')
@section('title')
    Context Entry Details 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>Context Entry Details</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('contextEntries.index') }}"
                 class="btn btn-primary form-btn float-right">Back</a>
        </div>
      </div>
   @include('stisla-templates::common.errors')
    <div class="section-body">
           <div class="card">
            <div class="card-body">
                    @include('context_entries.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection
