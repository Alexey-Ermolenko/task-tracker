@extends('layouts.main')

@section('title')
    {{__('Admin Settings')}}
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">{{__('Admin Settings')}}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('main') }}">{{__('Main')}}</a></li>
            <li class="breadcrumb-item active">{{__('Admin Settings')}}</li>
        </ol>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <p>Admin Settings</p>
        </div>
    </div>
@endsection
