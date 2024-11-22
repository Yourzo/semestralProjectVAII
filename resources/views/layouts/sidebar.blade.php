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
                            <img src="{{asset('media/noPFP.png')}}" alt="pfp" width="30" height="30" class="rounded-circle">
                            <span class="d-none d-sm-inline">Mike Oxlong</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-1">
                            <img src="{{asset('media/noPFP.png')}}" alt="pfp" width="30" height="30" class="rounded-circle">
                            <span class="d-none d-sm-inline">Phil McCracken</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-1">
                            <img src="{{asset('media/noPFP.png')}}" alt="pfp" width="30" height="30" class="rounded-circle">
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
        <!-- User mini menu -->
        @include('layouts.profiledrop')
    </div>
</div>
