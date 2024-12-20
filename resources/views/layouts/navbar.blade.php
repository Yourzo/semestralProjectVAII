<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('index')}}">Vrello</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('index')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('desk.index')}}">Desks</a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}" tabindex="-1" aria-disabled="false">Get into VRELLO</a>
                </li>
                @endguest
            </ul>
            @auth
                <div class="nav-item dropdown profile-right">
                    @include('layouts.profiledrop')
                </div>
            @endauth
        </div>
    </div>
</nav>
