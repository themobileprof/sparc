@extends('layouts.app')
@section('title')
    Sponsors 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Sponsors</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('sponsors.create')}}" class="btn btn-primary form-btn">Sponsor <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('sponsors.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

