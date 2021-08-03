@extends('layouts.app')
@section('title')
    Contexts 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Contexts</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('contexts.create')}}" class="btn btn-primary form-btn">Context <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('contexts.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

