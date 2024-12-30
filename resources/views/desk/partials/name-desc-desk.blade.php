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

<div class="input-group mb-3">
    <span class="input-group-text">Add user to desk:</span>
    <input type="text" name="username" class="form-control" aria-label="Username:" aria-describedby="basic-addon1" value="{{ old('username') }}">

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
