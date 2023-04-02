@extends('layouts.main')

@section('title')
    {{__('Projects')}}
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">{{ $project->name }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('main') }}">{{__('Main')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('company.view', [$company->id]) }}">{{__($company->name)}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('projects', [$company->id]) }}">{{__('Projects')}}</a></li>
            <li class="breadcrumb-item active">{{ $project->name }}</li>
        </ol>
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <i class="fas fa-landmark me-1"></i>
                        Main project info
                    </div>
                    <div class="card-body">
                        <div class="mb-3 text-break">
                            <label class="labels">{{ $project->description }}</label>
                        </div>
                        <div class="mb-3">
                            <label class="labels">created_at: {{ $project->created_at }}</label>
                        </div>
                        <div class="mb-3">
                            <label class="labels">updated_at: {{ $project->updated_at }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
