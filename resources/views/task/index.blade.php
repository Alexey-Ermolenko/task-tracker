@extends('layouts.main')

@section('title')
    {{__('Tasks')}}
@endsection

@section('content')
{{--    <link href="{{ asset('assets/css/kanban/demos.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('assets/css/kanban/kanban.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/kanban/kanban.js') }}"></script>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Tasks</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('main') }}">{{__('Main')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('company.view', [Session::get('company_id')]) }}">{{__(Session::get('company_name'))}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('projects', [$companyId]) }}">{{__('Projects')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('project.view', [$companyId, $project->id]) }}">{{__('1111')}}</a></li>
            <li class="breadcrumb-item active">{{__('Tasks')}}</li>
        </ol>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <p>kanban tasks TODO</p>
        </div>
        <div class="kanban-board row flex-row flex-sm-nowrap py-3">
            <div class="g-wrap">
                <div id="toolbar"></div>
                <div id="root"></div>
            </div>
        </div>
    </div>
    <script>
        function getData() {
            const users = [
                {
                    id: 1,
                    label: "Steve Smith",
                    avatar: "https://via.placeholder.com/30/0000FF",
                    //avatar: "../assets/user.jpg",
                },
                {
                    id: 2,
                    label: "Aaron Long",
                    avatar: "https://via.placeholder.com/30/FF0000",
                },
                {
                    id: 3,
                    label: "Angela Allen",
                    avatar: "https://via.placeholder.com/30/00FF00",
                },
                {
                    id: 4,
                    label: "Angela Long",
                    avatar: "https://via.placeholder.com/30/F0F0F0",
                },
            ];

            const cardShape = {
                label: true,
                description: true,
                progress: true,
                start_date: true,
                end_date: true,
                users: {
                    show: true,
                    values: users,
                },
                priority: {
                    show: true,
                    values: [
                        { id: 1, color: "#FF5252", label: "high" },
                        { id: 2, color: "#FFC975", label: "medium" },
                        { id: 3, color: "#65D3B3", label: "low" },
                        { id: 3, color: "#65D3B3", label: "test" },
                    ],
                },
                color: true,
                menu: true,
                cover: true,
                attached: false,
            };

            const editorShape = [
                {
                    type: "multiselect",
                    key: "users",
                    label: "Users",
                    options: users,
                },
            ];

            const columns = [
                {
                    label: "Backlog",
                    id: "backlog",
                },
                {
                    label: "In progress",
                    id: "inprogress",
                },
                {
                    label: "Testing",
                    id: "testing",
                },
                {
                    label: "Done",
                    id: "done",
                },
            ];

            const rows = [
                {
                    label: "Feature",
                    id: "feature",
                },
                {
                    label: "Task",
                    id: "task",
                },
            ];

            const cards = [
                {
                    id: 1,
                    label: "Integration with Angular/React",
                    priority: 1,
                    color: "#65D3B3",
                    start_date: new Date("01/07/2021"),
                    users: [3, 2],
                    column: "backlog",
                    type: "feature",
                },
                {
                    label: "Archive the cards/boards ",
                    priority: 3,
                    color: "#58C3FE",
                    users: [4],
                    progress: 1,
                    column: "backlog",
                    type: "feature",
                },
                {
                    label: "Searching and filtering",
                    priority: 1,
                    color: "#58C3FE",
                    start_date: new Date("01/09/2021"),
                    users: [3, 1],
                    progress: 1,
                    column: "backlog",
                    type: "task",
                },
                {
                    label: "Set the tasks priorities",
                    color: "#FFC975",
                    start_date: new Date("12/21/2020"),
                    users: [4],
                    progress: 75,
                    column: "inprogress",
                    type: "feature",
                    attached: [
                        {
                            isCover: true,
                            coverURL: "https://via.placeholder.com/630x360.png",    //  coverURL: "../assets/img-1.jpg",
                            previewURL: "https://via.placeholder.com/630x360.png",  //  previewURL: "../assets/img-1.jpg",
                            url: "https://via.placeholder.com/630x360.png",         //  url: "../assets/img-1.jpg",
                            name: "630x360.png",
                        },
                    ],
                },
                {
                    label: "Custom icons",
                    color: "#65D3B3",
                    start_date: new Date("01/07/2021"),
                    users: [3, 2],
                    column: "inprogress",
                    type: "task",
                },
                {
                    label: "Integration with Gantt",
                    color: "#FFC975",
                    start_date: new Date("12/21/2020"),
                    users: [4],
                    progress: 75,
                    column: "inprogress",
                    type: "task",
                },
                {
                    label: "Drag and drop",
                    priority: 1,
                    color: "#58C3FE",
                    users: [3, 1],
                    progress: 100,
                    column: "testing",
                    type: "feature",
                },
                {
                    label: "Adding images",
                    color: "#58C3FE",
                    users: [4],
                    column: "testing",
                    type: "task",
                    attached: [
                        {
                            isCover: true,
                            coverURL: "https://via.placeholder.com/630x360.png",
                            previewURL: "https://via.placeholder.com/630x360.png",
                            url: "https://via.placeholder.com/630x360.png",
                            name: "img-2.jpg",
                        },
                    ],
                },
                {
                    label: "Create cards and lists from the UI and from code",
                    priority: 3,
                    color: "#65D3B3",
                    start_date: new Date("01/07/2021"),
                    users: [3, 2],
                    column: "done",
                    type: "feature",
                },
                {
                    id: 5,
                    label: "Draw swimlanes",
                    color: "#FFC975",
                    users: [2],
                    column: "done",
                    type: "feature",
                },
                {
                    label: "Progress bar",
                    priority: 1,
                    color: "#FFC975",
                    start_date: new Date("12/9/2020"),
                    users: [1, 4, 3],
                    progress: 100,
                    column: "done",
                    type: "task",
                },
            ];

            return {
                rows,
                columns,
                cards,
                users,
                cardShape,
                editorShape,
            };
        }
        const { Kanban, Toolbar, defaultEditorShape } = kanban;
        const { columns, cards, rows, users, cardShape, editorShape } = getData();

        const board = new Kanban("#root", {
            columns,
            cards,
            rows,
            rowKey: "type",
            cardShape,
            editorShape: [...defaultEditorShape, ...editorShape],
        });
        new Toolbar("#toolbar", {
            api: board.api,
        });
    </script>
@endsection
