<x-app-layout>
    <x-slot:title>{{$deskName}}</x-slot:title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Sidebar -->
            @include('layouts.sidebar')

            <div class="col">
                @if(isset($noOwner) && $noOwner)
                    <div class="alert alert-warning my-3" role="alert">
                        {{ __("Only owner can change name, descriptions or permissions.") }}
                    </div>
                @endif
                <div class="d-flex gap-4">
                    <input type="hidden" id="hiddenInput" value="{{$deskId}}">
                    <!-- To Do Column -->
                    <div class="desk-columns min-vh-100-custom flex-column" data-desk-id="{{$deskId}}">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1 text-center">
                                <span class="text-xl font-semibold">To Do</span>
                            </div>
                        </div>
                        <div class="list-div mt-1">
                            <ul class="list-group list-group-flush draggable-list min-height-drag" data-column="todo">
                                @foreach($todo as $task)
                                    <li draggable="true" data-task-id="{{$task->id}}" class="list-group-item desk-tiles">
                                        {{$task->name}}
                                        @if($canEdit)
                                            <i class="bi bi-trash3-fill float-end delete-task-btn"></i>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                            @if($canEdit)
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item desk-tiles" data-bs-toggle="modal" data-bs-target="#createTaskModal" data-bs-whatever="todo">
                                        <i class="bi bi-plus-circle"></i>
                                    </li>
                                </ul>
                            @endif

                        </div>
                    </div>

                    <!-- Doing Column -->
                    <div class="desk-columns min-vh-100-custom flex-column" data-desk-id="{{$deskId}}">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-xl font-semibold">Doing</span>
                        </div>
                        <div class="list-div mt-1">
                            <ul class="list-group list-group-flush draggable-list min-height-drag" data-column="doing">
                                @foreach($doing as $task)
                                    <li draggable="true" data-task-id="{{$task->id}}" class="list-group-item desk-tiles">
                                        {{$task->name}}
                                        @if($canEdit)
                                            <i class="bi bi-trash3-fill float-end delete-task-btn"></i>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                            @if($canEdit)
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item desk-tiles" data-bs-toggle="modal" data-bs-target="#createTaskModal" data-bs-whatever="doing">
                                        <i class="bi bi-plus-circle"></i>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>

                    <!-- Done Column -->
                    <div class="desk-columns min-vh-100-custom flex-column" data-desk-id="{{$deskId}}">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-xl font-semibold">Done</span>
                        </div>
                        <div class="list-div mt-1">
                            <ul class="list-group list-group-flush draggable-list min-height-drag" data-column="done" >
                                @foreach($done as $task)
                                    <li draggable="true" data-task-id="{{$task->id}}" class="list-group-item desk-tiles">
                                        {{$task->name}}
                                        @if($canEdit)
                                            <i class="bi bi-trash3-fill float-end delete-task-btn"></i>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                            @if($canEdit)
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item desk-tiles" data-bs-toggle="modal" data-bs-target="#createTaskModal" data-bs-whatever="done">
                                        <i class="bi bi-plus-circle"></i>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($canEdit)
        @push('scripts')
            @vite('resources/js/dragAndDrop.js')
            @vite('resources/js/createTask.js')
            @vite('resources/js/deleteTask.js')
        @endpush
        @include('modals.create-task')
    @endif
</x-app-layout>
