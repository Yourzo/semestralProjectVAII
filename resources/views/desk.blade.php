<x-navbar>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Sidebar -->
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0">
                <div class="d-flex flex-column align-items-baseline align-items-sm-start px-3 pt-2 text-white min-vh-100 bg-dark">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-plus"></i> <span class="ms-1 d-none d-sm-inline">Create new desk</span></a>
                        </li>
                        <li>
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-window-desktop"></i> <span class="ms-1 d-none d-sm-inline">Your Vrello desks</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-1">
                                        <i class="fs-4 bi-archive"></i>
                                        <span class="d-none d-sm-inline">Housework</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-1">
                                        <i class="fs-4 bi-archive"></i>
                                        <span class="d-none d-sm-inline">Toilet cleaning schedule</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Your TEAM in this desk</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-1">
                                        <img src="images/noPFP.jpg" alt="pfp" width="30" height="30" class="rounded-circle">
                                        <span class="d-none d-sm-inline">Mike Oxlong</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-1">
                                        <img src="images/noPFP.jpg" alt="pfp" width="30" height="30" class="rounded-circle">
                                        <span class="d-none d-sm-inline">Phil McCracken</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-1">
                                        <img src="images/noPFP.jpg" alt="pfp" width="30" height="30" class="rounded-circle">
                                        <span class="d-none d-sm-inline">Gene Attel</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-person-add"></i> <span class="ms-1 d-none d-sm-inline">Add users to desk</span></a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="images/noPFP.jpg" alt="pfp" width="30" height="30" class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1">Pro Vrello user</span>
                        </a>
                        <!-- User mini menu -->
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">New desk...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form></li>
                        </ul>
                    </div>
                </div>
            </div>

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
                            <ul class="list-group list-group-flush draggable-list min-height-100">
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
                            <ul class="list-group list-group-flush draggable-list min-height-100">
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
                            <ul class="list-group list-group-flush draggable-list min-height-100">
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
</x-navbar>
