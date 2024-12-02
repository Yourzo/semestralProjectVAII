<x-app-layout>
    <div class="d-flex justify-content-center m-4" >
        <h1>
            <span>
                Your desks {{auth()->user()->name}}
            </span>
        </h1>
    </div>
    <div class="d-flex justify-content-center">
        <div class="border border-dark rounded-2 p-4">
            <ol class="list-unstyled list-group list-group-flush">
                @foreach($desks as $desk)
                    <li class="d-flex justify-content-between mt-1 border border-dark rounded p-3 list-group-item">
                        <a href="{{route('desk.show', ['desk' => $desk->id])}}" class="link btn pr-1">
                            <span>{{$desk->name}}</span>
                        </a>
                        <div class="d-flex align-items-center gap-3">
                            <a href="{{route('desk.edit', ['desk' => $desk->id])}}" class="link btn p-0">
                                <i class="fs-4 bi-pencil-fill"></i>
                            </a>
                            <form method="POST" action="{{route('desk.destroy', ['desk' => $desk->id])}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="link btn p-0" onclick="return confirm('Are you sure?')">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </form>
                        </div>
                    </li>
              @endforeach
            </ol>
        </div>
    </div>
</x-app-layout>
