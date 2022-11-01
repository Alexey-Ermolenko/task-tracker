@extends('layouts.main')

@section('title')
    {{__('Projects')}}
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">{{ $project->name }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('main') }}">{{__('Main')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('project') }}}">Projects</a></li>
            <li class="breadcrumb-item active">{{ $project->name }}</li>
        </ol>
        <div class="row">
            22221312312312312
        </div>
    </div>
@endsection
