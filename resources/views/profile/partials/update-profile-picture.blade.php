<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{__('Profile Picture')}}
        </h2>
    </header>

    <form method="post" action="{{route('profile.store-picture')}}" class="mt-6" enctype="multipart/form-data">
        @csrf
        @method('post')
        <input type="file" name='image' accept=".jpeg,.png,.jpg,.gif,.svg">
        <x-input-error class="mt-2" :messages="$errors->get('image')"/>
        <x-primary-button>{{__('Save')}}</x-primary-button>
    </form>
</section>
