<div class="mt-2">
    <button class="btn btn-primary opacity-0" data-bs-toggle="modal" data-bs-target="#addFriend">
        <i class="bi bi-plus-lg"></i>
        {{__('Send friend request')}}
    </button>
</div>
<div class="modal fade" id="addFriend" tabindex="-1" aria-labelledby="addFriendModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFriendModalLabel">Add friend</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group d-flex">
                    <input type="text" class="form-control me-2" id="name" required/>
                    <button type="button" class="btn btn-primary" id="searchButton">Search</button>
                </div>
                <div id="searchResults" class="mt-3"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    @vite('resources/js/searchUser.js')
@endpush
