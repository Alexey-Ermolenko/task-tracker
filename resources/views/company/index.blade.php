@extends('layouts.main')

@section('title')
    {{__('Companies')}}
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">{{__('Companies')}}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('main') }}}">{{__('Main')}}</a></li>
            <li class="breadcrumb-item active">{{__('Companies')}}</li>
        </ol>
        @if(isset($userCompanies) && !empty($userCompanies) && count($userCompanies) > 0)
            <div class="row row-cols-1 g-4 mb-4">
                @foreach($userCompanies as $company)
                    <div class="col mt-1">
                        <div class="card shadow mb-3 company__item" data-item="{{ $company->id }}">
                            <div class="d-flex">
                                <div class="flex-shrink-1">
                                    @if(isset($company->image) && !empty($company->image))
                                        <img src="{{ $company->image }}" class="img-fluid rounded-start h-100" alt="...">
                                    @endif
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <div class="card-body">
                                        <h5 class="card-title text-break">{{ $company->name }}</h5>
                                        <p class="card-text text-break">{{ $company->description }}</p>
                                        @if(isset($company->users) && !empty($company->users))
                                            <div class="team">
                                                @foreach($company->users as $user)
                                                    <a href="{{ route('worker.view', [$user->id]) }}" class="team-member" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $user->name }}">
                                                        <img src="{{ $user->avatar }}" class="rounded-circle avatar-xs" alt="" />
                                                    </a>
                                                @endforeach
                                            </div>
                                        @endif
                                        <p class="card-text">
                                            <small class="text-muted">Creator {{ $company?->creator?->name }}</small><br/>
                                            <small class="text-muted">Created {{ $company->created_at }}</small><br/>
                                            <small class="text-muted">Last updated {{ $company->updated_at }}</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="row row-cols-1">
                <div class="col-xl-12 col-lg-12 col-sm-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <h6 class="text-center mb-0">{{__('No companies Found.')}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@once
    @push('company_index_script')
        <script>
            $('.company__item').on('click', function() {
                location.href = '{{ route('company.view', 'numb') }}'.replace('numb', $(this).data('item'));
            });
        </script>
    @endpush
@endonce
