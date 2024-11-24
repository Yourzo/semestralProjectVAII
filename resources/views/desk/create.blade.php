<x-app-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="d-flex justify-content-center">
        <div class="mt-5 bg-secondary rounded border border-dark">
            <div class="mt-2">
                <form method="POST" action="{{route('desk.store')}}" class="m-5">
                    @csrf
                        @include('desk.partials.name-desc-desk')
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
