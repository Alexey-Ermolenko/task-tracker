@extends('layouts.main')

@section('title')
    {{__('Projects')}}
@endsection

@php
    $project_role = 'owner';
@endphp

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">{{ 'TASK-123' }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('main') }}">{{__('Main')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('company.view', [Session::get('company_id')]) }}">{{__(Session::get('company_name'))}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('task.list', ['company_id' => Session::get('company_id')]) }}">{{__('Task list')}}</a></li>
            <li class="breadcrumb-item active">TASK-123</li>
        </ol>
        <div class="row">
            <div class="col-xl-9">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        ...
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        ...
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        Activity Log
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
