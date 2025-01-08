<div class="input-group mb-3">
    <span class="input-group-text">Desk name:</span>
    <input maxlength="255" type="text" name="name" class="form-control" aria-label="Desk name:" aria-describedby="basic-addon1" value="{{old('name', isset($desk) ? $desk->name : '')}}" required>
</div>

<div class="input-group mb-2">
    <span class="input-group-text">Description:</span>
    <textarea class="form-control" name="description" aria-label="Description:" maxlength="1250">{{
    old('description', $desk->description ?? '')
    }}</textarea>
</div>
<div>
    <header>
        <h3 class="text-gray-950">
            {{__('add friend to the desk')}}
        </h3>
    </header>
    <ol class="list-group">
        @foreach($users as $user)
            <li class="list-group-item d-flex">
                <span>{{$user->name}}</span>
                <input type="checkbox" name="selected_user[]" value="{{$user->id}}">
            </li>
        @endforeach
    </ol>
</div>
<button type="submit" class="btn btn-light mt-2">Confirm</button>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
