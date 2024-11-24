<div class="input-group mb-3">
    <span class="input-group-text">Desk name:</span>
    <input type="text" name="name" class="form-control" aria-label="Desk name:" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-2">
    <span class="input-group-text">Description:</span>
    <textarea class="form-control" name="description" aria-label="Description:"></textarea>
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
