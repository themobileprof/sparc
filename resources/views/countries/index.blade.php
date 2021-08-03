@extends('layouts.app')
@section('title')
    Countries 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Countries</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('countries.create')}}" class="btn btn-primary form-btn">Country <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('countries.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

