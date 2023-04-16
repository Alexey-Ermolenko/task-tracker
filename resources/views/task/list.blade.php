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
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('main') }}">{{__('Main')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('company.view', [Session::get('company_id')]) }}">{{__(Session::get('company_name'))}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('projects', [$companyId]) }}">{{__('Projects')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('project.view', [$companyId, $project->id]) }}">{{__($project->name)}}</a></li>
            <li class="breadcrumb-item active">{{__('Task list')}}</li>
        </ol>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <p>tasks list</p>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
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
@endsection
