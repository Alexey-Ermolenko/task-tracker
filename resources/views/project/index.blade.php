@extends('layouts.main')

@section('title')
    {{__('Projects')}}
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Projects</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('main') }}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Projects</li>
        </ol>
        @if(isset($companyProjects) && !empty($companyProjects) && count($companyProjects) > 0 && isset($userProjects) && !empty($userProjects) && count($userProjects))
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col-xl-3 col-md-6">
                    <div class="card shadow bg-pattern">
                        <div class="card-body">
                            <div class="float-right"><i class="fa fa-archive text-primary h4 ml-3"></i></div>
                            <p class="text-muted mb-0">My total projects <span class="badge bg-secondary">{{ count($userProjects) }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card shadow bg-pattern">
                        <div class="card-body">
                            <div class="float-right"><i class="fa fa-archive text-primary h4 ml-3"></i></div>
                            <p class="text-muted mb-0">Current company total projects <span class="badge bg-secondary">{{ count($companyProjects) }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card shadow bg-pattern">
                        <div class="card-body">
                            <div class="float-right"><i class="fa fa-th text-primary h4 ml-3"></i></div>
                            <p class="text-muted mb-0">Current company completed projects <span class="badge bg-secondary">{{ $companyProjectsCompletedCount }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card shadow bg-pattern">
                        <div class="card-body">
                            <div class="float-right"><i class="fa fa-file text-primary h4 ml-3"></i></div>
                            <p class="text-muted mb-0">Current company pending projects <span class="badge bg-secondary">{{ $companyProjectsPending }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="table-responsive project-list">
                                <table class="table project-table table-centered table-nowrap">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Projects</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Team</th>
                                        <th scope="col">Progress</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($companyProjects as $project)
                                        <tr>
                                            <th scope="row">{{ $project->id }}</th>
                                            <td>
                                                <a href="{{ route('project.view', $project->id) }}">
                                                    {{ $project->name }}
                                                </a>
                                            </td>
                                            <td>{{ $project->created_at }}</td>
                                            <td>
                                                <span class="text-{{ \App\Models\Project::$status_color[$project->status] }} font-12"><i class="mdi mdi-checkbox-blank-circle mr-1"></i> {{ $project->status }}</span>
                                            </td>
                                            <td>
                                                <div class="team">
                                                    <a href="javascript: void(0);" class="team-member" data-toggle="tooltip" data-placement="top" title="" data-original-title="Roger Drake">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="rounded-circle avatar-xs" alt="" />
                                                    </a>

                                                    <a href="javascript: void(0);" class="team-member" data-toggle="tooltip" data-placement="top" title="" data-original-title="Reggie James">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="rounded-circle avatar-xs" alt="" />
                                                    </a>

                                                    <a href="javascript: void(0);" class="team-member" data-toggle="tooltip" data-placement="top" title="" data-original-title="Gerald Mayberry">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar8.png" class="rounded-circle avatar-xs" alt="" />
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0">Progress<span class="float-right">100%</span></p>

                                                <div class="progress mt-2" style="height: 5px;">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="action">
                                                    <a href="#" class="text-success mr-4" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"> <i class="fa fa-pencil h5 m-0"></i></a>
                                                    <a href="#" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Close"> <i class="fa fa-remove h5 m-0"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- end project-list -->

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
        @else
            <div class="row row-cols-1">
                <div class="col-xl-12 col-lg-12 col-sm-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <h6 class="text-center mb-0">{{__('No Projects Found.')}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
