@props([
    'justify' => 'right',
    'align' => 'end',
])

@php
$x = match ($justify) {
    'left' => 'left-0 origin-left rtl:origin-right',
    'right' => 'right-0 origin-right rtl:origin-left',
};
$y = match ($align) {
    'top' => 'mt-1.5 top-full',
    'bottom' => 'mb-1.5 bottom-full',
};
@endphp

<div x-data="popover" class="relative">
    {{ $slot }}
    <div x-cloak {{ $menu->attributes->class([
        $x, $y,
        'absolute z-50',
        '[:where(&)]:min-w-48 p-[.3125rem]',
        'rounded-lg shadow-xs',
        'border border-gray-200',
        'bg-white',
        'focus:outline-hidden',
    ]) }}>
        {{ $menu }}
    </div>
</div>
