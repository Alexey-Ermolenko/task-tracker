@extends('layouts.main')

@section('title')
    {{__('404')}}
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">404</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">404</li>
        </ol>
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        404 not found company
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
