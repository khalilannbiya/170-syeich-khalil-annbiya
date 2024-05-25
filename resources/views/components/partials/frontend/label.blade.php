@props(['value'])

<label {{ $attributes->merge(['class' => 'font-bold']) }}>{{ $value ?? $slot }}</label>
