<section>
    <header class="d-flex">
        <h2 class="text-lg font-medium text-gray-900">
            {{__('Friends')}}
        </h2>
    </header>

    <div class="mt-6 space-y-6">
            @forelse($friends as $friend)
                <ol class="list-group">
                    <li class="list-group-item">
                        {{__($friend->name)}}
                    </li>
                </ol>
            @empty
                <span>{{__("You have no FRIENDS")}}</span>
            @endforelse
    </div>

    @include('dashboard.partials.search-users')
</section>
