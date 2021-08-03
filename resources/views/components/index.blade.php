@extends('layouts.app')
@section('title')
    Components 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Components</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('components.create')}}" class="btn btn-primary form-btn">Component <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('components.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

