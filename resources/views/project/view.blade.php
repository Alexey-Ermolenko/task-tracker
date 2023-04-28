@extends('layouts.main')

@section('title')
    {{__('Projects')}}
@endsection

@php
    $project_role = 'owner';
@endphp

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
                <div class="card shadow mb-4 p-2">
                    <ul class="nav justify-content-end nav-pills">
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{__('Settings')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('task.kanban', [$company->id, $project->id]) }}">{{__('Task Kanban board')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('task.list', [$company->id, $project->id]) }}">{{__('Task list')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <i class="fas fa-landmark me-1"></i>
                        {{__('You are ') .__(ucfirst($project_role))}}
                    </div>
                    <div class="card-body">
                        <div class="text-break">
                            <label class="labels">{{ $project->description }}</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <label class="labels fw-lighter text-muted">{{__('Created at: ') . $project->created_at }}</label>
                        <label class="labels fw-lighter text-muted">{{__('Updated at: ') .  $project->updated_at }}</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h6 class="text-muted mb-1">{{ __('Task Done')  }}</h6>
                                <span class="h4 font-weight-bold mb-0 ">56</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <span class="text-sm text-muted">{{ __('Total Task').' : '. 115 }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="">
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="mb-0">123</h6>
                                    <span class="text-sm text-muted">{{__('Last 7 days task done')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="progress-wrapper mb-3">
                            <small class="progress-label">{{ __('Day Left') }} <span class="text-muted">3</span></small>
                            <div class="progress mt-0 height-3">
                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                            </div>
                        </div>
                        <div class="progress-wrapper">
                            <small class="progress-label">{{__('Open Task')}} <span class="text-muted">4</span></small>
                            <div class="progress mt-0 height-3">
                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                            </div>
                        </div>
                        <div class="progress-wrapper">
                            <small class="progress-label">{{__('Completed Milestone')}} <span class="text-muted">9</span></small>
                            <div class="progress mt-0 height-3">
                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="mb-0">{{__('Members')}}</h6>
                            </div>
                            <div class="col-auto">
                                <div class="actions">
                                    <a href="#" class="btn btn-secondary btn-sm" data-url="#" data-ajax-popup="true" data-size="lg" data-title="{{__('Add Member')}}">
                                        <i class="fas fa-plus"></i>
                                        <span class="d-none d-sm-inline-block">{{__('Add')}}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex border-bottom mb-3">
                            <div class="flex-shrink-0 mb-1">
                                <img class="mr-3 avatar" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Generic placeholder image">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <span class="text-sm text-muted">Owner</span>
                                <br/>
                                <span class="text-sm text-muted">owner@example.com</span>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                                <button class="btn btn-primary btn-sm" type="button"><i class="fas fa-lock"></i></button>
                                <button class="btn btn-danger btn-sm" type="button"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                        <div class="d-flex border-bottom mb-3">
                            <div class="flex-shrink-0 mb-1">
                                <img class="mr-3 avatar" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Generic placeholder image">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <span class="text-sm text-muted">User</span>
                                <br/>
                                <span class="text-sm text-muted">user@example.com</span>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                                <button class="btn btn-primary btn-sm" type="button"><i class="fas fa-lock"></i></button>
                                <button class="btn btn-danger btn-sm" type="button"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="mb-0">{{__('Attachments')}}</h6>
                            </div>
                            <div class="col-auto">
                                <div class="actions">
                                    <a href="#" class="btn btn-secondary btn-sm" data-url="#" data-ajax-popup="true" data-size="lg" data-title="{{__('Add Attachments')}}">
                                        <i class="fas fa-plus"></i>
                                        <span class="d-none d-sm-inline-block">{{__('Add')}}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        ...
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <i class="fas fa-landmark me-1"></i>
                        Activity Log
                    </div>
                    <div class="card-body">
                        ...
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
