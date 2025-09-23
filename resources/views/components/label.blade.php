@props(['value'])

<label {{ $attributes->class(['block text-sm font-medium leading-tight text-gray-800']) }}>{{ $value ?? $slot }}</label>
