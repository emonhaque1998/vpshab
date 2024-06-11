<section id="ticket" class="exapath pb-80 noimage bg-seccolorstyle toppadding bottomhalfpadding">
    <div class="container">
        <div class="sec-main sec-up mb-0 sec-bg1 bg-seccolorstyle nomargin nopadding noshadow">
            <div class="randomline hideelement">
                <div class="bigline"></div>
                <div class="smallline"></div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 cd-filter-block mb-0">
                    <div class="form-contact cd-filter-content p-0 sec-bx">
                        <div class="text-center">
                            <h2 class="section-heading mergecolor">Full out the Contact form to contact us</h2>
                            <p class="mergecolor">We Will Help You To Choose The Best Plan!</p>
                        </div>
                        <form id="contactSubmitForm" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 position-relative">
                                    <label><i class="fas fa-user-tie"></i></label>
                                    <input id="name" type="text" name="name" placeholder="Full Name"
                                        value="{{ Auth::user()->name ?? '' }}"
                                         required="">
                                </div>
                                <div class="col-md-6 position-relative">
                                    <label><i class="fas fa-envelope"></i></label>
                                    <input id="email" type="email" name="email"
                                        value="{{ Auth::user()->email ?? '' }}"
                                        placeholder="Email Address"
                                        required="">
                                </div>
                                <div class="col-md-6 position-relative">
                                    <label><i class="fas fa-file-alt"></i></label>
                                    <input id="subject" type="text" name="subject" placeholder="Subject"
                                        required="">
                                </div>
                                <div class="col-md-6 position-relative">
                                    <div class="cd-select mt-4">
                                        <label class="db"></label>
                                        <select aria-label="Choose Department" id="department" name="support_id"
                                            class="select-filter">
                                            @isset($supports)
                                                @foreach ($supports as $support)
                                                    <option value="{{ $support->id }}">{{ $support->name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 position-relative">
                                    <div class="form-group mt-4">
                                        <textarea id="message" name="message" class="form-control" rows="5" placeholder="Message..."></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 position-relative mt-5">
                                    <input name="newsletter" type="checkbox" id="checkbox" class="filter">
                                    <label for="checkbox" class="checkbox-label c-grey mb-4 seccolor"><span>I have
                                            read and accept the terms of the privacy policy - <a href="legal"
                                                class="golink-dark">RGPD</a></span></label>
                                    <button id="contactSubmitBtn" type="submit" class="btn btn-default-yellow-fill float-start me-3" type="submit"> <span
                                            class="" role="status" aria-hidden="true"></span>
                                        Submit Ticket
                                    </button>

                                    <button type="reset" value="reset"
                                        class="btn btn-default-fill mt-0 mb-3 me-3">Reset</button><br>
                                </div>
                                <div id="contactMsg" class="col-md-12 mt-4" style="display: none">
                                    <h3 class="c-pink" style="font-size: 14px"> Message Submitted!</h3>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
