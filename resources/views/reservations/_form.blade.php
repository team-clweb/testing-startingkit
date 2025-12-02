@error('name')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="name">Naam:</label>
{{ html()->text('name')->class('border rounded w-full py-2 px-3 mb-3')->placeholder('Naam')->required()}}

@error('phone')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="phone">Telefoon:</label>
{{ html()->text('phone')->class('border rounded w-full py-2 px-3 mb-3')->placeholder('Telefoonnummer')->required()}}


@error('email')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="email">Email:</label>
{{ html()->email('email')->class('border rounded w-full py-2 px-3 mb-3')->placeholder('Email')->required()}}


@error('date')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="date">Datum reservering:</label>
{{ html()->date('date')->class('border rounded w-full py-2 px-3 mb-3')->required()}}


@error('time')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="time">Tijd:</label>

@php
    $times = [
        '17:30 - 18:30',
        '18:00 - 19:30',
        '19:00 - 20:30',
        '19:30 - 21:00',
        '20:00 - 21:00'
    ];
@endphp

<select name="time" class="border rounded w-full px-3 py-2 mb-3" required>
    @foreach($times as $time)
        <option value="{{ $time }}" {{ (old('time', $reservation->time) == $time) ? 'selected' : '' }}>
            {{ $time }}
        </option>
    @endforeach
</select>

@error('persons')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="persons">Personen:</label>
{{ html()->number('persons')->class('border rounded w-full py-2 px-3 mb-3')->placeholder('Personen')->required()}}


@error('message')
<div class="text-red-600">{{ $message }}</div>
@enderror
<label for="message">Opmerking:</label>
{{ html()->textarea('message')->rows(5)->class('border rounded w-full py-2 px-3 mb-3')->placeholder('Bericht')}}

<x-button.index type="submit">Opslaan</x-button.index>
