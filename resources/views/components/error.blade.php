@error($for, $bag)
  <div id="{{ $id }}" {{ $attributes->class(['text-sm font-medium text-red-600']) }}>
    @if ($slot->isEmpty())
      {{ $value ?? $message }}
    @else
      {{ $slot }}
    @endif
  </div>
@enderror
