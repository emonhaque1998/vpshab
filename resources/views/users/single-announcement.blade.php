<x-user-layout>
    @include('users.dashboard.left-side')

    <div class="right_side background_right mb-5 py-3">
       @isset($information)
            @foreach ($information as $announcement)
                <div>
                    <h2 class="text-light ">{{ $announcement->title }}</h2>
                    <p class="text-light"><span class="mx-2"><i class="fa-solid fa-calendar-days"></i></span> {{ $announcement->created_at->format("d-M-Y") }}</p>
                    <p class="text-light bg-dark p-3" style="border-left: 5px solid tomato;">{{ $announcement->description, 300 }}</p>
                    <a onclick="window.history.back();" class="btn btn-primary px-3 py-2">Go to Back</a>
                </div>
            @endforeach
        @endisset



    </div>
</x-user-layout>
