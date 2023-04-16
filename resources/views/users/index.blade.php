@extends('layouts.main')

@section('title')
    {{__('Workers')}}
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Workers</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('main') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Workers</li>
        </ol>
        <div class="row">
            Список сотрудников доступный только данному пользователю по компании
            <pre>
            <?php
                //TODO:
                var_dump($request);
            ?>
            </pre>
        </div>
    </div>
@endsection
