<x-user-layout>
    @include('users.dashboard.left-side')

    <div class="right_side">
        <div class="wpc-vps-info position-relative">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <a href="{{ route('my-services.index') }}">
                                <h3 class="title bg-seccolorstyle noshadow">
                                    <i class="icon-cpu"></i> <span class="mergecolor">Service</span> <span
                                        class="info">{{ Auth::user()->order()->count() ?? "0"}}</span>
                                </h3>
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <a href="{{ route('ticket.index') }}">
                                <h3 class="title bg-seccolorstyle noshadow">
                                    <i class="icon-cpu"></i> <span class="mergecolor">Ticket</span> <span
                                        class="info">{{ Auth::user()->contact->count() ?? "0" }}</span>
                                </h3>
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <a href="{{ route('my-invoice.index') }}">
                                <h3 class="title bg-seccolorstyle noshadow">
                                    <i class="icon-cpu"></i> <span class="mergecolor">Invoice</span> <span
                                        class="info">{{ Auth::user()->invoice->where("status", "Unpaid")->count() ?? "0" }}</span>
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-user-layout>
