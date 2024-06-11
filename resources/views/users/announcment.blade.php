<x-user-layout>
    @include('users.dashboard.left-side')

    <div class="right_side background_right mb-5">
        <h3 class="text-body-secondary text-light">Announcements</h3>


        @isset($information)
            @foreach ($information as $announcement)
                <div>
                    <h2 class="text-light mt-5">{{ $announcement->title }}</h2>
                    <p class="text-light"><span class="mx-2"><i class="fa-solid fa-calendar-days"></i></span> {{ $announcement->created_at->format("d-M-Y") }}</p>
                    <p class="text-light bg-dark p-3" style="border-left: 5px solid tomato;">{{ Str::limit($announcement->description, 300) }}</p>
                    <a href="{{ url("/announcements/$announcement->slug") }}" class="btn btn-primary px-3 py-2">Continue Reading</a>
                </div>
            @endforeach
        @endisset



    </div>
</x-user-layout>
