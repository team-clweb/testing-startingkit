@aware(['variant' => 'primary'])

@props([
    'current' => false,
    'before' => '',
    'after' => '',
])

<a aria-current="{{ $current ? 'page' : '' }}" {{ $attributes->class([
    'h-10 lg:h-8 relative flex items-center space-x-2 rounded-lg',
    'py-0 text-left w-full px-3 my-px',
    'text-gray-500',
    'border border-transparent',
    'aria-current:text-(--color-accent-content) hover:aria-current:text-(--color-accent-content)',
    match($variant) { // Hover...
        'primary' => 'hover:text-gray-800 hover:bg-gray-800/5',
        'secondary' => 'hover:text-gray-800 hover:bg-gray-800/[4%]',
    },
    match($variant) { // Current...
        'primary' => 'aria-current:bg-white aria-current:border aria-current:border-gray-200',
        'secondary' => 'aria-current:bg-gray-800/[4%]',
    },
]) }}>
    <?php if (is_string($before) && $before !== ''): ?>
        <x-dynamic-component :component="$before" aria-hidden="true" width="16" height="16" class="shrink-0" />
    <?php else: ?>
        {{ $before }}
    <?php endif; ?>
    <?php if ($slot->isNotEmpty()): ?>
        <div class="flex-1 text-sm font-medium leading-none whitespace-nowrap">{{ $slot }}</div>
    <?php endif; ?>
    <?php if (is_string($after) && $after !== ''): ?>
        <x-dynamic-component :component="$after" aria-hidden="true" width="16" height="16" class="shrink-0 ml-1" />
    <?php else: ?>
        {{ $after }}
    <?php endif; ?>
</a>
