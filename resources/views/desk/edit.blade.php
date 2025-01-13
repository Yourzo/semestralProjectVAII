<x-app-layout>
    <x-slot:title>{{__('Edit desk')}}</x-slot:title>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="d-flex justify-content-center">
        <div class="mt-5 form-background-color rounded border border-dark">
            <div class="mt-2">
                <form method="post" action="{{route('desk.update', ['desk' => $desk->id])}}" class="m-5">
                    @csrf
                    @method('PUT')

                    @include('desk.partials.name-desc-desk')
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
