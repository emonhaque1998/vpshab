<x-user-layout>
    @include('users.dashboard.left-side')

    <div class="right_side background_right mb-5">
        <h3 class="text-body-secondary text-light"><span style="color: #ee5586;"><b>Subject:</b></span> {{ $ticket->subject ?? "Not Found" }}</h3>

        @php
            $conversation = $ticket->conversation()->paginate(10);
        @endphp

        @isset($conversation)
            <div id="appendDataList">
                @foreach ($conversation as $message)
                    @if ($message->owner === "user")
                        <div>
                            <h4 class="text-light mt-5">{{ $message->contact->user->name }}</h4>
                            <p class="text-light"><span class="mx-2"><i class="fa-solid fa-calendar-days"></i></span> {{ $message->created_at->format("d-M-Y, h:i A") }}</p>
                            <pre class="text-light bg-dark p-3" style="border-left: 5px solid tomato;">{!! $message->message !!}</pre>
                        </div>    
                    @else
                        <div style="text-align: right">
                            <h4 class="text-light mt-5">{{ $message->admin->name }}</h4>
                            <p class="text-light"><span class="mx-2"><i class="fa-solid fa-calendar-days"></i></span> {{ $message->created_at->format("d-M-Y, h:i A") }}</p>
                            <pre class="text-light bg-dark p-3" style="border-left: 5px solid tomato;">{!! $message->message !!}</pre>
                        </div>
                    @endif
                        
                @endforeach
            </div>
            @if ($ticket->status === "Open")
                <div class="d-flex justify-content-center gap-3 mt-5">
                    <button class="btn btn-success px-4 py-2" id="replayBtn">Replay</button>
                    <form method="POST" action="{{ url("view-ticket/$ticket->slug") }}">
                        @method("DELETE")
                        @csrf
                        <button type="submit" class="btn btn-danger px-4 py-2" id="cancleBtn">Close Ticket</button>
                    </form>
                </div>
        
                <form id="replayMessage" style="display: none">
                    <div class="mb-3">
                        <label for="message" class="form-label text-light">Replay Message</label>
                        <textarea name="message" class="form-control" id="message" rows="3"></textarea>
                    </div>
                    <input type="hidden" value="{{ $ticket->id }}" name="contactId">
                    <button id="replayMessageSubtmitBtn" type="submit" class="btn btn-primary px-4 py-2 mt-3"> <span
                        class="" role="status" aria-hidden="true"></span>
                        Send Message
                    </button>
                </form>
            @endif
        @endisset

        {{ $conversation->links('vendor.pagination.bootstrap-5') }}
    </div>
</x-user-layout>