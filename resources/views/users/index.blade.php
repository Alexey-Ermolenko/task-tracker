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
            <p>company</p>
            @if(isset($array['company']) && !empty($array['company']))
                <p>{{$array['company']->name}}</p>
            @endif

            <p>project</p>
            @if(isset($array['project']) && !empty($array['project']))
                <p>{{$array['project']->name}}</p>
            @endif

            <p>task</p>
            @if(isset($array['task']) && !empty($array['task']))
                <p>{{$array['task']->name}}</p>
            @endif

            <p>---------------</p>
            <p>users</p>
            @if(isset($array['users']) && !empty($array['users']))
                @foreach($array['users'] as $user)
                    <p>{{$user->id}} - {{$user->name}} - {{$user->avatar}}</p>
                @endforeach
            @endif
        </div>
    </div>
@endsection
