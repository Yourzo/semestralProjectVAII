<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{__('Friendship requests')}}
        </h2>
    </header>

    <div class="mt-6 space-y-6">
        <ol class="list-group">
            @forelse($requests as $request)
                <li class="list-group-item">
                    <div class="d-flex align-items-center w-100">
                        <form method="post" action="{{route('accept-request', ['user' => $request->id])}}" class="w-100">
                            @csrf
                            @method('POST')

                            <span>{{__($request->name)}}</span>
                            <div class="float-end">
                                <button type="submit" name="action" value="confirm" class="btn btn-success add-friend-button" onclick="return confirm('Are you sure?')">Confirm</button>
                                <button type="submit" name="action" value="remove" class="btn btn-danger" onclick="return confirm('Are you sure?')">Remove</button>
                            </div>
                        </form>
                    </div>
                </li>
            @empty
                <span>{{__("TEEEEHEEEE YOU GOT NO FRIEND REQUEST")}}</span>
            @endforelse
        </ol>
    </div>
</section>
