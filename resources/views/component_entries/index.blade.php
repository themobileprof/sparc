@extends('layouts.app')
@section('title')
    Component Entries 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Component Entries</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('componentEntries.create')}}" class="btn btn-primary form-btn">Component Entry <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('component_entries.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

