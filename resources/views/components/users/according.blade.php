<div class="accordion" id="accordionExample">
<div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $accordingId }}" aria-expanded="true" aria-controls="collapseOne">
        <i class="{{ $accordingIcon }}"></i>  &nbsp; {{ $accordingTitle }}
    </button>
    </h2>
    <div id="{{ $accordingId }}" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
    <div class="accordion-body">
        {{ $slot }}
    </div>
    </div>
</div>
</div>
<br>