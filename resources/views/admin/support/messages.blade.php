<x-message-layout>
    <div class="email-content">
        <div class="">
            <div class="email-list">
                @foreach ($contacts as $contact)                
                    <a href="{{ url("/admin/signle-messages/$contact->slug") }}">
                        <div class="d-md-flex align-items-center email-message px-3 py-1">
                            <div class="d-flex align-items-center email-actions">
                                <input class="form-check-input" type="checkbox" value="" /> <i class='bx bx-star font-20 mx-2 email-star'></i>
                                <p class="mb-0"><b>{{ $contact->subject }}</b>
                                </p>
                            </div>
                            <div class="">
                                <p class="mb-0">{{ $contact->message }}</p>
                            </div>
                            <div class="ms-auto">
                                <p class="mb-0 email-time">5:56 PM</p>
                            </div>
                        </div>
                    </a>
                @endforeach
                
            </div>
        </div>
    </div>
</x-message-layout>