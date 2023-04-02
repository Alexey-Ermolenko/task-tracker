@extends('layouts.main')

@section('title')
    {{__('Calendar')}}
@endsection

@section('content')

@push('calendar-lib-script')
    <script src="{{ asset('assets/libs/fullcalendar-6.1.5/dist/index.global.js') }}"></script>
    {{--    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>--}}
@endpush
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                themeSystem: 'bootstrap',
                height: 'auto',
                expandRows: true,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                firstDay: 1,
                initialDate: '2023-01-12',
                navLinks: true, // can click day/week names to navigate views
                businessHours: true, // display business hours
                editable: true,
                selectable: true,
                nowIndicator: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: [
                    {
                        title: 'Business Lunch',
                        start: '2023-01-03T13:00:00',
                        constraint: 'businessHours'
                    },
                    {
                        title: 'Meeting',
                        start: '2023-01-13T11:00:00',
                        constraint: 'availableForMeeting', // defined below
                        color: '#257e4a'
                    },
                    {
                        title: 'Conference',
                        start: '2023-01-18',
                        end: '2023-01-20'
                    },
                    {
                        title: 'Party',
                        start: '2023-01-29T20:00:00'
                    },

                    // areas where "Meeting" must be dropped
                    {
                        groupId: 'availableForMeeting',
                        start: '2023-01-11T10:00:00',
                        end: '2023-01-11T16:00:00',
                        display: 'background'
                    },
                    {
                        groupId: 'availableForMeeting',
                        start: '2023-01-13T10:00:00',
                        end: '2023-01-13T16:00:00',
                        display: 'background'
                    },

                    // red areas where no events can be dropped
                    {
                        start: '2023-01-24',
                        end: '2023-01-28',
                        overlap: false,
                        display: 'background',
                        color: '#ff9f89'
                    },
                    {
                        start: '2023-01-06',
                        end: '2023-01-08',
                        overlap: false,
                        display: 'background',
                        color: '#ff9f89'
                    }
                ]
            });

            calendar.render();
        });

        $(document).on("click", "#filter", function() {
            if ($('#my_task').is(":checked")) {
                window.location.href = "{{route('calendar',['my'])}}/" + $("#project").val();
            } else {
                window.location.href = "{{route('calendar',['all'])}}/" + $("#project").val();
            }
        });
    </script>

    <style>
        .fc-header-toolbar {
            padding-top: 1em;
            padding-left: 1em;
            padding-right: 1em;
        }
    </style>

    <div class="container-fluid px-4">
        <h1 class="mt-4">{{ __('Calendar') }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('main') }}">{{__('Main')}}</a></li>
            <li class="breadcrumb-item active">{{__('Calendar')}}</li>
        </ol>

        <div class="page-title">
            <div class="row pb-3">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                    <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white">{{__('Calendar')}}</h5>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 text-right">
                    <div class="form-inline btn-group">
                        <div class="btn-group form-check mb-2 mr-sm-2 btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary {{($task_by == 'my') ? 'active' : ''}}">
                                <input type="checkbox" name="options" id="my_task" autocomplete="off" {{($task_by == 'my') ? 'checked' : ''}}>{{__('See My Task')}}
                            </label>
                        </div>
                        <select class="form-control form-control mb-2 mr-sm-2 w-auto d-inline" name="project" id="project">
                            <option value="">{{__('All Projects')}}</option>
                            @foreach(Auth::user()->projects as $project)
                                <option value="{{$project->id}}" {{ ($project_id == $project->id) ? 'selected' : ''}}>{{ $project->name }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary mb-2" id="filter"><i class="mdi mdi-check"></i>{{__('Apply')}}</button>
                    </div>


                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="calendar" id="calendar" data-toggle="task-calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
