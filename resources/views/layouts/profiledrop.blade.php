<div class="dropdown pb-4">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{asset('media/noPFP.png')}}" alt="pfp" width="30" height="30" class="rounded-circle">
        <span class="d-none d-sm-inline mx-1">Pro Vrello user</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li><a class="dropdown-item" href="#">New desk...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="{{route('dashboard')}}">Profile</a></li>
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