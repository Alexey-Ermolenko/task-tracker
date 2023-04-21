@extends('layouts.main')

@section('title')
    {{__('Workers')}}
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Worker</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('main') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('workers', ['company_id' => Session::get('company_id')]) }}">Workers</a></li>
            <li class="breadcrumb-item active">{{$id}}</li>
        </ol>
        <div class="row">
            <p>{{$id}}</p>
        </div>
    </div>
@endsection
