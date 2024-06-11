<x-message-layout>
<!--start content-->
<main class="page-content">
            <div class="email-content h-auto">
              <div class="email-read-box p-3">
                <h4>{{ $contact->subject}}</h4>
                <div style="text-align: right;">
                  <a href="javascript:;" onclick="showReplayDiv()" class="btn btn-primary"><i class="bi bi-plus-lg me-2"></i>Replay</a>
                </div> 
                <hr>
                @isset($contact->conversation)
                  @foreach ($contact->conversation as $message)
                    @if ($message->owner === "user")
                      <div class="d-flex align-items-center">
                        <img src="{{ asset("assets/img/avater.png") }}" width="42" height="42" class="rounded-circle" alt="" />
                        <div class="flex-grow-1 ms-2">
                          <p class="mb-0 font-weight-bold">{{ $message->contact->user->name }}</p>
                        </div>
                        <p class="mb-0 chat-time ps-5 ms-auto">{{ $message->created_at->format("d-m-Y") }}</p>
                      </div>
                      <div class="email-read-content px-md-5 py-5">
                        <p>
                          {{ $message->message }}
                        </p>
                      </div>
                            
                    @else
                      <div class="d-flex align-items-center">
                        <p class="mb-0 chat-time ps-5 ms-auto">{{ $message->created_at->format("d-m-Y") }}</p>
                        <div class="flex-grow-1 ms-2">
                          
                        </div>
                        <p class="mb-0 font-weight-bold">{{ $message->admin->name }}</p>
                        <img src="{{ asset("assets/img/avater.png") }}" width="42" height="42" class="rounded-circle" alt="" />
                        
                        
                      </div>
                      <div class="email-read-content px-md-5 py-5">
                        <p>
                          {{ $message->message }}
                        </p>
                      </div>    
                    @endif
                   
                  @endforeach
                @endisset
                  
              </div>
            </div>

      <!--start compose mail-->
      <div class="compose-mail-popup" id="replayAdmin">
        <div class="card">
          <div class="card-header bg-dark text-white py-2 cursor-pointer">
            <div class="d-flex align-items-center">
              <div class="compose-mail-title">New Message</div>
              <div class="compose-mail-close ms-auto">x</div>
            </div>
          </div>
          <form action="{{ route("signle-messages.store") }}" method="POST" id="messageFromAdmin">
            @csrf
            <div class="card-body">
              <div class="email-form">
                <input type="hidden" value="{{ $contact->id }}" name="contact_id">
                <div class="mb-3">
                  <input type="email" name="email" value="{{ $contact->user->email }}" class="form-control" placeholder="To" />
                </div>
                <div class="mb-3">
                  <input type="text" name="subject" value="{{ $contact->subject }} - Replay" class="form-control" placeholder="Subject" />
                </div>
                <div class="mb-3">
                  <textarea class="form-control" name="message" placeholder="Message" rows="10" cols="10"></textarea>
                </div>
                <div class="mb-0">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <div class="btn-group">
                        <x-submit btnId="replaySubmitBtn" btnText="Send" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!--end compose mail-->
      <!--start email overlay-->
      <div class="overlay email-toggle-btn-mobile"></div>
      <!--end email overlay-->
    </div>
    <!--end email wrapper-->
  </main>
<!--end page main-->

<script>
  function showReplayDiv(email){
    document.getElementById("replayAdmin").style.display = "block";
  }
</script>
</x-message-layout>