@extends('layouts.main')

@section('title')
    {{__('Kanban')}}
@endsection

@section('content')
    <link href="{{ asset('assets/css/kanban/demos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/kanban/kanban.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/kanban/kanban.js') }}"></script>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Tasks | Kanban</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('main') }}">{{__('Main')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('company.view', [Session::get('company_id')]) }}">{{__(Session::get('company_name'))}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('projects', [$companyId]) }}">{{__('Projects')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('project.view', [$companyId, $project->id]) }}">{{__($project->name)}}</a></li>
            <li class="breadcrumb-item active">{{__('Kanban')}}</li>
        </ol>
        <div class="kanban-board card shadow row flex-row flex-sm-nowrap pb-3">
            <div class="g-wrap">
                <div id="toolbar"></div>
                <div id="root"></div>
            </div>
        </div>
    </div>
    <script>
        function getData() {
            const url = "https://docs.dhtmlx.com/kanban-backend";

            const users = [
                {
                    id: 1,
                    label: "Steve Smith",
                    avatar: "https://snippet.dhtmlx.com/codebase/data/kanban/01/img/user-4.jpg",
                    //avatar: "../assets/user.jpg",
                },
                {
                    id: 2,
                    label: "Aaron Long",
                    avatar: "https://snippet.dhtmlx.com/codebase/data/kanban/01/img/user-4.jpg",
                },
                {
                    id: 3,
                    label: "Angela Allen",
                    avatar: "https://snippet.dhtmlx.com/codebase/data/kanban/01/img/user-4.jpg",
                },
                {
                    id: 4,
                    label: "Angela Long",
                    avatar: "https://snippet.dhtmlx.com/codebase/data/kanban/01/img/user-4.jpg",
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
                    ],
                },
                color: true,
                menu: true,
                cover: true,
                attached: true,
                comments: true,
                votes: true,
            };

            const editorShape = [
                {
                    key: "attached",
                    type: "files",
                    label: "Files",
                    uploadURL: url + "/uploads",
                },
                {
                    type: "comments",
                    key: "comments",
                    label: "Comments",
                    config: {
                        placement: "editor",
                    },
                }
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
                    votes: [1],
                    comments:[
                        {
                            id: 1,
                            userId: 1,
                            cardId: 1,
                            text: "I look forward to seeing you at the integration meeting.",
                            date: new Date(),
                        },
                    ]
                },
                {
                    label: "Archive the cards/boards ",
                    priority: 3,
                    color: "#58C3FE",
                    users: [4],
                    progress: 1,
                    column: "backlog",
                    type: "feature",
                    attached: [
                        {
                            isCover: true,
                            coverURL: "https://snippet.dhtmlx.com/codebase/data/kanban/01/img/img-1.jpg",
                            previewURL: "https://snippet.dhtmlx.com/codebase/data/kanban/01/img/img-1.jpg",
                            url: "https://snippet.dhtmlx.com/codebase/data/kanban/01/img/img-1.jpg",
                            name: "img-1.jpg",
                        },
                        {
                            isCover: false,
                            coverURL: "https://snippet.dhtmlx.com/codebase/data/kanban/01/img/img-1.jpg",
                            previewURL: "https://snippet.dhtmlx.com/codebase/data/kanban/01/img/img-1.jpg",
                            url: "https://snippet.dhtmlx.com/codebase/data/kanban/01/img/img-1.jpg",
                            name: "img-1.jpg",
                        },
                    ],
                    comments: [
                        {
                            id: 1,
                            userId: 1,
                            cardId: 1,
                            text: "Greetings, fellow colleagues. I would like to share my insights on this task. I reckon we should deal with at least half of the points in the plan without further delays. ",
                            date: new Date(),
                        },
                        {
                            id: 2,
                            userId: 2,
                            cardId: 1,
                            text: "Hi, Aaron. I am sure that that's exactly what is thought best out there in Dunwall. Let's just do what we are supposed to do to get the result.",
                            date: new Date(),
                        },
                    ],
                    votes: [1, 3, 4],
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
            editorShape: [
                ...defaultEditorShape,
                ...editorShape,
            ],
            currentUser: 1,
        });

        new Toolbar("#toolbar", {
            api: board.api,
        });
    </script>
@endsection
