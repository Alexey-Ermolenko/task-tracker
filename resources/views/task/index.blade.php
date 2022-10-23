@extends('layouts.main')

@section('title')
    {{__('Tasks')}}
@endsection

@section('content')
    <style>
        .kanban-col {
            padding: 0px 3px 0px 3px;
            width: 270px;
        }
        .kanban-col .card-body {
            padding: 5px 5px;
        }
        .card .draggable {
            margin-bottom: 10px;
            cursor: grab;
            height: 65px;
            border: 0px;
        }
        .droppable {
            background-color: #0f5132;
            min-height: 120px;
            margin-bottom: 1rem;
        }
        .dropzone {
            height: 7px;
        }
    </style>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tasks</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('main') }}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Tasks</li>
        </ol>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <p>kanban tasks TODO</p>
        </div>
        <div class="kanban-board row flex-row flex-sm-nowrap py-3">
            <div class="kanban-col col-sm-6 col-md-4 col-xl-3">
                <div class="card bg-light">
                    <div class="card-header">
                        <h6 class="card-title text-uppercase text-truncate py-2">To Do</h6>
                    </div>
                    <div class="card-body">

                        <div class="items border border-light">
                            <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"></div>
                            <div class="card draggable shadow-sm" id="cd0" draggable="true" ondragstart="drag(event)">
                                <div class="card-body p-2">
                                    <p>
                                        This is a description of a item on the board. 1
                                    </p>
                                </div>
                            </div>
                            <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"></div>
                            <div class="card draggable shadow-sm" id="cd1" draggable="true" ondragstart="drag(event)">
                                <div class="card-body p-2">
                                    <p>
                                        This is a description of a item on the board. 2
                                    </p>
                                </div>
                            </div>
                            <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"></div>
                            <div class="card draggable shadow-sm" id="cd2" draggable="true" ondragstart="drag(event)">
                                <div class="card-body p-2">
                                    <p>
                                        This is a description of a item on the board. 3
                                    </p>
                                </div>
                            </div>
                            <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kanban-col col-sm-6 col-md-4 col-xl-3">
                <div class="card bg-light">
                    <div class="card-header">
                        <h6 class="card-title text-uppercase text-truncate py-2">In-progess</h6>
                    </div>
                    <div class="card-body">
                        <div class="items border border-light">
                            <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"></div>
                            <div class="card draggable shadow-sm" id="cd3" draggable="true" ondragstart="drag(event)">
                                <div class="card-body p-2">
                                    <p>
                                        This is a description of a item on the board. 4
                                    </p>
                                </div>
                            </div>
                            <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"></div>
                            <div class="card draggable shadow-sm" id="cd4" draggable="true" ondragstart="drag(event)">
                                <div class="card-body p-2">
                                    <p>
                                        This is a description of a item on the board. 5
                                    </p>
                                </div>
                            </div>
                            <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kanban-col col-sm-6 col-md-4 col-xl-3">
                <div class="card bg-light">
                    <div class="card-header">
                        <h6 class="card-title text-uppercase text-truncate py-2">Review</h6>
                    </div>
                    <div class="card-body">

                        <div class="items border border-light">
                            <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"></div>
                            <div class="card draggable shadow-sm" id="cd5" draggable="true" ondragstart="drag(event)">
                                <div class="card-body p-2">
                                    <p>
                                        This is a description of a item on the board. 6
                                    </p>
                                </div>
                            </div>
                            <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kanban-col col-sm-6 col-md-4 col-xl-3">
                <div class="card bg-light">
                    <div class="card-header">
                        <h6 class="card-title text-uppercase text-truncate py-2">Complete</h6>
                    </div>
                    <div class="card-body">
                        <div class="items border border-light">
                            <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"></div>
                            <div class="card draggable shadow-sm" id="cd6" draggable="true" ondragstart="drag(event)">
                                <div class="card-body p-2">
                                    <p>
                                        This is a description of a item on the board. 7
                                    </p>
                                </div>
                            </div>
                            <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"></div>
                            <div class="card draggable shadow-sm" id="cd7" draggable="true" ondragstart="drag(event)">
                                <div class="card-body p-2">
                                    <p>
                                        This is a description of a item on the board. 8
                                    </p>
                                </div>
                            </div>
                            <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const drag = (event) => {
            event.dataTransfer.setData("text/plain", event.target.id);
        }

        const allowDrop = (ev) => {
            ev.preventDefault();
            if (hasClass(ev.target,"dropzone")) {
                addClass(ev.target,"droppable");
            }
        }

        const clearDrop = (ev) => {
            removeClass(ev.target,"droppable");
        }

        const drop = (event) => {
            event.preventDefault();
            const data = event.dataTransfer.getData("text/plain");
            const element = document.querySelector(`#${data}`);
            try {
                // remove the spacer content from dropzone
                //event.target.removeChild(event.target.firstChild);
                // add the draggable content
                event.target.appendChild(element);
                // remove the dropzone parent
                unwrap(event.target);
            } catch (error) {
                console.warn("can't move the item to the same place")
            }
            updateDropzones();
        }

        const updateDropzones = () => {
            /* after dropping, refresh the drop target areas
              so there is a dropzone after each item
              using jQuery here for simplicity */

            var dz = $('<div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"></div>');

            // delete old dropzones
            $('.dropzone').remove();

            // insert new dropdzone after each item
            dz.insertBefore('.card.draggable');
            dz.insertAfter('.card.draggable');

            // insert new dropzone in any empty swimlanes
            $(".items:not(:has(.card.draggable))").append(dz);
        };

        // helpers
        function hasClass(target, className) {
            return new RegExp('(\\s|^)' + className + '(\\s|$)').test(target.className);
        }

        function addClass(ele,cls) {
            if (!hasClass(ele,cls)) ele.className += " "+cls;
        }

        function removeClass(ele,cls) {
            if (hasClass(ele,cls)) {
                var reg = new RegExp('(\\s|^)'+cls+'(\\s|$)');
                ele.className=ele.className.replace(reg,' ');
            }
        }

        function unwrap(node) {
            node.replaceWith(...node.childNodes);
        }
    </script>
@endsection
