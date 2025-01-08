<div class="input-group mb-3">
    <span class="input-group-text">Desk name:</span>
    <input maxlength="255" type="text" name="name"
           class="form-control" aria-label="Desk name:"
           aria-describedby="basic-addon1"
           value="{{old('name', isset($desk) ? $desk->name : '')}}" required>
</div>

<div class="input-group mb-2">
    <span class="input-group-text">Description:</span>
    <textarea class="form-control" name="description" aria-label="Description:" maxlength="1250">
        {{old('description', $desk->description ?? '')}}
    </textarea>
</div>
<div>
    <header>
        <h5 class="text-gray-950 h5-friends">
            {{__('Add friend to the desk:')}}
        </h5>
    </header>
    <ol class="list-group">
        <li class="list-group-item d-flex align-items-center justify-content-between">
            <span>{{__('Name')}}</span>
            <div class="ms-auto d-flex align-items-center gap-2">
                <i title="editor" class="bi bi-pencil-square ms-auto"></i>
                <i title="reader" class="bi bi-eye ms-auto"></i>
            </div>
        </li>
        @foreach($users as $user)
            <li class="list-group-item d-flex align-items-center justify-content-between">
                <span>{{$user->name}}</span>
                <div class="ms-auto d-flex align-items-center gap-2">
                    <input type="checkbox" name="selected_edit[]" value="{{$user->id}}"
                           {{isset($editors) && $editors->contains('id', $user->id) ? 'checked' : ''}}
                           class="ms-auto m-checkboxes">
                    <input type="checkbox" name="selected_read[]" value="{{$user->id}}"
                        {{isset($readers) && $readers->contains('id', $user->id) ? 'checked' : ''}}
                        class="ms-auto m-checkboxes">
                </div>
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
