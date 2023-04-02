@extends('layouts.main')

@section('title')
    {{__('User Settings')}}
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">{{__('User Settings')}}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('main') }}">{{__('Main')}}</a></li>
            <li class="breadcrumb-item active">{{__('User Settings')}}</li>
        </ol>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <p>User Settings</p>
        </div>
    </div>
@endsection
