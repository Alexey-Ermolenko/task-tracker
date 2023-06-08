@extends('layouts.main')

@section('title')
    {{ $projectTask->code }}
@endsection

@php
    $project_role = 'owner';
@endphp

@section('content')
    <div class="container-fluid px-4">
        <ol class="breadcrumb my-2">
            <li class="breadcrumb-item"><a href="{{ route('main') }}">{{__('Main')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('company.view', [$projectTask->company->id]) }}">{{$projectTask->company->name}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('project.view', [$projectTask->company->id, $projectTask->project->id]) }}">{{ $projectTask->project->name }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('task.list', ['company_id' => $projectTask->company->id]) }}">{{__('Task list')}}</a></li>
            <li class="breadcrumb-item active">{{ $projectTask->code }}</li>
        </ol>
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow mb-1">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <span class="navbar-brand text-uppercase">{{ $projectTask->code }}
                                @if ($projectTask->is_complete)
                                    <span class="badge bg-secondary">Завершена</span>
                                @endif
                            </span>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarScroll">
                                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                                    <li class="nav-item">
                                        <a class="btn btn-link me-md-2 btn-sm" href="{{ route('company.view', [$projectTask->company->id]) }}" role="button">
                                            Компания
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn btn-link me-md-2 btn-sm" href="{{ route('project.view', [$projectTask->company->id, $projectTask->project->id]) }}" role="button">
                                            Проект
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn btn-link me-md-2 btn-sm" href="{{ route('task.kanban', [$projectTask->company->id, $projectTask->project->id]) }}" role="button">
                                            Kanban
                                        </a>
                                    </li>
                                </ul>
                                <form class="d-flex">
                                    @if ($projectStageList)
                                        <span class="navbar-text me-1">Статус задачи</span>
                                        <select class="form-select form-select-sm me-md-2" style="width: 190px;">
                                            @foreach($projectStageList as $projectStage)
                                                <option value="{{ $projectStage['id'] }}" {{ ($projectStage['id'] === $projectTask->stage_id ? 'selected="true"':'selected="false"') }}>
                                                    {{ $projectStage['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif

                                    <a class="btn btn-danger btn-sm" href="#" role="button">Удалить задачу</a>
                                </form>
                            </div>
                        </div>
                    </nav>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-9">
                <div class="card shadow mb-1">
                    <div class="card-body">
                        <h5>Подробности запроса</h5>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" value="{{ $projectTask->name }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Приоритет {{ $projectTask->priority_color }}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" value="{{ $projectTask->priority }}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Проект</h6>
                            </div>
                            <div class="col-sm-9">
                                <p>{{ $projectTask->project->name }}</p>
                            </div>
                        </div>
                        @if ($projectTask->progress)
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Progress</h6>
                            </div>
                            <div class="col-sm-9">
                                <label for="task_progress" id="task_progress_label"></label>
                                <input type="range" style="width: 100%" id="task_progress" name="task_progress" min="0" max="100" step="20" value="{{ $projectTask->progress }}">
                            </div>
                        </div>
                        @endif
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Нравится</h6>
                            </div>
                            <div class="col-sm-9">
                                <a tabindex="0" class="btn {{ array_search($authUser->id, json_decode($projectTask->likes), true) === false ? 'btn-outline-primary' : 'btn-primary' }}" role="button"
                                   id="likeButton"
                                   title="Users who liked"
                                   data-bs-html="true"
                                   data-bs-toggle="popover"
                                   data-bs-trigger="focus"
                                   data-bs-placement="right"
                                   data-bs-content='
                                   <div>
                                        <div class="team">
                                        @if ($projectTask->likes_users() !== null && !empty($projectTask->likes_users()))
                                            @foreach($projectTask->likes_users() as $likes_user)
                                                <a href="{{ route('worker.view', [$likes_user->id]) }}"
                                                    class="team-member"
                                                    data-bs-content="{{ $likes_user->name }}">
                                                    <img src="{{ $likes_user->avatar}}" class="rounded-circle avatar-xs" alt="{{ $likes_user->name }}" />
                                                </a>
                                            @endforeach
                                        @else
                                            ...
                                        @endif
                                       </div>
                                    </div>
                                '>
                                    <i class="fa-regular fa-thumbs-up" id="like-btn-icon"></i>
                                    <span class="badge bg-secondary"
                                          id="like-count-span"
                                          data-user-likes="{{ json_encode($projectTask->likes_users(), JSON_UNESCAPED_UNICODE) }}"
                                          data-user="{{ json_encode($authUser, JSON_UNESCAPED_UNICODE) }}"
                                          data-task="{{ json_encode($projectTask, JSON_UNESCAPED_UNICODE) }}"
                                    >
                                        {{ count($projectTask->likes_users()) }}
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card shadow mb-1">
                    <div class="card-body">
                        <h5>Люди</h5>
                        <div class="row mb-1">
                            <div class="col-sm-12">
                                Наблюдатели:
                                @if ($projectTask->users() !== null && !empty($projectTask->users()))
                                    @foreach($projectTask->users() as $follower)
                                        {{ $follower->name . ', '}}
                                    @endforeach
                                @else
                                    ...
                                @endif
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-sm-12">
                                Назначено: {{ $projectTask->assign->name }}
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-sm-12">
                                Кем создано: {{ $projectTask->creator->name }}</br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-1">
                    <div class="card-body">
                        <h5>Даты</h5>
                        <div class="row mb-0">
                            <div class="col-sm-6">
                                <h6 class="mb-0">Дата начала работ:</h6>
                            </div>
                            <div class="col-sm-6">
                                <input id="start_date" name="start_date" class="form-control" type="date" value="{{ $projectTask->start_date }}"/>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-sm-6">
                                <h6 class="mb-0">Срок:</h6>
                            </div>
                            <div class="col-sm-6">
                                <input id="end_date" name="start_date" class="form-control" type="date" value="{{ $projectTask->end_date }}"/>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-sm-6">
                                <h6 class="mb-0">Создан:</h6>
                            </div>
                            <div class="col-sm-6">
                                <p>{{ $projectTask->created_at }}</p>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-sm-6">
                                <h6 class="mb-0">Обновлен:</h6>
                            </div>
                            <div class="col-sm-6">
                                <p>{{ $projectTask->updated_at }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-9">
                <div class="card shadow mb-1">
                    <div class="card-body">
                        <h5>Описание</h5>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $projectTask->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-1">
                    <div class="card-body">
                        <h5>Вложения файлов</h5>
                        @if(isset($projectTask->taskFiles) && !empty($projectTask->taskFiles))
                            <div>
                                @foreach($projectTask->taskFiles as $taskFile)
                                    <a href="{{ asset('storage/' . $taskFile->file) }}">{{ $taskFile->file_name }}</a>
                                @endforeach
                            </div>
                        @else
                            ...
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card shadow mb-1">
                    <div class="card-body">
                        <h5>Activity Log</h5>
                        @if (isset($projectTask->activity_log))
                            <div class="scrollbar-inner">
                                <ul class="timeline">
                                    @foreach($projectTask->activity_log as $activity)
                                    <li>
                                        <a target="_blank" href="#">{{ __($activity->log_type) }}</a>
                                        <a href="#" class="float-right">
                                            <i class="fas {{$activity->logIcon($activity->log_type)}}"></i>
                                        </a>
                                        <p class="text-muted text-sm mb-0">{!! $activity->getRemark() !!}</p>
                                        <small>
                                            <i class="fas fa-clock me-1"></i>{{$activity->created_at->diffForHumans()}}
                                        </small>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            ...
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow mb-1">
                    <div class="card-body">
                        <h5>Комментарии</h5>
                        <div class="mt-3 d-flex flex-row align-items-center p-3 form-color">
                            <img src="{{ $projectTask->creator->avatar }}" width="50" class="rounded-circle me-2">
                            <input type="text" class="form-control" placeholder="Enter your comment...">
                            <button type="button" class="btn btn-primary">
                                <i class="fa-solid fa-paper-plane"></i>
                            </button>
                        </div>
                        <div class="container-fluid mb-5">
                            @if(isset($projectTask->comments) && !empty($projectTask->comments))
                                @foreach($projectTask->comments as $comment)
                                    <div class="d-flex flex-row py-0 px-3">
                                        <img src="{{ $comment->user->avatar }}" width="40" height="40" class="rounded-circle me-3">
                                        <div class="w-100">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex flex-row align-items-center">
                                                    <span class="me-2">{{ $comment->user->name }}</span>
                                                </div>
                                                <small>{{ $comment->created_at->diffForHumans() }}</small>
                                            </div>
                                            <p class="text-justify comment-text mb-0">{{ $comment->comment }}</p>
                                            <div class="btn-group btn-sm" role="group">
                                                <button type="button" class="btn btn-primary btn-sm comment-edit-btn" data-task-id="{{ $comment->id }}">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm comment-delete-btn" data-task-id="{{ $comment->id }}">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                @endforeach
                            @else
                                ...
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="comment_modal" tabindex="-1" aria-labelledby="comment_modal_label" aria-hidden="true" data-comment-id="">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="comment_modal_label"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <textarea class="form-control" id="comment" style="height: 100px"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var likeButton = document.getElementById('likeButton');
            var popoverInstance;

            likeButton.addEventListener('click', function(event) {
                //event.stopPropagation(); // Остановка всплытия события клика для предотвращения закрытия popover при клике на кнопку "лайк"
                var likeCount = document.querySelector('#likeButton .badge');
                var count = parseInt(likeCount.textContent);

                if (likeButton.classList.contains('btn-outline-primary')) {
                    likeButton.classList.remove('btn-outline-primary');
                    likeButton.classList.add('btn-primary');
                    likeCount.textContent = count + 1;
                    sendLikeData(true);
                } else {
                    likeButton.classList.remove('btn-primary');
                    likeButton.classList.add('btn-outline-primary');
                    likeCount.textContent = count - 1;
                    sendLikeData(false);
                }
            });

            likeButton.addEventListener('mouseenter', function() {
                if (!popoverInstance) {
                    popoverInstance = new bootstrap.Popover(likeButton); // Создание popover
                    popoverInstance.show(); // Показ popover
                    var popoverElement = document.querySelector('.popover');
                    popoverElement.addEventListener('mouseleave', function() {
                        popoverInstance.hide(); // Закрытие popover при уходе мыши с него
                        popoverInstance = null;
                    });
                }
            });

            likeButton.addEventListener('shown.bs.popover', function() {
                popoverInstance = bootstrap.Popover.getInstance(likeButton); // Получение ссылки на popoverInstance
            });

            likeButton.addEventListener('hidden.bs.popover', function() {
                //popoverInstance = null; // Сброс ссылки на popoverInstance при скрытии popover
            });

            var rangeInput = document.getElementById('task_progress');
            var rangeLabel = document.getElementById('task_progress_label');

            function updateRangeLabel() {
                rangeLabel.textContent = rangeInput.value + '%';
            }

            updateRangeLabel();
            rangeInput.addEventListener('input', updateRangeLabel);

            $('#comment_modal')[0].addEventListener('shown.bs.modal', function(event) {
                alert('shown.bs.modal');
            });

            $('.comment-edit-btn').click(function() {
                $('#comment_modal').modal('show');
            });

            $('.comment-delete-btn').click(function() {
                alert('comment-delete-btn');
            });
        });

        function sendLikeData(isLiked) {
            let token = $('meta[name="csrf-token"]').attr('content');
            let userLikes = $('#likeButton .badge').data('userLikes');
            let user = $('#likeButton .badge').data('user');
            let task = $('#likeButton .badge').data('task');
            let countLikes = +$('#likeButton .badge').text();

            let data = {
                _token: token,
                user: user,
                task: task,
                isLiked: isLiked
            };

            $.ajax({
                type: 'POST',
                url: '{{ route('task.likes') }}',
                data: data,
                success: function(data) {
                    console.log('1');
                },
            });
        }
    </script>
@endsection
