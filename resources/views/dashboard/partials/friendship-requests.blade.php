<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{__('Friendship requests')}}
        </h2>
    </header>

    <div class="mt-6 space-y-6">
        @forelse($requests as $request)
            <ol class="list-group">
                <li class="list-group-item">
                    {{__($request->name)}}
                </li>
            </ol>
        @empty
            <span>{{__("TEEEEHEEEE YOU GOT NO FRIEND REQUEST")}}</span>
        @endforelse
    </div>
</section>
