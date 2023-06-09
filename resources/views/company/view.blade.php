@extends('layouts.main')

@section('title')
    {{__('Companies')}}
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">{{ $company->name }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('main') }}">{{__('Main')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('companies') }}">{{__('Companies')}}</a></li>
            <li class="breadcrumb-item active">{{ $company->name }}</li>
        </ol>
        <div class="row">
            <div class="col-xl-3">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <i class="fa-solid fa-image"></i>
                        Company logo
                    </div>
                    <div class="card-body text-center">
                        <img class="img-company-profile img-thumbnail" src="https://via.placeholder.com/630x360.png" alt="">
                        <div class="small font-italic text-muted mb-4">Company logo</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <i class="fa-solid fa-user"></i>
                        Company statistic
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
                        Main company info
                    </div>
                    <div class="card-body">
                        <div class="mb-3 text-break">
                            <label class="labels">{{ $company->description }}</label>
                        </div>
                        <div class="mb-3">
                            <label class="labels">created_at: {{ $company->created_at }}</label>
                        </div>
                        <div class="mb-3">
                            <label class="labels">updated_at: {{ $company->updated_at }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <i class="fas fa-solid fa-person-digging me-1"></i>
                        Employers
                    </div>
                    <div class="card-body">
                        @if(isset($company->users))
                            <div class="team">
                                @foreach($company->users as $user)
                                    <a href="javascript: void(0);"
                                       class="team-member"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="{{ $user->name }}"
                                       data-original-title="Roger Drake">
                                        <img src="{{ $user->avatar }}" class="rounded-circle avatar-xs" alt="" />
                                    </a>
                                @endforeach
                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <i class="fas fa-exclamation-triangle me-1"></i>
                        Delete Company
                    </div>
                    <div class="card-body">
                        <p>Deleting your company is a permanent action and cannot be undone. If you are sure you want to delete your company, select the button below.</p>
                        <button class="btn btn-outline-danger" type="button">I understand, delete my company</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
