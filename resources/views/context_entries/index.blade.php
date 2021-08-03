@extends('layouts.app')
@section('title')
    Context Entries 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Context Entries</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('contextEntries.create')}}" class="btn btn-primary form-btn">Context Entry <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('context_entries.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

