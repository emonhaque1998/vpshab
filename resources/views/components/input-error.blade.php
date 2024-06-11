@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-bold space-y-1']) }} style="color: #ee5586!important;">
        @foreach ((array) $messages as $message)
            <li>*{{ $message }}</li>
        @endforeach
    </ul>
@endif
