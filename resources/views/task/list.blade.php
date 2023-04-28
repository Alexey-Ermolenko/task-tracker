@extends('layouts.main')

@section('title')
    {{__('Tasks')}}
@endsection

@section('content')
{{--    <link href="{{ asset('assets/css/kanban/demos.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('assets/css/kanban/kanban.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/kanban/kanban.js') }}"></script>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Tasks | List</h1>
        <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item"><a href="{{ route('main') }}">{{__('Main')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('company.view', [Session::get('company_id')]) }}">{{__(Session::get('company_name'))}}</a></li>
            <li class="breadcrumb-item active">{{__('Task list')}}</li>
        </ol>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <p>{{__('Task list')}}</p>
        </div>
        <div class="row">
            <pre>
                <?php
                   //var_dump($company);
                   //var_dump($project);
                   //var_dump($task_array);
                ?>
            </pre>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="table-responsive">

                                <table class="table table-sm table-centered table-nowrap table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">
                                            #
                                        </th>
                                        <th scope="col">
                                            Code
                                        </th>
                                        <th scope="col">
                                            Name
                                        </th>
                                        <th scope="col">
                                            Priority
                                        </th>
                                        <th scope="col">
                                            Created by
                                        </th>
                                        <th scope="col">
                                            End date
                                        </th>
                                        <th scope="col">
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td scope="col">
                                        </td>
                                        <td scope="col">
                                            <input class="form-control" id="filter_name" type="text" placeholder="">
                                        </td>
                                        <td scope="col">
                                            <input class="form-control" id="filter_name" type="text" placeholder="">
                                        </td>
                                        <td scope="col">
                                            <input class="form-control" id="filter_priority" type="text" placeholder="">
                                        </td>
                                        <td scope="col">
                                            <input class="form-control" id="filter_created_by" type="text" placeholder="">
                                        </td>
                                        <td scope="col">
                                            <input class="form-control" id="filter_end_date" type="text" placeholder="">
                                        </td>
                                    </tr>
                                    @foreach($task_array as $task)
                                        <tr>
                                            <th scope="row">{{ $task->id }}</th>
                                            <td>
                                                <a href="{{ route('task.view', [$task->code]) }}">{{ $task->code }}</a>
                                            </td>
                                            <td>{{ $task->name }}</td>
                                            <td>{{ $task->priority }}</td>
                                            <td>{{ $task->created_by }}</td>
                                            <td>{{ $task->end_date }}</td>
                                            <td>
                                                ...
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="pt-3">
                                <ul class="pagination justify-content-end mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
