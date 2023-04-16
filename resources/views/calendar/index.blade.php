@extends('layouts.main')

@section('title')
    {{__('Calendar')}}
@endsection

@section('content')

@push('calendar-lib-script')
    <script src="{{ asset('assets/libs/fullcalendar-6.1.5/dist/index.global.js') }}"></script>
    <script src='https://unpkg.com/popper.js/dist/umd/popper.min.js'></script>
    <script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>
    {{--    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>--}}
@endpush
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let today = new Date();
            let year = today.getFullYear();
            let month = (today.getMonth() + 1).toString().padStart(2, '0'); // добавляем ведущий ноль для месяцев до 10
            let day = today.getDate().toString().padStart(2, '0'); // добавляем ведущий ноль для дней до 10
            let currentDate = `${year}-${month}-${day}`;

            let hours = today.getHours().toString().padStart(2, '0'); // добавляем ведущий ноль для часов до 10
            let minutes = today.getMinutes().toString().padStart(2, '0'); // добавляем ведущий ноль для минут до 10
            let seconds = today.getSeconds().toString().padStart(2, '0'); // добавляем ведущий ноль для секунд до 10
            let currentDateTime = `${year}-${month}-${day}T${hours}:${minutes}:${seconds}`;

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
                nowIndicator: true,
                now: currentDateTime, // example 2023-04-13T09:25:00
                initialDate: currentDate, // example 2023-04-13
                navLinks: true, // can click day/week names to navigate views
                businessHours: true, // display business hours
                editable: true,
                selectable: true,
                nowIndicator: true,
                dayMaxEvents: true, // allow "more" link when too many events
                eventDidMount: function(info) {
                    $(info.el).popover({
                        title: info.event.title,
                        placement: 'top',
                        trigger: 'hover',
                        content: info.event.extendedProps.description ?? '',
                        container: 'body'
                    });

                    /*var tooltip = new Tooltip(info.el, {
                        title: info.event.extendedProps.description,
                        placement: 'top',
                        trigger: 'hover',
                        container: 'body'
                    });*/
                },
                eventClick: function(info) {
                    alert('Event: ' + info.event.title);
                    alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                    alert('View: ' + info.view.type);

                    console.log(info.event);
                },
                events: [
                    {
                        title: 'Business Lunch',
                        description: 'description for Business Lunch',
                        start: '2023-01-03T13:00:00',
                        constraint: 'businessHours',
                        color: '#ff0000'
                    },
                    {
                        title: 'Meeting',
                        description: 'description for Meeting',
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
                        description: 'description for party',
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
                        title: 'red areas where no events can be dropped',
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


        /*
        i wish this required CSS was better documented :(
        https://github.com/FezVrasta/popper.js/issues/674
        derived from this CSS on this page: https://popper.js.org/tooltip-examples.html
        */

        .popper,
        .tooltip {
            position: absolute;
            z-index: 9999;
            background: #FFC107;
            color: black;
            width: 150px;
            border-radius: 3px;
            box-shadow: 0 0 2px rgba(0,0,0,0.5);
            padding: 10px;
            text-align: center;
        }
        .style5 .tooltip {
            background: #1E252B;
            color: #FFFFFF;
            max-width: 200px;
            width: auto;
            font-size: .8rem;
            padding: .5em 1em;
        }
        .popper .popper__arrow,
        .tooltip .tooltip-arrow {
            width: 0;
            height: 0;
            border-style: solid;
            position: absolute;
            margin: 5px;
        }

        .tooltip .tooltip-arrow,
        .popper .popper__arrow {
            border-color: #FFC107;
        }
        .style5 .tooltip .tooltip-arrow {
            border-color: #1E252B;
        }
        .popper[x-placement^="top"],
        .tooltip[x-placement^="top"] {
            margin-bottom: 5px;
        }
        .popper[x-placement^="top"] .popper__arrow,
        .tooltip[x-placement^="top"] .tooltip-arrow {
            border-width: 5px 5px 0 5px;
            border-left-color: transparent;
            border-right-color: transparent;
            border-bottom-color: transparent;
            bottom: -5px;
            left: calc(50% - 5px);
            margin-top: 0;
            margin-bottom: 0;
        }
        .popper[x-placement^="bottom"],
        .tooltip[x-placement^="bottom"] {
            margin-top: 5px;
        }
        .tooltip[x-placement^="bottom"] .tooltip-arrow,
        .popper[x-placement^="bottom"] .popper__arrow {
            border-width: 0 5px 5px 5px;
            border-left-color: transparent;
            border-right-color: transparent;
            border-top-color: transparent;
            top: -5px;
            left: calc(50% - 5px);
            margin-top: 0;
            margin-bottom: 0;
        }
        .tooltip[x-placement^="right"],
        .popper[x-placement^="right"] {
            margin-left: 5px;
        }
        .popper[x-placement^="right"] .popper__arrow,
        .tooltip[x-placement^="right"] .tooltip-arrow {
            border-width: 5px 5px 5px 0;
            border-left-color: transparent;
            border-top-color: transparent;
            border-bottom-color: transparent;
            left: -5px;
            top: calc(50% - 5px);
            margin-left: 0;
            margin-right: 0;
        }
        .popper[x-placement^="left"],
        .tooltip[x-placement^="left"] {
            margin-right: 5px;
        }
        .popper[x-placement^="left"] .popper__arrow,
        .tooltip[x-placement^="left"] .tooltip-arrow {
            border-width: 5px 0 5px 5px;
            border-top-color: transparent;
            border-right-color: transparent;
            border-bottom-color: transparent;
            right: -5px;
            top: calc(50% - 5px);
            margin-left: 0;
            margin-right: 0;
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
