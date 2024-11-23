<x-app-layout>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Sidebar -->
            @include('layouts.sidebar')

            <div class="col">
                <div class="d-flex gap-4">
                    <!-- To Do Column -->
                    <div class="desk-columns min-vh-100-custom flex-column">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1 text-center">
                                <span class="text-xl font-semibold">To Do</span>
                            </div>
                        </div>
                        <div class="list-div mt-1">
                            <ul class="list-group list-group-flush draggable-list min-height-drag">
                                <li draggable="true" class="list-group-item desk-tiles">Bring me a horizon</li>
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item desk-tiles"><i class="bi bi-plus-circle"></i></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Doing Column -->
                    <div class="desk-columns min-vh-100-custom flex-column">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-xl font-semibold">Doing</span>
                        </div>
                        <div class="list-div mt-1">
                            <ul class="list-group list-group-flush draggable-list min-height-drag">
                                <li draggable="true" class="list-group-item desk-tiles">Water the plants</li>
                                <li draggable="true" class="list-group-item desk-tiles">Clean the kitchen</li>
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item desk-tiles"><i class="bi bi-plus-circle"></i></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Done Column -->
                    <div class="desk-columns min-vh-100-custom flex-column">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-xl font-semibold">Done</span>
                        </div>
                        <div class="list-div mt-1">
                            <ul class="list-group list-group-flush draggable-list min-height-drag">
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item desk-tiles"><i class="bi bi-plus-circle"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        @vite('resources/js/dragAndDrop.js')
    @endpush
</x-app-layout>
