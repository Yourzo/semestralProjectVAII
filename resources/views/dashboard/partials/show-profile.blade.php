<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{__('Profile')}}
        </h2>
    </header>

    <div class="mt-6 space-y-6">
        <div class="profile-grid p-3">
            <div class="item-grid-profile-picture">
                <img src="{{asset(Auth::user()->profile_picture_path)}}" class="rounded-circle" width="100" height="100" alt="pfp"/>
            </div>
            <div class="item-grid-field1">
                <span class="profile-grid-elem">
                    {{__(Auth::user()->name)}}
                </span>
            </div>
            <div class="item-grid-label2">
                <span class="profile-grid-elem">
                    email:
                </span>
            </div>
            <div class="item-grid-field2">
                <span class="profile-grid-elem">
                    {{__(Auth::user()->email)}}
                </span>
            </div>
        </div>
    </div>
</section>
