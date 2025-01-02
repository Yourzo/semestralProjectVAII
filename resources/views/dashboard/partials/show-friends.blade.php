<section>
    <header class="d-flex">
        <h2 class="text-lg font-medium text-gray-900">
            {{__('Friends')}}
        </h2>
    </header>

    <div class="mt-6 space-y-6">
        <ol class="list-group">
            @forelse($friends as $friend)
                <div class="d-flex align-items-center w-100">
                    <form method="post" action="{{route('remove-friend', ['friend' => $friend->id])}}" class="w-100">
                        @csrf
                        @method('POST')
                        <span>{{__($friend->name)}}</span>
                        <button type="submit" class="btn btn-danger add-friend-button float-end" onclick="return confirm('Are you sure?')">Remove</button>
                    </form>
                </div>
            @empty
                <span>{{__("You have no FRIENDS")}}</span>
            @endforelse
        </ol>
    </div>
    @include('dashboard.partials.search-users')
</section>
