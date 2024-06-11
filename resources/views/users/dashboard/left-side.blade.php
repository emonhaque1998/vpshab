<div class="left_side">
    <x-according id="infoAccording" title="Your Info" icon="fa-solid fa-user">
        <strong>{{ Auth::user()->name }}</strong><br>
        <span class="text-light" style="font-size: 14px">{{ Auth::user()->addressFirst }},
            {{ Auth::user()->addressSecond }}
        </span>
        <br>
        <span class="text-light" style="font-size: 14px; margin-top: 0; padding: 0;">{{ Auth::user()->stateList }},
            {{ Auth::user()->country }}
        </span>
        <br>
        <a href="{{ route('account-setting.index') }}" class="btn btn-primary btn-sm w-100 mt-3 text-light">Update</a>
    </x-according>

    <x-according id="foundAccourding" title="Available Credit" icon="fa-solid fa-user">
        <strong style="text-align: center">$ {{ Auth::user()->fund()->where("status", true)->sum("amount") }}.00</strong>
        <br>
        <a href="{{ route("add-fund.index") }}" class="btn btn-primary btn-sm w-100 mt-3">Add Funds</a>
    </x-according>
</div>
