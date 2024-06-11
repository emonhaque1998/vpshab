<x-home-layout>
     <!-- ***** CASE STUDY ***** -->
    @include("users.header.header")

    <section>
        <div class="main_dashboard">
          <div class="container">
            {{ $slot }}
          </div>
        </div>
    </section>
</x-home-layout>