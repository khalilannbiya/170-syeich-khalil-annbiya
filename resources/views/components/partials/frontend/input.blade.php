@props(['type'])

<input type="{{ $type }}"
    {{ $attributes->merge(['class' => 'w-full transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent']) }}>
