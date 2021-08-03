@extends('layouts.app')
@section('title')
    Purchasing Functions 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Purchasing Functions</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('purchasingFunctions.create')}}" class="btn btn-primary form-btn">Purchasing Function <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('purchasing_functions.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

