<x-user-layout>
    @include('users.dashboard.left-side')

    <div class="right_side background_right mb-5">
        <h3 class="text-body-secondary text-light">Add Fund</h3>

        <h6 class="text-body-secondary text-light mt-5">* Minimum Deposit $10.00 USD</h6>
        <h6 class="text-body-secondary text-light">* Maximum Deposit $500.00 USD</h6>
        <h6 class="text-body-secondary text-light">* Maximum Balance $500.00 USD</h6>
        <form id="fundSubmitForm" action="{{ route("fund.add") }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3 col-lg-12">
                <label for="amount" class="form-label text-light">Amount</label>
                <input type="number" min="10" max="500" class="form-control" id="amount" name="amount" placeholder="10-500" >
            </div>
            <div class="submitButtonForInformation mt-3">
                <x-submit btnId="fundSubmitBtn" btnText="Pay Now" />
            </div>
        </form>
    </div>
</x-user-layout>
